<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'librarymanagementsystem');
if($_SESSION['user'] == null){
    header('location:signin.html');
}
$email = $_SESSION["user"];
$result = mysqli_query($conn, "SELECT * FROM signup_form WHERE email = '$email' ");
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Dashboard - Library Management System</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="dashboard-body" id="user-body">

            <header class="page-header">

                <nav class="nav-bar" id="main-nav">

                    <div class="div1">
                        <a class="menu-icon" id="open-nav"><img src="imgs/icons8-menu-30.png" alt=""></a>
                        <a class="menu-icon" id="close-btn"><img src="imgs/icons8-close-ios-16-filled-32.png" alt=""></a>
                        <a href="index.html" class="page-title">LIBRARY MANAGEMENT SYSTEM</a>
                    </div>

                    <div>
                        <ul class="main-nav-list">
                            <li class="nav-user" id="nav-sign-in"><a href="logout.php">LOG OUT</a></li>
                        </ul>
                    </div>
                </nav>
            </header>

            <nav class="side-nav" id="menu">
                <div class="menu-container">
                    <ul>
                        <li><a href="user.php">Dashboard</a></li>
                        <li><a href="books-user.php">Books</a></li>
                        <li><a href="">Reserved Books</a></li>
                        <li><a href="">Issued Books</a></li>
                        <li><a href="">Profile</a></li>
                    </ul>
                </div>
            </nav>

            <main class="">
                <section class="dashboard-container">
                    <div class="dashboard-box">
                        <div class="section-title">
                            <h2>DASHBOARD</h2>
                        </div>

                        <div class="welcome-text">
                            <h1>Welcome back, <span><?php echo $row["firstName"]?></span>!</h1>
                        </div>

                        <div class="dashboard-cards">

                            <div class="card">
                                <div class="card-sections">
                                    <p>Books</p>
                                </div>
                                <div class="card-sections">
                                    <h1>X</h1></div>
                                <div class="card-sections">
                                    <p>Total books available</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-sections">
                                    <p>Reserved Books</p>
                                </div>
                                <div class="card-sections">
                                    <h1>X</h1></div>
                                <div class="card-sections">
                                    <p>Total books reserved</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-sections">
                                    <p>Issued Books</p>
                                </div>
                                <div class="card-sections">
                                    <h1>X</h1></div>
                                <div class="card-sections">
                                    <p>Total books issued</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-sections">
                                    <p>Returned Books</p>
                                </div>
                                <div class="card-sections">
                                    <h1>X</h1></div>
                                <div class="card-sections">
                                    <p>Total books returned</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </section>
                
            </main>

            <footer>
                <p>Designed and Developed by <b><a href="https://portfolio-task.paulapetra.repl.co/" target="_blank">Paula-Petra.</a></b></p>
            </footer>
        
    </body>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</html>