<?php
require_once '../clases/Evento.php';
require_once '../clases/UtilDB.php';
require_once '../php/functions.php';
session_start();
$numParrafos = 0;
$ids_parrafos = array();

if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
}



$eventos = new Evento();
$count = NULL;

if (isset($_POST['txtCveEvento'])) {
    if ($_POST['txtCveEvento'] != 0) {
        $eventos = new Evento($_POST['txtCveEvento']);
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {
        $fi = strtotime(str_replace('/', '-', ($_POST['txtFechaInicio'] . " " . "00:00:00")));
        $ff = strtotime(str_replace('/', '-', ($_POST['txtFechaFin'] . " " . "23:59:59")));
        $finicio = date('Y-m-d H:i:s', $fi);
        $ffin = date('Y-m-d H:i:s', $ff);

        $eventos->setNombre($_POST['txtNombre']);
        if(isset($_POST['txtIdsParrafos']))
        { $tmp = explode(",",$_POST['txtIdsParrafos']);
          $eventos->setDescripcion(getParrafoTextoCompleto2($tmp));
        }
        else
        { $eventos->setDescripcion(getParrafoTextoCompleto((int) $_POST['txtNumParrafos']));
        }
        $eventos->setFechaInicio($finicio);
        $eventos->setFechaFin($ffin);
        $count = $eventos->grabar();
    }
         if ($_POST['xAccion'] == 'eliminar') {
        $eventos->borrar($_POST['txtCveEvento']);
    }

    if ($_POST['xAccion'] == 'logout') {
        unset($_SESSION['cve_usuario']);
        header('Location:login.php');
        return;
    }
}


$sql = "SELECT * FROM eventos ORDER BY cve_evento DESC";
$rst = UtilDB::ejecutaConsulta($sql);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MSF Admin | Eventos</title>
        <meta name="author" content="Webxico & Cuetox">
        <meta name="description" content="Página oficial de Masonería Sin Fronteras">
        <meta name="keywords" content="masoneria sin fronteras,masoneria,masonería,masonería sin fronteras,leslie silva lorca,fenix 5, estado restauración, gran logia, aprendiz, compañero, maestro mason,maestro masón, AP:., ap:., comp:.,M:.M:., M:., mason, masón, taller de aprendiz,servicios profesionales, profesiones, libros masonicos,msf, MSF">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../js/jQuery/jquery-ui-1.11.3/jquery-ui.min.css" rel="stylesheet"/>
        <!-- Bootstrap Core CSS -->
        <link href="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- MetisMenu CSS -->
        <link href="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"/>
        <!-- Custom CSS -->
        <link href="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/dist/css/sb-admin-2.css" rel="stylesheet"/>
        <!-- Custom Fonts -->
        <link href="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php include 'analyticstracking.php'; ?>
        <div id="wrapper">
           <?php $_GET['q'] = "eventos";include './includeMenuAdmin.php'; ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Eventos</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" >
                    <div class="col-sm-8">&nbsp;</div>
                    <div class="col-sm-8">
                        <form role="form" name="frmEventos" id="frmEventos" action="cat_eventos.php" method="POST">
                            <div class="form-group">
                                <label for="xAccion"><input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" /></label>

                                <input type="hidden" class="form-control" id="txtCveEvento" name="txtCveEvento"
                                       placeholder="ID Evento" value="<?php echo($eventos->getCveEvento()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="txtNombre">Título</label>
                                <input type="text" class="form-control" id="txtNombre" name="txtNombre" 
                                       placeholder="Escriba un título para el evento" value="<?php echo($eventos->getNombre()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="txtParrafo1">* Descripción:</label><br/>

                                <?php
                                if ($eventos->getCveEvento() != 0) {
                                    $numParrafos = substr_count($eventos->getDescripcion(),"<p>");
                                    if ($numParrafos === 0) {
                                        echo("<button type=\"button\" class=\"btn btn-success\" id=\"btnAdd\" name=\"btnAdd\" onclick=\"agregarParrafo('new');\"><span class=\"glyphicon glyphicon-plus\"></span> Agregar párrafo</button><br/><br/>");
                                        echo("<textarea class=\"form-control\" rows=\"5\" cols=\"50\" id=\"txtParrafo1\" name=\"txtParrafo1\" placeholder=\"Párrafo 1\" style=\"display:none;\"></textarea>");
                                        echo("<input type=\"hidden\" name=\"txtNumParrafos\" id=\"txtNumParrafos\" value=\"".$numParrafos."\" />");
                                    } else {
                                        $tmp = explode("</p>",$eventos->getDescripcion());
                                        echo("<button type=\"button\" class=\"btn btn-success\" id=\"btnAdd\" name=\"btnAdd\" onclick=\"agregarParrafo('edit');\"><span class=\"glyphicon glyphicon-plus\"></span> Agregar párrafo</button><br/><br/>");
                                        echo("<input type=\"hidden\" name=\"txtNumParrafos\" id=\"txtNumParrafos\" value=\"".$numParrafos."\" />");
                                        //echo("<input type=\"hidden\" name=\"txtIdsParrafosEliminados\" id=\"txtIdsParrafosEliminados\" value=\"0\" />");
                                        for ($x = 1; $x <= $numParrafos; $x++) {
                                            $texto = substr($tmp[$x - 1],strrpos($tmp[$x - 1],"<p>")+3,strlen($tmp[$x - 1]));
                                            echo("<textarea class=\"form-control\" rows=\"5\" cols=\"50\" id=\"txtParrafo" . $x . "\" name=\"txtParrafo" . $x . "\" placeholder=\"Párrafo " . $x . "\">".$texto."</textarea><button type=\"button\" class=\"btn btn-warning\" id=\"btnEliminar" . $x . "\" name=\"btnEliminar" . $x . "\" onclick=\"eliminarParrafo(" . $x . ");\"><span class=\"glyphicon glyphicon-trash\"></span> Eliminar párrafo</button><br/><br/><br/>");
                                            array_push($ids_parrafos,$x);
                                        }
                                        
                                        $string = '';

                                        foreach ($ids_parrafos as $key => $value) {
                                            $string .= ",$value";
                                        }

                                        $string = substr($string, 1); // remove leading ","
                                        echo("<input type=\"hidden\" name=\"txtIdsParrafos\" id=\"txtIdsParrafos\" value=\"".$string."\" />");
                                    }
                                } else {
                                    ?>
                                    <button type="button" class="btn btn-success" id="btnAdd" name="btnAdd" onclick="agregarParrafo('new');"><span class="glyphicon glyphicon-plus"></span> Agregar párrafo</button><br/><br/>
                                    <textarea class="form-control" rows="5" cols="50" id="txtParrafo1" name="txtParrafo1" placeholder="Párrafo 1" style="display:none;"></textarea>                         
                                    <input type="hidden" name="txtNumParrafos" id="txtNumParrafos" value="0" />
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <div class="date-form">
                                    <div class="form-horizontal">
                                        <div class="control-group">
                                            <label for="txtFechaInicio">Fecha de inicio:</label>
                                            <div class="controls">
                                                <div class="input-group">
                                                    <input id="txtFechaInicio" name="txtFechaInicio" type="text" class="date-picker form-control"  value="<?php echo(substr(str_replace('-', '/', $eventos->getFechaInicio()), 0, 10)); ?>"/>
                                                    <label for="txtFechaInicio" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="date-form">
                                    <div class="form-horizontal">
                                        <div class="control-group">
                                            <label for="txtFechaFin">Fecha de fin:</label>
                                            <div class="controls">
                                                <div class="input-group">
                                                    <input id="txtFechaFin" name="txtFechaFin" type="text" class="date-picker form-control"  value="<?php echo(substr(str_replace('-', '/', $eventos->getFechaFin()), 0, 10)); ?>"/>
                                                    <label for="txtFechaFin" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-default" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-default" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>

                            <br/>
                            <br/>
                            <table class="table table-bordered table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID Noticia</th>
                                        <th>Título</th>
                                        <th>Fecha de Inicio</th>
                                        <th>Fecha de Fin</th>
                                        <th>Foto de Portada</th>
                                        <th>Foto 1</th>
                                        <th>Foto 2</th>
                                        <th>Foto 3</th>
                                        <th>Foto 4</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rst as $row) { ?>
                                        <tr>
                                            <th><a href="javascript:void(0);" onclick="$('#txtCveEvento').val(<?php echo($row['cve_evento']); ?>);
                                                    recargar();"><?php echo($row['cve_evento']); ?></a></th>
                                            <th><?php echo($row['nombre']); ?></th>
                                            <th><?php echo($row['fecha_inicio']); ?></th>
                                            <th><?php echo($row['fecha_fin']); ?></th>
                                            <th><?php echo($row['foto_principal'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['nombre']) . "\" title=\"" . $row['nombre'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto_principal'] . "' alt='" . $row['nombre'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=".$row['cve_evento']."&xNumImagen=0\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=".$row['cve_evento']."&xNumImagen=0\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><?php echo($row['foto1'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['nombre']) . "\" title=\"" . $row['nombre'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto1'] . "' alt='" . $row['nombre'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=".$row['cve_evento']."&xNumImagen=1\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=".$row['cve_evento']."&xNumImagen=1\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><?php echo($row['foto2'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['nombre']) . "\" title=\"" . $row['nombre'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto2'] . "' alt='" . $row['nombre'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=".$row['cve_evento']."&xNumImagen=2\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=".$row['cve_evento']."&xNumImagen=2\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><?php echo($row['foto3'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['nombre']) . "\" title=\"" . $row['nombre'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto3'] . "' alt='" . $row['nombre'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=".$row['cve_evento']."&xNumImagen=3\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=".$row['cve_evento']."&xNumImagen=3\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><?php echo($row['foto4'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['nombre']) . "\" title=\"" . $row['nombre'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto4'] . "' alt='" . $row['nombre'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=".$row['cve_evento']."&xNumImagen=4\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_eventos_upload_img.php?xCveEvento=".$row['cve_evento']."&xNumImagen=4\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                                            <th><button type="button" class="btn btn-warning" id="btnEliminar" name="btnEliminar" onclick="eliminar(<?PHP echo $row['cve_evento']; ?>);"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></th>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="col-sm-4">&nbsp;</div>
                </div>
                <div class="row" >
                    <div class="col-sm-12">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <!-- jQuery -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="../js/jQuery/jquery-ui-1.11.3/jquery-ui.min.js"></script>
        <script src="../js/jQuery/jquery-ui-1.11.3/jquery.ui.datepicker-es-MX.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/dist/js/sb-admin-2.js"></script>
        <script>
            var parrafos = <?php echo((int)$numParrafos); ?>;
            var parrafos_eliminar = new Array();
            
            $(document).ready(function () {
 
                $(".date-picker").datepicker({yearRange: "-0:+10", changeMonth: true, changeYear: true});
                $.datepicker.setDefaults($.datepicker.regional[ "es-MX" ]);
                $('[data-toggle="popover"]').popover({placement: 'top', html: true, trigger: 'click hover'});

                /* Limpiar la ventana modal para volver a usar*/
                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });

            });
            
            function agregarParrafo(opcion)
            { 
                if (parrafos === 0)
                {
                    $("#txtParrafo1").toggle("slow");
                    $("#txtParrafo1").focus();
                    $("#txtNumParrafos").val(++parrafos);
                }
                else
                {
                    if ($("#txtParrafo" + (parrafos)).val() === "")
                    {
                        alert("El párrafo actual esta vacío.");
                        $("#txtParrafo" + (parrafos)).focus();
                    }
                    else
                    {   if(opcion === "new")
                        { $("<textarea class=\"form-control\" rows=\"4\" cols=\"50\" id=\"txtParrafo" + (parrafos + 1) + "\" name=\"txtParrafo" + (parrafos + 1) + "\" placeholder=\"Párrafo " + (parrafos + 1) + "\" style=\"display:none;\"></textarea>").insertBefore("#txtParrafo" + parrafos++);//primero se asiga y despues se incrementa en uno.
                          $("#txtParrafo" + (parrafos - 1)).toggle("slow");//Oculto en párrafo anterior 
                        }
                        else
                        {   $("<br/><br/><br/><textarea class=\"form-control\" rows=\"4\" cols=\"50\" id=\"txtParrafo" + (parrafos + 1) + "\" name=\"txtParrafo" + (parrafos + 1) + "\" placeholder=\"Párrafo " + (parrafos + 1) + "\" style=\"display:none;\"></textarea><button type=\"button\" class=\"btn btn-warning\" id=\"btnEliminar"+(parrafos + 1)+"\" name=\"btnEliminar"+(parrafos + 1)+"\" style=\"display:none;\"><span class=\"glyphicon glyphicon-trash\"></span> Eliminar párrafo</button>").insertAfter("#btnEliminar" + parrafos++);//primero se asiga y despues se incrementa en uno.
                            $("#txtIdsParrafos").val($("#txtIdsParrafos").val()+","+parrafos);
                        }
                                    
                        $("#txtParrafo" + (parrafos)).toggle("slow"); //Muestro el párrafo actual.
                        $("#txtParrafo" + (parrafos)).focus();
                        $("#txtNumParrafos").val(parrafos);
                    }

                }

            }

            function eliminarParrafo(num)
            {  if(parrafos === 1)
               { alert("Debe dejar al menos un párrafo."); 
               }
               else
               {   $("#txtParrafo" + num).remove();
                   $("#btnEliminar" + num).remove();
                   $("#txtNumParrafos").val(--parrafos);//primero se decrementa en uno y luego se asigna.
                   //parrafos_eliminar.push(num);
                   //$("#txtIdsParrafosEliminados").val(parrafos_eliminar.toString());
                   $("#txtIdsParrafos").val($("#txtIdsParrafos").val().replace(','+num,''));
                   $("#txtIdsParrafos").val($("#txtIdsParrafos").val().replace(num+',',''));
                   $("#txtIdsParrafos").val($("#txtIdsParrafos").val().replace(num,''));
               }
               
            }
            
            function logout()
            {
                $("#xAccion").val("logout");
                $("#frmEventos").submit();
            }

            function msg(opcion)
            {
                switch (opcion)
                {
                    case 0:
                        alert("[ERROR] Evento no grabado");
                        break;
                    case 1:
                        alert("Evento grabado con éxito!");
                        break;
                    default:
                        break;

                }

            }

            function limpiar()
            {
                $("#xAccion").val("0");
                $("#txtCveEvento").val("0");
                $("#frmEventos").submit();
            }
            
            function validar()
            {
                var msg = "";
                var valido = false;

                if ($("#txtParrafo1").val() === "" && parrafos === 0)
                {
                    msg += "Agregue por lo menos un párrafo a la descripción del evento.";
                }
                else if ($("#txtParrafo" + (parrafos)).val() === "")
                {
                    $("#txtParrafo" + (parrafos)).focus();
                    msg += "El párrafo actual esta vacío.";
                }
                else
                {
                    valido = true;
                }

                if (!valido)
                {
                    alert(msg);
                }
                return valido;

            }

            function grabar()
            {   if (validar())
                { $("#xAccion").val("grabar");
                  $("#frmEventos").submit();
                }
            }

            function eliminar(valor)
            {
                
                $("#xAccion").val("eliminar");
                $("#txtCveEvento").val(valor);
                $("#frmEventos").submit();

            }




            function recargar()
            {
                $("#xAccion").val("recargar");
                $("#frmEventos").submit();

            }

            function subir()
            {
                if ($("#fileToUpload").val() !== "")
                {
                    $("#xAccion2").val("upload");
                    $("#frmUpload").submit();
                }
                else
                {
                    alert("No ha seleccionado un archivo para subir.");
                }
            }


            msg(<?php echo($count) ?>);
        </script>
    </body>
</html>

