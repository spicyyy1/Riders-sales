<?php
require_once "DatabaseConnection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    $sql = "update reviews set firstname = '$firstname', lastname = '$lastname', email = '$email', review = '$review', rating = '$rating' where id = $id";

    if(!mysqli_query($conn, $sql)){
        echo " Error: " . mysqli_error($conn);
    } else {
        echo " Review u perditsua me sukses";
    } 
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM reviews WHERE id=$id");
    $row = $result->fetch_assoc();
}
?>
<form action="EditReviews.php" method="POST">
    <input type="hidden" name="id" value="<?= $row['ID'] ?>">
    Emri: <input type="text" name="firstname" value="<?= $row['Firstname'] ?>" required><br>
    Mbiemri: <input type="text" name="lastname" value="<?= $row['Lastname'] ?>" required><br>
    Email: <input type="email" name="email" value="<?= $row['Email'] ?>" required><br>
    Review: <input type="text" name="review" value="<?= $row['Review'] ?>" required><br>
    Rating: <select name="rating" id="rating" value="<?= $row['Rating'] ?>" required>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select><br>
    <button type="submit">Perditso Review</button>
</form>
<?php
$conn->close();
?>