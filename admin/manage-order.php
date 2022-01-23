<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
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

        <br /><br /><br />

        <?php
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <br><br>

        <table>
            <tr>
                <th>S.No.</th>
                <th>Bill no. </th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Mode</th>
                <th>Amount</th>
                <th>Card type</th>
                <th>Card Number</th>
                <th>Bill status</th>

            </tr>

            <?php
            //Get all the orders from database
            $sql = "SELECT * FROM tbl_bill ORDER BY bill_no DESC"; // DIsplay the Latest Order at First
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count the Rows
            $count = mysqli_num_rows($res);

            $sn = 1; //Create a Serial Number and set its initail value as 1

            if ($count > 0) {
                //Order Available
                while ($row = mysqli_fetch_assoc($res)) {
                    //Get all the order details
                    $bill_no = $row['bill_no'];
                    $customer_name = $row['customer_name'];
                    $address = $row['customer_address'];
                    $email = $row['customer_email'];
                    $phone = $row['customer_phone'];
                    $mode = $row['payment_mod'];
                    $amount = $row['amount'];
                    $card_type = $row['card_type'];
                    $card_number = $row['card_number'];
                    $status = $row['bill_status'];
                    $customer_id = $row['customer_id'];

            ?>

                    <tr>
                        <td><?php echo $sn++; ?>. </td>
                        <td><?php echo $bill_no; ?></td>
                        <td><?php echo $customer_name; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $mode; ?></td>
                        <td><?php echo $amount; ?></td>
                        <td><?php echo $card_type; ?></td>
                        <td><?php echo $card_number; ?></td>



                        <td>
                            <?php


                            if ($status == "Delivered") {
                                echo "<label style ='color: green;'>$status</label>";
                            } elseif ($status == "Undelivered") {
                                echo "<label style='color: red;'>$status</label>";
                            }
                            ?>
                        </td>




                    </tr>

            <?php

                }
            } else {
                //Order not Available
                echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
            }
            ?>


        </table>
    </div>

</div>

<?php include('partials/footer.php'); ?>