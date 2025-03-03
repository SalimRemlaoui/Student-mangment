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
    if(isset($_POST['add_teacher'])){
        $t_name=$_POST['name'];
        $t_description=$_POST['description'];
        $file=$_FILES['image']['name'];
        $dst="./img/".$file;
        $dst_db="img/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'],$dst);
        $sql="INSERT INTO teacher (name,description,image)
                VALUES('$t_name','$t_description','$dst_db')";
        $result=mysqli_query($data,$sql);
        if($result){
            header('location:admin_addteacher.php');
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
                display: inline-block;
                text-align: right;
                width:7.5rem;
                padding-top: 0.625rem;
                padding-bottom: 0.625rem;
            }
            .div_deg{
                background-color: skyblue;
                width:31.25rem;
                padding-top: 4.375rem;
                padding-bottom: 4.375rem;
            }
            h1{
                background-color: black;
                color: white;
                width:31.25rem;
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
            <h1>Add Teacher </h1>
            <div class="div_deg">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <label>Teacher Name :</label>
                        <input type="text" name="name">
                    </div>
                    <div>
                        <label>Description:</label>
                        <textarea name="description"></textarea>
                    </div>
                    <div>
                        <label>Image:</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <input type="submit" name="add_teacher" value="Add Teacher" class="btn btn-primary">
                    </div>
                </form>
            </div>





            </center>
        </div>
    </body>
</html>