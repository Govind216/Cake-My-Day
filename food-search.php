<?php include('partials-front/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <?php
        //Get the Search Keyword
        $search = $_POST['search'];
        ?>
        <br>
        <h2 class="b"> Foods on Your Search <a href="#" class="a">"<?php echo $search; ?>"</a></h2>
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu ">
    <div class="container">
        <h2 class="text-center b">Relevant Items</h2>

        <?php

        //SQL Query to Get foods based on search keyword
        $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Count Rows
        $count = mysqli_num_rows($res);

        //Check whether food available of not
        if ($count > 0) {
            //Food Available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the details
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                $discount = $row['discount'];

        ?>

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php
                        // Check whether image name is available or not
                        if ($image_name == "") {
                            //Image not Available
                            echo "<div class='error'>Image not Available.</div>";
                        } else {
                            //Image Available
                        ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="item" class="img-responsive img-curve card-image">
                        <?php

                        }
                        ?>

                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">
                            <?php

                            //calculating discount
                            if ($discount == '0%') {
                                echo ('₹' . $price . "<br><br>");
                            } else if ($discount == '25%') {
                                echo ('Real Price: ₹' . ($price) . "<br>");
                                echo ('Discounted Price: ₹' . (0.75 * $price));
                            } else if ($discount == '40%') {
                                echo ('Real Price: ₹' . ($price) . "<br>");
                                echo ('Discounted Price: ₹' . (0.6 * $price));
                            } else if ($discount == '50%') {
                                echo ('Real Price: ₹' . ($price) . "<br>");
                                echo ('Discounted Price: ₹' . (0.5 * $price));
                            }

                            ?>
                        </p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>


                        <a href="<?php echo SITEURL; ?>customercart.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>

        <?php
            }
        } else {
            //Food Not Available
            echo "<div class='error'>Food not found.</div>";
        }

        ?>

        <div class="clearfix"></div>

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>