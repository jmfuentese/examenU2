<?php
//Clase conexion para comunicarse con la base de datos
class Conexion{
	//metodo unico conectar, realiza la conexion con la base de datos, definiendo host, nombre de la base de datos, usuario y contraseña
	public static function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=danzlife","root","123456");//Modificar contraseña, dbname y host en caso de ser necesario por los datos del servicio local
		return $link;
	}
}
?>
