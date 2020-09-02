<?php
error_reporting(0);
include 'conectar.php';

session_start();
$genero=$_POST['Genero'];
$Edad=$_POST['Edad'];
$distancia=$_POST['Distancia'];
$Nombre = $_SESSION['usuario'];
$Fecha  = $_SESSION["ultimoAcceso"];


//verificamos el genero de la persona que quiere calcular el test de cooper

if ($genero=="Hombre") {
    if ($Edad<30) {
        if ($distancia<=1600) {
            $resultado= "Valoracion Muy Malass";
        }else if ($distancia>1600 && $distancia<2199 ) {
            $resultado= "Valoracion Mala";
        }else if ($distancia>2200 && $distancia<2399 ) {
            $resultado= "Valoracion Regular";
        }else if ($distancia>2400 && $distancia<2800 ) {
            $resultado= "Valoracion Buena";
        }elseif ($distancia>2800  ) {
            $resultado= "Valoracion Muy Buena";
        }
    }else if ($Edad>30 && $Edad<39) {
        # code...
        if ($distancia<=1500) {
            $resultado= "Valoracion Muy Mala1";
        }else if ($distancia>1500 && $distancia<1899 ) {
            $resultado= "Valoracion Mala";
        }else if ($distancia>1900 && $distancia<2299 ) {
            $resultado= "Valoracion Regular";
        }else if ($distancia>2300 && $distancia<2700 ) {
            $resultado= "Valoracion Buena";
        }elseif ($distancia>2700  ) {
            $resultado= "Valoracion Muy Buena";
        }
    }else if ($Edad>40 && $Edad<49) {
        # code...
        if ($distancia<=1400) {
            $resultado= "Valoracion Muy Mala2";
        }else if ($distancia>1400 && $distancia<1699 ) {
            $resultado= "Valoracion Mala";
        }else if ($distancia>1700 && $distancia<2099 ) {
            $resultado= "Valoracion Regular";
        }else if ($distancia>2100 && $distancia<2500 ) {
            $resultado= "Valoracion Buena";
        }elseif ($distancia>2500  ) {
            $resultado= "Valoracion Muy Buena";
        }

    }else if ($Edad>50 ) {
        # code...
        if ($distancia<=1300) {
            
            $resultado= "Valoracion Muy Malas";
        }else if ($distancia>1300 && $distancia<1599 ) {
            $resultado= "Valoracion Mala";
        }else if ($distancia>1600 && $distancia<1999 ) {
            $resultado= "Valoracion Regular";
        }else if ($distancia>2000 && $distancia<2400 ) {
            $resultado= "Valoracion Buena";
        }elseif ($distancia>2400  ) {
            $resultado= "Valoracion Muy Buena";
        }
    }


}elseif ($genero=="Mujer") {
    if ($Edad<30) {
        if ($distancia<=1500) {
            $resultado= "Valoracion Muy Malam";
        }else if ($distancia>1500 && $distancia<1799 ) {
            $resultado= "Valoracion Mala";
        }else if ($distancia>1800 && $distancia<2199 ) {
            $resultado= "Valoracion Regular";
        }else if ($distancia>2200 && $distancia<2700 ) {
            $resultado= "Valoracion Buena";
        }elseif ($distancia>2700  ) {
            $resultado= "Valoracion Muy Buena";
        }
    }elseif ($Edad>30 && $Edad<39) {
        # code...
        if ($distancia<=1400) {
            $resultado= "Valoracion Muy Malamm";
        }else if ($distancia>1400 && $distancia<1699 ) {
            $resultado= "Valoracion Mala";
        }else if ($distancia>1700 && $distancia<1999 ) {
            $resultado= "Valoracion Regular";
        }else if ($distancia>2000 && $distancia<2500 ) {
            $resultado= "Valoracion Buena";
        }elseif ($distancia>2500  ) {
            $resultado= "Valoracion Muy Buena";
        }
    }elseif ($Edad>40 && $Edad<49) {
        # code...
        if ($distancia<=1200) {
            $resultado= "Valoracion Muy Malammm";
        }else if ($distancia>1200 && $distancia<1499 ) {
            $resultado= "Valoracion Mala";
        }else if ($distancia>1500 && $distancia<1899 ) {
            $resultado= "Valoracion Regular";
        }else if ($distancia>1900 && $distancia<2300 ) {
            $resultado= "Valoracion Buena";
        }elseif ($distancia>2300  ) {
            $resultado= "Valoracion Muy Buena";
        }

    }elseif ($Edad>=50 ) {
        # code...
        if ($distancia<=1100) {
            $resultado= "Valoracion Muy Malam4";
        }else if ($distancia>1100 && $distancia<1399 ) {
            $resultado= "Valoracion Mala";
        }else if ($distancia>1400 && $distancia<1699 ) {
            $resultado= "Valoracion Regular";
        }else if ($distancia>1700 && $distancia<2200 ) {
            $resultado= "Valoracion Buena";
        }elseif ($distancia>2200  ) {
            $resultado= "Valoracion Muy Buena";
        }
    }

}

$insertar = "INSERT INTO cooper(resultado,Fecha,Nombre,Distancia,Edad) VALUES ('$resultado','$Fecha','$Nombre','$Distancia','$Edad')";
$resul = mysqli_query ($conexion, $insertar);

if (!$resul) {
    echo "<script>
                alert('ERROR');
                window.location= 'TestErmCoach.php'
    </script>";
}else{
	//MOSTRAR RESULTADO BMI
    echo "<script>
                alert('$nombre su Test de Cooper tiene una $resultado');
                window.location= 'TestErmCoach.php'
    </script>";
}

