<?php
require 'DatabaseConnection.php'; 
require 'LoginController.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $email = $_POST["username"];
        $password = $_POST["password"];
        
        $response = Login($conn, $email, $password);
        
        if ($response) {
            header("Location: index.php"); 
            exit; 
        } else {
            header("Location: Login.php?error=invalid_credentials");
            exit;
        }
    } else {
        header("Location: Login.php?error=missing_fields");
        exit;
    }
}
?>
