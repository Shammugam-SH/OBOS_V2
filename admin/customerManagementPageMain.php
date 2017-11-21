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
        <button id="addNewCustomerButton" class="btn btn-primary" data-status="pagado" data-toggle="modal" data-id="1" data-target="#customerModal" style=" padding-right: 10px;padding-left: 10px;color: white;"><a data-toggle="tooltip" data-placement="top" title="Add Items" id="test"><i class=" fa fa-plus" style=" padding-right: 10px;padding-left: 10px;color: white;"></i></a>ADD CUSTOMER</button>
    </span>
</h4>

<script>

    $(document).ready(function () {


        // Customer Add Modal Button Function Start
        $('#addNewCustomerButton').on('click', function () {

            $('#customerModalTitle').text("Add New Customer");
            $('#customerEmail').prop('readonly', false);
            $('#customerPassword').prop('readonly', false);
            $('#customer_btnAdd_or_btnUpdate_div').html('<button type="submit" id="addCustomerButton" class="btn btn-success btn-block btn-lg" role="button">Add</button>');
            $('#customerModalForm')[0].reset();

        });
        // Customer Add Modal Button Function End



        // Customer Reset Button Start
        $('#customerReset').on('click', function () {

            $('#customerModalForm')[0].reset();

        });
        // Customer Reset Button End



        // Add Customer Function Start
        $('#customer_btnAdd_or_btnUpdate_div').on('click', '#addCustomerButton', function (e) {

            var checkCustomerEmail = document.getElementById('customerEmail').checkValidity();

            var customerEmail = $('#customerEmail').val();
            var customerFName = $('#customerFName').val();
            var customerLName = $('#customerLName').val();
            var customerAddress = $('#customerAddress').val();
            var customerPassword = $('#customerPassword').val();
            var customerPhoneNo = $('#customerPhoneNo').val();

            if (customerEmail === "" || customerEmail === null || checkCustomerEmail === false) {

                swal("Please Insert Correct Email !!!");

            } else if (customerFName === "" || customerFName === null) {

                swal("Please Insert First Name !!!");

            } else if (customerLName === "" || customerLName === null) {

                swal("Please Insert Last Name !!!");

            } else if (customerPassword === "" || customerPassword === null) {

                swal("Please Insert Password !!!");

            } else if (customerAddress === "" || customerAddress === null) {

                swal("Please Insert Address !!!");

            } else if (customerPhoneNo === "" || customerPhoneNo === null) {

                swal("Please Insert Phone Number !!!");

            } else {


                $('<div class="loading">Loading</div>').appendTo('body');


                var data = {
                    customerEmail: customerEmail,
                    customerFName: customerFName,
                    customerLName: customerLName,
                    customerPassword: customerPassword,
                    customerAddress: customerAddress,
                    customerPhoneNo: customerPhoneNo
                };

                $.ajax({
                    url: "controllerProcess/customerManagementPageInsert.php",
                    type: "post",
                    data: data,
                    timeout: 10000,
                    success: function (datas) {

                        console.log(datas);

                        if (datas.trim() === 'Success') {

                            $('#customerManagementPageTableDiv').load('customerManagementPageTable.php');

                            $('#customerModal').modal('hide');

                            swal("Customer is Added Successfully !!!", customerEmail + " Is Added...", "success");

                            $('#customerModalForm')[0].reset();


                        } else if (datas.trim() === 'Duplicate') {


                            swal("Customer Email Duplication Detected !!!", "Please use diffrerent email !!!", "warning");


                        } else if (datas.trim() === 'Failed') {


                            swal("Customer Add Failed !!!", "Please Try Again !!!", "error");

                            $('#customerModal').modal('hide');

                            $('#customerModalForm')[0].reset();


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
        // Add Customer Function End



        // Customer Update Function Start
        $('#customerManagementPageTableDiv').off('click', '#customerManagementPageTable #btnCustomerManagementPageTableUpdate').on('click', '#customerManagementPageTable #btnCustomerManagementPageTableUpdate', function (e) {

            e.preventDefault();

            var row = $(this).closest("tr");
            var rowData = row.find("#customerManagementPageTableHiddenInput").val();
            var arrayData = rowData.split("|");

            $('#customerModalTitle').text("Update Customer");
            $('#customerEmail').prop('readonly', true);
            $('#customerPassword').prop('readonly', true);
            $('#customer_btnAdd_or_btnUpdate_div').html('<button type="submit" id="updateCustomerButton" class="btn btn-success btn-block btn-lg" role="button">Update</button>');

            $('#customerEmail').val(arrayData[1]);
            $('#customerFName').val(arrayData[2]);
            $('#customerLName').val(arrayData[3]);
            $('#customerPassword').val(arrayData[4]);
            $('#customerAddress').val(arrayData[5]);
            $('#customerPhoneNo').val(arrayData[6]);


        });
        // Customer Update Function End



        // Customer Update Function Start
        $('#customer_btnAdd_or_btnUpdate_div').on('click', '#updateCustomerButton', function (e) {

            e.preventDefault();

            var checkCustomerEmail = document.getElementById('customerEmail').checkValidity();

            var customerEmail = $('#customerEmail').val();
            var customerFName = $('#customerFName').val();
            var customerLName = $('#customerLName').val();
            var customerAddress = $('#customerAddress').val();
            var customerPassword = $('#customerPassword').val();
            var customerPhoneNo = $('#customerPhoneNo').val();

            if (customerEmail === "" || customerEmail === null || checkCustomerEmail === false) {

                swal("Please Insert Correct Email !!!");

            } else if (customerFName === "" || customerFName === null) {

                swal("Please Insert First Name !!!");

            } else if (customerLName === "" || customerLName === null) {

                swal("Please Insert Last Name !!!");

            } else if (customerPassword === "" || customerPassword === null) {

                swal("Please Insert Password !!!");

            } else if (customerAddress === "" || customerAddress === null) {

                swal("Please Insert Address !!!");

            } else if (customerPhoneNo === "" || customerPhoneNo === null) {

                swal("Please Insert Phone Number !!!");

            } else {

                $('<div class="loading">Loading</div>').appendTo('body');

                var data = {
                    customerEmail: customerEmail,
                    customerFName: customerFName,
                    customerLName: customerLName,
                    customerPassword: customerPassword,
                    customerAddress: customerAddress,
                    customerPhoneNo: customerPhoneNo
                };
                console.log(data);

                $.ajax({
                    url: "controllerProcess/customerManagementPageUpdate.php",
                    type: "post",
                    data: data,
                    timeout: 10000,
                    success: function (datas) {

                        if (datas.trim() === 'Success') {

                            $('#customerManagementPageTableDiv').load('customerManagementPageTable.php');

                            $('#customerModal').modal('hide');

                            swal("Customer is Updated Successfully !!!", customerEmail + " Is Updated...", "success");

                            $('#customerModalForm')[0].reset();


                        } else if (datas.trim() === 'Failed') {

                            swal("Customer Update Failed !!!", "Please Try Again !!!", "error");

                            $('#customerModal').modal('hide');

                            $('#customerModalForm')[0].reset();

                        }


                        $('.loading').hide();


                    },
                    error: function (err) {
                        alert("Error Ajax Update!");
                    }

                });

            }
        });
        // Customer Update Function End



        // Customer Delete Function Start
        $('#customerManagementPageTableDiv').off('click', '#customerManagementPageTable #btnCustomerManagementPageTableDel').on('click', '#customerManagementPageTable #btnCustomerManagementPageTableDel', function (e) {

            e.preventDefault();

            var row = $(this).closest("tr");
            var rowData = row.find("#customerManagementPageTableHiddenInput").val();
            var arrayData = rowData.split("|");
            console.log(arrayData);

            //assign into seprated val
            var iditem = arrayData[0];
            var idName = arrayData[1];


            console.log(iditem);

            swal({
                title: "Are you sure want to delete this record ?",
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
                                url: "controllerProcess/customerManagementPageDelete.php",
                                type: "post",
                                data: data,
                                timeout: 10000, // 10 seconds
                                success: function (datas) {

                                    if (datas.trim() === 'Success') {

                                        $('#customerManagementPageTableDiv').load('customerManagementPageTable.php');

                                        swal("Customer is Deleted Successfully !!!", idName + " Is Deleted...", "success");

                                    } else if (datas.trim() === 'Failed') {

                                        swal("Customer Delete Failed !!!", "Please Try Again !!!", "error");

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
        // Customer Delete Function End


    });

</script>