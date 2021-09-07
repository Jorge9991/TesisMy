<?php

class Formato {
    private $idFormatos;
    private $descripcion;
    private $tema;
    private $objectivos;
    private $iddrive;
    private $nombrearchivo;
    private $ruta;
    private $extension;
    private $status;
    private $idEquipo;
    
 
    public function __construct($idFormatos = 0, $descripcion = "", $tema ="", $objectivos ="", $iddrive = "", $nombrearchivo ="", $ruta="", $extension ="", $status="", $idEquipo =0) {
        $this->idFormatos = $idFormatos;
        $this->descripcion = $descripcion;
        $this->tema = $tema;
        $this->objectivos = $objectivos;
        $this->iddrive = $iddrive;
        $this->nombrearchivo = $nombrearchivo;
        $this->ruta = $ruta;
        $this->extension = $extension;
        $this->status = $status;
        $this->idEquipo = $idEquipo;
    }

    public function getIdFormatos() {
        return $this->idFormatos;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getTema() {
        return $this->tema;
    }

    public function getObjectivos() {
        return $this->objectivos;
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

    public function getStatus() {
        return $this->status;
    }

    public function getIdEquipo() {
        return $this->idEquipo;
    }

    public function setIdFormatos($idFormatos) {
        $this->idFormatos = $idFormatos;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setTema($tema) {
        $this->tema = $tema;
    }

    public function setObjectivos($objectivos) {
        $this->objectivos = $objectivos;
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

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setIdEquipo($idEquipo) {
        $this->idEquipo = $idEquipo;
    }



}
