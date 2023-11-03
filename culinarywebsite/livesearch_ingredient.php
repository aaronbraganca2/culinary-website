<?php
    include("database.php");
    if(isset($_POST['input'])) {
        $input = $_POST['input'];

        $sql = "SELECT * FROM ingredient WHERE i_name LIKE '%{$input}%'";

        $result = $mysqli->query($sql);

        if($result->num_rows > 0){ 
            while($rows = $result->fetch_assoc()){
               
                $i_id = $rows['i_id'];
                $i_name = $rows['i_name'];
                $i_img = $rows['i_img'];
                $i_filename = $rows['i_filename'];
                $i_desc = $rows['i_desc'];
             ?>

                <div class="item_card">
                    <a href=<?php echo 'ingredient/'.$i_filename?> >
                        <img src=<?php echo 'ingredient/'.$i_img?> class="item_image">
                        <div class="item_details">
                                <p class="item_title"><?php echo $i_name?></p>

                            <div class="item_desc">
                                <p>
                                <?php echo $i_desc?>
                                </p>
                            </div>
    
                        </div>
                    </a>
                </div>


            
<?php }

        } else {
            echo "<h2 class='font-bebasneue'>Ingredient not found</h2>";
        }
    }
?>