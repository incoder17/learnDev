<?php 
session_start();
if($_SESSION['id']==""){
    header("location:./login.php");
}
else{


        include '../includes/dbconnection.php';
        $id=$_SESSION['id'];
        $query_email = "SELECT * FROM users WHERE id ='$id'";
        $query_email_run = mysqli_query($con,$query_email);
        $query_array = mysqli_fetch_array($query_email_run);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/navigation/navigations.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/pages/profile.css"> -->
    <link rel="stylesheet" type="text/css" href="../assets\css\chat\chat.css">
    <!-- <link rel="stylesheet" type="text/css" href="../assets\css\dashboard\dashboard.css"> -->
    <script src="https://kit.fontawesome.com/853a85cf7b.js" crossorigin="anonymous">
    </script>


    <title>LearnDev</title>
</head>


<body>
    <?php include '../includes/header_page.inc.php';
?>
    <div class="upper_box">

    </div>
    <div class="main  ">

        <div class="container-fluid  ">

            <div id="people" class="row ">
                <div class="col-md-3  p-0" style="  background:#f5f5f5; ">
                    <div class="container">
                        <form class="container " id="search">
                            <div class="back">
                                <a href="../index.php"><i class="fas fa-arrow-left"></i></a>
                            </div>
                            <input type="text" autocomplete="off" name="search" id="search-box" placeholder="Search..">
                            <!-- <button type="submit"><i class="fa fa-search"></i></button> -->

                        </form>

                        <div style="width:100%;  z-index:100;" class="row mx-auto " id="all_people">
                            <ul id="refresh">
                                <?php
                        date_default_timezone_set("Asia/Kolkata");
if($_SESSION['username']!= ""){

    $current_user_id = $_SESSION['username'] ;
    $get_users_query = "SELECT * FROM users WHERE username !='$current_user_id' ";
    $get_users_query_run = mysqli_query($con, $get_users_query);
    function facebook_time_ago($timestamp)  
{  
     $time_ago = strtotime($timestamp);  
     $current_time = time();  
     $time_difference = $current_time - $time_ago;  
     $seconds = $time_difference;  
     $minutes = round($seconds / 60 );           // value 60 is seconds  
     $hours   = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
     $days    = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
     $weeks   = round($seconds / 604800);          // 7*24*60*60;  
     $months  = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
     $years   = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
     if($seconds <= 60)  
     {  
    echo "Just Now";  
  }  
     else if($minutes <=60)  
     {  
    if($minutes==1)  
          {  
      echo "one minute ago";  
    }  
    else  
          {  
      echo "$minutes minutes ago";  
    }  
  }  
     else if($hours <=24)  
     {  
    if($hours==1)  
          {  
      echo "an hour ago $seconds";  
    }  
          else  
          {  
      echo "$hours hrs ago";  
    }  
  }  
     else if($days <= 7)  
     {  
    if($days==1)  
          {  
      echo "yesterday";  
    }  
          else  
          {  
      echo "$days days ago"."</br>";  
       
    }  
  }  
     else if($weeks <= 4.3) //4.3 == 52/12  
     {  
    if($weeks==1)  
          {  
      echo "a week ago";  
    }  
          else  
          {  
      echo "$weeks weeks ago";  
    }  
  }  
      else if($months <=12)  
     {  
    if($months==1)  
          {  
      echo "a month ago";  
      echo date('d-m-Y'); 
    }  
          else  
          {  
      echo "$months months ago";  
      echo date('d-m-Y'); 
    }  
  }  
     else  
     {  
    if($years==1)  
          {  
      echo "one year ago";  
    }  
          else  
          {  
      echo "$years years ago";  
    }  
 



   }
}
    while ($get_users_query_array = mysqli_fetch_assoc($get_users_query_run)){
    // $get_fullname = $get_users_query_array['fullname'];
    // $get_username = $get_users_query_array['username'];
    // $get_activity = $get_users_query_array['activity'];
    // $get_entry = $get_users_query_array['entry'];
 $time_of_user =  $get_users_query_array['entry']; 
    ?>
                                <li id="li" class="<?php echo $get_users_query_array['username']; ?>">

                                    <!-- <a href="#" id="<?php echo $get_users_query_array['fullname']; ?>" ></a> -->
                                    <!-- <div id="names" ><?php echo $_SESSION['username']; ?></div> -->
                                    <div id="peoples" class="row d-flex">
                                        <div class="col-md-3 ">
                                            <div class="circle">

                                                <img src=' <?php 
                                // if($_SESSION['profile_pic']!="" )
                                // {
                                    if(!$get_users_query_array['profile_pic']==""){
                            
                                        // $get_users_query_array['profile_pic']= $query_array['profile_pic'];
                                        echo "../images/".$get_users_query_array['profile_pic'];
                                    }
                                    else{
    
                                        ?>
                                ../images/person-icon/person.png 
                                    <?php
                                    }
                                    
                           
                                ?>
                                ' alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-9">

                                            <div class="details   ">
                                                <div id="name">
                                                    <?php echo $get_users_query_array['username'];?>
                                                </div>
                                                <?php
                                             if($get_users_query_array['activity']== "Online"){
    
                                                 ?>
                                                <div class="online">

                                                    <div class="text">
                                                        Online
                                                    </div>
                                                </div>
                                                <?php
                                                    }
                                                else{
    
                                                    ?>
                                                <div class="offline">

                                                    <div class="text">
                                                        Offline </div>
                                                </div>
                                                <?php
                                            }
                                                ?>

                                                <div class="time">

                                                    <?php 

                                                    // $date=date('H:i', strtotime($get_users_query_array['entry']));
                                                    // $time = date("g:i a", strtotime($get_users_query_array['entry']));
                                                     $last = facebook_time_ago($get_users_query_array['username']);
                                                    echo $last;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                <?php
    }
    
// }
    ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9" style=" height:100vh; background:#ffffff; display:flex; flex-direction:column; ">
                    <!-- <div class="row  p-3   " style="border-bottom:2px solid rgb(223, 223, 223) ; background:#F5F5F5;"
                        id="chat_header">
                        <div id="profile_details">
                            <div id="content"></div>
                            <div id="activity"></div>
                            <div id="names"> </div>

                        </div>
                        <div class="col-md-2">
                            slkgsjdfkl
                        </div>
                    </div> -->
                    <div class="row p-3" id="header_chat"
                        style="border-bottom:2px solid rgb(223, 223, 223) ; background:#F5F5F5;">
                        <div id="profile">

                            <div id="content"></div>
                            <div id="activity"></div>
                            <div id="names"> </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="container">

                        <div class="row" id="main_chat">

                            <!-- 
                            <div class="shadow-sm receiver">
                                <div class="message">
                                    Message sdlhasdklfkl;asdjflasd fl;kasdj fl;kasdlf asdl;f jfj lasdjf l;asdj fl;asdj
                                    fl;asd jfl;asdjf l;asdjfl;asdnfasdnf,asdfuklawerhfasdfkjscnfkj
                                </div>
                                <div class="receiver_time">
                                    time </div>
                            </div>
                            <div class="receiver">
                                <div class="message">
                                    Message sdlhasdklfkl;asdjflasd fl;kasdj fl;kasdlf asdl;f
                                </div>
                                <div class="receiver_time">
                                    time </div>
                            </div>
                            <div class=" shadow-sm sender">
                                <div class="message">
                                    Message sdlhasdklfkl;asdjflasd fl;kasdj fl;kasdlf asdl;f jfj lasdjf l;asdj fl;asdj
                                    fl;asd jfl;asdjf l;asdjfl;asdnfasdnf,asdfuklawerhfasdfkjscnfkj
                                </div>
                                <div class="sender_time">
                                    10:1pm
                                </div>
                            </div> -->
                        </div>

                    </div>
                    <div class="error">

                    </div>
                    <div class="container" id="send">

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/jquery.js">

    </script>
    <script src="../js/chat.js">

    </script>

</body>

</html>


</html>
<?php
}
?>