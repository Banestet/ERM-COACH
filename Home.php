<?php
/*codigo para que no pueda acceder a la vista sin haber iniciado seccion anterior mente  */ 
//error_reporting(0);
include "conectar.php";
session_start();
$sql ="SELECT * FROM configuracion";
$res=mysqli_query($conexion,$sql);
$res3=mysqli_query($conexion,$sql);

if(empty($_SESSION['active'])){
    header('location: LoginCoach.php');
}else{
    //codigo para cierre de session por inactividad

    $fechaGuardada = $_SESSION["ultimoAcceso"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

    //comparamos el tiempo transcurrido
    if($tiempo_transcurrido >= 600) {
    //si pasaron 10 minutos o más
    session_destroy(); // destruyo la sesión
    echo "<script>
    alert('Session Cerrada Por Inactividad');
    window.location= 'LoginCoach.php'
    </script>";
    //header("Location: index.php"); //envío al usuario a la pag. de autenticación
    //sino, actualizo la fecha de la sesión
    }else {
    $_SESSION["ultimoAcceso"] = $ahora;
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Entrenador</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    
    
    <!-- Bootstrap -->
	<link href="css/bootstrap.min2.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">
	<style>
		.content {
			margin-top: 80px;
		}
    </style>
    

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="infoUsuario">
			<h1> <strong> Bienvenido:</strong> <?php echo $_SESSION['usuario'] ?> </h1>
                <h1><?php echo $_SESSION['correo'] ?></h1>
                <?php
                $data3=mysqli_fetch_array($res3);
                echo '<h1>'.$data3['Empresa']. '</h1>';
                ?>
                <img class="avatarUsuario" src="/img/entrenador.jpg" alt="">
            </div>
            <div class="logo">
                <a href="Home.php">
                    <?php
                        $data=mysqli_fetch_array($res);
                        echo '<img src="'.$data['ruta']. '" alt="" class="avatar">';
                     ?>
                </a>
                <hr>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li class="active"><a href="Home.php">Inicio</a></li>
                        <li><a href="Nutricion.php">Nutricion</a></li>
                        <li><a href="Workout.php">Entrenamineto</a></li>
                        <li><a href="Antropometricas.php">Medidas Antropometricas</a></li>
                    </ul>
                </nav>
                <a href="salir.php" class="primary-btn signup-btn">Salir</a>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="img/Fondo2.jpg">
	<div class="containerEmpleados">
			<ul class="nav">
				<li class="active"><a href="Home.php">Lista de empleados</a></li>
				<li><a href="add.php">Agregar datos</a></li>
			</ul>
		</div><!--/.nav-collapse -->
		<div class="content">
 
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($conexion,(strip_tags($_GET["nik"],ENT_QUOTES)));
				$cek = mysqli_query($conexion, "SELECT * FROM empleados WHERE codigo='$nik'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = mysqli_query($conexion, "DELETE FROM empleados WHERE codigo='$nik'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
			}
			?>
 
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="select" onchange="form.submit()">
						<option value="0">Filtros de datos de empleados</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="1" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>Fijo</option>
						<option value="2" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Dialogo</option>
                        <option value="3" <?php if($filter == 'Outsourcing'){ echo 'selected'; } ?>>Terminado</option>
					</select>
				</div>
			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
                    <th>No</th>
					<th>Código</th>
					<th>Nombre</th>
                    <th>Lugar de nacimiento</th>
                    <th>Fecha de nacimiento</th>
					<th>Teléfono</th>
					<th>Cargo</th>
					<th>Estado</th>
                    <th>Acciones</th>
				</tr>
				<?php
				if($filter){
					$sql = mysqli_query($conexion, "SELECT * FROM empleados WHERE estado='$filter' ORDER BY codigo ASC");
				}else{
					$sql = mysqli_query($conexion, "SELECT * FROM empleados ORDER BY codigo ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$row['codigo'].'</td>
							<td><a href="profile.php?nik='.$row['codigo'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['nombres'].'</a></td>
                            <td>'.$row['lugar_nacimiento'].'</td>
                            <td>'.$row['fecha_nacimiento'].'</td>
							<td>'.$row['telefono'].'</td>
                            <td>'.$row['puesto'].'</td>
							<td>';
							if($row['estado'] == '1'){
								echo '<span class="label label-success">Fijo</span>';
							}
                            else if ($row['estado'] == '2' ){
								echo '<span class="label label-info">Dialogo</span>';
							}
                            else if ($row['estado'] == '3' ){
								echo '<span class="label label-warning">Terminado</span>';
							}
						echo '
							</td>
							<td>
 
								<a href="edit.php?nik='.$row['codigo'].'" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="index.php?aksi=delete&nik='.$row['codigo'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
			</div>
		</div>
	</div><center>
	

    
        
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- Hero Section End -->



  

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Js BMI calculator -->
    <script src="/Home.js"></script>
    <script src="/js/BMI.js"></script>
</body>

</html>