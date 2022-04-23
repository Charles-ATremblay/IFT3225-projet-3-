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
 
      // query
      $query = "SELECT account_id FROM " . $this->table_name . " WHERE account_name=:username AND account_passwd=:passwd";
      
      // prepare query
      $stmt = $this->conn->prepare($query);
      
      // sanitize
      $this->account_name=htmlspecialchars(strip_tags($this->account_name));
      $this->account_passwd=htmlspecialchars(strip_tags($this->account_passwd));
      
      // bind No_Permis of record to delete
      $stmt->bindParam(":username", $this->account_name);
      $stmt->bindParam(":passwd", $this->account_name);
      
      // execute query
      $stmt->execute(){
        
      return $stmt;

    
}
