<?php
include 'conectar.php';
session_start();
//recibir los datos y almacenarlos en variables del sing coach
$nombreU = $_POST["nombreU"];
$apellidosU = $_POST["apellidosU"];
$telefonoU = $_POST["telefonoU"];
$usuarioU = $_POST["usuarioU"];
$contraseñaU = sha1($_POST["contraseñaU"]);
$correoU = $_POST["correoU"];
$fechaU = $_POST["fechaU"];
$residenciaU = $_POST["residenciaU"];
$pesoU= $_POST["pesoU"];
$alturaU = $_POST["alturaU"];
$generoU = $_POST["generoU"];

/*
$req = (strlen($nombre)*strlen($apellidos)*strlen($telefono)*strlen($usuario)*strlen($contraseña)*strlen($correo)) or die("No se han llenado todos los campos");
*/

//consulta para insertar los datos en la tabla coach

$insertar = "INSERT INTO usuarios(nombreU,apellidosU,fechaU,telefonoU,residenciaU,usuarioU,contraseñaU,correoU,pesoU,alturaU) VALUES ('$nombreU','$apellidosU','$fechaU','$telefonoU','$residenciaU','$usuarioU','$contraseñaU','$correoU','$pesoU','$alturaU')";



//ejecutar consulta
$resultado = mysqli_query ($conexion, $insertar);//para entrenadores

//validacion de registro para entrenadores
if (!$resultado) {
    echo "<script>
                alert('Usuario NO Registrado ERROR');
                window.location= 'SignClient.php'
    </script>";
}else{
    echo "<script>
                alert('Usuario Registrado Exitosamente');
                window.location= 'LoginCliente.php'
    </script>";
}




