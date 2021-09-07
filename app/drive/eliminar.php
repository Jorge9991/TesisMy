<?php
require_once '../conexion/DataBase.php';
include '../../api-drive/vendor/autoload.php';
//archivo con la llave
putenv('GOOGLE_APPLICATION_CREDENTIALS=mytesis-315323-b5401bd59510.json');
$cliente = new Google_Client();
$cliente->useApplicationDefaultCredentials();
$cliente->setScopes(['https://www.googleapis.com/auth/drive.file']);
$iddrive = $_POST["iddrive"];
$idusuario = $_POST["idUsuario"];
try {
    $servicios = new Google_Service_Drive($cliente);
    $metadata = new Google_Service_Drive_DriveFile();
    $metadata->setTrashed(true);
    $res = $servicios->files->update($iddrive, $metadata);
    
    $sql = "delete from tb_requisitos where iddrive= '$iddrive'  and idUsuario = '$idusuario' ";
    $cn = DataBase::getInstancia();
    $stmp = $cn->prepare($sql);
    $stmp->execute();
    
} catch (Google_Service_Exception $gs) {
    $mensaje = json_decode($gs->getMessage());
    echo $mensaje->error->message();
} catch (Exception $e) {
    echo $e->getMessage();
}
header('Location: ../view/requisitos.php');

