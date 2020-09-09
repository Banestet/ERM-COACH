<?php

include  '../Reportes/database.php';

class Model extends Database{

    function getAll(){
        $clientes = array();
        $clientes['items'] = array();
        $query = $this->connect()->query('SELECT * FROM clientes');
        while($row = $query->fetch()){
            array_push($clientes['items'], array(
                'codigo' => $row['codigo'],
                'telefono' => $row['telefono'],
                'direccion' => $row['direccion'],
                'puesto' => $row['puesto']
            ));
        }
        return $clientes;
    }
    function getEjer(){
        $workout = array();
        $workout['items'] = array();
        $query = $this->connect()->query('SELECT * FROM workout');
        while($row = $query->fetch()){
            array_push($workout['items'], array(

                'id' => $row['id'],
                'titulo' => $row['titulo'],
                'descripcion' => $row['descripcion']
                
            ));
        }
        return $clientes;
    }






}

?>