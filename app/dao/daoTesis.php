<?php

class daoTesis implements Itesis{
    //put your code here
    public function aprobar(\Tesis $tesis) {
        try {
            $sql = 'UPDATE tb_tesis SET status = 2  WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);
            
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function aprobartesis(\Tesis $tesis) {
        try {
            $sql = 'UPDATE tb_tesis SET status = 3 , fechasustentacion = :fechasustentacion WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);
            $stmp->bindParam(':fechasustentacion', $tesis->getFechasustentacion(), PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function cancelar(\Tesis $tesis) {
        try {
            $sql = 'UPDATE tb_tesis SET status = 1 WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function eliminar(\Tesis $tesis) {
        try {
            $sql = 'delete from tb_tesis where iddrive= :iddrive  and idequipo = :id ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);
            $stmp->bindParam(':iddrive', $tesis->getIddrive(), PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function listar($idequipo) {
        $tesis = array();
        try {
           
            $sql = 'SELECT id_tesis as id,observaciones,DATE_FORMAT(fechasustentacion, "%Y-%m-%dT%h:%i") as fechasustentacion,iddrive,nombrearchivo,ruta,extension,status,idequipo FROM tb_tesis WHERE  idequipo = "'. $idequipo .'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $tesis[] = new Tesis($obj->id, $obj->observaciones, $obj->fechasustentacion, $obj->iddrive, $obj->nombrearchivo, $obj->ruta, $obj->extension, $obj->status, $obj->idequipo);
          }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $tesis;
    }

    public function noaprobartesis(\Tesis $tesis) {
        try {
            $sql = 'UPDATE tb_tesis SET status = 4,observaciones = :observaciones WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $tesis->getIdEquipo(), PDO::PARAM_INT);
            $stmp->bindParam(':observaciones',$tesis->getDescripcion(),PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function observacion($idequipo) {
        try {
            $sql = 'SELECT observaciones FROM tb_tesis where idequipo = "'.$idequipo.'" LIMIT 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $tesis = $stmp->fetchAll();
            if(!$tesis){
                $datos = 'ninguna observación';
            }else{
                $datos = $tesis[0];
            }
          return $datos;
        } catch (PDOException $e) {
            throw $e;
        } 
    }

    public function status($idequipo) {
        try {
            $sql = 'SELECT status FROM tb_tesis where idequipo = "'.$idequipo.'" LIMIT 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $tesis = $stmp->fetchAll();
            if(!$tesis){
                $datos = 0;
            }else{
                $datos = $tesis[0];
            }
          return $datos;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function listartesisparciego($idusuario) {
        $tesis = array();
        try {
           
            $sql = 'SELECT id_tesis as id,observaciones,DATE_FORMAT(fechasustentacion, "%Y-%m-%dT%h:%i") as fechasustentacion,iddrive,nombrearchivo,ruta,extension,status,idequipo FROM tb_tesis WHERE  idequipo = "'. $idusuario .'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $tesis[] = new Tesis($obj->id, $obj->observaciones, $obj->fechasustentacion, $obj->iddrive, $obj->nombrearchivo, $obj->ruta, $obj->extension, $obj->status, $obj->idequipo);
          }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $tesis;
    }

    public function listarcantidad() {
        $tesis = array();
        try {
           
            $sql = 'SELECT f.id_tesis as id,f.observaciones,f.fechasustentacion,f.iddrive,f.nombrearchivo,f.ruta,f.extension,f.status,f.idequipo FROM tb_tesis f inner join tb_equipo e on e.idequipo = f.idequipo inner join tb_usuario u on u.idUsuario = e.idUsuario WHERE isnull(e.idUsuario2) GROUP by e.idequipo';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $tesis[] = new Tesis($obj->id, $obj->observaciones, $obj->fechasustentacion, $obj->iddrive, $obj->nombrearchivo, $obj->ruta, $obj->extension, $obj->status, $obj->idequipo);
          }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $tesis;
    }

    public function listarcantidadx2() {
        $tesis = array();
        try {
           
            $sql = 'SELECT f.id_tesis as id,f.observaciones,f.fechasustentacion,f.iddrive,f.nombrearchivo,f.ruta,f.extension,f.status,f.idequipo FROM tb_tesis f inner join tb_equipo e on e.idequipo = f.idequipo inner join tb_usuario u on u.idUsuario = e.idUsuario WHERE  not isnull(e.idUsuario2) GROUP by e.idequipo';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $tesis[] = new Tesis($obj->id, $obj->observaciones, $obj->fechasustentacion, $obj->iddrive, $obj->nombrearchivo, $obj->ruta, $obj->extension, $obj->status, $obj->idequipo);
          }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $tesis;
    }

}
