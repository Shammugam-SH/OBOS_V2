<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../../connect/connection.php';


session_start();

$viewOrderNo = $_POST["viewOrderNo"];

//                      0                       1                       2           
$sql = " SELECT orderdetail.order_no, orderdetail.product_id, orderdetail.amt, "
        //          3                       4                   5                        
        . " orderdetail.qty, product.productName, product.productPrice "
        //    FROM AND JOIN CONDITION
        . " FROM orderdetail LEFT JOIN product ON (orderdetail.product_id = product.productID)"
        //    WHERECONDITION
        . " WHERE orderdetail.order_no = '$viewOrderNo'; ";

$result = $con->query($sql);

$num = 1;
?>
<br>
<table class="table table-bordered" id="newOrderManagementPageGetDetailsTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>NO</th>
            <th>PRODUCT ID</th>
            <th>PRODUCT NAME</th>
            <th>PRODUCT PRICE</th>
            <th>TOTAL QTY</th>
            <th>TOTAL AMT (RM)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {


                $longUserData = join("|", $row);


                echo "<tr>";
                echo "<input type='hidden' id='newOrderManagementPageGetDetailsTableHiddenInput' name='newOrderManagementPageTableHiddenInput' value='" . $longUserData . "' readonly>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $row["product_id"] . "</td>";
                echo "<td>" . $row["productName"] . "</td>";
                echo "<td>" . $row["productPrice"] . "</td>";
                echo "<td>" . $row["qty"] . "</td>";
                echo "<td>" . $row["amt"] . "</td>";
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

        $('#newOrderManagementPageGetDetailsTable').DataTable({
            "language": {
                "emptyTable": "No New Order To Be Displayed"
            }
        });

    });


</script>