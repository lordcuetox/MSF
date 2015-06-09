<?php require_once 'clases/UtilDB.php'; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name=”description” content="Página oficial de Masoneria Sin Fronteras">
        <meta name=”keywords” content="Masoneria, MSF, Masones">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MSF| Masoneria Sin Fronteras</title>
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
            <div class="row">
                <?php
                $sql = "SELECT cve_evento,nombre,foto_principal FROM eventos WHERE foto_principal IS NOT NULL AND fecha_fin >= NOW()";
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

            </div>
            <div class="row" id="seccion_principal">
                <div class="col-lg-8" id="seccion_izq">
                    <div class="col-lg-12" id="seccion_izq_noticia">

                        <div class="row noticiaCompleta" >
                            <div class="col-lg-6">
                                <img src="img/noticias/1.jpg" class="img-responsive"/>
                            </div> 
                            <div class="col-lg-6 textoNoticia">
                                <p class="tituloNoticia"> Noticia 1</p>
                                <p class="texto"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            </div> 
                        </div>

                        <div class="row noticiaCompleta">
                            <div class="col-lg-6">
                                <img src="img/noticias/2.jpg" class="img-responsive"/>
                            </div> 
                            <div class="col-lg-6 textoNoticia">
                                <p class="tituloNoticia"> Noticia 2</p>
                                <p class="texto"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            </div> 
                        </div>
                        <div class="row noticiaCompleta">
                            <div class="col-lg-6">
                                <img src="img/noticias/3.jpg" class="img-responsive"/>
                            </div> 
                            <div class="col-lg-6 textoNoticia">
                                <p class="tituloNoticia"> Noticia 3</p>
                                <p class="texto"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            </div> 
                        </div>
                        <div class="row noticiaCompleta">
                            <div class="col-lg-6">
                                <img src="img/noticias/4.jpg" class="img-responsive"/>
                            </div> 
                            <div class="col-lg-6 textoNoticia">
                                <p class="tituloNoticia"> Noticia 4</p>
                                <p class="texto"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-12" id="seccion_izq_logias">
                        <img src="img/logias.jpg" alt="" class="img-responsive"/>
                    </div>
                    <div class="col-lg-12" id="seccion_izq_clas_biblioteca">
                        <div class="col-lg-6" id="clasificados">
                            <img src="img/biblioteca.jpg" class="img-responsive img-thumbnail"/>
                        </div> 
                        <div class="col-lg-6" id="biblioteca">
                            <img src="img/clasificados.jpg" class="img-responsive img-thumbnail"/>
                        </div> 
                    </div>

                </div>
                <div class="col-lg-4" id="anuncios">
                    <div class="row">
                        <p>Profesionales a tu servicio</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="http://msfarreos.com" target="_blank"> <img src="img/clasificados/1.jpg" class="img-responsive"/> </a>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="img/clasificados/2.jpg" class="img-responsive"/>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="img/clasificados/4.jpg" class="img-responsive"/>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="img/clasificados/3.jpg" class="img-responsive"/>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="img/clasificados/3.jpg" class="img-responsive"/>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <img src="img/clasificados/3.jpg" class="img-responsive"/>
                        </div> 
                    </div>
                </div>
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
            <?php include './php/includeFooter.php'; ?>
        </div>
    </body>
</html>