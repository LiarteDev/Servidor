<?php
require_once 'documento.php';
class Libro extends Documento{
    protected $paginas;
    public function __construct(){}
    public function getPaginas(){
        return $this->paginas;
    }
    public static function CrearConNombre($nombre)
    {
        $obj = new self();
        $obj->nombre = $nombre;
        return $obj;
    }
    public function setPaginas($paginas){
        $this->paginas = $paginas;
    }
    public function __clone()
    {
        $this->paginas = "Sin definir";
    }
}
?>