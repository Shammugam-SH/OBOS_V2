<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include '../../connect/connection.php';

session_start();

$profileEmail = $_POST["profileEmail"];
$profileFirstName = $_POST["profileFirstName"];
$profileLastName = $_POST["profileLastName"];
$profileAddress = $_POST["profileAddress"];
$profilePhoneNo = $_POST["profilePhoneNo"];


//                                  1                               2                               3                               4		
$sql = "UPDATE users SET userFName='$profileFirstName', userLName ='$profileLastName', userAddress = '$profileAddress', userPhone = '$profilePhoneNo' WHERE userEmail='$profileEmail' ";

$result = $con->query($sql);



if ($result === true) {
    # code...

    $_SESSION["userFName"] = $profileFirstName;           // Session 1
    $_SESSION["userLName"] = $profileLastName;            // Session 2
    $_SESSION["userAddress"] = $profileAddress;           // Session 5
    $_SESSION["userPhone"] = $profilePhoneNo;             // Session 7

    echo "Success";
} else {
    echo "Failed";
}
?>