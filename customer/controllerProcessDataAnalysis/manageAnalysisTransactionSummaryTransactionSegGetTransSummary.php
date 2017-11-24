<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include '../../connect/connection.php';

session_start();

$userID = $_SESSION["userEmail"];


//                      0                       1                       2           
$sqlSales = " SELECT ordermaster.order_no, ordermaster.customer_id, ordermaster.dateTxt, "
        //          3                       4                   5                        
        . " SUM(ordermaster.total_amt) AS SALES, SUM(ordermaster.total_qty) AS QTY, ordermaster.status, "
        //          6           7           8
        . " users.userEmail,users.userFName,users.userLName  "
        //    FROM AND JOIN CONDITION
        . " FROM ordermaster JOIN users ON (users.userEmail = ordermaster.customer_id) "
        //    WHERECONDITION
        . " WHERE ordermaster.status = '1' AND users.userEmail = '" . $userID . "'; ";

$resultSales = $con->query($sqlSales);


// Variable
$totalSales = "";
$totalQuan = "";


if ($resultSales->num_rows > 0) {

    while ($row = $resultSales->fetch_assoc()) {

        $totalSales = $row["SALES"];
        $totalQuan = $row["QTY"];
    }
}
?>


<div class="row">

    
    <div class="col-xl-6 col-sm-6 mb-3">
        <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-address-book"></i>
                </div>
                <strong>
                    <div style="font-size: 40px;"><?php echo $totalQuan; ?> UNITS</div>
                    <div>Total Product Purchased (UNITS)</div>
                </strong>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
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


    <div class="col-xl-6 col-sm-6 mb-3">
        <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-money"></i>
                </div>
                <strong>
                    <div style="font-size: 40px;">RM <?php echo $totalSales; ?></div>
                    <div>Total Money Spend (RM)</div>
                </strong>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
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
