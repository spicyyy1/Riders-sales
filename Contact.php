<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contactbody">
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
    <form class="feedbackform" method="post">
        <label for="firstname">Frist Name:</label>
        <input type="text" name="firstname" id="firstnameCon">
        <label id="firstNameMsgCon"></label><br>

        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" id="lastnameCon">
        <label id="lastNameMsgCon"></label><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="emailCon">
        <label id="emailMsgCon"></label><br>

        <label for="category">Category:</label>
        <select name="category" id="category">
            <option value="concern">Concern</option>
            <option value="praise">Praise</option>
            <option value="suggestion">Suggestion</option>
            <option value="dislike">Dislike</option>
            <option value="apply">Apply</option>
            <option value="other">Other...</option>
        </select><br>

        <label for="message">Message:</label>
        <input type="text" name="message" id="message">
        <label id="contactMsg"></label><br>

        <input type="submit" value="Submit" id="submitBtn"><br>
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
        let firstNameMsgCon = document.getElementById("firstNameMsgCon");
        let lastNameMsgCon = document.getElementById("lastNameMsgCon");
        let emailMsgCon = document.getElementById("emailMsgCon");
        let contactMsg = document.getElementById("contactMsg");
        let submitBtn = document.getElementById("submitBtn");

        function validateFirstNameCon(firstnameCon){
            const firstnameRegex = /^[A-Z][a-z]{1,15}$/;
            return firstnameRegex.test(firstnameCon);
        }

        function validateLastNameCon(lastnameCon){
            const lastnameRegex = /^[A-Z][a-z]{1,15}$/;
            return lastnameRegex.test(lastnameCon);
        }

        function validateEmailCon(emailCon){
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return emailRegex.test(emailCon);
        }

        submitBtn.addEventListener("click", function(event){
            event.preventDefault();

            let firstnameCon = document.getElementById("firstnameCon").value.trim();
            let lastnameCon = document.getElementById("lastnameCon").value.trim();
            let emailCon = document.getElementById("emailCon").value.trim();
            let message = document.getElementById("message").value.trim();

            firstNameMsgCon.textContent = "";
            lastNameMsgCon.textContent = "";
            emailMsgCon.textContent = "";

            if(!firstnameCon){
                firstNameMsgCon.style.color="red";
                firstNameMsgCon.style.fontStyle="italic";
                firstNameMsgCon.textContent="First name is required!";
            } else if (!validateFirstNameCon(firstnameCon)){
                firstNameMsgCon.style.color="red";
                firstNameMsgCon.style.fontStyle="italic";
                firstNameMsgCon.textContent="First name must start with capital letter!";
            }

            if(!lastnameCon){
                lastNameMsgCon.style.color="red";
                lastNameMsgCon.style.fontStyle="italic";
                lastNameMsgCon.textContent="First name is required!";
            } else if (!validateLastNameCon(lastnameCon)){
                lastNameMsgCon.style.color="red";
                lastNameMsgCon.style.fontStyle="italic";
                lastNameMsgCon.textContent="Last name must start with capital letter!";
            }

            if(!emailCon){
                emailMsgCon.style.color="red";
                emailMsgCon.style.fontStyle="italic";
                emailMsgCon.textContent="First name is required!";
            } else if (!validateEmailCon(emailCon)){
                emailMsgCon.style.color="red";
                emailMsgCon.style.fontStyle="italic";
                emailMsgCon.textContent="Email is in the wrong format!";
            }

            if(!message){
                contactMsg.style.color="red";
                contactMsg.style.fontStyle="italic";
                contactMsg.textContent="Message is required!";
            }

            if(validateFirstNameCon(firstnameCon) && validateLastNameCon(lastnameCon) && validateEmailCon(emailCon) && message){
                firstNameMsgCon.textContent="";
                lastNameMsgCon.textContent="";
                emailMsgCon.textContent="";
                contactMsg.textContent="";
                alert('Thank you for contacting us, we will get back to you as soon as possible');
                window.location="Contact.php";
            }
        });
    </script>
</body>
</html>