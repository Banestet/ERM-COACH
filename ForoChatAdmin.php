<?php
include "conectar.php";
session_start();
$sql = "SELECT * FROM configuracion";
$res = mysqli_query($conexion, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Foro Chat ERMCoach</title>
    <link rel="stylesheet" type="text/css" href="css/chat.css">
    <link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
    <!-- Font -->
	<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/chat.css">
	
    

	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();

			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}
			req.open('GET', 'includes/chat.php', true);
			req.send();
		}

		//linea que hace que se refreseque la pagina cada segundo
		setInterval(function(){ajax();}, 1000);
	</script>
</head>

<body onload="ajax();">
<link rel="shortcut icon" type="image/x-icon" href="/img/icon/ERM.png">
<div id="contenedor">
            <div id="caja-chat">
                <div id="chat"></div>
            </div>

            <form method="POST" action="ForoChatAdmin.php">
                <textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
				<input type="submit" name="enviar" value="Enviar">
            </form>
			<a type="button" class="btn btn-primary" href="admin.php">Regresar</a>

            <?php
			if (isset($_POST['enviar'])) {
				
				$nombre = $_SESSION['usuario'];
				$mensaje = $_POST['mensaje'];


				$consulta = "INSERT INTO chat (usuario, mensaje) VALUES ('$nombre', '$mensaje')";
				$ejecutar = $conexion->query($consulta);

				if ($ejecutar) {
					echo "<embed loop='false' src='beep.mp3' hidden='true' autoplay='true'>";
				}
			}

		?>
        </div>

        <!-- Section chat end -->
        <a href="admin.php">
            <?php
            $data = mysqli_fetch_array($res);
            echo '<img src="' . $data['ruta'] . '" alt="" class="avatarchat">';
            ?>
        </a>


    
</body>
</html>