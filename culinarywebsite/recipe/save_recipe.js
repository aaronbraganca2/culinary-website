$(document).ready(function(){
    $(".bookmark_recipe").click(function(e){
        var recipe_id = $(this).val(); //gets recipe id

        $.ajax({
                    url: "http://localhost/expt4/handle_recipe.php",
                    method: "POST",
                    data: {"recipe_id": recipe_id,
                        "scope" : "add"},
                        success: function(response){
                            if(response == 201){
                                alert("Recipe Saved");
                            } else if(response == "existing"){
                                alert("Recipe already saved");
                            }else if(response == 401){
                                alert("Login to continue");
                            }else if(response == 500){
                                alert("Something went wrong");
                            }
                        }


                });
    });
})