<?php

include '../connect/connection.php';

session_start();

$loginUserEmail = $_POST["loginUserEmail"];
$loginUserPassword = md5($_POST["loginUserPassword"]);

//		0       1           2         3           4             5        6             7	
$sql = "SELECT ID, userFName, userLName, userEmail, userPass, userAddress, userPhone, userType
                FROM users WHERE userEmail='$loginUserEmail' ";

$result = $con->query($sql);


if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {

        $uID = $row["ID"];                  // Data 0
        $uFName = $row["userFName"];            // Data 2
        $uLName = $row["userLName"];            // Data 2
        $uEmail = $row["userEmail"];            // Data 3
        $uPass = $row["userPass"];              // Data 4
        $uAdd = $row["userAddress"];            // Data 5
        $uPhone = $row["userPhone"];            // Data 7
        $uType = $row["userType"];              // Data 8


        $_SESSION["ID"] = $uID;             // Session 0
        $_SESSION["userFName"] = $uFName;       // Session 1
        $_SESSION["userLName"] = $uLName;       // Session 2
        $_SESSION["userEmail"] = $uEmail;       // Session 3
        $_SESSION["userPass"] = $uPass;         // Session 4
        $_SESSION["userAddress"] = $uAdd;       // Session 5
        $_SESSION["userPhone"] = $uPhone;       // Session 7
        $_SESSION["userType"] = $uType;         // Session 8


        if ($uPass == $loginUserPassword) {

            if ($uType == "admin") {
                echo "admin";
            } elseif ($uType == "customer") {
                echo "customer";
            }
        } else {

            echo "WrongPass";
        }
    }
} else {

    echo "NoUser";
}
?>