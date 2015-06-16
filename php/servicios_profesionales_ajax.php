<?php

require_once '../clases/UtilDB.php';

if (isset($_POST['xAccion'])) {

    if ($_POST['xAccion'] == "getServiciosProfesionales") {
        $salida = "";
        $letra = $_POST['l'];
        $sql = "SELECT * FROM profesiones WHERE descripcion LIKE '$letra%'";
        $rst = UtilDB::ejecutaConsulta($sql);
        if ($rst->rowCount() > 0) {
            foreach ($rst as $row) {
                $salida .="<h2>" . $row['descripcion'] . "</h2>";
                $sql2 = "SELECT * FROM registro_profesiones WHERE cve_profesion = " . $row['cve_profesion'];
                $rst2 = UtilDB::ejecutaConsulta($sql2);
                if ($rst2->rowCount() > 0) {
                    $salida .= "<ul>";
                    foreach ($rst2 as $row2) {
                        $salida .= "<li>";
                        $salida .= "<a href=\"javascript:void(0);\" data-toggle=\"modal\" data-remote=\"registro_profesion_id.php?id=" . $row2['cve_registro'] . "\" data-target=\"#mDetalleServicioProfesional\">";
                        $salida .= $row2['nombre_empresa'];
                        $salida .= "</a>";
                        $salida .= "</li>";
                    }
                    $rst2->closeCursor();
                    $salida .= "</ul>";
                } else {
                    $salida .= "<p>No hay servicios profesionales registrados en la profesion.</p></p>";
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