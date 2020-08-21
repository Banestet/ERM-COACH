<?php
error_reporting(0);
include 'conectar.php';


session_start();

$alturar = $_POST["bmi-height"];
$peso = $_POST["bmi-weight"];
$nombre = $_SESSION['usuario'];
$fecha  = $_SESSION["ultimoAcceso"];
//Tipo de sistema 
$radio1 = $_POST['bmi-measure'];



//verificar sistema
if ($radio1 == "bmi-metric") {
$altura  = $alturar  / 100;
//calculo 1 de bmi
$bmi = $peso  / ($altura * $altura);
$radio1 = "Metrico";
 
	
}else{
//calculo 2 de bmi
$bmi = 703 * ($peso  / ($alturar * $alturar));
$radio1 = "Imperial";

}
//Redondear cifra BMI
$bmi = round($bmi * 100) / 100; 

//Verificar el estado
 if ($bmi  < 18.5) {
        $bmir  =  "Bajo de Peso";
    } else if ($bmi  < 25) {
        $bmir  =    "Peso Normal";
    } else if ($bmi  < 30) {
        $bmir  =    "Pre-Obesidad";
    } else if ($bmi < 35) {
        $bmir  =    "Obesidad Clase I";
    } else if ($bmi < 40) {
       $bmir  =    "Obesidad Clase II";
    } else {
        $bmir  =    "Obesidad Clase III";
    }


$insertar = "INSERT INTO bmi(nombre,fecha,peso,altura,resultado,estado,sistema) VALUES ('$nombre','$fecha','$peso','$alturar','$bmi','$bmir','$radio1')";


$resultado = mysqli_query ($conexion, $insertar);

if (!$resultado) {
    echo "<script>
                alert('ERROR');
                window.location= 'Antropometricas.php'
    </script>";
}else{
	//MOSTRAR RESULTADO BMI
    echo "<script>
                alert('$nombre su bmi es $bmi $bmir');
                window.location= 'Antropometricas.php'
    </script>";
}


?>