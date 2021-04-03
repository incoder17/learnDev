<?php 
session_start();
include '../includes/dbconnection.php';
$receiver_username=$_POST['name'];
$sender_username = $_SESSION['username'];
$message  = $_POST['input'];
$seen = 1;
// echo $_POST['name'];
// echo $_POST['input'];

$query = "INSERT INTO chat( `sender_username`, `receiver_username`, `message`, `seen`) VALUES('$sender_username','$receiver_username','$message','$seen') ";
$query_run = mysqli_query($con,$query);
// if($query_run ){
//     echo "bro done";
// }
?>