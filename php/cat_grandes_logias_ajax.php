<?php require_once '../clases/UtilDB.php'; 
session_start();

if (!isset($_SESSION['cve_usuario'])) 
{
    header('Location:login.php');
    return;
}
if(isset($_POST['cveOriente']))
{ $cveOriente =  $_POST['cveOriente'];
?>
<table class="table table-bordered table-striped table-hover table-responsive">
    <thead>
        <tr>
            <th>ID </th>
            <th>Rito</th>
            <th>Gran Logia</th>
            <th>Estado</th>
            <th>Dirección</th>
            <th>Foto</th>
            <th>Activo</th>
            <th>Desactivar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "select gl.cve_gran_logia,ri.descripcion as rito,gl.nombre,gl.estado,gl.direccion,gl.activo, gl.foto from grandes_logias gl inner join grandes_orientes ori on ori.cve_oriente=gl.cve_oriente inner join ritos ri on ri.cve_rito=gl.cve_rito where gl.activo=1 and gl.cve_oriente=$cveOriente";
        $rst = UtilDB::ejecutaConsulta($sql);
        foreach ($rst as $row) {
            ?>
            <tr>
                <td><a href="javascript:void(0);" onclick="$('#txtCveGranLogia').val(<?php echo($row['cve_gran_logia']); ?>);
                                            recargar();"><?php echo($row['cve_gran_logia']); ?></a></td>
                <td><?php echo($row['rito']); ?></td>
                <td><?php echo($row['nombre']); ?></td>
                <td><?php echo($row['estado']); ?></td>
                <td><?php echo($row['direccion']); ?></td>
                <td><?php echo($row['foto'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['nombre']) . "\" title=\"" . $row['nombre'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['foto'] . "' alt='" . $row['nombre'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_grandes_logias_upload_img.php?xCveGranLogia=" . $row['cve_gran_logia'] . "\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_grandes_logias_upload_img.php?xCveGranLogia=" . $row['cve_gran_logia'] . "\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></td>
                <td><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></td>
                <td><a href="javascript:void();" onclick="eliminar(<?PHP echo $row['cve_gran_logia'];?>);"> <i class="fa fa-trash-o"></i> </a></td>
            </tr>
        <?php } $rst->closeCursor(); ?>
    </tbody>
</table>
<?php
}
?>
