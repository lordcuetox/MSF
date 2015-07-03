<?php
require_once '../clases/Rito.php';
require_once '../clases/UtilDB.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) 
{
    header('Location:login.php');
    return;
}



$rito = new Rito();
$count = NULL;

if (isset($_POST['txtIdRito'])) {
    if ($_POST['txtIdRito'] != 0) {
        $rito = new Rito($_POST['txtIdRito']);
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {
        $rito->setDescripcion($_POST['txtDescripcion']);
        $rito->setActivo(isset($_POST['cbxActivo']) ? "1" : "0");
        $count = $rito->grabar();
    }
       if ($_POST['xAccion'] == 'eliminar') {
        $rito->borrar($_POST['txtIdRitoEli']);
    }
    if ($_POST['xAccion'] == 'logout')
    {   
        unset($_SESSION['cve_usuario']);
        header('Location:login.php');
        return;
    }
}


$sql = "SELECT * FROM ritos ORDER BY cve_rito";
$rst = UtilDB::ejecutaConsulta($sql);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MSF Admin | Grandes Logias</title>
        <meta charset="utf-8">
        <meta name="author" content="Webxico & Cuetox">
        <meta name="description" content="Página oficial de Masoneria Sin Fronteras">
        <meta name="keywords" content="masoneria sin fronteras,masoneria,masonería,masonería sin fronteras,leslie silva lorca,fenix 5, estado restauración, gran logia, aprendiz, compañero, maestro mason,maestro masón, AP:., ap:., comp:.,M:.M:., M:., mason, masón, taller de aprendiz,servicios profesionales, profesiones, libros masonicos,msf, MSF">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <?php include 'analyticstracking.php'; ?>
        <div id="wrapper">
            <?php $_GET['q'] = "grandes_logias"; include './includeMenuAdmin.php'; ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Grandes Logias</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" >
                    <div class="col-sm-4">&nbsp;</div>
                    <div class="col-sm-4">
                        <form role="form" name="frmRitos" id="frmRitos" action="cat_ritos.php" method="POST">
                            <div class="form-group">
                                <label for="txtIdRito"><input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" /></label>
                                       <input type="hidden" class="form-control" id="txtIdRitoEli" name="txtIdRitoEli"  value="">    
                                <input type="hidden" class="form-control" id="txtIdRito" name="txtIdRito"
                                       placeholder="ID Rito" value="<?php echo($rito->getCve_rito()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="txtDescripcion">Descripción</label>
                                <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" 
                                       placeholder="Descripción" value="<?php echo($rito->getDescripcion()); ?>">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="cbxActivo" name="cbxActivo" value="1" checked="<?php echo($rito->getCve_rito() != 0 ? ($rito->getActivo() == 1 ? "checked" : "") : "checked"); ?>"> Activo
                                </label>
                            </div>
                            <button type="button" class="btn btn-default" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-default" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>
                       
                        <br/>
                        <br/>
                        <table class="table table-bordered table-striped table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>ID Rito</th>
                                    <th>Descripción</th>
                                    <th>Foto</th>
                                    <th>Activo</th>
                                    <th>Desactivar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rst as $row) { ?>
                                    <tr>
                                        <th><a href="javascript:void(0);" onclick="$('#txtIdRito').val(<?php echo($row['cve_rito']); ?>);
                                                    recargar();"><?php echo($row['cve_rito']); ?></a></th>
                                        <th><?php echo($row['descripcion']); ?></th>
                                        <th><?php echo($row['foto']); ?></th>
                                        <th><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></th>
                                        <th><button type="button" class="btn btn-default" id="btnEliminar" name="btnEliminar" onclick="eliminar(<?PHP echo $row['cve_rito'];?>);">Desactivar</button></th>
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
            $("#frmRitos").submit();
        }
            
        function msg(opcion)
        {
            switch (opcion)
            {
                case 0:
                    alert("[ERROR] Rito no grabado");
                    break;
                case 1:
                    alert("Rito grabado con exito!");
                    break;
                default:
                    break;

            }

        }

        function limpiar()
        {
            $("#xAccion").val("0");
            $("#txtIdRito").val("0");
            $("#frmRitos").submit();
        }

        function grabar()
        {
            $("#xAccion").val("grabar");
            $("#frmRitos").submit();

        }
        
           function eliminar(valor)
        {
           
            $("#xAccion").val("eliminar");
            $("#txtIdRitoEli").val(valor);
            $("#frmRitos").submit();

        }



        function abrirVentana() {
            var w = 400;
            var h = 400;
            var left = (screen.width / 2) - (w / 2);
            var top = (screen.height / 2) - (h / 2);
            var action = "muestra_ritos.php";
            window.open(action, 'MuestraRitos', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        }

        function recargar()
        {
            $("#xAccion").val("recargar");
            $("#frmRitos").submit();

        }


        msg(<?php echo($count) ?>);
        </script>
    </body>
</html>

