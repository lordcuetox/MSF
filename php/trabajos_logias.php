<?php
require_once '../clases/UtilDB.php';
require_once '../clases/Logias.php';

$sql = NULL;
$rst = NULL;

if (isset($_GET['log'])) {
    $logia = new Logias((int) $_GET['log']);
} else {
    $logia = new Logias();
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
                    <div class="row"><div class="col-md-12"><h1> Trabajos de logia de: <?php echo($logia->getNombre()); ?></h1></div></div>
                    <div class="row"><p> </p></div>
                    <div class="row">
                        <h2>Aprendendiz</h2>
                        <?php
                        $sql .= "SELECT v.activo,v.archivo,v.autor,v.autor,v.cve_tipo,v.cve_volumen,v.descripcion,v.grado,v.imagen,v.titulo ";
                        $sql .= "FROM volumenes AS v ";
                        $sql .= "INNER JOIN trabajos_logias AS tl ON tl.cve_volumen = v.cve_volumen ";
                        $sql .= "WHERE v.grado = 1 AND tl.cve_logia= " . $logia->getCveLogia();
                        $rst = UtilDB::ejecutaConsulta($sql);
                        $carrousel = "<div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">";
                        $indicators = "<ol class=\"carousel-indicators\">";
                        $items     = "<div class=\"carousel-inner\" role=\"listbox\">";
                        $count = 0;
                        if ($rst->rowCount() > 0) {
                            foreach ($rst as $row) {
                              $indicators .= "<li data-target=\"#myCarousel\" data-slide-to=\"0\" ".($count == 0 ? "class=\"active\"":"")."></li>"; 
                              $items .= "<div class=\"item ".($count == 0 ? "active":"")."\"><img src=\"../".$row['imagen']."\" alt=\"".$row['titulo']."\"></div>";
                              $count++;
                            }
                            $rst->closeCursor();
                            $indicators .= "</ol>";
                            $items .= "</div>";
                            $carrousel .= $indicators;
                            $carrousel .= $items;
                            $carrousel .= "<a class=\"left carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\"> <span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span>    <span class=\"sr-only\">Previous</span> </a>";
                            $carrousel .= '<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>';
                            $carrousel .= "</div>";
                            echo($carrousel);
                            $sql = "";
                            $rst = NULL;
                            $carrousel = "";
                            $indicators = "";
                            $items     = "";
                            $count = 0;

                        } else {
                            echo("<div class=\"col-md-12\"><p class=\"text-center\">Lo sentimos no hay trabajos logiales para el grado de aprendiz de la logia: " . $logia->getNombre() . "</p></div>");
                        }

                        ?>
                        <br/><br/>
                        <h2>Compañero</h2>
                        <?php
                        $sql .= "SELECT v.activo,v.archivo,v.autor,v.autor,v.cve_tipo,v.cve_volumen,v.descripcion,v.grado,v.imagen,v.titulo ";
                        $sql .= "FROM volumenes AS v ";
                        $sql .= "INNER JOIN trabajos_logias AS tl ON tl.cve_volumen = v.cve_volumen ";
                        $sql .= "WHERE v.grado = 2 AND tl.cve_logia= " . $logia->getCveLogia();
                        $rst = UtilDB::ejecutaConsulta($sql);
                        $carrousel = "<div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">";
                        $indicators = "<ol class=\"carousel-indicators\">";
                        $items     = "<div class=\"carousel-inner\" role=\"listbox\">";
                        $count = 0;
                        if ($rst->rowCount() > 0) {
                            foreach ($rst as $row) {
                              $indicators .= "<li data-target=\"#myCarousel\" data-slide-to=\"0\" ".($count == 0 ? "class=\"active\"":"")."></li>"; 
                              $items .= "<div class=\"item ".($count == 0 ? "active":"")."\"><img src=\"../".$row['imagen']."\" alt=\"".$row['titulo']."\"></div>";
                              $count++;
                            }
                            $rst->closeCursor();
                            $indicators .= "</ol>";
                            $items .= "</div>";
                            $carrousel .= $indicators;
                            $carrousel .= $items;
                            $carrousel .= "<a class=\"left carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\"> <span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span>    <span class=\"sr-only\">Previous</span> </a>";
                            $carrousel .= '<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>';
                            $carrousel .= "</div>";
                            echo($carrousel);
                             $sql = "";
                            $rst = NULL;
                            $carrousel = "";
                            $indicators = "";
                            $items     = "";
                            $count = 0;

                        } else {
                            echo("<div class=\"col-md-12\"><p class=\"text-center\">Lo sentimos no hay trabajos logiales para el grado de compañero de la logia: " . $logia->getNombre() . "</p></div>");
                        }

                        ?>
                        <br/><br/>
                        <h2>Maestro</h2>
                        <?php
                        $sql .= "SELECT v.activo,v.archivo,v.autor,v.autor,v.cve_tipo,v.cve_volumen,v.descripcion,v.grado,v.imagen,v.titulo ";
                        $sql .= "FROM volumenes AS v ";
                        $sql .= "INNER JOIN trabajos_logias AS tl ON tl.cve_volumen = v.cve_volumen ";
                        $sql .= "WHERE v.grado = 3 AND tl.cve_logia= " . $logia->getCveLogia();
                        $rst = UtilDB::ejecutaConsulta($sql);
                        $carrousel = "<div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">";
                        $indicators = "<ol class=\"carousel-indicators\">";
                        $items     = "<div class=\"carousel-inner\" role=\"listbox\">";
                        $count = 0;
                        if ($rst->rowCount() > 0) {
                            foreach ($rst as $row) {
                              $indicators .= "<li data-target=\"#myCarousel\" data-slide-to=\"0\" ".($count == 0 ? "class=\"active\"":"")."></li>"; 
                              $items .= "<div class=\"item ".($count == 0 ? "active":"")."\"><img src=\"../".$row['imagen']."\" alt=\"".$row['titulo']."\"></div>";
                              $count++;
                            }
                            $rst->closeCursor();
                            $indicators .= "</ol>";
                            $items .= "</div>";
                            $carrousel .= $indicators;
                            $carrousel .= $items;
                            $carrousel .= "<a class=\"left carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\"> <span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span>    <span class=\"sr-only\">Previous</span> </a>";
                            $carrousel .= '<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>';
                            $carrousel .= "</div>";
                            echo($carrousel);
                             $sql = "";
                            $rst = NULL;
                            $carrousel = "";
                            $indicators = "";
                            $items     = "";
                            $count = 0;

                        } else {
                            echo("<div class=\"col-md-12\"><p class=\"text-center\">Lo sentimos no hay trabajos logiales para el grado de maestro de la logia: " . $logia->getNombre() . "</p></div>");
                        }

                        ?>
                        <br/><br/>
                    </div>
                </div>
                <?php include 'includeAnuncios.php'; ?>
            </div>
            <?php include 'includeFooter.php'; ?>
        </div>
    </body> 
</html>