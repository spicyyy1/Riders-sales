<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="loginbody">
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
        <button onclick="window.location='logout.php'">Logout</button>
    </div>
    <div>
        <form action="LoginValidation.php" class="login" method="post">
            <label for="username">Email</label>
            <input type="email" name="username" id="username">
            <label id="usernameMsg"></label><br>

            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <label id="passwordMsg"></label><br>

            <input type="submit" value="Login" id="loginBtn">
        </form>
        <div class="adminBtn">
            <button onclick="window.location='AdminDashboard.php'">Admin</button>
        </div>
        <script>
            let usernameMsg = document.getElementById("usernameMsg");
            let passwordMsg = document.getElementById("passwordMsg");
            let loginBtn = document.getElementById("loginBtn");

            function validateEmail(username) {
                const usernameRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                return usernameRegex.test(username);
            }
            
            function validatePassword(password) {
                let passwordRegex = /^[A-Z][a-zA-Z0-9!@#$%^&*(),.?":{}|<>_+\-=]{7,19}$/;
                return passwordRegex.test(password);
            }

            loginBtn.addEventListener("click", function (event) {
            let username = document.getElementById("username").value.trim();
            let password = document.getElementById("password").value.trim();

            usernameMsg.textContent = "";
            passwordMsg.textContent = "";

            if (!username) {
                usernameMsg.style.color = "red";
                usernameMsg.style.fontStyle = "italic";
                usernameMsg.textContent = "Email is required!";
                event.preventDefault();
            } else if (!validateEmail(username)) {
                usernameMsg.style.color = "red";
                usernameMsg.style.fontStyle = "italic";
                usernameMsg.textContent = "Email is in the wrong format!";
                event.preventDefault();
            }

            if (!password) {
                passwordMsg.style.color = "red";
                passwordMsg.style.fontStyle = "italic";
                passwordMsg.textContent = "Password is required!";
                event.preventDefault();
            } else if (!validatePassword(password)) {
                passwordMsg.style.color = "red";
                passwordMsg.style.fontStyle = "italic";
                passwordMsg.textContent = "Password is in the wrong format!";
                event.preventDefault();
            }
        });

        </script>
    </div>
    <footer>
        <div>
            <div class="container-footer-login">
                <p>&copy; 2024 Riders Showroom. All rights reserved.</p>
                <p>Follow us on <a herf="#">Social Media</a></p>
            </div>
        </div>
    </footer>
</body>
</html>