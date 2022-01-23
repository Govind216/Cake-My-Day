<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Feedback</h1>

        <br /><br />
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Feedback</th>
            </tr>

            <?php
            //Create a SQL Query to Get all the Food
            $sql = "SELECT * FROM tbl_feedback";

            //Execute the qUery
            $res = mysqli_query($conn, $sql);
            //Count Rows to check whether we have foods or not
            $count = mysqli_num_rows($res);

            //Create Serial Number VAriable and Set Default VAlue as 1
            $sn = 1;

            if ($count > 0) {
                //We have food in Database
                //Get the Foods from Database and Display
                while ($row = mysqli_fetch_assoc($res)) {
                    //get the values from individual columns
                    $fullname = $row['customer_name'];
                    $feedback = $row['customer_feedback'];
            ?>
                    <tr>
                        <td><?php echo $sn++; ?>. </td>
                        <td><?php echo $fullname; ?></td>
                        <td><?php echo $feedback; ?></td>
                    </tr>
            <?php
                }
            } else {
                //Food not Added in Database
                echo "<tr> <td colspan='7' class='error'> No Feedback. </td> </tr>";
            }

            ?>


        </table>
    </div>

</div>

<?php include('partials/footer.php'); ?>