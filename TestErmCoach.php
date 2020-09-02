<?php
error_reporting(0);
//include "admin/Configuracion/SessionTime.php";
include "includes/navCoach.php";
session_start();
$sql = "SELECT * FROM configuracion";
$res = mysqli_query($conexion, $sql);
$res3 = mysqli_query($conexion, $sql);

$Nombre = $_SESSION['usuario'];
$Fecha  = $_SESSION["ultimoAcceso"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/TestERM.css">

</head>


<body>
    <link rel="shortcut icon" type="image/x-icon" href="/img/icon/ERM.png">


    <!-- test de ERM inicio-->
    <div class="TestErm">
        <h3 class="titulo" style="color: white;">ERM<strong style="color: rgb(192, 108, 30);">COACH</strong>
        </h3>
        <h1 class="subtitulo" style="color: rgb(16, 73, 158);">
            </style><strong>TEST</strong></h1>

        <div class="Pruebas">

            <?php
            if (isset($_POST['add'])) {
                $Edad             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Edad"], ENT_QUOTES))); //Escanpando caracteres 
                $Peso             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Peso"], ENT_QUOTES))); //Escanpando caracteres 
                $Genero     = mysqli_real_escape_string($conexion, (strip_tags($_POST["Genero"], ENT_QUOTES))); //Escanpando caracteres 
                $Flexiones             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Flexiones"], ENT_QUOTES))); //Escanpando caracteres 
                $Abdominales             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Abdominales"], ENT_QUOTES))); //Escanpando caracteres 
                $insert = mysqli_query($conexion, "INSERT INTO testerm(Edad, Peso, Genero, Flexiones, Abdominales, Nombre, Fecha)
                        VALUES ('$Edad','$Peso', '$Genero','$Flexiones', '$Abdominales','$Nombre','$Fecha')") or die(mysqli_error());
                if ($insert) {
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
                }
            }
            ?>

<?php
            if (isset($_POST['add2'])) {
                $Distancia             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Distancia"], ENT_QUOTES))); //Escanpando caracteres 
                $Edad             = mysqli_real_escape_string($conexion, (strip_tags($_POST["Edad"], ENT_QUOTES))); //Escanpando caracteres 
                
                $Genero     = mysqli_real_escape_string($conexion, (strip_tags($_POST["Genero"], ENT_QUOTES))); //Escanpando caracteres 
                
                $insertD = mysqli_query($conexion, "INSERT INTO cooper(Distancia,Genero,Edad, Nombre, Fecha)
                        VALUES ('$Distancia','$Genero','$Edad','$Nombre','$Fecha')") or die(mysqli_error());
                if ($insertD) {
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
                }
            }
            ?>

            <div class="Flexiones">
                <form action="" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Edad</label>
                        <div class="col-sm-2">
                            <input type="text" name="Edad" placeholder="Edad" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Peso</label>
                        <div class="col-sm-2">
                            <input type="text" name="Peso" placeholder="Peso" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Genero</label>
                        <div class="col-sm-3">
                            <select name="Genero" class="form-control">
                                <?php
                                $sql = "SELECT id, nombre FROM genero ORDER BY id";
                                $result = $conexion->query($sql);
                                ?>
                                <option value="0">Seleccionar genero</option>
                                <?php while($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="test">
                        <h3 style="color: chocolate;">Cantidad Maxima en 1 minuto</h3>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Flexiones de Brazo</label>
                            <div class="col-sm-2">
                                <input type="text" name="Flexiones" placeholder="Cantidad" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Abdominales</label>
                            <div class="col-sm-2">
                                <input type="text" name="Abdominales" placeholder="Cantidad" required>
                            </div>
                        </div>
                        <input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
                    </div>
                </form>
            </div>
            <!-- test de ERM final-->






            <!-- tabla de test erm-->
            <div class="tablaFlex">
                <table class="table table-dark">
                    <thead>

                    <tr style="color: chocolate;"> 
                            <th scope="col">Nombre</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Flexiones</th>
                            <th scope="col">Abdominales</th>
                            <th scope="col">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = mysqli_query($conexion, "SELECT * FROM testerm");


                        while ($row = mysqli_fetch_assoc($sql)) {
                            echo '
                            <tr>
                                <td>' . $row['Nombre'] . '</td>
                                <td>' . $row['Edad'] . '</td>
                                <td>' . $row['Peso'] . '</td>
                                <td>' . $row['flexiones'] . '</td>
                                <td>' . $row['abdominales'] . '</td>
                                <td>' . $row['Fecha'] . '</td>
                            </tr>
                            ';
                        }

                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- Hero Section End -->

    <!-- test de cooper inicio -->
    
    <div class="cooper">
        <form action="testermCalculo.php" method="post">
            <h2 style="color: chocolate;">Test de Cooper</h2>
            <div class="infoTxt">
                <h3 style="color: rgb(192, 108, 30);">¿En que consiste el Test de Cooper?</strong></h3>
                <br>
                <p style="color: white;">
                    El test consiste en recorrer, en terreno llano y durante un tiempo de 12 minutos, la máxima
                    distancia posible sin detenerse. La idea es que el atleta rinda al máximo su condición
                    física
                    con el fin de conocer las verdaderas condiciones de la persona.
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" style="color: chocolate;">Distancia</label>
                <div class="col-sm-2">
                    <input type="text" name="Distancia" placeholder="Distancia Metros" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Genero</label>
                <div class="col-sm-3">
                    <select name="Genero" class="form-control">
                        <?php
                                $sql = "SELECT id, nombre FROM genero ORDER BY id";
                                $result = $conexion->query($sql);
                                ?>
                        <option value="0">Genero</option>
                        <?php while($row = $result->fetch_assoc()) { ?>
                        <option value="<?php echo $row['nombre']; ?>"><?php echo $row['nombre']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                        <label class="col-sm-3 control-label">Edad</label>
                        <div class="col-sm-2">
                            <input type="text" name="Edad" placeholder="Edad" required>
                        </div>
                    </div>
            <input type="submit" name="add2" class="btn btn-sm btn-primary" value="calcular">
        </form>
    </div>
    <!-- test de cooper final-->

    <div class="tablaCooper">
                <table class="table table-dark">
                    <thead>

                        <tr style="color: chocolate;"> 
                            <th scope="col">Nombre</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Distancia</th>
                            <th scope="col">Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = mysqli_query($conexion, "SELECT * FROM cooper");


                        while ($row = mysqli_fetch_assoc($sql)) {
                            echo '
                            <tr>
                                <td>' . $row['Nombre'] . '</td>
                                <td>' . $row['Fecha'] . '</td>
                                <td>' . $row['Distancia'] . '</td>
                                <td>' . $row['resultado'] . '</td>
                                <td>' . $row['Edad'] . '</td>
                            </tr>
                            ';
                        }

                        ?>
                    </tbody>
                </table>

            </div>

</body>

</html>