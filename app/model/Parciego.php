<?php

class Parciego {

    private $idparciego;
    private $idUsuario;
    private $idEquipo;
    private $proceso;
    private $idAnteproyecto;
    private $descripcion;
    private $fechasustentacion;
    private $iddrive;
    private $nombrearchivo;
    private $ruta;
    private $extension;
    private $status;

    public function __construct($idparciego=0, $idUsuario=0, $idEquipo=0, $proceso=0, $idAnteproyecto=0, $descripcion="", $fechasustentacion="", $iddrive="", $nombrearchivo="", $ruta="", $extension="", $status=0) {
        $this->idparciego = $idparciego;
        $this->idUsuario = $idUsuario;
        $this->idEquipo = $idEquipo;
        $this->proceso = $proceso;
        $this->idAnteproyecto = $idAnteproyecto;
        $this->descripcion = $descripcion;
        $this->fechasustentacion = $fechasustentacion;
        $this->iddrive = $iddrive;
        $this->nombrearchivo = $nombrearchivo;
        $this->ruta = $ruta;
        $this->extension = $extension;
        $this->status = $status;
    }
    public function getIdparciego() {
        return $this->idparciego;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getIdEquipo() {
        return $this->idEquipo;
    }

    public function getProceso() {
        return $this->proceso;
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

    public function setIdparciego($idparciego) {
        $this->idparciego = $idparciego;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setIdEquipo($idEquipo) {
        $this->idEquipo = $idEquipo;
    }

    public function setProceso($proceso) {
        $this->proceso = $proceso;
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


}
