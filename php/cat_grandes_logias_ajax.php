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
            <th>Activo</th>
            <th>Desactivar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "select gl.cve_gran_logia,ri.descripcion as rito,gl.nombre,gl.estado,gl.direccion,gl.activo from grandes_logias gl inner join grandes_orientes ori on ori.cve_oriente=gl.cve_oriente inner join ritos ri on ri.cve_rito=gl.cve_rito where gl.activo=1 and gl.cve_oriente=$cveOriente";
        $rst = UtilDB::ejecutaConsulta($sql);
        foreach ($rst as $row) {
            ?>
            <tr>
                <th><a href="javascript:void(0);" onclick="$('#txtCveGranLogia').val(<?php echo($row['cve_gran_logia']); ?>);
                                            recargar();"><?php echo($row['cve_gran_logia']); ?></a></th>
                <td><?php echo($row['rito']); ?></th>
                <td><?php echo($row['nombre']); ?></th>
                <td><?php echo($row['estado']); ?></th>
                <td><?php echo($row['direccion']); ?></th>
                <td><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></th>
                <th><a href="javascript:void();" onclick="eliminar(<?PHP echo $row['cve_gran_logia'];?>);"> <i class="fa fa-trash-o"></i> </a></th>
            </tr>
        <?php } $rst->closeCursor(); ?>
    </tbody>
</table>
<?php
}
?>
