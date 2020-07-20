<?php
include 'conectar.php';
include 'Configuracion/SED.php';
session_start();

//recibir los datos y almacenarlos en variables
$nombreU = $_POST["nombreU"];
$apellidosU = $_POST["apellidosU"];
$telefonoU = $_POST["telefonoU"];
$usuarioU = $_POST["usuarioU"];
$contra = $_POST["contraseñaU"];
//Encriptacion de la contraseña
$contraseñaU = SED:: encryption($contra);
$correoU = $_POST["correoU"];
$fechaU = $_POST["fechaU"];
$residenciaU = $_POST["residenciaU"];
$pesoU= $_POST["pesoU"];
$alturaU = $_POST["alturaU"];
$generoU = $_POST["generoU"];





$req = (strlen($generoU)*strlen($alturaU)*strlen($residenciaU)*strlen($fechaU)*strlen($nombreU)*strlen($apellidosU)*strlen($telefonoU)*strlen($usuarioU)*strlen($contra)*strlen($correoU)) or die("No se han llenado todos los campos");


   //consulta de usuarios
   $usuarioU = mysqli_real_escape_string($conexion,$_POST['usuarioU']);
   $consulta = mysqli_query($conexion,"SELECT * FROM usuarios WHERE  usuarioU= '$usuarioU'");
   mysqli_close($conection);
   $result = mysqli_num_rows($consulta);

   if($result > 0){
    echo "<script>
                alert('Usuario repetido');
                window.location= 'SignClient.php'
    </script>";

    }else{
    //consulta para insertar los datos en la tabla coach
    if ($generoU == 1) {
	$generoCliente = 'Hombre'; 
    }else{
	$generoCliente = 'Mujer'; 
    }

     $insertar = "INSERT INTO usuarios(nombreU,apellidosU,fechaU,telefonoU,residenciaU,usuarioU,contraseñaU,correoU,pesoU,alturaU,generoU) VALUES ('$nombreU','$apellidosU','$fechaU','$telefonoU','$residenciaU','$usuarioU','$contraseñaU','$correoU','$pesoU','$alturaU','$generoCliente')";


    //ejecutar consulta
    $resultado = mysqli_query ($conexion, $insertar);//para entrenadores

//validacion de registro para entrenadores
if (!$resultado) {
    echo "<script>
                alert('Usuario NO Registrado');
                window.location= 'SignClient.php'
    </script>";
}else{
    echo "<script>
                alert('Usuario Registrado Exitosamente');
                window.location= 'LoginCliente.php'
    </script>";
}
}

