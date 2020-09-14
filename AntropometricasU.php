<?php
error_reporting(0);
include "admin/Configuracion/SessionTimeU.php";
include "includes/navCliente.php";
include "includes/fuctions.php";


session_start();
$nombre = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antropometricas</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style2.css" type="text/css">
    <link rel="stylesheet" href="css/Antropometricas.css" type="text/css">
</head>

<body>
<link rel="shortcut icon" type="image/x-icon" href="/img/icon/ERM.png">
    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="img/hero-bg.jpg">
        <h1 class="title">Medidas Antropometricas</h1>
        <div class="antropometricas">
            <div class="antropo1">
                <form class="form-horizontal" action="MedidasU.php" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">peso</label>
                        <div class="col-sm-2">
                            <input type="text" name="peso" placeholder="peso" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Altura</label>
                        <div class="col-sm-2">
                            <input type="text" name="altura" placeholder="Altura" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">1. P. Biceps Contraido</label>
                        <div class="col-sm-2">
                            <input type="text" name="BicepD" placeholder="Bicep Derecho" required>
                            <input type="text" name="BicepI" placeholder="Bicep Izquierdo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">2. Perimetro Hombro</label>
                        <div class="col-sm-2">
                            <input type="text" name="Hombros" placeholder="Hombros" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">3. Perimetro Pecho</label>
                        <div class="col-sm-2">
                            <input type="text" name="Pecho" placeholder="Pecho" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">4. Perimetro Antebrazo</label>
                        <div class="col-sm-2">
                            <input type="text" name="AntebrazoD" placeholder="Antebrazo D" required>
                            <input type="text" name="AntebrazoI" placeholder="Antebrazo I" required>
                        </div>
                    </div>

                    <div class="antropo2">


                        <div class="form-group">
                            <label class="col-sm-3 control-label">5. Perimetro Muñeca</label>
                            <div class="col-sm-2">
                                <input type="text" name="Muñeca" placeholder="Muñeca" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">6. Perimetro Abdomen</label>
                            <div class="col-sm-2">
                                <input type="text" name="Abdomen" placeholder="Abdomen" required>
                            </div>
                        </div>
                        <div>
                            <label class="col-sm-3 control-label">7. Perimetro Cintura</label>
                            <div class="col-sm-2">
                                <input type="text" name="Cintura" placeholder="Cintura" required>
                            </div>
                        </div>
                        <div>
                            <label class="col-sm-3 control-label">8. Perimetro Cadera</label>
                            <div class="col-sm-2">
                                <input type="text" name="Cadera" placeholder="Cadera" required>
                            </div>
                        </div>
                        <div>
                            <label class="col-sm-3 control-label">9. Perimetro Muslo</label>
                            <div class="col-sm-2">
                                <input type="text" name="Muslo" placeholder="Muslo" required>
                            </div>
                        </div>
                        <div>
                            <label class="col-sm-3 control-label">10. Perimetro Rodilla</label>
                            <div class="col-sm-2">
                                <input type="text" name="Rodilla" placeholder="Rodilla" required>
                            </div>
                        </div>
                        <div>
                            <label class="col-sm-3 control-label">11. Perimetro Gemelos</label>
                            <div class="col-sm-2">
                                <input type="text" name="Gemelos" placeholder="Gemelos" required>
                            </div>
                        </div>
                        <div>
                            <label class="col-sm-3 control-label">12. Perimetro Tobillo</label>
                            <div class="col-sm-2">
                                <input type="text" name="Tobillo" placeholder="Tobillo" required>
                            </div>
                        </div>
                        <div class="antropo3">
                            <div>
                                <label class="col-sm-3 control-label">13. Perimetro Pierna</label>
                                <div class="col-sm-2">
                                    <input type="text" name="Pierna" placeholder="Pierna" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">14.P. Biceps Relajado</label>
                                <div class="col-sm-2">
                                    <input type="text" name="BicepDR" placeholder="Bicep Derecho" required>
                                    <input type="text" name="BicepDI" placeholder="Bicep Izquierdo" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Observaciones</label>
                                <textarea class="form-control" name="observacion" id="exampleFormControlTextarea1" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">&nbsp;</label>
                                <div class="col-sm-6">
                                    <input type="submit" name="add" class="btn btn-sm btn-primary"
                                        value="Guardar datos">

                                </div>
                            </div>
                        </div>
                    </div>



                    <img src="img/Medidas.png" class="avatare">


                </form>
            </div>
        </div>

    </section>
    <!-- Hero Section End -->




    <!-- About Section Begin -->
    <div class="div2">
        <div class="container">
            <div class="row">
                <div class="bmi">
                    <form action="BMIC.php" method="POST" >

                    Sistema :

<label>
    <input type="radio" id="bmi-metric" value = "bmi-metric" name="bmi-measure" onchange="measureBMI()" checked />
    Metrico
</label>
<label>
    <input type="radio" id="bmi-imperial" value = "bmi-imperial"  name="bmi-measure" onchange="measureBMI()" /> Imperial
</label>
<br><br> Weight:
<input class="input" id="bmi-weight" name="bmi-weight" type="number" min="1" max="635"
    required />
<span id="bmi-weight-unit">KG</span>
<br><br> Height:
<input class="input" id="bmi-height" name="bmi-height" type="number" min="54" max="272"
    required />
<span id="bmi-height-unit">CM</span>
 <br><br>
  <input type="submit" value="Calcular BMI" />

                    </form>

                </div>
                <div class="tableBmi">
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
                                    <th>Bajo de Peso</th>
                                </tr>
                                <tr>
                                    <td class="point ">18.5 – 24.9</td>
                                    <th>Peso Normal</th>
                                </tr>
                                <tr>
                                    <td class="point ">25.0 - 29.9</td>
                                    <th>Pre Obesidad</th>
                                </tr>
                                <tr>
                                    <td class="point ">30.0 - 34.9 </td>
                                    <th>Clase I Obesidad </th>
                                </tr>
                                <tr>
                                    <td class="point ">35 - 39.9 </td>
                                    <th>Obesidad Clase II </th>
                                </tr>
                                <tr>
                                    <td class="point ">Por encima de 40 </td>
                                    <th>Obesidad Clase III </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="texto">
                    <h3 style="color: white;">ERM<strong style="color: rgb(192, 108, 30);">COACH</strong>
                        <h1 style="color: rgb(16, 73, 158);">
                            </style><strong>BMI</strong></h1>
                    </h3>
                    <p class="bmiText">El índice de masa corporal (BMI) es una medición del peso de una persona en
                        cuanto a su altura. Es más de un indicador que una medición directa de la grasa de cuerpo entero
                        de una persona.</p>
                    <p class="bmiText">La fórmula es - BMI = (peso en kilogramos) dividido por (la altura en los
                        contadores ajustados)</p>
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
    <script src="/Home.js"></script>
    <script src="/js/BMI.js"></script>
</body>

</html>