<?php
include 'conectar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home ERM</title>
    <link rel="stylesheet" href="HomeCoach.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <!-- icon add photo-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <script type="text/javascript">
    function ajax() {
        var req = new XMLHttpRequest();

        req.onreadystatechange = function() {
            if (req.readyState == 4 && req.status == 200) {
                document.getElementById('chat').innerHTML = req.responseText;
            }
        }

        req.open('GET', 'chat.php', true);
        req.send();
    }

    //linea que hace que se refreseque la pagina cada segundo
    setInterval(function() {
        ajax();
    }, 1000);
    </script>


</head>

<body onload="ajax();">
    <link rel="shortcut icon" type="image/x-icon" href="img/ERM.png">
    <div class="home">
        <img class="Logo" src="/img/ERM.png" alt="logo">
        <div class="select">

            <select name="format" id="format">
                <option selected disabled>Usuarios</option>
                <option value="pdf">Esteban</option>
                <option value="txt">Madelen</option>
                <option value="epub">Angie</option>
                <option value="fb2">Sebas</option>
                <option value="mobi">mobi</option>
            </select>
        </div>

        <div id="contenedor" class="contenedor">
            <div id="caja-chat" class ="caja-chat">

                <div id="chat" class="chat" >
                    <?php
                        ///consultamos a la base
                        $consulta = "SELECT * FROM chat ORDER BY id DESC";
                        $ejecutar = $conexion->query($consulta); 
                        while($fila = $ejecutar->fetch_array()) : 
                    ?>
                    
                    <?php endwhile; ?>
                </div>
            </div>

            <form method="POST" action="HomeCoach.php">
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



        <div class="Info">
            <div class="Info2">
                
                <input class="btn" type="submit" value="Agregar">
                <input class="btn" type="submit" value="Eliminar">
                <input class="btn" type="submit" value="Actualizar">
            </div>


        </div>
        <div class="Menu">
            <div class="InfoUsuario"></div>

            <div class="Nutricional">
                <input type="submit" name="Nutricional" value="Nutricional">

            </div>
            <div class="Entrenamiento">
                <input type="submit" name="Entrenamiento" value="Entrenamiento" href="Nutricion.php">
            </div>
            <div class="Antropometrica">
                <input type="submit" name="Antropometricas" value="Antropometricas">
            </div>
        </div>
    </div>
    <div class="footer">
        <small>Copyright &copy; ERM COACH 2020- Todos los derechos reservados</small>
    </div>

</body>

</html>