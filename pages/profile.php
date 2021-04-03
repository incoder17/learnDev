<?php 
session_start();
if($_SESSION['id']==""){
    header("location:pages/login.php");
}
else{
$_SESSION['playListTitle']="";
include '../includes/header_page.inc.php';
if(isset($_POST['fullname']) || isset($_POST['username']) || isset($_POST['email']) || isset($_POST['contact']) ){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    // $query = "UPDATE users SET fullname =' henil_mehtji', username = 'hello', contact = '9546215462' email= WHERE id  = 5 ";
      
    
    $query = "UPDATE users SET fullname = $fullname, username = $username, contact = $contact ,email= $email WHERE id  = $id ";
    $query_run = mysqli_query($con,$query);
    
        $_SESSION['fullname'] = $_POST['fullname'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['contact'] = $_POST['contact'];

}    

?>
<div class="container  px-5 pb-5 mt-1" id="all">
    <div class="row  text-center" id="center ">
        <h1 class="mb-2" style="font-size:45px; font-family:'Roboto'; font-weight:800;">Profile</h1>


    </div>
    <div class="row" id="profile_details">
        <div class="col-md-12  col-sm-12 col-xs-12">
            <div class="container  p-2 ">
                <div class="img text-center ">
                    <div class="image">


                        <img src='../images/<?php
                    
                    if($_SESSION['profile_pic']!=""){
                        echo $_SESSION['profile_pic'];
                    }
                    else{
                        echo "\person-icon\person.png";
                    }
                    ?>' alt="">
                    </div>
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
                    <form id="confirm_edited">
                        <div class="main-details ">
                            <h4 class="mb-3"><?php echo $_SESSION['id']; ?></h4>
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

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../includes/footer.inc.php';
}
?>