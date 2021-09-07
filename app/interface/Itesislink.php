<?php

interface Itesislink {

    public function crear(TesisLink $tesis);

    public function actualizar(TesisLink $tesis);

    public function actualizar2(TesisLink $tesis);

    public function aprobar(TesisLink $tesis);

    public function cancelar(TesisLink $tesis);

    public function cancelar2(TesisLink $tesis);

    public function eliminar(TesisLink $tesis);

    public function listar($idequipo);

    public function status($idequipo);

    public function correcionhecha(TesisLink $tesis);

    public function cancelarcorrecion(TesisLink $tesis);

    public function aprobarcorrecion(TesisLink $tesis);

    public function cancelarfecha(TesisLink $tesis);

    public function listarcantidad();

    public function listarcantidadx2();
}
