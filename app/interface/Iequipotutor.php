<?php
/**
 *
 * @author krigare
 */
interface Iequipotutor {
    public function solicitud();
    public function crear(EquipoTutor $equipo);
    public function crearsolo(EquipoTutor $equipo);
    public function aceptar(EquipoTutor $equipo);
    public function eliminar(EquipoTutor $equipo);
    public function cancelarsolicitud(EquipoTutor $equipo);
    public function listar($equipo);
    public function equiposolo($equipo);
    public function nombreequipo($equipo);
    public function listarSolicitudes($idusuario);
    public function listarSolicitudes2($idusuario);
    public function solicitudenviada($equipo);
}
