<?php
require_once '../clases/UtilDB.php';
$msg = "";
if (isset($_POST['xAccion2'])) {
    if ($_POST["xAccion2"] == "upload") {

        $cve_oriente = isset($_POST['xCveOriente']) ? $_POST['xCveOriente'] : 0;
        $target_dir = "../img/grandes_orientes/";

        /* RENOMBRADO DEL ARCHIVO CON LA CVE_PRODUCTO */
        $name_file = basename($_FILES["fileToUpload"]["name"]);
        $extension = substr($name_file, strpos($name_file, "."), strlen($name_file));
        $new_name_file = $cve_oriente . $extension;
        $target_file = $target_dir . $new_name_file;
        /* RENOMBRADO DEL ARCHIVO CON LA CVE_PRODUCTO */

        //$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        list($width, $height, $type, $attr) = getimagesize($_FILES["fileToUpload"]['tmp_name']);

        if ($check !== false) {
            $msg.= nl2br("El archivo es una imagen - " . $check["mime"] . ".\n");
            $exito = true;
        } else {
            $msg.= nl2br("El archivo no es una imagen.\n");
            $exito = false;
            echo($msg);

            return;
        }

        if (file_exists($target_file)) {
            //$msg.= "Sorry, file already exists.\n";
            //$uploadOk = 0;
            unlink($target_file);
        }
        if ($width > 109 || $height > 109) {
            $msg.= nl2br("Lo sentimos, su archivo tiene un ancho o un alto mayor a 109px.\n");
            $exito = false;
            echo($msg);
            return;
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $msg.= nl2br("Lo sentimos, su archivo es demasiado grande.\n");
            $exito = false;
            echo($msg);
            return;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $msg.= nl2br("Lo sentimos, solo archivos JPG, JPEG, PNG y GIF son permitidos.\n");
            $exito = false;
            echo($msg);
            return;
        }

        if ($uploadOk == 0) {
            $msg.= nl2br("Lo sentimos, su archivos no fue cargado al servidor.\n");
            $exito = false;
            echo($msg);
            return;
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $msg.= nl2br("El archivo " . basename($_FILES["fileToUpload"]["name"]) . " ha sido cargado al servidor.\n");
                $sql = "";

                $sql = "UPDATE grandes_orientes SET foto = '" . (substr($target_file, 3, strlen($target_file))) . "' WHERE cve_oriente = $cve_oriente";

                $count = UtilDB::ejecutaSQL($sql);
                //$msg.= nl2br($count);
                if (($count == 1)) {
                    $msg.= nl2br("[OK] SQL UPDATE\n");
                    $exito = true;
                    header('Location:cat_grandes_orientes.php');
                    return;
                } else {
                    $msg.= nl2br("Lo sentimos, hubo un error SQL UPDATE.\n");
                    $msg.= nl2br($sql);
                    //$msg.= nl2br($count);
                    $exito = false;
                    echo($msg);
                    return;
                }
            } else {
                $msg.= nl2br("Lo sentimo, ha ocurrido un error al cargar su archivo al servidor.\n");
                $exito = false;
                echo($msg);
                return;
            }
        }
    }
}
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Grandes orientes | Subir foto</h4>
</div>
<div class="modal-body">
    <div class="te">
        <form role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" id="frmUpload" name="frmUpload">
            <div class="form-group">
                <input type="hidden" id="xCveOriente" name="xCveOriente" value="<?php echo($_GET["xCveOriente"]); ?>" />
                <input type="hidden" id="xAccion2" name="xAccion2" value="0" />
                <label for="fileToUpload">Seleccione imagen para subir:</label>
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