<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="reviewbody">
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
        <form action="ReviewValidation.php" class="feedbackform" method="post">
            <label for="firstname">Frist Name:</label>
            <input type="text" name="firstname" id="firstnameAbt">
            <label id="firstNameMsgAbt"></label>

            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" id="lastnameAbt">
            <label id="lastNameMsgAbt"></label>

            <label for="email">Email:</label>
            <input type="email" name="email" id="emailAbt">
            <label id="emailMsgAbt"></label>

            <label for="review">Review:</label>
            <input type="text" name="review" id="reviewAbt">
            <label id="reviewMsgAbt"></label>

            <label for="rating">Rating:</label>
            <select name="rating" id="rating">
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select><br>

            <input type="submit" value="Submit" id="submitBtn">
        </form>
    </div>

    <footer>
        <div class="container-footer">
            <p>&copy; 2024 Riders Showroom. All rights reserved.</p>
            <p>Follow us on <a herf="#">Social Media</a></p>
        </div>
    </footer>
    </div>
    <script>
        let firstNameMsgAbt = document.getElementById("firstNameMsgAbt");
        let lastNameMsgAbt = document.getElementById("lastNameMsgAbt");
        let emailMsgAbt = document.getElementById("emailMsgAbt");
        let reviewMsgAbt = document.getElementById("reviewMsgAbt");
        let submitBtn = document.getElementById("submitBtn");

        function validateFirstName(firstname){
            const firstnameRegex = /^[A-Z][a-z]{1,15}$/;
            return firstnameRegex.test(firstname);
        }

        function validateLastName(lastname){
            const lastnameRegex = /^[A-Z][a-z]{1,15}$/;
            return lastnameRegex.test(lastname);
        }

        function validateEmail(email){
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return emailRegex.test(email);
        }

        submitBtn.addEventListener("click", function (event) {
            let firstnameAbt = document.getElementById("firstnameAbt").value.trim();
            let lastnameAbt = document.getElementById("lastnameAbt").value.trim();
            let emailAbt = document.getElementById("emailAbt").value.trim();
            let reviewAbt = document.getElementById("reviewAbt").value.trim();

            let valid = true;

            firstNameMsgAbt.textContent = "";
            lastNameMsgAbt.textContent = "";
            emailMsgAbt.textContent = "";
            reviewMsgAbt.textContent = "";

            if (!firstnameAbt || !validateFirstName(firstnameAbt)) {
                firstNameMsgAbt.textContent = "Invalid first name!";
                valid = false;
            }

            if (!lastnameAbt || !validateLastName(lastnameAbt)) {
                lastNameMsgAbt.textContent = "Invalid last name!";
                valid = false;
            }

            if (!emailAbt || !validateEmail(emailAbt)) {
                emailMsgAbt.textContent = "Invalid email!";
                valid = false;
            }

            if (!reviewAbt) {
                reviewMsgAbt.textContent = "Review is required!";
                valid = false;
            }

            if (!valid) event.preventDefault();
        });

    </script>
</body>
</html>