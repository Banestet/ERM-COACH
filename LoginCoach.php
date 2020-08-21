<?php
error_reporting(0);
session_start();
include './conectar.php';
include 'admin/SED.php';
$sql = "SELECT * FROM configuracion";
$res = mysqli_query($conexion, $sql);


if (!empty($_SESSION['active'])) {
    header('location: Home.php');
} else {

    if (!empty($_POST)) {
        if (empty($_POST['usuario']) || empty($_POST['contrasena'])) {
            echo "<script>
                    window.location= 'LoginCoach.php'
                </script>";
        } else {

            $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
            $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);

            $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE  usuario= '$usuario'");
            mysqli_close($conection);

            $result = mysqli_num_rows($consulta);


            if ($result > 0) {
                session_start();
                $_SESSION["autentificado"] = "SI";
                $_SESSION["ultimoAcceso"] = date("Y-n-j H:i:s");
                $data = mysqli_fetch_array($consulta);
                $_SESSION['active'] = true;
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['correo']  = $data['correo'];
                $_SESSION['usuario']   = $data['usuario'];
                $_SESSION['rol']   = $data['rol'];


                //Desencriptacion de la contraseña que llega de la base de datos
                $_SESSION['contrasena']  = SED::decryption($data['contrasena']);

                //comparacion de contraseñas
                
                if ($contrasena ==  $_SESSION['contrasena']) {

                    if ($_SESSION['rol'] == '3'){
                        $_SESSION['activeA'] = true;

                   echo "<script>
                    alert('addmin');
                    window.location= 'admin.php'
                   </script>";
                    }else if ($_SESSION['rol'] == '1') {
                     echo "<script>
                    alert('Entrenador');
                    window.location= 'Home.php'
                   </script>";
                    }
                  
               } else {
                 
                   echo "<script>
                       alert('contrasena incorrecta');
                       window.location= 'LoginCoach.php'
                   </script>";
               }
            } else {
                session_destroy();
                echo "<script>
                    alert('El usuario no se encuentra');
 
                    window.location= 'LoginCoach.php'
                </script>";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrenador ERM</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <!-- custom css-->
    <link rel="stylesheet" href="/css/Login.css">
    <!-- 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        -->
</head>

<body>
    <link rel="shortcut icon" type="image/x-icon" href="/img/icon/ERM.png">

    <div class="login-box">

        <a href="../index.php">
            <?php
            $data = mysqli_fetch_array($res);
            echo '<img src="' . $data['ruta'] . '" alt="" class="avatar">';
            ?>
        </a>
        <h1 class="title">Inicia Sesion </h1>
        <form action="" method="POST">
            <!-- USERNAME INPUT -->
            <label for="username">Usuario</label>
            <input class="input" type="text" name="usuario" placeholder="Enter Ususario" id="usuario">
            <!-- PASSWORD INPUT -->
            <label for="password">Contraseña</label>
            <input class="input" type="password" name="contrasena" placeholder="Enter Contraseña" id="contrasena">
            <input type="submit" onclick=' return enviarDatos()' value="Inicia Sesion">



            <!-- apartado del sign up-->

        </form>

    </div>

    <div class="footer">
        <small>Copyright &copy; ERM COACH 2020- Todos los derechos reservados</small>
    </div>
    <script src="Validaciones.js"></script>
</body>

</html>