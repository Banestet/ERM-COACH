<?php 
    error_reporting(0);
    session_start();
    include "conectar.php";
    include 'Configuracion/SED.php';
    $sql ="SELECT * FROM configuracion";
    $res=mysqli_query($conexion,$sql);


    if(!empty($_SESSION['activeU'])){
        header('location: HomeU.php');
    }else{

        if(!empty($_POST)){
            if(empty($_POST['usuarioU']) || empty($_POST['contraseñaU']))
            {
                echo "<script>
                    alert('Ingrese su Usuario o Contraseña');
                    window.location= 'LoginCliente.php'
                </script>";
            }else{
                $usuarioU = mysqli_real_escape_string($conexion,$_POST['usuarioU']);
                $contraseñaU = mysqli_real_escape_string($conexion,$_POST['contraseñaU']);
                $query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuarioU= '$usuarioU'");
                mysqli_close($conexion);
                
            
                $result = mysqli_num_rows($query);


                if($result > 0){
                    session_start(); 
                    $_SESSION["autentificadoU"]= "SI"; 
                    $_SESSION["ultimoAccesoU"]= date("Y-n-j H:i:s"); 
                    $data = mysqli_fetch_array($query);
                    $_SESSION['activeU'] = true;
                    $_SESSION['nombreU'] = $data['nombreU'];
                    $_SESSION['correoU']  = $data['correoU'];
                    $_SESSION['usuarioU']   = $data['usuarioU'];
                    $_SESSION['generoU']   = $data['generoU'];

               //Desencriptacion de la contraseña que llega de la base de datos
                $_SESSION['contraseñaU']  = SED:: decryption($data['contraseñaU']);

                //comparacion de contraseñas
                if (  $contraseñaU ==  $_SESSION['contraseñaU']) {
                echo "<script>
                    window.location= 'HomeU.php'
                </script>";
                }else{
                     session_destroy();
                echo "<script>
                    alert('contrasena incorrecta');
                    window.location= 'LoginCliente.php'
                </script>"; 
                }

             
            }else{
                session_destroy();
                echo "<script>
                    alert('El usuario no se encuentra');
 
                    window.location= 'LoginCliente.php'
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
    <title>Cliente ERM</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <!-- custom css-->
    <link rel="stylesheet" href="Login.css">

</head>

<body>
    <link rel="shortcut icon" type="image/x-icon" href="img/ERM.png">

    <div class="login-box">
        <a href="./index.php">
            <?php
                $data=mysqli_fetch_array($res);
                echo '<img src="'.$data['ruta']. '" alt="" class="avatar">';
            ?>
        </a>
        <h1 class="title">Inicia Sesion </h1>
        <form action="" method="POST">
            <!-- USERNAME INPUT -->
            <label for="username">Usuario</label>
            <input class="input" type="text" name="usuarioU" placeholder="Enter Usuario" id="usuarioU">
            <!-- PASSWORD INPUT -->
            <label for="password">Contraseña</label>
            <input class="input" type="password" name="contraseñaU" placeholder="Enter Contraseña" id="contraseñaU">
            <input type="submit" onclick=' return enviarDatos()' value="Inicia Sesion">

            <a href="SignClient.php" onclick="ocultar()">No tienes un Cuenta? </a>

        </form>

    </div>



    <div class="footer">
        <small>Copyright &copy; ERM COACH 2020- Todos los derechos reservados</small>
    </div>
    <script src="Validaciones.js"></script>
</body>

</html>