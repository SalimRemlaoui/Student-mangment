<html>
    <head>
        <title>Login Form</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body background="img/playground.jpg" class="body_deg">

        <center>
            <div class="form_deg">
                <center class="title_deg">
                    Login Form 
                    <h4>
                        <?php
                            error_reporting(0);
                            session_start();
                            session_destroy();
                            echo $_SESSION['loginmessage'];
                        ?>
                    </h4>
                </center>
                <form action="login_check.php" method="POST" class="login_form">
                    <div>
                        <label class="label_deg">username:</label>
                        <input type="text" name ="username">
                    </div>
                    <div>
                        <label class="label_deg">password:</label>
                        <input type="text" name ="password">
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" name ="submit" value="login">
                    </div>
                </form>
            </div>
        </center>
    </body>
</html>