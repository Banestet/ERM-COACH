<?php
include './conectar.php';
include 'admin/Configuracion/SED.php';
session_start();
//recibir los datos y almacenarlos en variables del sing coach
$codigo		    = mysqli_real_escape_string($conexion,(strip_tags($_POST["codigo"],ENT_QUOTES)));//Escanpando caracteres 
$nombres		     = mysqli_real_escape_string($conexion,(strip_tags($_POST["nombres"],ENT_QUOTES)));//Escanpando caracteres 
$lugar_nacimiento	 = mysqli_real_escape_string($conexion,(strip_tags($_POST["lugar_nacimiento"],ENT_QUOTES)));//Escanpando caracteres 
$fecha_nacimiento	 = mysqli_real_escape_string($conexion,(strip_tags($_POST["fecha_nacimiento"],ENT_QUOTES)));//Escanpando caracteres 
$direccion	     = mysqli_real_escape_string($conexion,(strip_tags($_POST["direccion"],ENT_QUOTES)));//Escanpando caracteres 
$telefono		 = mysqli_real_escape_string($conexion,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 
$puesto		 = mysqli_real_escape_string($conexion,(strip_tags($_POST["puesto"],ENT_QUOTES)));//Escanpando caracteres 
$estado			 = mysqli_real_escape_string($conexion,(strip_tags($_POST["estado"],ENT_QUOTES)));//Escanpando caracteres 
$usuario			 = mysqli_real_escape_string($conexion,(strip_tags($_POST["usuario"],ENT_QUOTES)));//Escanpando caracteres 
$contra			 = mysqli_real_escape_string($conexion,(strip_tags($_POST["contrasena"],ENT_QUOTES)));//Escanpando caracteres 
$contrasena = SED:: encryption($contra);
$correo			 = mysqli_real_escape_string($conexion,(strip_tags($_POST["correo"],ENT_QUOTES)));//Escanpando caracteres 
$rol			 = mysqli_real_escape_string($conexion,(strip_tags($_POST["rol"],ENT_QUOTES)));//Escanpando caracteres 
$id_codigo			 = mysqli_real_escape_string($conexion,(strip_tags($_POST["id_codigo"],ENT_QUOTES)));//Escanpando caracteres 
 
$cek = mysqli_query($conexion, "SELECT * FROM clientes WHERE codigo='$codigo'");	if(mysqli_num_rows($cek) == 0){
	$insert = mysqli_query($conexion, "INSERT INTO clientes(codigo, nombres, lugar_nacimiento, fecha_nacimiento, direccion, telefono, puesto, estado, usuario, contrasena, correo,rol)VALUES ('$codigo','$nombres', '$lugar_nacimiento','$fecha_nacimiento', '$direccion','$telefono','$puesto', '$estado','$usuario', '$contrasena', '$correo','$rol')") or die(mysqli_error());
	if($insert){
		echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
	}else{
		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
	}
}else{
		echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. código exite!</div>';
}
			



//consulta de usuarios
$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);


$consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE  usuario= '$usuario'");
mysqli_close($conection);
$result = mysqli_num_rows($consulta);

if ($result > 0) {
    echo "<script>
                alert('Usuario repetido');
                window.location= 'SignCoach.php'
    </script>";
} else {
    //consulta para insertar los datos en la tabla coach
    $insertar = "INSERT INTO admin(nombre,apellidos,telefono,correo,usuario,contrasena) VALUES ('$nombre','$apellidos','$telefono','$correo','$usuario','$contrasena')";

    //insertar datos de usuario y contraseña

    //ejecutar consulta
    $resultado = mysqli_query($conexion, $insertar); //para entrenadores


    //validacion de registro para entrenadores
    if (!$resultado) {
        echo "<script>
                alert('Usuario NO Registrado ERROR');
                window.location= 'Configuracion.php'
    </script>";
    } else {
        echo "<script>
                alert('Usuario Registrado Exitosamente');
                window.location= 'LoginCoach.php'
    </script>";
    }
}
