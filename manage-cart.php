<?php include('partials-front/menu.php'); ?>
<section class="food-menu">
    <div class="container">
        <h2 class="text-center b">Shopping Cart</h2>
        <style>
            table,
            td,
            th {

                border: 1px solid #ddd;
                text-align: left;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                padding: 15px;
            }
        </style>

        <?php
        $customer_id = $_SESSION['cust1'];
        if (!$customer_id) {
            $customer_id = $_SESSION['cust2'];
        }

        //Query to Get all CAtegories from Database
        $sql = "SELECT * FROM tbl_cart WHERE customer_id=$customer_id and cart_status = 'active'";

        //Execute Query
        $res = mysqli_query($conn, $sql);

        //Count Rows
        $count = mysqli_num_rows($res);

        //Create Serial Number Variable and assign value as 1
        $sn = 1;
        $total_amount = 0;
        //Check whether we have data in database or not
        if ($count > 0) {
        ?> <table>
                <tr>
                    <th>S.No</th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Dietary Restrictions</th>
                    <th>Total Price</th>
                    <th>Remove from cart</th>
                </tr>
                <?php
                //We have data in database
                //get the data and display
                while ($row = mysqli_fetch_assoc($res)) {
                    $name = $row['product_name'];
                    $image = $row['product_image'];
                    $price = $row['product_price'];
                    $quantity = $row['product_quantity'];
                    $diet = $row['diet'];
                    $tprice = $row['product_totalprice'];
                    $id = $row['cart_id'];
                    $total_amount = $total_amount + $tprice;




                ?>


                    <tr>
                        <td><?php echo $sn++; ?>. </td>
                        <td><?php echo $name; ?></td>

                        <td>

                            <?php
                            //Check whether image name is available or not
                            if ($image != "") {
                                //Display the Image
                                //echo $image;
                            ?>

                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image; ?>" class="img-responsive img-curve card-image">


                            <?php
                            } else {
                                //DIsplay the MEssage
                                echo "<div class='error'>Image not Added.</div>";
                            }
                            ?>

                        </td>

                        <td><?php echo $price; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td><?php echo $diet; ?></td>
                        <td><?php echo $tprice; ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>delete-cart.php?id=<?php echo $id; ?>&image_name=<?php echo $image; ?>" class="btn btn-primary">Delete </a>
                        </td>
                    </tr>


                <?php

                }
            } else {

                //WE do not have data
                //We'll display the message inside table
                ?>
                <h2 class="text-center b">Cart is Empty !</h2>

                <br><br><br>
                <a href="<?php echo SITEURL; ?>foods.php" class="btn btn-primary">Continue Shopping!</a>


            <?php die();
            }     ?>
            </table>

            <br><br><br>
            <h3 class="text-center b">Total Amount : <?php echo 'Rs. ', $total_amount ?></h2>
                <br><br><br>
                <a href="<?php echo SITEURL; ?>foods.php" class="btn btn-primary">Continue Shopping!</a>
                <a href="<?php echo SITEURL; ?>bill.php" class="btn btn-primary">Proceed to Pay</a>


                <br><br><br><br><br><br><br><br>
                <?php include('partials-front/footer.php'); ?>