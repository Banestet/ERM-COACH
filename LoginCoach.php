<?php 
    session_start();
    include "conectar.php";
    
if(!empty($_SESSION['active'])){
	header('location: Home.php');
}else{

	if(!empty($_POST))
	{
		if(empty($_POST['usuario']) || empty($_POST['contrasena']))
		{
			echo "<script>
                    alert('Usuario o Clave incorrecta');
                    window.location= 'LoginCoach.php'
                </script>";
		}else{

			

			$usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
			$contrasena = md5(mysqli_real_escape_string($conexion,$_POST['contrasena']));

			$query = mysqli_query($conexion,"SELECT * FROM coach WHERE usuario= '$usuario' AND contrasena ='$contrasena'");
            mysqli_close($conexion);
            
        
            $result = mysqli_num_rows($query);
            print_r($result);


			if($result > 0){
				$data = mysqli_fetch_array($query);
				$_SESSION['active'] = true;
				$_SESSION['nombre'] = $data['nombre'];
				$_SESSION['correo']  = $data['correo'];
                $_SESSION['usuario']   = $data['usuario'];

            


				echo "<script>
                    alert('Inicio de session correctamente');
                    window.location= 'Home.php'
                </script>";
			}else{
				
                session_destroy();
                echo "<script>
                    alert('Inicio de session Fallido');
                    alert = ('El usuario o la clave son incorrectos');
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
    <link rel="stylesheet" href="Login.css">
    <!-- 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        -->
</head>

<body>
    <link rel="shortcut icon" type="image/x-icon" href="img/ERM.png">

    <div class="login-box">

        <a href="./index.php">
            <img src="img/ERM.png" class="avatar" alt="Avatar Image">
        </a>
        <h1 class="title">Inicia Sesion </h1>
        <form action="" method="POST">
            <!-- USERNAME INPUT -->
            <label for="username">Usuario</label>
            <input class="input" type="text" name="usuario" placeholder="Enter Username" id="usuario">
            <!-- PASSWORD INPUT -->
            <label for="password">Contraseña</label>
            <input class="input" type="password" name="contrasena" placeholder="Enter Password" id="contrasena">
            <input type="submit" onclick=' return enviarDatos()' value="Inicia Sesion">
            <a href="#">Olvidaste tu contraseña?</a><br>

            <a href="SignCoach.php" onclick="ocultar()">No tienes un Cuenta? </a>

            <!-- apartado del sign up-->

        </form>

    </div>



    <div class="footer">
        <small>Copyright &copy; ERM COACH 2020- Todos los derechos reservados</small>
    </div>
    <script src="Validaciones.js"></script>
</body>

</html>