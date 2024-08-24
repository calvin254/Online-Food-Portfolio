
    <?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
    <div class="container" style="padding: 20px 0;">
        <h2 class="text-center">Food Menu</h2>

        <?php 
            // Display Foods that are Active
            $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

            // Execute the Query
            $res = mysqli_query($conn, $sql);

            // Count Rows
            $count = mysqli_num_rows($res);

            // Check whether the foods are available or not
            if ($count > 0) {
                // Foods Available
                echo '<div style="display: flex; flex-wrap: wrap; gap: 20px;">';
                while ($row = mysqli_fetch_assoc($res)) {
                    // Get the Values
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    ?>
                    <div style="flex: 1 1 calc(50% - 20px); box-sizing: border-box; background-color:whitesmoke; margin-bottom: 20px; border: 1px solid #ddd; padding: 10px; border-radius: 5px;">
                        <div class="food-menu-img">
                            <?php 
                                // Check whether image available or not
                                if ($image_name == "") {
                                    // Image not Available
                                    echo "<div class='error'>Image not Available.</div>";
                                } else {
                                    // Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" style="width: 100%; height: auto; display: block; border-radius: 5px;">
                                    <?php
                                }
                            ?>
                        </div>

                        <div class="food-menu-desc" style="text-align: center;">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">$<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                    <?php
                }
                echo '</div>';
            } else {
                // Food not Available
                echo "<div class='error'>Food not found.</div>";
            }
        ?>
        <div class="clearfix"></div>
    </div>
</section>


            

            

            

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>