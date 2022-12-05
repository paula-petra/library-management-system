<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'librarymanagementsystem');

//if(isset($_POST['delete-user']){
    $member_id = $_POST['delete-user'];

    $query = "DELETE FROM signup_form WHERE id = '$member_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = "User Deleted Successfully!";
        header('Location: members.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong!";
        header('Location: members.php');
        exit(0);
    }
//})
?>