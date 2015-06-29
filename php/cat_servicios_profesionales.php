<?php
require_once '../clases/RegistroProfesion.php';
require_once '../clases/Profesion.php';
require_once '../clases/UtilDB.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
}

$clasf = new RegistroProfesion();
$count = NULL;
$msg = "";

if (isset($_POST['txtCveRegistro'])) {
    if ($_POST['txtCveRegistro'] != 0) {
        $clasf = new RegistroProfesion($_POST['txtCveRegistro']);
    }
}


if (isset($_POST['xAccion'])) {
    if ($_POST['xAccion'] == 'grabar') {
        $clasf->setCve_profesion($_POST['cmbCveProfesion']);
        $clasf->setNombre_empresa($_POST['txtDescripcion']);
        $clasf->setDomicilio($_POST['txtDomicilio']);
        $clasf->setServicios_ofrecidos($_POST['txtServicios']);
        $clasf->setActivo(isset($_POST['cbxActivo']) ? "1" : "0");
        $count = $clasf->grabar();
        if ($count != 0) {
            $msg = "Registro grabado con éxito!";
        } else {
            $msg = "[ERROR] Registro no grabado";
        }
    }
    if ($_POST['xAccion'] == 'eliminar') {
        $clasf->borrar($_POST['txtCveRegistroEli']);
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
        <title>MSF Admin| Servicios profesionales</title>
        <meta charset="utf-8">
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
    <div id="wrapper">
        <?php $_GET['q'] = "cat_servicios_profesionales";include './includeMenuAdmin.php';?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Servicios Profesionales</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" >
                <div class="col-sm-8">&nbsp;</div>
                <div class="col-sm-8">
                    <form role="form" name="frmRegistroProfesiones" id="frmRegistroProfesiones" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="form-group">
                            <label for="txtCveRegistro"><input type="hidden" class="form-control" name="xAccion" id="xAccion" value="0" /></label>
                            <input type="hidden" class="form-control" id="txtCveRegistroEli" name="txtCveRegistroEli"  value=""> 
                            <input type="hidden" class="form-control" id="txtCveRegistro" name="txtCveRegistro" placeholder="ID Registro" value="<?php echo($clasf->getCve_registro()); ?>">
                        </div>
                        <div class="form-group">
                            <label for="cmbCveProfesion">Profesión:</label>
                            <select name="cmbCveProfesion" id="cmbCveProfesion" class="form-control" placeholder="Profesión">
                                <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                                <?php
                                $sql2 = "SELECT * FROM profesiones where activo=1 ORDER BY descripcion";
                                $rst2 = UtilDB::ejecutaConsulta($sql2);
                                foreach ($rst2 as $row) {
                                    echo("<option value='" . $row['cve_profesion'] . "' " . ($clasf->getCve_registro() != 0 ? ($clasf->getCve_profesion() == $row['cve_profesion'] ? "selected" : "") : "") . ">" . $row['descripcion'] . "</option>");
                                }
                                $rst2->closeCursor();
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtDescripcion">Descripción</label>
                            <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" 
                                   placeholder="Descripción" value="<?php echo($clasf->getNombre_empresa()); ?>">
                        </div>
                        <div class="form-group">
                            <label for="txtDomicilio">Domicilio:</label>
                            <textarea class="form-control" rows="4" cols="50" id="txtDomicilio" name="txtDomicilio" placeholder="Domicilio"><?php echo($clasf->getDomicilio()); ?></textarea>                         
                        </div>
                        <div class="form-group">
                            <label for="txtServicios">Servicios ofrecidos:</label>
                            <textarea class="form-control" rows="10" cols="50" id="txtServicios" name="txtServicios" placeholder="Servicios ofrecidos"><?php echo($clasf->getServicios_ofrecidos()); ?></textarea>                         
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="cbxActivo" name="cbxActivo" value="1" checked="<?php echo($clasf->getCve_registro() != 0 ? ($clasf->getActivo() == 1 ? "checked" : "") : "checked"); ?>"> Activo
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
            <div class="row" >
                <div class="col-sm-12">
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content"></div>
                        </div>
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
        $(document).ready(function () {
            
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });

            cargarMuestra($("#cmbCveProfesion").val());

            $("#cmbCveProfesion").change(function () {
                cargarMuestra(this.value);
            });

        });

        function logout()
        {
            $("#xAccion").val("logout");
            $("#frmRegistroProfesiones").submit();
        }

        function cargarMuestra(cveProfesion)
        {   //En el div con id 'ajax' se cargara lo que devuelva el ajax, esta petición  es realizada como POST

            $("#ajax").load("cat_servicios_profesionales_ajax.php", {"cveProfesion": cveProfesion}, function (responseTxt, statusTxt, xhr) {
                if (statusTxt === "success")
                {
                    $('[data-toggle="popover"]').popover({placement: 'top', html: true, trigger: 'click hover'});
                }

                if (statusTxt === "error")
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
            });
        }

        function limpiar()
        {
            $("#xAccion").val("0");
            $("#txtCveRegistro").val("0");
            $("#frmRegistroProfesiones").submit();
        }

        function grabar()
        {
            $("#xAccion").val("grabar");
            $("#frmRegistroProfesiones").submit();

        }


        function recargar()
        {
            $("#xAccion").val("recargar");
            $("#frmRegistroProfesiones").submit();

        }

        function eliminar(valor)
        {
            $("#xAccion").val("eliminar");
            $("#txtCveRegistroEli").val(valor);
            $("#frmRegistroProfesiones").submit();
        }

        function subir()
        {
            if ($("#fileToUpload").val() !== "")
            {
                $("#xAccion2").val("upload");
                $("#frmUpload").submit();
            }
            else
            {
                alert("No ha seleccionado un archivo para subir.");
            }
        }
    </script>
</body>
</html>