<?php

interface Ihabilidad {
    public function crear(Habilidad $habilidad);
    public function editar (Habilidad $habilidad);
    public function delete (Habilidad $habilidad);
    public function listar();
    public function listarId($id);
}