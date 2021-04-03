<?php
session_start();
include '../includes/dbconnection.php';
$errors = array();


if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
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

    
    if ($password !== $cpassword){
        $errors[] = "Passwords not match !!";
        
    }
    else if(empty($fullname) |empty($username)|empty($email)|empty($contact)|empty($password)|empty($cpassword)){
        $errors[] = "All fields required !!";
       
    }
    if(strlen($contact)>10 |strlen($contact)<10 ){
        $errors[] ="Contact should contain 10 digits !!";
       
    }
    if ($query_contact_row>0) {
        $errors[]="Contact number already taken !!";
    }
    if ($query_username_row >0) {
        $errors[] ="Username already excits !";
        
    }
    if ($query_email_row >0) {
        $errors[] ="Email already excits !";
        
    }
    if ($query_contact_row >0) {
        $errors[] ="Contact number already excits !";
        
    }
    else {
        $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
        // $contact_number = intval($contact);
        $insert = "INSERT INTO users( `fullname`, `username`, `email`, `contact`, `password`, `role`) VALUES('$fullname','$username','$email','$contact','$hashed_pwd','$role')";
        $query_run = mysqli_query($con,$insert);
        header("location:login.php");
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
    <link rel="stylesheet" href="../assets\css\registration\registration.css">
    <title>Registration Page</title>
</head>


<body>

    <div class="container">
        <div class="row">

            <div class="col-md-6 m-auto col-sm-12 col-xs-12  text-center pt-3 pb-3" id="form">


                <h2>Learn<span>Dev</span></h2>
                <br>
                <h3>Sign-up</h3>
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
                <form method="POST" action="">
                    <input type="text" name="fullname" id="fullname" placeholder="Your name">
                    <br>
                    <br>
                    <input type="text" name="username" id="username" placeholder="Username">
                    <br>
                    <br>
                    <input type="email" name="email" id="email" placeholder="Email">
                    <br>
                    <br>
                    <select name="role" id="role">
                        <option value="learner">Learner</option>
                        <option value="tutor">Tutor</option>
                    </select>

                    <br>
                    <br>

                    <input type="text" name="contact" id="contact" placeholder="Contact no.">
                    <br>
                    <br>
                    <input type="password" name="password" id="pass" placeholder="Password">
                    <br>
                    <br>
                    <input type="text" name="cpassword" id="cpass" placeholder="Confirm Password">
                    <br>
                    <br>

                    <input type="submit" name="submit" value="Sign-Up">

                    <br>

                    <br>
                </form>
                <p>Already have an <a href="login.php">account ?</a></p>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>


</body>

</html>