<?php

/**
 *Jorge José Jiménez del Cueto
 */
require_once('UtilDB.php');
class TrabajosLogiales {

    private $cveVolumen;
    private $cveLogia;
    private $_existe;

    function __construct() {
        $this->limpiar();
        $args = func_get_args();
        $nargs = func_num_args();

        switch ($nargs) {
            case 1:
                self::__construct1($args[0]);
                break;
             case 2:
                self::__construct2($args[0],$args[1]);
                break;
        }
    }

    function __construct1($cveLogia) {
        $this->limpiar();
        $this->cveLogia = $cveLogia;
        $this->cargar();
    }
      function __construct2($cveVolumen,$cveLogia) {
        $this->limpiar();
        $this->cveVolumen = $cveVolumen;
        $this->cveLogia = $cveLogia;
        $this->cargar2();
    }

    private function limpiar() {
        $this->cveVolumen = 0;
        $this->cveLogia = 0;
        $this->_existe = false;
    }

    public function getCveVolumen() {
        return $this->cveVolumen;
    }

    public function getCveLogia() {
        return $this->cveLogia;
    }

    public function setCveVolumen($cveVolumen) {
        $this->cveVolumen = $cveVolumen;
    }

    public function setCveLogia($cveLogia) {
        $this->cveLogia = $cveLogia;
    }

        
        function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $sql = "INSERT INTO trabajos_logias (cve_volumen,cve_logia) VALUES($this->cveVolumen,$this->cveLogia)";
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } 

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM trabajos_logias WHERE cve_logia = $this->cveLogia";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveVolumen = $row['cve_volumen'];
            $this->cveLogia = $row['cve_logia'];
            $this->_existe = true;
        }

        $rst->closeCursor();
    }
    
        function cargar2() {
        $sql = "SELECT * FROM trabajos_logias WHERE cve_volumen = $this->cveVolumen and cve_logia=$this->cveLogia";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveVolumen = $row['cve_volumen'];
            $this->cveLogia = $row['cve_logia'];
            $this->_existe = true;
        }

        $rst->closeCursor();
    }
        function borrar($cveVolumen,$cvelogia) {
                          $sql = "delete  trabajos_logias  WHERE  cve_volumen=$cveVolumen"
                                  . " and cve_logia=$cvelogia";
        $rst = UtilDB::ejecutaConsulta($sql);/*
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
