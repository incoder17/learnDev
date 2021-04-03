<?php  
// session_start();
include '../includes/dbconnection.php';
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

    <!-- <a href="#" id="<?php echo $get_users_query_array['username']; ?>"></a> -->

    <div id="person_name" class="<?php echo $_SESSION['username']; ?>"><?php echo $_SESSION['username']; ?></div>
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
                                    
                                    
                                // }
                                // else{
                                //     // echo "../images/".$_SESSION['profile_pic'];
                                // }
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
    
}
    ?>