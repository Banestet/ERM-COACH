<?php
    $servidor ="localhost";
    $usuario = "root";
    $password ="";
    $base_datos ="ermcoach";


    $conexion = new myssqli($servidor,$usuario,$password, $base_datos);
    if($conexion->connect_error){
        die("Conexion fallida: " . $conexion->connect_error);
    }
    if(isset($_POST['texto'])){
        
    }



?>