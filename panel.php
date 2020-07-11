
<?php
session_start();
$varsesion = $_SESSION['usuario'];

if ($varsesion == null || $varsesion = '') {
	echo 'Usted no tiene autorizacion';
	die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sesion</title>
</head>
<body>
	<h1>PANEL DE USUARIO</h1>
	<h2>Bienvenido: <?php echo $_SESSION['usuario'] ?></h2>	
	<a href="cerrar_session.php"> cerrar sesion</a>
</body>
</html>



