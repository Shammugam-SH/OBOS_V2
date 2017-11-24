<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include '../../connect/connection.php';

session_start();

//                  1               2               3                   4             
$sql = " SELECT product.ID,product.productID,product.productName,product.productPrice,"
        //              5                       6     
        . " product.productQuantity,product.productCreatedBy,product.productImage "
        //       CONDITION
        . " FROM product ";

$result = $con->query($sql);
?>


<div class="col-xl-12 col-md-6" id="orderProductPageListOfProductDiv">
    <div class="box box-solid">
        <div class="box-body">
            <h4 style="background-color:#f7f7f7; font-size: 20px; text-align: center; padding: 7px 10px; margin-top: 0;font-weight: bolder;text-decoration: underline;">
                LIST OF PRODUCT
            </h4>

            <hr>

            <?php
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

                    $longUserData = join("|", $row);

                    echo '<div class="media" id="orderProductPageListOfProduct">';
                    echo "<input type='hidden' id='orderProductPageListOfProductHiddenInput' value='" . $longUserData . "' readonly>";
                    echo '<div class="media-left" style="padding: 7px;">';
                    echo '<a>';
                    echo '<img src="' . $row["productImage"] . '" onerror=this.src="../product/noimage.jpg" style="width: 200px;height: 100px;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);">';
                    echo '</a>';
                    echo '</div>';
                    echo '<div class="media-body">';
                    echo '<div class="clearfix">';
                    echo '<p class="pull-right">';
                    echo '<button id="orderProductPageListOfProductAddToCartBtn" class="btn btn-success btn-lg">';
                    echo '<i class="fa fa-shopping-cart fa-lg" aria-hidden="true" style="display: inline-block;" ></i> ';
                    echo '&nbsp; Add To Cart &nbsp;';
                    echo '</button>';
                    echo '</p>';
                    echo '<h4 style="padding-left: 1cm;font-weight: bolder;text-decoration: underline;">' . $row["productName"] . '</h4>';
                    echo '<p style="padding-left: 1cm;font-weight: bolder;"> Price For A UNIT : RM ' . $row["productPrice"] . '</p>';
                    echo '<p style="padding-left: 1cm;">';
                    echo '<i class="fa fa-shopping-cart fa-lg margin-r5"></i> &nbsp; Available stock for purchase : ' . $row["productQuantity"];
                    echo '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<hr>';
                }
            }
            ?>

        </div>
    </div>
</div>