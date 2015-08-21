<?php
require_once '../clases/UtilDB.php';
$msg = "";
$exito = true;
if (isset($_POST['xAccion2'])) {
    if ($_POST["xAccion2"] == "upload") {

        $cve_volumen = isset($_POST['xCveVolumen']) ? $_POST['xCveVolumen'] : 0;
        $target_dir = "../img/volumenes/";

        /* RENOMBRADO DEL ARCHIVO CON LA CVE_VOLUMEN */
        $name_file = basename($_FILES["fileToUpload"]["name"]);
        $extension = substr($name_file, strpos($name_file, "."), strlen($name_file));
        $new_name_file = $cve_volumen . $extension;
        $target_file = $target_dir . $new_name_file;
        /* RENOMBRADO DEL ARCHIVO CON LA CVE_VOLUMEN */

        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (file_exists($target_file)) {
            //Se sobreescribe el archivo
            unlink($target_file);
        }
        /*if ($_FILES["fileToUpload"]["size"] > 500000) {
            $msg.= "Lo sentimos, su archivo es demasiado grande.\n";
            $exito = false;
        }*/
        if ($imageFileType != "pdf") {
            $msg.= "Lo sentimos, solo archivos PDF son permitidos.\n";
            $exito = false;
        }
        if (!$exito) {
            $msg.= "Lo sentimos, su archivo no puede ser cargado al servidor.\n";
            echo($msg);
            return;
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $msg.= "El archivo " . basename($_FILES["fileToUpload"]["name"]) . " ha sido cargado al servidor.\n";
                $sql = "";

                $sql = "UPDATE volumenes SET archivo = '" . (substr($target_file, 3, strlen($target_file))) . "' WHERE cve_volumen = $cve_volumen";

                $count = UtilDB::ejecutaSQL($sql);

                if ($count != 0) {
                    $msg.= "[OK] SQL UPDATE\n";
                    $exito = true;
                } else {
                    $msg.= "Lo sentimos, hubo un error SQL UPDATE.\n";
                    $exito = false;
                }
                header('Location:trabajos_logiales.php');
                return;
            } else {
                $msg.= "Lo sentimo, ha ocurrido un error al cargar su archivo al servidor.\n";
                echo($msg);
                return;
            }
        }
        
    }
}
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Trabajos logiales | Subir documento</h4>
</div>
<div class="modal-body">
    <div class="te">
        <form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" id="frmUpload" name="frmUpload">
            <div class="form-group">
                <input type="hidden" id="xCveVolumen" name="xCveVolumen" value="<?php echo($_GET["xCveVolumen"]); ?>" />
                <input type="hidden" id="xAccion2" name="xAccion2" value="0" />
                <label for="fileToUpload">Seleccione documento para subir:</label>
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" placeholder="Seleccione una imagen">
            </div>
            <button type="button" class="btn btn-default" id="btnGrabar" name="btnGrabar" onclick="subir();">Subir</button>
        </form>
        <br/>
        <br/>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</div>