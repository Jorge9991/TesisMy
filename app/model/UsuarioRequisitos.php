<?php

/**
 * Description of UsuarioRequisitos
 *
 * @author KrigareDrachen
 */
class UsuarioRequisitos {

    private $total;
    private $cedula;
    private $apellido;
    private $nombre;
    private $correo;
    private $idUsuario;
    private $status;

    public function __construct($total = 0, $cedula = "", $apellido = "", $nombre = "", $correo = "", $idUsuario = 0,$status = 0) {
        $this->total = $total;
        $this->cedula = $cedula;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->idUsuario = $idUsuario;
        $this->status = $status;
    }
    public function getTotal() {
        return $this->total;
    }

    public function getCedula() {
        return $this->cedula;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function setStatus($status) {
        $this->status = $status;
    }


}
