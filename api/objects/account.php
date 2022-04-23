<?php
class Account{
 
    // database connection and table name
    private $conn;
    private $table_name = "account";
 
    // object properties
    public $account_id;
    public $account_name;
    public $account_passwd;
    public $account_reg_time;
    public $account_enabled;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // login
    function login(){
 
      // select all query
      $query = "SELECT * FROM
                " . $this->table_name . " WHERE account_name = :name AND account_passwd = :pw";

      // prepare query
      $stmt = $this->conn->prepare($query);
      
      // sanitize
      $this->account_name=htmlspecialchars(strip_tags($this->account_name));
      $this->account_passwd=htmlspecialchars(strip_tags($this->account_passwd));
      
      // bind No_Permis of record to delete
      $stmt->bindParam(":name", $this->account_name);
      $stmt->bindParam(":pw", $this->account_passwd);
      
      // execute query
      $stmt->execute();
    
      return $stmt;
    }
    
}
