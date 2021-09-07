<?php
/**
 * Description of Requisitos
 *
 * @author KrigareDrachen
 */
class Requisitos {
    private $idRequisitos;
    private $descripcion;
    private $iddrive;
    private $nombrearchivo;
    private $ruta;
    private $extension;
    private $status;
    private $idUsuario;
    
    public function __construct($idRequisitos =0, $descripcion ="", $iddrive ="", $nombrearchivo= "", $ruta ="", $extension ="", $status ="", $idUsuario =0) {
        $this->idRequisitos = $idRequisitos;
        $this->descripcion = $descripcion;
        $this->iddrive = $iddrive;
        $this->nombrearchivo = $nombrearchivo;
        $this->ruta = $ruta;
        $this->extension = $extension;
        $this->status = $status;
        $this->idUsuario = $idUsuario;
    }
    
    public function getIdRequisitos() {
        return $this->idRequisitos;
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

    public function getStatus() {
        return $this->status;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdRequisitos($idRequisitos) {
        $this->idRequisitos = $idRequisitos;
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

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }


}
