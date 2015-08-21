<?php
require_once '../clases/Volumenes.php';
require_once '../clases/TrabajosLogias.php';
require_once '../clases/Logias.php';
require_once '../clases/UtilDB.php';
session_start();

if (!isset($_SESSION['habilitado'])) {
    header('Location:login_logia.php');
    return;
}

$volumenes = new Volumenes();
$trabajos = new TrabajosLogiales();
$logia = new Logias($_SESSION['logia']);
$count = NULL;


if (isset($_POST['txtIdVolumen'])) {
    if ($_POST['txtIdVolumen'] != 0) {
        $volumenes = new Volumenes($_POST['txtIdVolumen']);
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {
        $volumenes->setDescripcion($_POST['txtIdVolumen']);
        $volumenes->setCveTipo(3);
        $volumenes->setTitulo($_POST['txtTitulo']);
         $volumenes->setAutor($_POST['txtAutor']);
          $volumenes->setDescripcion($_POST['txtDescripcion']);
          $volumenes->setGrado($_POST['cmbCveGrado']);
        $volumenes->setActivo(isset($_POST['cbxActivo']) ? "1" : "0");
        $count = $volumenes->grabar();
        
        if($count>0)
        {
            $trabajos->setCveLogia($_SESSION['logia']);
            $trabajos->setCveVolumen($volumenes->getCveVolumen());
            $trabajos->grabar();
        }
        
        
    }
    if ($_POST['xAccion'] == 'eliminar') {
       // $oriente->borrar($_POST['txtIdVolumenEli']);
    }
    if ($_POST['xAccion'] == 'logout') {
        unset($_SESSION['habilitado']);
        unset($_SESSION['logia']);
        header('Location:login_logia.php');
        return;
    }
}


$sql = "SELECT * FROM volumenes ORDER BY grado,titulo ";
$rst = UtilDB::ejecutaConsulta($sql);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MSF Admin | Trabajos logiales</title>
        <meta charset="utf-8">
        <meta name="author" content="Webxico & Cuetox">
        <meta name="description" content="Página oficial de Masonería Sin Fronteras">
        <meta name="keywords" content="masoneria sin fronteras,masoneria,masonería,masonería sin fronteras,leslie silva lorca,fenix 5, estado restauración, gran logia, aprendiz, compañero, maestro mason,maestro masón, AP:., ap:., comp:.,M:.M:., M:., mason, masón, taller de aprendiz,servicios profesionales, profesiones, libros masonicos,msf, MSF">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
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
            <?php $_GET['q'] = "trabajos_logiales";
            include './includeMenuLogias.php';
            ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Trabajos logiales de <?php echo($logia->getNombre()); ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" >
                    <div class="col-sm-4">&nbsp;</div>
                    <div class="col-sm-4">
                        <form role="form" name="frmVolumenesLogia" id="frmVolumenesLogia" action="trabajos_logiales.php" method="post">
                            <div class="form-group">
                                <label for="txtIdVolumen"><input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" /></label>
                                <input type="hidden" class="form-control" id="txtIdVolumenEli" name="txtIdVolumenEli"  value="">    
                                <input type="text" class="form-control" id="txtIdVolumen" name="txtIdVolumen"
                                       placeholder="ID volumen" value="<?php echo($volumenes->getCveVolumen()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="txtTitulo">Título</label>
                                <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" 
                                       placeholder="Descripción" value="<?php echo($volumenes->getTitulo()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="txtAutor">Autor</label>
                                <input type="text" class="form-control" id="txtAutor" name="txtAutor" 
                                       placeholder="Autor" value="<?php echo($volumenes->getAutor()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="txtDescripcion">Descripción</label>
                                <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" 
                                       placeholder="Descripción del trabajo" value="<?php echo($volumenes->getDescripcion()); ?>">
                            </div>
                              <div class="form-group">
                                <label for="cmbCveGrado">Grado:</label>
                                <select name="cmbCveGrado" id="cmbCveOriente" class="form-control" placeholder="Grado">
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                    <option value="1" <?php echo($volumenes->getGrado()==1?"Selected":""); ?> >Aprendiz</option>
                                    <option value="2" <?php echo($volumenes->getGrado()==2?"Selected":""); ?>>Compañero</option>
                                    <option value="3" <?php echo($volumenes->getGrado()==3?"Selected":""); ?>>Maestro</option>
                                </select>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="cbxActivo" name="cbxActivo" value="1" checked="<?php echo($volumenes->getCveVolumen() != 0 ? ($volumenes->getActivo() == 1 ? "checked" : "") : "checked"); ?>"> Activo
                                </label>
                            </div>
                            <button type="button" class="btn btn-default" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-default" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>

                            <br/>
                            <br/>
                            <table class="table table-bordered table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID Volumen</th>
                                        <th>Grado</th>
                                        <th>Título</th>
                                        <th>Imagen</th>
                                         <th>Archivo</th>
                                        <th>Activo</th>
                                        <th>Desactivar</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php foreach ($rst as $row) { ?>
                                        <tr>
                                            <th><a href="javascript:void(0);" onclick="$('#txtIdVolumen').val(<?php echo($row['cve_volumen']); ?>);
                                                    recargar();"><?php echo($row['cve_volumen']); ?></a></th>
                                            <th><?php echo(($row['grado']==1?"Aprendiz":($row['grado']==2?"Compañero":($row['grado']==3?"Maestro":"")))); ?></th>
                                            <th><?php echo($row['titulo']); ?></th>
                                            <th> Subir imagen</th>
                                            <th>Subir Archivo</th>
                                            <th><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></th>
                                            <th><button type="button" class="btn btn-default" id="btnEliminar" name="btnEliminar" onclick="eliminar(<?PHP echo $row['cve_oriente']; ?>);">Desactivar</button></th>
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
        <!-- Bootstrap Core JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/dist/js/sb-admin-2.js"></script>
        <script>
            $(document).ready(function () {

                $('[data-toggle="popover"]').popover({placement: 'top', html: true, trigger: 'click hover'});

                /* Limpiar la ventana modal para volver a usar*/
                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });

            });

            function logout()
            {
                alert("esta intentando salir");
                $("#xAccion").val("logout");
                $("#frmVolumenesLogia").submit();
            }

            function msg(opcion)
            {
                switch (opcion)
                {
                    case 0:
                        alert("[ERROR] Volumen no grabado");
                        break;
                    case 1:
                        alert("Volumen grabado con éxito!");
                        break;
                    default:
                        break;

                }

            }

            function limpiar()
            {
                $("#xAccion").val("0");
                $("#txtIdVolumen").val("0");
                $("#frmVolumenesLogia").submit();
            }

            function grabar()
            {
                $("#xAccion").val("grabar");
                $("#frmVolumenesLogia").submit();

            }

            function eliminar(valor)
            {

                $("#xAccion").val("eliminar");
                $("#txtIdVolumenEli").val(valor);
                $("#frmVolumenesLogia").submit();

            }



            function abrirVentana() {
                var w = 400;
                var h = 400;
                var left = (screen.width / 2) - (w / 2);
                var top = (screen.height / 2) - (h / 2);
                var action = "muestra_ritos.php";
                window.open(action, 'MuestraGranOrientes', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
            }

            function recargar()
            {
                $("#xAccion").val("recargar");
                $("#frmVolumenesLogia").submit();

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

