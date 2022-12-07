<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'librarymanagementsystem');
if($_SESSION['user'] == null){
    header('location:admin_signin.html');
}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Books - Admin - Library Management System</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="page-container" id="user-body">

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
                        <li><a href="admin.php">Dashboard</a></li>
                        <li><a href="members.php">Members</a></li>
                        <li><a href="">Users</a></li>
                        <li><a href="books-admin.php">Books</a></li>
                        <li><a href="">Reserved Books</a></li>
                        <li><a href="">Issued Books</a></li>
                        <li><a href="">Not Returned</a></li>
                        <li><a href="">Profile</a></li>
                    </ul>
                </div>
            </nav>

            <main class="book-body">

                <section class="home-sections" id="books-section">
                    
                    <div class="section-box">
                        <div class="section-title">
                            <h2>BOOKS</h2>
                        </div>

                        <div class="searchbar-container">
                            <form action="" class="search-bar">
                                <input onkeyup="search()" type="text" id="search-books" placeholder="search books" name="q">
                                <button type="submit"><img src="imgs/icons8-search-50.png" alt=""></button>
                            </form>
                        </div>

                        <div class="services-container" id="books-container">

                            <?php
                                $query = "SELECT * FROM books";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0){
                                    foreach($query_run as $row){
                                        ?>                                
                                        <div class="book">
                                            <div class="service-img">
                                                <img src="imgs/<?= $row['coverImage']; ?>" alt="">
                                            </div>
                                            <div class="service-info">
                                                <h3><?= $row['title']; ?></h3>
                                                <p>AUTHOR: <?= $row['author']; ?></p>
                                                <p>QUANTITY: <?= $row['quantity']; ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }else{
                                    ?>
                                    <h3>No Record Found</h3>
                                    <?php
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
</html>