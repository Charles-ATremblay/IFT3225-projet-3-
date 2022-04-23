<?php
    if(!isset($_SESSION["username"]) || $_SESSION["username"] != "admin"){
        echo "You do not have the required access to see this page";
        header("Location: login.php");
    }
?>