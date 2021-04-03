<?php

session_start();

include '../includes/dbconnection.php';



$filename=$_FILES['file']['name'];
        $test = explode(".",$_FILES['file']['name']);
        $file_extension = end($test);

        $file_allowed = array("rar", "zip");

if (in_array($file_extension, $file_allowed))
  {
// echo "1";
$name = rand(100,999).'.'.$file_extension;
$location = '../templates/'.$name;
move_uploaded_file($_FILES['file']['tmp_name'],$location);
$username = $_SESSION['username'];
$title = $_POST['title'];
$query = "INSERT INTO `templates`(`template_name`,`file_name`, `uploader_name`) VALUES ('$title','$name','$username') ";
$query_run = mysqli_query($con,$query);
?>


<div class="col-md-4 mb-3 ">

    <div class="card">
        <h5 class="card-header">Templates Name</h5>
        <div class="card-body">

            <h5><?php echo $title;?></h5>
            <a class="btn btn-primary" href="template_upload.php?file=<?php echo $name;?>">Download</a>
            <h5 class="mt-3">Author: </h5>
            <p class="card-text"><?php echo $_SESSION['username']; ?></p>

            <button class="btn btn-danger">
                Delete
            </button>

        </div>
    </div>
</div>
<?php 
 
}
else
  {
  echo "0";
  }
?>