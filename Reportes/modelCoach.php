<?php
session_start();
include  '../Reportes/database.php';

class Model extends Database{

    function getClientes(){
        $codigo = $_SESSION['codigo'];
        $Client = array();
        $Client['items'] = array();
        $query = $this->connect()->query("SELECT * FROM clientes WHERE id_codigo='$codigo'");
        while($row = $query->fetch()){
            array_push($Client['items'], array(
                'codigo' => $row['codigo'],
                'nombres' => $row['nombres'],
                'direccion' => $row['direccion'],
                'telefono' => $row['telefono'],
                'correo' => $row['correo']
            ));
        }
        return $Client;
    }

   






}

?>