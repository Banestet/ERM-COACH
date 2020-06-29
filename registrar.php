<?php
include 'conectar.php';


//recibir los datos y almacenarlos en variables del sing coach

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$usuario = $_POST["usuario"];
$contraseña = $_POST["contraseña"];
$correo = $_POST["correo"];

$fecha = $_POST["fecha"];
$residencia = $_POST["residencia"];
$peso = $_POST["peso"];
$altura = $_POST["altura"];

$req = (strlen($nombre)*strlen($apellidos)*strlen($telefono)*strlen($usuario)*strlen($contraseña)*strlen($correo)) or die("No se han llenado todos los campos");

$req2 = (strlen($nombre)*strlen($apellidos)*strlen($fecha)*strlen($telefono)*strlen($residencia)*strlen($usuario)*strlen($contraseña)*strlen($correo)*strlen($peso)*strlen($altura)) or die("No se han llenado todos los campos");

//consulta oara insertar los datos
$insertar = "INSERT INTO coach(nombre,apellidos,telefono,usuario,contraseña,correo) VALUES ('$nombre','$apellidos','$telefono','$usuario','$contraseña','$correo')";

$insertarUser = "INSERT INTO usuarios(nombre,apellidos,fecha,telefono,residencia,usuario,contraseña,correo,peso,altura) VALUES ('$nombre','$apellidos','$fecha','$telefono','$residencia','$usuario','$contraseña','$correo','$peso','$altura')";

//ejecutar consulta
$resultado = mysqli_query ($conexion, $insertar);
$resultado2 = mysqli_query ($conexion, $insertarUser);
//validacion de registro para entrenadores
if (!$resultado) {
    echo "<script>
                alert('Usuario Registrado Exitosamente');
                window.location= 'LoginCoach'
    </script>";
}else{
    echo "<script>
                alert('Usuario Registrado Exitosamente');
                window.location= 'HomeCoach.php'
    </script>";
}

//validacion de registro para usuarios
if (!$resultado2) {
    echo 'Error al registrar';
}else{
    echo "<script>
                alert('Usuario Registrado Exitosamente');
                window.location= 'SignClient.php'
    </script>";
}


