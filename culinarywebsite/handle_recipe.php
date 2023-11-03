<?php
session_start();
include 'C:/xampp/htdocs/expt4/database.php';

if(isset($_SESSION['user_id']))
{
    if(isset($_POST['scope']))
    {
        $scope = $_POST['scope'];
        switch($scope)
        {
            case("add"):

                $recipe_id = $_POST['recipe_id'];
                $user_id = $_SESSION['user_id'];

                $check_if_exists = "SELECT * FROM saved_recipe WHERE id='$user_id' AND r_id='$recipe_id'";
                $result1 = $mysqli->query($check_if_exists);
                if($result1->num_rows > 0){
                    echo "existing";
                }else {
                    $sql = "INSERT INTO saved_recipe (id, r_id) VALUES ('$user_id', '$recipe_id')";
                    $result = $mysqli->query($sql);
                    if($result)
                    {
                        echo 201;
                    }
                    else
                    {
                        echo 500;
                    }
                }
                break;
            case("delete"):
                $saved_recipe_id = $_POST['saved_recipe_id'];
                $user_id = $_SESSION['user_id'];

                $check_if_exists = "SELECT * FROM saved_recipe WHERE id='$user_id' AND sr_id='$saved_recipe_id'";
                $result1 = $mysqli->query($check_if_exists);
                if($result1->num_rows > 0){
                    $sql = "DELETE FROM saved_recipe WHERE sr_id='$saved_recipe_id'";
                    $result = $mysqli->query($sql);
                    if($result)
                    {
                        echo 200;
                    }
                    else
                    {
                        echo "Something went wrong.";
                    }
                }
                break;

            default:
                echo 500;

        }
    }

} else {

    echo 401;
}



?>