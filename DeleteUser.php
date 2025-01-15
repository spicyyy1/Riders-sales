<?php
require_once "DatabaseConnection.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "delete from users where id = $id";

    if(!mysqli_query($conn, $sql)){
        echo " Error: " . mysqli_error($conn);
    } else {
        echo " Perdoruesi u fshi me sukses";
    }
}

$conn->close();
?>