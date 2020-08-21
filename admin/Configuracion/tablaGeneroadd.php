<?php
error_reporting(0);
include 'conectar.php';
session_start();
//recibir los datos y almacenarlos en variables 
$nuevo = $_POST["nuevo"];



$req = (strlen($nuevo)) or die("No se han llenado todos los campos");

   //consulta de usuarios
   $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
   $consulta = mysqli_query($conexion,"SELECT * FROM genero WHERE  nombre= '$nuevo'");
   mysqli_close($conection);
   $result = mysqli_num_rows($consulta);

   if($result > 0){
    echo "<script>
                alert('genero repetido');
                window.location= '../../tablas-basicas.php'
    </script>";

    }else{
    //consulta para insertar los datos en la tabla coach
    $insertar = "INSERT INTO genero(nombre) VALUES ('$nuevo')";

    //ejecutar consulta
     $resultado = mysqli_query ($conexion, $insertar);//para entrenadores


//validacion de registro para entrenadores
if (!$resultado) {
    echo "<script>
                alert('genero NO Registrado ERROR');
                window.location= '../../tablas-basicas.php'
    </script>";
}else{
    echo "<script>
                alert('genero Registrado Exitosamente');
                window.location= '../../tablas-basicas.php'
    </script>";
}

}







