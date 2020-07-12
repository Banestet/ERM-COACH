<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente ERM</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ClientSign.css">


</head>



<body>
    <link rel="shortcut icon" type="image/x-icon" href="img/ERM.png">

    <div class="login-box2">

        <a href="./index.php">
            <img src="img/ERM.png" class="avatar" alt="Avatar Image">
        </a>
        <h1>Client data</h1>

        <form action="registrarUsuarios.php" method="POST">
            <!-- Nombre-->
            <label for="Names">Nombres</label>
            <input type="text" name="nombreU" placeholder="Enter Nombre" onkeypress="return sololetras(event)">
            <!--Apellidos  -->
            <label for="Surnames">Apellidos</label>
            <input type="text" name="apellidosU" placeholder="Enter Apellidos" onkeypress="return sololetras(event)">
            <!--Cumpleaños -->
            <label for="Birthday">Fecha de Nacimiento</label>
            <input type="date" name="fechaU">
            <!--Genero -->
            <div class="select">
                <select name="generoU" id="genero">
                    <option selected disabled>Genero</option>
                    <option value="1">Hombre</option>
                    <option value="2">Mujer</option>
                </select>
            </div>
            <!--Numero de Telefono  -->
            <label for="Phone number">Numero de Telefono</label>
            <input type="text" name="telefonoU" placeholder="Enter Numero" onkeypress="return solonumeros(event)">
            <!--Lugar de residencia  -->
            <label for="Place of residence">Lugar de Residencia</label>
            <input type="text" name="residenciaU" placeholder="Enter Lugar Residencia"
                onkeypress="return sololetras(event)">
            <div class="login-box3">
                <!-- USERNAME INPUT -->
                <label for="username">Usuario</label>
                <input type="text" id="usuario" name="usuarioU" placeholder="Enter Usuario">
                <!-- PASSWORD INPUT -->
                <label for="password">Contraseña</label>
                <input type="password" id="contraseña" name="contraseñaU" placeholder="Enter Contraseña">

                <label for="email">correo</label>
                <input type="text" id="correo" name="correoU" placeholder="Enter correo">
                <h1 class="titlea">Medidas antropometricas</h1>
                <label for="Peso">Peso (kg)</label>
                <input type="text" name="pesoU" placeholder="Enter Peso" onkeypress="return solonumeros(event)">
                <label for="Altura">Altura(Cm)</label>
                <input type="text" name="alturaU" placeholder="Enter Altura" onkeypress="return solonumeros(event)">


                <input type="submit" value="Registrar" name="registrarUsuarios">
            </div>



        </form>

    </div>
    <div class="footer">
        <small>Copyright &copy; ERM COACH 2020- Todos los derechos reservados</small>
    </div>
    <script src="Validaciones.js"></script>

</body>

</html>