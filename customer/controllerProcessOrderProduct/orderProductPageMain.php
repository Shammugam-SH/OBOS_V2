<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>


<div id="orderProductMainButtonDiv" style="padding-top: 30px;padding-bottom: 50px;"> 

    <div class="pull-left">
        <button id="cancelOrderProductButton" class="btn btn-secondary" data-status="pagado" data-toggle="modal" data-id="1" data-target="#" style=" padding-right: 10px;padding-left: 10px;color: white;">
            <a data-toggle="tooltip" data-placement="top" >
                <i class=" fa fa-times fa-lg" style=" padding-right: 10px;padding-left: 10px;color: white;"></i>
            </a> 
            CANCEL &nbsp; 
        </button>
    </div>
    <div class="pull-right">
        <button id="cartOrderProductButton" class="btn btn-warning" data-status="pagado" data-toggle="modal" data-id="1" data-target="#orderProductCartModal" style=" padding-right: 10px;padding-left: 10px;color: white;">
            <a data-toggle="tooltip" data-placement="top">
                <i class=" fa fa-shopping-cart fa-lg" style=" padding-right: 10px;padding-left: 10px;color: white;"></i>
            </a> 
            CART &nbsp; 
        </button>
    </div>

</div>

<script>


    // Product Cancel Function Start
    $('#orderProductPageMainDiv').off('click', '#orderProductMainButtonDiv #cancelOrderProductButton').on('click', '#orderProductMainButtonDiv #cancelOrderProductButton', function (e) {

        e.preventDefault();

        location.reload();

    });
    // Product Cancel Function End


    // Product Add To Cart Function Start
    $('#orderProductPageProductDiv').off('click', '#orderProductPageListOfProductDiv #orderProductPageListOfProductAddToCartBtn').on('click', '#orderProductPageListOfProductDiv #orderProductPageListOfProductAddToCartBtn', function (e) {

        e.preventDefault();

        var row = $(this).closest("#orderProductPageListOfProduct");
        var rowData = row.find("#orderProductPageListOfProductHiddenInput").val();
        var arrayData = rowData.split("|");

        var table = $("#orderProductCartModal #orderProductCartModalTable #orderProductCartTbody");

        var productID = "";

        var orderDetailList = [];

        table.find('tr').each(function (i) {

            var $tds = $(this).find('td');

            // Get The Data
            productID = $tds.eq(0).find("#orderProductCartTbodyProductCodeInput").text();
            orderDetailList.push(productID);

        });

        var arrayCodeCheck = orderDetailList.indexOf(arrayData[1]);

        if (arrayCodeCheck === -1) {

            $('#orderProductCartModalTable').append('<tr>\n\
                    <input type="hidden" id="orderProductCartModalTableProductIDHiddenInput" value="' + arrayData[1] + '" readonly>\n\
                    <td class="col-sm-8 col-md-6">\n\
                        <div class="media">\n\
                            <a class="thumbnail pull-left" href="#">\n\
                                <img class="media-object" src="' + arrayData[6] + '" onerror=this.src="../product/noimage.jpg" style="width: 80px; height: 80px;">\n\
                            </a>\n\
                            <div class="media-body" style="padding-left: 20px;">\n\
                                <h4 class="media-heading" id="orderProductCartTbodyProductCodeInput" ><a>' + arrayData[1] + '</a></h4>\n\
                                <h6 class="media-heading"><a>' + arrayData[2] + '</a></h6>\n\
                            </div>\n\
                        </div>\n\
                    </td>\n\
                    <td class="col-sm-1 col-md-1" style="text-align: center">\n\
                        <input type="number" min="0" class="form-control" id="orderProductCartTbodyQuantityInput" value="1">\n\
                    </td>\n\
                    <td class="col-sm-1 col-md-1 text-center">\n\
                        ' + arrayData[3] + '\n\
                    </td>\n\
                    <td class="col-sm-1 col-md-1 text-center">\n\
                        0.00\n\
                    </td>\n\
                    <td class="col-sm-1 col-md-1">\n\
                        <button type="button" class="btn btn-danger" id="orderProductCartTbodyDeleteButton">\n\
                            <span class="glyphicon glyphicon-remove"></span> Remove\n\
                        </button>\n\
                    </td>\n\
             </tr>');


            swal("Product is Added Successfully To Cart !!!", arrayData[1] + " Is Added...", "success");

        } else {

            swal("Product is Already Added To Cart !!!", "Please Choose Different Product..", "warning");

        }


    });
    // Product Add To Cart Function End



    // Product Del To Cart Function Start
    $('#orderProductCartModal').off('click', '#orderProductCartModalTable #orderProductCartTbodyDeleteButton').on('click', '#orderProductCartModalTable #orderProductCartTbodyDeleteButton', function (e) {

        e.preventDefault();

        var row = $(this).closest("tr").remove();
        var rowData = row.find("#orderProductCartModalTableProductIDHiddenInput").val();

        swal("Product is Added Successfully To Cart !!!", rowData + " Is Deleted...", "success");

    });
    // Product Del To Cart Function End


    var drugTotalOrder;


    // Grand Total Calculator Start
    !function calculateAllTotal() {

        // Getting Table
        var table = $("#orderProductCartModal #orderProductCartModalTable #orderProductCartTbody");

        // Setting Variable For Cart
        var drugPrice, drugDispensedQty, product;
        drugTotalOrder = 0;
        var grandTotal = 0.0;
        var drugDispensedQtyTotal = 0.0;


        // Calculating Data For Cart
        table.find('tr').each(function (i) {

            var $tds = $(this).find('td');

            drugTotalOrder = drugTotalOrder + 1;
            drugDispensedQty = parseFloat($tds.eq(1).find("#orderProductCartTbodyQuantityInput").val());
            drugPrice = parseFloat($tds.eq(2).text());
            product = drugDispensedQty * drugPrice;
            $tds.eq(3).text(product.toFixed(2));

            if (isNaN(drugTotalOrder) === true || isNaN(drugPrice) === true || isNaN(drugDispensedQty) === true || isNaN(product) === true) {
                console.log("NaN");
            } else {
                grandTotal = grandTotal + product;
                drugDispensedQtyTotal = drugDispensedQtyTotal + drugDispensedQty;
            }

        });


        // Assigining Value For Overall Dispense
        $("#viewOrderCartTotalQuantity").val(drugDispensedQtyTotal);
        $("#viewOrderCartTotalPrice").val(grandTotal.toFixed(2));

        setTimeout(calculateAllTotal, 800);
    }();
    // Grand Total Calculator End



    // Product Checkout Function Start
    $('#orderProductCartModal').off('click', '#viewOrderCartCheckOutBtn').on('click', '#viewOrderCartCheckOutBtn', function (e) {

        e.preventDefault();

        if (drugTotalOrder === 0) {

            swal("Cart Is Empty !!!", "Please Add Item To Cart !!!", "warning");

        } else {

            $('<div class="loading">Loading</div>').appendTo('body');

            $.ajax({
                url: "controllerProcessOrderProduct/orderProductPageGetSeqNo.php",
                type: "post",
                timeout: 10000,
                success: function (datas) {

                    var array = datas.trim().split("|");

                    var orderNo = array[0];
                    var totalQuan = $("#viewOrderCartTotalQuantity").val();
                    var totalPrice = $("#viewOrderCartTotalPrice").val();

                    var table = $("#orderProductCartModal #orderProductCartModalTable #orderProductCartTbody");

                    var productID, amt, qty, dataS, dataL = "";

                    var orderDetailList = [];

                    table.find('tr').each(function (i) {

                        var $tds = $(this).find('td');

                        // Get The Data
                        productID = $tds.eq(0).find("#orderProductCartTbodyProductCodeInput").text();
                        qty = parseFloat($tds.eq(1).find("#orderProductCartTbodyQuantityInput").val());
                        amt = $tds.eq(3).text();

                        dataS = orderNo + "^" + productID + "^" + amt + "^" + qty + "|";

                        dataL = dataL + dataS;

                    });

                    var stringMaster = datas.trim() + "|" + totalPrice + "|" + totalQuan + "|0";
                    var stringDetail = dataL;

                    var dataLah = {
                        stringMaster: stringMaster,
                        stringDetail: stringDetail
                    };

                    $.ajax({
                        url: "controllerProcessOrderProduct/orderProductPageOrderPoduct.php",
                        type: "post",
                        data: dataLah,
                        timeout: 10000,
                        success: function (datasOrder) {

                            if (datasOrder.trim() === 'Success') {

                                $('#orderProductCartModal').modal('hide');

                                swal("Order is Added Successfully !!!", " Wait For The Adminstrator's Approval...", "success");

                                setInterval(function () {

                                    location.reload();

                                }, 1500);

                            } else if (datasOrder.trim() === 'Failed') {

                                swal("Order Add Failed !!!", "Please Try Again !!!", "error");

                                $('#orderProductCartModal').modal('hide');


                                setInterval(function () {

                                    location.reload();

                                }, 1500);


                            }

                            $('.loading').hide();


                        },
                        error: function (err) {
                            alert("Error Ajax Update!");
                        }

                    });


                },
                error: function (err) {
                    alert("Error Ajax Update!");
                }

            });

        }

    });
    // Product Checkout Function End


</script>