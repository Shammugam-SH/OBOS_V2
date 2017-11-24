<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../../connect/connection.php';

session_start();

$userID = $_SESSION["userEmail"];

//                      0                       1                       2                           3
$sql = " SELECT DATE_FORMAT(ordermaster.dateTxt, '%Y') AS TXTDATE, "
        //    FROM AND JOIN CONDITION
        . " SUM(ordermaster.total_amt) AS SALES, SUM(ordermaster.total_qty) AS QTY  "
        //    FROM AND JOIN CONDITION
        . " FROM ordermaster JOIN users ON (users.userEmail = ordermaster.customer_id) "
        //    WHERE CONDITION
        . " WHERE ordermaster.status = '1' "
        . " AND users.userEmail = '" . $userID . "' GROUP BY TXTDATE; ";


$result = $con->query($sql);

$num = 1;
?>
<br>
<table class="table table-bordered" id="dataAnalysisPeriodSalesYearTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>NO</th>
            <th>YEAR</th>
            <th>TOTAL PURCHASED QUANTITY (UNITS)</th>
            <th>TOTAL MONEY SPENT (RM)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {


                $longUserData = join("|", $row);


                echo "<tr>";
                echo "<input type='hidden' id='dataAnalysisPeriodSalesYearTableHiddenInput' name='dataAnalysisPeriodSalesYearTableHiddenInput' value='" . $longUserData . "' readonly>";
                echo "<td>" . $num . "</td>";
                echo "<td>" . $row["TXTDATE"] . "</td>";
                echo "<td>" . $row["QTY"] . "</td>";
                echo "<td>" . $row["SALES"] . "</td>";
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

        $('#dataAnalysisPeriodSalesYearTable').DataTable({
            "language": {
                "emptyTable": "No Data To Be Displayed"
            },
            initComplete: function (settings, json) {
                $('.loading').hide();
            }
        });

    });



</script>