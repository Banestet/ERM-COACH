<?php
    include "conectar.php";
    session_start();
    $sql = "SELECT * FROM configuracion";
$res = mysqli_query($conexion, $sql);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion Interna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="/admin/Configuracion/configuracion.css" type="text/css">
    
</head>

<body>
    <link rel="shortcut icon" type="image/x-icon" href="/img/icon/ERM.png">

        <h1>
            <center>Configuracion</center>
        </h1>
        <div class="Configuracion">
            <h1>
                <center>Logo Y Nombre Empresa</center>
            </h1>
            <form action="/validarFoto.php" method="POST" enctype="multipart/form-data">
                <center>
                    <table class="table table-dark" border="1">
                        <tr>
                            <td><strong>Foto:</strong></td>
                            <td><input type="file" name="imagen" id="imagenFondo"></td>
                        </tr>
                        <tr>
                            <td><strong>Nombre Empresa:</strong></td>
                            <td><input type="text" name="Empresa" placeholder="Nombre Empresa"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"> <input type="submit" name="subir" value="Subir"></td>
                        </tr>
                    </table>
                </center>
            </form>
            <a href="../index.php">
            <?php
            $data = mysqli_fetch_array($res);
            echo '<img src="' . $data['ruta'] . '" alt="" class="avatare">';
            ?>
        </a>
        </div>
        <div class="Configuracion2">
            <h1>
                <center> Login y Sing Up</center>
            </h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <center>
                    <table class="table table-dark" border="1">
                        <tr>
                            <td><strong>Foto Fondo:</strong></td>
                            <td><input type="file" name="imagenFondo" id="imagenFondo"></td>
                        </tr>

                        <tr>
                            <td colspan="2" align="center"> <input type="submit" name="subir" value="Subir"></td>
                        </tr>
                    </table>
                </center>
            </form>
        </div>

        <div class="Configuracion3">
            <h1>
                <center>Registro Administrador</center>
            </h1>
                <center>

                    <table class="table table-dark" border="1">
                        <tr>
                            <td><strong>Registrar administrador:</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"> <a href="/SignCoach.php" class="btn btn-sm btn-success">Registrar</a></td>
                        </tr>
                    </table>
                </center>
                <a href="/admin.php" class="btn btn-sm btn-primary">volver</a>

        </div>
</body>

</html>