<?php
	require_once("conexion.php");

	class Model extends Conexion{
		
        public static function getItemById($table, $id){
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE id = :id");
            $statement->bindParam(":id",$id,PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch();
        }

        public static function getAlumnaId($table, $nom, $app){
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE nombre=:nom AND apellido=:app");
            $statement->bindParam(":nom",$nom,PDO::PARAM_STR);
            $statement->bindParam(":app",$app,PDO::PARAM_STR);
            $statement->execute();
            return $statement->fetch();
        }

        public static function getGrupoId($table, $grupo){
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE nombre = :nom");
            $statement->bindParam(":nom",$grupo,PDO::PARAM_STR);
            $statement->execute();
            return $statement->fetch();
        }

        public static function getListModel($table){
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table");
            $statement->execute();

            return $statement->fetchAll();
        }

        public static function getPagosListModel($table){
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY fecha_pago");
            $statement->execute();

            return $statement->fetchAll();
        }

        public static function registroPagoModel($table, $datos){
            $idAlumna = self::getAlumnaId("alumnas", $datos["nombre"], $datos["apellido"]);
            $idGrupo = self::getGrupoId("grupos", $datos["grupo"]);
            $statement = Conexion::conectar()->prepare(
                "INSERT INTO $table(id_alumna, id_grupo, mama, fecha_pago, archivo, fecha_registro, folio) 
                                VALUES (:idAlumna,:idGrupo,:mama,:fecha_pago,:archivo,:fecha_registro, :folio)");
            $statement->bindParam(":idAlumna",$idAlumna["id"],PDO::PARAM_INT);
            $statement->bindParam(":idGrupo",$idGrupo["id"],PDO::PARAM_INT);
            $statement->bindParam(":mama",$datos["mama"],PDO::PARAM_STR);
            $statement->bindParam(":fecha_pago",$datos["fecha_pago"],PDO::PARAM_STR);
            $statement->bindParam(":archivo",$datos["archivo"],PDO::PARAM_STR);
            $statement->bindParam(":fecha_registro",$datos["fecha_registro"],PDO::PARAM_STR);
            $statement->bindParam(":folio",$datos["folio"],PDO::PARAM_STR);
            if($statement->execute()){
                return true;
            }else{
                return false;
            }
        }
	
	}
?>