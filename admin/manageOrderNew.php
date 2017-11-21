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
                        Manage Order
                    </li>
                    <li class="breadcrumb-item active">
                        New Order
                    </li>
                </ol>

                <!-- Icon Cards-->
                <div class="row">
                    <div class="col-12">
                        <!-- Example DataTables Card-->
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-users"></i> New Order Management Page
                            </div>
                            <div class="card-body">

                                <div id="newOrderManagementPageHolder">

                                    <div id="newOrderManagementPageMainDiv">
                                    </div>
                                    <div class="table-responsive" id="newOrderManagementPageTableDiv">
                                    </div>
                                    <?php include './modalForAllThePages.php'; ?>

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

        $('#newOrderManagementPageTableDiv').load('newOrderManagementPageTable.php');

    });

</script>
