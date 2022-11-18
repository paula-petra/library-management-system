let form = document.getElementById('signup-form');
let firstName = document.getElementById('firstName');
let lastName = document.getElementById('lastName');
let phoneNum = document.getElementById('phoneNo');
let email = document.getElementById('email');
let password = document.getElementById('password');
let confirmPswd = document.getElementById('confirm-password');

let firstnameValue;
let lastnameValue;
let phonenumValue;
let emailValue;
let passwordValue;
let confirmpswdValue;

function checkInputs() {

    //get the values from the inputs
    firstnameValue = firstName.value.trim();
    lastnameValue = lastName.value.trim();
    phonenumValue = phoneNum.value.trim();
    emailValue = email.value.trim();
    passwordValue = password.value.trim();
    confirmpswdValue = confirmPswd.value.trim();

    if(firstnameValue === '') {
        // show error
        // add error class
        setErrorFor(firstName, 'First Name cannot be blank!');
        return;
    } else {
        //add success class
        setSuccessFor(firstName);
    }

    if(lastnameValue === '') {
        // show error
        // add error class
        setErrorFor(lastName, 'Last Name cannot be blank!');
        return;
    } else {
        //add success class
        setSuccessFor(lastName);
    }

    if(phonenumValue === '') {
        // show error
        // add error class
        setErrorFor(phoneNum, 'Phone Number cannot be blank!');
        return;
    } else {
        if (phonenumValue.length < 10 || phonenumValue.length > 12) {
            setErrorFor(phoneNum, 'Invalid Phone Number!');
            return;
        } else {
            if (phonenumValue.match(/^[0-9]{10}$/) || phonenumValue.match(/^[0-9]{11}$/) || phonenumValue.match(/^[0-9]{12}$/)) {
                //add success class
                setSuccessFor(phoneNum);
            } else {
                setErrorFor(phoneNum, 'Enter Numerical Digits Only!');
                return;
            }
        }
    }

    if(emailValue === '') {
        // show error
        // add error class
        setErrorFor(email, 'E-mail cannot be blank!');
        return;
    } else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Invalid e-mail!');
        return;
	} else {
		setSuccessFor(email);
	}

    if(passwordValue === '') {
        // show error
        // add error class
        setErrorFor(password, 'Password cannot be blank!');
        return;
    } else {
        //add success class
        setSuccessFor(password);
    }

    if(confirmpswdValue === '') {
        // show error
        // add error class
        setErrorFor(confirmPswd, 'Password cannot be blank!');
        return;
    } 
    
     if (confirmpswdValue !== passwordValue) {
        setErrorFor(confirmPswd, "Passwords don't match!");
        return;
    } else{
        //add success class
        setSuccessFor(confirmPswd);
    }

    submitSignUp();
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

    var form = document.getElementById('signup-form');
    function handleForm(event) {event.preventDefault();}
    form.addEventListener('submit', handleForm);

    $.ajax({
        url: "./connect.php",
        type: "POST",
        cache: false,
        data:{firstName:firstnameValue, lastName:lastnameValue, phoneNo:phonenumValue, email:emailValue, password:passwordValue },
        success: function (response)
        {
            console.log(response); 
            if(response == "success"){
                 swal({
                  title: "success",
                  text: "Sign Up Successful!",
                  buttons: true
                });
            
            }else if (response == "failed"){
                swal({
                  title: "failed",
                  text: "Sign Up Failed!",
                  buttons: true
                });
            }else{
                swal({
                    title: "failed",
                    text: "Email Already In Use!",
                    buttons: true
                  });
            }
            
            
           
        }
    
    });
}

$('.menu-icon').click(function(){
    $('.side-nav').toggleClass('show');
    $('#open-nav').toggleClass('hide');
    $('#close-btn').toggleClass('show');
});

// $('.menu-container ul li').click(function(){
//     $(this).addClass('active').siblings().removeClass('active');
// });