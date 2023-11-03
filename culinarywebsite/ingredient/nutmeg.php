<?php
session_start();
include('C:\xampp\htdocs\expt4\database.php');

$ingredient_filename = basename($_SERVER['PHP_SELF']);
$sql = "SELECT * FROM ingredient WHERE i_filename='{$ingredient_filename}'";

$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$i_id = $row["i_id"];



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
                <h1 class="recipe_title">Nutmeg</h1>

                <img class="recipe_img" src="nutmeg.png">

                <p class="recipe_desc">Nutmeg is a popular spice used around the world.
                It’s made from the seeds of the evergreen tree Myristica fragrans, which is indigenous to the Moluccas of Indonesia ⁠— also known as the Spice Islands
                </p>
                <h2 class="ingredients_title">Substitutes</h2>
                <ol class="ingredients">
                    <li>Mace</li>
                    <li>Garam masala</li>
                    <li>Cinnamon</li>
                    <li>Apple pie spice</li>
                    <li>Pumpkin pie spice</li>
                </ol>
                <h2 class="procedure_title">Details</h2>
                <p class="procedure">
                Mace is the best option if you’re looking for a replacement for nutmeg, as both spices come from the Myristica fragrans tree.

                While nutmeg originates from the seeds of the plant, mace is the outer covering of the seed known as an aril (1Trusted Source).

                You can replace nutmeg for mace at a 1:1 ratio.Garam masala is a popular spice blend used in Indian and other South Asian cuisines.

                Although its ingredients vary based on the geographical region, the mix usually contains nutmeg, mace, cloves, cinnamon, cardamom, and black pepper. It may also contain cumin, turmeric, saffron, fenugreek, star anise, or other regional spices (2Trusted Source).

                As most of the spices used in garam masala are similar in flavor to nutmeg, this blend is an excellent alternative.

                This spice can also be swapped in at a 1:1 ratio.Allspice comes from the berries of the evergreen tree Pimenta dioica. It’s also known as pimento or the Jamaican pepper (3).

                Its flavor is often described as a combination of nutmeg, pepper, juniper berries, and cinnamon. However, authentic allspice is made from the berries alone and not a blend of other spices.

                Allspice is commonly found in kitchen pantries, making it a convenient alternative to nutmeg.

                You can replace nutmeg with an equal amount of allspice in your recipes.
                </p>
            </div>
            
            <div class="advertisement">
                Advertisements
            </div>
    </body>
</html>



