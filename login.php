<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	
	include_once 'api/config/database.php';
	include_once 'api/objects/account.php';
	
	session_start();

	if (isset($_SESSION["username"]) && isset($_SESSION["loggedIn"])) {
		header("Location: index.html");
		exit();
	}

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
		$_SESSION["username"] = $_POST['username'];
		echo $_SESSION["username"];
		$_SESSION["loggedIn"] = 1;
		// header('Location: ./index.html/#/table' );
		header('Location: index.html');

	} else {
		
		echo '{';
			echo '"message": "Invalid username and/or password."';
			echo '}';
	}
?>      
