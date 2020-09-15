<?php
error_reporting(0);
session_start();
include "admin/Configuracion/SessionTimeA.php";
include "includes/navAdmin.php";
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

<script>
    function enviar(seleccion)
    {
        if(seleccion>0)
        {
            document.forms[0].submit();
        }
    }
    </script>
</head>

<body>
    <link rel="shortcut icon" type="image/x-icon" href="/img/icon/ERM.png">



    <div class="reportes">
        <div class="wrap">
            <h3><strong>REPORTES</strong></h3>
            <ul class="tabs">
                <li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Chat</span></a></li>
                <li><a href="#tab2"><span class="fa fa-group"></span><span class="tab-text">Clientes</span></a>
                </li>
                <li><a href="#tab3"><span class="fa fa-briefcase"></span><span class="tab-text">Entrenadores</span></a>
                </li>
                <li><a href="#tab4"><span class="fa fa-bookmark"></span><span class="tab-text">Retos</span></a></li>
       
            </ul>

            <div class="secciones">
                <article id="tab1">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Mensaje</th>
                                <th scope="col">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = mysqli_query($conexion, "SELECT * FROM chat ORDER BY fecha DESC
							 
							");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '
                            <tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['usuario'] . '</td>
                                <td>' . $row['mensaje'] . '</td>
                                <td>' . $row['fecha'] . '</td>
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
                            <a href="Reportes/chatAdmin.php" class="btn btn-sm btn-primary">Generar PDF</a>
                        </div>
                    </div>
                </article>




                <article id="tab2">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" style="color: white;">Clientes</label>
                        <div class="col-sm-3">
                        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                        Descuento(%):
                        <select id="txt" name="descuento" onchange="enviar(this.value)">
                        <?php
                                $sql = "SELECT * FROM usuarios";
                                $result = $conexion->query($sql);
                                ?>
                                <option value="0">Seleccionar entrenador</option>
                                <?php while($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['codigo'];?>"><?php echo $row['nombres']; ?></option>
                                <?php } ?>
                        </select>
                        </form>
                        </div>
                    </div>
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">direccion</th>
                                <th scope="col">telefono</th>
                                <th scope="col">usuario</th>
                                <th scope="col">correo</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                 
                            $codigo = $_POST["descuento"];
                            $sql = mysqli_query($conexion, "SELECT * FROM Clientes ");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '
                            <tr>
                                <td>' . $row['codigo'] . '</td>
                                <td>' . $row['nombres'] . '</td>
                                <td>' . $row['direccion'] . '</td>
                                <td>' . $row['telefono'] . '</td>
                                <td>' . $row['usuario'] . '</td>
                                <td>' . $row['puesto'] . '</td>
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
                            <a href="" class="btn btn-sm btn-primary">Generar clientes</a>
                        </div>
                    </div>
                </article>


                <article id="tab3">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">direccion</th>
                                <th scope="col">telefono</th>
                                <th scope="col">usuario</th>
                                <th scope="col">Puesto</th>
                                <th scope="col">correo</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $codigo = $_SESSION['codigo'];
                            $sql = mysqli_query($conexion, "SELECT * FROM usuarios");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '
                            <tr>
                                <td>' . $row['codigo'] . '</td>
                                <td>' . $row['nombres'] . '</td>
                                <td>' . $row['direccion'] . '</td>
                                <td>' . $row['telefono'] . '</td>
                                <td>' . $row['usuario'] . '</td>
                                <td>' . $row['puesto'] . '</td>
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
                            <a href="Reportes/clientes.php" class="btn btn-sm btn-primary">Generar PDF</a>
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
               
            </div>
        </div>
    </div>







</body>

</html>