<?php
include '../includes/dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../assets\css\pages\profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../assets/css/navigation/navigations.css">
    <link rel="stylesheet" type="text/css" href="../assets\css\template.css">

    <link rel="stylesheet" type="text/css" href="../assets\css\dashboard\dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/853a85cf7b.js" crossorigin="anonymous">
    </script>


    <title>LearnDev</title>
</head>
<style>
#logo h4 {
    color: white;
    font-size: 35px;
    font-family: 'Roboto', 'san-sarif';
    font-weight: 600;
}

#logo span {
    color: #393232;
    font-weight: 900;
}

.navbar-nav .nav-link {
    color: white !important;
    font-family: 'Roboto', 'san-sarif' !important;
    font-weight: 700 !important;
}

.div a {
    color: white;
    font-family: 'Roboto', 'san-sarif';
    font-weight: 600;
    color: white;
    border: 1px solid red;
}

.div a:hover {
    background: white;
    color: blue;
}

.bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
}

@media (min-width: 768px) {
    .bd-placeholder-img-lg {
        font-size: 3.5rem;
    }
}

#description {
    height: 100px;
    overflow-y: scroll;
}

.navbar-nav .nav-link .active {
    border-bottom: 2px solid gray;
}
</style>

<body>
    <?php
                $id =$_SESSION['id'];
                $select_pic = "SELECT * FROM users WHERE id='$id'";
                $select_pic_run = mysqli_query($con,$select_pic);
                $array_pic = mysqli_fetch_array($select_pic_run);
               
                    ?>
    <nav class="navbar navbar-expand-lg  " style="background:#b4aee8 !important;">
        <div class="container">
            <a class="navbar-brand  " id="logo" href="../index.php">
                <h4>Learn<span>Dev</span></h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php if(isset($_GET['page']) && $_GET['page']=="index"){echo "active";}?>"
                            aria-current="page" href="../index.php?page=index">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="tutorial.php?page=tutorial">Tutorials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="chat.php?page=chat">Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="template_upload.php?page=templates">Templates</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Languages
                        </a>
                        <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="php.php">Php</a></li>
                            <li><a class="dropdown-item" href="asp_net.php">Asp .net</a></li>
                            <li><a class="dropdown-item" href="php.php">c programming</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item disabled" href="#">All languages</a></li>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex mr-5">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear"></i> Settings
                        </button>
                        <ul class="dropdown-menu " style="margin-left:-50px;">
                            <li><a class="dropdown-item" style="font-family : 'Roboto' ,'san-sarif' ; font-weight:800;"
                                    href="
                                    profile.php?pic=jkl"> <span><i class="bi bi-person-fill"></i>
                                    </span> Profile</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-danger  "
                                    style="font-family : 'Roboto' ,'san-sarif' ; font-weight:800;" href="logout.php">
                                    <span><i class="bi bi-box-arrow-right"></i></span> Logout</a>
                            </li>
                        </ul>
                    </div>
                    <?php
            if($_SESSION['role']=="tutor"){
                ?>
                    <div class="div mx-3">
                        <a href="dashboard.php" class="btn  border  ">Dashboard</a>
                    </div>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </nav>
    <!-- 
    <div class="wraper">

        <div class="side-nav">
            <div class="profile">

                <?php
                $id =$_SESSION['id'];
                $select_pic = "SELECT * FROM users WHERE id='$id'";
                $select_pic_run = mysqli_query($con,$select_pic);
                $array_pic = mysqli_fetch_array($select_pic_run);
                
                if(isset($_SESSION['profile_pic'])){
                    echo '<img src="../images/'.$array_pic['profile_pic'].'" alt="">';
                    
                }
                else{
                 
                    ?>
                <img src="../images\person-icon\person.png" alt="">
                <?php
                
                    }
                    ?>

                <h3>
                    <a href="profile.php"> <?php echo $_SESSION['username']; ?></a>
                </h3>
                <h5>
                    <a href="profile.php"> <?php echo $_SESSION['role']; ?></a>
                </h5>
            </div>
            <div class="navs">



                <div class="nav-links  <?php if(isset($_GET['page']) && $_GET['page']=="index"){echo "active";}?>">
                    <a href="../index.php?page=index"><i class="fas fa-home"></i> Home </a>
                </div>
                <?php
            if($_SESSION['role']=="tutor"){
                ?>
                <div class="nav-links <?php if(isset($_GET['page']) && $_GET['page']=="dashboard"){echo "active";}?>">
                    <a href="dashboard.php?page=dashboard"> <i class="fas fa-tachometer-alt"></i> Dashboard </a>
                </div>
                <?php 
            }
            
            ?>
                <div class="nav-links <?php if(isset($_GET['page']) && $_GET['page']=="tutorial"){echo "active";}?>">
                    <a href="tutorial.php?page=tutorial"> <i class="fas fa-school"></i> Tutorials </a>
                </div>
                <div class="nav-links ">
                    <a href="#" class="language" ;> <i class="fas fa-school"></i> Languages </a>
                    <div class="box mt-3">
                        <div class="close">
                            <i class="fas fa-times"></i>
                        </div>
                        <table>
                            <tr>
                                <td class="links" id="php"> <a href="../pages/php.php"> Php </a></td>

                            </tr>
                            <tr>
                                <td class="links" id=".net">Asp .Net</td>
                            </tr>
                            <tr>
                                <td class="links" id="React">React</td>
                            </tr>
                            <tr>
                                <td class="links" id="Ruby">Ruby</td>
                            </tr>
                        </table>

                    </div>
                </div>
                <div class="nav-links <?php if(isset($_GET['page']) && $_GET['page']=="chat"){echo "active";}?>">
                    <a href="chat.php?page=chat"> <i class="fas fa-comment-alt"></i> Chat </a>
                </div>
                <div class="nav-links <?php if(isset($_GET['page']) && $_GET['page']=="profile"){echo "active";}?>">
                    <a href="profile.php?page=profile&pic=yes"><i class="fas fa-user-circle"></i> Profile </a>
                </div>
                <div class="nav-links <?php if(isset($_GET['page']) && $_GET['page']=="template"){echo "active";}?>">
                    <a href="template.php"> <i class="fas fa-sign-out-alt"></i>Templates </a>
                </div>
            </div>
            <div class="logout">

                <a href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout </a>
            </div>
        </div>
        <div class="nav">
            <div class="header">
                <div class="left-top">
                    <button id="button">
                        <!-- <i class="fas fa-ellipsis-v"></i> -->
    <!-- <i class="far fa-times-circle"></i>
    </button>
    <div class="logo">
        <h2>L<span>D</span></h2>
        <h1>Learn<span>Dev</span></h1>
    </div>
    </div>
    <div class="right-top">
        <a href="chat.php"><i class="far fa-bell"></i></a>
        <p>1</p>
    </div>
    </div>  -->