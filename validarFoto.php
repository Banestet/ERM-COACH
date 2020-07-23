<?php

include "conectar.php";
session_start();
if (isset($_FILES['imagen'])) {
    $nombreImagen=$_FILES['imagen']['name'];
    $Empresa = $_POST["Empresa"];
    $ruta=$_FILES['imagen']['tmp_name'];
    $destino="img/FondoBaner/".$nombreImagen;
    if (copy($ruta,$destino)) {
        $sql="INSERT INTO configuracion(Nombre,ruta,Empresa) VALUES ('$nombreImagen','$destino','$Empresa')";
        $res=mysqli_query($conexion,$sql);
        if ($res) {
            echo "<script>
                alert('Cargada correctamente');
                window.location= 'Configuracion.php'
            </script>"; 
        }else{
            die("Error".mysqli_error($conexion));
        }
    }
}

?>