<?php
error_reporting(0);
include "admin/Configuracion/SessionTimeA.php";
include "includes/navAdmin.php";
include "conectar.php";
session_start();
$sql = "SELECT * FROM configuracion";
$res = mysqli_query($conexion, $sql);
$res3 = mysqli_query($conexion, $sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas Basicas</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/resultados.css">

</head>

<body>
    <link rel="shortcut icon" type="image/x-icon" href="/img/icon/ERM.png">
<!-- TABLA BASICA GENERO -->
    <div id="basicas">
        <h2>Tabla Genero</h2>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $sql = mysqli_query($conexion, "SELECT * FROM genero");
        while ($row = mysqli_fetch_assoc($sql)) {
          echo '
                            <tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['nombre'] . '</td>
                               
                            </tr>
                            ';
        }
        ?>
            </tbody>
        </table>
        <form action="admin/Configuracion/tablaGeneroadd.php" method="POST">
            <div class="form-group">
                <label class="col-sm-3 control-label">Nombre Genero</label>
                <input type="text" class="form-control" id="nuevo" name="nuevo" placeholder="Nuevo Genero">
            </div>
            <input type="submit" class="btn btn-primary" value="Crear Genero" name="Crear Genero" />
        </form>
        <form action="admin/Configuracion/eliminarTabla.php" method="POST">
        <div class="form-group">
        <label class="col-sm-3 control-label">Nombre Genero</label>
            <input type="text"  class="form-control"id="viejo" name="viejo" placeholder="Genero a eliminar">
        </div>
            <input type="submit" class="btn btn-danger" value="Eliminar Genero" />
        </form>
        <!-- TABLA BASICA GENERO FIN -->


        <!-- TABLA BASICA ESTADO CLIENTE -->
        <h2>Tabla Estado Clientes </h2>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $sql = mysqli_query($conexion, "SELECT * FROM estado_cliente");
        while ($row = mysqli_fetch_assoc($sql)) {
          echo '
                            <tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['nombre'] . '</td>
                               
                            </tr>
                            ';
        }
        ?>
            </tbody>
        </table>
        <form action="admin/Configuracion/tablaEstadoCliente.php" method="POST">
            <div class="form-group">
                <label class="col-sm-3 control-label">Nombre Estado</label>
                <input type="text" class="form-control" id="nuevo" name="nuevo" placeholder="Nuevo Estado">
            </div>
            <input type="submit" class="btn btn-primary" value="Crear Estado" name="Crear Estado" />
        </form>
        <form action="admin/Configuracion/eliminarEstadoCliente.php" method="POST">
        <div class="form-group">
        <label class="col-sm-3 control-label">Nombre Estado</label>
            <input type="text"  class="form-control"id="viejo" name="viejo" placeholder="Estado a eliminar">
        </div>
            <input type="submit" class="btn btn-danger" value="Eliminar Estado" />
        </form>






        <!-- TABLA BASICA ESTADO CLIENTE -->
        <h2>Tabla Estado  Empleados</h2>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $sql = mysqli_query($conexion, "SELECT * FROM estado_empleado");
        while ($row = mysqli_fetch_assoc($sql)) {
          echo '
                            <tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['nombre'] . '</td>
                               
                            </tr>
                            ';
        }
        ?>
            </tbody>
        </table>
        <form action="admin/Configuracion/tablaEstadoEmpleado.php" method="POST">
            <div class="form-group">
                <label class="col-sm-3 control-label">Nombre Estado</label>
                <input type="text" class="form-control" id="nuevo" name="nuevo" placeholder="Nuevo Estado">
            </div>
            <input type="submit" class="btn btn-primary" value="Crear Estado" name="Crear Estado" />
        </form>
        <form action="admin/Configuracion/eliminarEstadoEmpleado.php" method="POST">
        <div class="form-group">
        <label class="col-sm-3 control-label">Nombre Estado</label>
            <input type="text"  class="form-control"id="viejo" name="viejo" placeholder="Estado a eliminar">
        </div>
            <input type="submit" class="btn btn-danger" value="Eliminar Estado" />
        </form>
    </div>

</body>

</html>