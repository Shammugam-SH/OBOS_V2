<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

include './userSessionCheck.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Head Libraries For The Project Start -->
        <?php include '../libraries/obosHeadLibraryUser.php'; ?>
        <!-- Head Libraries For The Project End -->

    </head>

    <body class="fixed-nav sticky-footer bg-dark" id="page-top">

        <?php include './obosTopSideNavigationPanelWithFooter.php'; ?>

        <!-- Main Container Start -->
        <div class="content-wrapper">

            <!-- Content Container Start -->
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">My Dashboard</li>
                </ol>

                <!-- Icon Cards-->
                <div class="row">
                    <div class="col-12" style="text-align: center;">
                        <hr>
                        <h1 style="">Customer Dashboard</h1>
                        <p>
                            This is the main page for the Customer when entering the system...
                            <br>
                            There are few module available for the customer to use...
                            <br>
                            The menu is listed in the bottom of the page....
                        </p>
                        <hr>
                        <div class="col-xl-12 col-sm-6 mb-3">
                            <div class="card text-white bg-primary o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-shopping-cart"></i>
                                    </div>
                                    <div class="mr-5"><strong>ORDER PRODUCT</strong></div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left"><strong>You can order product that are listed in this project...</strong></span>
                                    <span class="float-right">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-6 mb-3">
                            <div class="card text-white bg-success o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-shopping-bag"></i>
                                    </div>
                                    <div class="mr-5"><strong>MANAGE ORDERS</strong></div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left"><strong>You can manage the orders transaction using this menu...</strong></span>
                                    <span class="float-right">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-6 mb-3">
                            <div class="card text-white bg-danger o-hidden h-100">
                                <div class="card-body">
                                    <div class="card-body-icon">
                                        <i class="fa fa-fw fa-bar-chart"></i>
                                    </div>
                                    <div class="mr-5"><strong>DATA ANALYSIS</strong></div>
                                </div>
                                <a class="card-footer text-white clearfix small z-1" href="#">
                                    <span class="float-left"><strong>You can view detail analysis using this menu...</strong></span>
                                    <span class="float-right">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <!-- Content Container End -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up"></i>
            </a>


        </div>       
        <!-- Main Container End -->


        <!-- Foot Libraries For The Project Start -->
        <?php include '../libraries/obosFootLibraryUser.php'; ?>
        <!-- Foot Libraries For The Project End -->

    </body>

</html>
