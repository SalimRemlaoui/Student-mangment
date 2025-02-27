<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }
    elseif($_SESSION['usertype']=='student'){
        header("location: login.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="schoolp";

    $data=mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['add_student'])){
        $username=$_POST['name'];
        $user_email=$_POST['email'];
        $user_phone=$_POST['phone'];
        $user_password=$_POST['password'];
        $usertype="student";
            //unique user
        $check="SELECT * FROM user WHERE username ='$username'";
        $check_user=mysqli_query($data,$check);
        $row_count=mysqli_num_rows($check_user);
        if($row_count==1){
            echo "Username Already exist.Try Another One!";
        }
        else{

        $sql="INSERT INTO user(username,email,phone,usertype,password)
                    VALUES ('$username','$user_email','$user_phone','$usertype','$user_password') ";
        $result=mysqli_query($data,$sql);
        if($result){
            echo "Data uploaded successfully";
        }
        else{
            echo "upload failed";
        }
    }
    }
?>


<html>
    <head>
        <title>Add Student</title>
        <?php
            include 'admin_css.php';
        ?>
        <style type="text/css">
            label{
                display: inline-block;
                text-align: right;
                width:6.25rem;
                padding-top: 0.625rem;
                padding-bottom: 0.625rem;
            }
            .div_deg{
                background-color: skyblue;
                width:25rem;
                padding-top: 4.375rem;
                padding-bottom: 4.375rem;
            }
            h1{
                background-color: black;
                color: white;
                width:25rem;
                margin-bottom: 0;
            }
        </style>
    </head>
    <body>
        <?php 
            include 'admin_sidebar.php';
        ?>
        <div class="content">
            <center>
           
            <h1>Add Student</h1>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label>Username:</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label>Email:</label>
                        <input type="email" name="email">
                    </div>
                    <div>
                        <label>Phone:</label>
                        <input type="number" name="phone">
                    </div>
                    <div>
                        <label>Password:</label>
                        <input type="text" name="password">
                    </div>
                    <div>
                        <input type="submit" name="add_student" value="Add Student" class="btn btn-primary">
                    </div>
                </form>
            </div>
            </center>
        </div>
    </body>
</html>