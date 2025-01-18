<?php
require 'DatabaseConnection.php';
require 'LoginController.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $response = Login($conn, $_POST["username"], $_POST["password"]);
        if ($response) {
            header("Location: index.php");
            echo "Login successfull";
            exit;
        } else {
            header("Location: Login.php");
            echo "Login failed";
            exit;
        }
    } else {
        echo "Please fill in all the fields.";
    }
}
?>
