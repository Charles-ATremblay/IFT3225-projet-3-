<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
// include_once 'rest-api/config/database.php';
 
// instantiate brasseries object
// include_once 'rest-api/objects/brasseries.php';
 
// include_once '../config/database.php';
 
// // instantiate brasseries object
// include_once '../objects/brasseries.php';
 
include_once 'api/config/database.php';
 
// instantiate brasseries object
include_once 'api/objects/brasseries.php';

$database = new Database();
$db = $database->getConnection();
 
$brasseries = new Brasseries($db);


// $nom = mysqli_real_escape_string($db, $_POST['nom']);
// $adresse = mysqli_real_escape_string($db, $_POST['adresse']);
// $ville = mysqli_real_escape_string($db, $_POST['ville']);
// $code_postal = mysqli_real_escape_string($db, $_POST['code_postal']);
// $permis = mysqli_real_escape_string($db, $_POST['permis']);
// $courriel = mysqli_real_escape_string($db, $_POST['courriel']);

// get posted data
// $data = json_decode(file_get_contents("Php://input"));
 
// set brasserie property values
$brasseries->Nom_raison_sociale = $_POST['nom'];
$brasseries->Adresse = $_POST['adresse'];
$brasseries->Ville = $_POST['ville'];
$brasseries->Code_Postal = $_POST['code_postal'];
$brasseries->No_Permis = $_POST['permis'];
$brasseries->Courriel = $_POST['courriel'];

 
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
