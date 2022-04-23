<?php

class Database{
 
    // specify your own database credentials
    // private $host = "localhost";
    // private $db_name = "projet3";
    // private $username = "root";
    // private $password = "";
    private $host = "www-ens.iro.umontreal.ca";
    private $db_name = "oudanons_web";
    private $username = "oudanons";
    private $password = "Ecole1234!!";
    public $conn;

    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}

?>
