<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Library MAnagement System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="page-container">
    
    <header class="page-header" id="page-top">

        <nav class="nav-bar" id="main-nav">

            <div>
                <a href="#page-top" class="page-title">LIBRARY MANAGEMENT SYSTEM</a>
            </div>

            <div>
                <ul class="main-nav-list">
                    <li><a class="nav-list-items" href="#home-section2">SERVICES</a></li>
                    <li><a class="nav-list-items" href="#books">BOOKS</a></li>
                    <li><a class="nav-list-items" href="#contact">CONTACT</a></li>
                    <li class="nav-user" id="nav-sign-in"><a href="">SIGN IN</a></li>
                    <li class="nav-user" id="nav-admin"><a href="">ADMIN</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>

    <section class="home-sections" id="home-section1">
        <div id="page-intro">
            <div class="text-overlay">
                <h1>A Digital Library For Everyone</h1>
                <p>Library Management System for users, essentially students, and Librarian/Admin.</p>
            </div>
        </div>
    </section>

    <section class="home-sections" id="home-section2">
        
        <div id="container-box">
            <div class="section-title">
                <h2>SERVICES</h2>
            </div>
            
            <div id="services-container">
                
                <div class="service-list" id="service1">
                    <div class="service-img">
                        <img src="imgs\gettyimages-949118068.jpg" alt="">
                    </div>
                    <div class="service-info">
                        <h3>CATALOG</h3>
                        <p>Range of books, from educational to fiction, readily available.</p>
                    </div>
                </div>

                <div class="service-list" id="service2">
                    <div class="service-img">
                        <img src="imgs\Library-Management-System-src.jpg" alt="">
                    </div>
                    <div class="service-info">
                        <h3>RESERVE</h3>
                        <p>Reserve as any books as you like through your user account.</p>
                    </div>
                </div>

                <div class="service-list" id="service3">
                    <div class="service-img">
                        <img src="imgs\4.jpg" alt="">
                    </div>
                    <div class="service-info">
                        <h3>ISSUE</h3>
                        <p>Borrow books from the library for free, and return within set time.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </main>
</body>
</html>