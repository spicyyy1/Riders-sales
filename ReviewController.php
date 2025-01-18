<?php
require_once 'DatabaseConnection.php';

function Review($conn, $user){
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
    $email = $user['email'];
    $review = $user['review'];
    $rating = $user['rating'];

    $sql = "insert into users (firstname, lastname, email, review, rating) values ('$firstname', '$lastname', '$email', '$review', '$rating')";

    if(!mysqli_query($conn, $sql)){
        echo "Error: " . mysqli_error($conn);
        return false;
    } else {
        echo "Review u shtua me sukses";
        return true;
    }
}
?>