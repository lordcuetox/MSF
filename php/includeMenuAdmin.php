<?php
$origen = $_GET['q'];
?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Administrador de MSF</a>
    </div>
    <!-- /.navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="cat_noticias.php" <?php echo(($origen == "noticias") ? "class=\"active\"" : ""); ?>><i class="fa fa-newspaper-o"></i> Noticias</a>
                    <a href="cat_eventos.php" <?php echo(($origen == "eventos") ? "class=\"active\"" : ""); ?>><i class="fa fa-thumb-tack"></i> Eventos</a>
                    <a href="cat_servicios_profesionales.php" <?php echo(($origen == "servicios") ? "class=\"active\"" : ""); ?>><i class="fa fa-bullhorn"></i> Servicios Profesionales</a>
                    <a href="cat_profesiones.php" <?php echo(($origen == "profesiones") ? "class=\"active\"" : ""); ?>><i class="fa fa-graduation-cap"></i> Profesiones</a>
                    <a href="cat_biblioteca.php" <?php echo(($origen == "bibliteca") ? "class=\"active\"" : ""); ?>><i class="fa fa-book"></i> Biblioteca</a>
                    <a href="cat_ritos.php" <?php echo(($origen == "ritos") ? "class=\"active\"" : ""); ?>><i class="fa fa-university"></i> Ritos</a>
                    <a href="cat_clasificaciones.php" <?php echo(($origen == "clasificaciones") ? "class=\"active\"" : ""); ?>><i class="fa fa-leaf"></i> Clasificaciones</a>
                    <a href="cat_grados.php" <?php echo(($origen == "grados") ? "class=\"active\"" : ""); ?>><i class="fa fa-crop"></i> Grados</a>
                    <a href="cat_grandes_orientes.php" <?php echo(($origen == "grandes_orientes") ? "class=\"active\"" : ""); ?>><i class="fa fa-globe"></i> Grandes Orientes</a>
                    <a href="cat_grandes_logias.php" <?php echo(($origen == "grandes_logias") ? "class=\"active\"" : ""); ?>><i class="fa fa-gears"></i> Grandes Logias</a>
                    <a href="cat_logias.php" <?php echo(($origen == "logias") ? "class=\"active\"" : ""); ?>><i class="fa fa-group"></i> Logias</a>
                    <a href="cat_reaton.php" <?php echo(($origen == "reaton") ? "class=\"active\"" : ""); ?>><i class="fa fa-key"></i> Usuario y Contraseña</a>
                    <a href="javascript:void(0);" onclick="logout();"><i class="fa fa-sign-out"></i> CERRAR SESIÓN</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>