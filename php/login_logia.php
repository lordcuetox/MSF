<?php
require_once '../clases/UtilDB.php';
session_start();
if (isset($_SESSION['habilitado'])) {
    header('Location:trabajos_logiales.php');
    return;
}

if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == "login") {
        $username = $_POST['txtUser'];
        $password = $_POST['txtPassword'];
        // $sql = sprintf("SELECT * FROM prospectos WHERE habilitado = '" . $_POST['txtUser'] . "' AND fresita = '" . $_POST['txtPassword'] . "'");
        $sql = sprintf("SELECT cve_logia,habilitado,  nombre FROM logias WHERE habilitado = '%s' AND fresita = '%s';", $username, $password);
        $rst = UtilDB::ejecutaConsulta($sql);
        if ($rst->rowCount() > 0) {
            foreach ($rst as $row) {
                $_SESSION['habilitado'] = $row['habilitado'];
                $_SESSION['logia'] = $row['cve_logia'];
               header('Location:trabajos_logiales.php');
              //  die();
              //  return;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MSF | Mi Cuenta</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
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
        <div class="container">
                  <?php include 'analyticstracking.php'; ?>
            <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<a href="../index.php">Regresar</a>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <div class="login-panel panel panel-default">

                        <div class="panel-heading">
                            <h3 class="panel-title">Iniciar sesión</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php echo($_SERVER['PHP_SELF']) ?>" name="frmLogin" id="frmLogin" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="hidden" name="xAccion" id="xAccion" value="0" />
                                        <input class="form-control" placeholder="Usuario" name="txtUser" id="txtUser" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Contraseña" name="txtPassword" id="txtPassword" type="password" value="">
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="button" name="btnLogin" id="btnLogin" value="Login" class="btn btn-lg btn-success btn-block" onclick="login()"/>
                                    <br/>
                                    <div class="form-group">
                                        <ol style=" text-align:left">
                                            <li>Si ya tiene una cuenta, ingrese <strong>usuario</strong> y <strong>contraseña</strong> en los campos de arriba&nbsp;<span class="glyphicon glyphicon-arrow-up"></span></li><br/>
                                      </li>
                                        </ol>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
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
            $(document).keypress(function (e) {
                if (e.which === 13) {
                    login();
                }
            });

            function login()
            {
                $("#xAccion").val("login");
                $("#frmLogin").submit();

            }
        </script>
    </body>
</html>