<?php  
session_start();
include '../includes/dbconnection.php';
$uploader_username =$_SESSION['fullname'];
$playListTitle= $_SESSION['playListTitle'];
 $sql = 'SELECT `date_time` FROM `playlist` WHERE uploader_username = "'.$uploader_username.'" AND playlist_title = "'.$playListTitle.'" ';   
 function facebook_time_ago($timestamp)  
 {  
      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
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
   $result = mysqli_query($con, $sql);
 
 $row = mysqli_fetch_assoc($result);
 date_default_timezone_set('Asia/Kolkata');  
 echo facebook_time_ago($row['date_time']);  
 
    }
 }  
 ?>