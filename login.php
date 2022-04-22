<?php
	include_once 'api/config/database.php';
	
	session_start();
	getConnection();

	if(isset($_POST["logInSubmit"])){
		$username = $_POST["username"];
		$password = $_POST["password"];

		//Prevents SQL injections
		$username = stripcslashes($username);  
		$password = stripcslashes($password);  
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);

		if($username != "" && $password != ""){
			$sql_query = mysqli_query("SELECT * FROM account WHERE account_name = '$username'
			 and password = '$password' ") or die("Can't query the database");
			$count = mysqli_num_rows($sql_query);

			if($count>0){
				$_SESSION["username"] = $username;
				header('Location: table.php');
			}else{
				echo "Invalid username and/or password.";
			}
		}
	}

	// if (isset($_SESSION["username"]) && isset($_SESSION["loggedIn"])) {
	// 	header("Location: index.html");
	// 	exit();
	// }

	// $username = $password = "";
	// $username_error = $passeword_error = $login_error =  "";

	// if($_SERVER["REQUEST_METHOD"] == "POST"){
		
	// 	if(empty(trim($_POST["username"]))){
	// 		$username_error = "Please enter username."
	// 	} else{
	// 		$username  trim($_POST["username"]);
	// 	}

	// 	if(empty($username_error) && empty($passeword_error)){

	// 		$sql = "SELECT account_id, account_name, account_passwd FROM account WHERE account_name = ?";

	// 		if( $stmt = mysqli_prepare($link, $sql)){
	// 			mysqli_stmt_bind_param($stmt, "s", $param_username);

	// 			$param_username = $username;

	// 			if(mysqli_stmt_execute($stmt)){
	// 				mysqli_stmt_store_result($stmt);
	// 			}
	// 		}
	// 	}
	// }
	// if (isset($_POST["logIn"])) {		
	// 	$username = $conn->real_escape_string($_POST["username"]);
	// 	$password = $conn->real_escape_string($_POST["password"]);
	// 	$data = $conn->query("SELECT account_id FROM account WHERE account_name='$username' AND account_passwd='$password'");

	// 	if ($data->num_rows > 0) {
	// 		$_SESSION["username"] = $username;
	// 		$_SESSION["loggedIn"] = 1;
			
	// 		header("Location: index.html");
	// 		exit();

	// 	} else {
	// 		alert('Invalid Credentials!');
	// 		echo "Please check your inputs!";
	// 	}
	// }	
?>      
