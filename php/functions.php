<?php

function getParrafoTextoCompleto($numParrafos) {
    $texto_completo = "";
    for ($x = 1; $x <= $numParrafos; $x++) {
        if (isset($_POST['txtParrafo' . $x])) {
            $texto_completo .= "<p>" . $_POST['txtParrafo' . $x] . "</p>";
        }
    }
    return $texto_completo;
}
//Recibe un array con los ids de las cajas de texto
function getParrafoTextoCompleto2($ids) {
    $texto_completo = "";

    foreach ($ids as $x) {

        if (isset($_POST['txtParrafo' . $x])) {
            $texto_completo .= "<p>" . $_POST['txtParrafo' . $x] . "</p>";
        }
    }

    return $texto_completo;
}
