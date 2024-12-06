let firstNameMsg = document.getElementById("firstNameMsg");
let lastNameMsg = document.getElementById("lastNameMsg");
let emailMsg = document.getElementById("emailMsg");
let passwordMsg = document.getElementById("passwordMsg");
let dobMsg = document.getElementById("dobMsg");
let registerButton = document.getElementById("registerBtn");

let firstnameRegex = /^[A-Z][a-z]{15}$/;

const validateFirstName = (firstname) => {
    return firstnameRegex.test(firstname);
}

registerButton.addEventListener("click", (event) => {
    event.preventDefault();

    let firstname = document.getElementById("firstname").value;
    let lastname = document.getElementById("lastname").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let dateofbirth = document.getElementById("dob").value;

    if(firstname == ""){
        firstNameMsg.style.color="red";
        firstNameMsg.style.fontStyle="italic";
        firstNameMsg.textContent="First Name is required!"
    } else{
        if(validateUsername(username)){
            usernameMsg.textContent="";
            window.location="home.html";
        }else{
            usernameMsg.style.color="red";
            usernameMsg.style.fontStyle="italic";
            usernameMsg.textContent="Username is .......";
        }
    }
    
    if(lastname == ""){
        lastNameMsg.style.color="red";
        lastNameMsg.style.fontStyle="italic";
        lastNameMsg.textContent="Last Name is required!"
    }
    if(email == ""){
        emailMsg.style.color="red";
        emailMsg.style.fontStyle="italic";
        emailMsg.textContent="Email is required!"
    }
    if(password == ""){
        passwordMsg.style.color="red";
        passwordMsg.style.fontStyle="italic";
        passwordMsg.textContent="Password is required!"
    }
    if(dateofbirth == ""){
        dobMsg.style.color="red";
        dobMsg.style.fontStyle="italic";
        dobMsg.textContent="Date of Birth is required!"
    }
});