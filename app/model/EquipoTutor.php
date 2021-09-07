<?php

/**
 * Description of EquipoTutor
 *
 * @author krigare
 */
class EquipoTutor {
    private $idEquipoTutor;
    private $idEquipo;
    private $idUsuario;   
    private $solicitud;
    private $nombre;
    
    public function __construct($idEquipoTutor=0, $idEquipo=0, $idUsuario=0, $solicitud=0, $nombre="") {
        $this->idEquipoTutor = $idEquipoTutor;
        $this->idEquipo = $idEquipo;
        $this->idUsuario = $idUsuario;
        $this->solicitud = $solicitud;
        $this->nombre = $nombre;
    }
    
    public function getIdEquipoTutor() {
        return $this->idEquipoTutor;
    }

    public function getIdEquipo() {
        return $this->idEquipo;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getSolicitud() {
        return $this->solicitud;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setIdEquipoTutor($idEquipoTutor) {
        $this->idEquipoTutor = $idEquipoTutor;
    }

    public function setIdEquipo($idEquipo) {
        $this->idEquipo = $idEquipo;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setSolicitud($solicitud) {
        $this->solicitud = $solicitud;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }



}
