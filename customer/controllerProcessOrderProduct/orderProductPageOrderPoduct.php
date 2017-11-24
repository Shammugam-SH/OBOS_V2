<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

error_reporting(0);

include '../../connect/connection.php';

session_start();

$stringMaster = $_POST["stringMaster"];
$stringDetail = $_POST["stringDetail"];

$masterVariable = split("\\|", $stringMaster);

//                                  1            2          3             4             5            6            
$sql2 = " INSERT INTO `ordermaster`(`order_no`, `customer_id`, `dateTxt`, `total_amt`, `total_qty`, `status`) 
	VALUES ('$masterVariable[0]','$masterVariable[1]','$masterVariable[2]','$masterVariable[3]','$masterVariable[4]','$masterVariable[5]')";

$result2 = $con->query($sql2);

$detailVariable = split("\\|", $stringDetail);

for ($count = 0; $count < sizeof($detailVariable); $count++) {



    $smallDetailVariable = $detailVariable[$count];
    $arrSmallDetailVariable = split("\\^", $smallDetailVariable);

    if ($arrSmallDetailVariable[0] !== "") {

//                                  1            2          3             4             5            6            
        $sqlD = " INSERT INTO `orderdetail`(`order_no`, `product_id`, `amt`, `qty`) 
		VALUES ('$arrSmallDetailVariable[0]','$arrSmallDetailVariable[1]','$arrSmallDetailVariable[2]','$arrSmallDetailVariable[3]')";


        $result2 = $con->query($sqlD);
    } else {
        
    }
}

if ($result2 === true) {
    # code...
    echo "Success";
} else {
    echo "Failed";
}
?>