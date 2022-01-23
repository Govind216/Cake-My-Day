<?php 
    //Include Constants File
    //include('../config/constants.php');
    session_start();


    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost//cake-my-day/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_connect_error()); //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_connect_error()); //SElecting Database

    $customer_id=$_SESSION['cust1'];
    if(!$customer_id)
    {
        $customer_id=$_SESSION['cust2'];
    } 

    //Check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //Get the Value and Delete
        //echo "Get Value and Delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
     
        //Delete Data from Database
        //SQL Query to Delete Data from Database
        $sql = "DELETE FROM tbl_cart WHERE cart_id=$id ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the data is deleted from database or not
        if($res==true)
        {
            
            header('location:'.SITEURL.'manage-cart.php');
        }
        else
        {            
            echo 'failed to delete!';
            //header('location:'.SITEURL.'manage-cart.php');
        }

 

    }
    else
    {
        //redirect to Manage Cart Page
        
        header('location:'.SITEURL.'manage-cart.php');
    }
?>