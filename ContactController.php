<?php
require_once 'DatabaseConnection.php';

function Contact($conn, $user){
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
    $email = $user['email'];
    $category = $user['category'];
    $message = $user['message'];

    $sql = "insert into contacts (firstname, lastname, email, category, message) values ('$firstname', '$lastname', '$email', '$category', '$message')";

    if(!mysqli_query($conn, $sql)){
        echo "Error: " . mysqli_error($conn);
        return false;
    } else {
        echo "Kontakti u shtua me sukses";
        return true;
    }
}
?>