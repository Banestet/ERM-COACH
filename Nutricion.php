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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutricion</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/Nutricion.css" type="text/css">
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

    <!-- Hero Section Begin 
    <section class="hero-section set-bg" data-setbg="img/NutricionFondo2.jpg">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </section>
     Hero Section End -->

    <section class="portafolio">
        <h1>Menú de Batidos de Frutas</h1>
        <h3>100% naturales sin ninguna azucar agregada</h3>
        <div>
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
                        <p>Aporta vitaminas y minerales para ayudar bajar de peso, sentirse satisfecho y ayudar a
                            depurar toxinas </p>
                    </section>
                </section>
                <section class="portafolio-item">
                    <img src="img/Batidos/Fortaleza-Go.jpg" alt="" class="portafolio-img">
                    <section class="portafolio-text">
                        <h2>Fortaleza-GO</h2>
                        <p>Previene los trastornos cardíacos, el cáncer, la diabetes y contiene una buena dosis de fibra
                            para el colon</p>
                    </section>
                </section>
            </div>
            <div class="d1">
                <form action="CargarFoto.php" method="POST" enctype="multipart/form-data">
                <input class="edit" type="submit" name="Editar" value="Editar">
                    <input type="file" name="imagen" id="imagen">
                    <textarea name="textarea" rows="3" cols="28" placeholder="Escriba la informacion"></textarea>
                </form>
            </div>
            <div class="d2">
            <form action="validarFoto.php" method="POST" enctype="multipart/form-data">
            <input class="edit" type="submit" name="Editar" value="Editar">
                    <input type="file" name="imagen" id="imagen">
                    <textarea name="textarea" rows="3" cols="28" placeholder="Escriba la informacion"></textarea>
                </form>
            </div>
            <div class="d3">
                <form action="validarFoto.php" method="POST" enctype="multipart/form-data">
                    <input class="edit" type="submit" name="Editar" value="Editar">
                    <input type="file" name="imagen" id="imagen">
                    <textarea name="textarea" rows="3" cols="28" placeholder="Escriba la informacion"></textarea>
                </form>
            </div>
        </div>







        <div>
            <div class="portafolio-container">
                <section class="portafolio-item">
                    <img src="img/Batidos/batidov1.jpg" alt="" class="portafolio-img">
                    <section class="portafolio-text">
                        <h2>H2Ocate</h2>
                        <p>Contiene altos niveles de grasa monoinsaturada saludable para el corazón, reduce el nivel de
                            colesterol, y impulsa el crecimiento de la masa muscular</p>
                    </section>
                </section>
                <section class="portafolio-item">
                    <img src="img/Batidos/batidov2.jpg" alt="" class="portafolio-img">
                    <section class="portafolio-text">
                        <h2>El Guerrero Verde</h2>
                        <p>Proporciona fibra, calcio y vitaminas A, C y K. Contiene potentes fitoquímicos y es una
                            excelente manera de obtener todos los nutrientes de los vegetales </p>
                    </section>
                </section>
                <section class="portafolio-item">
                    <img src="img/Batidos/batidov3.jpg" alt="" class="portafolio-img">
                    <section class="portafolio-text">
                        <h2>Energiza tu Dia</h2>
                        <p>Contiene vitamina C para energizar tu día Súper saludable para el cuerpo y ayuda con la
                            inflamación en el estómago</p>
                    </section>
                </section>
            </div>
            <div class="d4">
                <form action="validarFoto.php" method="POST" enctype="multipart/form-data">
                    <input class="edit" type="submit" name="Editar" value="Editar">
                    <input type="file" name="imagen" id="imagen">
                    <textarea name="textarea" rows="3" cols="28" placeholder="Escriba la informacion"></textarea>
                </form>
            </div>
            <div class="d5">
               <form action="validarFoto.php" method="POST" enctype="multipart/form-data">
                    <input class="edit" type="submit" name="Editar" value="Editar">
                    <input type="file" name="imagen" id="imagen">
                    <textarea name="textarea" rows="3" cols="28" placeholder="Escriba la informacion"></textarea>
                </form>
            </div>
            <div class="d6">
                <form action="validarFoto.php" method="POST" enctype="multipart/form-data">
                    <input class="edit" type="submit" name="Editar" value="Editar">
                    <input type="file" name="imagen" id="imagen">
                    <textarea name="textarea" rows="3" cols="28" placeholder="Escriba la informacion"></textarea>
                </form>
            </div>
        </div>






        <div>
            <div class="portafolio-container">
                <section class="portafolio-item">
                    <img src="img/Batidos/batidof1.jpg" alt="" class="portafolio-img">
                    <section class="portafolio-text">
                        <h2>Fortebral</h2>
                        <p>Incluye propiedades afrodisíacas que te ayudarán a aumentar la líbido. Te brindará una gran
                            base calórica por lo que te aportará energía</p>
                    </section>
                </section>
                <section class="portafolio-item">
                    <img src="img/Batidos/batidof2.jpg" alt="" class="portafolio-img">
                    <section class="portafolio-text">
                        <h2>Detoxi</h2>
                        <p>Aporta nutrientes para hacer una “limpieza general” y ayuda para una correcta detoxificación
                            del organismo </p>
                    </section>
                </section>
                <section class="portafolio-item">
                    <img src="img/Batidos/batidof3.jpg" alt="" class="portafolio-img">
                    <section class="portafolio-text">
                        <h2>Fibrarelax</h2>
                        <p>Se encuentra bromelina, un tipo de enzima presente en la piña que también ha mostrado efectos
                            positivos contra el estreñimiento</p>
                    </section>
                </section>
            </div>
            <div class="d7">
                <form action="validarFoto.php" method="POST" enctype="multipart/form-data">
                    <input class="edit" type="submit" name="Editar" value="Editar">
                    <input type="file" name="imagen" id="imagen">
                    <textarea name="textarea" rows="3" cols="28" placeholder="Escriba la informacion"></textarea>
                </form>
            </div>
            <div class="d8">
                <form action="validarFoto.php" method="POST" enctype="multipart/form-data">
                    <input class="edit" type="submit" name="Editar" value="Editar">
                    <input type="file" name="imagen" id="imagen">
                    <textarea name="textarea" rows="3" cols="28" placeholder="Escriba la informacion"></textarea>
                </form>
            </div>
            <div class="d9">
                <form action="validarFoto.php" method="POST" enctype="multipart/form-data">
                    <input class="edit" type="submit" name="Editar" value="Editar">
                    <input type="file" name="imagen" id="imagen">
                    <textarea name="textarea" rows="3" cols="28" placeholder="Escriba la informacion"></textarea>
                </form>
            </div>
        </div>
    </section>






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