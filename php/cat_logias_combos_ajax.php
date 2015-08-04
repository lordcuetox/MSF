<?php require_once '../clases/UtilDB.php'; 
session_start();

if (!isset($_SESSION['cve_usuario'])) 
{
    header('Location:login.php');
    return;
}
if(isset($_POST['cveOriente']) && isset($_POST['cveGranLogia']) )
{ $cveOriente =  $_POST['cveOriente'];
  $cveGranLogia =  $_POST['cveGranLogia'];
?>
    <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                            <?php
                            $sql2 = "SELECT * FROM grandes_logias where activo=1 and cve_oriente=$cveOriente ORDER BY nombre";
                            $rst2 = UtilDB::ejecutaConsulta($sql2);
                            foreach ($rst2 as $row) {
                                echo("<option value='" . $row['cve_gran_logia'] . "' " . ($cveGranLogia== $row['cve_gran_logia']  ? "selected" : "")  . ">" . $row['nombre'] . "</option>");
                            }
                            $rst2->closeCursor();
                            ?> 

<?php
return;}
if(isset($_POST['cveOriente']))
{ $cveOriente =  $_POST['cveOriente'];
?>

     <option value="0">--------- SELECCIONE UNA OPCIÓN ---------</option>
                            <?php
                            $sql2 = "SELECT * FROM grandes_logias where activo=1 and cve_oriente=$cveOriente ORDER BY nombre";
                            $rst2 = UtilDB::ejecutaConsulta($sql2);
                            foreach ($rst2 as $row) {
                                echo("<option value='" . $row['cve_gran_logia'] . "'> " . $row['nombre'] . "</option>");
                            }
                            $rst2->closeCursor();
                            ?> 
<?php
return;}


?>
