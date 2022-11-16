<?php
    //Database connection
    $conn = new mysqli('localhost', 'root', '', 'librarymanagementsystem');

    if(isset($_POST['insert'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $phoneNumber = $_POST['phoneNo'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = array();

        $Email = "SELECT email FROM new WHERE email = '$email'";
        $e = mysqli_query($conn,$Email);

        if(mysqli_num_rows($e)>0){
            $errors['e'] = "Email in use!";
        }

        if(count($errors)==0){
            $query = "INSERT INTO signup_form(firstName, lastName, phoneNumber, email, password) VALUES('$firstName', '$lastName', '$phoneNumber', '$email', '$password')";
            $result = mysqli_query($conn,$query);

            if ($result){
                echo"<script>alert('done')</script>";
            } else{
                echo"<script>alert('failed')</script>";
            }
        }
    }