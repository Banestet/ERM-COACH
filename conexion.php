<?php
$DB_HOST="bd3rddw4x2niy8qnoukb-mysql.services.clever-cloud.com";
$DB_NAME= "bd3rddw4x2niy8qnoukb";
$DB_USER= "uungcs711doaxmxy";
$DB_PASS= "83qqLYgrb5suALWJE0zI";
	# conectare la base de datos
    $con=@mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

?>
