<?php include('config/constants.php'); ?>
<link rel="stylesheet" href="css/admin.css">

<title>SignUp - Customer</title>
<div class="main-content">
    <div class="wrapper">
        <h1 class="coloura">Sign Up Now</h1>

        <br>
        <h3 class="error">*required</h3>
        <br>
        <?php
        if (isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['add']; //Display the SEssion Message if SEt
            unset($_SESSION['add']); //Remove Session Message
        }
        ?>
        <?php
        //Checking if all the fields are filled

        $full_nameErr = $usernameErr = $passwordErr = $emailErr = $addressErr = $phoneErr = "";

        if (empty($_POST["full_name"])) {
            $full_nameErr = "";
        }
        if (empty($_POST["username"])) {
            $usernameErr = "";
        }
        if (empty($_POST["password"])) {
            $passwordErr = "";
        }
        if (empty($_POST["email"])) {
            $emailErr = "";
        }
        if (empty($_POST["address"])) {
            $addressErr = "";
        }
        if (empty($_POST["phone"])) {
            $phoneErr = "";
        }
        ?>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                        <span class="error">* <?php echo $full_nameErr; ?></span>
                        <br><br>

                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                        <span class="error">* <?php echo $usernameErr; ?></span>
                        <br><br>


                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                        <span class="error">* <?php echo $passwordErr; ?></span>
                        <br><br>


                    </td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="email" name="email" placeholder="Your Email ID">
                        <span class="error">* <?php echo $emailErr; ?></span>
                        <br><br>


                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>
                        <input type="text" name="address" placeholder="Your Address">
                        <span class="error">* <?php echo $addressErr; ?></span>
                        <br><br>


                    </td>
                </tr>
                <tr>
                    <td>Phone No</td>
                    <td>
                        <input type="number" name="phone" placeholder="Your Phone Number">
                        <span class="error">* <?php echo $phoneErr; ?></span>
                        <br><br>

                    </td>
                </tr>





                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Sign Up" class="btn btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>



<?php

//Process the Value from Form and Save it in Database

//Check whether the submit button is clicked or not
if ((isset($_POST['submit'])) and ((empty($_POST["full_name"])) or (empty($_POST["username"])) or (empty($_POST["password"])) or (empty($_POST["email"])) or (empty($_POST["address"])) or (empty($_POST["phone"])))) {
    $_SESSION['add'] = "<div class='error'>Failed to Add Customer.</div>";
    //Redirect Page to Add Admin
    header("location:" . SITEURL . 'addcustomer.php');
} elseif (isset($_POST['submit'])) {
    // Button Clicked
    //echo "Button Clicked";

    //1. Get the Data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Password Encryption with MD5
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];


    //2. SQL Query to Save the data into database
    $sql = "INSERT INTO tbl_customer SET 
            customer_name='$full_name',
            customer_username='$username',
            customer_password='$password',
            customer_email='$email',
            customer_address='$address',
            customer_phoneno='$phone'
        ";

    //3. Executing Query and Saving Data into Datbase
    $res = mysqli_query($conn, $sql); // or die(mysqli_connect_error());

    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res == TRUE) {
        //Data Inserted
        //echo "Data Inserted";
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='success'>Customer Added Successfully.</div>";
        //Redirect Page to Manage Admin
        header("location:" . SITEURL . 'logincust.php');
    } else {
        //FAiled to Insert DAta
        //echo "Faile to Insert Data";
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='error'>Failed to Add Customer.</div>";
        //Redirect Page to Add Admin
        header("location:" . SITEURL . 'addcustomer.php');
    }
}

?>