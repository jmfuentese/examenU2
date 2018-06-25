<?php
//se incluye el archivo de conexion
require_once("conexion.php");

//se recibe el parametro grupo medianete el metodo post
$grupo = $_GET["grupo"];

//se prepara el query para hacer la consulta a la base de datos
$statement = Conexion::conectar()->prepare("SELECT * FROM alumnas WHERE grupo = '$grupo'");
//se ejecuta la query
$statement->execute();
$alumnas = $statement->fetchAll();
//echo $alumnas;
//se imprimen las opciones filtradas por el grupo obtenido mediante post

//Se valida si la cantidad de registros para el grupo seleccionado es igual a 0
if (sizeof($alumnas)== 0){
    //en caso de ser igual a 0 se imprime un unico option para informarle al usuario que no existen registros
    echo "<option value='' selected disabled>No hay alumnas registradas en el grupo seleccionado</option>";
}else {
    //en caso de existir registros se imprime la primer opcion que indica al usuario que seleccione una alumna
    echo "<option value='' selected disabled>Seleccionar alumna</option>";
    //se imprime cada registro mediante un ciclo for asociativo
    foreach ($alumnas as $row => $alumna) {
        //se concatena el nombre y apellido de cada alumna en un solo string
        $str = $alumna["nombre"] . " " . $alumna["apellido"];
        //por ultimo se imprime la opcion con el string creado como valor y como texto interno
        echo '<option value="' . $str . '">' . $str . '</option>';
    }
}












