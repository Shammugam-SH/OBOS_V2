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
$sql = "UPDATE ordermaster SET status='1' WHERE order_no='$viewOrderNo' ";

$result = $con->query($sql);



if ($result === true) {
    # code...
    echo "Success";
} else {
    echo "Failed";
}
?>