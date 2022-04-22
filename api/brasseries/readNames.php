<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once 'config/database.php';
include_once 'objects/brasseries.php';

// instantiate database and brasserie object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$brasserie = new Brasseries($db);
 
// query products
$stmt = $brasserie->readNames();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $brasseries_arr=array();
    $brasseries_arr["data"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $brasserie_item=array(
            "Nom_raison_sociale" => $Nom_raison_sociale,
        );
 
        array_push($brasseries_arr["data"], $brasserie_item);
    }
 
    echo json_encode($brasseries_arr);
}
 
else{
    echo json_encode(
        array("message" => "No brasseries found.")
    );
}
?>
