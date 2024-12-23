<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "testdb";

        $conn = mysqli_connect($servername, $username, $password, $db);

        if(!$conn){
            die("Error: " . mysqli_connect_error());
        } else {
            echo("Database is connected");
        }

        $stmt = "insert into Users (UserID) values (1)";

        $result = mysqli_query($conn, $stmt);
    ?>