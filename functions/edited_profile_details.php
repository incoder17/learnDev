<?php

session_start();

include '../includes/dbconnection.php';
// if(isset($_POST['fullname']) || isset($_POST['username']) || isset($_POST['email']) || isset($_POST['contact']) ){
    $id = $_SESSION['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    // $query = "UPDATE users SET fullname =' henil_mehtji', username = 'hello', contact = '9546215462' email= WHERE id  = 5 ";
      
    
    // $query = "UPDATE `users` SET  `fullname`='$fullname',`username`='$username',`email`= '$email',`contact`='$contact' WHERE id = '$id'";
    // $query = "UPDATE users SET activity = 'Offline'   WHERE id='$id'";
  mysqli_query($con,"UPDATE `users` SET  `fullname`='$fullname',`username`='$username',`email`= '$email',`contact`='$contact' WHERE id = '$id'");
    
    // echo $fullname.$username.$email ;
        $_SESSION['fullname'] = $_POST['fullname'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['contact'] = $_POST['contact'];
// header("location:../pages/profile.php");

// }    


?>