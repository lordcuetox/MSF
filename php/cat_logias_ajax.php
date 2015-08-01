<?php require_once '../clases/UtilDB.php'; 
session_start();

if (!isset($_SESSION['cve_usuario'])) 
{
    header('Location:login.php');
    return;
}
if(isset($_POST['cveOriente']) && isset($_POST['cveGranLogia']) )
{ $cveOriente =  $_POST['cveOriente'];
  $cveGranLogia =  $_POST['cveGranLogia'];
    $sql = "SELECT * from logias where cve_oriente=$cveOriente and cve_gran_logia=$cveGranLogia order by nombre";
     $rst = UtilDB::ejecutaConsulta($sql);
     if($rst->rowCount()>0)
     {
?>
<table class="table table-bordered table-striped table-hover table-responsive">
    <thead>
        <tr>
            <th>ID Logia</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Horario</th>
            <th>Activo</th>
            <th>Desactivar</th>
        </tr>
    </thead>
    <tbody>
        <?php
      
       
        foreach ($rst as $row) {
            ?>
            <tr>
                <th><a href="javascript:void(0);" onclick="$('#txtCveLogia').val(<?php echo($row['cve_logia']); ?>);
                                            recargar();"><?php echo($row['cve_logia']); ?></a></th>
                <th><?php echo($row['nombre']); ?></th>
                <th><?php echo($row['direccion']); ?></th>
                   <th><?php echo($row['trabajos']); ?></th>
                <th><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></th>
                 <th><a href="javascript:void();" onclick="eliminar(<?PHP echo $row['cve_logia'];?>);"> <i class="fa fa-trash-o"></i> </a></th>
            </tr>
        <?php } $rst->closeCursor(); ?>
    </tbody>
</table>
<?php
     }
}
?>
