<?php

function Login($conn, $email, $password){
    $sql = "select email from users where email = '$email' and password = '$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_row($result);
        
        session_start();
        $_SESSION["username"] = $row[0];
        header("Location: index.php");
        exit;
    }else{
        echo "Error: ". mysqli_error($conn);
        header("Location: Login.php");
        exit;
    }
}

?>