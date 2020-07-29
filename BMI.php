<?php
include 'conectar.php';
session_start();

$peso = $_POST["bmi-weight"];
$altura = $_POST["bmi-height"];

$req = (strlen($peso)*strlen($altura)) or die("No se han llenado todos los campos");
 
$insertar = "INSERT INTO bmi(bmi-weight,bmi-height) VALUES ('$peso','$altura')";

$resultado = mysqli_query ($conexion, $insertar);
if (!$resultado) {
    echo "<script>
                alert('Datos no guardados ERROR');
                window.location= 'Antropometricas.php'
    </script>";
}else{
    echo "<script>
                alert('datos guardados');
                window.location= 'Antropometricas.php'
    </script>";
}


?>