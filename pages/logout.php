<?php 
session_start();
include '../includes/dbconnection.php';
date_default_timezone_set("Asia/Kolkata");
$query_activity=$_SESSION['id'];
$time_date = date('d-m-Y H:i:s');
$activity_check="UPDATE users SET activity = 'Offline' , `entry` = '$time_date'  WHERE id='$query_activity'";
                    $activity_check_run = mysqli_query($con,$activity_check);

$_SESSION['id']="";

session_destroy();

header("location:login_main.php");

?>