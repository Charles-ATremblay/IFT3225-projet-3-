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
			
			echo "Please check your inputs!";
		}
	}	
?>      
<html>
<body>            
	<form action="login.php" method="post">
	<!-- Email input -->
	<div class="form-outline mb-4">
		<input type="text" id="username" class="form-control" />
		<label class="form-label" for="username">Username</label>
	</div>

	<!-- Password input -->
	<div class="form-outline mb-4">
		<input type="password" id="password" class="form-control" />
		<label class="form-label" for="password">Password</label>
	</div>

	<!-- Submit button -->
	<button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>

	</form>
</html>