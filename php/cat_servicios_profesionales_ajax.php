<?php require_once '../clases/UtilDB.php'; 
session_start();

if (!isset($_SESSION['cve_usuario'])) 
{
    header('Location:login.php');
    return;
}
if(isset($_POST['cveProfesion']))
{ $cveProfesion =  $_POST['cveProfesion'];
?>
<table class="table table-bordered table-striped table-hover table-responsive">
    <thead>
        <tr>
            <th>ID Registro</th>
            <th>Profesion</th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Domicilio</th>
            <th>Servicios Ofrecidos</th>
            <th>Activo</th>
            <th>Desactivar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT C.cve_registro,R.descripcion AS profesion,C.nombre_empresa,C.activo,C.domicilio,C.logo,C.servicios_ofrecidos  FROM registro_profesiones AS C INNER JOIN profesiones AS R  ON C.cve_profesion = R.cve_profesion  WHERE C.cve_profesion = $cveProfesion ORDER BY C.nombre_empresa";
        $rst = UtilDB::ejecutaConsulta($sql);
        foreach ($rst as $row) {
            ?>
            <tr>
                <th><a href="javascript:void(0);" onclick="$('#txtCveRegistro').val(<?php echo($row['cve_registro']); ?>);
                                            recargar();"><?php echo($row['cve_registro']); ?></a></th>
                <td><?php echo($row['profesion']); ?></th>
                <td><?php echo($row['nombre_empresa']); ?></th>
                    <td><?php echo($row['logo']); ?></th>
                <td><?php echo($row['domicilio']); ?></th>
                <td><?php echo($row['servicios_ofrecidos']); ?></th>
                <td><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></th>
                <th><a href="javascript:void();" onclick="eliminar(<?PHP echo $row['cve_registro'];?>);"> <i class="fa fa-trash-o"></i> </a></th>
            </tr>
        <?php } $rst->closeCursor(); ?>
    </tbody>
</table>
<?php
}
?>
