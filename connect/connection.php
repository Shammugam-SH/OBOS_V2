<?php

$connectionStatus = "local";
$con = "";


if ($connectionStatus == "local") {
    # code...
    $con = mysqli_connect("localhost", "root", "", "obos");
} elseif ($connectionStatus == "global") {
    # code...
    //$con = mysqli_connect("mysql.hostinger.co.uk","u845484844_bank","123456","u845484844_sssh");
}


// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    
}
?>