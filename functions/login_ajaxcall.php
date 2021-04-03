<?php
session_start();
include '../includes/dbconnection.php';
$errors = array();


   
    $email = $_POST['email'];
   
    $password = $_POST['password'];
    
    if(empty($email)|empty($password)){

    }
    else{
        $query_email = "SELECT * FROM users WHERE email ='$email'";
        $query_email_run = mysqli_query($con,$query_email);
        if(mysqli_num_rows($query_email_run)>0){
            $query_array = mysqli_fetch_array($query_email_run);
            $sqli_password = $query_array['password'];
            $verified_password = password_verify($password,$sqli_password);
            if($verified_password){
               
                    $query_activity=$query_array['id'];
                    $activity_check="UPDATE users SET activity = 'Online' WHERE id='$query_activity'";
                    $activity_check_run = mysqli_query($con,$activity_check);
                    $_SESSION['id']= $query_array['id'];
                    $_SESSION['fullname']= $query_array['fullname'];
                    $_SESSION['username']= $query_array['username'];
                    $_SESSION['email']= $query_array['email'];
                    $_SESSION['contact']= intval($query_array['contact']);
                    $_SESSION['role']= $query_array['role'];
                    $_SESSION['activity']= $query_array['activity'];
                    $_SESSION['playListTitle'] = "";
                    if(!$query_array['profile_pic']==""){
                        
                        $_SESSION['profile_pic']= $query_array['profile_pic'];
                        
                        $password_error=0;
                        $email_er=0;
                        
                    }
// echo "done";
                   
                   else{
                       $password_error =1;
                      echo "Enter correct password or email !!";
                    }
                // echo "Enter valid password";
            }else{
                $email_er = 1;
                echo "Enter correct password or email !!";
            }
                // echo "Enter valid email !!";
                

                
            }   
        
        }//    $errors_happen = array(//        "email"=> $email_er,  //        "password"=>$password_error//    );    

    
  
  

// print_r($errors);

    ?>