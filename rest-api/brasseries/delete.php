<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
 
// include database and object file
include_once 'rest-api/config/database.php';
include_once 'rest-api/objects/brasseries.php';

// include_once '../config/database.php';
// include_once '../objects/brasseries.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare brasserie object
$brasseries = new Brasseries($db);
 
// get brasserie id
$data = json_decode(file_get_contents("php://input"));
 
// set brasserie id to be deleted
$brasseries->id = $data->id;
 
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
