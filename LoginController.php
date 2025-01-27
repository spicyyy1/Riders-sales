<?php
session_start();

function Login($conn, $email, $password) {
    $sql = "SELECT * FROM users WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        echo "Error preparing the statement: " . $conn->error;
        return false;
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    echo "Rows returned: " . $result->num_rows . "<br>"; 
    
    if ($result->num_rows == 0) {
        echo "No user found with this email: " . $email . "<br>";
    }

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc(); 

        echo "<pre>";
        print_r($user); 
        echo "</pre>";

        if (password_verify($password, $user['Password'])) {
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['user_name'] = $user['Firstname'] . ' ' . $user['Lastname'];
            $_SESSION['user_email'] = $user['Email'];
            $_SESSION['user_role'] = $user['Role'];

            return true; 
        } else {
            echo "Invalid password.<br>";
        }
    } else {
        echo "User not found or multiple users with the same email found.<br>";
    }

    return false; 
}
?>
