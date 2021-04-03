<?php
session_start();
include '../includes/dbconnection.php';

// if($_POST['name']!=""){
    $username = $_POST['name'];
    $query = "SELECT activity FROM `users` WHERE username= '$username'";
    $run_query = mysqli_query($con, $query);
    $run_query_array = mysqli_fetch_assoc($run_query);
    ?>
    <div class="
    <?php
    if($run_query_array['activity']!="Offline")
    // print_r ( $run_query_array['activity']);
   {


       echo "online";
   }
   else{
       echo "offline";
   }
    // echo $username;
// }

?>
    ">
    
    </div>
    
