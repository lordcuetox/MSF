<?php
require_once '../clases/UtilDB.php';
session_start();

if (!isset($_SESSION['cve_usuario'])) {
    header('Location:login.php');
    return;
}
if (isset($_POST['cveProfesion'])) {
    $cveProfesion = $_POST['cveProfesion'];
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
                <th>Medios de comunicación</th>
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
                    <th><?php echo($row['profesion']); ?></th>
                    <th><?php echo($row['nombre_empresa']); ?></th>
                    <th><?php echo($row['logo'] != NULL ? "<img src=\"../img/File-JPG-icon.png\" alt=\"" . utf8_encode($row['nombre_empresa']) . "\" title=\"" . $row['nombre_empresa'] . "\" data-toggle=\"popover\" data-content=\"<img src='../" . $row['logo'] . "' alt='" . $row['nombre_empresa'] . "' class='img-responsive'/>\" style=\"cursor:pointer;\"/><br/><a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_servicios_profesionales_upload_img.php?xCveRegistro=" . $row['cve_registro'] . "\" href=\"javascript:void(0);\">Cambiar imagen</a>" : "<a data-toggle=\"modal\" data-target=\"#myModal\" data-remote=\"cat_servicios_profesionales_upload_img.php?xCveRegistro=" . $row['cve_registro'] . "\" href=\"javascript:void(0);\">Subir imagen</a>"); ?></th>
                    <th><?php echo($row['domicilio']); ?></th>
                    <th><a data-toggle="modal" data-target="#myModal" data-remote="registro_profesion_id.php?view_only=servicios&id=<?php echo($row['cve_registro']); ?>" href="javascript:void(0);">Ver</a></th>
                    <th><a data-toggle="modal" data-target="#myModal" data-remote="registro_profesion_id.php?view_only=comunicaciones&id=<?php echo($row['cve_registro']); ?>" href="javascript:void(0);">Ver</a></th>
                    <th><?php echo($row['activo'] == 1 ? "Si" : "No"); ?></th>
                    <th><button type="button" class="btn btn-warning" id="btnEliminar" name="btnEliminar" onclick="eliminar(<?PHP echo $row['cve_registro']; ?>);">Desactivar</button></th>
                </tr>
    <?php } $rst->closeCursor(); ?>
        </tbody>
    </table>
    <?php
}
?>