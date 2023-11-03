<?php
session_start();


if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $firstname = $user['first_name'];
    $dob = $user['date_of_birth'];
    $lastname = $user['last_name'];
    $email = $user['email_address'];
    $phone = $user['phone'];
} else {
    header("Location: http://localhost/expt4/login.php");
}

?>
<?php
function getSavedRecipes() {
    global $mysqli;
    $userid = $_SESSION['user_id'];
    $query = "SELECT sr.sr_id as sr_id, sr.r_id as srr_id, r.r_id as rr_id,  r.r_name as rr_name, r.r_filename as rr_filename, r.r_rating as rr_rating, r.r_img as rr_img, r.r_desc as rr_desc FROM saved_recipe sr, recipe r WHERE sr.r_id = r.r_id AND sr.id = '$userid' ORDER BY sr.sr_id DESC";
    return $result = $mysqli->query($query);
}
?>


<html>
    <head>

        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lobster&family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="http://localhost/expt4/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="remove-from-saved.js"></script>
        <title>Recipes - Bussin.com</title>
    </head>
    <body>
        <div class="flex-container">
            <div class="heading">
                <div class="logo"><a href="index.php"><img src="logo.png" alt="bussin-logo" /></a></div>
                <div class="headertxt "><a href="index.php" class="font-lobster">Bussin.com</a></div>
                <div class="login-register-group font-bebasneue">
                    <a href="http://localhost/expt4/logout.php">Logout</a>

                </div>
               
            </div>
            <div class="navbar font-bebasneue">
                   
            <a href="http://localhost/expt4/about.html">About Us</a>
            <a href="http://localhost/expt4/recipes.php">Recipes</a>
            <a href="http://localhost/expt4/ingredients.php">Ingredients</a>   
            <a href="http://localhost/expt4/account.php">Account</a>  

                    
            </div>
            <div class="content">



                <div class="account-details">
                    <h1 class="font-bebasneue">User Details</h1><hr>
                    <p class="font-bebasneue" style="font-size:18px;">Name:<?php echo " ".$firstname; ?></p>
                    <p class="font-bebasneue" style="font-size:18px;">Surname: <?php echo " ".$lastname; ?></p>
                    <p class="font-bebasneue" style="font-size:18px;">Birthday: <?php echo " ".$dob; ?></p>
                    <p class="font-bebasneue" style="font-size:18px;">Email Address: <?php echo " ".$email; ?></p>
                    <p class="font-bebasneue" style="font-size:18px;">Contact: <?php echo " ".$phone; ?></p>


                </div>
                <div class="bookmarked-recipes">
                <h1 class="font-bebasneue">Saved Recipes</h1><hr>
                <div id= "saved-recipes">
                <?php 
                $recipes = getSavedRecipes();
                foreach($recipes as $saved_rec) {
                   // echo $saved_rec['rr_name'];
                    ?>
                   


                    <div class="item_card">
                    <a href=<?php echo 'recipe/'.$saved_rec['rr_filename']?> >
                        <img src=<?php echo 'recipe/'.$saved_rec['rr_img']?> class="item_image">
                        <div class="item_details">
                                <p class="item_title"><?php echo $saved_rec['rr_name']?></p>
                            <div class="rating">
                                <p class="rating_num"><?php echo $saved_rec['rr_rating']?></p>
                                <p class="ovr_star">&#9733;</p>
                            </div>
                            <div class="item_desc">
                                <p>
                                <?php echo $saved_rec['rr_desc']?>
                                </p>
                            </div>

    
                        </div>
                    </a>
                </div>
                <button class="remove-from-saved" value="<?= $saved_rec['sr_id']?>"></button> 

                    <?php
                }

                ?>


            </div>   


                </div>
                <br />




            </div>
            <div class="advertisement">
                Advertisements
            </div>
        </div>

    </body>
</html>