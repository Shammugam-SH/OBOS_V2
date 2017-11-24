<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../../connect/connection.php';

session_start();


$userID = $_SESSION["userEmail"];

//                      0                       1                       2           
$sql = " SELECT ordermaster.order_no, ordermaster.customer_id, ordermaster.dateTxt, "
        //          3                       4                   5                        
        . " ordermaster.total_amt, ordermaster.total_qty, ordermaster.status, "
        //          6           7           8
        . " users.userEmail,users.userFName,users.userLName  "
        //    FROM AND JOIN CONDITION
        . " FROM ordermaster JOIN users ON (users.userEmail = ordermaster.customer_id) "
        //    WHERECONDITION
        . " WHERE ordermaster.status = '0' AND users.userEmail = '" . $userID . "'; ";

$result = $con->query($sql);

$num = 1;
?>
<br>
<table class="table table-bordered" id="pendingOrderManagementPageTable" width="100%" cellspacing="0">
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
                echo "<input type='hidden' id='pendingOrderManagementPageTableHiddenInput' name='newOrderManagementPageTableHiddenInput' value='" . $longUserData . "' readonly>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $row["order_no"] . "</td>";
                echo "<td>" . $row["dateTxt"] . "</td>";
                echo "<td>" . $row["userFName"] . " " . $row["userLName"] . "</td>";
                echo "<td>" . $row["total_qty"] . "</td>";
                echo "<td>" . $row["total_amt"] . "</td>";
                echo "<td align='center'>";
                echo '<button id="pendingOrderManagementPageTableViewBtn" class="btn btn-warning"  ><i class="fa fa-info fa-lg" aria-hidden="true" style="display: inline-block;" ></i> View</button> ';
                echo '<button id="pendingOrderManagementPageTableCancelBtn" class="btn btn-danger" ><i class="fa fa-times fa-lg" aria-hidden="true" style="display: inline-block;" ></i> Cancel</button> ';
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


        $('#pendingOrderManagementPageTable').DataTable({
            "language": {
                "emptyTable": "No Pending Order To Be Displayed"
            },
            initComplete: function (settings, json) {
                $('.loading').hide();
            }
        });


        // View Pending Order Modal Button Function Start
        $('#pendingOrderManagementPageTableDiv').off('click', '#pendingOrderManagementPageTable #pendingOrderManagementPageTableViewBtn').on('click', '#pendingOrderManagementPageTable #pendingOrderManagementPageTableViewBtn', function (e) {

            e.preventDefault();

            $('#viewOrderModalTitle').text("View New Order Details");

            var row = $(this).closest("tr");
            var rowData = row.find("#pendingOrderManagementPageTableHiddenInput").val();
            var arrayData = rowData.split("|");

            $('#viewOrderNo').val(arrayData[0]);
            $('#viewOrderDate').val(arrayData[2]);
            $('#viewOrderStatus').val('Pending Order');
            $('#viewOrderPatientName').val(arrayData[7] + " " + arrayData[8]);
            $('#viewOrderTotalQuantity').val(arrayData[4]);
            $('#viewOrderTotalPrice').val(arrayData[3]);

            var data = {
                viewOrderNo: arrayData[0]
            };

            $.ajax({
                url: "controllerProcessManageOrder/pendingOrderManagementPageGetDetails.php",
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
        // View Pending Order Modal Button Function End



        // Cancel Order Function Start
        $('#pendingOrderManagementPageTableDiv').off('click', '#pendingOrderManagementPageTable #pendingOrderManagementPageTableCancelBtn').on('click', '#pendingOrderManagementPageTable #pendingOrderManagementPageTableCancelBtn', function (e) {

            e.preventDefault();

            var row = $(this).closest("tr");
            var rowData = row.find("#pendingOrderManagementPageTableHiddenInput").val();
            var arrayData = rowData.split("|");


            swal({
                title: "Are you sure want to cancel this order ?",
                text: "Once cancel, you will not be able to rollback !!!",
                icon: "warning",
                buttons: true,
                dangerMode: true
            })
                    .then((willDelete) => {

                        if (willDelete) {

                            //$('<div class="loading">Loading</div>').appendTo('body');

                            var data = {
                                viewOrderNo: arrayData[0]
                            };

                            $.ajax({
                                url: "controllerProcessManageOrder/pendingOrderManagementPageCancelOrder.php",
                                type: "post",
                                data: data,
                                timeout: 10000, // 10 seconds
                                success: function (datas) {

                                    if (datas.trim() === 'Success') {

                                        $('#pendingOrderManagementPageTableDiv').load('controllerProcessManageOrder/pendingOrderManagementPageTable.php');

                                        swal("Order is Canceled Successful !!!", arrayData[0] + " Is Canceled...", "success");

                                    } else if (datas.trim() === 'Failed') {

                                        swal("Order Cancel Failed !!!", "Please Try Again !!!", "error");

                                    }

                                    $('.loading').hide();

                                },
                                error: function (err) {
                                    alert("Error! Deletion Ajax failed!!");
                                }

                            });


                        } else {

                            swal("Canceled Is Skipped !!!");

                        }

                    });


        });
        // Cancel Order Function End



    });



</script>
