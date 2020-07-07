<?php

$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$conexion =mysqli_connect("localhost","root","","erm");

$consulta= "SELECT* FROM coach WHERE usuario='$usuario'and contraseña='$contraseña'";

$resultado=mysqli_query($conexion, $consulta);


$filas=mysqli_num_rows($resultado);//al momento de ejecutar la consulta si ha conincidio me arroja 1 si no hay ningun dato que coincida me arroja 0
if ($filas) {//si filas a coincidido un dato
    header("location:HomeCoach.php");
}else{
    echo"Error en la autenticacion";
    header("location:LoginCoach.php");
}

//con esta funcion me libera de los resultados que ha tomado de la base de datos por que consume espacion en memoria
mysqli_free_result($resultado)

?>