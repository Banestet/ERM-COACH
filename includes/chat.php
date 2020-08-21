<?php
include "../conectar.php";
session_start();
	///consultamos a la base
	$consulta = "SELECT * FROM chat ORDER BY id DESC";
	$ejecutar = $conexion->query($consulta); 
	while($fila = $ejecutar->fetch_array()) : 
?>
	<div id="datos-chat">
		<span style="color: chocolate;"><?php echo $fila['usuario']; ?></span>
		<span style="color: white;"><?php echo $fila['mensaje']; ?></span>
		<span style="float: right; color: gray;"><?php echo $fila['fecha']; ?></span>
	</div>
	
	<?php endwhile; ?>
