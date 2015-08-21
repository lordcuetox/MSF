<?php
require_once '../clases/Volumenes.php';
$volumen = NULL;
$sql = "";
$rst = NULL;
$msg = "";
$tmp = "";

if (isset($_GET['id'])) {
    $volumen = new Volumenes((int) $_GET['id']);
} else {
    $volumen = new Volumenes();
    $msg = "Lo sentimos, su busqueda no tiene resultados";
}

if ($volumen->getCveVolumen() > 0) {
    ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><?php echo($volumen->getTitulo()); ?></h4>
    </div>
    <div class="modal-body">
        <div class="te" style="list-style-position: inside;">
            <img src="../<?php echo($volumen->getImagen()); ?>" alt="<?php echo($volumen->getTitulo()); ?>" class="img-responsive" style="margin:0 auto;"/><br/>
            <p><b>Titulo:</b> <?php echo($volumen->getTitulo()); ?></p>
            <p><b>Autor:</b> <?php echo($volumen->getAutor()); ?></p>
            <p><b>Descripción:</b> <?php echo($volumen->getDescripcion()); ?></p><br/><br/>
            <p><a href="../<?php echo($volumen->getArchivo()); ?>" target="_blank"><img src="../img/Files-Pdf-icon.png" alt="<?php echo($volumen->getTitulo()); ?>" style="vertical-align:top"/> Ver documento</a></p>
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