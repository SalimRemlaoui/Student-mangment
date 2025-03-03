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
    $id=$_GET['student_id'];
    $sql="SELECT * FROM user WHERE id='$id' ";
    $result=mysqli_query($data,$sql);
    $info=$result->fetch_assoc();

    if(isset($_POST['update'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $query="UPDATE user SET username='$name',email='$email',phone='$phone',password='$password'  WHERE id='$id'";
        $result2=mysqli_query($data,$query);

        if($result2){
            echo"Update successfully";
            header("location:view_student.php"); 
              }
    }

?>


<html>
    <head>
        <title>Admin Dashboard</title>
        <?php
            include 'admin_css.php';
        ?>
        <style type="text/css">
            label{
                display:inline-block;
                width:6.25rem;
                text-align:right;
                padding-top:0.625rem ;
                padding-bottom: 0.625rem;
            }
            .div_deg{
                background-color: skyblue;
                width:25rem;
                padding-top: 4.375rem;
                padding-bottom:4.375rem ;
            }
        </style>
    </head>
    <body>
        <?php 
            include 'admin_sidebar.php';
        ?>
        <div class="content">
            <center>
            <h1>Update Student</h1>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label>Username:</label>
                        <input type="text" name="name"  value="<?php echo"{$info['username']}";  ?>">
                    </div>
                    <div>
                        <label>Email:</label>
                        <input type="email" name="email" value="<?php echo"{$info['Email']}";  ?>">
                    </div>
                    <div>
                        <label>Phone:</label>
                        <input type="number" name="phone" value="<?php echo"{$info['phone']}";  ?>">
                    </div>
                    <div>
                        <label>Password:</label>
                        <input type="text" name="password" value="<?php echo"{$info['password']}";  ?>">
                    </div>
                    <div>
                        <input type="submit" name="update" value="Update" class="btn btn-success">
                    </div>
                </form>
            </div>
            </center>
        </div>
    </body>
</html>