<?php
require_once 'DatabaseConnection.php';
require_once 'RegisterController.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["review"]) && !empty($_POST["rating"])){
        $user = [
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'dateofbirth' => $_POST['dateofbirth'],
            'gender' => $_POST['gender'],
        ];

        $response = Review($conn, $user);
    
    if($response){
        header("Location: index.php");
        exit;
    } 
} else {
    echo " Ploteso te gjitha fushat";
}
}
$conn->close();
?>