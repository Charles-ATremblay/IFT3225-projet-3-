<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
 
// include database and object file
include_once 'api/config/database.php';
include_once 'api/objects/brasseries.php';

 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare brasserie object
$brasseries = new Brasseries($db);
 
// get brasserie No_Permis
$data = json_decode(file_get_contents("php://input"));
 
// set brasserie No_Permis to be deleted
$brasseries->No_Permis = $data->No_Permis;
 
// delete the brasserie
if($brasseries->delete()){
    echo '{';
        echo '"message": "brasseries was deleted."';
    echo '}';
}
 
// if unable to delete the brasserie
else{
    echo '{';
        echo '"message": "Unable to delete object."';
    echo '}';
}
?>
