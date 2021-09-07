<?php

class daoFormato implements Iformato{

    public function aprobar(\Formato $formato) {
        try {
            $sql = 'UPDATE tb_formatos SET status = 2 WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $formato->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function aprobarformato(\Formato $formato) {
        try {
            $sql = 'UPDATE tb_formatos SET status = 3 WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $formato->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function cancelar(\Formato $formato) {
        try {
            $sql = 'UPDATE tb_formatos SET status = 1 WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $formato->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function eliminar(\Formato $formato) {
          try {
            $sql = 'delete from tb_formatos where iddrive= :iddrive  and idequipo = :id ';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $formato->getIdEquipo(), PDO::PARAM_INT);
            $stmp->bindParam(':iddrive', $formato->getIddrive(), PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function listar($idequipo) {
        $formatos = array();
        try {
            $sql = 'SELECT id_formatos as id,descripcion,tema,objetivos,iddrive,nombrearchivo,ruta,extension,status,idequipo FROM tb_formatos WHERE isnull(tema) and idequipo = "'.$idequipo.'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $formatos[] = new Formato($obj->id, $obj->descripcion, $obj->tema, $obj->objetivos, $obj->iddrive, $obj->nombrearchivo, $obj->ruta, $obj->extension, $obj->status, $obj->idequipo);           
           }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $formatos;
    }

    public function listarId($id) {
        
    }

    public function noaprobarformato(\Formato $formato) {
         try {
            $sql = 'UPDATE tb_formatos SET status = 4,descripcion = :descripcion WHERE idequipo = :id';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $formato->getIdEquipo(), PDO::PARAM_INT);
            $stmp->bindParam(':descripcion',$formato->getDescripcion(),PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function observacion($idequipo) {
        try {
            $sql = 'SELECT descripcion FROM tb_formatos where idequipo = "'.$idequipo.'" LIMIT 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $formatos = $stmp->fetchAll();
            if(!$formatos){
                $datos = 'ninguna observación';
            }else{
                $datos = $formatos[0];
            }
          return $datos;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function status($idequipo) {
        try {
            $sql = 'SELECT status FROM tb_formatos where idequipo = "'.$idequipo.'" LIMIT 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $formatos = $stmp->fetchAll();
            if(!$formatos){
                $datos = 1;
            }else{
                $datos = $formatos[0];
            }
          return $datos;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function listartema($idequipo) {
       $temas = array();
        try {
            $sql = 'Select id_formatos as id,descripcion,tema,objetivos,iddrive,nombrearchivo,ruta,extension,status,idequipo from tb_formatos where Not isnull(tema) and idequipo = "'.$idequipo.'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $u) {
                $temas = $u;
            }
            return $temas;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $temas;
    }

    public function listarhabilidades($idequipo) {
         
        try {
            $sql = 'SELECT id_habilidades FROM tb_equipohabilidades where idequipo = "'.$idequipo.'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
     
    }

    public function listartodo($idequipo) {
        $formatos = array();
        try {
            $sql = 'SELECT id_formatos as id,descripcion,tema,objetivos,iddrive,nombrearchivo,ruta,extension,status,idequipo FROM tb_formatos WHERE idequipo = "'.$idequipo.'"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $formatos[] = new Formato($obj->id, $obj->descripcion, $obj->tema, $obj->objetivos, $obj->iddrive, $obj->nombrearchivo, $obj->ruta, $obj->extension, $obj->status, $obj->idequipo);           
           }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $formatos;
    }

    public function status2($idequipo) {
        try {
            $sql = 'SELECT status FROM tb_anteproyecto where idequipo = "'.$idequipo.'" LIMIT 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $formatos = $stmp->fetchAll();
            if(!$formatos){
                $datos = 1;
            }else{
                $datos = $formatos[0];
            }
          return $datos;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function listarcantidadx2() {
        $formatos = array();
        try {
            $sql = 'SELECT f.id_formatos as id,f.descripcion,f.tema,f.objetivos,f.iddrive,f.nombrearchivo,f.ruta,f.extension,f.status,f.idequipo FROM tb_formatos f inner join tb_equipo e on e.idequipo = f.idequipo inner join tb_usuario u on u.idUsuario = e.idUsuario WHERE status = 3 and not isnull(e.idUsuario2) GROUP by e.idequipo';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $formatos[] = new Formato($obj->id, $obj->descripcion, $obj->tema, $obj->objetivos, $obj->iddrive, $obj->nombrearchivo, $obj->ruta, $obj->extension, $obj->status, $obj->idequipo);           
           }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $formatos;
    }

    public function listarcantidad() {
        $formatos = array();
        try {
            $sql = 'SELECT f.id_formatos as id,f.descripcion,f.tema,f.objetivos,f.iddrive,f.nombrearchivo,f.ruta,f.extension,f.status,f.idequipo FROM tb_formatos f inner join tb_equipo e on e.idequipo = f.idequipo inner join tb_usuario u on u.idUsuario = e.idUsuario WHERE status = 3 and isnull(e.idUsuario2) GROUP by e.idequipo';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $formatos[] = new Formato($obj->id, $obj->descripcion, $obj->tema, $obj->objetivos, $obj->iddrive, $obj->nombrearchivo, $obj->ruta, $obj->extension, $obj->status, $obj->idequipo);           
           }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $formatos;
    }

}
