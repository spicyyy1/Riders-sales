<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "register";

    $conn = mysqli_connect($server, $username, $password, $database);

    if(!$conn){
        return false;
    } else {
        return true;
    }
?>