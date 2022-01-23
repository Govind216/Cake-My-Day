<?php include('partials-front/menu.php'); ?>
<section class="food-menu">
    <div class="container">
        <h2 class="text-center b">Bill</h2>
        <h3 class="text-center b">Cake My Day Bakery</h2>
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
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Product</th>
                    <th>Dietary Restrictions</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                <?php
                $customer_id = $_SESSION['cust1'];
                if (!$customer_id) {
                    $customer_id = $_SESSION['cust2'];
                }

                //Query to Get all CAtegories from Database
                $sql = "SELECT * FROM tbl_cart WHERE customer_id=$customer_id and cart_status='active'";


                $total_amount = 0;
                //Execute Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Create Serial Number Variable and assign value as 1
                $sn = 1;

                //Check whether we have data in database or not
                if ($count > 0) {
                    //We have data in database
                    //get the data and display
                    while ($row = mysqli_fetch_assoc($res)) {
                        $name = $row['product_name'];
                        $quantity = $row['product_quantity'];
                        $diet = $row['diet'];
                        $tprice = $row['product_totalprice'];
                        $total_amount = $total_amount + $tprice;
                ?>


                        <tr>
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $name; ?></td>


                            <td><?php echo $diet; ?></td>

                            <td><?php echo $quantity; ?></td>

                            <td><?php echo $tprice; ?></td>

                        </tr>


                    <?php

                    }
                } else {
                    //WE do not have data
                    //We'll display the message inside table
                    ?>
                    <h3 class="text-center b">Error in generating bill!</h2>


                    <?php header('location:' . SITEURL . 'manage-cart.php');
                }     ?>

            </table>
            <br><br><br>
            <h3 class="text-center b">Total Amount : <?php echo 'Rs. ', $total_amount ?></h2>
                <br><br><br>
                <form action="" method="POST" class="payment">
                    <fieldset>

                        <div class="order-label">Do you want to continue payment with your pre-existing personal information?</div>
                        <input type="radio" name="choice" value="yes"> Yes <br><br>
                        <input type="radio" name="choice" value="no"> No<br><br>

                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </fieldset>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    if ($_POST['choice'] == 'yes') {
                        $_SESSION['total_amount'] = $total_amount;
                        header('location:' . SITEURL . 'payment1.php');
                    } else if ($_POST['choice'] == 'no') {
                        $_SESSION['total_amount'] = $total_amount;
                        header('location:' . SITEURL . 'payment.php');
                    }
                }

                ?>

                <br><br><br>

                <?php include('partials-front/footer.php'); ?>