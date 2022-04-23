<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once 'api/config/database.php';
// instantiate brasseries object
include_once 'api/objects/brasseries.php';



//Checks if user is logged in and if he is an admin
// if(!isset($_SESSION['username']) && $_SESSION['username'] != admin){
//     header('Location: login.php');
// }

$database = new Database();
$db = $database->getConnection();
 
$brasseries = new Brasseries($db);

 
// set brasserie property values
$brasseries->Nom_raison_sociale = $_POST['nom'];
$brasseries->Adresse = $_POST['adresse'];
$brasseries->Ville = $_POST['ville'];
$brasseries->Code_Postal = $_POST['code_postal'];
$brasseries->No_Permis = $_POST['permis'];
$brasseries->Courriel = $_POST['courriel'];
$brasseries->Longitude = $_POST['longitude'];
$brasseries->Latitude = $_POST['latitude'];

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
