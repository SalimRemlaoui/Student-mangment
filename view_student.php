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
    $sql="SELECT * FROM user WHERE usertype='student'";
    $result=mysqli_query($data,$sql);
?>


<html>
    <head>
        <title>Admin Dashboard</title>
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
            <h1>Student Data</h1><br><br>
            <?php 
                if($_SESSION['message']){
                    echo $_SESSION['message'];
                }
                    unset($_SESSION['message']);
            ?>
            <table>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Password</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                <?php 
                    while($info=$result->fetch_assoc()){
                ?>
                <tr>
                    <td>
                        <?php echo "{$info['username']}"; ?>
                    </td>
                    <td>
                        <?php echo "{$info['Email']}"; ?>
                    </td>
                    <td>
                        <?php echo "{$info['phone']}"; ?>
                    </td>
                    <td>
                        <?php echo "{$info['password']}"; ?>
                    </td>
                    <td>
                        <?php echo "<a href='delete.php?student_id={$info['id']}'class='btn btn-danger'>Delete</a>"; ?>
                    </td>
                    <td>
                        <?php echo "<a href='Up_student.php?student_id={$info['id']}' class='btn btn-primary'>Update</a>"; ?>
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