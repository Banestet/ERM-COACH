<?php
include 'conectar.php';
session_start();
//recibir los datos y almacenarlos en variables 

$viejo = $_POST["viejo"];
$nuevo = $_POST["nuevo"];



$req = (strlen($nuevo)*strlen($viejo)) or die("No se han llenado todos los campos");

   //consulta de usuarios
   $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
   $consulta = mysqli_query($conexion,"SELECT * FROM rol WHERE  nombre= '$viejo'");
   mysqli_close($conection);
   $result = mysqli_num_rows($consulta);

   if($result > 0){


   	 //consulta para insertar los datos en la tabla coach
    $actualizar = "UPDATE rol SET nombre ='$nuevo' WHERE nombre = '$viejo'";

    //ejecutar consulta
     $resultado = mysqli_query ($conexion, $actualizar);//para entrenadores


//validacion de registro para entrenadores
if (!$resultado) {
    echo "<script>
                alert('rol NO editado ERROR');
                window.location= 'admin.php'
    </script>";
}else{
    echo "<script>
                alert('rol editado Exitosamente');
                window.location= 'admin.php'
    </script>";
}
    

    }else{
   
echo "<script>
                alert('rol no existe');
                window.location= 'admin.php'
    </script>";
}








