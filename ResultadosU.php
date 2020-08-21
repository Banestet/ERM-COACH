<?php
error_reporting(0);
include "conectar.php";
include "admin/Configuracion/SessionTimeU.php";
session_start();
include "includes/navCliente.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultados</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/style2.css" type="text/css">
  <link rel="stylesheet" href="css/resultados.css">
</head>

<body>
  <link rel="shortcut icon" type="image/x-icon" href="/img/icon/ERM.png">

  
  <div id="resultado">
    <h1 style="color: white;">Medidas Antropometricas</h1>
    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Fecha</th>
          <th scope="col">Peso</th>
          <th scope="col">Bicep D</th>
          <th scope="col">Bicep I</th>
          <th scope="col">Pecho </th>
          <th scope="col">Cadera</th>
          <th scope="col">Abdomen</th>
          <th scope="col">Muslos</th>
          <th scope="col">Gemelos</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = mysqli_query($conexion, "SELECT * FROM medidas");


        while ($row = mysqli_fetch_assoc($sql)) {
          echo '
                            <tr>
                                <td>' . $row['nombre'] . '</td>
                                <td>' . $row['fecha'] . '</td>
                                <td>' . $row['peso'] . '</td>
                                <td>' . $row['BicepD'] . '</td>
                                <td>' . $row['BicepI'] . '</td>
                                <td>' . $row['Pecho'] . '</td>
                                <td>' . $row['Cadera'] . '</td>
                                <td>' . $row['Abdomen'] . '</td>
                                <td>' . $row['Muslo'] . '</td>
                                <td>' . $row['Gemelos'] . '</td>
                            </tr>
                            ';
        }

        ?>
      </tbody>
    </table>
    <!-- fin tabla de medidas-->
    <h1 style="color: chocolate;">Medidas BMI</h1>

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
        $sql = mysqli_query($conexion, "SELECT * FROM bmi");


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
  <!-- fin tabla de BMI-->

  <h1 style="color: red;">Mis Retos</h1>

    <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Reto</th>
      <th scope="col">Fecha</th>
     

    </tr>
  </thead>
  <tbody>
  <?php
        $sql = mysqli_query($conexion, "SELECT * FROM image");


        while ($row = mysqli_fetch_assoc($sql)) {
          echo '
                            <tr>
                                <td>' . $row['title'] . '</td>
                                <td>' . $row['created_at'] . '</td>
                            </tr>
                            ';
        }

        ?>
    
  </tbody>
</table>


<h1 style="color: blue;">Test ERM coach</h1>

    <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Fecha</th>
      <th scope="col">Edad</th>
      <th scope="col">Genero</th>
      <th scope="col">Flexiones</th>
      <th scope="col">Abdominales</th>
     

    </tr>
  </thead>
  <tbody>
  <?php
        $sql = mysqli_query($conexion, "SELECT * FROM testerm");

        while ($row = mysqli_fetch_assoc($sql)) {
          echo '
                            <tr>
                                <td>' . $row['Nombre'] . '</td>
                                <td>' . $row['Fecha'] . '</td>
                                <td>' . $row['Edad'] . '</td>
                                <td>' . $row['Peso'] . '</td>
                                <td>' . $row['Genero'] . '</td>
                                <td>' . $row['flexiones'] . '</td>
                                <td>' . $row['abdominales'] . '</td>
                            </tr>
                            ';
        }

        ?>
    
  </tbody>
</table>

  </div>



</body>

</html>