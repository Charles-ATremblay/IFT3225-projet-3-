<?php
class Brasseries{
 
    // database connection and table name
    private $conn;
    private $table_name = "brasseries";
 
    // object properties
    public $Nom_raison_sociale;
    public $Appellation_légale;
    public $Autre_appellation;
    public $Adresse;
    public $Ville;
    public $Code_Postal;
    public $Pays;
    public $Latitude;
    public $Longtitude;
    public $Région_Administrative;
    public $No_Permis;
    public $Brasse_sous_le_permis;
    public $Type_de_Permis;
    public $Membre_de_AMBQ;
    public $Année_fondation;
    public $Site_Web;
    public $Courriel;
    public $Téléphone;
    public $Facebook;
    public $Ratebeer;
    public $Untappd;
    public $AuMenu;
    public $Twitter;
    public $Wikidata;
    public $Youtube;
    public $Instagram;
    public $Pinterest;
    public $Snapchat;
    public $Autre;
    public $Notes;
    
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // // read brasseries
    function readNames(){
 
      // select all query
      $query = "SELECT Nom_raison_sociale FROM
                " . $this->table_name;
      
      // prepare query statement
      $stmt = $this->conn->prepare($query);
      
      // execute query
      $stmt->execute();
      
      return $stmt;
    }

      // read one brasserie with Nom_raison_sociale PREFIX
      function readOneName(){

        // select all query
        $query = "SELECT
                  Nom_raison_sociale
                FROM
                    " . $this->table_name . " 
                WHERE
                Nom_raison_sociale like '$this->Nom_raison_sociale%'";
        
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        
        // execute query
        $stmt->execute();
        
        return $stmt;
      }

    // // read one brasserie with No_Permis
    function readOneNoPermis(){
 
      // query
      $query = "SELECT
                *
            FROM
                " . $this->table_name . " 
            WHERE
                No_Permis = ?";
      
      // prepare query statement
      $stmt = $this->conn->prepare( $query );
      
      // bind No_Permis of product to be updated
      $stmt->bindParam(1, $this->No_Permis);
      
      // execute query
      $stmt->execute();
      
      // get retrieved row
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      
      // set values to object properties
      $this->Nom_raison_sociale = $row['Nom_raison_sociale'];
      $this->Appellation_légale = $row['Appellation_légale'];
      $this->Autre_appellation = $row['Autre_appellation'];
      $this->Adresse = $row['Adresse'];
      $this->Ville = $row['Ville'];
      $this->Code_Postal = $row['Code_Postal'];
      $this->Province = $row['Province'];
      $this->Pays = $row['Pays'];
      $this->Latitude = $row['Latitude'];
      $this->Longitude = $row['Longitude'];
      $this->Région_Administrative = $row['Région_Administrative'];
      $this->No_Permis = $row['No_Permis'];
      $this->Brasse_sous_le_permis = $row['Brasse_sous_le_permis'];
      $this->Type_de_Permis = $row['Type_de_Permis'];
      $this->Membre_de_AMBQ = $row['Membre_de_AMBQ'];
      $this->Année_fondation = $row['Année_fondation'];
      $this->Site_Web = $row['Site_Web'];
      $this->Courriel = $row['Courriel'];
      $this->Téléphone = $row['Téléphone'];
      $this->Facebook = $row['Facebook'];
      $this->Ratebeer = $row['Ratebeer'];
      $this->Untappd = $row['Untappd'];
      $this->AuMenu = $row['AuMenu'];
      $this->Twitter = $row['Twitter'];
      $this->Wikidata = $row['Wikidata'];
      $this->Youtube = $row['Youtube'];
      $this->Instagram = $row['Instagram'];
      $this->Pinterest = $row['Pinterest'];
      $this->Snapchat = $row['Snapchat'];
      $this->Autre = $row['Autre'];
      $this->Notes = $row['Notes'];
  
    }
  
    // create brasserie
    function create(){

      // query to insert record
      $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, price=:price, description=:description, category_id=:category_id, created=:created";
      
      // prepare query
      $stmt = $this->conn->prepare($query);
      
      // sanitize
      $this->name=htmlspecialchars(strip_tags($this->name));
      $this->price=htmlspecialchars(strip_tags($this->price));
      $this->description=htmlspecialchars(strip_tags($this->description));
      $this->category_id=htmlspecialchars(strip_tags($this->category_id));
      $this->created=htmlspecialchars(strip_tags($this->created));
      
      // bind values
      $stmt->bindParam(":name", $this->name);
      $stmt->bindParam(":price", $this->price);
      $stmt->bindParam(":description", $this->description);
      $stmt->bindParam(":category_id", $this->category_id);
      $stmt->bindParam(":created", $this->created);
      
      // execute query
      if($stmt->execute()){
        return true;
      }
      
      return false;
      
    }

    // delete the brasserie
    function delete(){
 
      // delete query
      $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
      
      // prepare query
      $stmt = $this->conn->prepare($query);
      
      // sanitize
      $this->id=htmlspecialchars(strip_tags($this->id));
      
      // bind id of record to delete
      $stmt->bindParam(1, $this->id);
      
      // execute query
      if($stmt->execute()){
        return true;
      }
      
      return false;
      
    }

}
