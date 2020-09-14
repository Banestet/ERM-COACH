<?php
session_start();
include '../Reportes/database.php';



class AdminModel extends Database{

    function getAll(){   
        $adm = array();
        $adm['items'] = array();
        $query = $this->connect()->query('SELECT * FROM clientes WHERE id_codigo = "105" ');

        while($row = $query->fetch()){
            array_push($adm['items'], array(
                'codigo' => $row['codigo'],
                'nombres' => $row['nombres'],
                'lugar_nacimiento' => $row['lugar_nacimiento'],
                'fecha_nacimiento' => $row['fecha_nacimiento'],
                'direccion' => $row['direccion'],
                'telefono' => $row['telefono'],
                'puesto' => $row['puesto'],
                'estado' => $row['estado'],
                'usuario' => $row['usuario']                

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

?>