<?php
//se incluye el archivo de conexion
require_once("conexion.php");

//se recibe el parametro grupo medianete el metodo post
$grupo = $_POST["grupo"];

//se prepara el query para hacer la consulta a la base de datos
$statement = Conexion::conectar()->prepare("SELECT * FROM alumnas WHERE grupo = $grupo");
//se ejecuta la query
$statement->execute();
$alumnas = $statement->fetchAll();

//se imprimen las opciones filtradas por el grupo obtenido mediante post
$html = "<option value=''>Seleccionar alumna</option>";
foreach($alumnas as $row => $alumna){
    $str = $alumna["nombre"]." ".$alumna["apellido"];
    $html = '<option value="'.$str.'">'.$str.'</option>';
}
echo $html;
?>












