<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include '../../connect/connection.php';

session_start();

//                      0                       1                       2                           3
$sqlTable = " SELECT orderdetail.product_id,product.productName,SUM(orderdetail.amt) AS proAmt,SUM(orderdetail.qty) AS proQty "
        //    FROM AND JOIN CONDITION
        . " FROM orderdetail LEFT JOIN ordermaster ON (ordermaster.order_no = orderdetail.order_no) "
        //    JOIN CONDITION
        . " LEFT JOIN product ON (product_id = productID) "
        //    WHERECONDITION
        . " WHERE ordermaster.status = '1' GROUP BY product.`productID`; ";

$resultTable = $con->query($sqlTable);

//                      0                       1                       2                           3
$sqlGraf = " SELECT product.productName,SUM(orderdetail.qty) AS proQty "
        //    FROM AND JOIN CONDITION
        . " FROM orderdetail LEFT JOIN ordermaster ON (ordermaster.order_no = orderdetail.order_no) "
        //    JOIN CONDITION
        . " LEFT JOIN product ON (product_id = productID) "
        //    WHERECONDITION
        . " WHERE ordermaster.status = '1' GROUP BY product.`productID`; ";

$resultGraf = $con->query($sqlGraf);
?>

<table class="table table-bordered">

    <tbody id="manageAnalysisProductQuantityMainHolder">

        <tr class="bg-primary summary text-center" id="manageAnalysisProductQuantityGraffHolder">
            <td id="adalah">
                &nbsp; 
                <button class="btn btn-default" id="manageAnalysisProductQuantityGrafBtn" title="Show Graph"><i class="fa fa-line-chart fa-lg" aria-hidden="true"></i></button>
                <?php
                if ($resultGraf->num_rows > 0) {

                    while ($rowGraf = $resultGraf->fetch_assoc()) {
                        ?>
                        <p class="hidden"><?php join("|", $rowGraf); ?></p>

                    </td>
                </tr>
                <?php
            }//end for
        }
        ?>

        <tr data-status="pagado">
            <td>
                <div style="overflow-x: auto;">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Product ID</td>
                                <td>Name</td>
                                <td>Qty</td>
                                <td>Price</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($resultTable->num_rows > 0) {

                                while ($rowTable = $resultTable->fetch_assoc()) {

                                    echo "<tr>";
                                    echo "<td>" . $rowTable["product_id"] . "</td>";
                                    echo "<td>" . $rowTable["productName"] . "</td>";
                                    echo "<td>" . $rowTable["proAmt"] . "</td>";
                                    echo "<td>" . $rowTable["proQty"] . "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </td>
        </tr>

    </tbody>
</table>


<script>



    $('#manageAnalysisProductQuantityMainHolder').on('click', '#manageAnalysisProductQuantityGrafBtn', function () {

        Chart.helpers.each(Chart.instances, function (instance) {
            instance.destroy();
        });


        var dataArr = $(this).closest('#adalah').find('.hidden');
        var chartTitle = "Product Sales...";
        
        console.log(dataArr);
        console.log(chartTitle);
        
//        $('#ANL_canvas').html("");
//        var canvas = $('#ANL_canvas');
//
//        var lhrData = [];
//        var lhrLabel = [];
//        var lhrColour = [];
//
//        var intT = 0;
//
//        dataArr.each(function () {
//            var tempArr = $(this).text().split("|");
//            lhrLabel.push(tempArr[1]);
//            lhrData.push(tempArr[2]);
//            intT++;
//            //lhrColour.push(ANL_getRandomColor());
//        });
//        console.log(intT);
//        var lhrColourTemp = ANL_getUniqueColors(intT);
//        console.log(lhrColourTemp.length);
//
//        for (var tempI = 0; tempI < lhrColourTemp.length; tempI++) {
//            var strRGBA = "rgba(" + lhrColourTemp[tempI][0] + ", " + lhrColourTemp[tempI][1] + ", " + lhrColourTemp[tempI][2] + ", 0.5)";
//            lhrColour.push(strRGBA);
//        }
//
//
//        new Chart(canvas,
//                {
//                    type: "bar",
//                    data: {
//                        labels: lhrLabel,
//                        datasets: [{
//                                label: "Frequency",
//                                data: lhrData,
//                                fill: false,
//                                backgroundColor: lhrColour,
//                                borderColor: lhrColour,
//                                borderWidth: 1
//                            }]
//                    },
//                    options: {
//                        legend: {
//                            display: false,
//                            position: 'top',
//                            labels: {
//                                boxWidth: 40,
//                                fontColor: 'black'
//                            }
//                        },
//                        scales: {
//                            yAxes: [{
//                                    ticks: {beginAtZero: true}
//                                }],
//                            xAxes: [{
//                                    maxBarThickness: 30,
//                                    categoryPercentage: 0.5,
//                                    barPercentage: 1,
//                                    stacked: false,
//                                    beginAtZero: true,
//                                    scaleLabel: {
//                                        labelString: 'Description'
//                                    },
//                                    ticks: {
//                                        stepSize: 1,
//                                        min: 0,
//                                        autoSkip: false
//                                    }
//                                }]
//                        },
//                        title: {
//                            display: true,
//                            fontSize: 20,
//                            fontFamily: 'Arial',
//                            text: chartTitle,
//                            padding: 20
//                        }
//                    }
//                });
//
//        $('#ANL_modal').modal('show');

    });

</script>