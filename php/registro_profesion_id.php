<?php
require_once '../clases/UtilDB.php';
require_once '../clases/RegistroProfesion.php';
require_once '../clases/ContactoRegistro.php';
require_once '../clases/MedioContacto.php';
$profesion = NULL;
$contacto_registro = NULL;
$medio_contacto = NULL;
$sql = "";
$rst = NULL;
$msg = "";

if (isset($_GET['id'])) {
    $profesion = new RegistroProfesion((int) $_GET['id']);
} else {
    $profesion = new RegistroProfesion();
    $msg = "Lo sentimos, su busqueda no tiene resultados";
}

if ($profesion->getCve_profesion() > 0) {
    ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php echo($profesion->getNombre_empresa()); ?></h4>
    </div>
    <div class="modal-body">
        <div class="te" style="list-style-position: inside;">
            <p class="negritas">Domicilio:</p>
            <?php echo($profesion->getDomicilio()); ?>
            <br/><br/>
            <p class="negritas">Servicios ofrecidos:</p>
            <?php echo($profesion->getServicios_ofrecidos()); ?>
            <br/><br/>
            <?php
            $sql = "SELECT * FROM contactos_registros WHERE cve_registro =" . $profesion->getCve_registro();
            $rst = UtilDB::ejecutaConsulta($sql);
            if ($rst->rowCount() > 0) {
                echo("<p class=\"negritas\">Contacto</p>");
                echo("<ul>");
                foreach ($rst as $row) {
                    $contacto_registro = new ContactoRegistro($row['cve_contacto'], $row['cve_registro']);
                    $medio_contacto = new MedioContacto($contacto_registro->getCve_contacto());
                    echo("<li><img src=\"../" . $medio_contacto->getImagen() . "\" alt=\"" . $medio_contacto->getDescripcion() . "\"/> " . $contacto_registro->getDato() . "</li>");
                }
                echo("</ul>");
            }
            $rst->closeCursor();
            ?>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
    <?php
} else {
    ?>    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Aviso importante</h4>
    </div>
    <div class="modal-body">
        <div class="te"><?php echo($msg); ?></div>
    </div> 
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
    <?php
}
?>