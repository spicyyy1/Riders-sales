<?php
require_once "DatabaseConnection.php";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

echo "<table border='1' style='width:100%; text-align:left;'>";
echo "<h2>Users</h2>
      <tr>
        <th>ID</th>
        <th>Emri</th>
        <th>Mbiemri</th>
        <th>Email</th>
        <th>Password</th>
        <th>Date of birth</th>
        <th>Gender</th>
        <th>Options</th>
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
echo "</table><br>";

$sql = "SELECT * FROM reviews";
$result = $conn->query($sql);

echo "<table border='1' style='width:100%; text-align:left;'>";
echo "<h2>Reviews</h2>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Review</th>
        <th>Rating</th>
        <th>Options</th>
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
echo "</table><br>";

$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

echo "<table border='1' style='width:100%; text-align:left;'>";
echo "<h2>Contacts</h2>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Category</th>
        <th>Message</th>
        <th>Options</th>
      </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['Firstname']}</td>
            <td>{$row['Lastname']}</td>
            <td>{$row['Email']}</td>
            <td>{$row['Category']}</td>
            <td>{$row['Message']}</td>
            <td>
                <a href='DeleteContact.php?id={$row['ID']}'>Fshi</a> |
                <a href='EditContacts.php?id={$row['ID']}'>Përditëso</a>
            </td>
          </tr>";
}
echo "</table>";

$conn->close();

function addUser($name, $email, $role) {
  global $conn;
  $sql = "INSERT INTO users (name, email, role) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $name, $email, $role);

  if (empty($name) || empty($email) || empty($role)) {
      echo "Emri, email-i dhe roli nuk mund të jenë bosh.";
      return;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Email-i nuk është i vlefshëm.";
      return;
  }

  if (!in_array($role, ['admin', 'user'])) {
      echo "Roli duhet të jetë 'admin' ose 'user'.";
      return;
  }

  if ($stmt->execute()) {
      echo "Përdoruesi u shtua me sukses!";
  } else {
      echo "Ka ndodhur një gabim: " . $stmt->error;
  }
  $stmt->close();
}
?>

<h2>Shto Përdorues</h2>
<form method="POST" action="Shfaq.php">
    <input type="text" name="firstname" placeholder="Emri" required>
    <input type="text" name="lastname" placeholder="Mbiemri" required>
    <input type="email" name="email" placeholder="Email-i" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="date" name="dateofbirth" placeholder="Date of birth" required>
    <select name="gender" id="gender" required>
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
    <select name="role" required>
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
    <button type="submit" name="add_user">Shto Përdorues</button>
</form>
