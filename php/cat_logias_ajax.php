<?php
require_once '../clases/UtilDB.php';
require_once '../clases/Prospectos.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
}
if (isset($_POST['cveOriente']) && isset($_POST['cveGranLogia'])) {

    $cveOriente = $_POST['cveOriente'];
    $cveGranLogia = $_POST['cveGranLogia'];
    $sql = "SELECT * from logias where cve_oriente=$cveOriente and cve_gran_logia=$cveGranLogia order by nombre";
    $rst = UtilDB::ejecutaConsulta($sql);
    if ($rst->rowCount() > 0) {
        ?>
        <table class="table table-bordered table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th>ID Logia</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Horario</th>
                    <th>Foto</th>
                    <th>Nuevo Usuario</th>
                    <th>Usuarios</th>
                    <th>Activo</th>
                    <th>Desactivar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rst as $row) {
                    ?>
                    <tr>
                        <td><a href="javascript:void(0);" onclick="$('#txtCveLogia').val(<?php echo($row['cve_logia']); ?>);recargar();"><?php echo($row['cve_logia']); ?></a></td>
                        <td><?php echo($row['nombre']); ?></td>
                        <td><?php echo($row['direccion']); ?></td>
                        <td><?php echo($row['trabajos']); ?></td>
                        <td><?php echo($row['foto'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['nombre']) . "\" title=\"" . $row['nombre'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto'] . "' alt='" . $row['nombre'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_logias_upload_img.php?xCveLogia=" . $row['cve_logia'] . "\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_logias_upload_img.php?xCveLogia=" . $row['cve_logia'] . "\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></td>
                        <td><a href="#modal<?PHP echo($row['cve_logia']); ?>">Agregar</a></td>
                        <td><a href="#modal<?PHP echo(2); ?>">Ver</a></td>
                        <td><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></td>
                        <td><a href="javascript:void();" onclick="eliminar(<?PHP echo $row['cve_logia']; ?>);"> <i class="fa fa-trash-o"></i> </a></td>
                    </tr>
                                               <!-- ventana modal de agrega usuarios-->
            <div id="modal<?php echo($row['cve_logia']); ?>" class="modalmask">
                <div class="modalbox resize">
                    <a href="#close" title="Close" class="close">X</a>
                    <h3 id="TituloModal">Agregar un nuevo usuario para la logia <?php echo($row['nombre']); ?></h3>
                        <div class="form-group">
                               <label for="txtNombre">Nombre:</label>
                        <input type="text" class="form-control" id="txtNombre<?PHP echo $row['cve_logia'];?>" name="txtNombre<?PHP echo $row['cve_logia'];?>" 
                               placeholder="Nombre " value="">
                    </div>

                </div>
                
            </div>
                
            <!--- fin de ventana modal de agrega usuarios-->
        <?php } $rst->closeCursor(); ?>
            </tbody>
        </table>
                <?php
            }
        }
        ?>