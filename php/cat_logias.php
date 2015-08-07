<?php

require_once '../clases/Logias.php';
require_once '../clases/UtilDB.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
}


$clasf2 = new Logias();
$count = NULL;
$msg = "";

if (isset($_POST['txtCveLogia'])) {
    if ($_POST['txtCveLogia'] != 0) {
       
        $clasf2 = new Logias($_POST['txtCveLogia']);
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {

        $clasf2->setCveOriente($_POST['cmbCveOriente']);
        $clasf2->setCveGranLogia($_POST['ajaxCmb']);
        $clasf2->setNombre($_POST['txtDescripcion']);
        $clasf2->setDireccion($_POST['txtDireccion']);
        $clasf2->setTrabajos($_POST['txtHorario']);
        $clasf2->setActivo(isset($_POST['cbxActivo']) ? "1" : "0");
        $count = $clasf2->grabar();
        if ($count != 0) {
            $msg = "¡Logia grabada con éxito!";
        } else {
            $msg = "[ERROR] Logia no grabada";
        }
    }
    if ($_POST['xAccion'] == 'eliminar') {
        $clasf2->borrar($_POST['txtCveLogiaEli']);
    }
    if ($_POST['xAccion'] == 'logout') {
        unset($_SESSION['cve_usuario']);
        header('Location:login.php');
        return;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MSF Admin| Catálogo de Logias</title>
        <meta charset="utf-8">
        <meta name="author" content="Webxico & Cuetox">
        <meta name="description" content="Página oficial de Masonería Sin Fronteras">
        <meta name="keywords" content="masoneria sin fronteras,masoneria,masonería,masonería sin fronteras,leslie silva lorca,fenix 5, estado restauración, gran logia, aprendiz, compañero, maestro mason,maestro masón, AP:., ap:., comp:.,M:.M:., M:., mason, masón, taller de aprendiz,servicios profesionales, profesiones, libros masonicos,msf, MSF">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
         <link href="../css/modal.css" rel="stylesheet"/>
    </head>
    <body>
        <?php include 'analyticstracking.php'; ?>
        <div id="wrapper">
        <?php $_GET['q'] = "logias";
        include './includeMenuAdmin.php'; ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Catálogo de Logias</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" >
                    <div class="col-sm-8">&nbsp;</div>
                    <div class="col-sm-8">

                        <form role="form" name="frmGrados" id="frmGrados" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="form-group">
                                <label for="txtCveLogia"><input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" /></label>
                                <input type="hidden" class="form-control" id="txtCveLogiaEli" name="txtCveLogiaEli"  value=""> 
                                <input type="hidden" class="form-control" id="txtCveLogia" name="txtCveLogia" placeholder="ID Grado" value="<?php echo($clasf2->getCveLogia()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="cmbCveOriente">Gran Oriente:</label>
                                <select name="cmbCveOriente" id="cmbCveOriente" class="form-control" placeholder="Rito">
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                    <?php
                                    $sql2 = "SELECT * FROM grandes_orientes where activo=1 ORDER BY descripcion";
                                    $rst2 = UtilDB::ejecutaConsulta($sql2);
                                    foreach ($rst2 as $row) {
                                        echo("<option value='" . $row['cve_oriente'] . "' " . ($clasf2->getCveLogia() != 0 ? ($clasf2->getCveOriente() == $row['cve_oriente'] ? "selected" : "") : "") . ">" . $row['descripcion'] . "</option>");
                                    }
                                    $rst2->closeCursor();
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ajaxCmb">Grandes Logias:</label>
                                <select name="ajaxCmb" id="ajaxCmb" class="form-control" placeholder="Logias" disabled>
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>


                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtDescripcion">Logia</label>
                                <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" 
                                       placeholder="Nombre de la logia" value="<?php echo($clasf2->getNombre()); ?>">
                            </div>
                                                        <div class="form-group">
                                <label for="txtDescripcion">Dirección</label>
                                <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" 
                                       placeholder="Dirección de la logia" value="<?php echo($clasf2->getDireccion()); ?>">
                            </div>
                                                      <div class="form-group">
                                <label for="txtDescripcion">Horario de trabajos:</label>
                                <input type="text" class="form-control" id="txtHorario" name="txtHorario" 
                                       placeholder="Horario de los trabajos logiales" value="<?php echo($clasf2->getTrabajos()); ?>">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="cbxActivo" name="cbxActivo" value="1" checked="<?php echo($clasf2->getCveLogia() != 0 ? ($clasf2->getActivo() == 1 ? "checked" : "") : "checked"); ?>"> Activo
                                </label>
                            </div>
                            <button type="button" class="btn btn-default" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-default" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>
                        </form>
                        <br/>
                        <br/>
                        <div class="<?php echo($count != 0 ? "alert alert-success" : "alert alert-danger"); ?>" style="<?php echo($count == NULL ? "display:none;" : "display:block;"); ?>"><?php echo($msg); ?></div>
                        <br/>
                        <br/>
                        <!-- Aqui se cargan los datos vía AJAX-->
                        <div id="ajax"></div>
                    </div>
                    <div class="col-sm-8">&nbsp;</div>
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
        <!-- Bootstrap Core JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/dist/js/sb-admin-2.js"></script>
        <script>

            $(document).ready(function () {
                $("#cmbCveOriente").change(function () {
                    var cveOriente = 0;
                    //   var optionSelected = $("option:selected", this);
                    //    var valueSelected = this.value;
                    cveOriente = this.value;
                    cargarCombo(cveOriente);

                });

                $("#ajaxCmb").change(function () {
                    //   var optionSelected = $("option:selected", this);
                    //    var valueSelected = this.value;
                    cargarMuestra($("#cmbCveOriente").val(), this.value);

                });

               /* Limpiar la ventana modal para volver a usar*/
                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });

            });

            function logout()
            {
                $("#xAccion").val("logout");
                $("#frmGrados").submit();
            }

            function cargarMuestra(cveOriente, cveGranLogia)
            {   //En el div con id 'ajax' se cargara lo que devuelva el ajax, esta petición  es realizada como POST

                $("#ajax").load("cat_logias_ajax.php", {"cveOriente": cveOriente, "cveGranLogia": cveGranLogia}, function (responseTxt, statusTxt, xhr) {
                    if (statusTxt === "success")
                    {
                        $('[data-toggle="popover"]').popover({placement: 'top', html: true, trigger: 'click hover'});
                    }
                    if (statusTxt === "error")
                        alert("Error: " + xhr.status + ": " + xhr.statusText);
                });
            }

            function cargarCombo(cveOriente)
            {   //En el div con id 'ajaxCmb' se cargara lo que devuelva el ajax, esta petición  es realizada como POST

                $("#ajaxCmb").load("cat_logias_combos_ajax.php", {"cveOriente": cveOriente}, function (responseTxt, statusTxt, xhr) {
                    $("#ajaxCmb").attr({'disabled': false});
                    cargarCombo2($("#cmbCveOriente").val(), $("#ajaxCmb").val());
                });
            }
            function cargarCombo2(cveOriente, cveGranLogia)
            {   //En el div con id 'ajaxCmb' se cargara lo que devuelva el ajax, esta petición  es realizada como POST
                // $("#ajaxCmb").html("");
                $("#ajaxCmb").load("cat_logias_combos_ajax.php", {"cveOriente": cveOriente, "cveGranLogia": cveGranLogia}, function (responseTxt, statusTxt, xhr) {
                    $("#ajaxCmb").attr({'disabled': false});
                    cargarMuestra(cveOriente, cveGranLogia);
                });
            }



            function limpiar()
            {
                $("#xAccion").val("0");
                $("#txtCveLogia").val("0");
                $("#frmGrados").submit();
            }

            function grabar()
            {
                if ($("#cmbCveOriente").val() > 0 && $("#ajaxCmb").val() > 0 && $("#txtDescripcion").val() !== "")
                {
                    $("#xAccion").val("grabar");
                    $("#frmGrados").submit();
                }
                else
                {
                    alert("Es necesario elegir el gran oriente, la gran logia y agregar el nombre de la logia");
                }

            }


            function recargar()
            {
                $("#xAccion").val("recargar");
                $("#frmGrados").submit();

            }



            var cveOriente = $("#cmbCveOriente").val();
            if (cveOriente !== 0)
            {
                cargarCombo2(cveOriente,<?php echo($clasf2->getCveGranLogia() ) ?>);
            }

            function eliminar(valor)
            {
                $("#xAccion").val("eliminar");
                $("#txtCveLogiaEli").val(valor);
                $("#frmGrados").submit();
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

        </script>
    </body>
</html>
