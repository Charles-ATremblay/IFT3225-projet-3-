<?php
    if(!isset($_SESSION["username"]) && $_SESSION["username"] != "admin"){
        alert("You do not have the required access to see this page");
        header("Location: login.php");
}
?>