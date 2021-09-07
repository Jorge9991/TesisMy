<?php
/**
 * Description of daoRequisitos
 *
 * @author KrigareDrachen
 */
class daoRequisitos implements Irequisistos{

    public function aprobar(\Requisitos $requisitos) {
        try {
            $sql = 'UPDATE tb_requisitos SET status = 2 WHERE idUsuario = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $requisitos->getIdUsuario(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function listar($idusuario) {
       $requisitos = array();
        try {
            $sql = 'SELECT idrequisitos as id,descripcion,iddrive,nombrearchivo,ruta,extension,status,idUsuario FROM tb_requisitos WHERE idUsuario = "'.$idusuario.'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $requisitos[] = new Requisitos($obj->id, $obj->descripcion, $obj->iddrive, $obj->nombrearchivo, $obj->ruta, $obj->extension, $obj->status, $obj->idUsuario);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $requisitos;
    }

    public function listarcantidad() {
        $requisitos = array();
        try {
            $sql = 'SELECT idrequisitos as id,descripcion,iddrive,nombrearchivo,ruta,extension,status,idUsuario FROM tb_requisitos WHERE status = 3 GROUP by idUsuario';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $requisitos[] = new Requisitos($obj->id, $obj->descripcion, $obj->iddrive, $obj->nombrearchivo, $obj->ruta, $obj->extension, $obj->status, $obj->idUsuario);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $requisitos;
    }

    public function status($idusuario) {
        try {
            $sql = 'SELECT status FROM tb_requisitos where idUsuario = "'.$idusuario.'" LIMIT 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $requisitos = $stmp->fetchAll();
            if(!$requisitos){
                $datos = 1;
            }else{
                $datos = $requisitos[0];
            }
          return $datos;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function cancelar(\Requisitos $requisitos) {
         try {
            $sql = 'UPDATE tb_requisitos SET status = 1 WHERE idUsuario = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $requisitos->getIdUsuario(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function eliminar(\Requisitos $requisitos) {
         try {
            $sql = 'delete from tb_requisitos where iddrive= :iddrive  and idUsuario = :id ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $requisitos->getIdUsuario(), PDO::PARAM_INT);
            $stmp->bindParam(':iddrive', $requisitos->getIddrive(), PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function aprobarrequisitos(\Requisitos $requisitos) {
         try {
            $sql = 'UPDATE tb_requisitos SET status = 3 WHERE idUsuario = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $requisitos->getIdUsuario(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function noaprobarrequisitos(\Requisitos $requisitos) {
         try {
            $sql = 'UPDATE tb_requisitos SET status = 4,descripcion = :descripcion WHERE idUsuario = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $requisitos->getIdUsuario(), PDO::PARAM_INT);
            $stmp->bindParam(':descripcion',$requisitos->getDescripcion(),PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function observacion($idusuario) {
         try {
            $sql = 'SELECT descripcion FROM tb_requisitos where idUsuario = "'.$idusuario.'" LIMIT 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $requisitos = $stmp->fetchAll();
            if(!$requisitos){
                $datos = 'ninguna observación';
            }else{
                $datos = $requisitos[0];
            }
          return $datos;
        } catch (PDOException $e) {
            throw $e;
        }
    }

}
