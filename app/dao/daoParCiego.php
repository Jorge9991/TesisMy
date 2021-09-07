<?php

class daoParCiego implements Iparciego{
    //put your code here
    public function aprobaranteproyecto(\Parciego $parciego) {
        try {            
            $sql0 = 'delete from tb_parciego where idequipo = :idequipo';
            $cn = DataBase::getInstancia();
            $stmp0 = $cn->prepare($sql0);
            $stmp0->bindParam(':idequipo', $parciego->getIdEquipo(), PDO::PARAM_INT);          
            $stmp0->execute();
            
            foreach ($parciego->getIdUsuario() as $idusuario){
            $sql1 = 'INSERT INTO tb_parciego ( idUsuario, idequipo) VALUES (:idUsuario, :idequipo)';
            $stmp1 = $cn->prepare($sql1);
            $stmp1->bindParam(':idUsuario', $idusuario, PDO::PARAM_INT);
            $stmp1->bindParam(':idequipo', $parciego->getIdEquipo(), PDO::PARAM_INT);          
            $stmp1->execute();   
            } 
            $sql = 'UPDATE tb_anteproyecto SET status = 3 , fechasustentacion = :fechasustentacion WHERE idequipo = :id';
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $parciego->getIdEquipo(), PDO::PARAM_INT);
            $stmp->bindParam(':fechasustentacion', $parciego->getFechasustentacion(), PDO::PARAM_STR);
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function crear(\Parciego $parciego) {
        
    }

    public function editar(\Parciego $parciego) {
        try {
            $sql0 = 'delete from tb_parciego where idequipo = :idequipo';
            $cn = DataBase::getInstancia();
            $stmp0 = $cn->prepare($sql0);
            $stmp0->bindParam(':idequipo', $parciego->getIdEquipo(), PDO::PARAM_INT);          
            $stmp0->execute();
            
            foreach ($parciego->getIdUsuario() as $idusuario){
            $sql1 = 'INSERT INTO tb_parciego ( idUsuario, idequipo) VALUES (:idUsuario, :idequipo)';
            $stmp1 = $cn->prepare($sql1);
            $stmp1->bindParam(':idUsuario', $idusuario, PDO::PARAM_INT);
            $stmp1->bindParam(':idequipo', $parciego->getIdEquipo(), PDO::PARAM_INT);          
            $stmp1->execute();   
            } 
            $sql = 'UPDATE tb_anteproyecto SET status = 3 , fechasustentacion = :fechasustentacion WHERE idequipo = :id';
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $parciego->getIdEquipo(), PDO::PARAM_INT);
            $stmp->bindParam(':fechasustentacion', $parciego->getFechasustentacion(), PDO::PARAM_STR);
            $stmp->execute();
            return $stmp1->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

}
