<?php
	// NOT USED IN API
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	
	include_once 'api/config/database.php';
	include_once 'api/objects/account.php';
	
	// get database connection
	$database = new Database();
	$db = $database->getConnection();
		
	// prepare account object
	$account = new account($db);
	
	// set LOGIN
	$account->account_name = $_POST['username'];
	$account->account_passwd = $_POST['password'];
	
	$stmt = $account->login();
	$num = $stmt->rowCount();

	// check if more than 0 record found
	if($num>0){
	
		// products array
		$accounts_arr=array();
		$accounts_arr["data"]=array();
	
		// retrieve our table contents
		// fetch() is faster than fetchAll()
		// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			// extract row
			// this will make $row['name'] to
			// just $name only
			extract($row);
	
			$account_item=array(
				"account_id" => $account_id,
				"account_name" => $account_name,
				"account_passwd" => $account_passwd
			);
	
			array_push($accounts_arr["data"], $account_item);
		}
	
		echo json_encode($accounts_arr,JSON_PRETTY_PRINT);
	}
	
	else{
		echo json_encode(
			array("message" => "No nope.")
		);
	}
?>      
