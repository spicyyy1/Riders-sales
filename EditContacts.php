<?php
require_once "DatabaseConnection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    $message = $_POST['message'];

    $sql = "update contacts set firstname = '$firstname', lastname = '$lastname', email = '$email', category = '$category', message = '$message' where id = $id";

    if(!mysqli_query($conn, $sql)){
        echo " Error: " . mysqli_error($conn);
    } else {
        echo " Kontakti u perditsua me sukses";
    } 
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM contacts WHERE id=$id");
    $row = $result->fetch_assoc();
}
?>
<form action="EditContacts.php" method="POST">
    <input type="hidden" name="id" value="<?= $row['ID'] ?>">
    Emri: <input type="text" name="firstname" value="<?= $row['Firstname'] ?>" required><br>
    Mbiemri: <input type="text" name="lastname" value="<?= $row['Lastname'] ?>" required><br>
    Email: <input type="email" name="email" value="<?= $row['Email'] ?>" required><br>
    Category: <select name="category" id="category" required>
                <option value="concern">Concern</option>
                <option value="praise">Praise</option>
                <option value="suggestion">Suggestion</option>
                <option value="dislike">Dislike</option>
                <option value="apply">Apply</option>
                <option value="other">Other...</option>
             </select><br>
    Message: <input type="text" name="message" id="message" required><br>
    <button type="submit">Perditso Kontaktin</button>
</form>
<?php
$conn->close();
?>