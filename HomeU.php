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
                <h1 > <strong > Bienvenido:</strong>  <?php echo $_SESSION['usuarioU'] ?> </h1>
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
        <div class="container">
            <div class="row">
                
            </div>
        </div>
    </section>
    <!-- Hero Section End -->



    <!-- About Section Begin -->
    <div class="div2">
        <div class="container">
            <div class="row">
                <div class="bmi">
                    <form onsubmit="return calcBMI(); ">

                        Sistema :
                        <label>
                          <input type="radio" id="bmi-metric" name="bmi-measure" onchange="measureBMI()" checked/> Metrico
                        </label>
                        <label>
                          <input type="radio" id="bmi-imperial" name="bmi-measure" onchange="measureBMI()"/> Imperial
                        </label>
                        <br><br> Weight:
                        <input class="input" id="bmi-weight" type="number" min="1" max="635" required/>
                        <span id="bmi-weight-unit">KG</span>
                        <br><br> Height:
                        <input class="input" id="bmi-height" type="number" min="54" max="272" required/>
                        <span id="bmi-height-unit">CM</span>
                        <br><br>

                        <input type="submit" value="Calcular BMI" />
                        <div id="bmi-results"></div>
                    </form>

                </div>
                <div class="table">
                    <div class="chart-table  ">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th>BMI</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="point ">Por debajo 18.5</td>
                                    <td>Bajo de Peso</td>
                                </tr>
                                <tr>
                                    <td class="point ">18.5 – 24.9</td>
                                    <td>Peso Normal</td>
                                </tr>
                                <tr>
                                    <td class="point ">25.0 - 29.9</td>
                                    <td>Pre Obesidad</td>
                                </tr>
                                <tr>
                                    <td class="point ">30.0 - 34.9 </td>
                                    <td>Clase I Obesidad </td>
                                </tr>
                                <tr>
                                    <td class="point ">35 - 39.9 </td>
                                    <td>Obesidad Clase II </td>
                                </tr>
                                <tr>
                                    <td class="point ">Por encima de 40 </td>
                                    <td>Obesidad Clase III </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="texto">
                    <h3 style="color: black;">ERM<strong style="color: rgb(192, 108, 30);">COACH</strong>
                        <h1 style="color: rgb(16, 73, 158);">
                            </style><strong>BMI</strong></h1>
                    </h3>
                    <p class="bmiText">El índice de masa corporal (BMI) es una medición del peso de una persona en cuanto a su altura. Es más de un indicador que una medición directa de la grasa de cuerpo entero de una persona.</p>
                    <p class="bmiText">La fórmula es - BMI = (peso en kilogramos) dividido por (la altura en los contadores ajustados)</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->



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