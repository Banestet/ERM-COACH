<?php
error_reporting(0);
include 'conectar.php';
session_start();
//recibir los datos y almacenarlos en variables 
$viejo = $_POST["viejo"];
$req = (strlen($viejo)) or die("No se han llenado todos los campos");

   //consulta de usuarios
   $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
   $consulta = mysqli_query($conexion,"SELECT * FROM genero WHERE  nombre= '$viejo'");
   mysqli_close($conection);
   $result = mysqli_num_rows($consulta);

   if($result > 0){


   	 //consulta para insertar los datos en la tabla coach
    $eliminar = "DELETE FROM genero  WHERE nombre = '$viejo'";

    //ejecutar consulta
     $resultado = mysqli_query ($conexion, $eliminar);//para entrenadores


//validacion de registro para entrenadores
if (!$resultado) {
    echo "<script>
                alert('genero NO eliminado ERROR');
                window.location= '../../tablas-basicas.php'
    </script>";
}else{
    echo "<script>
                alert('genero eliminado Exitosamente');
                window.location= '../../tablas-basicas.php'
    </script>";
}
    

    }else{
   
echo "<script>
                alert('genero no existe');
                window.location= '../../tablas-basicas.php'
    </script>";
}








