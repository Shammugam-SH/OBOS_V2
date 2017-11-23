<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


if ($_POST["viewImageProductFileName"] !== "") {

    $image = $_POST["viewImageProductFileName"];
    $viewImageProductFileName = $image;
} else {
    $viewImageProductFileName = "../product/noimage.jpg";
}
?>

<!-- Example DataTables Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-users"></i> Image Segment
    </div>
    <div class="card-body">

        <div id="viewImageSegmentHolder" >
            <img src='<?php echo $viewImageProductFileName; ?>' onerror="this.src='../product/noimage.jpg';" width='100%' height='500px'> 
        </div>

    </div>
</div>

<hr>

