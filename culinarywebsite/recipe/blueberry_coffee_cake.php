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
                    <a href="C:/xampp/htdocs/expt4/logout.php">Logout</a>
                </div>
               
            </div>
            <div class="navbar font-bebasneue">
                   
                <a href="http://localhost/expt4/about.html">About Us</a>
                <a href="http://localhost/expt4/recipes.php">Recipes</a>
                <a href="http://localhost/expt4/ingredients.php">Ingredients</a>  
                <a href="http://localhost/expt4/account.php">Account</a>   
                    
            </div>
            <div class="content">
                <h1 class="recipe_title">Blueberry Coffee Cake</h1>
                <div class="user_rating">
                    <button class="user_star" onclick="addRating()">&#9734;</button>
                    <button class="user_star" onclick="addRating()">&#9734;</button>
                    <button class="user_star" onclick="addRating()">&#9734;</button>
                    <button class="user_star" onclick="addRating()">&#9734;</button>
                    <button class="user_star" onclick="addRating()">&#9734;</button>
                    
                </div>
                <button class="bookmark_recipe" value="<?= $r_id ?>"><img class="bookmark_image" src="bookmark.png"></button>

                <img class="recipe_img" src="blueberry_coffee_cake.png">

                <p class="recipe_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
                </p>
                <h2 class="ingredients_title">Ingredients</h2>
                <ol class="ingredients">
                    <li>0.5 cup water</li>
                    <li>2 tablespoons soy sauce</li>
                    <li>2 tablespoons brown sugar</li>
                    <li>One fresh pineapple, cored and cut into 1 1/2-inch pieces</li>
                    <li>1 pound jumbo shrimp</li>
                    <li>1 teaspoon grated fresh garlic</li>
                    <li>1 tablespoon toasted sesame seeds (Optional)</li>

                </ol>
                <h2 class="procedure_title">Procedure</h2>
                <p class="procedure">The recipe procedure goes here - Mix marinade – For convenience, just mix the marinade directly in a ziplock bag. A bag works best because the chicken remains nicely coated in the marinade. If you prefer to use a container, either turn the chicken a few times or increase the marinade by 50%.

                    Add chicken into the marinade. Seal the bag, removing excess air, then massage to coat from the outside. Leave to marinade for 12 to 24 hours in the fridge. If you’re pressed for time, even 3 hours will do!
                    
                    Yogurt sauce – Make the yogurt sauce simply by mixing the ingredients then set aside for at least 20 minutes to let the flavours meld. This will keep for 3 days in the fridge.
                    
                    Cook chicken either on the stove or on the BBQ. It will get a great crust on it from the spices, and you will adore the smell. It’s intoxicating!
                    
                    Rest chicken for at least 3 minutes before serving to allow the juices to redistribute throughout the flesh, else they will just run out everywhere when you slice the meat.
                    
                    To serve, just pile everything on a platter and let everybody make their own wraps! The chicken, lettuce, tomato slices, onion, yogurt sauce and warmed flatbreads – homemade or store bought. If the chicken is on the larger side, I sometimes slice it. But if they are smaller, I tend to just leave them whole.</p>
            </div>
            
            <div class="advertisement">
                Advertisements
            </div>
    </body>
</html>



