<?php
session_start();
$_SESSION['usuario'] = 'Hola';
header("Location: panel.php");

?>

