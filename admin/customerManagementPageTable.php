<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../connect/connection.php';

session_start();

//                  1           2               3                   4            
$sql = " SELECT users.ID,users.userEmail,users.userFName,users.userLName,"
        //          5           6                   7               8
        . " users.userPass,users.userAddress,users.userPhone,users.userType "
        //       CONDITION
        . " FROM users WHERE users.userType = 'customer' ";

$result = $con->query($sql);

$num = 1;
?>
<br>
<table class="table table-bordered" id="customerManagementPageTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>NO</th>
            <th>EMAIL</th>
            <th>NAME</th>
            <th>ADDRESS</th>
            <th>TEL NO.</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {


                $longUserData = join("|", $row);


                echo "<tr>";
                echo "<input type='hidden' id='customerManagementPageTableHiddenInput' name='customerManagementPageTableHiddenInput' value='" . $longUserData . "' readonly>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $row["userEmail"] . "</td>";
                echo "<td>" . $row["userFName"] . " " . $row["userLName"] . "</td>";
                echo "<td>" . $row["userAddress"] . "</td>";
                echo "<td>" . $row["userPhone"] . "</td>";
                echo "<td align='center'>";
                echo '<a data-toggle="modal" data-target="#customerModal" id="btnCustomerManagementPageTableUpdate"><i class="fa fa-edit fa-fw"></i></a> ';
                echo '<a data-toggle="modal" data-target="" id="btnCustomerManagementPageTableDel"><i class="fa fa-trash-o fa-fw"></i></a> ';
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

        $('#customerManagementPageTable').DataTable({
            "language": {
                "emptyTable": "No Data To Be Displayed"
            },
            initComplete: function (settings, json) {
                $('.loading').hide();
            }
        });

    });



</script>