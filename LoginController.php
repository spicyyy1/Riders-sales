<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function regenerate_session_id(){
    session_regenerate_id(true);
}

function Login($conn, $email, $password) {
    $email = trim($email);
    $password = trim($password);

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return false;
    }

    $sql = "SELECT * FROM users WHERE Email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['Password'])) {
                regenerate_session_id();
                $_SESSION['user_id'] = $user['ID'];
                $_SESSION['user_name'] = $user['Firstname'] . ' ' . $user['Lastname'];
                $_SESSION['user_email'] = $user['Email'];
                $_SESSION['user_role'] = $user['Role'];
                $_SESSION['session_id'] = session_id();
                $_SESSION['last_activity'] = time();

                header("Location: index.php");
                exit;
            } else {
                return false;
            }
        }
    }
    return false;
}
 
function check_session_timeout() {
    $timeout_duration = 2000;
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout_duration)) {
        logout();
    }
    $_SESSION['last_activity'] = time();
}

function confirm_sessions() {
    echo "Session ID: " . session_id();
    echo " | User ID: " . (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'No user logged in');
}

function logout() {
    session_unset();
    session_destroy();
    header("Loaction: login.php");
    exit;
}

check_session_timeout();
confirm_sessions();
?>