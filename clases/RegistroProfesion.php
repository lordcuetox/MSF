<?php

/**
 *
 * @author Roberto Eder Weiss Juárez
 * 
 */
require_once('UtilDB.php');

class RegistroProfesion {

    private $cve_registro;
    private $cve_profesion;
    private $nombre_empresa;
    private $logo;
    private $domicilio;
    private $servicios_ofrecidos;
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

    function __construct1($cve_registro) {
        $this->limpiar();
        $this->cve_registro = $cve_registro;
        $this->cargar();
    }

    private function limpiar() {
        $this->cve_registro = 0;
        $this->cve_profesion = 0;
        $this->nombre_empresa = "";
        $this->logo = "";
        $this->domicilio = "";
        $this->servicios_ofrecidos = "";
        $this->activo = false;
        $this->_existe = false;
    }

    function getCve_registro() {
        return $this->cve_registro;
    }

    function getCve_profesion() {
        return $this->cve_profesion;
    }

    function getNombre_empresa() {
        return $this->nombre_empresa;
    }

    function getDomicilio() {
        return $this->domicilio;
    }

    function getServicios_ofrecidos() {
        return $this->servicios_ofrecidos;
    }

    function getActivo() {
        return $this->activo;
    }

    function setCve_registro($cve_registro) {
        $this->cve_registro = $cve_registro;
    }

    function setCve_profesion($cve_profesion) {
        $this->cve_profesion = $cve_profesion;
    }

    function setNombre_empresa($nombre_empresa) {
        $this->nombre_empresa = $nombre_empresa;
    }

    function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    function setServicios_ofrecidos($servicios_ofrecidos) {
        $this->servicios_ofrecidos = $servicios_ofrecidos;
    }

    function setActivo($activo) {
        $this->activo = $activo;
    }

    function getLogo() {
        return $this->logo;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cve_registro = UtilDB::getSiguienteNumero("registro_profesiones", "cve_registro");
            $sql = "INSERT INTO registro_profesiones (cve_registro,cve_profesion,nombre_empresa,logo,domicilio,servicios_ofrecidos,activo)"
                    . " VALUES($this->cve_registro,$this->cve_profesion,'$this->nombre_empresa','$this->logo','$this->domicilio','$this->servicios_ofrecidos',$this->activo)";
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE registro_profesiones SET ";
            $sql.= "cve_profesion = $this->cve_profesion,";
            $sql.= "nombre_empresa = '$this->nombre_empresa',";
            $sql.= "domicilio = '$this->domicilio',";
            $sql.= "servicios_ofrecidos = '$this->servicios_ofrecidos',";
            $sql.= "activo = $this->activo ";
            $sql.= " WHERE cve_registro = $this->cve_registro";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM registro_profesiones WHERE cve_registro = $this->cve_registro";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cve_registro = $row['cve_registro'];
            $this->cve_profesion = $row['cve_profesion'];
            $this->nombre_empresa = $row['nombre_empresa'];
            $this->logo = $row['logo'];
            $this->domicilio = $row['domicilio'];
            $this->servicios_ofrecidos = $row['servicios_ofrecidos'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }
            function borrar($cveRegistro) {
             $sql = "update registro_profesiones set activo=0  WHERE cve_registro = $cveRegistro";
             $rst = UtilDB::ejecutaConsulta($sql);

         $rst->closeCursor();
         $this->limpiar();
         $this->cargar();
     
     }

}
