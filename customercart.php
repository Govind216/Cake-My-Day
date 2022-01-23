<?php include('partials-front/menu.php'); ?>
<section class="cart">
    <div class="container">
        <h2 class="text-center b">Add item to Cart</h2>


        <?php
        $customer_id = $_SESSION['cust1'];
        if (!$customer_id) {
            $customer_id = $_SESSION['cust2'];
        }
        //echo $customer_id;
        //CHeck whether food id is set or not
        if (isset($_GET['food_id'])) {
            //Get the Food id and details of the selected food
            $food_id = $_GET['food_id'];
            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if ($count == 1) {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $discount = $row['discount'];
                $image_name = $row['image_name'];
                $discount_amount;
            } else {
                //Food not Availabe
                //REdirect to Home Page
                header('location:' . SITEURL);
            }
        } else {
            //Redirect to homepage
            header('location:' . SITEURL);
        }

        //calculating discount
        if ($discount == '0%') {
            $discount_amount = $price;
        } else if ($discount == '25%') {
            $discount_amount = 0.75 * $price;
        } else if ($discount == '40%') {
            $discount_amount = 0.6 * $price;
        } else if ($discount == '50%') {
            $discount_amount = 0.5 * $price;
        }


        ?>

        <form action="" method="POST" class="order">
            <fieldset>
                <div class="food-menu-img">
                    <?php
                    //CHeck whether the image is available or not
                    if ($image_name == "") {
                        //Image not Availabe
                        echo "<div class='error'>Image not Available.</div>";
                    } else {
                        //Image is Available
                    ?>
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="item" class="img-responsive img-curve">
                    <?php
                    }

                    ?>

                </div>
                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">

                    <p class="food-price">$<?php echo $discount_amount; ?></p>
                    <input type="hidden" name="price" value="<?php echo $discount_amount; ?>">

                    <div class="order-label">Enter Quantity</div>
                    <input type="number" name="qty" class="input-responsive" min="1" value="1" required>


                    <p class="order-label">Dietary Restrictions</p>
                    <input type="radio" name="diet" value="Sugar-free"> Sugar-free <br>
                    <input type="radio" name="diet" value="Eggless"> Eggless<br>
                    <input type="radio" name="diet" value="Vegan"> Vegan<br>
                    <input type="radio" name="diet" value="None"> None<br>
                    <br><br>

                    <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
                </div>

            </fieldset>
        </form>
        <?php


        //CHeck whether submit button is clicked or not
        if (isset($_POST['submit'])) {
            // Get all the details from the form

            $qty = $_POST['qty'];
            if (!$_POST['diet'])
                $dietry = 'none';
            else $dietry = $_POST['diet'];
            $total = $discount_amount * $qty;

            //Save the Order in Databaase
            //Create SQL to save the data

            // $id=1;
            $sql2 = "INSERT INTO tbl_cart SET 
            /*cart_id=$id,*/
            product_id=$food_id,
            product_quantity=$qty,
            product_price=$discount_amount,
            product_name='$title',
            product_image='$image_name',
            product_totalprice=$total, 
            diet='$dietry',
            customer_id=$customer_id,
            cart_status='active'      

            ";
            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);
            //4. Check whether the query executed or not and data added or not
            if ($res2 == true) {
                //Query Executed and Category Added
                // $_SESSION['cart1'] = "<div class='success'> added to cart</div>";

                //Redirect to Manage Category Page
                header('location:' . SITEURL . 'manage-cart.php');
            } else {
                //Failed to Add CAtegory
                // $_SESSION['cart2'] = "<div class='error'>Failed to Add to Cart.</div>";
                echo 'Failed to add to cart!';
                //Redirect to Manage Category Page
                // header('location:'.SITEURL.'customercart.php');
            }
        }

        ?>



    </div>
</section>

<?php include('partials-front/footer.php'); ?>