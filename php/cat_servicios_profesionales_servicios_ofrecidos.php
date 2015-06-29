<?php
require_once '../clases/UtilDB.php';
require_once '../clases/RegistroProfesion.php';
$registro = "";
$sql = "";
$msg = "";

if (isset($_GET['id'])) {
    $registro = new RegistroProfesion((int) $_GET['id']);
} else {
    $registro = new RegistroProfesion();
    $msg = "Lo sentimos, su busqueda no tiene resultados";
}

if ($registro->getCve_registro() > 0) {
    ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php echo($registro->getNombre_empresa()); ?></h4>
    </div>
    <div class="modal-body">
        <div class="te">
            <p class="negritas">Servicios:</p>
            <p><?php echo($registro->getServicios_ofrecidos()); ?></p>
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