<?php

include ("conectar.php");
if (isset($_FILES['imagen'])) {
    $nombreImagen=$_FILES['imagen']['name'];
    $info = $_POST["info"];
    $ruta=$_FILES['imagen']['tmp_name'];
    $destino="img/Batidos/".$nombreImagen;
    if (copy($ruta,$destino)) {
        $sql="INSERT INTO batidos(Nombre,ruta,info) VALUES ('$nombreImagen','$destino','$info')";
        $res=mysqli_query($conexion,$sql);
        if ($res) {
            echo "<script>
                alert('Cargada correctamente');
                window.location= 'Nutricion.php'
            </script>"; 
        }else{
            die("Error".mysqli_error($conexion));
        }
    }
}



?>