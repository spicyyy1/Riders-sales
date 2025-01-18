<?php
require_once "DatabaseConnection.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

echo "<table border='1' style='width:100%; text-align:left;'>";
echo "<tr>
        <th>ID</th>
        <th>Emri</th>
        <th>Mbiemri</th>
        <th>Email</th>
        <th>Password</th>
        <th>Date of birth</th>
        <th>Gender</th>
      </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['ID']}</td>
            <td>{$row['Firstname']}</td>
            <td>{$row['Lastname']}</td>
            <td>{$row['Email']}</td>
            <td>{$row['Password']}</td>
            <td>{$row['Dateofbirth']}</td>
            <td>{$row['Gender']}</td>
            <td>
                <a href='DeleteUser.php?id={$row['ID']}'>Fshi</a> |
                <a href='EditUsers.php?id={$row['ID']}'>Përditëso</a>
            </td>
          </tr>";
}
echo "</table>";

$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);

echo "<table border='1' style='width:100%; text-align:left;'>";
echo "<tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Review</th>
        <th>Rating</th>
      </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['Firstname']}</td>
            <td>{$row['Lastname']}</td>
            <td>{$row['Email']}</td>
            <td>{$row['Review']}</td>
            <td>{$row['Rating']}</td>
            <td>
                <a href='DeleteReview.php?id={$row['ID']}'>Fshi</a> |
                <a href='EditReviews.php?id={$row['ID']}'>Përditëso</a>
            </td>
          </tr>";
}
echo "</table>";

$conn->close();
?>
