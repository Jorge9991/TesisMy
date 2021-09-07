<?php
/**
 * 
 * @author KrigareDrachen
 */
class Documento {
    private $id;
    private $descripcion;
    private $iddrive;
    private $nombrearchivo;
    private $ruta;
    private $extension;
    private $categoria;
    
    public function __construct($id =0, $descripcion ="", $iddrive="", $nombrearchivo="", $ruta="", $extension="", $categoria=0) {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->iddrive = $iddrive;
        $this->nombrearchivo = $nombrearchivo;
        $this->ruta = $ruta;
        $this->extension = $extension;
        $this->categoria = $categoria;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getIddrive() {
        return $this->iddrive;
    }

    public function getNombrearchivo() {
        return $this->nombrearchivo;
    }

    public function getRuta() {
        return $this->ruta;
    }

    public function getExtension() {
        return $this->extension;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setIddrive($iddrive) {
        $this->iddrive = $iddrive;
    }

    public function setNombrearchivo($nombrearchivo) {
        $this->nombrearchivo = $nombrearchivo;
    }

    public function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    public function setExtension($extension) {
        $this->extension = $extension;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }


}
