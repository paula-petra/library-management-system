<?php
    session_start();

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'librarymanagementsystem');
    if($conn->connect_error)
    {
       die('Connection Failed : '.$conn->connect_error);
    }
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $email_query = "SELECT * FROM signup_form WHERE email = '$email'";
    $conn->query($email_query);
    //echo "Affected rows: " . $conn->affected_rows;
    

    if($conn->affected_rows > 0)
    {
   
        echo "failed";
        return;
        
    }
    else
    {
        $stmt = $conn->prepare("insert into signup_form(firstName, lastName, phoneNumber, email, password)values(?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss",$firstName, $lastName, $phoneNumber, $email, $password);
        if($stmt->execute())
        {
            echo "success";
        }else
        {
            echo "failed";
        }
     
        
    }
    $stmt->close();
    $conn->close();
?>