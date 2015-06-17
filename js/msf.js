function getServiciosProfesionalesBy(letra) {
    $("#ajax_results").html("<img src=\"../img/ajax-loading.gif\" alt=\"Cargando\"/> Cargando ...");
    $("#ajax_results").load("../php/servicios_profesionales_ajax.php", {xAccion: "getServiciosProfesionales", l: letra});

}