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
    $sql="SELECT * FROM admission";
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
            <h1>Applied For Admission</h1><br><br>
            <table style="border: 1px solid black; border-collapse: collapse;">
                <tr>
                    <th style="padding:1.25rem;font-size:15px;border: 1px solid black;">Name</th>
                    <th style="padding:1.25rem;font-size:15px;border: 1px solid black;">Email</th>
                    <th style="padding:1.25rem;font-size:15px;border: 1px solid black;">Phone</th>
                    <th style="padding:1.25rem;font-size:15px;border: 1px solid black;">Message</th>
                </tr> 
                <?php
                    while($info=$result->fetch_assoc()){
                ?>  
                <tr>
                    <td>
                        <?php echo"{$info['name']}";?>
                    </td>
                    <td>
                        <?php echo"{$info['email']}";?>
                    </td>
                    <td>
                        <?php echo"{$info['phone']}";?>
                    </td>
                    <td>
                        <?php echo"{$info['message']}";?>
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