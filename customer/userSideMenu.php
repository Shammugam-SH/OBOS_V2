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
        <a class="nav-link" href="#">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span class="nav-link-text">Order Product</span>
        </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-shopping-bag"></i>
            <span class="nav-link-text">Manage Order</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
                <a href="#">Pending Order</a>
            </li>
            <li>
                <a href="#">Approved Order</a>
            </li>
            <li>
                <a href="#">Rejected Order</a>
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
                <a href="#">Transaction Summary</a>
            </li>
            <li>
                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti">Periodic Transaction Record</a>
                <ul class="sidenav-third-level collapse" id="collapseMulti">
                    <li>
                        <a href="#">Daily Purchase</a>
                    </li>
                    <li>
                        <a href="#">Monthly Purchase</a>
                    </li>
                    <li>
                        <a href="#">Yearly Purchase</a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
</ul>