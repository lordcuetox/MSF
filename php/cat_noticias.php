<?php
require_once '../clases/Noticia.php';
require_once '../clases/UtilDB.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) 
{
    header('Location:login.php');
    return;
}



$noticia = new Noticia();
$count = NULL;

if (isset($_POST['txtCveNoticia'])) {
    if ($_POST['txtCveNoticia'] != 0) {
        $noticia = new Noticia($_POST['txtCveNoticia']);
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {
        $fi = strtotime(str_replace('/', '-', ($_POST['txtFechaInicio'] . " " . "00:00:00")));
        $ff = strtotime(str_replace('/', '-', ($_POST['txtFechaFin'] . " " . "23:59:59")));
        $finicio = date('Y-m-d H:i:s', $fi);
        $ffin = date('Y-m-d H:i:s', $ff);
        
        $noticia->setTitulo($_POST['txtTitulo']);
        $noticia->setNoticiaCorta($_POST['txtNoticiaCorta']);
        $noticia->setNoticia($_POST['txtNoticia']);
        $noticia->setFechaInicio($finicio);
        $noticia->setFechaFin($ffin);
         $count = $noticia->grabar();
    }

    if ($_POST['xAccion'] == 'logout')
    {   
        unset($_SESSION['cve_usuario']);
        header('Location:login.php');
        return;
    }
}


$sql = "SELECT * FROM noticias ORDER BY cve_noticia";
$rst = UtilDB::ejecutaConsulta($sql);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MSF Admin | Noticias</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../js/jQuery/jquery-ui-1.11.3/jquery-ui.min.css" rel="stylesheet"/>
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
        <div id="wrapper">
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
                                <a href="cat_noticias.php"><i class="fa fa-crop"></i> Noticias</a>
                                <a href="cat_eventos.php"><i class="fa fa-crop"></i> Eventos</a>
                                <a href="cat_servicios_profesionales.php"><i class="fa fa-crop"></i> Servicios Profesionales</a>
                                <a href="cat_profesiones.php"><i class="fa fa-crop"></i> Profesiones</a>
                                <a href="cat_biblioteca.php"><i class="fa fa-crop"></i> Biblioteca</a>
                                <a href="cat_ritos.php" ><i class="fa fa-university"></i> Ritos</a>
                                <a href="cat_clasificaciones.php" ><i class="fa fa-leaf"></i> Clasificaciones</a>
                                <a href="cat_grados.php"><i class="fa fa-crop"></i> Grados</a>
                                <a href="cat_grandes_orientes.php"><i class="fa fa-crop"></i> Grandes Orientes</a>
                                <a href="cat_grandes_logias.php"><i class="fa fa-crop"></i> Grandes Logias</a>
                                <a href="cat_logias.php"><i class="fa fa-crop"></i> Logias</a>
                                <a href="cat_reaton.php" class="active"><i class="fa fa-key"></i> Usuario y Contraseña</a>
                                <a href="javascript:void(0);" onclick="logout();"><i class="fa fa-sign-out"></i> CERRAR SESIÓN</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Noticias</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" >
                    <div class="col-sm-8">&nbsp;</div>
                    <div class="col-sm-8">
                        <form role="form" name="frmNoticias" id="frmNoticias" action="cat_noticias.php" method="POST">
                            <div class="form-group">
                                <label for="xAccion"><input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" /></label>
                               
                                <input type="hidden" class="form-control" id="txtCveNoticia" name="txtCveNoticia"
                                       placeholder="ID Noticia" value="<?php echo($noticia->getCveNoticia()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="txtTitulo">Título</label>
                                <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" 
                                       placeholder="Escriba un título para la notica" value="<?php echo($noticia->getTitulo()); ?>">
                            </div>
                               <div class="form-group">
                            <label for="txtNoticiaCorta">* Texto Previo:</label>
                            <textarea class="form-control" rows="4" cols="50" id="txtNoticiaCorta" name="txtNoticiaCorta" placeholder="Texto previo para visualizar en la principal"><?php echo($noticia->getNoticiaCorta()); ?></textarea>                         
                        </div>
                               <div class="form-group">
                            <label for="txtNoticia">* Texto Completo:</label>
                            <textarea class="form-control" rows="10" cols="50" id="txtNoticia" name="txtNoticia" placeholder="Texto completo de la noticia"><?php echo($noticia->getNoticia()); ?></textarea>                         
                        </div>
                                <div class="form-group">
                            <div class="date-form">
                                <div class="form-horizontal">
                                    <div class="control-group">
                                        <label for="txtFechaInicio">Fecha de inicio:</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="txtFechaInicio" name="txtFechaInicio" type="text" class="date-picker form-control"  value="<?php echo(substr(str_replace('-', '/', $noticia->getFechaInicio()), 0, 10)); ?>"/>
                                                <label for="txtFechaInicio" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <div class="form-group">
                            <div class="date-form">
                                <div class="form-horizontal">
                                    <div class="control-group">
                                        <label for="txtFechaFin">Fecha de fin:</label>
                                        <div class="controls">
                                            <div class="input-group">
                                                <input id="txtFechaFin" name="txtFechaFin" type="text" class="date-picker form-control"  value="<?php echo(substr(str_replace('-', '/', $noticia->getFechaFin()), 0, 10)); ?>"/>
                                                <label for="txtFechaFin" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                            <button type="button" class="btn btn-default" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-default" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>
                       
                        <br/>
                        <br/>
                        <table class="table table-bordered table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>ID Noticia</th>
                                    <th>Título</th>
                                    <th>Texto Previo</th>
                                    <th >Texto Noticia Completo</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Fin</th>
                                    <th>Foto de Portada</th>
                                    <th>Foto 1</th>
                                    <th>Foto 2</th>
                                    <th>Foto 3</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rst as $row) { ?>
                                    <tr>
                                        <th><a href="javascript:void(0);" onclick="$('#txtCveNoticia').val(<?php echo($row['cve_noticia']); ?>);
                                                    recargar();"><?php echo($row['cve_noticia']); ?></a></th>
                                        <th><?php echo($row['titulo']); ?></th>
                                        <th><?php echo($row['noticia_corta']); ?></th>
                                        <th><?php echo($row['noticia']); ?></th>
                                        <th><?php echo($row['fecha_inicio']); ?></th>
                                        <th><?php echo($row['fecha_fin']); ?></th>
                                        <th><?php echo($row['foto_portada']); ?></th>
                                        <th><?php echo($row['foto1']); ?></th>
                                        <th><?php echo($row['foto2']); ?></th>
                                        <th><?php echo($row['foto3']); ?></th>
                                        
                                        <th><button type="button" class="btn btn-default" id="btnEliminar" name="btnEliminar" onclick="eliminar(<?PHP echo $row['cve_noticia'];?>);">Eliminar</button></th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                         </form>
                    </div>
                    <div class="col-sm-4">&nbsp;</div>
                </div>
            </div>
        </div>    
    <!-- jQuery -->
    <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../js/jQuery/jquery-ui-1.11.3/jquery-ui.min.js"></script>
    <script src="../js/jQuery/jquery-ui-1.11.3/jquery.ui.datepicker-es-MX.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../twbs/plugins/startbootstrap-sb-admin-2-1.0.5/dist/js/sb-admin-2.js"></script>
    <script>
        function logout()
        {
            $("#xAccion").val("logout");
            $("#frmNoticias").submit();
        }
            
        function msg(opcion)
        {
            switch (opcion)
            {
                case 0:
                    alert("[ERROR] Noticia no grabada");
                    break;
                case 1:
                    alert("Noticia grabada con éxito!");
                    break;
                default:
                    break;

            }

        }

        function limpiar()
        {
            $("#xAccion").val("0");
            $("#txtCveNoticia").val("0");
            $("#frmNoticias").submit();
        }

        function grabar()
        {
            $("#xAccion").val("grabar");
            $("#frmNoticias").submit();

        }
        
           function eliminar(valor)
        {
           
            $("#xAccion").val("eliminar");
            $("#txtCveNoticia").val(valor);
            $("#frmNoticias").submit();

        }




        function recargar()
        {
            $("#xAccion").val("recargar");
            $("#frmNoticias").submit();

        }


        msg(<?php echo($count) ?>);
        </script>
    </body>
</html>

