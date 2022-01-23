<?php include('partials-front/menu.php'); ?>
<link rel="stylesheet" href="css/admin.css">

<br><br>
<div class="main-content">
    <div class="wrapper">
        <h1>Feedback</h1>

        <br><br>

        <?php
        if (isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['add']; //Display the SEssion Message if SEt
            unset($_SESSION['add']); //Remove Session Message
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">

                    </td>
                </tr>

                <tr>
                    <td>Feedback</td>
                    <td>
                        <input type="text" name="feedback" placeholder="Your Feedback" style="height:100px;">
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="submit" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        <?php
        //Process the Value from Form and Save it in Database

        //Check whether the submit button is clicked or not

        if (isset($_POST['submit'])) {
            // Button Clicked
            //echo "Button Clicked";

            //1. Get the Data from form
            $full_name = $_POST['full_name'];
            $feedback = $_POST['feedback'];




            //2. SQL Query to Save the data into database
            $sql = "INSERT INTO tbl_feedback SET 
            customer_name='$full_name',
            customer_feedback='$feedback'
            ";

            //3. Executing Query and Saving Data into Datbase
            $res = mysqli_query($conn, $sql); //or die(mysqli_connect_error());
            //echo $res;
            //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
            if ($res == TRUE) {
                //Data Inserted
                //echo "Data Inserted";
                //Create a Session Variable to Display Message
                $_SESSION['add'] = "<div class='success'>Feedback Submitted.</div>";
                //Redirect Page to Manage Admin
                header("location:" . SITEURL . 'index.php');
            } else {
                //FAiled to Insert DAta
                //echo "Faile to Insert Data";
                //Create a Session Variable to Display Message
                $_SESSION['add'] = "<div class='error'>Failed to submit feedback.</div>";
                //Redirect Page to Add Admin
                header("location:" . SITEURL . 'feedback.php');
            }
        }

        ?>
    </div>
</div>
<br><br>
<?php include('partials-front/footer.php'); ?>