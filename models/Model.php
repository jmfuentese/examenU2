<?php
    //se incluye el archivo de conexion a la base de datos
	require_once("conexion.php");
    //Clase Model que contiene todos los modelos con los que se hacen las diferentes consultas a la base de datos
	class Model extends Conexion{
		//este modelo sirve para obtener un solo registro de cualquier tabla que se le indique, tomando como referencia
        //el id del registro, el cual se recibe como segundo parametro
        public static function getItemById($table, $id){
            //se prepara la consulta
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE id = :id");
            //Se parametrizan los datos para evitar mostrar los datos reales en las query
            $statement->bindParam(":id",$id,PDO::PARAM_INT);
            //se ejecuta la consulta y se extrae la respuesta
            $statement->execute();
            return $statement->fetch();
        }

        //se obtiene una alumna en especifico basado en el nombre y apellido
        public static function getAlumnaId($table, $nom, $app){
            //se prepara la consulta
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE nombre=:nom AND apellido=:app");
            //se realiza la parametrizacion de datos
            $statement->bindParam(":nom",$nom,PDO::PARAM_STR);
            $statement->bindParam(":app",$app,PDO::PARAM_STR);
            //se ejecuta la consulta y se extrae la respuesta
            $statement->execute();
            return $statement->fetch();
        }

        //se obtiene un grupo en especifico pasado en su nombre
        //este metodo se utiliza para conseguir el id de un grupo
        public static function getGrupoId($table, $grupo){
            //se prepara la consulta
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table WHERE nombre = :nom");
            //se realiza la parametrizacion de datos
            $statement->bindParam(":nom",$grupo,PDO::PARAM_STR);
            //se ejecuta la consulta y se extrae la respuesta
            $statement->execute();
            return $statement->fetch();
        }

        //se obtiene un listado de todos los registros de cualquier tabla
        //el nombre de la tabla se recibe como unico parametro
        public static function getListModel($table){
            //se prepara la consulta
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table");
            //se ejecuta la consulta y se extraen todos los registros
            $statement->execute();
            return $statement->fetchAll();
        }

        //se obtiene el listado de todos los registros de la tabla pagos
        //los registros se ordenan por fecha_pago ya que este campo determina el lugar para las alumnas registradas
        public static function getPagosListModel($table){
            //se prepara la consulta ordenando los resultados
            $statement = Conexion::conectar()->prepare("SELECT * FROM $table ORDER BY fecha_pago");
            $statement->execute();
            //se ejecuta y se retorna la respuesta
            return $statement->fetchAll();
        }

        //modelo para crear un nuevo registro de pago
        //se obtiene el nombre de la tabla y un array asociativo con los datos del registro
        public static function registroPagoModel($table, $datos){
            //se invocan los metodos locales para obtener id de la alumna y del grupo
            $idAlumna = self::getAlumnaId("alumnas", $datos["nombre"], $datos["apellido"]);
            $idGrupo = self::getGrupoId("grupos", $datos["grupo"]);
            //se prepara la consulta
            $statement = Conexion::conectar()->prepare(
                "INSERT INTO $table(id_alumna, id_grupo, mama, fecha_pago, archivo, fecha_registro, folio) 
                                VALUES (:idAlumna,:idGrupo,:mama,:fecha_pago,:archivo,:fecha_registro, :folio)");
            //se realiza la parametrizacion para cada uno de los campos
            $statement->bindParam(":idAlumna",$idAlumna["id"],PDO::PARAM_INT);
            $statement->bindParam(":idGrupo",$idGrupo["id"],PDO::PARAM_INT);
            $statement->bindParam(":mama",$datos["mama"],PDO::PARAM_STR);
            $statement->bindParam(":fecha_pago",$datos["fecha_pago"],PDO::PARAM_STR);
            $statement->bindParam(":archivo",$datos["archivo"],PDO::PARAM_STR);
            $statement->bindParam(":fecha_registro",$datos["fecha_registro"],PDO::PARAM_STR);
            $statement->bindParam(":folio",$datos["folio"],PDO::PARAM_STR);
            //se ejecuta la consulta y se retorna un valor booleano dependiendo de la ejecucion de la consulta
            if($statement->execute()){
                return true;
            }else{
                return false;
            }
        }
	
	}
?>