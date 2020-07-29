<?php
error_reporting(0);
include "Configuracion/SessionTimeU.php";
include "conectar.php";
session_start();

$sql ="SELECT * FROM batidos";
$res=mysqli_query($conexion,$sql);
$sql2 ="SELECT * FROM configuracion";
$res2=mysqli_query($conexion,$sql2);
$res3=mysqli_query($conexion,$sql2);
?>

<?php 
include "conexion.php";
$active1="";
$active2="";
$active3="";
$active4="active";
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/thumbnail-gallery.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/NutricionU.css" type="text/css">

    <!-- css para la galeria de imagenes -->

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
                <?php
                $data3=mysqli_fetch_array($res3);
                echo '<h1>'.$data3['Empresa']. '</h1>';
                ?>
                <img class="avatarUsuario" src="/img/entrenador.jpg" alt="">

            </div>
            <div class="logo">
                <a href="HomeU.php">
                    <?php
                        $data2=mysqli_fetch_array($res2);
                        echo '<img src="'.$data2['ruta']. '" alt="" class="avatar">';
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

    <div class="container gallery-container">

        <h1>Galeria de batidos</h1>
        <div class="tz-gallery">
            <div class="row">
                <?php
			$nums=1;
			$sql_banner_top=mysqli_query($con,"select * from banner where estado=1 order by orden ");
			while($rw_banner_top=mysqli_fetch_array($sql_banner_top)){
		?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <a class="lightbox" href="img/banner/<?php echo $rw_banner_top['url_image'];?>">
                            <img src="img/banner/<?php echo $rw_banner_top['url_image'];?>"
                                alt="<?php echo $rw_banner_top['titulo'];?>">
                        </a>
                        <div class="caption">
                            <h3><?php echo $rw_banner_top['titulo'];?></h3>
                            <p><?php echo $rw_banner_top['descripcion'];?></p>
                        </div>
                    </div>
                </div>
                <?php
			if ($nums%3==0){
				echo '<div class="clearfix"></div>';
			}
			$nums++;
			}
		?>


            </div>

        </div>

    </div>

    <script>
    baguetteBox.run('.tz-gallery');
    </script>

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