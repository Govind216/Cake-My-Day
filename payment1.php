<?php include('partials-front/menu.php'); ?>
<?php
$customer_id = $_SESSION['cust1'];
if (!$customer_id) {
    $customer_id = $_SESSION['cust2'];
}
$sql = "SELECT * FROM tbl_customer WHERE customer_id=$customer_id ";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

$name = $row['customer_name'];
$address = $row['customer_address'];
$phone = $row['customer_phoneno'];
$email = $row['customer_email'];
?>

<div class="food-menu-desc">
    <h3><?php echo 'Full Name : ';
        echo $name; ?></h3><br><br>
    <h3><?php echo 'Address : ';
        echo $address; ?></h3><br><br>
    <h3><?php echo 'Phone : ';
        echo $phone; ?></h3><br><br>
    <h3><?php echo 'email : ';
        echo $email; ?></h3>

    <?php
    //CHeck whether food id is set or not
    if (isset($_GET['total'])) {
        //Get the Food id and details of the selected food
        $total = $_GET['total'];
    } ?>
    <form action="" method="POST" class="payment">
        <fieldset>

            <div class="order-label">Mode of payment</div>
            <input type="radio" name="mop" value="online"> Online Payment <br><br>
            <input type="radio" name="mop" value="cod"> Cash On Delivery<br><br>

            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </fieldset>

    </form>

    <?php

    $total = $_SESSION['total_amount'];

    //CHeck whether submit button is clicked or not
    if (isset($_POST['submit'])) {

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