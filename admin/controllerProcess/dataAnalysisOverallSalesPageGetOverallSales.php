<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include '../../connect/connection.php';

session_start();


//                      0                       1                       2           
$sqlSales = " SELECT ordermaster.order_no, ordermaster.customer_id, ordermaster.dateTxt, "
        //          3                       4                   5                        
        . " SUM(ordermaster.total_amt) AS SALES, SUM(ordermaster.total_qty) AS QTY, ordermaster.status "
        //    FROM AND JOIN CONDITION
        . " FROM ordermaster  "
        //    WHERECONDITION
        . " WHERE ordermaster.status = '1'; ";

$resultSales = $con->query($sqlSales);


// Variable
$totalSales = "";
$totalQty = "";


if ($resultSales->num_rows > 0) {

    while ($row = $resultSales->fetch_assoc()) {

        $totalSales = $row["SALES"];
        $totalQty = $row["QTY"];
    }
}
?>


<div class="row">

    <div class="col-xl-12 col-sm-12 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-money"></i>
                </div>
                <strong>
                    <div style="font-size: 40px;"> RM  <?php echo $totalSales; ?></div>
                    <div>Total Sales For The Shop (RM)</div>
                </strong>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="manageOrderApproved.php">
                <span class="float-left">
                    <strong>
                        View Details
                    </strong>
                </span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>

</div>


<br>

<hr>

<br>


<div class="row">

    <div class="col-xl-12 col-sm-12 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                <strong>
                    <div style="font-size: 40px;"><?php echo $totalQty; ?> UNITS</div>
                    <div>Total Product Quantity Sold By The Shop (RM)</div>
                </strong>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="manageOrderApproved.php">
                <span class="float-left">
                    <strong>
                        View Details
                    </strong>
                </span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>

</div>
