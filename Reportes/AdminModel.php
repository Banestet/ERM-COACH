<?php
session_start();
include '../Reportes/database.php';



class Model extends Database{

    function getUsuarios(){   
        $adm = array();
        $adm['items'] = array();
        $query = $this->connect()->query('SELECT * FROM usuarios ');

        while($row = $query->fetch()){
            array_push($adm['items'], array(
                'codigo' => $row['codigo'],
                'nombres' => $row['nombres'],
                'direccion' => $row['direccion'],
                'telefono' => $row['telefono'],
                'puesto' => $row['puesto'],
                'usuario' => $row['usuario'],                
                'correo' => $row['correo'],                

            ));
        }
        return $adm;
    }

     function getChat(){
        $admChat = array();
        $admChat['items'] = array();
        $query = $this->connect()->query("SELECT * FROM chat ORDER BY fecha DESC ");
        while($row = $query->fetch()){
            array_push($admChat['items'], array(
                'id' => $row['id'],
                'usuario' => $row['usuario'],
                'mensaje' => $row['mensaje'],
                'fecha' => $row['fecha']
            ));
        }

        return $admChat;

    }
}
