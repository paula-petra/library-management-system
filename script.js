// var form = document.getElementById('signup-form');
// function handleForm(event) {event.preventDefault();}
// form.addEventListener('submit', handleForm);

//let signupBtn = document.getElementById('signup-submit');

//Checking Password Match
// function checkPassword(){
//     let password = document.getElementById('password').value;
//     let confirmPassword = document.getElementById('confirm-password').value;
//     console.log(password, confirmPassword);
//     let passwordMsg = document.getElementById('password-msg');
    
//     if (password.length != 0){
//         if(password == confirmPassword){
//             passwordMsg.textContent = "Passwords Match!";
//             passwordMsg.style.backgroundColor = "#41c45d";
//         } else{
//             passwordMsg.textContent = "Passwords Don't Match!";
//             passwordMsg.style.backgroundColor = "#e8021d";
//         }
//     }
// }

let form = document.getElementById('signup-form');
let firstName = document.getElementById('firstName');
let lastName = document.getElementById('lastName');
let phoneNum = document.getElementById('phoneNo');
let email = document.getElementById('email');
let password = document.getElementById('password');
let confirmPswd = document.getElementById('confirm-password');

function checkInputs() {
    //get the values from the inputs
    let firstnameValue = firstName.value.trim();
    let lastnameValue = lastName.value.trim();
    let phonenumValue = phoneNum.value.trim();
    let emailValue = email.value.trim();
    let passwordValue = password.value.trim();
    let confirmpswdValue = confirmPswd.value.trim();

    if(firstnameValue === '') {
        // show error
        // add error class
        setErrorFor(firstName, 'First Name cannot be blank!');
    } else {
        //add success class
        setSuccessFor(firstName);
    }

    if(lastnameValue === '') {
        // show error
        // add error class
        setErrorFor(lastName, 'Last Name cannot be blank!');
    } else {
        //add success class
        setSuccessFor(lastName);
    }

    if(phonenumValue === '') {
        // show error
        // add error class
        setErrorFor(phoneNum, 'Phone Number cannot be blank!');
    } else {
        if (phonenumValue.length < 10 || phonenumValue.length > 12) {
            setErrorFor(phoneNum, 'Invalid Phone Number!');
        } else {
            if (phonenumValue.match(/^[0-9]{10}$/) || phonenumValue.match(/^[0-9]{11}$/) || phonenumValue.match(/^[0-9]{12}$/)) {
                //add success class
                setSuccessFor(phoneNum);
            } else {
                setErrorFor(phoneNum, 'Enter Numerical Digits Only!');

            }
        }
    }

    if(emailValue === '') {
        // show error
        // add error class
        setErrorFor(email, 'E-mail cannot be blank!');
    } else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Invalid e-mail!');
	} else {
		setSuccessFor(email);
	}

    if(passwordValue === '') {
        // show error
        // add error class
        setErrorFor(password, 'Password cannot be blank!');
    } else {
        //add success class
        setSuccessFor(password);
    }

    if(confirmpswdValue === '') {
        // show error
        // add error class
        setErrorFor(confirmPswd, 'Password cannot be blank!');
    } else if (confirmpswdValue !== passwordValue) {
        setErrorFor(confirmPswd, "Passwords don't match!");
    } else{
        //add success class
        setSuccessFor(confirmPswd);
    }
};

function setErrorFor(input, message) {
    let formControl = input.parentElement;
    let small = formControl.querySelector('small');

    //add error message inside small
    small.innerText = message;

    //add error class
    formControl.className ='form-control error';
};

function setSuccessFor(input) {
    let formControl = input.parentElement;
    formControl.className = 'form-control success';
};

function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function submitSignUp(){
    if(firstName.parentElement.className === 'form-control success' && lastName.parentElement.className === 'form-control success' && phoneNum.parentElement.className === 'form-control success' && email.parentElement.className === 'form-control success' && password.parentElement.className === 'form-control success' && confirmPswd.parentElement.className === 'form-control success') {
        alert('SIGN UP SUCCESSFUL!');
    }
}