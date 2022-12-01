<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'librarymanagementsystem');

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Members - Library Management System</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="dashboard-body">

            <header class="page-header">

                <nav class="nav-bar" id="main-nav">

                    <div class="div1">
                        <a class="menu-icon" id="open-nav"><img src="imgs/icons8-menu-30.png" alt=""></a>
                        <a class="menu-icon" id="close-btn"><img src="imgs/icons8-close-ios-16-filled-32.png" alt=""></a>
                        <a href="index.html" class="page-title">LIBRARY MANAGEMENT SYSTEM</a>
                    </div>

                    <div>
                        <ul class="main-nav-list">
                            <li class="nav-user" id="nav-admin"><a href="logout.php">LOG OUT</a></li>
                        </ul>
                    </div>
                </nav>
            </header>

            <nav class="side-nav" id="menu">
                <div class="menu-container">
                    <ul>
                        <li><a href="admin.php">Dashboard</a></li>
                        <li><a href="members.php">Members</a></li>
                        <li><a href="">Users</a></li>
                        <li><a href="">Books</a></li>
                        <li><a href="">Reserved Books</a></li>
                        <li><a href="">Issued Books</a></li>
                        <li><a href="">Not Returned</a></li>
                        <li><a href="">Profile</a></li>
                    </ul>
                </div>
            </nav>

            <main class="">
            <section class="dashboard-container">
                    <div class="page-box">
                        <div class="section-title">
                            <h2>EDIT MEMBER</h2>
                        </div>

                        <div class="members-nav">
                            <p><a href="members.php">MEMBERS</a> / EDIT MEMBER</p>
                        </div>

                        <div class="member-body">

                        <?php
                        if(isset($_GET['id'])){
                            $member_id = $_GET['id'];
                            $members = "SELECT * FROM signup_form WHERE id='$member_id' ";
                            $members_run = mysqli_query($conn, $members);

                            if(mysqli_num_rows($members_run) > 0){
                                foreach($members_run as $member){
                                    ?>
                                         <form class="editmember-form" action="">
                                            <div class="editform-container">
                                                <div class="edit-inputs">
                                                    <div class="form-control">
                                                        <label for="firstName">First Name</label>
                                                        <input type="text" name="firstName" value="<?=$member['firstName'];?>" id="firstName">
                                                        <small>error message</small>
                                                    </div>
                                                    <div class="form-control">
                                                        <label for="firstName">Last Name</label>
                                                        <input type="text" name="lastName" value="<?=$member['lastName'];?>" id="lastName">
                                                        <small>error message</small>
                                                    </div>
                                                    <div class="form-control">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" value="<?=$member['email'];?>" id="email">
                                                        <small>error message</small>
                                                    </div>
                                                    <div class="form-control">
                                                        <label for="firstName">Phone Number</label>
                                                        <input type="tel" name="phoneNo" value="<?=$member['phoneNumber'];?>" id="phoneNo">
                                                        <small>error message</small>
                                                    </div>
                                                    <div class="form-control">
                                                        <label for="Password">Password</label>
                                                        <input type="text" name="password" value="<?=$member['password'];?>" id="password">
                                                        <small>error message</small>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button onclick="checkInputs()" type="submit" class="edit">UPDATE MEMBER</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php
                                }
                            } else {
                                ?>
                                <h4>No Record Found</h4>
                                <?php
                            }
                        }
                        ?>
                           
                        </div>
                    </div>
                </section>
            </main>

            <footer>
                <p>Designed and Developed by <b><a href="https://portfolio-task.paulapetra.repl.co/" target="_blank">Paula-Petra.</a></b></p>
            </footer>
        
    </body>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        let form = document.querySelector('.editmember-form');
        let firstName = document.getElementById('firstName');
        let lastName = document.getElementById('lastName');
        let phoneNum = document.getElementById('phoneNo');
        let email = document.getElementById('email');
        let password = document.getElementById('password');

        let firstnameValue;
        let lastnameValue;
        let phonenumValue;
        let emailValue;
        let passwordValue;

        function checkInputs() {

            //get the values from the inputs
            firstnameValue = firstName.value.trim();
            lastnameValue = lastName.value.trim();
            phonenumValue = phoneNum.value.trim();
            emailValue = email.value.trim();
            passwordValue = password.value.trim();

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
                url: "./edit.php",
                type: "POST",
                cache: false,
                data:{firstName:firstnameValue, lastName:lastnameValue, phoneNo:phonenumValue, email:emailValue, password:passwordValue },
                success: function (response)
                {
                    console.log(response); 
                    if(response == "success"){
                        swal({
                        title: "success",
                        text: "Member Updated Successfully!",
                        buttons: true
                        });
                    
                    }else{
                        swal({
                        title: "failed",
                        text: "Failed To Update Member!",
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


    </script>
</html>