<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../connect/connection.php';

session_start();

//                      0                       1                       2           
$sql = " SELECT ordermaster.order_no, ordermaster.customer_id, ordermaster.dateTxt, "
        //          3                       4                   5                        
        . " ordermaster.total_amt, ordermaster.total_qty, ordermaster.status, "
        //          6           7           8
        . " users.userEmail,users.userFName,users.userLName  "
        //    FROM AND JOIN CONDITION
        . " FROM ordermaster JOIN users ON (users.userEmail = ordermaster.customer_id) "
        //    WHERECONDITION
        . " WHERE ordermaster.status = '0'; ";

$result = $con->query($sql);

$num = 1;
?>
<br>
<table class="table table-bordered" id="newOrderManagementPageTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>NO</th>
            <th>ORDER NO</th>
            <th>DATE</th>
            <th>USER NAME</th>
            <th>ORDER QTY</th>
            <th>ORDER AMT (RM)</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $longUserData = join("|", $row);


                echo "<tr>";
                echo "<input type='hidden' id='newOrderManagementPageTableHiddenInput' name='newOrderManagementPageTableHiddenInput' value='" . $longUserData . "' readonly>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $row["order_no"] . "</td>";
                echo "<td>" . $row["dateTxt"] . "</td>";
                echo "<td>" . $row["userFName"] . " " . $row["userLName"] . "</td>";
                echo "<td>" . $row["total_qty"] . "</td>";
                echo "<td>" . $row["total_amt"] . "</td>";
                echo "<td align='center'>";
                echo '<button id="newOrderManagementPageTableViewBtn" class="btn btn-warning"  ><i class="fa fa-info fa-lg" aria-hidden="true" style="display: inline-block;" ></i> View</button> ';
                echo '<button id="newOrderManagementPageTableApproveBtn" class="btn btn-success" ><i class="fa fa-check fa-lg" aria-hidden="true" style="display: inline-block;" ></i> Approve</button> ';
                echo '<button id="newOrderManagementPageTableRejectBtn" class="btn btn-danger" ><i class="fa fa-times fa-lg" aria-hidden="true" style="display: inline-block;" ></i> Reject</button> ';
                echo "</td>";
                echo "</tr>";

                $num = $num + 1;
            }
        }
        ?>
    </tbody>
</table>
<br>

<script>

    $(document).ready(function () {


        $('#newOrderManagementPageTable').DataTable({
            "language": {
                "emptyTable": "No New Order To Be Displayed"
            },
            initComplete: function (settings, json) {
                $('.loading').hide();
            }
        });


        // View New Order Modal Button Function Start
        $('#newOrderManagementPageTableDiv').off('click', '#newOrderManagementPageTable #newOrderManagementPageTableViewBtn').on('click', '#newOrderManagementPageTable #newOrderManagementPageTableViewBtn', function (e) {

            e.preventDefault();

            $('#viewOrderModalTitle').text("View New Order Details");

            var row = $(this).closest("tr");
            var rowData = row.find("#newOrderManagementPageTableHiddenInput").val();
            var arrayData = rowData.split("|");

            $('#viewOrderNo').val(arrayData[0]);
            $('#viewOrderDate').val(arrayData[2]);
            $('#viewOrderStatus').val('New Order');
            $('#viewOrderPatientName').val(arrayData[7] + " " + arrayData[8]);
            $('#viewOrderTotalQuantity').val(arrayData[4]);
            $('#viewOrderTotalPrice').val(arrayData[3]);

            var data = {
                viewOrderNo: arrayData[0]
            };

            $.ajax({
                url: "controllerProcess/newOrderManagementPageGetDetails.php",
                type: "post",
                data: data,
                timeout: 10000,
                success: function (datas) {

                    $('#viewOrderModalModalTableDiv').html(datas);

                    $('#viewOrderModal').modal('show');

                },
                error: function (err) {
                    alert("Error Ajax Update!");
                }

            });



        });
        // View New Order Modal Button Function End



        // Approve Order Function Start
        $('#newOrderManagementPageTableDiv').off('click', '#newOrderManagementPageTable #newOrderManagementPageTableApproveBtn').on('click', '#newOrderManagementPageTable #newOrderManagementPageTableApproveBtn', function (e) {

            e.preventDefault();

            var row = $(this).closest("tr");
            var rowData = row.find("#newOrderManagementPageTableHiddenInput").val();
            var arrayData = rowData.split("|");



            swal({
                title: "Are you sure want to approve this order ?",
                text: "Once approved, you will not be able to rollback !!!",
                icon: "warning",
                buttons: true,
                dangerMode: true
            })
                    .then((willDelete) => {

                        if (willDelete) {

                            $('<div class="loading">Loading</div>').appendTo('body');

                            var data = {
                                viewOrderNo: arrayData[0]
                            };

                            $.ajax({
                                url: "controllerProcess/newOrderManagementPageApproveOrder.php",
                                type: "post",
                                data: data,
                                timeout: 10000, // 10 seconds
                                success: function (datas) {

                                    if (datas.trim() === 'Success') {

                                        $('#newOrderManagementPageTableDiv').load('newOrderManagementPageTable.php');

                                        swal("Order is Approved Successful !!!", arrayData[0] + " Is Approved...", "success");

                                    } else if (datas.trim() === 'Failed') {

                                        swal("Order Approve Failed !!!", "Please Try Again !!!", "error");

                                    }

                                    $('.loading').hide();

                                },
                                error: function (err) {
                                    alert("Error! Deletion Ajax failed!!");
                                }

                            });


                        } else {

                            swal("Approval Is Skipped !!!");

                        }

                    });


        });
        // Approve Order Function End



        // Reject Order Function Start
        $('#newOrderManagementPageTableDiv').off('click', '#newOrderManagementPageTable #newOrderManagementPageTableRejectBtn').on('click', '#newOrderManagementPageTable #newOrderManagementPageTableRejectBtn', function (e) {

            e.preventDefault();

            var row = $(this).closest("tr");
            var rowData = row.find("#newOrderManagementPageTableHiddenInput").val();
            var arrayData = rowData.split("|");


            swal({
                title: "Are you sure want to reject this order ?",
                text: "Once rejected, you will not be able to rollback !!!",
                icon: "warning",
                buttons: true,
                dangerMode: true
            })
                    .then((willDelete) => {

                        if (willDelete) {

                            $('<div class="loading">Loading</div>').appendTo('body');

                            var data = {
                                viewOrderNo: arrayData[0]
                            };

                            $.ajax({
                                url: "controllerProcess/newOrderManagementPageRejectOrder.php",
                                type: "post",
                                data: data,
                                timeout: 10000, // 10 seconds
                                success: function (datas) {

                                    if (datas.trim() === 'Success') {

                                        $('#newOrderManagementPageTableDiv').load('newOrderManagementPageTable.php');

                                        swal("Order is Rejected Successful !!!", arrayData[0] + " Is Rejected...", "success");

                                    } else if (datas.trim() === 'Failed') {

                                        swal("Order Reject Failed !!!", "Please Try Again !!!", "error");

                                    }

                                    $('.loading').hide();

                                },
                                error: function (err) {
                                    alert("Error! Deletion Ajax failed!!");
                                }

                            });


                        } else {

                            swal("Rejection Is Skipped !!!");

                        }

                    });


        });
        // Reject Order Function End



    });



</script>
