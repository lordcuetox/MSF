<?php

/**
 * Jorge José Jiménez del Cueto
 */
require_once('UtilDB.php');

class GrandesOrientes {

    private $cveOriente;
    private $descripcion;
    private $foto;
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

    function __construct1($cveOriente) {
        $this->limpiar();
        $this->cveOriente = $cveOriente;
        $this->cargar();
    }

    private function limpiar() {
        $this->cveOriente = 0;
        $this->descripcion = "";
        $this->foto = "";
        $this->activo = false;
        $this->_existe = false;
    }

    function getCveOriente() {
        return $this->cveOriente;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFoto() {
        return $this->foto;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function getActivo() {
        return $this->activo;
    }

    function setCveOriente($cveOriente) {
        $this->cveOriente = $cveOriente;
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
            $this->cveOriente = UtilDB::getSiguienteNumero("grandes_orientes", "cve_oriente");
            $sql = "INSERT INTO grandes_orientes (cve_oriente,descripcion,foto,activo) VALUES($this->cveOriente,'$this->descripcion','$this->foto',$this->activo)";
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE grandes_orientes SET ";
            $sql.= " descripcion = '$this->descripcion',";
            $sql.= " activo=" . ($this->activo ? "1" : "0");
            $sql.= " WHERE cve_oriente = $this->cveOriente";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM grandes_orientes WHERE cve_oriente = $this->cveOriente";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveOriente = $row['cve_oriente'];
            $this->descripcion = $row['descripcion'];
            $this->foto = $row['foto'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }

        $rst->closeCursor();
    }

    function borrar($cveOriente) {
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