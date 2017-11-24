<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include '../../connect/connection.php';

session_start();

$viewOrderNo = $_POST["viewOrderNo"];


//                                      1                 		
$sql = "DELETE FROM ordermaster WHERE order_no='$viewOrderNo' ";
$sql2 = "DELETE FROM orderdetail WHERE order_no='$viewOrderNo' ";

$result = $con->query($sql);
$result = $con->query($sql2);



if ($result === true) {
    # code...
    echo "Success";
} else {
    echo "Failed";
}
?>