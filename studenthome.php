<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }
    elseif($_SESSION['usertype']=='admin'){
        header("location: login.php");
    }
?>


<html>
    <head>
        <title>Student Dashboard</title>
        <link rel="stylesheet" type="text/css" href="admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <header class="header">
                <a href="" class="title_1">Student Dashboard</a>
                <div class="logout">
                    <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
        </header>
        <aside>
                <ul>
                    <li>
                        <a href="">My Courses</a>
                    </li>
                    <li>
                        <a href="">My Results</a>
                    </li>
                </ul>
        </aside>
        <div class="content">
            <h2>Sidebar Accordation</h2>
            <p>Sidebars are an essential design element, providing a sleek and efficient way to organize content and navigation, allowing users to quickly access important features while keeping the main interface clean and uncluttered, offering a seamless browsing experience</p>
        </div>
    </body>
</html>