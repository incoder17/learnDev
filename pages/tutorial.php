 <?php 
session_start();
include '../includes/dbconnection.php';
if($_SESSION['id']==""){
    header("location:pages/login.php");
}
else{

$_SESSION['language']="Php ";


?>

 <!doctype html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
     <title>Php</title>
 </head>
 <style>
body {
    overflow-x: hidden;
}

#goback {
    width: 130px;
    padding: 0px;

}
 </style>

 <body>
     <?php include '../includes\header_page.inc.php.'; ?>
     <main>

         <section class="py-5 text-center container">
             <div class="row py-lg-5">
                 <div class="col-lg-6 col-md-8 mx-auto">
                     <h1 class="fw-light ">Start
                         Development
                     </h1>


                 </div>
             </div>
         </section>


         <div class="album py-5 bg-light ">
             <div class="conatiner  mb-5 ">
                 <div class="row text-center">
                     <h2 class=" text-primary d-flex justify-content-around">

                         All play list of tutorials
                         <span> <a href="php.php" class="btn btn-danger"> <i class="bi bi-arrow-repeat"></i> See all
                                 playlist</a> </span>
                     </h2>
                 </div>

             </div>
             <div class="container">

                 <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="datials">
                     <?php 
                $query = "SELECT DISTINCT playlist_title
FROM playlist ";
$query_run = mysqli_query($con,$query);
$query_run_row = mysqli_num_rows($query_run);
// echo $query_run_row;

while($query_run_array = mysqli_fetch_array($query_run)){
    ?>

                     <div class="d-flex align-items-center position-relative playlist " style="cursor:pointer;"
                         id="<?php echo $query_run_array['playlist_title'];?>">

                         <!-- <img src=" ..." class="flex-shrink-0 me-3" alt="..."> -->
                         <div>
                             <h5 class="mt-0" "> <?php echo $query_run_array['playlist_title'];?>
                            </h5>
                            <p class=" stretched-link "><i style=" font-size:20px;"
                                 class="bi bi-collection-play-fill text-danger"></i>
                                 Go to Playlist</p>



                         </div>
                     </div>
                     <?php

}
                ?>



                 </div>
             </div>
         </div>

     </main>




     <?php
include '../includes/footer.inc.php';
}
?>