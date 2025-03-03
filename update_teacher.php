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
    if($_GET['teacher_id']){
        $t_id=$_GET['teacher_id'];
        $sql="SELECT * FROM teacher WHERE id ='$t_id'";
        $result=mysqli_query($data,$sql);
        $info=$result->fetch_assoc();
    }
    if(isset($_POST['update_teacher'])){
        $t_name=$_POST['name'];
        $t_description=$_POST['description'];
        $file=$_FILES['image']['name'];
        $dst="./img/.$file";
        $dst_db="img/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'],$dst);
        if($file){
            $query="UPDATE teacher SET name='$t_name',description='$t_description',image='$dst_db'  WHERE id='$t_id'";
        }
        else{
            $query="UPDATE teacher SET name='$t_name',description='$t_description'  WHERE id='$t_id'";

        }
        $result2=mysqli_query($data,$query);

        if($result2){
            header("location:view_teacher.php"); 
              }
        }
?>


<html>
    <head>
        <title>Update Teacher</title>
        <?php
            include 'admin_css.php';
        ?>
        <style type="text/css">
            label{
                display:inline-block;
                width:9.375rem;
                text-align:right;
                padding-top:0.625rem ;
                padding-bottom: 0.625rem;
            }
            .div_deg{
                background-color: skyblue;
                width:37.5rem;
                height:28.125rem;
                padding-top: 4.375rem;
                padding-bottom:4.375rem ;
                margin-bottom:4.375rem ;
            }
        </style>
    </head>
    <body>
        <?php 
            include 'admin_sidebar.php';
        ?>
       <div class="content">
            <center>
            <h1>Update Teacher</h1>
            <div class="div_deg">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div>
                        <label>Teacher Name:</label>
                        <input type="text" name="name"  value="<?php echo"{$info['name']}";  ?>">
                    </div>
                    <div>
                        <label>Description:</label>
                        <textarea name="description"><?php echo"{$info['description']}";  ?></textarea>
                    </div>
                    <div>
                        <label>Teacher old image:</label>
                        <img width="100px" height="100px" src="<?php echo"{$info['image']}";  ?>">
                    </div>
                    <div>
                        <label>Teacher new image:</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <input type="submit" name="update_teacher" value="Update" class="btn btn-success">
                    </div>
                </form>
            </div>
            </center>
        </div>
    </body>
</html> 