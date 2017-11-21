<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include '../../connect/connection.php';

session_start();

$productID = $_POST["productID"];
$productName = $_POST["productName"];
$productPrice = $_POST["productPrice"];
$productQuantity = $_POST["productQuantity"];
$userID = $_SESSION["userEmail"];

$sql = " SELECT productID FROM product WHERE productID='$productID' ";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    echo "Duplicate";
} else {

    //                                  1	2			3           4			5
    $sql2 = " INSERT INTO `product`(`productID`, `productName`, `productPrice`, `productQuantity`, `productCreatedBy`) 
				VALUES ('$productID','$productName','$productPrice','$productQuantity','$userID')";

    $result2 = $con->query($sql2);

    if ($result2 === true) {
        # code...
        echo "Success";
    } else {
        echo "Failed";
    }
}
?>