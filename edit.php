<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'librarymanagementsystem');

//if(isset($_POST['update member'])){
    $member_id = $_POST['member_id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNo'];
    $password = $_POST['password'];

    $query = "UPDATE signup_form SET firstName = '$firstName', lastName = '$lastName', email = '$email', phoneNumber = '$phoneNumber', password = '$password' WHERE id='$member_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        echo "success";           
    }
    else
    {
        echo "failed";
    }
//}
?>