<?php
    session_start();

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'librarymanagementsystem');
    if($conn->connect_error)
    {
       die('Connection Failed : '.$conn->connect_error);
    }
    
    if(isset($_POST['submit'])){
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNo']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5($_POST['password']);
        
        $query = "SELECT * FROM signup_form WHERE email = '$email' && password = '$password'";
        $result = mysqli_query($conn, $query);
        //echo "Affected rows: " . $conn->affected_rows;
        

        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_array($conn);
            header('locaation:user.html');            
        }
        else
        {
            $error[] = 'incorrect email or password!';
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Library Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

        <header class="page-header">

            <nav class="nav-bar" id="main-nav">

                <div>
                    <a href="index.html" class="page-title">LIBRARY MANAGEMENT SYSTEM</a>
                </div>

                <div>
                    <ul class="main-nav-list">
                        <li><a class="nav-list-items" href="index.html#services-section">SERVICES</a></li>
                        <li><a class="nav-list-items" href="index.html#books-section">BOOKS</a></li>
                        <li><a class="nav-list-items" href="index.html#contact-section">CONTACT</a></li>
                        <li class="nav-user" id="nav-sign-in"><a href="signin.php">SIGN IN</a></li>
                        <li class="nav-user" id="nav-admin"><a href="admin_signin.php">ADMIN</a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <main class="form-pages">
            <div class="form-container">
                <form id="signin-form" action="" method="post">
                    <div class="form-title">
                        <h2>USER SIGN IN</h2>
                    </div>

                    <?php
                    if (isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                        ?>

                    <div class="form-fields">
                        <input type="email" name="email" id="email" placeholder="E-mail*" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        <input type="password" name="password" id="password" placeholder="Password*" required>
                        <a href="">Forgot Password</a>
                    </div>

                    <div>
                        <input id="signin-submit" class="user-submit form-submit" name="submit" type="submit" value="LOGIN">

                        <a href="signup.html">Sign Up</a>
                    </div>
                </form>
            </div>
        </main>

        <footer>
            <p>Designed and Developed by <b><a href="https://portfolio-task.paulapetra.repl.co/" target="_blank">Paula-Petra.</a></b></p>
        </footer>
    
</body>
</html>