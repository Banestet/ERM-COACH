<?php 
	
$alert = '';
session_start();
if(!empty($_SESSION['active'])){
	header('location: sistema/');
}else{

	if(!empty($_POST))
	{
		if(empty($_POST['usuario']) || empty($_POST['contraseña']))
		{
			$alert = 'Ingrese su usuario y su calve';
		}else{

			require_once "conectar.php";
			require_once "registrar.php";

			$usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
			$contraseña = md5(mysqli_real_escape_string($conexion,$_POST['contraseña']));

			$query = mysqli_query($conexion,"SELECT * FROM coach WHERE usuario= '$usuario' AND contraseña = '$contraseña'");
            mysqli_close($conexion);
        
			$result = mysqli_num_rows($query);


			if($result > 0){
				$data = mysqli_fetch_array($query);
				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['idusuario'];
				$_SESSION['nombre'] = $data['nombre'];
				$_SESSION['correo']  = $data['correo'];
				$_SESSION['usuario']   = $data['usuario'];
				//$_SESSION['rol']    = $data['rol'];

				echo "<script>
                    alert('Inicio de session correctamente');
                    window.location= 'Home.php'
                </script>";
			}else{
				$alert = 'El usuario o la clave son incorrectos';
                session_destroy();
                echo "<script>
                    alert('Inicio de session Fallido');
                     window.location= 'LoginCoach.php'
                </script>";
			}


		}

	}
}
?>
