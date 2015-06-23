<?php

/**
 *
 * @author Roberto Eder Weiss Juárez
 * 
 */
require_once('UtilDB.php');
class ContactoRegistro {

    private $cve_contacto;
    private $cve_registro;
    private $dato;
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
            case 2:
                self::__construct2($args[0], $args[1]);
                break;
        }
    }

    function __construct1($cve_contacto) {
        $this->limpiar();
        $this->cve_contacto = $cve_contacto;
        $this->cargar();
        
    }
    
    function __construct2($cve_contacto, $cve_registro) {
        $this->limpiar();
        $this->cve_contacto = $cve_contacto;
        $this->cve_registro = $cve_registro;
        $this->cargar();
        
    }

    private function limpiar() {
        $this->cve_contacto = 0;
        $this->cve_registro = 0;
        $this->dato = "";
        $this->activo = false;
        $this->_existe = false;
    }

    function getCve_contacto() {
        return $this->cve_contacto;
    }

    function getCve_registro() {
        return $this->cve_registro;
    }

    function getDato() {
        return $this->dato;
    }

    function getActivo() {
        return $this->activo;
    }

    function setCve_contacto($cve_contacto) {
        $this->cve_contacto = $cve_contacto;
    }

    function setCve_registro($cve_registro) {
        $this->cve_registro = $cve_registro;
    }

    function setDato($dato) {
        $this->dato = $dato;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $sql = "INSERT INTO contactos_registros (cve_contacto,cve_registro,dato,activo)"
                    . " VALUES($this->cve_contacto,$this->cve_registro,'$this->dato',$this->activo)";
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE contactos_registros SET ";
            $sql.= "dato = '$this->dato',";
            $sql.= "activo = $this->activo";
            $sql.= " WHERE cve_contacto = $this->cve_contacto and cve_registro = $this->cve_registro";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM contactos_registros WHERE cve_contacto = $this->cve_contacto and cve_registro = $this->cve_registro";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cve_contacto = $row['cve_contacto'];
            $this->cve_registro = $row['cve_registro'];
            $this->dato = $row['dato'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }

}
