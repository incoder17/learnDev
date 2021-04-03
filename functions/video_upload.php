<?php
session_start();
include '../includes/dbconnection.php';
if($_SESSION['playListTitle']!=""){
$heading=$_POST['heading'];
$description=$_POST['description'];
$language = $_POST['language'];
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
    return "Just Now";  
  }  
     else if($minutes <=60)  
     {  
    if($minutes==1)  
          {  
      return "one minute ago";  
    }  
    else  
          {  
      return "$minutes minutes ago";  
    }  
  }  
     else if($hours <=24)  
     {  
    if($hours==1)  
          {  
      return "an hour ago";  
    }  
          else  
          {  
      return "$hours hrs ago";  
    }  
  }  
     else if($days <= 7)  
     {  
    if($days==1)  
          {  
      return "yesterday";  
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
      return "a week ago";  
    }  
          else  
          {  
      return "$weeks weeks ago";  
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
      return "$months months ago";  
      echo date('d-m-Y'); 
    }  
  }  
     else  
     {  
    if($years==1)  
          {  
      return "one year ago";  
    }  
          else  
          {  
      return "$years years ago";  
    }  
  }  
}  

    if($_FILES['file']['name']!=""){
        $filename=$_FILES['file']['name'];
        $test = explode(".",$_FILES['file']['name']);
        $file_extension = end($test);
        
        // $allowed = array('mp3','mp4','MP3','MP4');
        
        // if(!in_array($file_extension,$allowed)){
           
            $name = $_SESSION['id'].rand(100,999).'.'.$file_extension;
            $location = '../video_tuts/'.$name;
            
            move_uploaded_file($_FILES['file']['tmp_name'],$location);
            $uploader_username = $_SESSION['fullname'];
            $playListTitle= $_SESSION['playListTitle'];
            
            $insert_query = "INSERT INTO `playlist`( `uploader_username`, `playlist_title`,`video_title`,`heading`,`description`,`language`) VALUES ('$uploader_username','$playListTitle','$name','$heading','$description','$language')" ;
            $run_query = mysqli_query($con,$insert_query);
            $sql = 'SELECT `date_time` FROM `playlist` WHERE uploader_username = "'.$uploader_username.'" AND playlist_title = "'.$playListTitle.'" ';   
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $display = '<div class="playlist_videos"><video  style="width:100%; height:auto;" controls src="../video_tuts/'.$location.'"></video>';
            $display .= '<div class="detail">';  
            $display .= '<div class="heading">';  
            $display .=$heading;  
            $display .= '</div>';  
            $display .= '<div class="description">';  
            $display .=$description;  
            $display .= '</div>'; 
            $display .= '<div class="date_time">';  
            $display .= facebook_time_ago($row["date_time"]);  
            $display .= '</div>';   
            $display .= '</div>';  
            $display .= '</div>';  
            echo $display;
        // }
        // else{
        //     echo "<script>alert('".$file_extension."');</script>";
        // }
        
        
  
}

    $uploader_username = $_SESSION['fullname'];
    $playListTitle= $_SESSION['playListTitle'];
    
   
    $sql = 'SELECT `date_time` FROM `playlist` WHERE uploader_username = "'.$uploader_username.'" AND playlist_title = "'.$playListTitle.'" ';   
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

}
?>