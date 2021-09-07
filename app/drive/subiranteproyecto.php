<?php

include('../conexion/DataBase.php');
include '../../api-drive/vendor/autoload.php';
//archivo con la llave
putenv('GOOGLE_APPLICATION_CREDENTIALS=mytesis-315323-b5401bd59510.json');

$cliente = new Google_Client();
$cliente->useApplicationDefaultCredentials();
$cliente->setScopes(['https://www.googleapis.com/auth/drive.file']);
$idequipo = $_POST["idEquipo"];
try {
    // nombre de la extension
    $extension = $_FILES['archivos']['type'];
    if($extension){
    $servicios = new Google_Service_Drive($cliente);
    
    $file_path = $_FILES['archivos']['tmp_name'];
    $file = new Google_Service_Drive_DriveFile();
    //nombre del archivo
    $nombre = $_FILES['archivos']['name'];
    $file->setName($nombre);
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    //extencion del archivo
    $mime_type = finfo_file($finfo, $file_path);

    $file->setParents(array("1FM37hpklj6yd_vOsowBdVN5c7JYXDSnn")); //id de la carpeta del drive
    $file->setDescription("Archivo cargado desde PHP");
    $file->setMimeType($mime_type);

    //aqui se sube el archivo
    $resultado = $servicios->files->create($file, array(
        'data' => file_get_contents($file_path),
        'mimeType' => $mime_type,
        'uploadType' => 'media'
    ));

    $iddrive = $resultado->id; // esta variable sirve para si quiero remover
    $ruta = 'https://drive.google.com/open?id=' . $resultado->id;

    $sql = "INSERT INTO `tb_anteproyecto` (  `iddrive`, `nombrearchivo`, `ruta`, `extension`, `status`, `idequipo`) "
            . "VALUES ( '$iddrive', '$nombre','$ruta','$extension',1, '$idequipo')";
    $cn = DataBase::getInstancia();
    $stmp = $cn->prepare($sql);
    $stmp->execute();
    }
    
} catch (Google_Service_Exception $gs) {
    $mensaje = json_decode($gs->getMessage());
    // echo $mensaje->error->message();
} catch (Exception $e) {
    $e->getMessage();
}
header('Location: ../view/equiposubiranteproyecto.php');

