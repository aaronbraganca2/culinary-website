<?php
$mysqli = require __DIR__ . "/database.php";

$recipeNewCount = $_POST['recipeNewCount'];

                    $sql = "SELECT * FROM recipe LIMIT $recipeNewCount";
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