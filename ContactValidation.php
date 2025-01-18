<?php
require_once 'DatabaseConnection.php';
require_once 'ContactController.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["category"]) && !empty($_POST["message"])){
        $user = [
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'email' => $_POST['email'],
            'category' => $_POST['category'],
            'message' => $_POST['message'],
        ];

        $response = Contact($conn, $user);
    
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