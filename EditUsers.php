<?php
require_once "DatabaseConnection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dateofbirth = $_POST['dateofbirth'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];

    $sql = "update users set firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password', dateofbirth = '$dateofbirth', gender = '$gender', role = '$role' where id = $id";

    if(!mysqli_query($conn, $sql)){
        echo " Error: " . mysqli_error($conn);
    } else {
        echo " Perdoruesi u perditsua me sukses";
    } 
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $row = $result->fetch_assoc();
}
?>
<form action="EditUsers.php" method="POST">
    <input type="hidden" name="id" value="<?= $row['ID'] ?>">
    Emri: <input type="text" name="firstname" value="<?= $row['Firstname'] ?>" required><br>
    Mbiemri: <input type="text" name="lastname" value="<?= $row['Lastname'] ?>" required><br>
    Email: <input type="email" name="email" value="<?= $row['Email'] ?>" required><br>
    Password: <input type="password" name="password" value="<?= $row['Password'] ?>" required><br>
    Date of birth: <input type="date" name="dateofbirth" value="<?= $row['Dateofbirth'] ?>" required><br>
    Gender: <select name="gender" id="gender" value="<?= $row['Gender'] ?>" required>
                <option value="M">M</option>
                <option value="F">F</option>
            </select><br>
    <select name="role" required>
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select><br>
    <button type="submit">Perditso Userin</button>
</form>
<?php
$conn->close();
?>