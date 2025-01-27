<?php
require_once "DatabaseConnection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add_user"])) {
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $dateofbirth = $_POST["dateofbirth"];
    $gender = $_POST["gender"];
    $role = $_POST["role"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if (empty($firstname) || empty($lastname) || empty($email) || empty($hashedPassword) || empty($role)) {
        echo "Të gjitha fushat janë të detyrueshme!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email-i nuk është i vlefshëm!";
    } elseif (!in_array($role, ['admin', 'user'])) {
        echo "Roli duhet të jetë 'admin' ose 'user'.";
    } else {
        $sql = "INSERT INTO users (Firstname, Lastname, Email, Password, Dateofbirth, Gender, Role) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sssssss", $firstname, $lastname, $email, $hashedPassword, $dateofbirth, $gender, $role);

        if ($stmt->execute()) {
            header("Location: " . $_SERVER['PHP_SELF']); 
            exit();
        } else {
            echo "Ka ndodhur një gabim: " . $stmt->error;
        }

        $stmt->close();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add_review"])) {
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $review = trim($_POST["review"]);
    $rating = $_POST["rating"];

    if (empty($firstname) || empty($lastname) || empty($email) || empty($review) || empty($rating)) {
        echo "Të gjitha fushat janë të detyrueshme!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email-i nuk është i vlefshëm!";
    } else {
        $sql = "INSERT INTO reviews (Firstname, Lastname, Email, Review, Rating) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $firstname, $lastname, $email, $review, $rating);

        if ($stmt->execute()) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Ka ndodhur një gabim: " . $stmt->error;
        }

        $stmt->close();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add_contact"])) {
    $firstname = trim($_POST["firstname"]);
    $lastname = trim($_POST["lastname"]);
    $email = trim($_POST["email"]);
    $category = $_POST["category"];
    $message = trim($_POST["message"]);

    if (empty($firstname) || empty($lastname) || empty($email) || empty($category) || empty($message)) {
        echo "Të gjitha fushat janë të detyrueshme!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email-i nuk është i vlefshëm!";
    } else {
        $sql = "INSERT INTO contacts (Firstname, Lastname, Email, Category, Message) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $firstname, $lastname, $email, $category, $message);

        if ($stmt->execute()) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Ka ndodhur një gabim: " . $stmt->error;
        }

        $stmt->close();
    }
}

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
        <th>Role</th>
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
            <td>{$row['Role']}</td>
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
<form method="POST" action="">
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
</form><br>

<h2>Shto Review</h2>
<form method="POST" action="">
    <input type="text" name="firstname" placeholder="Emri" required>
    <input type="text" name="lastname" placeholder="Mbiemri" required>
    <input type="email" name="email" placeholder="Email-i" required>
    <textarea name="review" placeholder="Review" required></textarea>
    <select name="rating" required>
        <option value="5">5</option>
        <option value="4">4</option>
        <option value="3">3</option>
        <option value="2">2</option>
        <option value="1">1</option>
    </select>
    <button type="submit" name="add_review">Shto Review</button>
</form><br>

<h2>Shto Contact</h2>
<form method="POST" action="">
    <input type="text" name="firstname" placeholder="Emri" required>
    <input type="text" name="lastname" placeholder="Mbiemri" required>
    <input type="email" name="email" placeholder="Email-i" required>
    <select name="category" required>
        <option value="concern">Concern</option>
        <option value="praise">Praise</option>
        <option value="suggestion">Suggestion</option>
        <option value="dislike">Dislike</option>
        <option value="apply">Apply</option>
        <option value="other">Other...</option>
    </select>
    <textarea name="message" placeholder="Message" required></textarea>
    <button type="submit" name="add_contact">Shto Kontaktin</button>
</form>
