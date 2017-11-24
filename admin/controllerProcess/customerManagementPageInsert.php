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
$customerPassword = md5($_POST["customerPassword"]);
$customerAddress = $_POST["customerAddress"];
$customerPhoneNo = $_POST["customerPhoneNo"];
$userID = $_SESSION["ID"];

$sql = " SELECT userEmail FROM users WHERE userEmail='$customerEmail' ";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    echo "Duplicate";
} else {

    //                                  1            2          3             4             5            6            7
    $sql2 = " INSERT INTO `users`(`userEmail`, `userFName`, `userLName`, `userPass`, `userAddress`, `userPhone`, `userType`) 
				VALUES ('$customerEmail','$customerFName','$customerLName','$customerPassword','$customerAddress','$customerPhoneNo','customer')";

    $result2 = $con->query($sql2);

    if ($result2 === true) {
        # code...
        echo "Success";
    } else {
        echo "Failed";
    }
}
?>