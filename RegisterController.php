<?php
require_once 'DatabaseConnection.php';

function Register($conn, $user){
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
    $email = $user['email'];
    $password = $user['password']; 
    $dateofbirth = $user['dateofbirth'];
    $gender = $user['gender'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (firstname, lastname, email, password, dateofbirth, gender) 
            VALUES ('$firstname', '$lastname', '$email', '$hashedPassword', '$dateofbirth', '$gender')";

    if(mysqli_query($conn, $sql)){
        return true;
    } else {
        return false;
    }
}
?>
