<?php

interface Iparciegotesis {
    public function crear(ParciegoTesis $parciego);
    public function aprobartesis (ParciegoTesis $parciego);
    public function editar (ParciegoTesis $parciego);
    public function asignarfecha (ParciegoTesis $parciego);
    public function actualizarfecha (ParciegoTesis $parciego);
}
