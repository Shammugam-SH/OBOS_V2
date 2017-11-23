<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../../connect/connection.php';

session_start();

$productID = $_POST["productCode"];
$productPath = $_POST["productPath"];

//                                      1                           2                                   3		
$sql = "UPDATE product SET productImage='$productPath' WHERE productID='$productID' ";

$result = $con->query($sql);


if ($result === true) {
    # code...
    echo "Success";
} else {
    echo "Failed";
}
?>