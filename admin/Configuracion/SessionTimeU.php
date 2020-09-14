<?php
/*codigo para que no pueda acceder a la vista sin haber iniciado seccion anterior mente  */ 
include "./conectar.php";
session_start();
if(empty($_SESSION['activeU'])){
    header('location: LoginCliente.php');
}else{
    //codigo para cierre de session por inactividad

    $fechaGuardada = $_SESSION["ultimoAccesoU"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

    //comparamos el tiempo transcurrido
    if($tiempo_transcurrido >= 900) {
    //si pasaron 10 minutos o más
    session_destroy(); // destruyo la sesión
    echo "<script>
    alert('Session Cerrada Por Inactividad');
    window.location= 'LoginCliente.php'
    </script>";
    //header("Location: index.php"); //envío al usuario a la pag. de autenticación
    //sino, actualizo la fecha de la sesión
    }else {
    $_SESSION["ultimoAccesoU"] = $ahora;
    }

}
?>