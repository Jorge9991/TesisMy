<?php

interface Iusuariotesis {
    public function listar();
    public function listar2();
    public function cantidad();
    public function listartesis($idusuario);
    public function listartesis2($idusuario);
    public function cantidadtesis($idusuario);
    public function listarcorreciontesis($idusuario);
    public function listarcorreciontesis2($idusuario);
    public function cantidadcorreciontesis($idusuario);
    public function listarfechatesis();
    public function listarfechatesis2();
    public function cantidadfechatesis();
    public function listarcalificaciontesis($idusuario);
    public function listarcalificaciontesis2($idusuario);
    public function cantidadcalificaciontesis($idusuario);
}
