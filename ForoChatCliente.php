<?php
include "conectar.php";
$sql = "SELECT * FROM configuracion";
$res = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Foro Chat ERMCoach</title>
    <link rel="stylesheet" type="text/css" href="css/chat.css">
    <link rel="stylesheet" href="css/chat.css">
    <link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">

    

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
                <input type="text" name="nombre" placeholder="Ingresa tu nombre">
                <textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
                <input type="submit" name="enviar" value="Enviar">
            </form>

            <?php
			if (isset($_POST['enviar'])) {
				
				$nombre = $_POST['nombre'];
				$mensaje = $_POST['mensaje'];


				$consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
				$ejecutar = $conexion->query($consulta);

				if ($ejecutar) {
					echo "<embed loop='false' src='beep.mp3' hidden='true' autoplay='true'>";
				}
			}

		?>
        </div>

        <!-- Section chat end -->
        <a href="HomeU.php">
            <?php
            $data = mysqli_fetch_array($res);
            echo '<img src="' . $data['ruta'] . '" alt="" class="avatarchat">';
            ?>
        </a>


    
</body>
</html>