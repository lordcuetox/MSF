<?php
require_once '../clases/GrandesOrientes.php';
require_once '../clases/UtilDB.php';
require_once '../clases/GrandesLogias.php';;
session_start();

if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
}

$clasf = new GrandesLogias();
$count = NULL;
$msg = "";

if (isset($_POST['txtCveGranLogia'])) {
    if ($_POST['txtCveGranLogia'] != 0) {
        $clasf = new GrandesLogias($_POST['txtCveGranLogia']);
        
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {
        $clasf->setCveOriente($_POST['cmbCveOriente']);
        $clasf->setCveRito($_POST['cmbCveRito']);
        $clasf->setNombre($_POST['txtDescripcion']);
           $clasf->setEstado($_POST['txtEstado']);
              $clasf->setDireccion($_POST['txtDireccion']);
        
        $clasf->setActivo(isset($_POST['cbxActivo']) ? "1" : "0");
        $count = $clasf->grabar();
        if ($count != 0) {
            $msg = "Gran Logia grabada con éxito!";
        } else {
            $msg = "[ERROR] Gran Logia no grabada";
        }
    }
    if ($_POST['xAccion'] == 'eliminar') {
        $clasf->borrar($_POST['txtCveGranLogiaEli']);
    }
    if ($_POST['xAccion'] == 'logout') {
        unset($_SESSION['cve_usuario']);
        header('Location:login.php');
        return;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>MSF Admin| Catálogo de grandes logias</title>
        <meta charset="utf-8">
        <meta name="author" content="Webxico & Cuetox">
        <meta name="description" content="Página oficial de Masonería Sin Fronteras">
        <meta name="keywords" content="masoneria sin fronteras,masoneria,masonería,masonería sin fronteras,leslie silva lorca,fenix 5, estado restauración, gran logia, aprendiz, compañero, maestro mason,maestro masón, AP:., ap:., comp:.,M:.M:., M:., mason, masón, taller de aprendiz,servicios profesionales, profesiones, libros masonicos,msf, MSF">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
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
        <?php $_GET['q'] = "cat_grandes_logias";
        include './includeMenuAdmin.php'; ?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Catálogo de Grandes Logias</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row" >
                    <div class="col-sm-4">&nbsp;</div>
                    <div class="col-sm-4">
                        <form role="form" name="frmGrandesLogias" id="frmGrandesLogias" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="form-group">
                                <label for="txtCveGranLogia"><input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" /></label>
                                <input type="hidden" class="form-control" id="txtCveGranLogiaEli" name="txtCveGranLogiaEli"  value=""> 
                                <input type="hidden" class="form-control" id="txtCveGranLogia" name="txtCveGranLogia" placeholder="ID gran logia" value="<?php echo($clasf->getCveGranLogia()); ?>">
                            </div>
                            <div class="form-group">
                                <label for="cmbCveOriente">Gran Oriente:</label>
                                <select name="cmbCveOriente" id="cmbCveOriente" class="form-control" placeholder="Gran Oriente">
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                    <?php
                                    $sql2 = "SELECT * FROM grandes_orientes where activo=1 ORDER BY descripcion";
                                    $rst2 = UtilDB::ejecutaConsulta($sql2);
                                    foreach ($rst2 as $row) {
                                        echo("<option value='" . $row['cve_oriente'] . "' " . ($clasf->getCveOriente() != 0 ? ($clasf->getCveOriente()== $row['cve_oriente'] ? "selected" : "") : "") . ">" . $row['descripcion'] . "</option>");
                                    }
                                    $rst2->closeCursor();
                                    ?>

                                </select>
                            </div>
                                                        <div class="form-group">
                                <label for="cmbCveRito">Rito:</label>
                                <select name="cmbCveRito" id="cmbCveRito" class="form-control" placeholder="Rito">
                                    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                    <?php
                                    $sql2 = "SELECT * FROM ritos where activo=1 ORDER BY cve_rito";
                                    $rst2 = UtilDB::ejecutaConsulta($sql2);
                                    foreach ($rst2 as $row) {
                                        echo("<option value='" . $row['cve_rito'] . "' " . ($clasf->getCveGranLogia() != 0 ? ($clasf->getCveRito() == $row['cve_rito'] ? "selected" : "") : "") . ">" . $row['descripcion'] . "</option>");
                                    }
                                    $rst2->closeCursor();
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="txtDescripcion">Gran Logia:</label>
                                <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" 
                                       placeholder="Descripción" value="<?php echo($clasf->getNombre()); ?>">
                            </div>
                             <div class="form-group">
                                <label for="txtEstado">Estado:</label>
                                <input type="text" class="form-control" id="txtEstado" name="txtEstado" 
                                       placeholder="Estado" value="<?php echo($clasf->getEstado()); ?>">
                            </div>
                                  <div class="form-group">
                                <label for="txtDireccion">Dirección:</label>
                                <input type="text" class="form-control" id="txtEstado" name="txtDireccion" 
                                       placeholder="calle, colonia, municipio,estado, c.p." value="<?php echo($clasf->getDireccion()); ?>">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="cbxActivo" name="cbxActivo" value="1" checked="<?php echo($clasf->getCveGranLogia() != 0 ? ($clasf->getActivo() == 1 ? "checked" : "") : "checked"); ?>"> Activo
                                </label>
                            </div>
                            <button type="button" class="btn btn-default" id="btnLimpiar" name="btnLimpiar" onclick="limpiar();">Limpiar</button>
                            <button type="button" class="btn btn-default" id="btnGrabar" name="btnGrabar" onclick="grabar();">Enviar</button>
                        </form>
                        <br/>
                        <br/>
                        <div class="<?php echo($count != 0 ? "alert alert-success" : "alert alert-danger"); ?>" style="<?php echo($count == NULL ? "display:none;" : "display:block;"); ?>"><?php echo($msg); ?></div>
                        <br/>
                        <br/>
                        <!-- Aqui se cargan los datos vía AJAX-->
                        <div id="ajax"></div>
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
            $(document).ready(function () {
                $("#cmbCveOriente").change(function () {
                    //    var optionSelected = $("option:selected", this);
                    //var valueSelected = this.value;
                    cargarMuestra(this.value);

                });

                /*$('#cmbCveOriente').on('change', function (e) {
                 var optionSelected = $("option:selected", this);
                 var valueSelected = this.value;
                 alert(this.value);
                 });*/

            });

            function logout()
            {
                $("#xAccion").val("logout");
                $("#frmGrandesLogias").submit();
            }

            function cargarMuestra(cveOriente)
            {   //En el div con id 'ajax' se cargara lo que devuelva el ajax, esta petición  es realizada como POST

                $("#ajax").load("cat_grandes_logias_ajax.php", {"cveOriente": cveOriente}, function (responseTxt, statusTxt, xhr) {
                    if (statusTxt == "success")
                        //alert("External content loaded successfully!");
                        if (statusTxt == "error")
                            alert("Error: " + xhr.status + ": " + xhr.statusText);
                });
            }

            function limpiar()
            {
                $("#xAccion").val("0");
                $("#txtCveGranLogia").val("0");
                $("#frmGrandesLogias").submit();
            }

            function grabar()
            {
                $("#xAccion").val("grabar");
                $("#frmGrandesLogias").submit();

            }


            function recargar()
            {
                $("#xAccion").val("recargar");
                $("#frmGrandesLogias").submit();

            }

            function eliminar(valor)
            {
                $("#xAccion").val("eliminar");
                $("#txtCveGranLogiaEli").val(valor);
                $("#frmGrandesLogias").submit();
            }
        </script>
    </body>
</html>
