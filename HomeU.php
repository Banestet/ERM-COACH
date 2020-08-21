<?php
/*codigo para que no pueda acceder a la vista sin haber iniciado seccion anterior mente  */ 
error_reporting(0);
include "./conectar.php";
include "admin/Configuracion/SessionTimeU.php";
//include "includes/header.php";
include "includes/navCliente.php";
include "includes/fuctions.php";
session_start();
include "carousel/db.php";
 $images = get_imgs();


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
    <link rel="stylesheet" href="css/chat.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.min2.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style2.css" type="text/css">

    <style>
    .content {
        margin-top: 80px;
    }
    </style>


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="img/Fondo2.jpg">
    </section>
    <!-- Hero Section End -->



    <!-- chat -->

    <div class="chat">
        <a href="ForoChatCliente.php">
            <img src="img/icon/chat.png" alt="" class="chatIcon">
        </a>

    </div>
    <!-- chat End -->



    <!-- incio de retos -->
    <div class="retos">
        <nav class="navbar navbar-inverse">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a class="btn btn-success" id="btnCarousel" href="carousel/">Administar</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container">
            <div class="row">
                <div>
                    <?php if(count($images)>0):?>
                    <!-- aqui insertaremos el slider -->
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <!-- Indicatodores -->
                        <ol class="carousel-indicators">
                            <?php $cnt=0; foreach($images as $img):?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                class="<?php if($cnt==0){ echo 'active'; }?>"></li>
                            <?php $cnt++; endforeach; ?>
                        </ol>

                        <!-- Contenedor de las imagenes -->
                        <div class="carousel">
                            <?php $cnt=0; foreach($images as $img):?>
                            <div class="carousel-item  <?php if($cnt==0){ echo 'active'; }?>">
                                <img src="<?php echo 'carousel/'.$img->folder.$img->src; ?>" alt="Imagen 1">
                                <div id="item">
                                    <div class="carousel-caption d-none d-md-block" style="color: rgb(245, 110, 0);"
                                        style="font-size: 14px;" "><?php echo $img->title; ?></div>
                                    </div>
                                </div>
                                <?php $cnt++; endforeach; ?>
                            </div>

                            <!-- Controls -->
                            <a class=" carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span><span
                                            class="sr-only">Anterior</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Siguiente</span>
                                        </a>

                                    </div>
                                    <?php else:?>
                                    <h4 class="alert alert-warning">No hay imagenes</h4>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

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
                    <script src="js/BMI.js"></script>
</body>

</html>