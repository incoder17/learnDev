 <?php
 
 session_start();
 include '../includes/dbconnection.php';
 ?>
 <div class="col-md-12  col-sm-12 col-xs-12">
     <div class="container  p-2 ">
         <div class="img text-center ">
             <img src='../images/<?php
                    
                    if($_SESSION['profile_pic']!=""){
                        echo $_SESSION['profile_pic'];
                    }
                    else{
                        echo "person-icon/person.png";
                    }
                    ?>' alt="">
             <label for="file" class="  red_box">
                 <form id="profile_pic_form">
                     <input hidden type="file" name="profile_file" id="file">
                     <div class="icon">

                         <i class="bi bi-plus-circle-dotted"></i>

                     </div>
                 </form>
             </label>
         </div>
         <div class=" col-md-4 mx-auto   shadow-lg   py-4  details px-4">

             <div class="main-details ">
                 <div class="heading text-left">Fullname</div>
                 <h4 class="mb-3"><?php echo $_SESSION['fullname']; ?></h4>
                 <div class="heading text-left">Username</div>
                 <h4 class="mb-3"><?php echo $_SESSION['username']; ?></h4>
                 <div class="heading text-left">Contact no.</div>
                 <h4 class="mb-3"><?php echo $_SESSION['contact']; ?></h4>
                 <div class="heading text-left">Email</div>
                 <h4 class="mb-3"><?php echo $_SESSION['email']; ?></h4>
                 <div class="heading text-left">Username</div>
                 <h4 class="mb-3"><?php echo $_SESSION['username']; ?></h4>


                 <div class="text-center">
                     <button type="button" id="edit_profile" class="btn btn-primary" data-bs-toggle="modal"
                         data-bs-target="#exampleModal">
                         <span class="mx-2"><i class="bi bi-pencil-square"></i></span>
                         Edit
                     </button>

                 </div>

             </div>

         </div>
     </div>
 </div>

 <script>
$(document).ready(function() {
    $("#edit_profile").on("click", function(e) {
        e.preventDefault();
        // alert("Clicked");
        $("#profile_details").load("../functions/edit_profile_details.php");


    });
});
 </script>