<?php

/**
 * Description of Equipo
 *
 * @author KrigareDrachen
 */
class Equipo {

    private $idEquipo;
    private $idUsuario;
    private $idUsuario2;
    private $solicitud;
    private $nombre;

    public function __construct($idEquipo=0, $idUsuario=0, $idUsuario2=0, $solicitud=0, $nombre="") {
        $this->idEquipo = $idEquipo;
        $this->idUsuario = $idUsuario;
        $this->idUsuario2 = $idUsuario2;
        $this->solicitud = $solicitud;
        $this->nombre = $nombre;
    }

    public function getIdEquipo() {
        return $this->idEquipo;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getIdUsuario2() {
        return $this->idUsuario2;
    }

    public function getSolicitud() {
        return $this->solicitud;
    }

    public function getNombre() {
        return $this->nombre;
    }



    public function setIdEquipo($idEquipo) {
        $this->idEquipo = $idEquipo;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setIdUsuario2($idUsuario2) {
        $this->idUsuario2 = $idUsuario2;
    }

    public function setSolicitud($solicitud) {
        $this->solicitud = $solicitud;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }



}
