<?php
require_once 'clases/UtilDB.php';
$sql = NULL;
$rst = NULL;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>MSF | Masoneria Sin Fronteras</title>
        <meta name=”description” content="Página oficial de Masoneria Sin Fronteras">
        <meta name=”keywords” content="Masoneria, MSF, Masones">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link href="css/msf.css" rel="stylesheet" />
        <link rel="stylesheet" href="lib/bootstrap-3.3.4-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">
        <script src="js/jQuery/jquery-1.11.2.min.js"></script>
        <script src="lib/bootstrap-3.3.4-dist/js/bootstrap.min.js" ></script>
        <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            $(document).ready(function () {

                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });

            });
        </script>
    </head>
    <body>
        <div class="container"> 
            <?php include './php/includeHeader.php'; ?>
            <!--<div class="row">-->
                <?php
                $sql = "SELECT cve_evento,nombre,foto_principal FROM eventos WHERE foto_principal IS NOT NULL AND fecha_fin >= NOW() ORDER BY cve_evento DESC";
                $rst = UtilDB::ejecutaConsulta($sql);
                $count = 0;
                $carousel_indicators = "";
                $carousel_inner = "";

                if ($rst->rowCount() > 0) {
                    ?>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">

                        <?php
                        foreach ($rst as $row) {
                            $carousel_indicators .= "<li data-target=\"#myCarousel\" data-slide-to=\"" . $count . "\" " . ($count === 0 ? "class=\"active\"" : "") . "></li>";

                            $carousel_inner .="<div class=\"item " . ($count == 0 ? "active" : "") . "\">";
                            $carousel_inner .= "<a href=\"javascript:void(0);\" data-toggle=\"modal\" data-remote=\"php/eventos_id.php?id=" . $row['cve_evento'] . "\" data-target=\"#mDetalleEvento\">";
                            $carousel_inner .="<img src=\"" . $row['foto_principal'] . "\" alt=\"" . $row['nombre'] . "\" class=\"img-responsive\">";
                            $carousel_inner .= "</a>";
                            $carousel_inner .="</div>";

                            $count++;
                        }
                        ?>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php echo($carousel_indicators); ?>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php echo($carousel_inner); ?>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div> 
                    <?php
                }
                $rst->closeCursor();
                $count = 0;
                ?>

            <!--</div>-->
            <div class="row" id="seccion_principal">
                <div class="col-lg-8" id="seccion_izq">
                    <div class="col-lg-12" id="seccion_izq_noticia">
                        <?php
                        $sql = "SELECT * FROM noticias WHERE foto_portada IS NOT NULL AND fecha_fin >= NOW() ORDER BY cve_noticia DESC";
                        $rst = UtilDB::ejecutaConsulta($sql);

                        if ($rst->rowCount() > 0) {
                            foreach ($rst as $row) {
                                ?>

                                <div class="row noticiaCompleta" >
                                    <div class="col-lg-6">
                                        <a href="javascript:void(0);" data-toggle="modal" data-remote="php/noticias_id.php?id=<?php echo($row['cve_noticia']); ?>" data-target="#mDetalleNoticia">
                                            <img src="<?php echo($row['foto_portada']); ?>" class="img-responsive"/>
                                        </a>
                                    </div> 
                                    <div class="col-lg-6 textoNoticia">
                                        <p class="tituloNoticia">
                                            <a href="javascript:void(0);" data-toggle="modal" data-remote="php/noticias_id.php?id=<?php echo($row['cve_noticia']); ?>" data-target="#mDetalleNoticia">
                                                <?php echo($row['titulo']); ?>
                                            </a>
                                        </p>
                                        <p class="texto"> <?php echo($row['noticia_corta']); ?></p>
                                    </div> 
                                </div>

                                <?php
                            }
                        }$rst->closeCursor();
                        ?>      
                    </div>
                    <div class="col-lg-12" id="seccion_izq_logias">
                        <a href="php/grandes_orientes.php"><img src="img/logias.jpg" alt="" class="img-responsive"/></a>
                    </div>
                    <div class="col-lg-12" id="seccion_izq_clas_biblioteca">
                        <div class="col-lg-6" id="clasificados">
                            <img src="img/biblioteca.jpg" class="img-responsive img-thumbnail"/>
                        </div> 
                        <div class="col-lg-6" id="biblioteca">
                            <a href="php/servicios_profesionales.php"><img src="img/clasificados.jpg" class="img-responsive img-thumbnail"/></a>
                        </div> 
                    </div>

                </div>
                <?php include './php/includeAnuncios.php'; ?>
            </div>
            <div class="row">
                <div class="col-md-12" id="ventana_modal">
                    <div class="modal fade" id="mDetalleEvento" tabindex="-1" role="dialog" aria-labelledby="mmDetalleEventoLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="ventana_modal2">
                    <div class="modal fade" id="mDetalleNoticia" tabindex="-1" role="dialog" aria-labelledby="mmDetalleNoticiaLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content"></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <?php include './php/includeFooter.php'; ?>
    </body>
</html>