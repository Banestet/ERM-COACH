<?php
error_reporting(0);
include "admin/Configuracion/SessionTimeU.php";
include "includes/navCliente.php";
include "includes/fuctions.php";
session_start();
$codigo = $_SESSION['codigo'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Reportes</title>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="Reportes/font-awesome.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style2.css" type="text/css">
    <link rel="stylesheet" href="css/reportesU.css">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="main.js"></script>
</head>

<body>
    <link rel="shortcut icon" type="image/x-icon" href="/img/icon/ERM.png">
    <div class="reportes">
        <div class="wrap">
            <h3><strong>REPORTES</strong></h3>
            <ul class="tabs">
                <li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Batidos</span></a></li>
                <li><a href="#tab2"><span class="fa fa-group"></span><span class="tab-text">Medidas A.</span></a>
                </li>
                <li><a href="#tab3"><span class="fa fa-briefcase"></span><span class="tab-text">Ejercicios</span></a>
                </li>
                <li><a href="#tab4"><span class="fa fa-bookmark"></span><span class="tab-text">Retos</span></a></li>
                <li><a href="#tab5"><span class="fa fa-bookmark"></span><span class="tab-text">BMI</span></a></li>
            </ul>

            <div class="secciones">
                <article id="tab1">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Orden</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($conexion, "SELECT * FROM banner
							WHERE id_cliente='$codigo' ORDER BY id ASC 
							");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '
                            <tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['titulo'] . '</td>
                                <td>' . $row['descripcion'] . '</td>
                                <td>' . $row['orden'] . '</td>
                            </tr>
                            ';
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <a href="HomeU.php" class="btn btn-sm btn-danger">Cancelar</a>
                            <a href="Reportes/index.php" class="btn btn-sm btn-primary">Generar PDF</a>
                        </div>
                    </div>
                </article>
                <article id="tab2">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Peso</th>
                                <th scope="col">Altura</th>
                                <th scope="col">Bicep D</th>
                                <th scope="col">Bicep I</th>
                                <th scope="col">Hombros </th>
                                <th scope="col">Pecho </th>
                                <th scope="col">AntebrazoD </th>
                                <th scope="col">AntebrazoI </th>
                                <th scope="col">Muñeca</th>
                                <th scope="col">Abdomen</th>
                                <th scope="col">Cintura</th>
                                <th scope="col">Cadera</th>
                                <th scope="col">Muslo</th>
                                <th scope="col">Rodilla</th>
                                <th scope="col">Gemelos</th>
                                <th scope="col">Tobillos</th>
                                <th scope="col">Pierna</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($conexion, "SELECT * FROM medidas
							WHERE id_cliente='$codigo' ORDER BY id ASC 
							");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '
								<tr>
                                <td>' . $row['fecha'] . '</td>
                                <td>' . $row['peso'] . '</td>
                                <td>' . $row['altura'] . '</td>
                                <td>' . $row['BicepD'] . '</td>
                                <td>' . $row['BicepI'] . '</td>
                                <td>' . $row['Hombros'] . '</td>
                                <td>' . $row['Pecho'] . '</td>
                                <td>' . $row['AntebrazoD'] . '</td>
                                <td>' . $row['AntebrazoI'] . '</td>
                                <td>' . $row['Muñeca'] . '</td>
                                <td>' . $row['Abdomen'] . '</td>
                                <td>' . $row['Cintura'] . '</td>
                                <td>' . $row['Cadera'] . '</td>
                                <td>' . $row['Muslo'] . '</td>
                                <td>' . $row['Rodilla'] . '</td>
								<td>' . $row['Gemelos'] . '</td>
								<td>' . $row['Tobillo'] . '</td>
								<td>' . $row['Pierna'] . '</td>
                            </tr>
                            ';
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <a href="HomeU.php" class="btn btn-sm btn-danger">Cancelar</a>
                            <a href="Reportes/Medidas.php" class="btn btn-sm btn-primary">Generar PDF</a>
                        </div>
                    </div>
                </article>


                <article id="tab3">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Orden</th>
                                <th scope="col">id Cliente</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $codigo = $_SESSION['codigo'];
                            $sql = mysqli_query($conexion, "SELECT * FROM workout
							WHERE id_cliente='$codigo'");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '
                            <tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['titulo'] . '</td>
                                <td>' . $row['descripcion'] . '</td>
                                <td>' . $row['estado'] . '</td>
                                <td>' . $row['orden'] . '</td>
                                <td>' . $row['id_cliente'] . '</td>
                            </tr>
                            ';
                            }

                            ?>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <a href="HomeU.php" class="btn btn-sm btn-danger">Cancelar</a>
                            <a href="Reportes/ejercicios.php" class="btn btn-sm btn-primary">Generar PDF</a>
                        </div>
                    </div>
                </article>




                <article id="tab4">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Fecha</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($conexion, "SELECT * FROM image
							ORDER BY created_at DESC  
							");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '
                            <tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['title'] . '</td>
                                <td>' . $row['created_at'] . '</td>
                            </tr>
                            ';
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <a href="HomeU.php" class="btn btn-sm btn-danger">Cancelar</a>
                            <a href="Reportes/Retos.php" class="btn btn-sm btn-primary">Generar PDF</a>
                        </div>
                    </div>


                </article>
                <article id="tab5">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Peso</th>
                                <th scope="col">Altura</th>
                                <th scope="col">Resultado</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Sistema</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($conexion, "SELECT * FROM bmi WHERE codigo='$codigo'");


                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '
                            <tr>
                                <td>' . $row['nombre'] . '</td>
                                <td>' . $row['fecha'] . '</td>
                                <td>' . $row['peso'] . '</td>
                                <td>' . $row['altura'] . '</td>
                                <td>' . $row['resultado'] . '</td>
                                <td>' . $row['estado'] . '</td>
                                <td>' . $row['sistema'] . '</td>
                            </tr>
                            ';
                            }

                            ?>

                        </tbody>
                    </table>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <a href="HomeU.php" class="btn btn-sm btn-danger">Cancelar</a>
                            <a href="Reportes/BMI.php" class="btn btn-sm btn-primary">Generar PDF</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>

</body>


</html>