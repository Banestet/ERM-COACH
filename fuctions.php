<?php
error_reporting(0);
session_start();
include 'conectar.php';

function menuItems(){
    global $conexion;
    $query = mysqli_query($conexion, "SELECT * FROM  menu
    INNER JOIN permisos ON menu.Id_Menu = permisos.id_Menu;");

    while($row = mysqli_fetch_assoc($query)){
        $id_rol = $row['id_rol'];
        if ($id_rol['id_rol'] == '1'){
            $Estado = $row['Estado'];
            if ($Estado['Estado']==1) {
                $id =$row['Id_Menu'];
                $Nombre =$row['Nombre'];
                $Ruta =$row['Ruta'];
                echo"<li><a href='{$Ruta}'>{$Nombre}</a></li>";
            }
        }
    }
}


function menuItems2(){
    global $conexion;
    $query = mysqli_query($conexion, "SELECT * FROM  menu
    INNER JOIN permisos ON menu.Id_Menu = permisos.id_Menu;");

    while($row = mysqli_fetch_assoc($query)){
        $id_rol = $row['id_rol'];
        if ($id_rol['id_rol'] == '2'){
            $Estado = $row['Estado'];
            if ($Estado['Estado']==1) {
                $id =$row['Id_Menu'];
                $Nombre =$row['Nombre'];
                $Ruta =$row['Ruta'];
                echo"<li><a href='{$Ruta}'>{$Nombre}</a></li>";
            }
        }
    }
}
function menuItems3(){
    global $conexion;
    $query = mysqli_query($conexion, "SELECT * FROM  menu
    INNER JOIN permisos ON menu.Id_Menu = permisos.id_Menu;");

    while($row = mysqli_fetch_assoc($query)){
        $id_rol = $row['id_rol'];
        if ($id_rol['id_rol'] == '3'){
            $Estado = $row['Estado'];
            if ($Estado['Estado']==1) {
                $id =$row['Id_Menu'];
                $Nombre =$row['Nombre'];
                $Ruta =$row['Ruta'];
                echo"<li><a href='{$Ruta}'>{$Nombre}</a></li>";
            }
        }
    }
}




?>