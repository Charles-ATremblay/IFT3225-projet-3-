<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once 'rest-api/config/database.php';
include_once 'rest-api/objects/brasseries.php';

// include_once '../config/database.php';
// include_once '../objects/brasseries.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare brasserie object
$brasserie = new Brasseries($db);
 
// set No_Permis property of brasserie to be edited
// $brasserie->No_Permis = isset($_GET['No_Permis']) ? $_GET['No_Permis'] : die();
$brasserie->No_Permis = $No_Permis;
 
// read the details of brasserie to be edited
$brasserie->readOneNoPermis();
 
// create array
$brasserie_arr = array(
    "Nom_raison_sociale" =>  $brasserie->Nom_raison_sociale,
    "Appellation_légale" => $brasserie->Appellation_légale,
    "Autre_appellation" => $brasserie->Autre_appellation,
    "Adresse" => $brasserie->Adresse,
    "Ville" => $brasserie->Ville,
    "Code_Postal" => $brasserie->Code_Postal,
    "Province" => $brasserie->Province,
    "Pays" => $brasserie->Pays,
    "Latitude" => $brasserie->Latitude,
    "Longitude" => $brasserie->Longitude,
    "Région_Administrative" => $brasserie->Région_Administrative,
    "No_Permis" => $brasserie->No_Permis,
    "Brasse_sous_le_permis" => $brasserie->Brasse_sous_le_permis,
    "Type_de_Permis" => $brasserie->Type_de_Permis,
    "Membre_de_AMBQ" => $brasserie->Membre_de_AMBQ,
    "Année_fondation" => $brasserie->Année_fondation,
    "Site_Web" => $brasserie->Site_Web,
    "Courriel" => $brasserie->Courriel,
    "Téléphone" => $brasserie->Téléphone,
    "Facebook" => $brasserie->Facebook,
    "Ratebeer" => $brasserie->Ratebeer,
    "Untappd" => $brasserie->Untappd,
    "AuMenu" => $brasserie->AuMenu,
    "Twitter" => $brasserie->Twitter,
    "Wikidata" => $brasserie->Wikidata,
    "Youtube" => $brasserie->Youtube,
    "Instagram" => $brasserie->Instagram,
    "Pinterest" => $brasserie->Pinterest,
    "Snapchat" => $brasserie->Snapchat,
    "Autre" => $brasserie->Autre,
    "Notes" => $brasserie->Notes


);
 
// make it json format
print_r(json_encode($brasserie_arr));
?>
