<?php 
session_start();
include 'includes/dbconnection.php';
if($_SESSION['id']==""){
    header("location:pages/login_main.php");
}
else{

include 'includes/header.inc.php';
?>


<div class="container text-center pt-5">
    <div class="row" id="heading">
        <h1 style="  font-family:'Roboto','san-sarif' !important;
    font-weight: 800 !important; font-size:65px;">Welcome , <span
                style="color:#1e212d;"><?php echo $_SESSION['fullname']; ?></span>
        </h1>

    </div>
    <div class="row">

    </div>
</div>




<?php
include 'includes\footer_index.inc.php'; 
}
?>