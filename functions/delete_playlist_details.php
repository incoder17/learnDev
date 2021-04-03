<?php 
session_start();
include '../includes/dbconnection.php';
$id=$_POST['id']; 
$query = "SELECT * FROM playlist WHERE id=$id";
$query_run =mysqli_query($con,$query);
$query_row = mysqli_num_rows($query_run);
$query_array = mysqli_fetch_array($query_run);

$echo = '<div class="container">
    <h3>Title</h3>';
$echo .= '<p>'.$query_array['playlist_title'].'</p>';    
$echo .= '<video width="100%" style="object-fit:cover;" controls src="../video_tuts/'.$query_array['video_title'].'"></video>';
$echo .= '<h4 xlass="mt-2">Description</h4>';
$echo .= '<p>'.$query_array['description'].'</p>';

$echo .= '</div>';
  

echo $echo;
?>