<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	
	include_once 'api/config/database.php';
	include_once 'api/objects/account.php';
	
	// session_start();

	// if (isset($_SESSION["username"]) && isset($_SESSION["loggedIn"])) {
	// 	header("Location: index.html");
	// 	exit();
	// }

	// get database connection
	$database = new Database();
	$db = $database->getConnection();
		
	// // prepare brasserie object
	// $account = new account($db);
	
	// // set brasserie No_Permis to be deleted
	// $account->account_name = $_POST['username'];
	// $account->account_passwd = $_POST['password'];
	
	// $data = $account->login();

	// if(true){
	// 	// $_SESSION["username"] = $username;
	// 	// $_SESSION["loggedIn"] = 1;
		
	// 	// header("Location: index.html");
	// 	echo '{';
	// 		echo '"message": "Cool"';
	// 		echo '}';
	// 	// exit();

	// } else {
		
	// 	echo '{';
	// 		echo '"message": "Not cool"';
	// 		echo '}';
	// }

	echo '{';
		echo '"message": "Cool"';
		echo '}';

?>      
