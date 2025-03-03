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
        <?php 
            include 'student_sidebar.php'
        ?>
        <div class="content">
            <h2>Sidebar Accordation</h2>
           
        </div>
    </body>
</html>