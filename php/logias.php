<?php
require_once '../clases/UtilDB.php';
require_once '../clases/Logias.php';
require_once '../clases/GrandesLogias.php';
$gran_logia = NULL;
$sql = NULL;
$rst = NULL;

if (isset($_GET['gl'])) {
    $gran_logia = new GrandesLogias((int) $_GET['gl']);
} else {
    $gran_logia = new GrandesLogias();
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>MSF | Masonería Sin Fronteras | Logias</title>
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
                    <div class="row"><div class="col-md-12"><h1> Logias de la <?php echo($gran_logia->getNombre()); ?></h1></div></div>
                    <div class="row"><p> </p></div>
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM logias WHERE cve_gran_logia = " . $gran_logia->getCveGranLogia()." AND activo = 1";
                        $rst = UtilDB::ejecutaConsulta($sql);
                        $count = 1;
                        $tmp = "";

                        if ($rst->rowCount() > 0) {
                            foreach ($rst as $row) {
                                $logia = new Logias((int) $row['cve_logia']);
                                $tmp .= "<div class=\"col-xs-6 col-sm-4 col-md-3 col-lg-4\">";
                                $tmp .= "<div >";
                                $tmp .= "<a href=\"trabajos_logias.php?log=".$logia->getCveLogia()."\">";
                                $tmp .= "<img class=\"img-responsive\" src=\"../" . ($logia->getFoto()==""?"img/logias/default.jpg":$logia->getFoto()) . "\"/>";
                                $tmp .= "</a>";
                                $tmp .= "</div>";
                                $tmp .= "<div >";
                                $tmp .= "<p class=\"text-center\">" . $logia->getNombre(). "</p>";
                                $tmp .= "</div>";
                                 $tmp .= "<div >";
                                $tmp .= "<p class=\"text-center\">" . $logia->getDireccion() . "</p>";
                                $tmp .= "</div>";
                                $tmp .= "<div >";
                                $tmp .= "<p class=\"text-center\">Horario:" . $logia->getTrabajos() . "</p>";
                                $tmp .= "</div>";
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
                        } else {
                            echo("<div class=\"col-md-12\"><p class=\"text-center\">Lo sentimos no hay  logias para " . $gran_logia->getNombre() . "</p></div>");
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