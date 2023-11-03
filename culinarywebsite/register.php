<?php
$name_err = $surname_err = $valid_phone_err = $dob_err = $email_err = $pwd_err = $pwd_length_err = $pwd_letter_err = $pwd_digit_err = $pwd_match_err = "";
$input_check_flag = true;
$name = $lname = $dob = $email = $phone = $pwd = $confirm_pwd = "";



function test_input($data) {
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = test_input($_POST["fname"]);
    $lname = test_input($_POST["lname"]);
    $dob = test_input($_POST["dob"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $pwd = test_input($_POST["pwd"]);
    $confirm_pwd = test_input($_POST["confirm_pwd"]);

    if(empty($_POST["fname"])){
        $name_err="Name is required";
        $input_check_flag = false;
    }

    if(empty($_POST["lname"])){
        $surname_err = "Surname is required";
        $input_check_flag = false;
    }

    if(empty($_POST["dob"])){
        $dob_err="Date of Birth is required";
        $input_check_flag = false;
    }

    if(empty($_POST["phone"])){
        $valid_phone_err = "Mobile number is required";
        $input_check_flag = false;
    }

    if(!preg_match("/[0-9]{10}/", $_POST["phone"])) {
        $valid_phone_err = "Valid mobile number required";
        $input_check_flag = false;
    }

    if( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "email should be valid";
        $input_check_flag = false;
    }

    if(empty($_POST["pwd"])){
        $pwd_err = "Password is required";
        $input_check_flag = false;
    }

    if(strlen($_POST["pwd"]) < 8) {
        $pwd_length_err = "Password must be at least 8 characters";
        $input_check_flag = false;
    }
    //check for at least one upper/lower case letter in pwd
    if(!preg_match("/[a-z]/i", $_POST["pwd"])) {
        $pwd_letter_err = "Password must contain at least one letter";
        $input_check_flag = false;
    }
    //check for at least one number in pwd
    if(!preg_match("/[0-9]/", $_POST["pwd"])) {
        $pwd_digit_err = "Password must contain at least one digit";
        $input_check_flag = false;
    }

    //check if pwd and confirm_pwd are the same
    if($_POST["pwd"] !== $_POST["confirm_pwd"]) {
        $pwd_match_err = "Passwords must match";
        $input_check_flag = false;
    }

if($input_check_flag) {
        //using a hash function to encrypt the password using default encryption
        $password_hash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

        $mysqli = require __DIR__ . "/database.php";// gets the directory of the current file and assigns it to a var


        //id not specified, since it is auto incr
        // ? in VALUES act as placeholder characters
        $sql = "INSERT INTO user (first_name, last_name, date_of_birth, email_address, phone, password_hash) VALUES (?, ?, ?, ?, ?, ?)";


        $stmt = $mysqli->stmt_init();//creates a new prepared statemtent
        // prepared statement is used to avoid sql injection

        //for executing the sql query
        if( ! $stmt->prepare($sql)) {
            //syntax is checked, if false, then return error
            die("SQL error: " . $mysqli->error);
        }

        //statement to bind values to placeholder chars
        // "ssssis" because five columns are strings and one is int
        $stmt->bind_param("ssssss",
        $_POST["fname"],
        $_POST["lname"],
        $_POST["dob"],
        $_POST["email"],
        $_POST["phone"],
        $password_hash); 

        if( $stmt->execute()) {

            //header("Location: signup_success.php");//redirects upon successful login"
            echo "<script> alert('Account ready! You can now log in.');
                    window.location.replace('login.php');
                    </script>";

            exit; //exits the script
        } else {
            if($mysqli->errno === 1062) {
                die("email already taken");
            } else {
            die($mysqli->error . " " . $mysqli->errno);
            }
        }
    }

}



?>



<html>
    <head>


        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lobster&family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="http://localhost/expt4/style.css">
        <title>Register - Bussin.com</title>

    </head>
    <body>
        <div class="flex-container">
            <div class="heading">
                <div class="logo"><a href="home.html"><img src="logo.png" alt="bussin-logo" /></a></div>
                <div class="headertxt "><a href="home.html" class="font-lobster">Bussin.com</a></div>
                <div class="login-register-group font-bebasneue">
                    <a href="login.php">Login</a> <span style="color: white">|</span>
                    <a href="register.php">Join Us!</a>

                </div>
               
            </div>
            <div class="navbar font-bebasneue">


                    
            </div>
            <div class="content">
                <div class="content-title font-bebasneue">Sign Up<br></div>

                    <form name="regForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
                        <label for="fname" class="font-bebasneue">First Name</label><br />
                        <input type="text" id="fname" name="fname" value = <?php echo $name ?> >
                        <?php echo '<p class="font-bebasneue" style="font-size:12px;text-align:right;color:red;letter-spacing:1px;word-spacing:4px;">' . $name_err . '</p>'; ?>
                        <br /><br />
                        <label for="lname" class="font-bebasneue">Last Name</label><br />
                        <input type="text" id="lname" name="lname" value = <?php echo $lname ?> >
                        <?php echo '<p class="font-bebasneue" style="font-size:12px;text-align:right;color:red;letter-spacing:1px;word-spacing:4px;">' . $surname_err . '</p>'; ?>
                        <br /><br />
                        <label for="dob" class="font-bebasneue">Date of Birth</label>
                        <input type="datetime-local" id="dob" name="dob" value = <?php echo $dob ?> >
                        <?php echo '<p class="font-bebasneue" style="font-size:12px;text-align:right;color:red;letter-spacing:1px;word-spacing:4px;">' . $dob_err. '</p>'; ?>
                        <br /><br />
                        <label for="email-address" class="font-bebasneue">Email</label><br />
                        <input type="email" id="email" name="email"  value = <?php echo $email ?> >
                        <?php echo '<p class="font-bebasneue" style="font-size:12px;text-align:right;color:red;letter-spacing:1px;word-spacing:4px;">' . $email_err . '</p>'; ?>
                        <br /><br />
                        <label for="phone" class="font-bebasneue">Mobile No.</label>
                        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" value = <?php echo $phone ?> >
                        <?php echo '<p class="font-bebasneue" style="font-size:12px;text-align:right;color:red;letter-spacing:1px;word-spacing:4px;">' . $valid_phone_err . '</p>'; ?>
                        <br /><br />
                        <label for="pwd" class="font-bebasneue">Password</label><br />
                        <input type="password" id="pwd" name="pwd" value = <?php echo $pwd ?> >
                        <?php if(!empty($pwd_err)){
                            echo '<p class="font-bebasneue" style="font-size:12px;text-align:right;color:red;letter-spacing:1px;word-spacing:4px;">' . $pwd_err . '</p>';
                            }else if(!empty($pwd_length_err)){ 
                                echo '<p class="font-bebasneue" style="font-size:12px;text-align:right;color:red;letter-spacing:1px;word-spacing:4px;">' . $pwd_length_err . '</p>'; 
                                }else if(!empty($pwd_letter_err)){
                                    echo '<p class="font-bebasneue" style="font-size:12px;text-align:right;color:red;letter-spacing:1px;word-spacing:4px;">' . $pwd_letter_err . '</p>';
                                    }else if(!empty($pwd_digit_err)){
                                        echo '<p class="font-bebasneue" style="font-size:12px;text-align:right;color:red;letter-spacing:1px;word-spacing:4px;">' . $pwd_digit_err . '</p>';} ?>
                        <br /><br />
                        <label for="pwd-confirm" class="font-bebasneue">Re-enter Password</label><br />
                        <input type="password" id="confirm_pwd" name="confirm_pwd"  value = <?php echo $confirm_pwd ?> >
                        <?php echo '<p class="font-bebasneue" style="font-size:12px;text-align:right;color:red;letter-spacing:1px;word-spacing:4px;">' . $pwd_match_err . '</p>'; ?>
                        <br /><br />
                        <input type="submit" value="Submit" class="font-bebasneue">

                    </form>


            </div>
            <div class="advertisement">
                Advertisements
            </div>
        </div>

    </body>
</html>