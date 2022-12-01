<?php
    session_start();

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'librarymanagementsystem');
    if($conn->connect_error)
    {
       die('Connection Failed : '.$conn->connect_error);
    }
    

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    
    $query = "SELECT * FROM signup_form WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($conn, $query);
    

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['user'] = $email;
        echo "success";           
    }
    else
    {
        echo "failed";
    }

    
?>