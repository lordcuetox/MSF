<?php

/**
 *Jorge José Jiménez del Cueto
 */
require_once('UtilDB.php');
class Logias {

    private $cveLogia;
    private $cveGranLogia;
    private $nombre;
    private $direccion;
    private $trabajos;
    private $activo;
    private $_existe;

    function __construct() {
        $this->limpiar();

        $args = func_get_args();
        $nargs = func_num_args();

        switch ($nargs) {
            case 1:
                self::__construct1($args[0]);
                break;
        }
    }

    function __construct1($cveLogia) {
        $this->limpiar();
        $this->cveLogia= $cveLogia;
        $this->cargar();
    }

    private function limpiar() {
        $this->cveLogia = 0;
        $this->cveGranLogia = 0;
        $this->nombre = "";
        $this->direccion = "";
        $this->trabajos = "";
        $this->activo = false;
        $this->_existe = false;
    }
    public function getCveLogia() {
        return $this->cveLogia;
    }

    public function getCveGranLogia() {
        return $this->cveGranLogia;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getTrabajos() {
        return $this->trabajos;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setCveLogia($cveLogia) {
        $this->cveLogia = $cveLogia;
    }

    public function setCveGranLogia($cveGranLogia) {
        $this->cveGranLogia = $cveGranLogia;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setTrabajos($trabajos) {
        $this->trabajos = $trabajos;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

        function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cveLogia = UtilDB::getSiguienteNumero("logias", "cve_logia");
            $sql = "INSERT INTO logias (cve_logia,cve_gran_logia,nombre,direccion,trabajos,activo) VALUES($this->cveLogia,$this->cveGranLogia,'$this->nombre','$this->direccion','$this->trabajos',$this->activo)";
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE logias SET ";
            $sql.= " nombre = '$this->nombre',";
            $sql.= " direccion = '$this->direccion',";
            $sql.= " trabajos = '$this->trabajos',";
            $sql.= " activo=" . ($this->activo ? "1" : "0");
            $sql.= " WHERE cve_logia = $this->cveLogia";
            $count = UtilDB::ejecutaSQL($sql);
            
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM logias WHERE cve_logia = $this->cveLogia";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveLogia = $row['cve_logia'];
            $this->cveGranLogia = $row['cve_gran_logia'];
            $this->nombre = $row['nombre'];
            $this->direccion = $row['direccion'];
            $this->trabajos = $row['trabajos'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }

        $rst->closeCursor();
    }
        function borrar($cveLogia) {
                      /*    $sql = "update  productos set activo =0 WHERE cve_clasificacion = $cveClasificacion";
        $rst = UtilDB::ejecutaConsulta($sql);
               $sql = "UPDATE clasificaciones_productos SET activo=0 WHERE cve_clasificacion = $cveClasificacion";
        $rst = UtilDB::ejecutaConsulta($sql);

               $sql = "UPDATE grados SET activo=0 WHERE cve_clasificacion = $cveClasificacion";
        $rst = UtilDB::ejecutaConsulta($sql);
               $sql = "UPDATE clasificaciones SET activo=0 WHERE cve_clasificacion = $cveClasificacion";
        $rst = UtilDB::ejecutaConsulta($sql);

         $rst->closeCursor();
       */
       }

}
