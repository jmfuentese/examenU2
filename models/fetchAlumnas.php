<?php
require_once("conexion.php");

$grupo = $_POST["grupo"];

$statement = Conexion::conectar()->prepare("SELECT * FROM alumnas WHERE grupo = $grupo");
$statement->execute();
$alumnas = $statement->fetchAll();

$html = "<option value=''>Seleccionar alumna</option>";

foreach($alumnas as $row => $alumna){
    $str = $alumna["nombre"]." ".$alumna["apellido"];
    $html = '<option value="'.$str.'">'.$str.'</option>';
}
echo $html;
?>












