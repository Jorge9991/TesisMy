<?php
class daoCorreo {
    public function link() {
        try {
            $sql = 'SELECT link FROM cronograma';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    public function cuantoscorreos($idequipo) {
        try {
            $sql = 'SELECT IF((SELECT COUNT(idequipo) FROM tb_equipo where isnull(idUsuario2) and idequipo = "' . $idequipo . '") = 1,1 ,2) as equipo1o2';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    public function correo1($idequipo) {
        try {
            $sql = 'SELECT u.correo as correo FROM tb_equipo e inner join tb_usuario u on u.idUsuario = e.idUsuario WHERE idequipo = "' . $idequipo . '"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    public function correo2($idequipo) {
        try {
            $sql = 'SELECT u.correo as correo1 ,us.correo as correo2 FROM tb_equipo e inner join tb_usuario u on u.idUsuario = e.idUsuario inner join tb_usuario us on us.idUsuario = e.idUsuario2 WHERE idequipo = "' . $idequipo . '"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    public function correojurado($idjurado) {
        try {
            $sql = 'SELECT correo,CONCAT ( apellido," ",nombre ) as nombres FROM tb_usuario where idUsuario = "' . $idjurado . '"';
            $cn = DataBase::getInstancia();
            $stmp = $cn->prepare($sql);
            $stmp->execute();
            $return = $stmp->fetchAll();
            return $return;
        } catch (PDOException $e) {
            throw $e;
        }
    }

}