<?php
include 'conectar.php';
session_start();
//recibir los datos y almacenarlos en variables 
$nuevo = $_POST["nuevo"];



$req = (strlen($nuevo)) or die("No se han llenado todos los campos");

   //consulta de usuarios
   $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
   $consulta = mysqli_query($conexion,"SELECT * FROM rol WHERE  nombre= '$nuevo'");
   mysqli_close($conection);
   $result = mysqli_num_rows($consulta);

   if($result > 0){
    echo "<script>
                alert('rol repetido');
                window.location= 'admin.php'
    </script>";

    }else{
    //consulta para insertar los datos en la tabla coach
    $insertar = "INSERT INTO rol(nombre) VALUES ('$nuevo')";

    //ejecutar consulta
     $resultado = mysqli_query ($conexion, $insertar);//para entrenadores


//validacion de registro para entrenadores
if (!$resultado) {
    echo "<script>
                alert('rol NO Registrado ERROR');
                window.location= 'admin.php'
    </script>";
}else{
    echo "<script>
                alert('rol Registrado Exitosamente');
                window.location= 'admin.php'
    </script>";
}

}







