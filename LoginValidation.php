<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'DatabaseConnection.php';
require_once 'LoginController.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $email = trim($_POST["username"]);
        $password = trim($_POST["password"]);
        
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
