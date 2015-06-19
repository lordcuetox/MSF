<?php

/**
 *Jorge José Jiménez del Cueto
 */
class Biblioteca {

    private $cveTipo;
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
        }
    }

    function __construct1($cveTipo) {
        $this->limpiar();
        $this->cveTipo = $cveTipo;
        $this->cargar();
    }

    private function limpiar() {
        $this->cveTipo = 0;
        $this->descripcion = "";
        $this->activo = false;
        $this->_existe = false;
    }


    function getDescripcion() {
        return $this->descripcion;
    }

    function getActivo() {
        return $this->activo;
    }


    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function getCveTipo() {
        return $this->cveTipo;
    }

    function setCveTipo($cveTipo) {
        $this->cveTipo = $cveTipo;
    }

        function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cveOriente = UtilDB::getSiguienteNumero("cat_biblioteca", "cve_tipo");
            $sql = "INSERT INTO cat_biblioteca (cve_tipo,descripcion,activo) VALUES($this->cveTipo,'$this->descripcion',$this->activo)";
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE cat_biblioteca SET ";
            $sql.= " descripcion = '$this->descripcion',";
            $sql.= " activo=" . ($this->activo ? "1" : "0");
            $sql.= " WHERE cve_tipo = $this->cveTipo";
            $count = UtilDB::ejecutaSQL($sql);
            
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM cat_biblioteca WHERE cve_tipo = $this->cveTipo";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveTipo = $row['cve_tipo'];
            $this->descripcion = $row['descripcion'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }

        $rst->closeCursor();
    }
        function borrar($cveTipo) {
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
