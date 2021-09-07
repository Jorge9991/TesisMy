<?php
/**
 * Description of daoEquipoTutor
 *
 * @author krigare
 */
class daoEquipoTutor implements Iequipotutor{
    //put your code here
    public function aceptar(\EquipoTutor $equipo) {
        $equipotutor = array();
         try { 
            $sqlx = 'SELECT idequipotutor as id,idequipo,idUsuario,solicitud FROM tb_equipo_tutor where idUsuario = :idusuario and solicitud = 2';
            $cn = DataBase::getInstancia();
            $stm = $cn->prepare($sqlx);
            $stm->bindParam(':idusuario', $equipo->getIdUsuario(), PDO::PARAM_INT);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $equipotutor[] = new EquipoTutor($obj->id, $obj->idequipo, $obj->idUsuario, $obj->solicitud, "");             
            }
            
            if (count($equipotutor) < 3) {
            $sql = 'UPDATE tb_equipo_tutor SET solicitud = 2 WHERE idequipo = :idequipo';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':idequipo', $equipo->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            }
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function cancelarsolicitud(\EquipoTutor $equipo) {
        try {
            $sql = 'delete from tb_equipo_tutor where idequipo = :idequipo';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':idequipo', $equipo->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function crear(\EquipoTutor $equipo) {
        try {
            $sqlx = 'SELECT count(idequipotutor) as total FROM tb_equipo_tutor where idUsuario = :idUsuario and solicitud = 2';
            $cn = DataBase::getInstancia();
            $stm = $cn->prepare($sqlx);
            $stm->bindParam(':idUsuario', $equipo->getIdUsuario(), PDO::PARAM_INT);
            $stm->execute();
            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $total = ($obj->total);
            }
            if ($total < 3) {
                $sql = 'INSERT INTO tb_equipo_tutor (idequipo, idUsuario, solicitud) VALUES ( :idequipo, :idUsuario, 1)';
                $stmp = $cn->prepare($sql);
                $stmp->bindParam(':idequipo', $equipo->getIdEquipo(), PDO::PARAM_INT);
                $stmp->bindParam(':idUsuario', $equipo->getIdUsuario(), PDO::PARAM_INT);
                $stmp->execute();
            }
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function crearsolo(\EquipoTutor $equipo) {
        
    }

    public function eliminar(\EquipoTutor $equipo) {
      try {
            $sql = 'delete from tb_equipo_tutor where idequipo= :idequipo';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':idequipo', $equipo->getIdEquipo(), PDO::PARAM_INT);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function equiposolo($idequipo) {
        
    }

    public function listar($idequipo) {
        $equipotutor = array();
        try {
            $sql = 'SELECT idequipotutor as id, idequipo, idUsuario, solicitud FROM tb_equipo_tutor WHERE idequipo = "'.$idequipo.'" and solicitud = 2';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $equipotutor[] = new EquipoTutor($obj->id, $obj->idequipo, $obj->idUsuario, $obj->solicitud, "");             
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $equipotutor;
    }

    public function listarSolicitudes($idusuario) {
        $solicitudes = array();
        try {
            $sql = 'SELECT et.idequipotutor as id,et.idequipo,et.idUsuario,et.solicitud,CONCAT ( u.apellido," ", u.nombre," ","-"," ",us.apellido," ", us.nombre )as nombres FROM tb_equipo_tutor et inner join tb_equipo e on e.idequipo = et.idequipo inner join tb_usuario u on u.idUsuario = e.idUsuario inner join tb_usuario us on us.idUsuario = e.idUsuario2 WHERE et.idUsuario = "'.$idusuario.'"  and not isnull(e.idUsuario2) and et.solicitud = 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $solicitudes[] = new EquipoTutor($obj->id, $obj->idequipo, $obj->idUsuario, $obj->solicitud, $obj->nombres);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $solicitudes;
    }

    public function nombreequipo($idequipo) {
        
    }

    public function solicitud() {
        
    }

    public function solicitudenviada($idequipo) {
        try {
            $sql = 'SELECT count(idequipotutor) as total FROM tb_equipo_tutor where idequipo = "' . $idequipo . '"  and solicitud = 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $total = ($obj->total);
            }
            return $total;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function listarSolicitudes2($idusuario) {
        $solicitudes = array();
        try {
            $sql = 'SELECT et.idequipotutor as id,et.idequipo,et.idUsuario,et.solicitud,CONCAT ( u.apellido," ", u.nombre)as nombres FROM tb_equipo_tutor et inner join tb_equipo e on e.idequipo = et.idequipo inner join tb_usuario u on u.idUsuario = e.idUsuario WHERE et.idUsuario = "'.$idusuario.'" and isnull(e.idUsuario2) and et.solicitud = 1';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            foreach ($stmp->fetchAll(PDO::FETCH_OBJ) as $obj) {
                $solicitudes[] = new EquipoTutor($obj->id, $obj->idequipo, $obj->idUsuario, $obj->solicitud, $obj->nombres);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $solicitudes;
    }

}
