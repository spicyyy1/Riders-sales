<?php
require_once "DatabaseConnection.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "delete from reviews where id = $id";

    if(!mysqli_query($conn, $sql)){
        echo " Error: " . mysqli_error($conn);
    } else {
        echo " Review u fshi me sukses";
    }
}

$conn->close();
?>