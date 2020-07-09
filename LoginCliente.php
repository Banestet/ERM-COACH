<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrenador ERM</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <!-- custom css-->
    <link rel="stylesheet" href="Login.css">

</head>

<body>
    <link rel="shortcut icon" type="image/x-icon" href="img/ERM.png">

    <div class="login-box">
        <a href="./index.php">
            <img src="img/ERM.png" class="avatar" alt="Avatar Image">
        </a>
        <h1 class="title">Inicia Sesion </h1>
        <form action="Validad.php" method="POST">
            <!-- USERNAME INPUT -->
            <label for="username">Usuario</label>
            <input class="input" type="text" name="usuario" placeholder="Enter Username" id="usuario">
            <!-- PASSWORD INPUT -->
            <label for="password">Contraseña</label>
            <input class="input" type="password" name="contraseña" placeholder="Enter Password" id="contraseña">
            <input type="submit" onclick=' return enviarDatos()' value="Inicia Sesion">
            <a href="#">Olvidaste tu contraseña?</a><br>

            <a href="SignClient.php" onclick="ocultar()">No tienes un Cuenta? </a>

        </form>

    </div>



    <div class="footer">
        <small>Copyright &copy; ERM COACH 2020- Todos los derechos reservados</small>
    </div>
    <script src="Validaciones.js"></script>
</body>

</html>