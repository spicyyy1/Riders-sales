<?php
require_once "DatabaseConnection.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "delete from contacts where id = $id";

    if(!mysqli_query($conn, $sql)){
        echo " Error: " . mysqli_error($conn);
    } else {
        echo " Kontakti u fshi me sukses";
    }
}

$conn->close();
?>