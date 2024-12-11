let firstNameMsg = document.getElementById("firstNameMsg");
let lastNameMsg = document.getElementById("lastNameMsg");
let emailMsg = document.getElementById("emailMsg");
let passwordMsg = document.getElementById("passwordMsg");
let dobMsg = document.getElementById("dobMsg");
let registerBtn = document.getElementById("registerBtn");

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

function validatePassword(password) {
    let passwordRegex = /^[A-Z][a-zA-Z0-9!@#$%^&*(),.?":{}|<>_+\-=]{7,19}$/;
    return passwordRegex.test(password);
}

function validateDob(dob){
    const dobRegex = /^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/;
    return dobRegex.test(dob);
}

registerBtn.addEventListener("click", function(event) {
    event.preventDefault();

    let firstname = document.getElementById("firstname").value.trim();
    let lastname = document.getElementById("lastname").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let dob = document.getElementById("dob").value.trim();

    firstNameMsg.textContent = "";
    lastNameMsg.textContent = "";
    emailMsg.textContent = "";
    passwordMsg.textContent = "";
    dobMsg.textContent = "";

    if(!firstname){
        firstNameMsg.style.color="red";
        firstNameMsg.style.fontStyle="italic";
        firstNameMsg.textContent="First name is required!";
    } else if (!validateFirstName(firstname)){
        firstNameMsg.style.color="red";
        firstNameMsg.style.fontStyle="italic";
        firstNameMsg.textContent="First name must start with capital letter!";
    } 

    if(!lastname){
        lastNameMsg.style.color="red";
        lastNameMsg.style.fontStyle="italic";
        lastNameMsg.textContent="Last name is required!";
    } else if (!validateLastName(lastname)){
        lastNameMsg.style.color="red";
        lastNameMsg.style.fontStyle="italic";
        lastNameMsg.textContent="Last name must start with capital letter!";
    }

    if(!email){
        emailMsg.style.color="red";
        emailMsg.style.fontStyle="italic";
        emailMsg.textContent="Email is required!";
    } else if (!validateEmail(email)){
        emailMsg.style.color="red";
        emailMsg.style.fontStyle="italic";
        emailMsg.textContent="Email is in the wrong format!";
    }

    if(!password){
        passwordMsg.style.color="red";
        passwordMsg.style.fontStyle="italic";
        passwordMsg.textContent="Password is required!";
    } else if (!validatePassword(password)){
        passwordMsg.style.color="red";
        passwordMsg.style.fontStyle="italic";
        passwordMsg.textContent="Password must start with capital letter!";
    }

    if(!dob){
        dobMsg.style.color="red";
        dobMsg.style.fontStyle="italic";
        dobMsg.textContent="Date of Birth is required!";
    } else if (!validateDob(dob)){
        dobMsg.style.color="red";
        dobMsg.style.fontStyle="italic";
        dobMsg.textContent="Date of birth is in the wrong format!";
    }

    if(validateFirstName(firstname) && validateLastName(lastname) && validateEmail(email) && validatePassword(password) && validateDob(dob)){
        firstNameMsg.textContent="";
        lastNameMsg.textContent="";
        emailMsg.textContent="";
        passwordMsg.textContent="";
        dobMsg.textContent="";
        window.location="index.html";
    }
});


function visibility(){
    const checkbox = document.getElementById('toggle');
    const services = document.getElementById('services');

    if(checkbox.checked){
        services.style.display='none';
    } else {
        services.style.display='block';
    }
}
