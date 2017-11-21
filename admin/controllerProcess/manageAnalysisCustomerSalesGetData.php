<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../../connect/connection.php';

session_start();


//                      0                       1                       2                           3
$sql = " SELECT users.userEmail,users.userFName,users.userLName,SUM(orderdetail.amt) AS proAmt,SUM(orderdetail.qty) AS proQty "
        //    FROM AND JOIN CONDITION
        . " FROM orderdetail LEFT JOIN ordermaster ON (ordermaster.order_no = orderdetail.order_no) "
        //    JOIN CONDITION
        . " LEFT JOIN users ON (users.userEmail = ordermaster.customer_id) "
        //    JOIN CONDITION
        . " LEFT JOIN product ON (orderdetail.product_id = product.productID) "
        //    WHERECONDITION
        . " WHERE ordermaster.status = '1' GROUP BY users.userEmail; ";


$result = $con->query($sql);

$num = 1;
?>
<br>
<table class="table table-bordered" id="manageAnalysisCustomerSalesGetDataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>NO</th>
            <th>CUSTOMER ID</th>
            <th>CUSTOMER NAME</th>
            <th>TOTAL AMOUNT SPEND (RM)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {


                $longUserData = join("|", $row);


                echo "<tr>";
                echo "<input type='hidden' id='manageAnalysisCustomerSalesGetDataTableHiddenInput' name='customerManagementPageTableHiddenInput' value='" . $longUserData . "' readonly>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $row["userEmail"] . "</td>";
                echo "<td>" . $row["userFName"] . " " . $row["userLName"] . "</td>";
                echo "<td>" . $row["proAmt"] . "</td>";
                echo "</tr>";

                $num = $num + 1;
            }
        }
        ?>
    </tbody>
</table>
<br>

<script>
    $(document).ready(function () {

        $('#manageAnalysisCustomerSalesGetDataTable').DataTable({
            "language": {
                "emptyTable": "No Data To Be Displayed"
            },
            initComplete: function (settings, json) {
                $('.loading').hide();
            }
        });

    });



</script>