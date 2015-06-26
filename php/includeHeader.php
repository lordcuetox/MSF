<?php $path = "/MSF"; ?>
<div class="row">
    <div class="col-md-12 text-right" id="iconos_redes_sociales">
        <img src="<?php echo($path);?>/img/encabezado/msficono.jpg" alt="Logo MSF " class="img-responsive" id="logo"/>
        <a href="https://www.facebook.com/masoneria.sinfronteraas" target="_blank"><img src="<?php echo($path);?>/img/encabezado/Facebook-icon.png" class="img-responsive " alt="Facebook"/></a>
        <a href="https://twitter.com/masinfronteras" target="_blank"><img src="<?php echo($path);?>/img/encabezado/Twitter-icon.png" class="img-responsive" alt="Twitter"/></a>
        <a href="http://masoneriasinfronteras.blogspot.mx" target="_blank"><img src="<?php echo($path);?>/img/encabezado/Blogger-icon.png" class="img-responsive" alt="Blogspot"/></a>
    </div>
</div>
<div class="row">
    <nav class="navbar navbar-inverse" >
        <div class="container-fluid" id="barra_nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>   
                    <span class="icon-bar"></span> 
                </button>
                <a class="navbar-brand" href="<?php echo($path);?>/index.php" id="fondo_barra" >MSF</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Quiénes Somos <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo($path);?>/php/ideario.php">Ideario</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Directorio</a></li>
                    <li><a href="<?php echo($path);?>/php/servicios_profesionales.php">Servicios Profesionales</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Biblioteca <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Libros</a></li>
                            <li><a href="#">Hemeroteca</a></li>
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
</div>