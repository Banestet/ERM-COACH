<?php
    include "conectar.php";
    session_start();
    $sql ="SELECT * FROM Configuracion";
    $res=mysqli_query($conexion,$sql);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion Interna</title>
    <link rel="stylesheet" href="/Configuracion/configuracion.css" type="text/css">
</head>

<body>
    <h1>
        <center>Configuracion</center>
    </h1>
    <div class="Configuracion">
    <h1>
        <center>Logo Y Nombre Empresa</center>
    </h1>
        <form action="validarFoto.php" method="POST" enctype="multipart/form-data">
            <center>
                <table border="1">
                    <tr>
                        <td><strong>Foto:</strong></td>
                        <td><input type="file" name="imagen" id="imagenFondo"></td>
                    </tr>
                    <tr>
                        <td><strong>Nombre Empresa:</strong></td>
                        <td><input  type="text" name="Empresa" placeholder="Nombre Empresa"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"> <input type="submit" name="subir" value="Subir"></td>
                    </tr>
                </table>
            </center>
        </form>
        <?php
                    $data=mysqli_fetch_array($res);
                    
                    echo '<img src="'.$data['ruta']. '" alt="" class="portafolio-img">';
                    ?>
    </div>
    <div class="Configuracion2">
    <h1>
        <center> Login y Sing Up</center>
    </h1>
        <form action="validarFoto.php" method="POST" enctype="multipart/form-data">
            <center>
                <table border="1">
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
        <center>Configuracion </center>
    </h1>
        <form action="validarFoto.php" method="POST" enctype="multipart/form-data">
            <center>
                <table border="1">
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

</body>

</html>