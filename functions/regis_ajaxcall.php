<?php
session_start();
include '../includes/dbconnection.php';

    $error_email = false;        
    $error_username = false;
    $error_contact = false;
    

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $cpassword = $_POST['confirmPassword'];
if(isset($_POST['username'])){

  //checkung email excits or not 
    $query_username="SELECT * FROM users WHERE username='$username'";
    $query_username_run =mysqli_query($con,$query_username);
    $query_username_row = mysqli_num_rows($query_username_run);

    //checkung email excits or not 
    $query_email="SELECT * FROM users WHERE email='$email'";
    $query_email_run =mysqli_query($con,$query_email);
    $query_email_row = mysqli_num_rows($query_email_run);
    //checkung contact number excits or not 
    $query_contact="SELECT * FROM users WHERE contact='$contact'";
    $query_contact_run =mysqli_query($con,$query_contact);
    $query_contact_row = mysqli_num_rows($query_contact_run);

    
 
   
  
    if ($query_username_row >0) {
        
        
        echo "Username Taken"."</br>";
        // $error_username = true;
        
    }
     if ($query_email_row >0) {
        echo "Email Taken"."</br>";
        // $error_email = true;
       
        
        
    }
     if ($query_contact_row >0) {
        echo "Contact Taken"."</br>";
        // $error_contact = true;
        
        
        
    }
    else {
        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
        // $contact_number = intval($contact);
        $insert = "INSERT INTO users( `fullname`, `username`, `email`, `contact`, `password`, `role`) VALUES('$fullname','$username','$email','$contact','$hashed_pwd','$role')";
        $query_run = mysqli_query($con,$insert);
        
        // echo 'Inserted';
        $error_username = false;
        $error_email = false;
        $error_contact = false;
        
        
    }
}
// $return_array[] = array("error_username"=> $error_username,"error_email"=> $error_email,"error_contact"=> $error_contact);


// echo json_encode($return_array);
?>