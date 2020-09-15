<?php
error_reporting(0);
session_start();
include "admin/Configuracion/SessionTime.php";
include "includes/navCoach.php";
include "includes/fuctions.php";
$codigo = $_SESSION['codigo'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Clientes</span></a></li>
                <li><a href="#tab2"><span class="fa fa-group"></span><span class="tab-text">Batidos A.</span></a>
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
                                <th scope="col">Coidgo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($conexion, "SELECT * FROM clientes
							WHERE id_codigo='$codigo' ORDER BY codigo ASC 
							");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '
                            <tr>
                                <td>' . $row['codigo'] . '</td>
                                <td>' . $row['nombres'] . '</td>
                                <td>' . $row['direccion'] . '</td>
                                <td>' . $row['telefono'] . '</td>
                                <td>' . $row['correo'] . '</td>
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
                            <a href="Reportes/ClientesCoach.php" class="btn btn-sm btn-primary">Generar PDF</a>
                        </div>
                    </div>
                </article>




                <article id="tab2">

                    <div class="form-group">
                        <label class="col-sm-3 control-label" style="color: white;">Clientes</label>
                        <div class="col-sm-3">
                            <select name="id_codigo" class="form-control">
                                <?php
                                $sql = "SELECT codigo, nombres FROM clientes WHERE id_codigo='$codigo'  ORDER BY codigo";
                                $result = $conexion->query($sql);
                                ?>
                                <option value="0">Seleccionar Cliente</option>
                                <?php while($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['codigo'];?>"><?php echo $row['nombres']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    

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
                            $sql = mysqli_query($conexion, "SELECT * FROM banner");
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