<?php
session_start();
include '../includes/dbconnection.php';
$errors = array();


if(isset($_POST['login'])){
   
    $email = $_POST['email'];
   
    $password = $_POST['password'];
    
    if(empty($email)|empty($password)){
        $errors[] = "All fields required !!";
    
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
                        
                    }

                
                    header("location:../index.php?page=main");
            }
            else{
                $errors[]="Enter valid password";
            }
        }else{
            $errors[]="Enter valid email !!";
        }

    }
    
   
    
  
  
}



    ?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets\css\login\login.css">
    <title>Login to LEARNDEV</title>
</head>


<body>

    <div class="container">
        <div class="row">

            <div class="col-md-6 m-auto col-sm-12 col-xs-12  text-center pt-3 pb-3" id="form">


                <h2>Learn<span>Dev</span></h2>
                <br>
                <h3>Login</h3>


                <form method="POST" action="">

                    <input type="email" name="email" id="email" placeholder="Email">
                    <br>
                    <br>



                    <input type="password" name="password" id="pass" placeholder="Password">
                    <br>
                    <br>


                    <input type="submit" name="login" value="Login">

                    <br>

                    <br>
                    <p>Don't have an <a href="registration_main.php">account ?</a></p>
                </form>
            </div>
        </div>
    </div>
    <div id="error">
        <?php
$count = 1;
foreach($errors as $error){
echo "<pre>";

print_r($count.".  ".$error);
echo "</pre>";
$count++;
}
?>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>


</body>

</html>