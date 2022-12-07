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
        <title>Members - Library Management System</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="dashboard-body">

            <header class="page-header">

                <nav class="nav-bar" id="main-nav">

                    <div class="div1">
                        <a class="menu-icon" id="open-nav"><img src="imgs/icons8-menu-30.png" alt=""></a>
                        <a class="menu-icon" id="close-btn"><img src="imgs/icons8-close-ios-16-filled-32.png" alt=""></a>
                        <a href="index.html" class="page-title">LIBRARY MANAGEMENT SYSTEM</a>
                    </div>

                    <div>
                        <ul class="main-nav-list">
                            <li class="nav-user" id="nav-admin"><a href="logout.php">LOG OUT</a></li>
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

            <main class="">
            <section class="dashboard-container">
                    <div class="page-box">
                        <div class="section-title">
                            <h2>MEMBERS</h2>
                        </div>

                        <div class="php-message">
                            <?php include('message.php');?>
                        </div>

                        <div class="member-body">
                            <table class="members-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th class="table-head">View User</th>
                                        <th class="table-head">Edit</th>
                                        <th class="table-head">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    $query = "SELECT * FROM signup_form";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $row){
                                            ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['firstName']; ?></td>
                                                <td><?= $row['lastName']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['phoneNumber']; ?></td>
                                                <td><a  class="table-btns" id="view-user" href="">VIEW USER</a></td>
                                                <td><a class="table-btns edit" href="edit_member.php?id=<?= $row['id']; ?>">EDIT</a></td>
                                                <td>
                                                    <form action="delete.php" method="POST">
                                                        <button type="submit" class="table-btns" id="delete" name="delete-user" value="<?= $row['id']; ?>">DELETE</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else{
                                        ?>
                                        <tr colspan="8">No Record Found</tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
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
    <script>
        $('.msg-icon').click(function(){
            $('.php-message').toggleClass('hide');
        });
    </script>
</html>