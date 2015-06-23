<?php

/**
 *
 * @author Roberto Eder Weiss Juárez
 * 
 */
require_once('UtilDB.php');
class MedioContacto {

    private $cve_contacto;
    private $descripcion;
    private $imagen;
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

    function __construct1($cve_contacto) {
        $this->limpiar();
        $this->cve_contacto = $cve_contacto;
        $this->cargar();
    }

    private function limpiar() {
        $this->cve_contacto = 0;
        $this->descripcion = "";
        $this->imagen = "";
        $this->activo = false;
        $this->_existe = false;
    }

    function getCve_contacto() {
        return $this->cve_contacto;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getActivo() {
        return $this->activo;
    }

    function setCve_contacto($cve_contacto) {
        $this->cve_contacto = $cve_contacto;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cve_contacto = UtilDB::getSiguienteNumero("medios_contacto", "cve_contacto");
            $sql = "INSERT INTO medios_contacto (cve_contacto,descripcion,imagen,activo)"
                    . " VALUES($this->cve_contacto,'$this->descripcion','$this->imagen',$this->activo)";
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE medios_contacto SET ";
            $sql.= "descripcion = '$this->descripcion',";
            $sql.= "imagen = '$this->imagen',";
            $sql.= "activo = $this->activo,";
            $sql.= " WHERE cve_contacto = $this->cve_contacto";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM medios_contacto WHERE cve_contacto = $this->cve_contacto";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cve_contacto = $row['cve_contacto'];
            $this->descripcion = $row['descripcion'];
            $this->imagen = $row['imagen'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }

}
