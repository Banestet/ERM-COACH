<?php
error_reporting(0);
include "Configuracion/SessionTimeU.php";
include "conectar.php";
session_start();

$sql ="SELECT * FROM batidos";
$res=mysqli_query($conexion,$sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutricion Cliente</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/NutricionU.css" type="text/css">
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
                    <img src="img/ERM.png" class="avatar" alt="Avatar Image">
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

    <section class="portafolio">
        <h1>Menú de Batidos de Frutas</h1>
        <h3>100% naturales sin ninguna azucar agregada</h3>
		<div class="portafolio-container">
			<section class="portafolio-item">
                <?php
                    $data=mysqli_fetch_array($res);
                    echo '<img src="'.$data['ruta']. '" alt="" class="portafolio-img">';
                ?>
				<section class="portafolio-text">
					<h2>Poder Pink</h2>
					<p>Contiene una gran cantidad de fósforo, hierro, yodo, minerales y las vitaminas B1, B2, B3 y B6, Gracias al jengibre, incrementa el metabolismo que facilita que el cuerpo gaste más energía y adelgaza</p>
				</section>
			</section>
			<section class="portafolio-item">
				<img src="img/Batidos/FusionFrutal.jpg" alt="" class="portafolio-img">
				<section class="portafolio-text">
					<h2>Fusión Frutal</h2>
					<p>Aporta vitaminas y minerales para ayudar bajar de peso, sentirse satisfecho y ayudar a depurar toxinas </p>
				</section>
			</section>
			<section class="portafolio-item">
				<img src="img/Batidos/Fortaleza-Go.jpg" alt="" class="portafolio-img">
				<section class="portafolio-text">
					<h2>Fortaleza-GO</h2>
					<p>Previene los trastornos cardíacos, el cáncer, la diabetes y contiene una buena dosis de fibra para el colon</p>
				</section>
            </section>
		</div>
        <h1>Batidos Verdes</h1>
        <h3>100% naturales sin ninguna azucar agregada</h3>
        <div class="portafolio-container">
			<section class="portafolio-item">
				<img src="img/Batidos/batidov1.jpg" alt="" class="portafolio-img">
				<section class="portafolio-text">
					<h2>H2Ocate</h2>
					<p>Contiene altos niveles de grasa monoinsaturada saludable para el corazón, reduce el nivel de colesterol, y impulsa el crecimiento de la masa muscular</p>
				</section>
			</section>
			<section class="portafolio-item">
				<img src="img/Batidos/batidov2.jpg" alt="" class="portafolio-img">
				<section class="portafolio-text">
					<h2>El Guerrero Verde</h2>
					<p>Proporciona fibra, calcio y vitaminas A, C y K. Contiene potentes fitoquímicos y es una excelente manera de obtener todos los nutrientes de los vegetales </p>
				</section>
			</section>
			<section class="portafolio-item">
				<img src="img/Batidos/batidov3.jpg" alt="" class="portafolio-img">
				<section class="portafolio-text">
					<h2>Energiza tu Dia</h2>
					<p>Contiene vitamina C para energizar tu día Súper saludable para el cuerpo y ayuda con la inflamación en el estómago</p>
				</section>
            </section>
        </div>
        <h1>Batidos Funcionales</h1>
        <h3>100% naturales sin ninguna azucar agregada</h3>
        <div class="portafolio-container">
			<section class="portafolio-item">
				<img src="img/Batidos/batidof1.jpg" alt="" class="portafolio-img">
				<section class="portafolio-text">
					<h2>Fortebral</h2>
					<p>Incluye propiedades afrodisíacas que te ayudarán a aumentar la líbido. Te brindará una gran base calórica por lo que te aportará energía</p>
				</section>
			</section>
			<section class="portafolio-item">
				<img src="img/Batidos/batidof2.jpg" alt="" class="portafolio-img">
				<section class="portafolio-text">
					<h2>Detoxi</h2>
					<p>Aporta nutrientes para hacer una “limpieza general” y ayuda para una correcta detoxificación del organismo </p>
				</section>
			</section>
			<section class="portafolio-item">
				<img src="img/Batidos/batidof3.jpg" alt="" class="portafolio-img">
				<section class="portafolio-text">
					<h2>Fibrarelax</h2>
                    <p>Se encuentra bromelina, un tipo de enzima presente en la piña que también ha mostrado efectos positivos contra el estreñimiento</p>
				</section>
            </section>
        </div>
    </section>
    <div class="footer">
        <small>Copyright &copy; ERM COACH 2020- Todos los derechos reservados</small>
    </div>






    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Js BMI calculator -->
    <script src="/Home.js"></script>
</body>

</html>