<?php

/**
 *Jorge José Jiménez del Cueto
 */
require_once('UtilDB.php');
class GrandesLogias {

    private $cveOriente;
    private $cveGranLogia;
    private $cveRito;
    private $nombre;
    private $foto;
    private $estado;
    private $direccion;
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

    function __construct1($cveGranLogia) {
        $this->limpiar();
        $this->cveGranLogia = $cveGranLogia;
        $this->cargar();
    }

    private function limpiar() {
        $this->cveOriente = 0;
        $this->cveRito = 0;
        $this->cveGranLogia = 0;
        $this->nombre = "";
        $this->foto = "";
        $this->estado = "";
        $this->direccion = "";
        $this->activo = false;
        $this->_existe = false;
    }
    
    public function getCveOriente() {
        return $this->cveOriente;
    }

    public function getCveGranLogia() {
        return $this->cveGranLogia;
    }

    public function getCveRito() {
        return $this->cveRito;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setCveOriente($cveOriente) {
        $this->cveOriente = $cveOriente;
    }

    public function setCveGranLogia($cveGranLogia) {
        $this->cveGranLogia = $cveGranLogia;
    }

    public function setCveRito($cveRito) {
        $this->cveRito = $cveRito;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

        function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cveOriente = UtilDB::getSiguienteNumero("grandes_logias", "cve_gran_logia");
            $sql = "INSERT INTO grandes_logias (cve_gran_logia,cve_rito,cve_oriente,nombre,foto,estado,direccion,activo) VALUES($this->cveGranLogia,$this->cveRito,$this->cveOriente,'$this->nombre','$this->foto','$this->estado','$this->direccion',$this->activo)";
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE grandes_logias SET ";
            $sql.= " cve_rito = $this->cveRito,";
            $sql.= " cve_oriente = $this->cveOriente,";
            $sql.= " nombre = '$this->nombre',";
            $sql.= " foto = '$this->foto',";
            $sql.= " estado = '$this->estado',";
            $sql.= " direccion = '$this->direccion',";
            $sql.= " activo=" . ($this->activo ? "1" : "0");
            $sql.= " WHERE cve_gran_logia = $this->cveGranLogia";
            $count = UtilDB::ejecutaSQL($sql);
            
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM grandes_logias WHERE cve_gran_logia = $this->cveGranLogia";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cveGranLogia = $row['cve_gran_logia'];
            $this->cveRito = $row['cve_rito'];
            $this->cveOriente = $row['cve_oriente'];
            $this->nombre = $row['nombre'];
            $this->foto = $row['foto'];
            $this->estado = $row['estado'];
            $this->direccion = $row['direccion'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }

        $rst->closeCursor();
    }
        function borrar($cveGranLogia) {
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
