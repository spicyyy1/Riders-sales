<?php
require_once 'DatabaseConnection.php';

function Login($conn, $email, $password) {
    $sql = "SELECT email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION["username"] = $row['email'];
            return true;
        }
    }
    return false;
}
?>
