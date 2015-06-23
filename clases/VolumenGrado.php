<?php

/**
 *Jorge José Jiménez del Cueto
 */
require_once('UtilDB.php');
class VolumenGrado {

    private $cveVolumen;
    private $cveRito;
    private $cveClasificacion;
    private $cveGrado;
    private $_existe;

    function __construct() {
        $this->limpiar();

        $args = func_get_args();
        $nargs = func_num_args();

        switch ($nargs) {
            case 1:
                self::__construct1($args[0]);
                break;
             case 4:
                self::__construct4($args[0],$args[1],$args[2],$args[3]);
                break;
        }
    }

    function __construct1($cveVolumen) {
        $this->limpiar();
        $this->cveVolumen = $cveVolumen;
        $this->cargar();
    }
      function __construct4($cveVolumen,$cveRito,$cveClasificacion,$cveGrado) {
        $this->limpiar();
        $this->cveVolumen = $cveVolumen;
        $this->cveGrado = $cveGrado;
        $this->cveRito = $cveRito;
        $this->cveClasificacion = $cveClasificacion;
        $this->cargar2();
    }

    private function limpiar() {
        $this->cveVolumen = 0;
        $this->cveRito = 0;
        $this->cveGrado = 0;
        $this->cveClasificacion = 0;
        $this->_existe = false;
    }

    function getCveVolumen() {
        return $this->cveVolumen;
    }

    function getCveRito() {
        return $this->cveRito;
    }

    function getCveClasificacion() {
        return $this->cveClasificacion;
    }

    function getCveGrado() {
        return $this->cveGrado;
    }

    function setCveVolumen($cveVolumen) {
        $this->cveVolumen = $cveVolumen;
    }

    function setCveRito($cveRito) {
        $this->cveRito = $cveRito;
    }

    function setCveClasificacion($cveClasificacion) {
        $this->cveClasificacion = $cveClasificacion;
    }

    function setCveGrado($cveGrado) {
        $this->cveGrado = $cveGrado;
    }

    
    
        function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $sql = "INSERT INTO volumen_grado (cve_volumen,cve_rito,cve_clasificacion,cve_grado) VALUES($this->cveVolumen,$this->cveRito,$this->cveClasificacion,$this->cveGrado)";
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } 

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM volumen_grado WHERE cve_volumen = $this->cveVolumen";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveVolumen = $row['cve_volumen'];
            $this->cveGrado = $row['cve_grado'];
            $this->cveRito = $row['cve_rito'];
            $this->cveClasificacion = $row['cve_clasificacion'];
            $this->_existe = true;
        }

        $rst->closeCursor();
    }
    
        function cargar2() {
        $sql = "SELECT * FROM volumen_grado WHERE cve_volumen = $this->cveVolumen and cve_rito=$this->cveRito and cve_clasificacion=$this->cveClasificacion and cve_grado=$this->cveGrado";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveVolumen = $row['cve_volumen'];
            $this->cveGrado = $row['cve_grado'];
            $this->cveRito = $row['cve_rito'];
            $this->cveClasificacion = $row['cve_clasificacion'];
            $this->_existe = true;
        }

        $rst->closeCursor();
    }
        function borrar($cveVolumen,$cveRito,$cveClasificacion,$cveGrado) {
                          $sql = "delete  volumen_grado  WHERE cve_clasificacion = $cveClasificacion and cve_volumen=$cveVolumen"
                                  . " and cve_rito=$cveRito and cve_grado=$cveGrado";
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
