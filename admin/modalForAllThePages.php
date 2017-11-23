<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!-- Product Modal-->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="productModalTitle" align="center"></h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" id="productModalForm"> 
                    <div class="form-group">
                        <label class="control-label" for="textinput">Product ID *</label>
                        <input id="productID" name="productID" type="text" placeholder="Insert Product ID" class="form-control input-md" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="textinput">Product Name *</label>
                        <input id="productName" name="productName" type="text" placeholder="Insert Product Name" class="form-control input-md" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="textinput">Product Price *</label>
                        <input id="productPrice" name="productQuantity" type="text" placeholder="Insert Product Price" class="form-control input-md decimalNumbersOnly" maxlength="5" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="textinput">Product Quantity *</label>
                        <input id="productQuantity" name="productPrice" type="text" placeholder="Insert Product Quantity" class="form-control input-md singleNumbersOnly" maxlength="5" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group" id="product_btnAdd_or_btnUpdate_div">
                </div>
                <div class="btn-group" role="group">
                    <button class="btn btn-secondary" id="productReset" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Modal-->


<!-- Customer Modal-->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="customerModalTitle" align="center"></h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" id="customerModalForm"> 
                    <div class="form-group">
                        <label class="control-label" for="textinput">Customer Email *</label>
                        <input id="customerEmail" name="customerEmail" type="email" placeholder="Insert Customer Email" class="form-control input-md" maxlength="30" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="textinput">Customer First Name *</label>
                        <input id="customerFName" name="customerFName" type="text" placeholder="Insert Customer First Name" class="form-control input-md" maxlength="20" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="textinput">Customer Last Name *</label>
                        <input id="customerLName" name="customerLName" type="text" placeholder="Insert Customer Last Name" class="form-control input-md" maxlength="20" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="textinput">Customer Password *</label>
                        <input id="customerPassword" name="customerPassword" type="text" placeholder="Insert Customer Password" class="form-control input-md" maxlength="20" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="textinput">Customer Address *</label>
                        <input id="customerAddress" name="customerAddress" type="text" placeholder="Insert Customer Address" class="form-control input-md" maxlength="50" required>
                    </div> 
                    <div class="form-group">
                        <label class="control-label" for="textinput">Customer Phone No. *</label>
                        <input id="customerPhoneNo" name="customerPhoneNo" type="text" placeholder="Insert Customer Phone No." class="form-control input-md singleNumbersOnly" maxlength="11" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group" id="customer_btnAdd_or_btnUpdate_div">
                </div>
                <div class="btn-group" role="group">
                    <button class="btn btn-secondary" id="customerReset" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Customer Modal-->


<!-- View Order Modal-->
<div class="modal fade" id="viewOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="viewOrderModalTitle" align="center"></h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form autocomplete="off" id="viewOrderModalModalForm"> 
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="exampleInputName">Order No.</label>
                                <input class="form-control" id="viewOrderNo" type="text"  aria-describedby="nameHelp" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputLastName">Order Date</label>
                                <input class="form-control" id="viewOrderDate" type="text"  aria-describedby="nameHelp" disabled>
                            </div>    
                            <div class="col-md-4">
                                <label for="exampleInputLastName">Order Status</label>
                                <input class="form-control" id="viewOrderStatus" type="text"  aria-describedby="nameHelp" disabled>
                            </div>   
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="exampleInputName">Patient Name</label>
                                <input class="form-control" id="viewOrderPatientName" type="text" aria-describedby="nameHelp" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputLastName">Total Quantity</label>
                                <input class="form-control" id="viewOrderTotalQuantity" type="text"  aria-describedby="nameHelp" disabled>
                            </div>    
                            <div class="col-md-4">
                                <label for="exampleInputLastName">Total Price (RM)</label>
                                <input class="form-control" id="viewOrderTotalPrice" type="text"  aria-describedby="nameHelp" disabled>
                            </div>   
                        </div>
                    </div>
                </form>

                <hr>

                <div id="viewOrderModalModalTableDiv">

                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group" id="customer_btnAdd_or_btnUpdate_div">
                </div>
                <div class="btn-group" role="group">
                    <button class="btn btn-secondary" id="customerReset" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- View Order Modal-->


<!-- View Image Modal-->
<div class="modal fade" id="viewImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="viewImageModalTitle" align="center"></h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form autocomplete="off" id="viewImageModalModalForm"> 
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="exampleInputName">Product Code</label>
                                <input class="form-control" id="viewImageProductCode" type="text"  aria-describedby="nameHelp" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputLastName">Product Name</label>
                                <input class="form-control" id="viewImageProductName" type="text"  aria-describedby="nameHelp" disabled>
                            </div>    
                            <div class="col-md-4">
                                <label for="exampleInputLastName">File Name</label>
                                <input class="form-control" id="viewImageProductFileName" type="text"  aria-describedby="nameHelp" disabled>
                            </div>   
                        </div>
                    </div>
                </form>

                <hr>

                <div id="viewImageModalImagDiv">

                </div>

            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group">
                    <button class="btn btn-secondary" id="viewImageReset" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- View Image Modal-->


<!-- Change Image Modal-->
<div class="modal fade" id="changeImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="changeImageModalTitle" align="center"></h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form autocomplete="off" id="changeImageModalModalForm"> 
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="exampleInputName">Product Code</label>
                                <input class="form-control" id="changeImageProductCode" type="text"  aria-describedby="nameHelp" disabled>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputLastName">Product Name</label>
                                <input class="form-control" id="changeImageProductName" type="text"  aria-describedby="nameHelp" disabled>
                            </div>    
                            <div class="col-md-4">
                                <label for="exampleInputLastName">File Name</label>
                                <input class="form-control" id="changeImageProductFileName" type="text"  aria-describedby="nameHelp" disabled>
                            </div>   
                        </div>
                    </div>
                </form>

                <hr>

                <div id="changeImageModalImageDiv">

                    <!-- Example DataTables Card-->
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fa fa-users"></i> Image Segment
                        </div>
                        <div class="card-body">

                            <div id="viewImageSegmentHolder" >

                                <div class="container" align="center" >

                                    <br>
                                    <!-- Standar Form -->
                                    <h4>Please select image from your computer</h4>
                                    <br>

                                    <form id="viewImageSegmentForm" autocomplete="off" >

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col-md-8">
                                                    <input class="form-control" type="file" id="viewImageSegmentFileInput" placeholder="Please Choose A Image File">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="button" class="btn btn-lg btn-success" id="viewImageSegmentFileButton">Upload files</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                    <br>
                                    <hr>

                                    <!-- Progress Bar -->
                                    <div class="progress">
                                        <div class="progress-bar" id="viewImageSegmentFileProgress" >
                                            <div id="viewImageSegmentFileProgressPercent"></div>
                                        </div>
                                    </div>
                                    <br>

                                </div> <!-- /container -->

                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group">
                    <button class="btn btn-secondary" id="changeImageReset" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Change Image Modal-->


<script>

    $(document).ready(function () {

        $('.decimalNumbersOnly').keyup(function () {
            if (this.value !== this.value.replace(/[^0-9\.]/g, '')) {
                this.value = this.value.replace(/[^0-9\.]/g, '');
            }
        });


        $('.singleNumbersOnly').keyup(function () {
            if (this.value !== this.value.replace(/[^0-9]/g, '')) {
                this.value = this.value.replace(/[^0-9]/g, '');
            }
        });

    });


</script>