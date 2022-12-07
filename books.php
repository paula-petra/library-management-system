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
    <title>Home - Library Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="page-container">
    
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
                    <li class="nav-user" id="nav-sign-in"><a href="signin.html">SIGN IN</a></li>
                    <li class="nav-user" id="nav-admin"><a href="admin_signin.html">ADMIN</a></li>
                </ul>
            </div>
        </nav>
    </header>

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