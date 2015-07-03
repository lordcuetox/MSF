<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>MSF | Masoneria Sin Fronteras | Servicios Profesionales</title>
        <meta name="author" content="Webxico & Cuetox">
        <meta name="description" content="Página oficial de Masoneria Sin Fronteras">
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
        <script>
            $(document).ready(function () {
                getServiciosProfesionalesBy('A');
                $("a.sp").click(function () {
                    getServiciosProfesionalesBy($(this).html());
                });
                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });

            });
        </script>
    </head>
    <body>
        <?php include 'analyticstracking.php'; ?>
        <div class="container"> 
            <?php include 'includeHeader.php'; ?>
            <div class="row">
                <div class="col-lg-8">
                    <h1>Servicios profesionales</h1>
                    <br/>
                    <div style="text-align: center;"> 
                        <!--<a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('A');">A</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('B');">B</a>| <a href="javascript:void(0);"  onclick="getServiciosProfesionalesBy('C');">C</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('D');">D</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('E');">E</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('F');">F</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('G');">G</a>| <a href="javascript:void(0);" class="sp">H</a>| <a href="javascript:void(0);" class="sp">I</a>| <a href="javascript:void(0);" class="sp">J</a>| <a href="javascript:void(0);" class="sp">K</a>| <a href="javascript:void(0);" class="sp">L</a>| <a href="javascript:void(0);" class="sp">M</a>| <a href="javascript:void(0);" class="sp">N</a>| <a href="javascript:void(0);" class="sp">O</a>| <a href="javascript:void(0);" class="sp">P</a>| <a href="javascript:void(0);" class="sp">Q</a>| <a href="javascript:void(0);" class="sp">R</a>| <a href="javascript:void(0);" class="sp">S</a>| <a href="javascript:void(0);" class="sp">T</a>| <a href="javascript:void(0);" class="sp">U</a>| <a href="javascript:void(0);" class="sp">V</a>| <a href="javascript:void(0);" class="sp">W</a>| <a href="javascript:void(0);" class="sp">X</a>| <a href="javascript:void(0);" class="sp">Y</a>| <a href="javascript:void(0);" class="sp">Z</a> | -->
                        <a href="javascript:void(0);" class="sp">A</a>| <a href="javascript:void(0);" class="sp">B</a>| <a href="javascript:void(0);"  class="sp">C</a>| <a href="javascript:void(0);" class="sp">D</a>| <a href="javascript:void(0);" class="sp">E</a>| <a href="javascript:void(0);" class="sp">F</a>| <a href="javascript:void(0);" class="sp">G</a>| <a href="javascript:void(0);" class="sp">H</a>| <a href="javascript:void(0);" class="sp">I</a>| <a href="javascript:void(0);" class="sp">J</a>| <a href="javascript:void(0);" class="sp">K</a>| <a href="javascript:void(0);" class="sp">L</a>| <a href="javascript:void(0);" class="sp">M</a>| <a href="javascript:void(0);" class="sp">N</a>| <a href="javascript:void(0);" class="sp">O</a>| <a href="javascript:void(0);" class="sp">P</a>| <a href="javascript:void(0);" class="sp">Q</a>| <a href="javascript:void(0);" class="sp">R</a>| <a href="javascript:void(0);" class="sp">S</a>| <a href="javascript:void(0);" class="sp">T</a>| <a href="javascript:void(0);" class="sp">U</a>| <a href="javascript:void(0);" class="sp">V</a>| <a href="javascript:void(0);" class="sp">W</a>| <a href="javascript:void(0);" class="sp">X</a>| <a href="javascript:void(0);" class="sp">Y</a>| <a href="javascript:void(0);" class="sp">Z</a> | 
                    </div>
                    <div id="ajax_results" style="text-align: left;margin-top: 25px;"></div>
                </div>
                <?php include 'includeAnuncios.php'; ?>
            </div>
            <div class="row">
                <div class="col-md-12" id="ventana_modal">
                    <div class="modal fade" id="mDetalleServicioProfesional" tabindex="-1" role="dialog" aria-labelledby="mDetalleServicioProfesional" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'includeFooter.php'; ?>
        </div>
    </body>   
</html>