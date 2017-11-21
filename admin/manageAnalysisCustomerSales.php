<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


session_start();
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
        <?php include '../libraries/obosHeadLibraryAdmin.php'; ?>
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
                    <li class="breadcrumb-item">
                        Data Analysis
                    </li>
                    <li class="breadcrumb-item active">
                        Customer Sales (Price)
                    </li>
                </ol>

                <!-- Icon Cards-->
                <div class="row">
                    <div class="col-12">
                        <!-- Example DataTables Card-->
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-users"></i>  Customer Sales Page (Price) 
                            </div>
                            <div class="card-body">

                                <div id="dataAnalysisCustomerSalesManagementPageSales">
                                </div>

                            </div>
                        </div>     

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
        <?php include '../libraries/obosFootLibraryAdmin.php'; ?>
        <!-- Foot Libraries For The Project End -->

    </body>

</html>

<script>

    $(document).ready(function () {

        $('<div class="loading">Loading</div>').appendTo('body');

        $('#dataAnalysisCustomerSalesManagementPageSales').load('controllerProcess/manageAnalysisCustomerSalesGetData.php');

    });

</script>
