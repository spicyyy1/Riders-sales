<?php
require '../../config/DatabaseConnection.php';
require '../controllers/LoginController.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $response = Login($conn, $_POST["username"], $_POST["password"]);
        if ($response) {
            header("Location: index.php");
            exit;
        } else {
            header("Location: Login.php");
            exit;
        }
    } else {
        echo "Please fill in all the fields.";
    }
}

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
