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
            <div class="card card-login mx-auto mt-5">

                <div class="card-header" style="text-align: center;font-weight: bold;text-decoration: underline;">
                    <h3>Forget Password</h3>
                </div>

                <br>

                <div class="card-body">


                    <div class="text-center mt-4 mb-5">
                        <h4>Forgot your password?</h4>
                        <p>Enter your email address and we will reset your password.</p>
                    </div>

                    <form id="forgetPasswordForm">

                        <div class="form-group">
                            <input class="form-control" id="forgetPassEmail" type="email" aria-describedby="emailHelp" maxlength="30" placeholder="Enter Your Email Address">
                        </div>

                        <br><br>

                        <a class="btn btn-success btn-block" id="btnForgetPassUser"> <i class="fa fa-refresh" aria-hidden="true"></i> &nbsp; Reset Password</a>

                    </form>

                    <div class="text-center">
                        <a class="d-block small mt-3" href="index.php">Home Page</a>
                        <a class="d-block small" href="login.php">Login Page</a>
                        <a class="d-block small" href="register.php">Register an Account</a>
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
    $('#btnForgetPassUser').on('click', function (e) {

        e.preventDefault();

        var forgetPassEmail = document.getElementById("forgetPassEmail");

        if (forgetPassEmail.checkValidity() === false || forgetPassEmail.value === "" || forgetPassEmail.value === null) {

            swal("Please Insert Your Valid Email Address !!!");

        } else {

            $('<div class="loading">Loading</div>').appendTo('body');

            var data = {
                forgetPassEmail: forgetPassEmail.value
            };

            console.log(data);

            $.ajax({
                url: "controller/userForgetPassProcess.php",
                type: "post",
                data: data,
                timeout: 15000,
                success: function (datas) {

                    $('.loading').hide();

                    if (datas.trim() === "NoUser") {

                        swal("No User Record In The Database !!!", "Please Use Correct Email !!!", "warning");

                    } else if (datas.trim() === "Success") {

                        document.getElementById('forgetPasswordForm').reset();

                        swal("Password Reset Success !!!", "Password Is Set To 123456...", "success");

                    } else if (datas.trim() === "Failed") {

                        swal("Password Reset Fail !!!", "Please Try Again !!!", "error");

                        document.getElementById('forgetPasswordForm').reset();

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


