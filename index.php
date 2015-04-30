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
       <header>
           <div class="row">
     
             <div class="col-md-12 text-right" id="iconos_redes_sociales">
           <a href="https://www.facebook.com/MSFStore" target="_blank"> <figure id="twitter"><img src="img/encabezado/twitter.png" class="img-responsive"></figure> </a>
            <a href="https://www.facebook.com/MSFStore" target="_blank"><figure id="facebook"><img src="img/encabezado/facebook.png" class="img-responsive"></figure></a>
            <a href="https://www.facebook.com/MSFStore" target="_blank"><figure id="blog"><img src="img/encabezado/msficono.jpg" class="img-responsive"></figure> </a>
            <a href="https://www.facebook.com/MSFStore" target="_blank"><figure id="contactanos"><img src="img/encabezado/msficono.jpg" class="img-responsive"></figure> </a>
            </div>
           </div>
        </header> 
      
                  <div class="row">
                <div class="col-md-12 text-right" id="iconos_redes_sociales">
                    <a href="https://www.facebook.com/MSFStore" target="_blank"><img src="img/Facebook-icon.png" class="img-responsive " alt="Facebook"/></a>
                    <a href="https://twitter.com/masinfronteras" target="_blank"><img src="img/Twitter-icon.png" class="img-responsive" alt="Twitter"/></a>
                    <a href="mailto:msf_store@hotmail.com"><img src="img/Email-icon.png" class="img-responsive" alt="Email"/></a>
                </div>
                <div class="col-md-12" id="logo">
                    <img src="img/encabezado3.png" alt="Logo MSF Store" class="img-responsive"/>
                </div>
                <div class="col-md-12 text-right" id="enlaces">
                    <?php
                    if (!isset($_SESSION['habilitado']) && !isset($_SESSION['nombre_completo'])) {
                        ?>
                        <span class="glyphicon glyphicon-log-in"></span>&nbsp;<a href="php/login_cliente.php" target="_self">Iniciar sesión</a>
                        <span class="glyphicon glyphicon-user"></span>&nbsp;<a href="php/cat_prospectos.php" target="_self">Registro</a>
                        <?php
                    } else {
                        ?>
                        <span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;<a href="javascript:void(0);" data-toggle="modal" data-remote="php/viewShoppingCart.php" data-target="#mResumenCarritoCompras">Carrito de compras</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-user"></span>&nbsp;<a href="php/mis_pedidos.php" target="_blank"><?php echo($_SESSION['nombre_completo']); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="glyphicon glyphicon-log-out"></span>&nbsp;<a href="javascript:void(0);" onclick="logout();">Cerrar Sesión</a>
                        <?php
                    }
                    ?>

                </div>
            </div>
      

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">MSF</a>
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

        <section id="eventos">
            
        </section>
        <section id="contenedor">
            <article id="noticicias"></article>
            <article id="directorio"></article>
             <article id="clasificados"></article>
              <article id="biblioteca"></article>
        </section>
         <aside id="clasiPrincipal">aside</aside>
         <footer></footer>
         </div>
    </body>
</html>
