<?php

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (isset($_POST["username"]) && isset($_POST["password"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
    
    }
    echo("$username");
    echo("$password");

}
echo($username);
echo($pasword);
?>

