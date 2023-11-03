$(document).on('click', '.remove-from-saved', function(){
        var sr_id = $(this).val();
        //alert(sr_id);
        $.ajax({
            url: "http://localhost/expt4/handle_recipe.php",
            method: "POST",
            data: {"saved_recipe_id": sr_id,
                "scope" : "delete"},
                success: function(response){
                    if(response == 200){
                        alert("Recipe Removed");
                        $('#saved-recipes').load(location.href + " #saved-recipes")
                    } else{
                        alert(response);
                    }
                }


        });
});
