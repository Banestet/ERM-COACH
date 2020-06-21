<?php
include "db.php";
?>
<!DOCTYPE html>

<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home ERM</title>
<link rel="stylesheet" href="HomeCoach.css">
<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">

</head>

<body>
    <link rel="shortcut icon" type="image/x-icon" href="img/ERM.png">
    <div class="home">
        <img class="Logo" src="/img/ERM.p4ng" alt="logo">
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

        <div class="contenedor">
            <div class="caja-chat">
                <div class="chat">
                    <?php
                        $consulta = "SELECT * FROM chat ORDER BY id DESC";
                        $ejecutar =$conexion->query($consulta);
                        while($fila= ejecutar->fetch_array()):
                    ?>
                        <div class="datos-chat">
                            <span style="color: blue;"><?php echo $fila['nombre']; ?>:</span>
                            <span style="color: rgb(0, 0, 0);"><?php echo $fila['mensaje']; ?>:</span>
                            <span style="float: right;"><?php echo $fila['fecha']; ?>:</span>
                         </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="cajaOpcion">
                <form>
                    <input type="text" name="nombre" placeholder="Ingresa tu nombre">
                    <textarea class="textarea" name="mensaje" placeholder="ingresa tu mensaje" id="textarea"></textarea>
                    <input type="submit" name="enviar" value="enviar">
                </form>
            </div>
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
                <input type="submit" name="Entrenamiento" value="Entrenamiento">
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