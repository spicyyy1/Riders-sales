<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="registerbody">
    <div class="header">
        <a href="index.php">
            <img src="Screenshot_2024-12-04_193852-removebg-preview.png" alt="Logo" height="60vh" width="100%">
        </a>
        <h3>For car enthusiasts, by car enthusiasts...</h3>
    </div>
    <div class="navigation">
        <button onclick="window.location='Explore.php'">Explore</button>
        <button onclick="window.location='Contact.php'">Contact Us</button>
        <button onclick="window.location='About.php'">About Us</button>
        <button onclick="window.location='Register.php'">Register</button>
        <button onclick="window.location='Login.php'">Login</button>
    </div>
    <div>
        <form action="RegisterValidation.php" class="register" method="POST">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname">
            <label id="firstNameMsg"></label><br>

            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname">
            <label id="lastNameMsg"></label><br>

            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <label id="emailMsg"></label><br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <label id="passwordMsg"></label><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" name="Date of Birth" id="dob">
            <label id="dobMsg"></label><br>

            <label for="Gender">Gender:</label>
            <select name="Gender" id="gender">
                <option value="M">M</option>
                <option value="F">F</option>
            </select><br>
            <input type="submit" value="Register" id="registerBtn">
        </form>
    </div>
    <footer>
        <div class="container-footer">
            <p>&copy; 2024 Riders Showroom. All rights reserved.</p>
            <p>Follow us on <a herf="#">Social Media</a></p>
        </div>
    </footer>
    </div>
    <script src="jscript.js"></script>
</body>
</html>