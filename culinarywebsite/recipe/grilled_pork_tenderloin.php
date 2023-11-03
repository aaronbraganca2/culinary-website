<?php
session_start();
include('C:\xampp\htdocs\expt4\database.php');

$recipe_filename = basename($_SERVER['PHP_SELF']);
$sql = "SELECT * FROM recipe WHERE r_filename='{$recipe_filename}'";

$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$r_id = $row["r_id"];



?>

<html>
    <head><title>Bussin.com - Recipes</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lobster&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/expt4/style.css">
    <script src="save_recipe.js"></script>
    <script src="rating_anim.js"></script>

    </head>

    <body>
        <div class="flex-container">
            <div class="heading">
                <div class="logo"><a href="http://localhost/expt4/index.php"><img src="http://localhost/expt4/logo.png" alt="bussin-logo" /></a></div>
                <div class="headertxt "><a href="http://localhost/expt4/index.php" class="font-lobster">Bussin.com</a></div>
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
                <h1 class="recipe_title">Grilled Pork Tenderloin</h1>
                <div class="user_rating">
                    <button class="user_star" onclick="addRating()">&#9734;</button>
                    <button class="user_star" onclick="addRating()">&#9734;</button>
                    <button class="user_star" onclick="addRating()">&#9734;</button>
                    <button class="user_star" onclick="addRating()">&#9734;</button>
                    <button class="user_star" onclick="addRating()">&#9734;</button>
                    
                </div>
                <button class="bookmark_recipe" value="<?= $r_id ?>"><img class="bookmark_image" src="bookmark.png"></button>

                <img class="recipe_img" src="grilled_pork_tenderloin.png">

                <p class="recipe_desc">This marinated pork loin cooks up nicely on the grill. It tastes best when marinated for 24 hours.
                </p>
                <h2 class="ingredients_title">Ingredients</h2>
                <ol class="ingredients">
                    <li>¼ cup honey</li>

                  <li>¼ cup soy sauce</li>
                    
                    <li>¼ cup oyster sauce</li>
                    
                    <li>2 tablespoons brown sugar</li>
                    
                    <li>4 teaspoons minced fresh ginger root</li>
                    
                    <li>1 tablespoon ketchup</li>
                    
                    <li>1 tablespoon minced garlic</li>
                    
                    <li>1 tablespoon chopped fresh parsley</li>
                    
                    <li>¼ teaspoon onion powder</li>
                    
                    <li>¼ teaspoon cayenne pepper</li>
                    
                    <li>¼ teaspoon ground cinnamon</li>
                    <li>2 (12 ounce) pork tenderloins</li>
                </ol>
                <h2 class="procedure_title">Procedure</h2>
                <p class="procedure">Make marinade: Whisk together honey, soy sauce, oyster sauce, brown sugar, ginger, ketchup, garlic, parsley, onion powder, cayenne pepper, and cinnamon in a medium bowl; pour into a resealable plastic bag.

                    Place pork tenderloins into the bag; coat with marinade, squeeze out excess air, and seal the bag. Marinate in the refrigerator for at least 1 hour or up to 24 hours.
                    
                    Preheat the grill for medium heat and lightly oil the grate.
                    
                    Remove pork tenderloins from marinade; shake off excess. Discard remaining marinade.
                    
                    Cook pork tenderloins on the preheated grill until no longer pink in the center, 20 to 30 minutes, turning occasionally. An instant-read thermometer inserted into the centers should read at least 145 degrees F (63 degrees C).</p>
            </div>
            
            <div class="advertisement">
                Advertisements
            </div>
    </body>
</html>



