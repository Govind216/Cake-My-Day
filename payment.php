<?php include('partials-front/menu.php'); ?>
<section class="payment">
    <div class="container">
        <h3 class="text-center b">Fill in this form to confirm you order</h3>
        <form action="" method="POST" class="payment">
            <fieldset>

                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Anushka Rao" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9876xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. abc@xyz.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="5" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                <div class="order-label">Mode of payment</div>
                <input type="radio" name="mop" value="online"> Online Payment <br><br>
                <input type="radio" name="mop" value="cod"> Cash On Delivery<br><br>

                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </fieldset>

        </form>
        <?php
        //CHeck whether food id is set or not
        $total = $_SESSION['total_amount'];

        $customer_id = $_SESSION['cust1'];
        if (!$customer_id) {
            $customer_id = $_SESSION['cust2'];
        }
        //CHeck whether submit button is clicked or not
        if (isset($_POST['submit'])) {
            // Get all the details from the form
            $name = $_POST['full-name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $phone = $_POST['contact'];
            $mop = $_POST['mop'];
            //$bill_no=1;

            //Save the Order in Databaase
            //Create SQL to save the data
            $sql2 = "INSERT INTO tbl_bill SET 
                
                customer_name='$name',
                customer_address='$address',
                customer_email='$email',
                customer_phone=$phone,
                payment_mod='$mop',
                amount=$total,
                bill_status='Undelivered',
                customer_id=$customer_id

                ";


            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Check whether query executed successfully or not
            if ($res2 == true) {
                $sql3 = "SELECT * FROM tbl_bill where customer_name='$name' and amount=$total ";
                $a = mysqli_query($conn, $sql3);
                $b = mysqli_fetch_assoc($a);
                $bill_no = $b['bill_no'];

                if ($mop == "cod") {
                    header('location:' . SITEURL . 'cod.php');
                    $_SESSION['bill1'] = $bill_no;
                } else if ($mop == "online") {
                    header('location:' . SITEURL . 'online_payment.php');
                    $_SESSION['bill2'] = $bill_no;
                }
            } else {
                echo 'Failed to submit form - try reloading the page';

                //Failed to Save Order
                //$_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";

                // header('location:'.SITEURL);
            }
        }

        ?>




        <?php include('partials-front/footer.php'); ?>