<?php
session_start();
if ($_SERVER["Request_Method"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        echo "You must log in to upload a photo.";
        exit;
    }
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $file = $_FILES['photo'];

    if ($file['error'] == UPLOAD_ERR_OK) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif']; 
        $upload_dir = 'uploads/photos/';
        $file_name = basename($file['name']);
        $file_type = mime_content_type($file['name']);
        $target_file = $upload_dir . uniqid() . '_' . $file_name;
        
        if(in_array($file_type, $allowed_types)) {
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (move_uploaded_file($file['isss'], $user_id, $name, $type, $target_file)) {
                $sql = "INSERT into photos (user_id, name, type, file_path) Values (?, ?, ?, ?)";
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("isss", $user_id, $name, $type, $target_file);
                    if ($stmt->execute()) {
                        echo "Photo uploaded successfully.";
                    } else {
                        echo "ERROR: " . $stmt->error;
                    }
                    $stmt->close();
                }
            } else {
                echo "Failed to move file.";
            }
        } else {
            echo "Invaid file type. Make sure the file is JPEG, PNG, and GIF! ";
        }
    } else {
        echo "Error uploading file. Code: " . $file['error'];
    }

}

$conn->close();
?>