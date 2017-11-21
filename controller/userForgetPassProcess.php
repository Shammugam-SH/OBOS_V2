<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../connect/connection.php';

$forgetPassEmail = $_POST["forgetPassEmail"];
$newPass = md5("123456");

$sql = " SELECT userEmail FROM users WHERE userEmail='$forgetPassEmail' ";

$result = $con->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    //		1	2			3			4			5			6		7			8			9			10
    $sql2 = "UPDATE `users` SET `userPass`= '$newPass' WHERE userEmail='$forgetPassEmail' ";

    $result2 = $con->query($sql2);

    if ($result2 === true) {
        # code...
        echo "Success";
    } else {
        echo "Failed";
    }
} else {

    echo "NoUser";
}
?>