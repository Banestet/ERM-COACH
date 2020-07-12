<?php 
    session_start();
    include "conectar.php";
    
if(!empty($_SESSION['activeU'])){
	header('location: HomeU.php');
}else{

	if(!empty($_POST))
	{
		if(empty($_POST['usuarioU']) || empty($_POST['contraseñaU']))
		{
			echo "<script>
                    alert('Usuario o Clave incorrecta');
                    window.location= 'LoginCliente.php'
                </script>";
		}else{

			

			$usuarioU = mysqli_real_escape_string($conexion,$_POST['usuarioU']);
			$contraseñaU = md5(mysqli_real_escape_string($conexion,$_POST['contraseñaU']));

			$query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuarioU= '$usuarioU' ");
            mysqli_close($conexion);
            
        
            $result = mysqli_num_rows($query);
            print_r($result);


			if($result > 0){
				$data = mysqli_fetch_array($query);
				$_SESSION['activeU'] = true;
				$_SESSION['nombreU'] = $data['nombreU'];
				$_SESSION['correoU']  = $data['correoU'];
                $_SESSION['usuarioU']   = $data['usuarioU'];
                $_SESSION['generoU']   = $data['generoU'];

				echo "<script>
                    alert('Inicio de session correctamente');
                    window.location= 'HomeU.php'
                </script>";
			}else{
				
                session_destroy();
                echo "<script>
                    alert('Inicio de session Fallido');
                    alert = ('El usuario o la clave son incorrectos CLIENTE');
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
            <img src="img/ERM.png" class="avatar" alt="Avatar Image">
        </a>
        <h1 class="title">Inicia Sesion </h1>
        <form action="" method="POST">
            <!-- USERNAME INPUT -->
            <label for="username">Usuario</label>
            <input class="input" type="text" name="usuarioU" placeholder="Enter Username" id="usuarioU">
            <!-- PASSWORD INPUT -->
            <label for="password">Contraseña</label>
            <input class="input" type="password" name="contraseñaU" placeholder="Enter Password" id="contraseñaU">
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