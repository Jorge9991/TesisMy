<?php

require '../controller/ctrEquipo.php';
$action = $_POST["action"];
$equipo = new ctrEquipo($_POST);

switch ($action) {
    case "equ":
        echo $equipo->grabar();

        break;

    case "sol":
        echo $equipo->grabarsolo();

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

