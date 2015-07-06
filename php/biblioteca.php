<?php
require_once '../clases/UtilDB.php';
require_once '../clases/Biblioteca.php';
$sql = NULL;
$rst = NULL;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>MSF | Masonería Sin Fronteras | Biblioteca</title>
        <meta name="author" content="Webxico & Cuetox">
        <meta name="description" content="Página oficial de Masonería Sin Fronteras">
        <meta name="keywords" content="masoneria sin fronteras,masoneria,masonería,masonería sin fronteras,leslie silva lorca,fenix 5, estado restauración, gran logia, aprendiz, compañero, maestro mason,maestro masón, AP:., ap:., comp:.,M:.M:., M:., mason, masón, taller de aprendiz,servicios profesionales, profesiones, libros masonicos,msf, MSF">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
        <link href="../css/msf.css" rel="stylesheet" />
        <link rel="stylesheet" href="../lib/bootstrap-3.3.4-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../lib/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css">
        <script src="../js/jQuery/jquery-1.11.2.min.js"></script>
        <script src="../lib/bootstrap-3.3.4-dist/js/bootstrap.min.js" ></script>
        <script src="../js/msf.js" type="text/javascript"></script>
        <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php include 'analyticstracking.php'; ?>
        <div class="container"> 
            <?php include 'includeHeader.php'; ?>
            <div class="row">
                <div class="col-lg-8">
                    <!--<div class="row">
                        <div class="col-md-12">
                            <h1 class="visible-lg">Large devices </h1>
                            <h1 class="visible-md">Medium devices</h1>
                            <h1 class="visible-sm">Small devices</h1>
                            <h1 class="visible-xs">Extra small devices </h1>
                        </div>
                    </div>-->
                    <div class="row"><div class="col-md-12"><h1>Biblioteca</h1></div></div>
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM CAT_BIBLIOTECA";
                        $rst = UtilDB::ejecutaConsulta($sql);
                        $count = 1;
                        $tmp = "";

                        if ($rst->rowCount() > 0) {
                            foreach ($rst as $row) {
                                $biblioteca = new Biblioteca((int) $row['cve_tipo']);
                                $tmp .= "<div class=\"col-xs-6 col-sm-4 col-md-3 col-lg-4\">";
                                //$tmp .= "<a href=\"grandes_logias.php?go=".$biblioteca->getCveOriente()."\">";
                                $tmp .= "<img src=\"../" . $biblioteca->getImagen() . "\" alt=\"" . $biblioteca->getDescripcion() . "\" class=\"img-responsive\" style=\"margin:0 auto;\"/>";
                                //$tmp .= "</a>";
                                $tmp .= "<p class=\"text-center\">";
                                //$tmp .= "<a href=\"grandes_logias.php?go=".$biblioteca->getCveOriente()."\">";
                                $tmp .= $biblioteca->getDescripcion();
                                //$tmp .= "</a>";
                                $tmp .= "</p>";
                                $tmp .= "</div>";
                                
                                if ($count % 3 === 0) {
                                    $tmp .= '<div class="clearfix visible-lg"></div>';
                                }
                                if ($count % 4 === 0) {
                                    $tmp .= '<div class="clearfix visible-md"></div>';
                                }
                                if ($count % 3 === 0) {
                                    $tmp .= '<div class="clearfix visible-sm"></div>';
                                }
                                if ($count % 2 === 0) {
                                    $tmp .= '<div class="clearfix visible-xs"></div>';
                                }
                                $count++;
                            }
                            echo($tmp);
                        }
                        $rst->closeCursor();
                        ?>
                    </div>
                </div>
                <?php include 'includeAnuncios.php'; ?>
            </div>
            <?php include 'includeFooter.php'; ?>
        </div>
    </body> 
</html>