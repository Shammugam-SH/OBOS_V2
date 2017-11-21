<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



include '../../connect/connection.php';

session_start();

$iditem = $_POST["iditem"];

//											1
$sql2 = " DELETE FROM `users` WHERE ID='$iditem' ";

$result2 = $con->query($sql2);

if ($result2 === true) {
    # code...
    echo "Success";
} else {
    echo "Failed";
}
?>