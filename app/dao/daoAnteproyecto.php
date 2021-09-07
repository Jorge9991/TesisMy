<?php

class daoAnteproyecto implements Ianteproyecto{
    
    public function aprobar(\Anteproyecto $anteproyecto) {
        try {
            $sql = 'UPDATE tb_anteproyecto SET status = 2  WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $anteproyecto->getIdEquipo(), PDO::PARAM_INT);
            
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function aprobaranteproyecto(\Anteproyecto $anteproyecto) {
        try {
            $sql = 'UPDATE tb_anteproyecto SET status = 3 , fechasustentacion = :fechasustentacion WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $anteproyecto->getIdEquipo(), PDO::PARAM_INT);
            $stmp->bindParam(':fechasustentacion', $anteproyecto->getFechasustentacion(), PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function cancelar(\Anteproyecto $anteproyecto) {
        try {
            $sql = 'UPDATE tb_anteproyecto SET status = 1 WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $anteproyecto->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function eliminar(\Anteproyecto $anteproyecto) {
        try {
            $sql = 'delete from tb_anteproyecto where iddrive= :iddrive  and idequipo = :id ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $anteproyecto->getIdEquipo(), PDO::PARAM_INT);
            $stmp->bindParam(':iddrive', $anteproyecto->getIddrive(), PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function listar($idequipo) {
        $anteproyectos = array();
        try {
           
            $sql = 'SELECT id_anteproyecto as id,descripcion,DATE_FORMAT(fechasustentacion, "%Y-%m-%dT%h:%i") as fechasustentacion,iddrive,nombrearchivo,ruta,extension,status,idequipo FROM tb_anteproyecto WHERE  idequipo = "'. $idequipo .'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $anteproyectos[] = new Anteproyecto($obj->id, $obj->descripcion, $obj->fechasustentacion, $obj->iddrive, $obj->nombrearchivo, $obj->ruta, $obj->extension, $obj->status, $obj->idequipo);
          }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $anteproyectos;
    }

    public function noaprobaranteproyecto(\Anteproyecto $anteproyecto) {
        try {
            $sql = 'UPDATE tb_anteproyecto SET status = 4,descripcion = :descripcion WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $anteproyecto->getIdEquipo(), PDO::PARAM_INT);
            $stmp->bindParam(':descripcion',$anteproyecto->getDescripcion(),PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function observacion($idequipo) {
       try {
            $sql = 'SELECT descripcion FROM tb_anteproyecto where idequipo = "'.$idequipo.'" LIMIT 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $anteproyectos = $stmp->fetchAll();
            if(!$anteproyectos){
                $datos = 'ninguna observación';
            }else{
                $datos = $anteproyectos[0];
            }
          return $datos;
        } catch (PDOException $e) {
            throw $e;
        } 
    }

    public function status($idequipo) {
          try {
            $sql = 'SELECT status FROM tb_anteproyecto where idequipo = "'.$idequipo.'" LIMIT 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $anteproyectos = $stmp->fetchAll();
            if(!$anteproyectos){
                $datos = 0;
            }else{
                $datos = $anteproyectos[0];
            }
          return $datos;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function listarcantidad() {
        $anteproyectos = array();
        try {
           
            $sql = 'SELECT f.id_anteproyecto as id,f.descripcion,f.fechasustentacion,f.iddrive,f.nombrearchivo,f.ruta,f.extension,f.status,f.idequipo FROM tb_anteproyecto f inner join tb_equipo e on e.idequipo = f.idequipo inner join tb_usuario u on u.idUsuario = e.idUsuario WHERE status = 3 and isnull(e.idUsuario2) GROUP by e.idequipo';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $anteproyectos[] = new Anteproyecto($obj->id, $obj->descripcion, $obj->fechasustentacion, $obj->iddrive, $obj->nombrearchivo, $obj->ruta, $obj->extension, $obj->status, $obj->idequipo);
          }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $anteproyectos;
    }

    public function listarcantidadx2() {
        $anteproyectos = array();
        try {
           
            $sql = 'SELECT f.id_anteproyecto as id,f.descripcion,f.fechasustentacion,f.iddrive,f.nombrearchivo,f.ruta,f.extension,f.status,f.idequipo FROM tb_anteproyecto f inner join tb_equipo e on e.idequipo = f.idequipo inner join tb_usuario u on u.idUsuario = e.idUsuario WHERE status = 3 and not isnull(e.idUsuario2) GROUP by e.idequipo';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $anteproyectos[] = new Anteproyecto($obj->id, $obj->descripcion, $obj->fechasustentacion, $obj->iddrive, $obj->nombrearchivo, $obj->ruta, $obj->extension, $obj->status, $obj->idequipo);
          }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $anteproyectos;
    }

}
