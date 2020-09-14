<?php
error_reporting(0);
session_start();
include "admin/Configuracion/SessionTime.php";
include "includes/navCoach.php";
include "includes/fuctions.php";
$codigo = $_SESSION['codigo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> <strong> Bienvenido:</strong> <?php echo $_SESSION['usuario'] ?> </h1>
    <h1> <strong> Bienvenido:</strong> <?php echo $_SESSION['correo'] ?> </h1>
    <h1> <strong> Bienvenido:</strong> <?php echo $_SESSION['telefono'] ?> </h1>
    <h1> <strong> Bienvenido:</strong> <?php echo $_SESSION['estado'] ?> </h1>
    <h1> <strong> Bienvenido:</strong> <?php echo $_SESSION['rol'] ?> </h1>
</body>
</html>