<?php

interface Iusuariohabilidad {
    public function crear(UsuarioHabilidad $usuariohabilidad);
    public function editar (UsuarioHabilidad $usuariohabilidad);
    public function delete (UsuarioHabilidad $usuariohabilidad);
    public function listar($idusuario);
    public function listarId($id);
}