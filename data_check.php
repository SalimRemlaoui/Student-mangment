<?php

session_start();
    $host="localhost";
    $user="root";
    $password="";
    $db="schoolp";

    $data=mysqli_connect($host,$user,$password,$db);
    if($data===false){
        die("connection error");
    }

    if(isset($_POST['apply'])){
        $d_name=$_POST['name'];
        $d_email=$_POST['email'];
        $d_phone=$_POST['phone'];
        $d_message=$_POST['message'];

        $sql ="INSERT INTO admission(name,email,phone,message)
                    VALUES ('$d_name','$d_email','$d_phone','$d_message')";

        $result =mysqli_query($data,$sql);
        if($result){
            echo "Your application is sent successfuly!";
            header("location:index.php");
        }
        else{
            echo"failed";
        }

    }
?>