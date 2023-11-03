<?php

error_reporting(0);

$is_invalid = false;//for invalid login

/*if(isset($_POST['remember_me']))
{
    setcookie('emailid', $_POST['email'], time()+30);
    setcookie('password', $_POST['pwd'], time()+30);
}
else
{
    setcookie('emailid', $_POST['email'], time()-30);
    setcookie('password', $_POST['pwd'], time()-30); 
}

if(isset($_COOKIE['emailid']) && isset($_COOKIE['password']))
{
    $emailid = $_COOKIE['emailid'];
    $password = $_COOKIE['password'];
} else {
    $emailid = $password = "";
}*/


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $mysqli = require __dir__ ."/database.php";

        $sql = sprintf("SELECT * FROM user WHERE email_address = '%s'", $mysqli->real_escape_string($_POST["email"]));
        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();

        if($user) {
            if(password_verify($_POST["pwd"], $user["password_hash"])){

                session_start(); //starts or resumes a session
                session_regenerate_id();//avoids session fixation attack
                $_SESSION['user_id'] = $user["id"];

                if(!empty($_POST['remember_me'])){
                    $remember_me = $_POST['remember_me'];

                    setcookie('emailid', $_POST['email'], time()+86400);
                    setcookie('password', $_POST['pwd'], time()+86400);
                }
                else
                {
                    setcookie('emailid', $_POST['email'], time()-30);
                    setcookie('password', $_POST['pwd'], time()-30); 
                }



                header("Location: index.php");
                exit;
            }
        }
        $is_invalid = true;

    }

?>

<html>
    <head>

        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lobster&family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="http://localhost/expt4/style.css">
        <title>Login - Bussin.com</title>
    </head>
    <body>
        <div class="flex-container">
            <div class="heading">
                <div class="logo"><a href=""><img src="logo.png" alt="bussin-logo" /></a></div>
                <div class="headertxt "><a href="" class="font-lobster">Bussin.com</a></div>
                <div class="login-register-group font-bebasneue">
                    <a href="login.php">Login</a> <span style="color: white">|</span>
                    <a href="register.php">Join Us!</a>

                </div>
               
            </div>
            <div class="navbar font-bebasneue">

                    
            </div>
            <div class="content">
                <div class="content-title font-bebasneue">Login</div>

                    <form method="post">
                    <?php if($is_invalid): //shows invalid if email/pwd wrong ?>
                        <p class="font-bebasneue" style="font-size:12px;text-align:right;color:red;letter-spacing:1px;word-spacing:4px;">Invalid login</p>
                        <?php endif; ?><br />
                       
                        <label for="email-address" class="font-bebasneue">Email</label><br />
                        <input type="email" id="email" name="email" value="<?php if(isset($_COOKIE['emailid'])){ echo $_COOKIE['emailid'];} ?>">
                        <br /><br />


                        <label for="pwd" class="font-bebasneue">Password</label><br />
                        <input type="password" id="pwd" name="pwd" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];} ?>">

                        <input class ="remember-me" type="checkbox" name="rememeber_me" id="remember_me"><label class="font-bebasneue" for="remember_me"> 
                            Keep me logged in</label>

                        <br /><br />
                        <input type="submit" value="Next" class="font-bebasneue">

                    </form>


            </div>

            <div class="advertisement">
                Advertisements
            </div>
        </div>

    </body>
</html>