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

    <a href="./index.php">
        <img src="img/ERM.png" class="avatar" alt="Avatar Image">
    </a>
    <div class="login-box">


        <!-- apartado del sign up-->
        <div class="login-box4" id="ocultar">

            <h1 class="title">Registrate</h1>


            <form action="registrar.php" method="POST">
                <!-- Nombre-->
                <label for="name">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Enter Nombre"
                    onkeypress="return sololetras(event)">
                <!--Apellidos  -->
                <label for="apellido">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" placeholder="Enter Apellidos"
                    onkeypress="return sololetras(event)">

                <!--Numero de Telefono  -->
                <label for="Phone number">Numero de Telefono</label>
                <input type="text" id="telefono" name="telefono" placeholder="Enter Numero"
                    onkeypress="return solonumeros(event)">
                <!-- USERNAME INPUT -->
                <label for="username">Usuario</label>
                <input type="text" id="usuario" name="usuario" placeholder="Enter Usuario">
                <!-- PASSWORD INPUT -->
                <label for="password">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" placeholder="Enter Contraseña">

                <label for="email">correo</label>
                <input type="text" id="correo" name="correo" placeholder="Enter correo">
                <input type="submit" value="Registrar" name="registrar">


            </form>
        </div>

    </div>



    <div class="footer">
        <small>Copyright &copy; ERM COACH 2020- Todos los derechos reservados</small>
    </div>
    <script src="Validaciones.js"></script>
</body>

</html>