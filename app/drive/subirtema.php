<?php

include('../conexion/DataBase.php');
include '../../api-drive/vendor/autoload.php';
//archivo con la llave
putenv('GOOGLE_APPLICATION_CREDENTIALS=mytesis-315323-b5401bd59510.json');

$cliente = new Google_Client();
$cliente->useApplicationDefaultCredentials();
$cliente->setScopes(['https://www.googleapis.com/auth/drive.file']);
$idequipo = $_POST["idequipo"];
$tema = $_POST["tema"];
$objetivos = $_POST["objetivos"];
$habilidades = $_POST["idHabilidad"];
$opcion = $_POST["opc"];

try {
    //GUARDAR
    if ($opcion == 'G') {
        // nombre de la extension
        $extension = $_FILES['archivos']['type'];
        if ($extension) {
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

            $sql = "INSERT INTO `tb_formatos` ( `tema`,`objetivos`, `iddrive`, `nombrearchivo`, `ruta`, `extension`, `status`, `idequipo`) "
                    . "VALUES ( '$tema','$objetivos', '$iddrive', '$nombre','$ruta','$extension',1, '$idequipo')";
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();

            foreach ($habilidades as $habilidad) {
                $sql2 = "INSERT INTO tb_equipohabilidades ( `id_habilidades`, `idequipo`) VALUES ( '$habilidad', '$idequipo')";
                $stmp2 = $cn->prepare($sql2);
                $stmp2->execute();
            }
        }
    }
    //ACTUALIZAR
    if ($opcion == 'A') {
        
        // nombre de la extension
        $extension = $_FILES['archivos']['type'];
        $idformato = $_POST["idformato"];
        //si hay archivo?
        
        if ($extension) {
            //elimino el archivo anterior
            $iddrive = $_POST["iddrive"];
            
            $servicios = new Google_Service_Drive($cliente);
            $metadata = new Google_Service_Drive_DriveFile();
            $metadata->setTrashed(true);
            $res = $servicios->files->update($iddrive, $metadata);         
            //fin elimino
            
            //actualizo los datos
            
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

            $iddrive = $resultado->id; 
            $ruta = 'https://drive.google.com/open?id=' . $resultado->id;
            $sql3 = "UPDATE tb_formatos SET tema = '$tema',objetivos ='$objetivos',iddrive = '$iddrive', nombrearchivo = '$nombre',ruta = '$ruta',extension = '$extension',status = 1 where id_formatos = '$idformato' ";
            $cn = DataBase::getInstancia();
            $stmp3 = $cn->prepare($sql3);
            $stmp3->execute();
            
            $sql4 = "delete from tb_equipohabilidades where idequipo = $idequipo ";
            $stmp4 = $cn->prepare($sql4);
            $stmp4->execute();
            
            foreach ($habilidades as $habilidad) {
                $sql5 = "INSERT INTO tb_equipohabilidades ( `id_habilidades`, `idequipo`) VALUES ( '$habilidad', '$idequipo')";
                $stmp5 = $cn->prepare($sql5);
                $stmp5->execute();
            }
        } else {
            $sql3 = "UPDATE tb_formatos SET tema ='$tema',objetivos ='$objetivos' where id_formatos = '$idformato' ";
            $cn = DataBase::getInstancia();
            $stmp3 = $cn->prepare($sql3);
            $stmp3->execute();
            
            $sql4 = "delete from tb_equipohabilidades where idequipo = $idequipo ";
            $stmp4 = $cn->prepare($sql4);
            $stmp4->execute();
            
            foreach ($habilidades as $habilidad) {
                $sql5 = "INSERT INTO tb_equipohabilidades ( `id_habilidades`, `idequipo`) VALUES ( '$habilidad', '$idequipo')";
                $stmp5 = $cn->prepare($sql5);
                $stmp5->execute();
            }
        }
    }
} catch (Google_Service_Exception $gs) {
    $mensaje = json_decode($gs->getMessage());
    // echo $mensaje->error->message();
} catch (Exception $e) {
    $e->getMessage();
}
header('Location: ../view/equiposubirtema.php');

