<?php 
session_start();
if($_SESSION['id']==""){
    header("location:pages/login.php");
}
else{
$_SESSION['playListTitle']="";
include '../includes/header_page.inc.php';
?>



<div class="container text-center">
    <div class="row">
        <div class="title">
            <h1>What you want ?</h1>

        </div>
        <div class="control ">
            <ul class="d-flex justify-content-evenly mx-5 mt-5 list-unstyled ">
                <li><a class="text-decoration-none" href=" newplaylist.php"><i class="far fa-plus-square"></i> New
                        Playlist</a> </li>
                <li><a class="text-decoration-none" href="template_upload.php"><i class="far fa-plus-square"></i> Upload
                        Templates</a> </li>
                <li><a class="text-decoration-none" href="edit_playlist.php"><i class="far fa-edit"></i> Edit Playlist
                    </a> </li>

            </ul>
        </div>
    </div> <?php
include '../includes/footer.inc.php';
}
?>