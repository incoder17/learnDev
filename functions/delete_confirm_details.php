<?php 
include '../includes/dbconnection.php';
$id = $_POST['id'];
$query = "DELETE FROM playlist WHERE id= $id";
$query_run = mysqli_query($con,$query);
$href = header("location:../pages/edit_playlist.php");
echo $href;

            ?>