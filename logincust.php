<?php include('config/constants.php'); ?>

<html>

<head>
    <title>Bakery Login</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body class="loginbackgimg">

    <div class="login logindec img-curve ">
        <h1 class="text-center menu main-content">Login</h1>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
        <br>

        <!-- Login Form Starts HEre -->
        <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn btn-primary">
            <br><br>


            <!-- Login Form Ends HEre -->
            <a href="<?php echo SITEURL; ?>addcustomer.php" class="btn btn-primary">Sign Up now </a><br><br><br>
            <a href="<?php echo SITEURL; ?>admin/login.php" class="btn btn-primary">Sign in as admin</a>
          

    </div>
    </form>

</body>

</html>

<?php

//CHeck whether the Submit Button is Clicked or NOt
if (isset($_POST['submit'])) {
    //Process for Login
    //1. Get the Data from Login form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //2. SQL to check whether the user with username and password exists or not
    //$sql= "SELECT * FROM tbl_customer WHERE username='$username' AND password='$password'";
    $sql = "SELECT * FROM tbl_customer WHERE customer_username='$username' AND customer_password='$password'";

    //3. Execute the Query
    $res = mysqli_query($conn, $sql);



    //4. COunt rows to check whether the user exists or not
    $count = mysqli_num_rows($res);



    if ($count == 1) {
        $b = mysqli_fetch_assoc($res);
        $customer_id = $b['customer_id'];
        //User AVailable and Login Success
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it
        $_SESSION['cust1'] = $customer_id;

        //REdirect to HOme Page/Dashboard
        header('location:' . SITEURL . 'index.php');
    } else {
        //User not Available and Login FAil
        $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
        //REdirect to HOme Page/Dashboard
        header('location:' . SITEURL . 'index.php');
    }
}

?>