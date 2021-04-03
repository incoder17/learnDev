<?php
session_start();
include '../includes/dbconnection.php';
$current_username = $_SESSION['username'];
$username = $_POST['name'];

// $query = "SELECT * FROM `chat` WHERE (sender_username= '$username' AND receiver_username = '$current_username') OR (sender_username= '$current_username' AND receiver_username = '$username')   ORDER BY time ASC ";
// echo $current_username."</br>";
// echo $username;
$query = "SELECT * FROM `chat` WHERE (sender_username= '$current_username' AND receiver_username = '$username') OR (sender_username= '$username' AND receiver_username = '$current_username')ORDER BY 1  ASC ";   
$run_query = mysqli_query($con, $query);
?>
<!-- <div id="main_chat"> -->

<?php
while($run_query_array = mysqli_fetch_assoc($run_query)){
    // echo "<psre>";
if($run_query_array['sender_username']==$current_username){
       
    ?>

<div>
    <div class=" shadow-sm receiver">

        <div class="message">



            <?php
      echo $run_query_array['message'];
      ?>
        </div>
        <div class="receiver_time">
            <?php
      echo $run_query_array['time'];
      
      
        ?>
        </div>
    </div>
</div>
</div>
<?php }else {
 
 ?>
<div>

    <div class=" shadow-sm sender">
        <div class="message">
            <?php
   
       echo $run_query_array['message'];
       ?>
        </div>
        <div class="sender_time">
            <?php
   
       echo $run_query_array['time'];
       ?>
        </div>
    </div>
</div>
<?php
} 
?>
<?php
// echo "</pre>";
} ?>
<!-- </div> -->