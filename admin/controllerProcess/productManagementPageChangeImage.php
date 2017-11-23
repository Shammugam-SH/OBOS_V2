<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$folder = "../../product/";
$folderDatabase = "../product/";

$sourcePath = $_FILES['productImageFile']['tmp_name'];
$targetPath = $folder . $_FILES['productImageFile']['name'];
$databasePath = $folderDatabase . $_FILES['productImageFile']['name'];


if (file_exists($targetPath)) {

    echo 'Duplication|ErrorUpload';
} else {

    if (move_uploaded_file($sourcePath, $targetPath)) {
        echo 'Success|' . $databasePath;
    } else {
        echo 'Failed|ErrorUpload';
    }
}
?>