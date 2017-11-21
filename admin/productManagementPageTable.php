<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../connect/connection.php';

session_start();

//                  1               2               3                   4             
$sql = " SELECT product.ID,product.productID,product.productName,product.productPrice,"
        //              5                       6     
        . " product.productQuantity,product.productCreatedBy "
        //       CONDITION
        . " FROM product ";

$result = $con->query($sql);

$num = 1;
?>
<br>
<table class="table table-bordered" id="productManagementPageTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>NO</th>
            <th>ID</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>QUANTITY</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {


                $longUserData = join("|", $row);


                echo "<tr>";
                echo "<input type='hidden' id='productManagementPageTableHiddenInput' name='productManagementPageTableHiddenInput' value='" . $longUserData . "' readonly>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $row["productID"] . "</td>";
                echo "<td>" . $row["productName"] . "</td>";
                echo "<td>" . $row["productPrice"] . "</td>";
                echo "<td>" . $row["productQuantity"] . "</td>";
                echo "<td align='center'>";
                echo '<a data-toggle="modal" data-target="#productModal" id="btnProductManagementPageTableUpdate"><i class="fa fa-edit fa-fw"></i></a> ';
                echo '<a data-toggle="modal" data-target="#" id="btnProductManagementPageTableDel"><i class="fa fa-trash-o fa-fw"></i></a> ';
                echo "</td>";
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

        $('#productManagementPageTable').DataTable({
            "language": {
                "emptyTable": "No Data To Be Displayed"
            },
            initComplete: function (settings, json) {
                $('.loading').hide();
            }
        });

    });



</script>