<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
    </head>
    <body>

        <div class="container">   
            <div class="row">
                <div class="col-md-12 text-right" id="iconos_redes_sociales">
                    <img src="img/encabezado/msficono.jpg" alt="Logo MSF " class="img-responsive" id="logo"/>
                    <a href="https://www.facebook.com/masoneria.sinfronteraas" target="_blank"><img src="img/encabezado/Facebook-icon.png" class="img-responsive " alt="Facebook"/></a>
                    <a href="https://twitter.com/masinfronteras" target="_blank"><img src="img/encabezado/Twitter-icon.png" class="img-responsive" alt="Twitter"/></a>
                    <a href="http://masoneriasinfronteras.blogspot.mx" target="_blank"><img src="img/encabezado/Blogger-icon.png" class="img-responsive" alt="Blogspot"/></a>
                </div>
            </div>




            <nav class="navbar navbar-inverse" >
                <div class="container-fluid" id="barra_nav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>   
                            <span class="icon-bar"></span> 
                        </button>
                        <a class="navbar-brand" href="index.php" id="fondo_barra" >MSF</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Quiénes Somos <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Page 1-1</a></li>
                                    <li><a href="#">Page 1-2</a></li>
                                    <li><a href="#">Page 1-3</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Directorio</a></li>
                            <li><a href="#">Servicios Profesionales</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Biblioteca <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Libros</a></li>
                                    <li><a href="#">Hemeroteca</a></li>
                                    <li><a href="#">Cosmos</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Registrate</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Inicia Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="row">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="img/eventos/1.jpg" alt="Chania" class="img-responsive">
                        </div>

                        <div class="item">
                            <img src="img/eventos/2.jpg" alt="Chania" class="img-responsive">
                        </div>

                        <div class="item">
                            <img src="img/eventos/3.jpg" alt="Flower" class="img-responsive">
                        </div>

                        <div class="item">
                            <img src="img/eventos/4.jpg" alt="Flower" class="img-responsive">
                        </div>
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
            <footer>
                <p class="text-muted text-center">Copyright <?php echo date("Y"); ?>| Masoneria Sin Fronteras| Powered By WEBXICO & Cuetox</p>
            </footer>
        </div>
    </body>
</html>
