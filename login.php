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
        <?php include './libraries/obosHeadLibrary.php'; ?>
        <!-- Head Libraries For The Project End -->

    </head>

    <body class="bg-dark">

        <div class="container">

            <div class="card card-login mx-auto mt-5">

                <div class="card-header" style="text-align: center;font-weight: bold;text-decoration: underline;">
                    <h3>Sign In</h3>
                </div>

                <div class="card-body">

                    <br>

                    <form autocomplete="off" id="loginUserForm">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input class="form-control" id="loginUserEmail" type="email" aria-describedby="emailHelp" maxlength="30" placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input class="form-control" id="loginUserPassword" type="password"  maxlength="10" placeholder="Password">
                        </div>

                        <br><br>

                        <a class="btn btn-success btn-block" id="btnLoginUser"> <i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp; Login</a>

                    </form>


                    <div class="text-center">
                        <a class="d-block small mt-3" href="index.php">Home Page</a>
                        <a class="d-block small" href="forgotPassword.php">Forgot Password</a>
                        <a class="d-block small" href="register.php">Register an Account</a>
                    </div>

                </div>

            </div>

        </div>

        <!-- Foot Libraries For The Project Start -->
        <?php include './libraries/obosFootLibrary.php'; ?>
        <!-- Foot Libraries For The Project End -->

    </body>

</html>




<script type="text/javascript">



    // Login Function Start
    $('#btnLoginUser').on('click', function (e) {

        e.preventDefault();

        var userEmail = document.getElementById("loginUserEmail");
        var userPass = document.getElementById("loginUserPassword");

        if (userEmail.checkValidity() === false || userEmail.value === "" || userEmail.value === null) {

            swal("Please Insert Correct Email Address !!!");

        } else if (userPass.checkValidity() === false || userPass.value === "" || userPass.value === null) {

            swal("Please Insert Correct Password !!!");

        } else {

            $('<div class="loading">Loading</div>').appendTo('body');

            var data = {
                loginUserEmail: userEmail.value,
                loginUserPassword: userPass.value
            };

            console.log(data);

            $.ajax({
                url: "controller/userLoginProcess.php",
                type: "post",
                data: data,
                timeout: 15000,
                success: function (datas) {

                    console.log(datas);

                    $('.loading').hide();

                    if (datas.trim() === "admin") {

                        window.location.href = "admin/dashboard.php";

                    } else if (datas.trim() === "customer") {

                        window.location.href = "customer/dashboard.php";

                    } else if (datas.trim() === "NoUser") {

                        swal("No User Information In The Database !!!", "No Access Right... Please Register !!!", "error");

                    } else if (datas.trim() === "WrongPass") {

                        swal("Wrong Password !!!", "Please Login Using Correct Password !!!", "warning");

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
    // Login Function End



</script>


