<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../connect/connection.php';

$registerFirstName = $_POST["registerFirstName"];
$registerLastName = $_POST["registerLastName"];
$registerEmail = $_POST["registerEmail"];
$registerPhone = $_POST["registerPhone"];
$registerAddress = $_POST["registerAddress"];
$registerPassword1 = md5($_POST["registerPassword1"]);
$registerPassword2 = md5($_POST["registerPassword2"]);


$sql = " SELECT userEmail FROM users WHERE userEmail='$registerEmail' ";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    echo "Duplicate";
} else {

    //		1	2			3			4			5			6		7			8			9			10
    $sql2 = "INSERT INTO `users`(`userFName`, `userLName`, `userEmail`, `userPass`, `userAddress`, `userPhone`, `userType`)
				VALUES ('$registerFirstName','$registerLastName','$registerEmail','$registerPassword1','$registerAddress','$registerPhone','customer')";

    $result2 = $con->query($sql2);

    if ($result2 === true) {
        # code...
        echo "Success";
    } else {
        echo "Failed";
    }
}
?>