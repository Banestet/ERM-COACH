<?php
include 'conectar.php';
include 'Configuracion/SED.php';
session_start();
//recibir los datos y almacenarlos en variables del sing coach
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$usuario = $_POST["usuario"];
$contra = $_POST["contrasena"];
$correo = $_POST["correo"];
//Encriptacion de la contraseña
$contrasena = SED:: encryption($contra);


$req = (strlen($nombre)*strlen($apellidos)*strlen($telefono)*strlen($usuario)*strlen($contrasena)*strlen($correo)) or die("No se han llenado todos los campos");

   //consulta de usuarios
   $usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
   $consulta = mysqli_query($conexion,"SELECT * FROM coach WHERE  usuario= '$usuario'");
   mysqli_close($conection);
   $result = mysqli_num_rows($consulta);

   if($result > 0){
    echo "<script>
                alert('Usuario repetido');
                window.location= 'SignCoach.php'
    </script>";

    }else{
    //consulta para insertar los datos en la tabla coach
    $insertar = "INSERT INTO coach(nombre,apellidos,telefono,usuario,contrasena,correo) VALUES ('$nombre','$apellidos','$telefono','$usuario','$contrasena','$correo')";

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

}







