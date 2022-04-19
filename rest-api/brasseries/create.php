<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once 'rest-api/config/database.php';
 
// instantiate brasseries object
include_once 'rest-api/objects/brasseries.php';
 
// // get database connection
// include_once '../config/database.php';
 
// // instantiate brasseries object
// include_once '../objects/brasseries.php';
 

$database = new Database();
$db = $database->getConnection();
 
$brasseries = new Brasseries($db);
 
// get posted data
$data = json_decode(file_get_contents("Php://input"));
 
// set brasserie property values
$brasseries->nom_raison_sociale = $data->name;
$brasseries->address = $data->address;
$brasseries->ville = $data->ville;
$brasseries->code_postal = $data->code_postal;
$brasseries->courriel = $data->courriel;

$brasseries->appellation_legale = $data->price;
$brasseries->latitude = $data->latitude;
$brasseries->longtitude = $data->longtitude;
$brasseries->annee_fondation = $data->annee_fondation;



 
// create the brasserie
if($brasseries->create()){
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
