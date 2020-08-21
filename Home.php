<?php
error_reporting(0);
include "./admin/Configuracion/SessionTime.php";
include "./conectar.php";
include "includes/header.php";
include "includes/navCoach.php";
include "includes/fuctions.php";
//carousel
include "carousel/db.php";
$images = get_imgs();
?>

<body>
<link rel="shortcut icon" type="image/x-icon" href="/img/icon/ERM.png">
    <!-- Tanla de clientes Section  -->
    <div class="containerEmpleados">
        <ul class="nav">
            <li><a href="add.php">Agregar datos</a></li>
        </ul>
    </div>
    <!--/.nav-collapse -->
    <div class="content">

        <?php
        if (isset($_GET['aksi']) == 'delete') {
            // escaping, additionally removing everything that could be (html/javascript-) code
            $nik = mysqli_real_escape_string($conexion, (strip_tags($_GET["nik"], ENT_QUOTES)));
            $cek = mysqli_query($conexion, "SELECT * FROM clientes WHERE codigo='$nik'");
            if (mysqli_num_rows($cek) == 0) {
                echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
            } else {
                $delete = mysqli_query($conexion, "DELETE FROM clientes WHERE codigo='$nik'");
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
                    <th>Proposito</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                <?php
                if ($filter) {
                    $sql = mysqli_query($conexion, "SELECT * FROM clientes WHERE estado='$filter' ORDER BY codigo ASC");
                } else {
                    $sql = mysqli_query($conexion, "SELECT * FROM clientes ORDER BY codigo ASC");
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
							<td><a href="profile.php?nik=' . $row['codigo'] . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ' . $row['nombres'] . '</a></td>
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
								<a href="edit.php?nik=' . $row['codigo'] . '" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="Home.php?aksi=delete&nik=' . $row['codigo'] . '" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos ' . $row['nombres'] . '?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
    </div>
    <center>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!--  tabla de clientes Section End -->

        <!-- chat -->

        <div class="chat">
            <a href="ForoChat.php">
                <img src="img/icon/chat.png" alt="" class="chatIcon">
            </a>

        </div>
        <!-- chat End -->

        <div class="retos">
            <nav class="navbar navbar-inverse">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a class="btn btn-success" id="btnCarousel" href="carousel/">Administar</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            <div class="container">
                <div class="row">
                    <div>
                        <?php if (count($images) > 0) : ?>
                            <!-- aqui insertaremos el slider -->
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <!-- Indicatodores -->
                                <ol class="carousel-indicators">
                                    <?php $cnt = 0;
                                    foreach ($images as $img) : ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="<?php if ($cnt == 0) {
                                                                                                                    echo 'active';
                                                                                                                } ?>"></li>
                                    <?php $cnt++;
                                    endforeach; ?>
                                </ol>

                                <!-- Contenedor de las imagenes -->
                                <div class="carousel">
                                    <?php $cnt = 0;
                                    foreach ($images as $img) : ?>
                                        <div class="carousel-item  <?php if ($cnt == 0) {
                                                                        echo 'active';
                                                                    } ?>">
                                            <img src="<?php echo 'carousel/' . $img->folder . $img->src; ?>" alt="Imagen 1">
                                            <div id="item">
                                                <div class="carousel-caption d-none d-md-block" style="color: rgb(245, 110, 0);" style="font-size: 14px;" "><?php echo $img->title; ?></div>
                                    </div>
                                </div>
                                <?php $cnt++;
                                    endforeach; ?>
                            </div>

                            <!-- Controls -->
                            <a class=" carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Anterior</span>
                                                    </a>
                                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Siguiente</span>
                                                    </a>

                                                </div>
                                            <?php else : ?>
                                                <h4 class="alert alert-warning">No hay imagenes</h4>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                </div>

                            </div>

                            <div class="footer">
                                <small>Copyright &copy; ERM COACH 2020- Todos los derechos reservados</small>
                            </div>

                            <script src="js/jquery.min.js"></script>
                            <script src="bootstrap/js/bootstrap.min.js"></script>


                            <!-- Js Plugins -->
                            <script src="/js/jquery-3.3.1.min.js"></script>
                            <script src="/js/bootstrap.min.js"></script>
                            <script src="/js/jquery.magnific-popup.min.js"></script>
                            <script src="/js/mixitup.min.js"></script>
                            <script src="/js/jquery.slicknav.js"></script>
                            <script src="/js/owl.carousel.min.js"></script>
                            <script src="/js/main.js"></script>
</body>

</html>