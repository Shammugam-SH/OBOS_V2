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
        . " WHERE ordermaster.status = '1' AND users.userEmail = '" . $userID . "'; ";

$result = $con->query($sql);

$num = 1;
?>
<br>
<table class="table table-bordered" id="approvedOrderManagementPageTable" width="100%" cellspacing="0">
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
                echo "<input type='hidden' id='approvedOrderManagementPageTableHiddenInput' name='newOrderManagementPageTableHiddenInput' value='" . $longUserData . "' readonly>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $row["order_no"] . "</td>";
                echo "<td>" . $row["dateTxt"] . "</td>";
                echo "<td>" . $row["userFName"] . " " . $row["userLName"] . "</td>";
                echo "<td>" . $row["total_qty"] . "</td>";
                echo "<td>" . $row["total_amt"] . "</td>";
                echo "<td align='center'>";
                echo '<button id="approvedOrderManagementPageTableViewBtn" class="btn btn-warning"  ><i class="fa fa-info fa-lg" aria-hidden="true" style="display: inline-block;" ></i> View</button> ';
                echo '<button id="approvedOrderManagementPageTablePrintBtn" class="btn btn-info" ><i class="fa fa-print fa-lg" aria-hidden="true" style="display: inline-block;" ></i> Print</button> ';
                echo "</td>";
                echo "</tr>";

                $num = $num + 1;
            }
        }
        ?>
    </tbody>
</table>
<br>


<div id="approvedOrderManagementPagePrintRecieptDIV" hidden></div>

<script>

    $(document).ready(function () {


        $('#approvedOrderManagementPageTable').DataTable({
            "language": {
                "emptyTable": "No Approved Order To Be Displayed"
            },
            initComplete: function (settings, json) {
                $('.loading').hide();
            }
        });



        // View New Order Modal Button Function Start
        $('#approvedOrderManagementPageTableDiv').off('click', '#approvedOrderManagementPageTable #approvedOrderManagementPageTableViewBtn').on('click', '#approvedOrderManagementPageTable #approvedOrderManagementPageTableViewBtn', function (e) {

            e.preventDefault();

            $('#viewOrderModalTitle').text("View Approved Order Details");

            var row = $(this).closest("tr");
            var rowData = row.find("#approvedOrderManagementPageTableHiddenInput").val();
            var arrayData = rowData.split("|");

            $('#viewOrderNo').val(arrayData[0]);
            $('#viewOrderDate').val(arrayData[2]);
            $('#viewOrderStatus').val('Approved Order');
            $('#viewOrderPatientName').val(arrayData[7] + " " + arrayData[8]);
            $('#viewOrderTotalQuantity').val(arrayData[4]);
            $('#viewOrderTotalPrice').val(arrayData[3]);

            var data = {
                viewOrderNo: arrayData[0]
            };

            $.ajax({
                url: "controllerProcessManageOrder/approvedOrderManagementPageGetDetails.php",
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



        // Print Order Function Start
        $('#approvedOrderManagementPageTableDiv').off('click', '#approvedOrderManagementPageTable #approvedOrderManagementPageTablePrintBtn').on('click', '#approvedOrderManagementPageTable #approvedOrderManagementPageTablePrintBtn', function (e) {

            e.preventDefault();

            var row = $(this).closest("tr");
            var rowData = row.find("#approvedOrderManagementPageTableHiddenInput").val();
            var arrayData = rowData.split("|");


            swal({
                title: "Are you sure want to print reciept this order ?",
                text: "Choose your choice !!!",
                icon: "warning",
                buttons: true,
                dangerMode: true
            })
                    .then((willDelete) => {

                        if (willDelete) {

                            $('<div class="loading">Loading</div>').appendTo('body');

                            var data = {
                                viewOrderNo: arrayData[0],
                                userID: arrayData[1]
                            };

                            $.ajax({
                                url: "controllerProcessManageOrder/approvedOrderManagementPageGetReceiptForOrder.php",
                                type: "post",
                                data: data,
                                timeout: 10000, // 10 seconds
                                success: function (datas) {

                                    $('#approvedOrderManagementPagePrintRecieptDIV').html(datas);

                                    setTimeout(function () {

                                        $('.loading').hide();

                                        var printDiv = $("#approvedOrderManagementPagePrintRecieptDIV").html().trim();
                                        var printWindow = window.open('', 'Print Reciept');
                                        printWindow.document.write('<html><head><title>Reciept</title>');
                                        printWindow.document.write('</head><body >');
                                        printWindow.document.write(printDiv);
                                        printWindow.document.write('</body></html>');
                                        printWindow.document.close();
                                        printWindow.focus();
                                        printWindow.print();
                                        printWindow.close();


                                    }, 1500);



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
        // Print Order Function End



    });



</script>
