<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$uID = $_SESSION["ID"];                  // Data 0
$uFName = $_SESSION["userFName"];            // Data 2
$uLName = $_SESSION["userLName"];            // Data 2
$uEmail = $_SESSION["userEmail"];            // Data 3
$uPass = $_SESSION["userPass"];              // Data 4
$uAdd = $_SESSION["userAddress"];            // Data 5
$uPhone = $_SESSION["userPhone"];            // Data 7
$uType = $_SESSION["userType"];              // Data 8
?>

<ul class="navbar-nav ml-auto" style="padding-right: 30px;">
    <li class="nav-item dropdown" style="padding-right: 20px;">
        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="">
            <i class="fa fa-fw fa-user-o"></i>
            <span class="d-lg">
                <?php echo $uFName . ' ' . $uLName; ?>
            </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="alertsDropdown" style="text-align: center;">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" style="text-decoration: underline;">
                <span>
                    <strong>
                        PROFILE DETAILS
                    </strong>
                </span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">
                <span class="text-info">
                    <strong>
                        User ID : <?php echo $uID; ?>
                    </strong>
                </span>
            </a>
            <a class="dropdown-item">
                <span class="text-info">
                    <strong>
                        User Email : <?php echo $uEmail; ?>
                    </strong>
                </span>
            </a>
            <a class="dropdown-item" href="#">
                <span class="text-info">
                    <strong>
                        User Phone : <?php echo $uPhone; ?>
                    </strong>
                </span>
            </a>
            <a class="dropdown-item">
                <span class="text-info">
                    <strong>
                        User Type : <?php echo $uType; ?>
                    </strong>
                </span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="viewProfile.php" >
                <span>
                    <strong>
                        View Profile
                    </strong>
                </span>
            </a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
    </li>
</ul>

