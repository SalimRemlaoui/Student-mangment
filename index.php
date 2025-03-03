<?php
error_reporting(0);
session_start();
session_destroy();

$host="localhost";
$user="root";
$password="";
$db="schoolp";

$data=mysqli_connect($host,$user,$password,$db);
$sql="SELECT * FROM teacher ";
$result=mysqli_query($data,$sql);
?>


<html>
    <head>
        <title>Student Mangment System </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <nav>
            <label class ="logo" >W-School</label>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Admission</a></li>
                <li><a href="login.php" class="btn btn-success">Login</a></li>
            </ul>
        </nav>

        <div class="section1">
            <label class="img_text">We Teach Student with care </label>
            <img class="main_img" src="img/school.png">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="p_img" src="img/playground.jpg">
                </div>
                <div class="col-md-8">
                    <h1>Welcome To W-School</h1>
                    <p>
                    W-School is a forward-thinking institution dedicated to nurturing creativity, critical thinking, and lifelong learning in a dynamic environment. With modern facilities and a team of passionate educators, W-School offers a comprehensive curriculum that balances academic rigor with real-world experiences. The school places a strong emphasis on collaboration and innovation, encouraging students to explore their interests and develop practical skills through project-based learning and extracurricular activities. At its core, W-School strives to create an inclusive community where every student is empowered to reach their full potential, preparing them for success in a rapidly changing world.
                    </p>
                </div>
            </div>
        </div>
        <center>
            <h1>Our Teachers </h1>
        </center>
        <div class="container">
            <div class="row">
                <?php 
                    while($info=$result->fetch_assoc()){
                ?>
                <div class="col-md-4">
                    <img class="teacher_img"src="<?php echo "{$info['image']}"; ?>">
                    <h3><?php echo "{$info['name']}"; ?></h3>
                    <p><?php echo "{$info['description']}"; ?></p>

                </div>
                        <?php
                    }
                    ?>

            </div>
        </div>
        <center>
            <h1>Our Courses</h1>
        </center>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="course_img" src="img/web_development.png">
                    <h3>Web Development</h3>
                </div>
                <div class="col-md-4">
                    <img class="course_img" src="img/graphic_design.png">
                    <h3>Graphic Design</h3>
                </div>
                <div class="col-md-4">
                    <img class="course_img" src="img/digital_marketing.png">
                    <h3>Digital Mrketing</h3>
                </div>
            </div>
        </div>
        <center>
            <h1 class="adm1" >Admission Form</h1>
        </center>
        <div align="center" class="admission_form">
            <form action="data_check.php" method="POST">
                <div class="adm">
                    <label class="label_text" >Name:</label>
                    <input class="input_deg" type="text" name="name">
                </div>  
                <div class="adm">
                    <label class ="label_text" >Emal:</label>
                    <input class="input_deg" type="text" name="email">
                </div>
                <div class="adm">
                    <label class="label_text" >Phone:</label>
                    <input class="input_deg" type="text" name="phone">
                </div>
                <div class="adm">
                    <label class="label_text">Message:</label>
                    <textarea class="input_txt" name="message" ></textarea>
                </div>
                    <div class="adm">
                    <input class="btn btn-primary" id="submit" type="submit" value="Apply" name="apply">
                </div>
            </form>
        </div>
        <footer>
            <h3 class="footer_txt" >Visit our Instagram!</h3>
        </footer>
    </body>
</html>