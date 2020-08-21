<?php
error_reporting(0);
include "admin/Configuracion/SessionTimeU.php";
include "conectar.php";
include "includes/navCliente.php";
include "includes/fuctions.php";
session_start();

$sql ="SELECT * FROM batidos";
$res=mysqli_query($conexion,$sql);
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
    <link rel="stylesheet" href="css/style2.css" type="text/css">
    <link rel="stylesheet" href="css/NutricionU.css" type="text/css">

    <!-- css para la galeria de imagenes -->

</head>

<body>
<link rel="shortcut icon" type="image/x-icon" href="/img/icon/ERM.png">

    

    <div class="container gallery-container" id="batidos">

        <h1 class="TituloBatidos">Galeria de batidos</h1>
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

<script>
	$(document).ready(function(){
		load(1);
	});
	function load(page){
		var parametros = {"action":"ajax","page":page};
		$.ajax({
			url:'/admin/ajax/banner_ajax.php',
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