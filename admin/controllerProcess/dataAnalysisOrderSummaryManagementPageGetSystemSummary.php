<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../../connect/connection.php';

session_start();

//                  1           2               3                   4            
$sqlCus = " SELECT users.ID,COUNT(users.userEmail) AS USR,users.userFName,users.userLName,"
        //          5           6                   7               8
        . " users.userPass,users.userAddress,users.userPhone,users.userType "
        //       CONDITION
        . " FROM users WHERE users.userType = 'customer' ";

$resultCus = $con->query($sqlCus);

//                  1               2               3                   4             
$sqlPro = " SELECT product.ID,COUNT(product.productID) AS ttlPr,product.productName,product.productPrice,"
        //              5                       6     
        . " product.productQuantity,product.productCreatedBy "
        //       CONDITION
        . " FROM product ";

$resultPro = $con->query($sqlPro);

// Variable
$totalCus = "";
$totalPro = "";


if ($resultCus->num_rows > 0) {

    while ($row = $resultCus->fetch_assoc()) {

        $totalCus = $row["USR"];
    }
}

if ($resultPro->num_rows > 0) {

    while ($row = $resultPro->fetch_assoc()) {

        $totalPro = $row["ttlPr"];
    }
}
?>

<div class="row">

    <div class="col-xl-6 col-sm-6 mb-3">
        <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-tasks"></i>
                </div>
                <strong>
                    <div style="font-size: 40px;"><?php echo $totalPro; ?></div>
                    <div>Product Registered</div>
                </strong>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="manageProduct.php">
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
                    <i class="fa fa-fw fa-users"></i>
                </div>
                <strong>
                    <div style="font-size: 40px;"><?php echo $totalCus; ?></div>
                    <div>Customer Registered</div>
                </strong>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="manageCustomer.php">
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

