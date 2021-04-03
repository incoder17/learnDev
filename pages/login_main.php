<?php 
session_start();
if(isset($_SESSION['id']) AND $_SESSION['id']!=""){
header("location:../index.php");
}
else{
    $_SESSION['id']="";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Registration LearnDev</title>
</head>
<style>
.input-group-text {
    background: #6e9fe5;
}

i {
    font-size: 18px;
    color: white;
}
</style>

<body>

    <div class="container mt-5 ">
        <div class="row  ">
            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12 mx-auto bg-light pb-3 px-0">

                <h3 style="background:#0B5ED7;" class=" p-2 pb-3 text-light text-center">Login Form</h3>
                <h2 style="text-align:center;color:#6A81F4; font-weight:900;  ">

                    <img width="40%" src="../images\title-icon\logo.png" alt="">
                </h2>

                <form class="mx-5 mt-3" id="loginForm">






                    <div class="d-flex mb-3  " style="flex-direction:column;">
                        <div class=" input-group flex-nowrap ">

                            <span class="input-group-text" id="addon-wrapping"><i
                                    class="bi bi-envelope-fill"></i></span>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                aria-label="Email" aria-describedby="addon-wrapping">
                        </div>
                        <div id="email_validation">

                        </div>
                    </div>


                    <div class="d-flex mb-3  " style="flex-direction:column;">
                        <div class=" input-group flex-nowrap ">

                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key-fill"></i></span>
                            <input type="password" class="form-control" name="password" autocomplete="off" id="password"
                                placeholder="Password" aria-label="Password" aria-describedby="addon-wrapping">
                        </div>
                        <div id="password_validation">

                        </div>
                    </div>
                    <p class=" error d-none ">

                        Password or email is wrong !!
                    </p>
                    <div class="text-center ">
                        <button type="submit" name="login" class="btn btn-primary py-2 mt-3 w-100 "
                            style="font-size:20px;font-weight:600;">Signup</button>
                    </div>
                    <p class="mt-3">Don't have an account ?<a href="registration_main.php"> Register Now</a>
                    </p>

                </form>

            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="../js/jquery.js"></script>
    <script src="../js/login.js"></script>


</body>

</html>

<?php
}
?>