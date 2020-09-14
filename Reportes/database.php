<?php
class Database{
    private $dbhost   = 'bd3rddw4x2niy8qnoukb-mysql.services.clever-cloud.com';
    private $dbname   = 'bd3rddw4x2niy8qnoukb';
    private $username = 'uungcs711doaxmxy';
    private $password = '83qqLYgrb5suALWJE0zI';
    private $charset  = 'utf8mb4';

    function connect(){
        try{
            $conexion = "mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname . ";charset=" . $this->charset;

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $options);
            return $pdo;
        }catch(PDOException $e){
            print_r('Error de conexión: ' . $e->getMessage());
        }
    }
}
?>