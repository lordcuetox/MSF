<?php
require_once '../clases/UtilDB.php';
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
                        <td><a href="#modal<?PHP echo(1); ?>">Nuevo</a></td>
                        <td><a href="#modal<?PHP echo(2); ?>">Ver</a></td>
                        <td><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></td>
                        <td><a href="javascript:void();" onclick="eliminar(<?PHP echo $row['cve_logia']; ?>);"> <i class="fa fa-trash-o"></i> </a></td>
                    </tr>
        <?php } $rst->closeCursor(); ?>
            </tbody>
        </table>
                <?php
            }
        }
        ?>