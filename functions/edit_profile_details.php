<?php
session_start();
include '../includes/dbconnection.php';

$id = $_SESSION['id'];
if(isset($_POST['fullname']) || isset($_POST['username']) || isset($_POST['email']) || isset($_POST['contact']) ){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $query = "UPDATE users SET fullname = $fullname, username = $username, contact = $contact email= WHERE id  = $id ";
      

}


?>

<div class="row ">
    <form id="confirm_edited">
        <div class="shadow-lg mx-auto text-center py-3 px-2 col-md-6 col-sm-12 col-xs-12">
            <h1 class="bg-primary " style="color:white;">Edit Profile</h1>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-file-person"></i></span>
                <input type="text" name="fullname" class="form-control" value="<?php echo $_SESSION['fullname']; ?>"
                    aria-label="Username" id="fullname" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" value="<?php echo $_SESSION['username']; ?>"
                    aria-label="Username" name="username" id="username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                <input type="text" class="form-control" name="email" id="email"
                    value="<?php echo $_SESSION['email']; ?>" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                <input type="text" class="form-control" name="contact" id="contact"
                    value="<?php echo $_SESSION['contact']; ?>" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="d-flex align-items-center justify-content-end">
                <button class="btn btn-secondary" id="close_edit">Close</button>
                <button type="submit" class="btn btn-success mx-2" id="confirm_edit">Save</button>
            </div>
        </div>
    </form>
</div>

<script>
$(document).ready(function() {
    $("#close_edit").on("click", function(e) {
        //    ?
        // alert("Clicked");
        // $("#profile_details").load("../functions/profile.php");
        window.href.location = "../pages/profile.php";

    });




    $("#confirm_edited").on("submit", function(e) {
        e.preventDefault();
        var formValues = $(this).serialize();

        $.post("../functions/edited_profile_details.php", formValues, function(data) {
            // Display the returned data in browser
            location.reload();
        });
    });
});
</script>