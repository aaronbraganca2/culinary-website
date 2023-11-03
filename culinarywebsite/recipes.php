<html>
    <head>

        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lobster&family=Montserrat:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="http://localhost/expt4/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
                <div class="search-bar">


                    <div class="form1">
                        <div class="content-title font-bebasneue">Find Recipes:</div>
                        <input type="text" placeholder="Search.." id="live_search" autocomplete="off">
                        <br>

                    </div>

                </div>
                <br />
                <div id="searchresult">
                    <!-- this will display the output of livesearch.php -->
                    </div>
                <script type="text/javascript">
                        $(document).ready(function() {
                            $("#live_search").keyup(function() {
                                var input = $(this).val();
                                //alert(input);

                                if(input != "") {
                                    $.ajax({
                                        //if input is not empty, redirect to the url, use post method, and the data provided
                                        url: "livesearch_recipe.php",
                                        method: "POST",
                                        data: {input: input},

                                        success:function(data) {
                                            $("#searchresult").css("display", "block");
                                            $("#searchresult").html(data);
                                        }

                                    });
                                } else {
                                    $("#searchresult").css("display", "none");
                                }
                            });
                        });
                    </script>



            </div>
            <div class="advertisement">
                Advertisements
            </div>
        </div>

    </body>
</html>