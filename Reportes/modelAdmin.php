<?php
session_start();
include  '../Reportes/database.php';

class Model extends Database{

    function getAll(){
        $codigo = $_SESSION['codigo'];
        $batidos = array();
        $batidos['items'] = array();
        $query = $this->connect()->query("SELECT * FROM banner WHERE id_cliente='$codigo'");
        while($row = $query->fetch()){
            array_push($batidos['items'], array(
                'id' => $row['id'],
                'titulo' => $row['titulo'],
                'descripcion' => $row['descripcion'],
                'orden' => $row['orden']
            ));
        }
        return $batidos;
    }

    function getRetos(){
        $retos = array();
        $retos['items'] = array();
        $query = $this->connect()->query('SELECT * FROM image');
        while($row = $query->fetch()){
            array_push($retos['items'], array(
                'id' => $row['id'],
                'title' => $row['title'],
                'created_at' => $row['created_at']
            ));
        }
        return $retos;
    }



    


    function getMedidas(){
        $medidas = array();
        $medidas['items'] = array();
        $codigo = $_SESSION['codigo'];
        $query = $this->connect()->query("SELECT * FROM medidas WHERE codigo='$codigo' ORDER BY id ASC");
        while($row = $query->fetch()){
            array_push($medidas['items'], array(
                'fecha' => $row['fecha'],
                'peso' => $row['peso'],
                'altura' => $row['altura'],
                'BicepD' => $row['BicepD'],
                'BicepI' => $row['BicepI'],
                'Hombros' => $row['Hombros'],
                'Pecho' => $row['Pecho'],
                'AntebrazoD' => $row['AntebrazoD'],
                'AntebrazoI' => $row['AntebrazoI'],
                'Muñeca' => $row['Muñeca'],
                'Abdomen' => $row['Abdomen'],
                'Cintura' => $row['Cintura'],
                'Cadera' => $row['Cadera'],
                'Muslo' => $row['Muslo'],
                'Rodilla' => $row['Rodilla'],
                'Gemelos' => $row['Gemelos'],
                'Tobillo' => $row['Tobillo'],
                'Pierna' => $row['Pierna'],
                'BicepDR' => $row['BicepDR'],
                'BicepDI' => $row['BicepDI']
            ));
        }

        return $medidas;
    }


    function getEjercicio(){
        $codigo = $_SESSION['codigo'];
        $ClieEjer = array();
        $ClieEjer['items'] = array();

        $query = $this->connect()->query("SELECT * FROM workout WHERE id_cliente='$codigo'");

        while($row = $query->fetch()){
            array_push($ClieEjer['items'], array(
                'id' => $row['id'],
                'titulo' => $row['titulo'],
                'descripcion' => $row['descripcion'],
                'estado' => $row['estado'],
                'orden' => $row['orden'],
                'id_cliente' => $row['id_cliente']
            ));
        }

        return $ClieEjer;
    }
    function getBMI(){
        $codigo = $_SESSION['codigo'];
        $ClieBMI = array();
        $ClieBMI['items'] = array();

        $query = $this->connect()->query("SELECT * FROM bmi WHERE codigo='$codigo'");

        while($row = $query->fetch()){
            array_push($ClieBMI['items'], array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'fecha' => $row['fecha'],
                'peso' => $row['peso'],
                'altura' => $row['altura'],
                'resultado' => $row['resultado'],
                'estado' => $row['estado'],
                'sistema' => $row['sistema']
            ));
        }

        return $ClieBMI;
    }






}

?>