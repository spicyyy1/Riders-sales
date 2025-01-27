<?php
session_start();

function Login($conn, $email, $password) {
    $sql = "SELECT * FROM users WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        return false;
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        return false;
    }

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc(); 

        if (password_verify($password, $user['Password'])) {
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['user_name'] = $user['Firstname'] . ' ' . $user['Lastname'];
            $_SESSION['user_email'] = $user['Email'];
            $_SESSION['user_role'] = $user['Role'];

            return true; 
        } else {
            return false; 
        }
    }

    return false; 
}

require 'DatabaseConnection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $email = $_POST["username"];
        $password = $_POST["password"];

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
