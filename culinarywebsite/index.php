<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
} else {
    header("Location: http://localhost/expt4/login.php");
}

?>

<html>
    <head>

    <link rel="stylesheet" type="text/css" href="http://localhost/expt4/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lobster&family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <title>Home - Bussin.com</title>
        <script>

            $(document).ready(function(){
                var recipeCount = 2;
                $("#show-more").click(function(){
                    recipeCount = recipeCount + 2;
                    $("#display-recipe").load("load-more-recipes.php", {
                        recipeNewCount: recipeCount
                    });
                });
            });

        </script>

    </head>
    <body>
        <div class="flex-container">
            <div class="heading">
                <div class="logo"><a href="http://localhost/expt4/index.php"><img src="http://localhost/expt4/logo.png" alt="bussin-logo" /></a></div>
                <div class="headertxt "><a href="http://localhost/expt4/index.php" class="font-lobster">Bussin.com</a></div>
                <div class="login-register-group font-bebasneue">
                    <a href="logout.php">Log Out</a>
                </div>
            </div>
            <div class="navbar font-bebasneue">
            <a href="http://localhost/expt4/about.html">About Us</a>
            <a href="http://localhost/expt4/recipes.php">Recipes</a>
            <a href="http://localhost/expt4/ingredients.php">Ingredients</a>        
            <a href="http://localhost/expt4/account.php">Account</a>          
            </div>
            <div class="content">



                <div class="content-title font-bebasneue">
                <?php if (isset($user)): ?>
                    <span class="font-bebasneue">Welcome <?= htmlspecialchars($user["first_name"]) ?>! Here's todays top picks!</span>
                <?php endif; ?>
                <div id="display-recipe">
                    <?php
                    $sql = "SELECT * FROM recipe LIMIT 3";
                    $result = $mysqli->query($sql);
                    if($result->num_rows > 0){
                        while($rows = $result->fetch_assoc()) {

                            $r_id = $rows['r_id'];
                            $r_name = $rows['r_name'];
                            $r_img = $rows['r_img'];
                            $r_filename = $rows['r_filename'];
                            $r_rating = $rows['r_rating'];
                            $r_desc = $rows['r_desc'];

                            ?>

                <div class="item_card">
                    <a href=<?php echo 'recipe/'.$r_filename?> >
                        <img src=<?php echo 'recipe/'.$r_img?> class="item_image">
                        <div class="item_details">
                                <p class="item_title"><?php echo $r_name?></p>
                            <div class="rating">
                                <p class="rating_num"><?php echo $r_rating?></p>
                                <p class="ovr_star">&#9733;</p>
                            </div>
                            <div class="item_desc">
                                <p>
                                <?php echo $r_desc?>
                                </p>
                            </div>
    
                        </div>
                    </a>
                </div>

                       <?php
                        }

                    } else {
                        echo "You've reached the End!";
                    }

                    ?>

                </div>
                <button id="show-more" class="font-bebasneue">Load more recipes</button>
                
            </div>





        </div>

    </body>
</html>