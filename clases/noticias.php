<?php
/**
 *
 * @author Jorge José Jiménez Del Cueto
 * 
 */
require_once('UtilDB.php');

class Grados {

    public function getCveNoticia() {
        return $this->cveNoticia;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getNoticiaCorta() {
        return $this->noticiaCorta;
    }

    public function getNoticia() {
        return $this->noticia;
    }

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function getFechaFin() {
        return $this->fechaFin;
    }

    public function getFotoPortada() {
        return $this->fotoPortada;
    }

    public function getFoto1() {
        return $this->foto1;
    }

    public function getFoto2() {
        return $this->foto2;
    }

    public function getFoto3() {
        return $this->foto3;
    }

    public function setCveNoticia($cveNoticia) {
        $this->cveNoticia = $cveNoticia;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setNoticiaCorta($noticiaCorta) {
        $this->noticiaCorta = $noticiaCorta;
    }

    public function setNoticia($noticia) {
        $this->noticia = $noticia;
    }

    public function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }

    public function setFotoPortada($fotoPortada) {
        $this->fotoPortada = $fotoPortada;
    }

    public function setFoto1($foto1) {
        $this->foto1 = $foto1;
    }

    public function setFoto2($foto2) {
        $this->foto2 = $foto2;
    }

    public function setFoto3($foto3) {
        $this->foto3 = $foto3;
    }

        private $cveNoticia;
    private $titulo;
    private $noticiaCorta;
    private $noticia;
    private $fechaInicio;
    private $fechaFin;
    private $fotoPortada;
    private $foto1;
    private $foto2;
    private $foto3;
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

    function __construct1($cveNoticia) {
        $this->limpiar();
        $this->cveGrado = $cveNoticia;
        $this->cargar();
    }
    
     private function limpiar() {
     $this->cveNoticia=0;
     $this->titulo="";
     $this->noticiaCorta="";
     $this->noticia="";
     $this->fechaInicio=null;
     $this->fechaFin=null;
     $this->fotoPortada="";
     $this->foto1="";
     $this->foto2="";
     $this->foto3="";
     $this->_existe=false;
     }
     
     
      function grabar() {
        $sql = "";
        $count = 0;

        if (!$this->_existe) {
            $this->cve_rito = UtilDB::getSiguienteNumero("noticias", "cve_noticia");
            $sql = "INSERT INTO noticias (cve_noticia,titulo,noticia_corta,noticia,"
                    . "fecha_inicio,fecha_fin,foto_portada,foto1,foto2,foto3)"
                    . " VALUES($this->cveNoticia,'$this->titulo','$this->noticiaCorta','$this->noticia','$this->fechaInicio','$this->fechaFin','$this->fotoPortada','$this->foto1','$this->foto2','$this->foto3')";
            $count = UtilDB::ejecutaSQL($sql);
            if ($count > 0) {
                $this->_existe = true;
            }
        } else {
            $sql = "UPDATE noticias SET ";
            $sql.= "titulo = '$this->titulo',";
            $sql.= "noticia_corta = '$this->noticiaCorta',";
            $sql.= "noticia = '$this->noticia',";
            $sql.= "fecha_inicio = '$this->fechaInicio',";
            $sql.= "fecha_fin = '$this->fechaFin',";
            $sql.= "foto_portada = '$this->fotoPortada',";
            $sql.= "foto1 = '$this->foto1',";
            $sql.= "foto2 = '$this->foto2',";
            $sql.= "foto3 = '$this->foto3' ";
            $sql.= " WHERE cve_noticia = $this->cveNoticia";
            $count = UtilDB::ejecutaSQL($sql);
        }

        return $count;
    }

    function cargar() {
        $sql = "SELECT * FROM ritos WHERE cve_rito = $this->cve_rito";
        $rst = UtilDB::ejecutaConsulta($sql);

        foreach ($rst as $row) {
            $this->cve_rito = $row['cve_rito'];
            $this->descripcion = $row['descripcion'];
            $this->activo = $row['activo'];
            $this->_existe = true;
        }
        $rst->closeCursor();
    }
}