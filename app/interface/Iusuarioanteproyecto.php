<?php

interface Iusuarioanteproyecto {
    public function listar();
    public function listar2();
    public function cantidad();
    public function listaranteproyectos($idusuario);
    public function listaranteproyectos2($idusuario);
    public function cantidadproyectos($idusuario);
}
