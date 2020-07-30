<?php
/*codigo para que no pueda acceder a la vista sin haber iniciado seccion anterior mente  */ 
error_reporting(0);
include "conectar.php";
session_start();
$sql ="SELECT * FROM configuracion";
$res=mysqli_query($conexion,$sql);
if(empty($_SESSION['activeU'])){
    header('location: LoginCliente.php');
}else{
    //codigo para cierre de session por inactividad

    $fechaGuardada = $_SESSION["ultimoAccesoU"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

    //comparamos el tiempo transcurrido
    if($tiempo_transcurrido >= 600) {
    //si pasaron 10 minutos o más
    session_destroy(); // destruyo la sesión
    echo "<script>
    alert('Session Cerrada Por Inactividad');
    window.location= 'LoginCliente.php'
    </script>";
    //header("Location: index.php"); //envío al usuario a la pag. de autenticación
    //sino, actualizo la fecha de la sesión
    }else {
    $_SESSION["ultimoAccesoU"] = $ahora;
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Cliente</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/HomeU.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="infoUsuario">
                <h1> <strong> Bienvenido:</strong> <?php echo $_SESSION['usuarioU'] ?> </h1>
                <h1><?php echo $_SESSION['correoU'] ?></h1>

                <img class="avatarUsuario" src="/img/entrenador.jpg" alt="">
            </div>
            <div class="logo">
                <a href="HomeU.php">
                    <?php
                        $data=mysqli_fetch_array($res);
                        echo '<img src="'.$data['ruta']. '" alt="" class="avatar">';
                    ?>
                </a>
                <hr>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li class="active"><a href="HomeU.php">Inicio</a></li>
                        <li><a href="NutricionU.php">Nutricion</a></li>
                        <li><a href="WorkoutU.php">Entrenamineto</a></li>
                        <li><a href="AntropometricasU.php">Medidas Antropometricas</a></li>
                    </ul>
                </nav>
                <a href="salir.php" class="primary-btn signup-btn">Salir</a>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="img/Fondo2.jpg">
        
    </section>
    <!-- Hero Section End -->



    
    <!-- chat Section -->
    <div id="contenedor">
            <div id="caja-chat">
                <div id="chat"></div>
            </div>

            <form method="POST" action="Home.php">
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


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Js BMI calculator -->
    <script src="js/BMI.js"></script>
</body>

</html>