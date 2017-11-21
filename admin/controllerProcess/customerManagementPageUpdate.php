<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include '../../connect/connection.php';

session_start();

$customerEmail = $_POST["customerEmail"];
$customerFName = $_POST["customerFName"];
$customerLName = $_POST["customerLName"];
$customerPassword = $_POST["customerPassword"];
$customerAddress = $_POST["customerAddress"];
$customerPhoneNo = $_POST["customerPhoneNo"];
$userID = $_SESSION["ID"];


//                                  1                               2                               3                               4		
$sql = "UPDATE users SET userFName='$customerFName', userLName ='$customerLName', userAddress = '$customerAddress', userPhone = '$customerPhoneNo' WHERE userEmail='$customerEmail' ";

$result = $con->query($sql);



if ($result === true) {
    # code...
    echo "Success";
} else {
    echo "Failed";
}
?>