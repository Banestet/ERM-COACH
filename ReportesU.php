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
    <title>Reportes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style2.css" type="text/css">
</head>

<body>
    <link rel="shortcut icon" type="image/x-icon" href="/img/icon/ERM.png">

    <?php
  if (isset($_POST['add'])) {
    if (isset($_POST['rol'])) {
      # code...
    }

    switch (isset($_POST['rol'])) {
      case 6:
        echo "<script>
                    window.location= '/Reportes/index.php'
        </script>";
        break;
      case 2:
        echo "<script>
                    window.location= '/Reportes/ejericios.php'
        </script>";
        break;
      case 7:
        echo "<script>
                    window.location= 'HomeU.php'
        </script>";
        break;
      case 8:
        echo "<script>
                    window.location= 'HomeU.php'
        </script>";
        break;
    }
  }
  ?>
    <form class="form-horizontal" action="" method="post" >
        <label class="col-sm-3 control-label">rol</label>
        <div class="col-sm-3">
            <select name="rol" class="form-control">
                <option value=""> Reportes </option>
                <option value="1">Batidos-Cliente</option>
                <option value="2">Ejercicios-Cliente</option>
                <option value="3">BMI-Cliente</option>
                <option value="4">Inscripcion-Cliente</option>
            </select>
        </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">&nbsp;</label>
            <div class="col-sm-6">
                <input type="submit" name="add" class="btn btn-sm btn-primary" value="Generar Reporte">

            </div>
        </div>

    </form>










</body>

</html>