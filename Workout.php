<?php
error_reporting(0);
include "admin/Configuracion/SessionTime.php";
include "./conectar.php";
include "includes/navCoach.php";
include "includes/fuctions.php";
session_start();


?>
<?php
$title="Galería de imágenes";
/* Llamar la Cadena de Conexion*/ 
include "./conexion.php";
$active_config="active";
$active_banner="active";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrenamiento</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <!-- Css Styles portafolio entrenamirnto -->
    <link href="css/freelancer.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/freelancer.min.css">
    <link rel="stylesheet" href="css/style2.css" type="text/css">





</head>

<body>
<link rel="shortcut icon" type="image/x-icon" href="/img/icon/ERM.png">
    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="img/Workout.jpg">
                <div class="container">
                    <!-- Main component for a primary marketing message or call to action -->
                    <div class="menu">

                        <ol class="breadcrumb">
                            <li class="active">Ejercicios</li>
                        </ol>
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <a href='workout/banneradd.php' class="btn btn-default"><span
                                        class="glyphicon glyphicon-plus"></span> Agregar Ejericios</a>
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

    </section>
    <!-- Hero Section End -->





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
    <!-- Js Plugins portafolio entrenamiento -->
    <script src="js/b/jquery-3.3.1.min.js"></script>
    <script src="js/b/bootstrap.min.js"></script>
</body>

</html>

<script>
  $(document).ready(function() {
    load(1);
  });

  function load(page) {
    var parametros = {
      "action": "ajax",
      "page": page
    };
    $.ajax({
      url: '../workout/ajax/banner_ajax.php',
      data: parametros,
      beforeSend: function(objeto) {
        $("#loader").html("<img src='../img/ajax-loader.gif'>");
      },
      success: function(data) {
        $(".outer_div").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }

  function eliminar_slide(id) {
    page = 1;
    var parametros = {
      "action": "ajax",
      "page": page,
      "id": id
    };
    if (confirm('Esta acción  eliminará de forma permanente el ejercicio \n\n Desea continuar?')) {
      $.ajax({
        url: 'workout/ajax/banner_ajax.php',
        data: parametros,
        beforeSend: function(objeto) {
          $("#loader").html("<img src='../images/ajax-loader.gif'>");
        },
        success: function(data) {
          $(".outer_div").html(data).fadeIn('slow');
          $("#loader").html("");
        }
      })
    }
  }
</script>