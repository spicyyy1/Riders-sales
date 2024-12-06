let firstNameMsg = document.getElementById("firstNameMsg");
let lastNameMsg = document.getElementById("lastNameMsg");
let emailMsg = document.getElementById("emailMsg");
let passwordMsg = document.getElementById("passwordMsg");
let dobMsg = document.getElementById("dobMsg");
let registerButton = document.getElementById("registerBtn");

let firstnameRegex = /^[A-Z][a-z]{15}$/;
let lastnameRegex = /^[A-Z][a-z]{15}$/;
let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
let passwordRegex = /^[A-Z][a-zA-Z0-9!@#$%^&*(),.?":{}|<>_+\-=]{7,19}$/;
let dobRegex = /^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/;

const validateFirstName = (firstname) => {
    return firstnameRegex.test(firstname);
}
const validateLastName = (lastname) => {
    return lastnameRegex.test(lastname);
}
const validateEmail = (email) => {
    return emailRegex.test(email);
}
const validatePassword = (password) => {
    return passwordRegex.test(password);
}
const validateDob = (dateofbirth) => {
    return dobRegex.test(dateofbirth);
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
        firstNameMsg.textContent="First Name is required!";
    } else if(validateFirstName(firstname)){
        firstNameMsg.style.color="green";
        firstNameMsg.style.fontStyle="italic";
        firstNameMsg.textContent="Wrong!";
    }  else if (!validateFirstName(firstname)){
        firstNameMsg.style.color="blue";
        firstNameMsg.style.fontStyle="italic";
        firstNameMsg.textContent="Right!";
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

    if(validateFirstName(firstname) && validateLastName(lastname) && validateEmail(email) && validateDob(dateofbirth) && validatePassword(password)){
        firstNameMsg.textContent="";
        lastNameMsg.textContent="";
        emailMsg.textContent="";
        passwordMsg.textContent="";
        dobMsg.textContent="";
        window.location="index.html";
    }
});