<?php

class Tesis {
   
    private $idTesis;
    private $descripcion;
    private $fechasustentacion;
    private $iddrive;
    private $nombrearchivo;
    private $ruta;
    private $extension;
    private $status;
    private $idEquipo;
    
    public function __construct($idTesis =0, $descripcion="", $fechasustentacion="", $iddrive="", $nombrearchivo="", $ruta="", $extension="", $status="", $idEquipo=0) {
        $this->idTesis = $idTesis;
        $this->descripcion = $descripcion;
        $this->fechasustentacion = $fechasustentacion;
        $this->iddrive = $iddrive;
        $this->nombrearchivo = $nombrearchivo;
        $this->ruta = $ruta;
        $this->extension = $extension;
        $this->status = $status;
        $this->idEquipo = $idEquipo;
    }
    
    public function getIdTesis() {
        return $this->idTesis;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFechasustentacion() {
        return $this->fechasustentacion;
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

    public function setIdTesis($idTesis) {
        $this->idTesis = $idTesis;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFechasustentacion($fechasustentacion) {
        $this->fechasustentacion = $fechasustentacion;
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
