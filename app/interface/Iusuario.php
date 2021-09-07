<?php

interface Iusuario {
    public function crear(Usuario $usuario);
    public function editar (Usuario $usuario);
    public function delete (Usuario $usuario);
    public function listar();
    public function listarcantidadegresado();
    public function listartutor();
    public function listargestor();
    public function listaregresado($idusuario);
    public function listarequipo($idequipo);
    public function listadeusuarioparciego($idequipo);
    public function listadeusuarioparciego2($idequipo);
    public function listaparciego($idequipo);
    public function listaparciego2($idequipo);
    public function listaparciegotesis($idequipo);
    public function listaparciego2tesis($idequipo);
    public function listadejurado();
    public function listarId($id);
    public function login(Usuario $usuario);
    public function listajuradotesis($idequipo);
    public function listajurado2tesis($idequipo);
    public function listajurado3tesis($idequipo);
}
