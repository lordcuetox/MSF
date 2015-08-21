<?php
require_once '../clases/UtilDB.php';
require_once '../clases/Biblioteca.php';
$biblioteca = new Biblioteca(isset($_GET['t']) ? ((int) $_GET['t']):0);
$sql = NULL;
$rst = NULL;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>MSF | Masonería Sin Fronteras | Biblioteca | <?php echo($biblioteca->getDescripcion()); ?></title>
        <meta name="author" content="Webxico & Cuetox">
        <meta name="description" content="Página oficial de Masonería Sin Fronteras">
        <meta name="keywords" content="masoneria sin fronteras,masoneria,masonería,masonería sin fronteras,leslie silva lorca,fenix 5, estado restauración, gran logia, aprendiz, compañero, maestro mason,maestro masón, AP:., ap:., comp:.,M:.M:., M:., mason, masón, taller de aprendiz,servicios profesionales, profesiones, libros masonicos,msf, MSF">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
        <link href="../css/msf.css" rel="stylesheet" />
        <link rel="stylesheet" href="../lib/bootstrap-3.3.4-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../lib/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">
        <script src="../js/jQuery/jquery-1.11.2.min.js"></script>
        <script src="../lib/bootstrap-3.3.4-dist/js/bootstrap.min.js" ></script>
        <script src="../js/msf.js" type="text/javascript"></script>
        <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            $(document).ready(function () {
                getVolumenesBy($("#xCveTipo").val(),'A');
                $("a.biblioteca").click(function () {
                    getVolumenesBy($("#xCveTipo").val(),$(this).html());
                });
                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });

            });
        </script>
    </head>
    <body>
        <?php include 'analyticstracking.php'; ?>
        <div class="container"> 
            <?php include 'includeHeader.php'; ?>
            <div class="row">
                <div class="col-lg-8">
                    <!--<div class="row">
                        <div class="col-md-12">
                            <h1 class="visible-lg">Large devices </h1>
                            <h1 class="visible-md">Medium devices</h1>
                            <h1 class="visible-sm">Small devices</h1>
                            <h1 class="visible-xs">Extra small devices </h1>
                        </div>
                    </div>-->
                    <div class="row">
                        <div class="col-md-12"><input type="hidden" name="xCveTipo" id="xCveTipo" value="<?php echo($biblioteca->getCveTipo()); ?>" />
                            <h1>Biblioteca | <?php echo($biblioteca->getDescripcion()); ?></h1>
                            <br/>
                            <div style="text-align: center;"> 
                                <a href="javascript:void(0);" class="biblioteca">A</a>| <a href="javascript:void(0);" class="biblioteca">B</a>| <a href="javascript:void(0);"  class="biblioteca">C</a>| <a href="javascript:void(0);" class="biblioteca">D</a>| <a href="javascript:void(0);" class="biblioteca">E</a>| <a href="javascript:void(0);" class="biblioteca">F</a>| <a href="javascript:void(0);" class="biblioteca">G</a>| <a href="javascript:void(0);" class="biblioteca">H</a>| <a href="javascript:void(0);" class="biblioteca">I</a>| <a href="javascript:void(0);" class="biblioteca">J</a>| <a href="javascript:void(0);" class="biblioteca">K</a>| <a href="javascript:void(0);" class="biblioteca">L</a>| <a href="javascript:void(0);" class="biblioteca">M</a>| <a href="javascript:void(0);" class="biblioteca">N</a>| <a href="javascript:void(0);" class="biblioteca">O</a>| <a href="javascript:void(0);" class="biblioteca">P</a>| <a href="javascript:void(0);" class="biblioteca">Q</a>| <a href="javascript:void(0);" class="biblioteca">R</a>| <a href="javascript:void(0);" class="biblioteca">S</a>| <a href="javascript:void(0);" class="biblioteca">T</a>| <a href="javascript:void(0);" class="biblioteca">U</a>| <a href="javascript:void(0);" class="biblioteca">V</a>| <a href="javascript:void(0);" class="biblioteca">W</a>| <a href="javascript:void(0);" class="biblioteca">X</a>| <a href="javascript:void(0);" class="biblioteca">Y</a>| <a href="javascript:void(0);" class="biblioteca">Z</a> | 
                            </div>
                            <div id="ajax_results" style="text-align: left;margin-top: 25px;"></div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
                <?php include 'includeAnuncios.php'; ?>
            </div>
            <div class="row">
                <div class="col-md-12" id="ventana_modal">
                    <div class="modal fade" id="mDetalleVolumen" tabindex="-1" role="dialog" aria-labelledby="mDetalleVolumen" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'includeFooter.php'; ?>
        </div>
    </body> 
</html>