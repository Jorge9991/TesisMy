<?php

require '../controller/ctrEquipoTutor.php';
$action = $_POST["action"];
$equipo = new ctrEquipoTutor($_POST);

switch ($action) {
    case "equ":
        echo $equipo->grabar();

        break;

    case "can":
        echo $equipo->cancelarsolicitud();

        break;

    case "ace":
        echo $equipo->aceptarsolicitud();

        break;

    case "del":
        echo $equipo->eliminarsolicitud();

        break;

    default:
        break;
}

