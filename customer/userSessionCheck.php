<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if ($_SESSION["userEmail"] == NULL) {

    // Do stuff 
    header("Location: './../../controller/userLogout.php");
}
?>