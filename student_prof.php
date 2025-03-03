<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }
    elseif($_SESSION['usertype']=='admin'){
        header("location: login.php");
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "schoolp";

    $data=mysqli_connect($host, $user, $password, $db);
    $name=$_SESSION['username'];
    $sql="SELECT * FROM user WHERE username='$name' ";
    $result3=mysqli_query($data,$sql);
    $info=mysqli_fetch_assoc($result3);

    if(isset($_POST['update_prof'])){
        $d_email=$_POST['email'];
        $d_phone=$_POST['phone'];
        $d_password=$_POST['password'];
        $sql2="UPDATE user SET email='$d_email',phone='$d_phone',password='$d_password' WHERE username='$name'";
        $result2=mysqli_query($data,$sql2);
        if($result2){
            header("location:student_prof.php");
        }
    }
?>

<html>
    <head>
        <title>Student Dashboard</title>
        <link rel="stylesheet" type="text/css" href="admin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <style type="text/css">
            label{
                display:inline-block;
                text-align: right;
                width: 6.25rem;
                padding-top: 0.625rem;
                padding-bottom: 0.625rem;
            }
            .div_deg{
                background-color: skyblue;
                width: 25rem;
                padding-top: 4.375rem;
                padding-bottom: 4.375rem;
            }
        </style>
    </head>
    <body>
        <?php 
            include 'student_sidebar.php'
        ?>
        <div class="content">
            <center>
                <h1>Update Profile</h1><br><br>
            <form action="#" method="POST">
                <div class="div_deg">
                    <div>
                        <label>Email:</label>
                        <input type="Email" name="email" value="<?php echo"{$info['Email']}"; ?>">
                    </div>
                    <div>
                        <label>Phone:</label>
                        <input type="number" name="phone" value="<?php echo"{$info['phone']}"; ?>">
                    </div>
                    <div>
                        <label>Password:</label>
                        <input type="text" name="password" value="<?php echo"{$info['password']}"; ?>">
                    </div>
                    <div>
                        <input type="submit" name="update_prof" class="btn btn-primary">
                    </div>
                </div>
            </form>
            </center>
        </div>
    </body>
</html>