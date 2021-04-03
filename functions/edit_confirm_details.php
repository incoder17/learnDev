<?php 
include '../includes/dbconnection.php';
if(isset($_POST['playlist_title']) || isset($_POST['video_title'])  || isset($_POST['heading']) ||  isset($_POST['description'])){

    $id = $_POST['id'];
    $playlist_title = $_POST['playlist_title'];
    $video_title = $_POST['video_title'];
    $heading = $_POST['heading'];
    $description = $_POST['description'];
    $query = "UPDATE playlist SET playlist_title = '$playlist_title', video_title= '$video_title', heading= '$heading' ,description = '$description' WHERE id = '$id'";
     mysqli_query($con,$query);
    // $href = header("location:../pages/edit_playlist.php");
    echo 1;

}
else{
    echo "Not entered";
}
            ?>