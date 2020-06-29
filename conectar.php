<?php
// create connection
$conexion =mysqli_connect("localhost","root","","erm");

function formatearFecha($fecha){
	return date('g:i a', strtotime($fecha));
}

?>