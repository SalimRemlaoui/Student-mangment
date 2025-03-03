<?php
    session_start();
    error_reporting(0);
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
    $sql="SELECT * FROM teacher ";
    $result=mysqli_query($data,$sql);

    if($_GET['teacher_id']){
        $t_id=$_GET['teacher_id'];
        $sql2="DELETE FROM teacher WHERE id='$t_id' ";
        $result2=mysqli_query($data,$sql2);
        if($result2){
            header('location:view_teacher.php');
        }
    }
?>


<html>
    <head>
        <title>View Teacher</title>
        <?php
            include 'admin_css.php';
        ?>
    </head>
    <body>
        <?php 
            include 'admin_sidebar.php';
        ?>
        <div class="content">
            <center>
            <h1>Teacher Data</h1><br><br>
            <?php 
                if($_SESSION['message']){
                    echo $_SESSION['message'];
                }
                    unset($_SESSION['message']);
            ?>
            <table>
                <tr>
                    <th>Teacher Name</th>
                    <th>About Teacher</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                <?php 
                    while($info=$result->fetch_assoc()){
                ?>
                <tr>
                    <td>
                        <?php echo "{$info['name']}"; ?>
                    </td>
                    <td>
                        <?php echo "{$info['description']}"; ?>
                    </td>
                    <td>
                        <img height="100px" width="100px" src="<?php echo "{$info['image']}"; ?>">
                    </td>
                    <td>
                        <?php echo "<a href='view_teacher.php?teacher_id={$info['id']}'class='btn btn-danger'>Delete</a>"; ?>
                    </td>
                    <td>
                        <?php echo "<a href='update_teacher.php?teacher_id={$info['id']}' class='btn btn-primary'>Update</a>"; ?>
                    </td>
                </tr>
                <?php
                    }
                    ?>
            </table>
            </center>
        </div>
    </body>
</html>