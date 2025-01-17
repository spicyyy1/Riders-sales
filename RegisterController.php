<?php
require_once 'DatabaseConnection.php';

    function Register($conn, $user){
        $firstname = $user['firstname'];
        $lastname = $user['lastname'];
        $email = $user['email'];
        $password = $user['password'];
        $dateofbirth = $user['dateofbirth'];
        $gender = $user['gender'];

        $sql = "insert into users (firstname, lastname, email, password, dateofbirth, gender) values ('$firstname', '$lastname', '$email', '$password', '$dateofbirth', '$gender')";

        if(mysqli_query($conn, $sql)){
            return true;
        } else {
            return false;
        }
    }
?>