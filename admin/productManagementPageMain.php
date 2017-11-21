<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!-- Add Part Start -->
<!-- Add Button Start -->
<h4 style="padding-top: 10px;padding-bottom: 15px; font-weight: bold">
    <span class="pull-left">
        <button id="addNewProductButton" class="btn btn-primary" data-status="pagado" data-toggle="modal" data-id="1" data-target="#productModal" style=" padding-right: 10px;padding-left: 10px;color: white;"><a data-toggle="tooltip" data-placement="top" title="Add Items" id="test"><i class=" fa fa-plus" style=" padding-right: 10px;padding-left: 10px;color: white;"></i></a>ADD PRODUCT</button>
    </span>
</h4>


<script>

    $(document).ready(function () {


        // Product Add Modal Button Function Start
        $('#addNewProductButton').on('click', function () {

            $('#productModalTitle').text("Add New Product");
            $('#productID').prop('readonly', false);
            $('#product_btnAdd_or_btnUpdate_div').html('<button type="submit" id="addProductButton" class="btn btn-success btn-block btn-lg" role="button">Add</button>');
            $('#productModalForm')[0].reset();

        });
        // Product Add Modal Button Function End



        // Product Reset Button Start
        $('#productReset').on('click', function () {

            $('#productModalForm')[0].reset();

        });
        // Product Reset Button End



        // Add Product Function Start
        $('#product_btnAdd_or_btnUpdate_div').on('click', '#addProductButton', function (e) {

            e.preventDefault();

            var productID = $('#productID').val();
            var productName = $('#productName').val();
            var productPrice = $('#productPrice').val();
            var productQuantity = $('#productQuantity').val();

            if (productID === "" || productID === null) {

                swal("Please Insert The Product ID");

            } else if (productName === "" || productName === null) {

                swal("Please Insert The Product Name");

            } else if (productPrice === "" || productPrice === null) {

                swal("Please Insert The Product Price");

            } else if (productQuantity === "" || productQuantity === null) {

                swal("Please Select The Product Quantity");

            } else {

                $('<div class="loading">Loading</div>').appendTo('body');

                var newProductPrice = parseFloat(productPrice).toFixed(2);
                productPrice = newProductPrice;

                var data = {
                    productID: productID,
                    productName: productName,
                    productPrice: productPrice,
                    productQuantity: productQuantity
                };

                console.log(data);

                $.ajax({
                    url: "controllerProcess/productManagementPageInsert.php",
                    type: "post",
                    data: data,
                    timeout: 10000,
                    success: function (datas) {

                        console.log(datas);

                        if (datas.trim() === 'Success') {


                            $('#productManagementPageTableDiv').load('productManagementPageTable.php');

                            $('#productModal').modal('hide');

                            swal("Product is Added Successfully !!!", productID + " Is Added...", "success");

                            $('#productModalForm')[0].reset();


                        } else if (datas.trim() === 'Duplicate') {


                            swal("Product Code Duplication Detected !!!", "Please use diffrerent Product Code !!!", "warning");


                        } else if (datas.trim() === 'Failed') {


                            swal("Product Add Failed !!!", "Please Try Again !!!", "error");

                            $('#productModal').modal('hide');

                            $('#productModalForm')[0].reset();


                        }

                        $('.loading').hide();

                    },
                    error: function (err) {

                        console.log("Ajax Is Not Success");

                        console.log(err);

                    }
                });
            }
        });
        // Add Product Function End



        // Product Update Function Start
        $('#productManagementPageTableDiv').off('click', '#productManagementPageTable #btnProductManagementPageTableUpdate').on('click', '#productManagementPageTable #btnProductManagementPageTableUpdate', function (e) {

            e.preventDefault();

            var row = $(this).closest("tr");
            var rowData = row.find("#productManagementPageTableHiddenInput").val();
            var arrayData = rowData.split("|");

            $('#productModalTitle').text("Update Product");
            $('#productID').prop('readonly', true);
            $('#product_btnAdd_or_btnUpdate_div').html('<button type="submit" id="updateProductButton" class="btn btn-success btn-block btn-lg" role="button">Update</button>');

            $('#productID').val(arrayData[1]);
            $('#productName').val(arrayData[2]);
            $('#productPrice').val(arrayData[3]);
            $('#productQuantity').val(arrayData[4]);



        });
        // Product Update Function End



        // Product Update Function Start
        $('#product_btnAdd_or_btnUpdate_div').on('click', '#updateProductButton', function (e) {

            e.preventDefault();

            var productID = $('#productID').val();
            var productName = $('#productName').val();
            var productPrice = $('#productPrice').val();
            var productQuantity = $('#productQuantity').val();

            if (productID === "" || productID === null) {

                swal("Please Insert The Product ID");

            } else if (productName === "" || productName === null) {

                swal("Please Insert The Product Name");

            } else if (productPrice === "" || productPrice === null) {

                swal("Please Insert The Product Price");

            } else if (productQuantity === "" || productQuantity === null) {

                swal("Please Select The Product Quantity");

            } else {

                $('<div class="loading">Loading</div>').appendTo('body');

                var newProductPrice = parseFloat(productPrice).toFixed(2);
                productPrice = newProductPrice;

                var data = {
                    productID: productID,
                    productName: productName,
                    productPrice: productPrice,
                    productQuantity: productQuantity
                };

                console.log(data);

                $.ajax({
                    url: "controllerProcess/productManagementPageUpdate.php",
                    type: "post",
                    data: data,
                    timeout: 10000,
                    success: function (datas) {

                        if (datas.trim() === 'Success') {

                            $('#productManagementPageTableDiv').load('productManagementPageTable.php');

                            $('#productModal').modal('hide');

                            swal("Product is Updated Successful !!!", productID + " Is Updated...", "success");

                            $('#productModalForm')[0].reset();


                        } else if (datas.trim() === 'Failed') {

                            swal("Product Updated Failed !!!", "Please Try Again !!!", "error");

                            $('#productModal').modal('hide');

                            $('#productModalForm')[0].reset();

                        }

                        $('.loading').hide();

                    },
                    error: function (err) {
                        alert("Error Ajax Update!");
                    }

                });

            }
        });
        // Product Update Function End



        // Product Delete Function Start
        $('#productManagementPageTableDiv').off('click', '#productManagementPageTable #btnProductManagementPageTableDel').on('click', '#productManagementPageTable #btnProductManagementPageTableDel', function (e) {

            e.preventDefault();

            var row = $(this).closest("tr");
            var rowData = row.find("#productManagementPageTableHiddenInput").val();
            var arrayData = rowData.split("|");
            console.log(arrayData);

            //assign into seprated val
            var iditem = arrayData[0];
            var idName = arrayData[1];


            console.log(iditem);

            swal({
                title: "Are you sure want to delete this item ?",
                text: "Once deleted, you will not be able to recover this record !!!",
                icon: "warning",
                buttons: true,
                dangerMode: true
            })
                    .then((willDelete) => {

                        if (willDelete) {

                            $('<div class="loading">Loading</div>').appendTo('body');

                            var data = {
                                iditem: iditem
                            };

                            $.ajax({
                                url: "controllerProcess/productManagementPageDelete.php",
                                type: "post",
                                data: data,
                                timeout: 10000, // 10 seconds
                                success: function (datas) {

                                    if (datas.trim() === 'Success') {

                                        $('#productManagementPageTableDiv').load('productManagementPageTable.php');

                                        swal("Product is Deleted Successful !!!", idName + " Is Deleted...", "success");

                                    } else if (datas.trim() === 'Failed') {

                                        swal("Product Delete Failed !!!", "Please Try Again !!!", "error");

                                    }

                                    $('.loading').hide();

                                },
                                error: function (err) {
                                    alert("Error! Deletion Ajax failed!!");
                                }

                            });


                        } else {

                            swal("Your record is safe!");

                        }

                    });


        });
        // Product Delete Function End



    });

</script>

