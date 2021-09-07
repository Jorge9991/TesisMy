<?php

class daoDocumentos implements Idocumento{
    //put your code here
    public function listaranteproyecto() {
        $documentos = array();
        try {
            $sql = 'SELECT  id,descripcion,iddrive,nombredelarchivo,ruta,extension,categoria FROM documentos where categoria = 2';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $documentos[] = new Documento($obj->id, $obj->descripcion, $obj->iddrive, $obj->nombredelarchivo, $obj->ruta, $obj->extension, $obj->categoria);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $documentos;
    }

    public function listarformatos() {
        $documentos = array();
        try {
            $sql = 'SELECT  id,descripcion,iddrive,nombredelarchivo,ruta,extension,categoria FROM documentos where categoria = 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $documentos[] = new Documento($obj->id, $obj->descripcion, $obj->iddrive, $obj->nombredelarchivo, $obj->ruta, $obj->extension, $obj->categoria);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $documentos;
    }

    public function listartesis() {
      $documentos = array();
        try {
            $sql = 'SELECT  id,descripcion,iddrive,nombredelarchivo,ruta,extension,categoria FROM documentos where categoria = 3';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $documentos[] = new Documento($obj->id, $obj->descripcion, $obj->iddrive, $obj->nombredelarchivo, $obj->ruta, $obj->extension, $obj->categoria);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $documentos;  
    }

}
