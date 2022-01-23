<?php include('partials-front/menu.php'); ?>


<section class="food-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center b">Explore All Options</h2>

        <?php

        //Display all the cateories that are active
        //Sql Query
        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Count Rows
        $count = mysqli_num_rows($res);

        //CHeck whether categories available or not
        if ($count > 0) {
            //CAtegories Available
            while ($row = mysqli_fetch_assoc($res)) {
                //Get the Values
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
        ?>

                <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php
                        if ($image_name == "") {
                            //Image not Available
                            echo "<div class='error'>Image not found.</div>";
                        } else {
                            //Image Available
                        ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="item" class="img-responsive img-curve category-card-image">
                        <?php
                        }
                        ?>

                        <br><br><br>
                        <h3 class=" a text-center"><?php echo $title; ?></h3>
                    </div>
                </a>

        <?php
            }
        } else {
            //CAtegories Not Available
            echo "<div class='error'>Category not found.</div>";
        }

        ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->


<?php include('partials-front/footer.php'); ?>