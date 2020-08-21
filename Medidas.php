<?php
error_reporting(0);
include 'conectar.php';
session_start();
$nombre = $_SESSION['usuario'];
$fecha  = $_SESSION["ultimoAcceso"];;
if (isset($_POST['add'])) {

    $peso             = mysqli_real_escape_string($conexion, (strip_tags($_POST["peso"], ENT_QUOTES))); //Escanpando caracteres 
    $altura             = mysqli_real_escape_string($conexion, (strip_tags($_POST["altura"], ENT_QUOTES))); //Escanpando caracteres 
    $BicepD     = mysqli_real_escape_string($conexion, (strip_tags($_POST["BicepD"], ENT_QUOTES))); //Escanpando caracteres 
    $BicepI     = mysqli_real_escape_string($conexion, (strip_tags($_POST["BicepI"], ENT_QUOTES))); //Escanpando caracteres 
    $Hombros         = mysqli_real_escape_string($conexion, (strip_tags($_POST["Hombros"], ENT_QUOTES))); //Escanpando caracteres 
    $Pecho         = mysqli_real_escape_string($conexion, (strip_tags($_POST["Pecho"], ENT_QUOTES))); //Escanpando caracteres 
    $AntebrazoD         = mysqli_real_escape_string($conexion, (strip_tags($_POST["AntebrazoD"], ENT_QUOTES))); //Escanpando caracteres 
    $AntebrazoI             = mysqli_real_escape_string($conexion, (strip_tags($_POST["AntebrazoI"], ENT_QUOTES))); //Escanpando caracteres 
    $Muñeca             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Muñeca"], ENT_QUOTES))); //Escanpando caracteres 
    $Abdomen             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Abdomen"], ENT_QUOTES))); //Escanpando caracteres 
    $Cintura             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Cintura"], ENT_QUOTES))); //Escanpando caracteres 
    $Cadera             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Cadera"], ENT_QUOTES))); //Escanpando caracteres 
    $Muslo             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Muslo"], ENT_QUOTES))); //Escanpando caracteres 
    $Rodilla             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Rodilla"], ENT_QUOTES))); //Escanpando caracteres 
    $Gemelos             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Gemelos"], ENT_QUOTES))); //Escanpando caracteres 
    $Tobillo             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Tobillo"], ENT_QUOTES))); //Escanpando caracteres 
    $Pierna             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Pierna"], ENT_QUOTES))); //Escanpando caracteres 
    $BicepDR             = mysqli_real_escape_string($conexion, (strip_tags($_POST["BicepDR"], ENT_QUOTES))); //Escanpando caracteres 
    $BicepDI             = mysqli_real_escape_string($conexion, (strip_tags($_POST["BicepDI"], ENT_QUOTES))); //Escanpando caracteres 
    $observacion             = mysqli_real_escape_string($conexion, (strip_tags($_POST["observacion"], ENT_QUOTES))); //Escanpando caracteres 



    $insert = mysqli_query($conexion, "INSERT INTO medidas(nombre,fecha, peso,altura, BicepD, BicepI, Hombros, Pecho, AntebrazoD, AntebrazoI, Muñeca, Abdomen, Cintura,Cadera,Muslo,Rodilla,Gemelos,Tobillo,Pierna,BicepDR,BicepDI,observacion)
                        VALUES ('$nombre','$fecha',' $peso','$altura','$BicepD',' $BicepI',' $Hombros',' $Pecho',' $AntebrazoD', '$AntebrazoI',' $Muñeca',' $Abdomen',' $Cintura','$Cadera','$Muslo','$Rodilla','$Gemelos','$Tobillo','$Pierna','$BicepDR','$BicepDI','$observacion')") or die(mysqli_error());
    if ($insert) {
        echo "<script>
                    alert('Bien hecho los datos han sido guardados con exito');
                    window.location= 'Antropometricas.php'
                </script>";
    } else {
        echo "<script>
                    alert('Error!! los datos no se han guardado');
                    window.location= 'Antropometricas.php'
                </script>";
    }
}
