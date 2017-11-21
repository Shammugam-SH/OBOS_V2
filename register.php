<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Head Libraries For The Project Start -->
        <?php include 'libraries/obosHeadLibrary.php'; ?>
        <!-- Head Libraries For The Project End -->

    </head>

    <body class="bg-dark">

        <div class="container">

            <div class="card card-register mx-auto mt-5">

                <div class="card-header" style="text-align: center;font-weight: bold;text-decoration: underline;">
                    <h3>Sign Up</h3>
                </div>

                <div class="card-body">

                    <br>

                    <form autocomplete="off" id="registerUserForm">

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputName">First Name</label>
                                    <input class="form-control" id="registerFirstName" type="text" maxlength="20" aria-describedby="nameHelp" placeholder="Enter First Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputLastName">Last Name</label>
                                    <input class="form-control" id="registerLastName" type="text" maxlength="20" aria-describedby="nameHelp" placeholder="Enter Last Name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputName">Email</label>
                                    <input class="form-control" id="registerEmail" type="email" maxlength="30" aria-describedby="nameHelp" placeholder="Enter Email">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputLastName">Phone No.</label>
                                    <input class="form-control singleNumbersOnly" id="registerPhone" type="text" maxlength="11" aria-describedby="nameHelp" placeholder="Enter Phone No.">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input class="form-control" id="registerAddress" type="text" maxlength="60" placeholder="Enter Address">
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input class="form-control" id="registerPassword1" type="password" maxlength="10" placeholder="Password">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleConfirmPassword">Confirm Password</label>
                                    <input class="form-control" id="registerPassword2" type="password" maxlength="10" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>

                        <br><br>

                        <a class="btn btn-success btn-block" id="btnRegisterUser"> <i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp; Register</a>

                    </form>


                    <div class="text-center">
                        <a class="d-block small mt-3" href="login.php">Login Page</a>
                        <a class="d-block small" href="forgotPassword.php">Forgot Password?</a>
                        <a class="d-block small" href="index.php">Home Page</a>
                    </div>

                </div>

            </div>

        </div>

        <!-- Foot Libraries For The Project Start -->
        <?php include 'libraries/obosFootLibrary.php'; ?>
        <!-- Foot Libraries For The Project End -->

    </body>

</html>




<script type="text/javascript">



    // Register Function Start
    $('#btnRegisterUser').on('click', function (e) {

        e.preventDefault();

        var registerFirstName = document.getElementById("registerFirstName");
        var registerLastName = document.getElementById("registerLastName");
        var registerEmail = document.getElementById("registerEmail");
        var registerPhone = document.getElementById("registerPhone");
        var registerAddress = document.getElementById("registerAddress");
        var registerPassword1 = document.getElementById("registerPassword1");
        var registerPassword2 = document.getElementById("registerPassword2");

        if (registerFirstName.checkValidity() === false || registerFirstName.value === "" || registerFirstName.value === null) {

            swal("Please Insert First Name !!!");

        } else if (registerLastName.checkValidity() === false || registerLastName.value === "" || registerLastName.value === null) {

            swal("Please Insert Last Name !!!");

        } else if (registerEmail.checkValidity() === false || registerEmail.value === "" || registerEmail.value === null) {

            swal("Please Insert Correct Email Address !!!");

        } else if (registerPhone.checkValidity() === false || registerPhone.value === "" || registerPhone.value === null) {

            swal("Please Insert Correct Phone Number !!!");

        } else if (registerAddress.checkValidity() === false || registerAddress.value === "" || registerAddress.value === null) {

            swal("Please Insert House Address !!!");

        } else if (registerPassword1.checkValidity() === false || registerPassword1.value === "" || registerPassword1.value === null) {

            swal("Please Insert Password !!!");

        } else if (registerPassword2.checkValidity() === false || registerPassword2.value === "" || registerPassword2.value === null) {

            swal("Please Insert Confirm Password !!!");

        } else if (registerPassword1.value !== registerPassword2.value) {

            swal("Please Insert Same Password For Both Field !!!");

        } else {

            $('<div class="loading">Loading</div>').appendTo('body');

            var data = {
                registerFirstName: registerFirstName.value,
                registerLastName: registerLastName.value,
                registerEmail: registerEmail.value,
                registerPhone: registerPhone.value,
                registerAddress: registerAddress.value,
                registerPassword1: registerPassword1.value,
                registerPassword2: registerPassword2.value
            };

            console.log(data);

            $.ajax({
                url: "controller/userRegisterProcess.php",
                type: "post",
                data: data,
                timeout: 15000,
                success: function (datas) {

                    $('.loading').hide();

                    if (datas.trim() === "Duplicate") {

                        swal("Duplicate User Email In The Database !!!", "Please Register Using Different Email !!!", "warning");

                    } else if (datas.trim() === "Success") {

                        swal("Registration Success !!!", "Please Login Using Your Credential !!!", "success");

                        document.getElementById('registerUserForm').reset();

                    } else if (datas.trim() === "Failed") {

                        swal("Registration Fail !!!", "Please Register Correctly !!!", "error");

                    }

                },
                error: function (err) {
                    console.log("Ajax Is Not Success");
                },
                complete: function (jqXHR, textStatus) {
                    //$('.loading').hide();
                }
            });

        }


    });
    // Register Function End



</script>


