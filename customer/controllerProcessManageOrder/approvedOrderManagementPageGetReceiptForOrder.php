<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include '../../connect/connection.php';

session_start();

// Parameter
$viewOrderNo = $_POST["viewOrderNo"];
$userID = $_POST["userID"];


// Variable
$customer_id = "";
$dateTxt = "";
$total_amt = "";
$total_qty = "";
$userFName = "";
$userLName = "";
$userAddress = "";
$userPhone = "";


//                      0                       1                       2           
$sql = " SELECT ordermaster.order_no, ordermaster.customer_id, ordermaster.dateTxt, "
        //          3                       4                   5                        
        . " ordermaster.total_amt, ordermaster.total_qty, ordermaster.status, "
        //          6               7               8               9               10
        . " users.userEmail,users.userFName,users.userLName,users.userAddress,users.userPhone  "
        //    FROM AND JOIN CONDITION
        . " FROM ordermaster JOIN users ON (users.userEmail = ordermaster.customer_id) "
        //    WHERECONDITION
        . " WHERE ordermaster.order_no = '$viewOrderNo' LIMIT 1; ";

$result = $con->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $customer_id = $row["userEmail"];
        $dateTxt = $row["dateTxt"];
        $total_amt = $row["total_amt"];
        $total_qty = $row["total_qty"];
        $userFName = $row["userFName"];
        $userLName = $row["userLName"];
        $userAddress = $row["userAddress"];
        $userPhone = $row["userPhone"];
    }
}


//                      0                       1                       2           
$sqlDetail = " SELECT orderdetail.order_no, orderdetail.product_id, orderdetail.amt, "
        //          3                       4                   5                        
        . " orderdetail.qty, product.productName, product.productPrice "
        //    FROM AND JOIN CONDITION
        . " FROM orderdetail LEFT JOIN product ON (orderdetail.product_id = product.productID)"
        //    WHERECONDITION
        . " WHERE orderdetail.order_no = '$viewOrderNo'; ";

$resultDetail = $con->query($sqlDetail);


$num = 1;
?>

<div id="approvedOrderManagementPageGenerateRecieptForPrintContainer" >
    <div style=" margin: auto; width: 90%;">
        <br>
        <div id="mainConainerForBillReciept">
            <div class="center-block"  style="text-align: center;">
                <hr/>
                <p style="font-weight: bold;font-size: 13pt;">Receipt No. : <?php echo $viewOrderNo ?><br>Date :<?php echo date("d/m/Y") ?></p>
                <hr/>
            </div>
            <div> &nbsp;</div>
            <div class="center-block row" >
                <div class="col-md-6" style="font-size: 10pt; display: table-cell;padding-left: 10px;padding-right: 20px;">
                    <p><b>Customer ID</b>   : <?php echo $customer_id ?></p>
                    <p><b>Name</b>          : <?php echo $userFName . " " . $userLName ?></p>
                    <p><b>Address</b>       : <?php echo $userAddress ?></p>
                </div>
                <div class="col-md-6"  style="font-size: 10pt;display: table-cell;padding-left: 20px;padding-right: 10px;">
                    <p><b>Phone No.</b>     : <?php echo $userPhone ?></p>
                    <p><b>Order No.</b>     : <?php echo $viewOrderNo ?></p>
                    <p><b>Order Date</b>    : <?php echo $dateTxt ?></p>
                </div>
            </div>  
            <br><br>
            <div class="center-block" style="align-content: center;">
                <table class="table table-filter table-striped table-bordered" width="100%" cellpadding="5" style="font-size: 10pt;">
                    <thead>
                    <th style="border-bottom: 1px solid #000;border-top: 1px solid #000;">No</th>
                    <th style="border-bottom: 1px solid #000;border-top: 1px solid #000;">Code</th>
                    <th style="border-bottom: 1px solid #000;border-top: 1px solid #000;">Description</th>
                    <th style="text-align: center;border-bottom: 1px solid #000;border-top: 1px solid #000;">Unit<br>Price</th>
                    <th style="text-align: center;border-bottom: 1px solid #000;border-top: 1px solid #000;">Quantity</th>
                    <th style="text-align: center;border-bottom: 1px solid #000;border-top: 1px solid #000;">Total<br>Amount</th>
                    </thead>
                    <tbody>
                        <?php
                        if ($resultDetail->num_rows > 0) {

                            while ($rowDetail = $resultDetail->fetch_assoc()) {


                                $longUserData = join("|", $rowDetail);


                                echo "<tr>";
                                echo "<td>" . $num . "</td>";
                                echo "<td>" . $rowDetail["product_id"] . "</td>";
                                echo "<td>" . $rowDetail["productName"] . "</td>";
                                echo "<td style='text-align: center;'>" . $rowDetail["productPrice"] . "</td>";
                                echo "<td style='text-align: center;'>" . $rowDetail["qty"] . "</td>";
                                echo "<td style='text-align: center;'>" . $rowDetail["amt"] . "</td>";
                                echo "</tr>";

                                $num = $num + 1;
                            }
                        }
                        ?>

                        <tr >
                            <td colspan="2" style="border-top: 1px solid #000;"></td>
                            <td colspan="3" style="text-align: right;font-weight: bold;border-top: 1px solid #000;">Sub-Total (RM) :</td>
                            <td colspan="1" style="text-align: center;font-weight: bold;border-top: 1px solid #000;"><?php echo $total_amt ?></td>
                        </tr>

                        <tr>
                            <td colspan="2" ></td>
                            <td colspan="3" style="text-align: right;font-weight: bold;">Total Quantity :</td>
                            <td colspan="1" style="text-align: center;font-weight: bold;"><?php echo $total_qty ?></td>
                        </tr>


                        <tr>
                            <td colspan="3" ></td>
                            <td colspan="2" style="text-align: right; font-weight: bold;border-bottom: 2px solid black;border-top: 2px solid black;">Grand Total (RM) :</td>
                            <td colspan="1" style="text-align: center;font-weight: bold;border-bottom: 2px solid black;border-top: 2px solid black;"><?php echo $total_amt ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>  
            <br><br>
            <hr/>
            <div class="center-block">
                <div style="font-size: 12pt;text-align: center;font-weight: bold;">
                    <p>***** Thank You *****</p>
                </div>
            </div>  
            <hr/>
        </div>  
    </div>
</div>