<?php

class Anteproyecto {

    private $idAnteproyecto;
    private $descripcion;
    private $fechasustentacion;
    private $iddrive;
    private $nombrearchivo;
    private $ruta;
    private $extension;
    private $status;
    private $idEquipo;
    
    public function __construct($idAnteproyecto=0, $descripcion="", $fechasustentacion="", $iddrive="", $nombrearchivo="", $ruta="", $extension="", $status="", $idEquipo=0) {
        $this->idAnteproyecto = $idAnteproyecto;
        $this->descripcion = $descripcion;
        $this->fechasustentacion = $fechasustentacion;
        $this->iddrive = $iddrive;
        $this->nombrearchivo = $nombrearchivo;
        $this->ruta = $ruta;
        $this->extension = $extension;
        $this->status = $status;
        $this->idEquipo = $idEquipo;
    }

    public function getIdAnteproyecto() {
        return $this->idAnteproyecto;
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

    public function setIdAnteproyecto($idAnteproyecto) {
        $this->idAnteproyecto = $idAnteproyecto;
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
