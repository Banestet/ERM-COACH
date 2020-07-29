<?php
error_reporting(0);
include "Configuracion/SessionTime.php";
include "conectar.php";
session_start();



$sql ="SELECT * FROM batidos";
$res=mysqli_query($conexion,$sql);
$sql2 ="SELECT * FROM configuracion";
$res2=mysqli_query($conexion,$sql2);
$res3=mysqli_query($conexion,$sql2);

?>
<?php
$title="Galería de imágenes";
/* Llamar la Cadena de Conexion*/ 
include ("../conexion.php");
$active_config="active";
$active_banner="active";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/ico/favicon.ico">
    <title>Nutricion</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/Nutricion.css" type="text/css">


    <!-- css para la galeria de imagenes -->
    <!-- Custom styles for this template -->
    

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
                <h1> <strong> Bienvenido:</strong> <?php echo $_SESSION['usuario'] ?> </h1>
                <h1><?php echo $_SESSION['correo'] ?></h1>
                <?php
                $data3=mysqli_fetch_array($res3);
                echo '<h1>'.$data3['Empresa']. '</h1>';
                ?>
                <img class="avatarUsuario" src="/img/entrenador.jpg" alt="">

            </div>
            <div class="logo">
                <a href="Home.php">
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
                        <li class="active"><a href="Home.php">Inicio</a></li>
                        <li><a href="Nutricion.php">Nutricion</a></li>
                        <li><a href="Workout.php">Entrenamineto</a></li>
                        <li><a href="Antropometricas.php">Medidas Antropometricas</a></li>
                    </ul>
                </nav>
                <a href="salir.php" class="primary-btn signup-btn">Salir</a>
            </div>
        </div>
    </header>
    <!-- Header End -->

    
     <div class="container">
		
        <!-- Main component for a primary marketing message or call to action -->
        <div class="menu">
  
           <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li class="active">Batidos</li>
          </ol>
              <div class="row">
                <div class="col-xs-12 text-right">
                    <a href='admin/banneradd.php' class="btn btn-default" ><span class="glyphicon glyphicon-plus"></span> Agregar Batido</a>
                </div>
                
              </div>
            
            <br>
            <div id="loader" class="text-center"> <span><img src="./img/ajax-loader.gif"></span></div>
            <div class="outer_div"></div><!-- Datos ajax Final -->
                        
        </div>
  
      </div> <!-- /container -->
      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>





    <script src="js/main.js"></script>
    <!-- Js BMI calculator -->
    <script src="/Home.js"></script>
</body>

</html>

<script>
	$(document).ready(function(){
		load(1);
	});
	function load(page){
		var parametros = {"action":"ajax","page":page};
		$.ajax({
			url:'admin/ajax/banner_ajax.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='../img/ajax-loader.gif'>");
		  },
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}
	function eliminar_slide(id){
		page=1;
		var parametros = {"action":"ajax","page":page,"id":id};
		if(confirm('Esta acción  eliminará de forma permanente el banner \n\n Desea continuar?')){
		$.ajax({
			url:'admin/ajax/banner_ajax.php',
			data: parametros,
			 beforeSend: function(objeto){
			$("#loader").html("<img src='../images/ajax-loader.gif'>");
		  },
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$("#loader").html("");
			}
		})
	}
	}
</script>