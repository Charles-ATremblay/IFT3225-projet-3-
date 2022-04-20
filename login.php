<?php
	include_once 'api/config/database.php';
	
	session_start();

	if (isset($_SESSION["username"]) && isset($_SESSION["loggedIn"])) {
		header("Location: index.html");
		exit();
	}

	if (isset($_POST["logIn"])) {		
		$username = $conn->real_escape_string($_POST["username"]);
		$password = $conn->real_escape_string($_POST["password"]);
		$data = $conn->query("SELECT account_id FROM account WHERE account_name='$username' AND account_passwd='$password'");

		if ($data->num_rows > 0) {
			$_SESSION["username"] = $username;
			$_SESSION["loggedIn"] = 1;
			
			header("Location: index.html");
			exit();

		} else {
			alert('Invalid Credentials!');
			echo "Please check your inputs!";
		}
	}	
?>      
