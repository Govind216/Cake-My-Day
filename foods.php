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
<section class="food-menu flex-container">
    <div class="container">
        <h2 class="text-center b">Bakery Items</h2>

        <?php
        //Display Foods that are Active
        $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Count Rows
        $count = mysqli_num_rows($res);

        //CHeck whether the foods are availalable or not
        if ($count > 0) {
            //Foods Available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the Values
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                $discount = $row['discount'];
                //$dietery_restrictions = $row['dietery_restrictions'];

        ?>

                <div class="food-menu-box">
                    <div class="food-menu-img pics_in_a_row">
                        <?php
                        //CHeck whether image available or not
                        if ($image_name == "") {
                            //Image not Available
                            echo "<div class='error'>Image not Available.</div>";
                        } else {
                            //Image Available
                        ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="product" class="img-responsive img-curve card-image">
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
            //Food not Available
            echo "<div class='error'>Food not found.</div>";
        }
        ?>

        <div class="clearfix"></div>

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>