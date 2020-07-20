<?php
include "conectar.php";
/*codigo para que no pueda acceder a la vista sin haber iniciado seccion anterior mente  */ 
session_start();
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