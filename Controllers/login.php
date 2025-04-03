<?php

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    if (isset($_POST["username"]) && isset($_POST["password"])){
        $username = $_POST["username"];
        $pasword = $_POST["password"];
    
    }
    var_dump($username);
    var_dump($pasword);

}
var_dump($username);
var_dump($pasword);
?>
