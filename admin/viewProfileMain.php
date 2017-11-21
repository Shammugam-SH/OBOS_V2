<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../connect/connection.php';

session_start();

$loginUserEmail = $_SESSION["userEmail"];

//		0       1           2         3           4             5        6             7	
$sql = "SELECT ID, userFName, userLName, userEmail, userPass, userAddress, userPhone, userType
                FROM users WHERE userEmail='$loginUserEmail' LIMIT 1";

$result = $con->query($sql);


if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {

        $uID = $row["ID"];                      // Data 0
        $uFName = $row["userFName"];            // Data 2
        $uLName = $row["userLName"];            // Data 2
        $uEmail = $row["userEmail"];            // Data 3
        $uPass = $row["userPass"];              // Data 4
        $uAdd = $row["userAddress"];            // Data 5
        $uPhone = $row["userPhone"];            // Data 7
        $uType = $row["userType"];              // Data 8
    }
}
?>


<form autocomplete="off" id="profileModalForm"> 
    <div class="form-row">
        <div class="col-md-6">
            <label for="exampleInputName">Email</label>
            <input class="form-control" id="profileEmail" type="text" aria-describedby="nameHelp" value="<?php echo $uEmail; ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="exampleInputLastName">Password</label>
            <input class="form-control" id="profilePassword" type="text" aria-describedby="nameHelp" value="<?php echo $uPass; ?>"  readonly>
        </div>
    </div>
    <hr>
    <div class="form-row">
        <div class="col-md-6">
            <label for="exampleInputName">First Name</label>
            <input class="form-control" id="profileFirstName" type="text" maxlength="20" aria-describedby="nameHelp" value="<?php echo $uFName; ?>">
        </div>
        <div class="col-md-6">
            <label for="exampleInputLastName">Last Name</label>
            <input class="form-control" id="profileLastName" type="text" maxlength="20" aria-describedby="nameHelp" value="<?php echo $uLName; ?>">
        </div>
    </div>
    <br>
    <div class="form-row">
        <div class="col-md-6">
            <label for="exampleInputName">Address</label>
            <input class="form-control" id="profileAddress" type="text" maxlength="20" aria-describedby="nameHelp" value="<?php echo $uAdd; ?>">
        </div>
        <div class="col-md-6">
            <label for="exampleInputLastName">Phone No.</label>
            <input class="form-control singleNumbersOnly" id="profilePhoneNo" type="text" maxlength="11" aria-describedby="nameHelp" value="<?php echo $uPhone; ?>">
        </div>
    </div>
</form>

<hr>

<div class="text-right" id="viewProfileButtonDiv" > 
    <button class="btn btn-success" id="profileUpdateBTN" type="button" > <i class="fa fa-refresh" aria-hidden="true"></i> Update</button>
    <button class="btn btn-secondary" id="profileCancelBTN" type="button"><i class="fa fa-times" aria-hidden="true"></i> Cancel</button>
</div>


<script>

    $(document).ready(function () {


        $('#viewProfileButtonDiv').on('click', '#profileUpdateBTN', function (e) {

            e.preventDefault();

            var profileEmail = $('#profileEmail').val();
            var profileFirstName = $('#profileFirstName').val();
            var profileLastName = $('#profileLastName').val();
            var profileAddress = $('#profileAddress').val();
            var profilePhoneNo = $('#profilePhoneNo').val();


            if (profileEmail === "" || profileEmail === null) {

                swal("The Is No Email !!!");

                window.location.href = "dashboard.php";

            } else {


                swal({
                    title: "Are you sure want to update your record ?",
                    text: "Press your choice !!!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                })
                        .then((willDelete) => {

                            if (willDelete) {

                                $('<div class="loading">Loading</div>').appendTo('body');

                                var data = {
                                    profileEmail: profileEmail,
                                    profileFirstName: profileFirstName,
                                    profileLastName: profileLastName,
                                    profileAddress: profileAddress,
                                    profilePhoneNo: profilePhoneNo
                                };

                                $.ajax({
                                    url: "controllerProcess/viewProfileUpdate.php",
                                    type: "post",
                                    data: data,
                                    timeout: 10000,
                                    success: function (datas) {

                                        console.log(datas);

                                        if (datas.trim() === 'Success') {

                                            swal("User Details Is Updated Successfully !!!", "Record Is Updated...", "success");

                                            window.location.href = "dashboard.php";

                                        } else if (datas.trim() === 'Failed') {

                                            swal("User Details Update Failed !!!", "Please Try Again !!!", "error");

                                        }

                                        $('.loading').hide();


                                    },
                                    error: function (err) {

                                        console.log("Ajax Is Not Success");

                                        console.log(err);

                                    }
                                });

                            } else {

                                swal("Update Canceled !!!");

                            }

                        });


            }

        });


    });


</script>