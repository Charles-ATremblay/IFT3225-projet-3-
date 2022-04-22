<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once 'config/database.php';
 
// instantiate brasseries object
include_once 'objects/brasseries.php';

$database = new Database();
$db = $database->getConnection();
 
$brasseries = new Brasseries($db);
 
// get posted data
$data = json_decode(file_get_contents("Php://input"));
 
// set brasserie property values
$brasseries->Nom_raison_sociale = $data->Nom_raison_sociale;
$brasseries->Adresse = $data->Adresse;
$brasseries->Ville = $data->Ville;
$brasseries->Code_Postal = $data->Code_Postal;
$brasseries->No_Permis = $data->No_Permis;
$brasseries->Courriel = $data->Courriel;

 
// add the brasserie
if($brasseries->add()){
    echo '{';
        echo '"message": "Brasserie was created."';
    echo '}';
}
 
// if unable to create the brasserie, tell the user
else{
    echo '{';
        echo '"message": "Unable to create Brasserie."';
    echo '}';
}
?>
