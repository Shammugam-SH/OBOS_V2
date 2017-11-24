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
$sqlOrderNew = " SELECT COUNT(ordermaster.order_no) AS TOTAL, ordermaster.customer_id, ordermaster.dateTxt, "
        //          3                       4                   5                        
        . " ordermaster.total_amt, ordermaster.total_qty, ordermaster.status, "
        //          6           7           8
        . " users.userEmail,users.userFName,users.userLName  "
        //    FROM AND JOIN CONDITION
        . " FROM ordermaster JOIN users ON (users.userEmail = ordermaster.customer_id) "
        //    WHERECONDITION
        . " WHERE ordermaster.status = '0' AND users.userEmail = '" . $userID . "'; ";

$resultOrderNew = $con->query($sqlOrderNew);

//                      0                       1                       2           
$sqlOrderApp = " SELECT COUNT(ordermaster.order_no) AS TOTAL, ordermaster.customer_id, ordermaster.dateTxt, "
        //          3                       4                   5                        
        . " ordermaster.total_amt, ordermaster.total_qty, ordermaster.status, "
        //          6           7           8
        . " users.userEmail,users.userFName,users.userLName  "
        //    FROM AND JOIN CONDITION
        . " FROM ordermaster JOIN users ON (users.userEmail = ordermaster.customer_id) "
        //    WHERECONDITION
        . " WHERE ordermaster.status = '1' AND users.userEmail = '" . $userID . "'; ";

$resultOrderApp = $con->query($sqlOrderApp);

//                      0                       1                       2           
$sqlOrderRej = " SELECT COUNT(ordermaster.order_no) AS TOTAL, ordermaster.customer_id, ordermaster.dateTxt, "
        //          3                       4                   5                        
        . " ordermaster.total_amt, ordermaster.total_qty, ordermaster.status, "
        //          6           7           8
        . " users.userEmail,users.userFName,users.userLName  "
        //    FROM AND JOIN CONDITION
        . " FROM ordermaster JOIN users ON (users.userEmail = ordermaster.customer_id) "
        //    WHERECONDITION
        . " WHERE ordermaster.status = '2' AND users.userEmail = '" . $userID . "'; ";

$resultOrderRej = $con->query($sqlOrderRej);


// Variable
$totalOrderNew = "";
$totalOrderApp = "";
$totalOrderRej = "";


if ($resultOrderNew->num_rows > 0) {

    while ($row = $resultOrderNew->fetch_assoc()) {

        $totalOrderNew = $row["TOTAL"];
    }
}

if ($resultOrderApp->num_rows > 0) {

    while ($row = $resultOrderApp->fetch_assoc()) {

        $totalOrderApp = $row["TOTAL"];
    }
}

if ($resultOrderRej->num_rows > 0) {

    while ($row = $resultOrderRej->fetch_assoc()) {

        $totalOrderRej = $row["TOTAL"];
    }
}
?>


<div class="row">

    <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-spinner"></i>
                </div>
                <strong>
                    <div style="font-size: 40px;"><?php echo $totalOrderNew; ?></div>
                    <div>Pending Order</div>
                </strong>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="manageOrderNew.php">
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


    <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-thumbs-up"></i>
                </div>
                <strong>
                    <div style="font-size: 40px;"><?php echo $totalOrderApp; ?></div>
                    <div>Approved Order</div>
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


    <div class="col-xl-4 col-sm-6 mb-3">
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-thumbs-down"></i>
                </div>
                <strong>
                    <div style="font-size: 40px;"><?php echo $totalOrderRej; ?></div>
                    <div>Rejected Order</div>
                </strong>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="manageOrderRejected.php">
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
