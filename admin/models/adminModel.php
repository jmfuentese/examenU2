<?php
	require_once("conexion.php");

	class AdminModel extends Conexion{
        public static function loginModel($table, $datos){
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE usuario = :usr AND password = :pass");
            $statement->bindParam(":usr", $datos["usuario"],PDO::PARAM_STR);
            $statement->bindParam(":pass", $datos["password"],PDO::PARAM_STR);
            $statement->execute();
            #fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement.
            return $statement->fetch();
            //$statement->close();
        }

		public static function registroAlumnaModel($table, $datos){
            $statement = Conexion::conectar()->prepare(
                "INSERT INTO $table(nombre,apellido,fecha_nacimiento,grupo) 
                                VALUES (:nombre,:apellido,:fecha,:grupo)");
            $statement->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
            $statement->bindParam(":apellido",$datos["apellido"],PDO::PARAM_STR);
            $statement->bindParam(":fecha",$datos["fecha_nacimiento"],PDO::PARAM_STR);
            $statement->bindParam(":grupo",$datos["grupo"],PDO::PARAM_STR);
            if($statement->execute()){
                return true;
            }else{
                return false;
            }
        }

        public static function registroGrupoModel($table, $datos){
            $statement = Conexion::conectar()->prepare(
                "INSERT INTO $table(nombre) 
                                VALUES (:nombre)");
            $statement->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
            if($statement->execute()){
                return true;
            }else{
                return false;
            }
        }

        public static function borrarModel($table, $idA){
            $statement = Conexion::conectar()->prepare("DELETE FROM $table WHERE id = :id");
            $statement->bindParam(":id",$idA,PDO::PARAM_STR);
            if($statement->execute()){
                return true;
            }else{
                return false;
            }
        }

        public static function userListModel($table){
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table");
            $statement->execute();

            return $statement->fetchAll();
        }



        public static function getCategoryByNameModel($table, $nombre){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE nombre_categoria = :nombre");
            $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
        }

        public static function updateAlumnaModel($table, $datos, $idA){
            $stmt = Conexion::conectar()->prepare("UPDATE $table SET nombre = :nombre, apellido = :apellido, 
                                                fecha_nacimiento = :fecha_nacimiento, grupo = :grupo WHERE id = :id");

            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
            $stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $idA, PDO::PARAM_INT);

            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public static function updateGrupoModel($table, $datos, $idG){
            $stmt = Conexion::conectar()->prepare("UPDATE $table SET nombre = :nombre WHERE id = :id");

            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $idG, PDO::PARAM_INT);

            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public static function getListModel($table){
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table");
            $statement->execute();

            return $statement->fetchAll();
        }

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

        public static function getPagosSortedListModel($table){
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY fecha_pago");
            $statement->execute();

            return $statement->fetchAll();
        }

	}
?>