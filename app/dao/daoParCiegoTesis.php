<?php
/**
 * Description of daoParCiegoTesis
 *
 * @author krigare
 */
class daoParCiegoTesis implements Iparciegotesis{
    //put your code here
    public function aprobartesis(\ParciegoTesis $parciego) {
        try {            
            $sql0 = 'delete from tb_parciego where idequipo = :idequipo and proceso = 2';
            $cn = DataBase::getInstancia();
            $stmp0 = $cn->prepare($sql0);
            $stmp0->bindParam(':idequipo', $parciego->getIdEquipo(), PDO::PARAM_INT);          
            $stmp0->execute();
            
            foreach ($parciego->getIdUsuario() as $idusuario){
            $sql1 = 'INSERT INTO tb_parciego ( idUsuario, idequipo, proceso) VALUES (:idUsuario, :idequipo, 2)';
            $stmp1 = $cn->prepare($sql1);
            $stmp1->bindParam(':idUsuario', $idusuario, PDO::PARAM_INT);
            $stmp1->bindParam(':idequipo', $parciego->getIdEquipo(), PDO::PARAM_INT);          
            $stmp1->execute();   
            } 
            $sql = 'UPDATE tb_tesis_link SET status = 3  WHERE idequipo = :id';
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $parciego->getIdEquipo(), PDO::PARAM_INT);
            
            $stmp->execute();
            return $stmp->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function crear(\ParciegoTesis $parciego) {
        
    }

    public function editar(\ParciegoTesis $parciego) {
        try {
            $sql0 = 'delete from tb_parciego where idequipo = :idequipo and proceso = 2';
            $cn = DataBase::getInstancia();
            $stmp0 = $cn->prepare($sql0);
            $stmp0->bindParam(':idequipo', $parciego->getIdEquipo(), PDO::PARAM_INT);          
            $stmp0->execute();
            
            foreach ($parciego->getIdUsuario() as $idusuario){
            $sql1 = 'INSERT INTO tb_parciego ( idUsuario, idequipo, proceso) VALUES (:idUsuario, :idequipo, 2)';
            $stmp1 = $cn->prepare($sql1);
            $stmp1->bindParam(':idUsuario', $idusuario, PDO::PARAM_INT);
            $stmp1->bindParam(':idequipo', $parciego->getIdEquipo(), PDO::PARAM_INT);          
            $stmp1->execute();   
            } 
            $sql = 'UPDATE tb_tesis_link SET status = 3  WHERE idequipo = :id';
            $stmp = $cn->prepare($sql);
            $stmp->bindParam(':id', $parciego->getIdEquipo(), PDO::PARAM_INT);
       
            $stmp->execute();
            return $stmp1->rowCount() > 0 ? true : false;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return false;
    }

    public function actualizarfecha(\ParciegoTesis $parciego) {
         try {            
            $sql0 = 'delete from tb_parciego where idequipo = :idequipo and proceso = 3';
            $cn = DataBase::getInstancia();
            $stmp0 = $cn->prepare($sql0);
            $stmp0->bindParam(':idequipo', $parciego->getIdEquipo(), PDO::PARAM_INT);          
            $stmp0->execute();
            
            foreach ($parciego->getIdUsuario() as $idusuario){
            $sql1 = 'INSERT INTO tb_parciego ( idUsuario, idequipo, proceso) VALUES (:idUsuario, :idequipo, 3)';
            $stmp1 = $cn->prepare($sql1);
            $stmp1->bindParam(':idUsuario', $idusuario, PDO::PARAM_INT);
            $stmp1->bindParam(':idequipo', $parciego->getIdEquipo(), PDO::PARAM_INT);          
            $stmp1->execute();   
            } 
            $sql = 'UPDATE tb_tesis_link SET fechasustentacion = :fechasustentacion  WHERE idequipo = :id';
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

    public function asignarfecha(\ParciegoTesis $parciego) {
        try {            
            $sql0 = 'delete from tb_parciego where idequipo = :idequipo and proceso = 3';
            $cn = DataBase::getInstancia();
            $stmp0 = $cn->prepare($sql0);
            $stmp0->bindParam(':idequipo', $parciego->getIdEquipo(), PDO::PARAM_INT);          
            $stmp0->execute();
            
            foreach ($parciego->getIdUsuario() as $idusuario){
            $sql1 = 'INSERT INTO tb_parciego ( idUsuario, idequipo, proceso) VALUES (:idUsuario, :idequipo, 3)';
            $stmp1 = $cn->prepare($sql1);
            $stmp1->bindParam(':idUsuario', $idusuario, PDO::PARAM_INT);
            $stmp1->bindParam(':idequipo', $parciego->getIdEquipo(), PDO::PARAM_INT);          
            $stmp1->execute();   
            } 
            $sql = 'UPDATE tb_tesis_link SET status = 8,fechasustentacion = :fechasustentacion  WHERE idequipo = :id';
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
