<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

 <!--Bootstrap core JavaScript-->
<script src="./vendor/jquery/jquery.min.js"></script>
<script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


 <!--Core plugin JavaScript-->
<script src="./vendor/jquery-easing/jquery.easing.min.js"></script>


 <!--Page level plugin JavaScript-->
<script src="./vendor/datatables/jquery.dataTables.js"></script>
<script src="./vendor/datatables/dataTables.bootstrap4.js"></script>


 <!--Custom scripts for all pages-->
<script src="./js/sb-admin.min.js"></script>


 <!--Custom scripts for this page-->
<script src="./js/sb-admin-datatables.min.js"></script>


 <!--Other Plugin--> 
<script src="./vendor/bootbox/bootbox.min.js"></script>
<script src="./vendor/sweetalert/sweetalert.min.js"></script>


<script>


    // Decimal Number Restrictrion Start
    $('.decimalNumbersOnly').keyup(function () {
        if (this.value !== this.value.replace(/[^0-9\.]/g, '')) {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        }
    });
    // Decimal Number Restrictrion End


    // Single Number Restrictrion Start
    $('.singleNumbersOnly').keyup(function () {
        if (this.value !== this.value.replace(/[^0-9]/g, '')) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });
    // Single Number Restrictrion End


</script>
