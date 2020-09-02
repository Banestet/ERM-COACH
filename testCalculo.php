<?php
error_reporting(0);
include 'conectar.php';

session_start();
$genero=$_POST['Genero'];
$Edad=$_POST['Edad'];
$distancia=$_POST['Distancia'];
$Nombre = $_SESSION['usuario'];
$Fecha  = $_SESSION["ultimoAcceso"];

 
?>