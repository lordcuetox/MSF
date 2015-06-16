<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name=”description” content="Página oficial de Masoneria Sin Fronteras">
        <meta name=”keywords” content="Masoneria, MSF, Masones">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MSF| Masoneria Sin Fronteras | Servicios Profesionales</title>
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
                
                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });
                
            })
        </script>
    </head>
    <body>
        <div class="container"> 
            <?php include 'includeHeader.php'; ?>
            <div class="row">
                <div class="col-lg-8">
                    <h1>Servicios profesionales</h1>
                    <div style="text-align: center;"> 
                        <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('A');">A</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('B');">B</a>| <a href="javascript:void(0);"  onclick="getServiciosProfesionalesBy('C');">C</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('D');">D</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('E');">E</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('F');">F</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('G');">G</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('H');">H</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('I');">I</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('J');">J</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('K');">K</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('L');">L</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('M');">M</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('N');">N</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('O');">O</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('P');">P</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('Q');">Q</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('R');">R</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('S');">S</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('T');">T</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('U');">U</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('V');">V</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('W');">W</a>| <a href="javascript:void(0);">X</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('Y');">Y</a>| <a href="javascript:void(0);" onclick="getServiciosProfesionalesBy('Z');">Z</a>| 
                    </div>
                    <div id="ajax_results" style="text-align: left;"></div>
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
</html>

