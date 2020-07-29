<?php
include "conectar.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Datos</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min2.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="css/style_nav.css" rel="stylesheet">
    
    

   
</head>

<body>
    
    
    <div class="container">
        <div class="content">
            <h2 style="color: chocolate;">Datos del Cliente &raquo; Agregar datos</h2>
            <hr />

            <?php
			if(isset($_POST['add'])){
				$codigo		     = mysqli_real_escape_string($conexion,(strip_tags($_POST["codigo"],ENT_QUOTES)));//Escanpando caracteres 
				$nombres		     = mysqli_real_escape_string($conexion,(strip_tags($_POST["nombres"],ENT_QUOTES)));//Escanpando caracteres 
				$lugar_nacimiento	 = mysqli_real_escape_string($conexion,(strip_tags($_POST["lugar_nacimiento"],ENT_QUOTES)));//Escanpando caracteres 
				$fecha_nacimiento	 = mysqli_real_escape_string($conexion,(strip_tags($_POST["fecha_nacimiento"],ENT_QUOTES)));//Escanpando caracteres 
				$direccion	     = mysqli_real_escape_string($conexion,(strip_tags($_POST["direccion"],ENT_QUOTES)));//Escanpando caracteres 
				$telefono		 = mysqli_real_escape_string($conexion,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 
				$puesto		 = mysqli_real_escape_string($conexion,(strip_tags($_POST["puesto"],ENT_QUOTES)));//Escanpando caracteres 
				$estado			 = mysqli_real_escape_string($conexion,(strip_tags($_POST["estado"],ENT_QUOTES)));//Escanpando caracteres 
				
			
 
				$cek = mysqli_query($conexion, "SELECT * FROM empleados WHERE codigo='$codigo'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($conexion, "INSERT INTO empleados(codigo, nombres, lugar_nacimiento, fecha_nacimiento, direccion, telefono, puesto, estado)
															VALUES('$codigo','$nombres', '$lugar_nacimiento', '$fecha_nacimiento', '$direccion', '$telefono', '$puesto', '$estado')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
					 
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. código exite!</div>';
				}
			}
			?>

            <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Código</label>
                    <div class="col-sm-2">
                        <input type="text" name="codigo" class="form-control" placeholder="Código" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombres</label>
                    <div class="col-sm-4">
                        <input type="text" name="nombres" class="form-control" placeholder="Nombres" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Lugar de nacimiento</label>
                    <div class="col-sm-4">
                        <input type="text" name="lugar_nacimiento" class="form-control"
                            placeholder="Lugar de nacimiento" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Fecha de nacimiento</label>
                    <div class="col-sm-4">
                        <input type="text" name="fecha_nacimiento" class="input-group date form-control" date=""
                            data-date-format="dd-mm-yyyy" placeholder="00-00-0000" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Dirección</label>
                    <div class="col-sm-3">
                        <textarea name="direccion" class="form-control" placeholder="Dirección"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Teléfono</label>
                    <div class="col-sm-3">
                        <input type="text" name="telefono" class="form-control" placeholder="Teléfono" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Puesto</label>
                    <div class="col-sm-3">
                        <input type="text" name="puesto" class="form-control" placeholder="Puesto" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Estado</label>
                    <div class="col-sm-3">
                        <select name="estado" class="form-control">
                            <option value=""> ----- </option>
                            <option value="1">Fijo</option>
                            <option value="2">Dialogo</option>
                            <option value="3">Termindo</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
                        <a href="Home.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
        <a href="./Home.php">
            <img src="img/ERM.png" class="avatare" alt="Avatar Image">
        </a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
    $('.date').datepicker({
        format: 'dd-mm-yyyy',
    })
    </script>
</body>

</html>