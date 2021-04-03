<?php

session_start();
include '../includes/dbconnection.php';

$id = $_POST['id'];

$query= "SELECT * FROM playlist WHERE playlist_title = '$id' ";
$query_run = mysqli_query($con,$query);
?>





<?php
 while ($array = mysqli_fetch_array($query_run)){
    ?>

<div class="col-md-6">
    <div class="card">

        <h5 class="card-header bg-primary text-center " style="color:white; flex:1;">
            <?php echo $array['playlist_title'];?>
        </h5>


        <div class="card-body">
            <video style="width:100%; height:auto;" controls
                src="../video_tuts/<?php echo $array['video_title'];?>"></video>
            <h5 class="card-title"><?php echo $array['heading'];?></h5>
            <p class="card-text"><?php echo $array['description'];?></p>
            <div class="text-secondary">
                Author :-
                <?php 

echo $array['uploader_username'];
$_SESSION['uploader_username'] = $array['uploader_username'];
?>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<div class="container text-center">
    <a href="../generate_certificate_in_php-master/index.php" class="btn btn-primary align-items-center"> <span
            style="font-size:25px;"><i class="bi bi-file-arrow-down-fill"></i></span> Download Certificate</a>
</div>