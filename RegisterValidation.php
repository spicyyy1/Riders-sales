<?php
require_once 'DatabaseConnection.php';
require_once 'RegisterController.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["dateofbirth"]) && !empty($_POST["gender"])){
        $user = [
            "firstname" => $_POST["firstname"],
            "lastname" => $_POST["lastname"],
            "email" => $_POST["email"],
            "password" => $_POST["password"],
            "dateofbirth" => $_POST["dateofbirth"],
            "gender" => $_POST["gender"],
        ];

        Register($conn, $user);
    } else {
        echo "Ploteso te gjitha fushat";
    }
}
?>