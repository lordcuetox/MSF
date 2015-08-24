<?php

require_once '../clases/Biblioteca.php';

$biblioteca = new Biblioteca(isset($_POST['t']) ? ((int) $_POST['t']) : 0);

if (isset($_POST['xAccion'])) {

    if ($_POST['xAccion'] == "getVolumenes") {
        $salida = "";
        $letra = $_POST['l'];
        $sql = "SELECT autor FROM volumenes WHERE cve_tipo =  " . $biblioteca->getCveTipo() . " AND titulo LIKE '$letra%' GROUP BY autor";
        $rst = UtilDB::ejecutaConsulta($sql);
        if ($rst->rowCount() > 0) {
            foreach ($rst as $row) {
                $salida .="<h2  style=\"display:inline-block;\">" . $row['autor'] . "</h2><br/><br/>";
                $sql2 = "";
                if ($biblioteca->getCveTipo() == 3) {//Trabajos de logias
                    $sql2 .= "SELECT v.cve_volumen,v.titulo,";
                    $sql2 .= "CASE v.grado  WHEN 1 THEN 'Aprendiz' WHEN 2 THEN 'Compañero' WHEN 3 THEN 'Maestro' END AS grado,";
                    $sql2 .= "l.nombre AS logia ";
                    $sql2 .= "FROM volumenes AS v ";
                    $sql2 .= "INNER JOIN trabajos_logias AS tl ON tl.cve_volumen = v.cve_volumen ";
                    $sql2 .= "INNER JOIN logias AS l ON l.cve_logia = tl.cve_logia ";
                    $sql2 .= "WHERE v.cve_tipo = " . $biblioteca->getCveTipo() . " AND v.autor = '" . $row['autor'] . "' and v.titulo LIKE '$letra%' ";
                } else {
                    $sql2 = "SELECT * FROM volumenes WHERE cve_tipo = " . $biblioteca->getCveTipo() . " AND autor = '" . $row['autor'] . "' and titulo LIKE '$letra%'";
                }

                $rst2 = UtilDB::ejecutaConsulta($sql2);
                if ($rst2->rowCount() > 0) {
                    $salida .= "<ul>";
                    foreach ($rst2 as $row2) {
                        $salida .= "<li>";
                        $salida .= "<a href=\"javascript:void(0);\" data-toggle=\"modal\" data-remote=\"biblioteca2_id.php?id=" . $row2['cve_volumen'] . "\" data-target=\"#mDetalleVolumen\">";
                        $salida .= $row2['titulo'] . " (" . $row2['grado'] . "," . $row2['logia'] . ")";
                        $salida .= "</a>";
                        $salida .= "</li>";
                    }
                    $rst2->closeCursor();
                    $salida .= "</ul><br/><br/>";
                } else {
                    $salida .= "<p>Todavía no hay un volumen registrado con nosotros.</p></p>";
                }
            }
        } else {
            $salida .= "<p>No hay volumenes en la letra $letra</p>";
        }

        $rst->closeCursor();
        echo($salida);
        return;
    }
}
?>
