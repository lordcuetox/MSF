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
        <script src="js/JQuery/jquery-1.11.2.min.js"></script>
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
                    <a href="https://http://masoneriasinfronteras.blogspot.mx"><img src="img/encabezado/Blogger-icon.png" class="img-responsive" alt="Blogspot"/></a>
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
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div> 
            </div>
            <div class="row" id="seccion_principal">
                <div class="col-lg-8" id="seccion_izq">
                    <div class="row noticiaCompleta" >
                        <div class="col-lg-6">
                            <img src="img/noticias/1.jpg" class="img-responsive"/>
                        </div> 
                        <div class="col-lg-6 textoNoticia">
                            <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <p> Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
                            <p> Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
                            <p> Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc.</p>
                        </div> 
                    </div>
                        <div class="row noticiaCompleta">
                        <div class="col-lg-6">
                            <img src="img/noticias/2.jpg" class="img-responsive"/>
                        </div> 
                        <div class="col-lg-6 textoNoticia">
                            <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <p> Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
                            <p> Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.</p>
                            <p> Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc.</p>
                        </div> 
                    </div>
                
                </div>
                <div class="col-lg-4" id="anuncios">Anuncios</div>
            </div>
            <footer></footer>
        </div>
    </body>
</html>
