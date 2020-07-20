<?php

if (isset($_FILES['imagenFondo'])) {
    $nombreImagenf=$_FILES['imagenFondo']['name'];
    $rutaf=$_FILES['imagenFondo']['tmp_name'];
    $destinof="img/".$nombreImagenf;
    if (copy($rutaf,$destinof)) {
        $sql="INSERT INTO configuracion(Nombre,ruta) VALUES ('$nombreImagenf','$destinof')";
        $res=mysqli_query($conexion,$sql);
        if ($res) {
            echo "<script>
                alert('Cargada correctamente');
                window.location= 'Nutricion.php'
            </script>"; 
        }else{
            //die("Error".mysqli_error($conexion));
            echo "<script>
                alert('No se pudo cargar');
                window.location= 'Nutricion.php'
            </script>"; 
        }
    }
}

?>