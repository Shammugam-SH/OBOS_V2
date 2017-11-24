<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../../connect/connection.php';

session_start();

//                  1               2               3                   4             
$sql = " SELECT seqno.name AS NAME, seqno.last_seq_no AS NUM "
        //       CONDITION
        . " FROM seqno WHERE seqno.name ='ORD' ";

$result = $con->query($sql);

$stringSeqName = "";
$stringSeqNum = "";
$intSeqNumNew = 0;

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $stringSeqName = $row["NAME"];
        $stringSeqNum = $row["NUM"];
    }
}


$intSeqNum = (int) $stringSeqNum;
$intSeqNumNew = $intSeqNum + 1;
$stringSeqNumNew = (string) $intSeqNumNew;


// Update Last Seq                            1                               2                               3                               4		
$sql2 = "UPDATE seqno SET last_seq_no='$stringSeqNumNew' WHERE name ='ORD' ";
$result2 = $con->query($sql2);

// Generate bill no
$length = (int) log10($intSeqNumNew) + 1;
$zero = "0";
$num = $stringSeqNumNew;

$count = 0;
for ($count = $length; $count < 10; $count++) {
    $num = $zero . $num;
}

// Print Seq No
$stringOrderNo = $stringSeqName . $num;


echo $stringOrderNo . "|" . $_SESSION["userEmail"] . "|" . date("Y-m-d");
?>