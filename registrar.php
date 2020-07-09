<?php
include 'conectar.php';

//recibir los datos y almacenarlos en variables del sing coach
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];
$correo = $_POST["correo"];

$req = (strlen($nombre)*strlen($apellidos)*strlen($telefono)*strlen($usuario)*strlen($contraseña)*strlen($correo)) or die("No se han llenado todos los campos");


//consulta para insertar los datos en la tabla coach
$insertar = "INSERT INTO coach(nombre,apellidos,telefono,usuario,contraseña,correo) VALUES ('$nombre','$apellidos','$telefono','$usuario','$contraseña','$correo')";

//ejecutar consulta
$resultado = mysqli_query ($conexion, $insertar);//para entrenadores

//validacion de registro para entrenadores
if (!$resultado) {
    echo "<script>
                alert('Usuario NO Registrado ERROR');
                window.location= 'SignCoach.php'
    </script>";
}else{
    echo "<script>
                alert('Usuario Registrado Exitosamente');
                window.location= 'LoginCoach.php'
    </script>";
}




