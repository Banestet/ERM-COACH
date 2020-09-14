<?php 
session_start();
$sql ="SELECT * FROM configuracion";
$res=mysqli_query($conexion,$sql);
$res3=mysqli_query($conexion,$sql);
?>

<header class="header-section">
        <div class="container">
            <div class="infoUsuario">
                <h1> <strong> Bienvenido:</strong> <?php echo $_SESSION['usuario'] ?> </h1>

                <?php
                $data3=mysqli_fetch_array($res3);
                echo '<h1>'.$data3['Empresa']. '</h1>';
                ?>

                <h1><?php echo $_SESSION['correo'] ?></h1>
                <h1><?php echo $_SESSION['codigo'] ?></h1>
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
                        <?php include 'fuctions.php';menuItems2(); ?>
                    </ul>
                </nav>
                    <a href="salir.php" class="primary-btn signup-btn">Salir</a>
            </div>
        </div>
    </header>
    <!-- Header End -->
