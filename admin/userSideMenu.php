<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="dashboard.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
        <a class="nav-link" href="manageCustomer.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Manage Customer</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <a class="nav-link" href="manageProduct.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Manage Product</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span class="nav-link-text">Manage Order</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
                <a href="manageOrderNew.php">New Order</a>
            </li>
            <li>
                <a href="manageOrderApproved.php">Approved Order</a>
            </li>
            <li>
                <a href="manageOrderRejected.php">Rejected Order</a>
            </li>
        </ul>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-bar-chart"></i>
            <span class="nav-link-text">Data Analysis</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
                <a href="manageAnalysisSummary.php">System Summary</a>
            </li>
            <li>
                <a href="manageAnalysisOverallSales.php">Overall Sales</a>
            </li>
            <li>
                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti">Periodic Sales Summary</a>
                <ul class="sidenav-third-level collapse" id="collapseMulti">
                    <li>
                        <a href="manageAnalysisPeriodSalesDay.php">Daily Sales</a>
                    </li>
                    <li>
                        <a href="manageAnalysisPeriodSalesMonth.php">Monthly Sales</a>
                    </li>
                    <li>
                        <a href="manageAnalysisPeriodSalesYear.php">Yearly Sales</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Product Sales Summary</a>
                <ul class="sidenav-third-level collapse" id="collapseMulti2">
                    <li>
                        <a href="manageAnalysisProductQuantity.php">Total Sales (Quantity)</a>
                    </li>
                    <li>
                        <a href="manageAnalysisProductSales.php">Total Sales (Price)</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti3">Customer Sales Summary</a>
                <ul class="sidenav-third-level collapse" id="collapseMulti3">
                    <li>
                        <a href="manageAnalysisCustomerQuantity.php">Total Sales (Quantity)</a>
                    </li>
                    <li>
                        <a href="manageAnalysisCustomerSales.php">Total Sales (Price)</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>