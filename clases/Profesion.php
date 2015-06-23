<?php

/**
 *
 * @author Roberto Eder Weiss Juárez
 * 
 */
require_once('UtilDB.php');
class Profesion {

    private $cve_profesion;
    private $descripcion;
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
            //case 2:
            //self::__construct2($args[0], $args[1]);
            //break;
        }
    }

    function __construct1($cve_profesion) {
        $this->limpiar();
        $this->cve_profesion = $cve_profesion;
        $this->cargar();
    }

    private function limpiar() {
        $this->cve_profesion = 0;
        $this->descripcion = "";
        $this->activo = false;
        $this->_existe = false;
    }

    function getCve_profesion() {
        return $this->cve_profesion;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getActivo() {
        return $this->activo;
    }

    function setCve_profesion($cve_profesion) {
        $this->cve_profesion = $cve_profesion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cve_profesion = UtilDB::getSiguienteNumero("profesiones", "cve_profesion");
            $sql = "INSERT INTO profesiones (cve_profesion,descripcion,activo)"
                    . " VALUES($this->cve_profesion,'$this->descripcion',$this->activo)";
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE profesiones SET ";
            $sql.= "descripcion = '$this->descripcion',";
            $sql.= "activo = $this->activo";
            $sql.= " WHERE cve_profesion = $this->cve_profesion";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM profesiones WHERE cve_profesion = $this->cve_profesion";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cve_profesion = $row['cve_profesion'];
            $this->descripcion = $row['descripcion'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }

}
