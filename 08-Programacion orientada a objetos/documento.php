<?php
class Documento{
    protected $autor;
    protected $titulo;
    protected $ubicacion;

    public function __construct(){}
    public function getAutor(){
        return $this->autor;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getubicacion(){
        return $this->ubicacion;
    }
    public function setAutor($autor){
        $this->autor = $autor;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function setubicacion($ubicacion){
        $this->ubicacion = $ubicacion;
    }
}
?>