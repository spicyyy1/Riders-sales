<?php
function Login($conn, $email, $password) {
    $sql = "SELECT email FROM users WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_row();

        session_start();
        $_SESSION["username"] = $row[0];
        return true;
    }
    return false;
}
?>