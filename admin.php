<?php
error_reporting(0);
include "admin/Configuracion/SessionTimeA.php";
include "./conectar.php";

include "includes/navAdmin.php";
include "includes/fuctions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Coda+Caption:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Css Styles chat -->
    <link href="css/bootstrap.min2.css" rel="stylesheet">

    <link rel="stylesheet" href="css/admin.css">
    <link href="css/style_nav.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/chat.css">
    <link rel="stylesheet" href="css/style2.css" type="text/css">
    <style>
    .content {
        margin-top: 80px;
    }
    </style>





</head>

<body>
    <!-- Tanla de clientes Section  -->
    <div class="containerEmpleados">
        <ul class="nav">
            <li class="active"><a href="Home.php">Lista de Empleados</a></li>
            <li><a href="addADMIN.php">Agregar datos</a></li>
        </ul>
    </div>
    <!--/.nav-collapse -->
    <div class="content">

        <?php
        if (isset($_GET['aksi']) == 'delete') {
            // escaping, additionally removing everything that could be (html/javascript-) code
            $nik = mysqli_real_escape_string($conexion, (strip_tags($_GET["nik"], ENT_QUOTES)));
            $cek = mysqli_query($conexion, "SELECT * FROM usuarios WHERE codigo='$nik'");
            if (mysqli_num_rows($cek) == 0) {
                echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
            } else {
                $delete = mysqli_query($conexion, "DELETE FROM usuarios WHERE codigo='$nik'");
                if ($delete) {
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
                }
            }
        }
        ?>

        
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
                if ($filter) {
                    $sql = mysqli_query($conexion, "SELECT * FROM usuarios WHERE estado='$filter' ORDER BY codigo ASC");
                } else {
                    $sql = mysqli_query($conexion, "SELECT * FROM usuarios ORDER BY codigo ASC");
                }
                if (mysqli_num_rows($sql) == 0) {
                    echo '<tr><td colspan="8">No hay datos.</td></tr>';
                } else {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $row['codigo'] . '</td>
							<td><a href="profileADMIN.php?nik=' . $row['codigo'] . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' . $row['nombres'] . '</a></td>
                            <td>' . $row['lugar_nacimiento'] . '</td>
                            <td>' . $row['fecha_nacimiento'] . '</td>
							<td>' . $row['telefono'] . '</td>
                            <td>' . $row['puesto'] . '</td>
							<td>';
                        if ($row['estado'] == '1') {
                            echo '<span class="label label-success">Fijo</span>';
                        } else if ($row['estado'] == '2') {
                            echo '<span class="label label-info">Dialogo</span>';
                        } else if ($row['estado'] == '3') {
                            echo '<span class="label label-warning">Terminado</span>';
                        }
                        echo '
							</td>
							<td>
								<a href="editADMIN.php?nik=' . $row['codigo'] . '" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="index.php?aksi=delete&nik=' . $row['codigo'] . '" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos ' . $row['nombres'] . '?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
    <center>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!--  tabla de clientes Section End -->


        <!-- chat -->

        <div class="chat">
            <a href="ForoChatAdmin.php">
                <img src="img/icon/chat.png" alt="" class="chatIcon">
            </a>

        </div>
        <!-- chat End -->



        <div class="roles">
            <div class="rol">
                <div class="new_rol">
                    <form action="admin/Configuracion/conectarroles.php" method="POST">
                        <h1 class="tit">Crear nuevo rol</h1>
                        <label class="col-sm-3 control-label">Nombre de rol</label>
                        <input type="text" id="nuevo" name="nuevo" placeholder="Nombre rol">
                        <input type="submit" value="Crear Rol" name="Crear Rol" />
                    </form>
                </div>
            </div>
            <div class="edit_rol">

                <form action="admin/Configuracion/editarrol.php" method="POST">
                    <h1 class="tit">Editar Rol</h1>
                    <label class="col-sm-3 control-label"> Rol Viejo</label>
                    <input type="text" id="viejo" name="viejo" placeholder="Rol viejo">
                    <label class="col-sm-3 control-label"> Rol Nuevo</label>
                    <input type="text" id="nuevo" name="nuevo" placeholder="Rol nuevo">
                    <input type="submit" value="Editar Rol" />
                </form>
            </div>


            <div class="delate_rol">
                <form action="admin/Configuracion/eliminarrol.php" method="POST">
                    <h1 class="tit">Eliminar Rol</h1>
                    <input type="text" id="viejo" name="viejo" placeholder="Rol a eliminar">
                    <input type="submit" value="eliminar Rol" />
                </form>
            </div>
            
            <div class="tableroles">

                <table class="table table-striped table-hover">
                    <tr>
                        <th>id</th>
                        <th>nombre</th>
                    </tr>
                    <?php
                    if ($filter) {
                        $sql = mysqli_query($conexion, "SELECT * FROM rol WHERE id='$filter' ORDER BY codigo ASC");
                    } else {
                        $sql = mysqli_query($conexion, "SELECT * FROM rol ORDER BY id ASC");
                    }
                    if (mysqli_num_rows($sql) == 0) {
                        echo '<tr><td colspan="8">No hay datos.</td></tr>';
                    } else {
    
                        while ($row = mysqli_fetch_assoc($sql)) {
                            echo '
                            <tr>
                                <td>' . $row['id'] .  '</td>
                                <td>' . $row['nombre'] . '</td>';
                            $no++;
                        }
                    }
                    ?>
                </table>
            </div>
        </div>


</body>

</html>