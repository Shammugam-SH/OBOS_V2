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