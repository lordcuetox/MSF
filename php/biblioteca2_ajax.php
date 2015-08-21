<?php

require_once '../clases/UtilDB.php';

if (isset($_POST['xAccion'])) {

    if ($_POST['xAccion'] == "getVolumenes") {
        $salida = "";
        $tipo = $_POST['t'];
        $letra = $_POST['l'];
        $sql = "SELECT autor FROM volumenes WHERE cve_tipo =  $tipo AND titulo LIKE '$letra%' GROUP BY autor";
        $rst = UtilDB::ejecutaConsulta($sql);
        if ($rst->rowCount() > 0) {
            foreach ($rst as $row) {
                $salida .="<h2  style=\"display:inline-block;\">" . $row['autor'] . "</h2><br/><br/>";
                $sql2 = "SELECT * FROM volumenes WHERE cve_tipo = $tipo AND autor = '" . $row['autor'] ."' and titulo LIKE '$letra%'";
                $rst2 = UtilDB::ejecutaConsulta($sql2);
                if ($rst2->rowCount() > 0) {
                    $salida .= "<ul>";
                    foreach ($rst2 as $row2) {
                        $salida .= "<li>";
                        $salida .= "<a href=\"javascript:void(0);\" data-toggle=\"modal\" data-remote=\"biblioteca2_id.php?id=" . $row2['cve_volumen'] . "\" data-target=\"#mDetalleVolumen\">";
                        $salida .= $row2['titulo'];
                        $salida .= "</a>";
                        $salida .= "</li>";
                    }
                    $rst2->closeCursor();
                    $salida .= "</ul><br/><br/>";
                } else {
                    $salida .= "<p>Todavía no hay un profesional registrado con nosotros.</p></p>";
                }
            }
        } else {
            $salida .= "<p>No hay profesiones registradas en la letra $letra</p>";
        }

        $rst->closeCursor();
        echo($salida);
        return;
    }
}
?>