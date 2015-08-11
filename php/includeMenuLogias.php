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
        <a class="navbar-brand" href="index.html">Administrador</a>
    </div>
    <!-- /.navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="trabajos_logiales.php" <?php echo(($origen == "Trabajos_logiales") ? "class=\"active\"" : ""); ?>><i class="fa fa-newspaper-o"></i>Trabajos Logiales</a>
                    <a href="javascript:void(0);" onclick="logout();"><i class="fa fa-sign-out"></i> CERRAR SESIÓN</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>