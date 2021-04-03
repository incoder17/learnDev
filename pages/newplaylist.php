<?php 
session_start();
include '../includes/dbconnection.php';
if($_SESSION['id']==""){
    header("location:pages/login.php");
}
else{
    date_default_timezone_set('Asia/Kolkata');  
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New play list </title>
    <link rel="stylesheet" type="text/css" href="../assets\css\pages\newplaylist.css">
    <link rel="icon" href="../images\title-icon\title-logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/853a85cf7b.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="back">
        <a href="dashboard.php"><i class="fas fa-arrow-left"></i> Back</a>
    </div>
    <div id="loading">
        <p class='errorHeading'> Heading not entered</p>
    </div>
    <div class="header">
        <div class="file">

            <form id="submit_form">
                <br>
                <div id="changeHeading">
                    <!-- <p style=' color:red; font-size:8px; background:#ff6e6e; color:white; padding:2px 0px;'>The heading
                        should be less than 6 words!! </p> -->
                </div>

                <input autocomplete="off" type="text" name="heading" id="heading" placeholder="Video title">

                <br>
                <!-- <input type="textbox" name="video_title" id="video_title" placeholder="Description"><br> -->
                <div id="changeDescription">
                    <!-- <p style=' color:red; font-size:8px; background:#ff6e6e; color:white; padding:2px 0px;'>The heading
                        should be less than 6 words!! </p> -->
                </div>
                <textarea rows="2" resize="off" cols="20" id="description" name="description"
                    placeholder="Description"></textarea>
                <br>
                <select id="languages" name="language">

                    <option value="php">Php</option>
                    <option value="java">java</option>
                    <option value="python">Python</option>
                    <option value="c">C</option>
                    <option value="c#">C#</option>

                </select>
                <br>
                <input type="file" name="file" id="playlist_video" hidden><br>
                <label id="label" for="playlist_video"><i class="far fa-plus-square">
                    </i> Select Video</label><br>
                <input type="submit" name="upload_button" id="upload_btn" value="Upload">

            </form>
        </div>

    </div>
    <div class="playlist_details">

        <div class="title">
            <p>Playlist Title</p>
            <hr>
            <form id="title_form">
                <div class="title-name">
                </div>
                <?php
                if($_SESSION['playListTitle']!=""){
                    ?>


                <?php
                 echo "<h1>".$_SESSION['playListTitle']."</h1>";
                ?>
                <?php
            }
            else{
                ?>
                <input autocomplete="off" type="text" id="title_name" name="playlist_title"
                    placeholder="No Playlist name yet ">
                <input type="submit" value="Add name">
                <?php
                }
                ?>


            </form>
            <div class="playlist_title">

                <div id="title_name">
                </div>

            </div>
        </div>



        <div id="videos">
            <?php
if($_SESSION['playListTitle']!="")
{
    $uploader_username = $_SESSION['fullname'];
$playListTitle= $_SESSION['playListTitle'];
$sql = 'SELECT `id`, `uploader_username`, `playlist_title`, `video_title`,`heading`,`description`,`date_time` FROM `playlist` WHERE uploader_username = "'.$uploader_username.'" AND playlist_title = "'.$playListTitle.'" ';   
$result = mysqli_query($con, $sql);
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
if (mysqli_num_rows($result) > 0) {
    // echo facebook_time_ago('2020-12-22 10:05:00');
   while($row = mysqli_fetch_assoc($result)) {
    //   echo "Id: " . $row["id"]."  ".$row["video_title"]. "<br>";
    $display = '<div class="playlist_videos"><video  style="width:100%; height:auto;" controls src="../video_tuts/'.$row['video_title'].'"></video>';
    $display .= '<div class="detail">';  
    $display .= '<div class="heading">';  
    $display .= $row['heading'];  
    $display .= '</div>';  
   
    $display .= '<div class="description">';  
    $display .= $row["description"];  
    $display .= '</div>';  
    $display .= '<div class="date_time">';  
    $display .= facebook_time_ago($row["date_time"]);  
    $display .= '</div>';  
    $display .= '</div>';  
    $display .= '</div>';  
    echo $display;
    // echo '<div class="playlist_videos"><video  style="width:100%; height:auto;padding-top:50px;" controls src="../video_tuts/'.$row['video_title'].'"></video>'.$row["heading"].'<br/>'.$row["description"].'</div>';
        
    }
   
 
 
} 
}
 
?>
        </div>


    </div>
    <div class="main">



    </div>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/custom.js"></script>

    <script>
    $(document).ready(function() {

        setInterval(function() { //setInterval() method execute on every interval until called clearInterval()
            $('.date_time').load("video_upload.php");
            //load() method fetch data from fetch.php page
        }, 1000);
        // $(".edit_title").on('click', function(e) {
        //     e.preventDefault();
        //     $("#title_form").show();
        //     var titlename = $("#title_name").val();
        //     var title_form_title = new FormData(this);

        //     if (titlename != "") {

        //         $.ajax({
        //             url: "../functions/playlistitle.php",
        //             method: "POST",
        //             data: title_form_title,
        //             contentType: false,
        //             cache: false,
        //             processData: false,
        //             success: function(title) {

        //                 $("#upload_btn").val(' Uploaded ');

        //                 $("#title_form").hide();
        //                 $("#loading").html("<p class='success'>Title Added</p>");
        //                 setTimeout(function() {

        //                     $("#loading").slideUp('slow');


        //                 }, 3000);
        //                 $(".title-name").html(title);
        //                 $(".edit_title").show();
        //                 $(".delete_title").show();

        //             }
        //         });
        //     } else {
        //         $("#loading").html(
        //             "<p class='error'>No Name Entered Yet</p>");
        //         setTimeout(function() {

        //             $("#loading").slideUp('slow');


        //         }, 3000);
        //     }
        // });
        $("#title_form").on('submit', function(e) {
            e.preventDefault();
            var titleName = $("#title_name").val();
            var title_form_data = new FormData(this);

            if (titleName != "") {

                $.ajax({
                    url: "../functions/playlistitle.php",
                    method: "POST",
                    data: title_form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(title) {

                        $("#upload_btn").val(' Uploaded ');

                        $("#title_name").html(title);
                        $("#title_form").hide();
                        $("#loading").html("<p class='success'>Title Added</p>");
                        setTimeout(function() {

                            $("#loading").slideUp('slow');


                        }, 3000);

                        // $(".edit_title").show();
                        // $(".delete_title").show();

                    }
                });
            } else {
                $("#loading").html(
                    "<p class='error'>No Name Entered Yet</p>");
                setTimeout(function() {

                    $("#loading").slideUp('slow');


                }, 3000);
            }
        });

        $("#heading").on("keyup", function(e) {
            var heading = $("#heading").val();
            var heading_trim = $.trim($("#heading").val());
            var heading_count = heading_trim.split(" ");
            var description = $("#description").val();

            if (heading_count.length > 5) {
                $("#changeHeading").show();
                $("#heading").css("border-bottom", "2px solid #ff6e6e");
                $("#changeHeading").html(
                    "<p style=' color:red; font-size:8px; background:#ff6e6e; color:white; padding:2px 0px;'>The heading should be less than 6 words!! </p>"
                );
            } else {
                $("#changeHeading").show();
                $("#heading").css("border-bottom", "2px solid #489755");
                $("#changeHeading").html(

                    "<p style=' color:red; font-size:8px;background:#489755; color:white; padding:2px 0px;'>" +
                    (heading_count.length--) + "    valid</p>"
                );
            }
        });
        $("#description").on("keyup", function(e) {
            var description = $("#description").val();
            var description_trim = $.trim($("#description").val());
            var description_count = description_trim.split(" ");
            var description = $("#description").val();

            if (description_count.length >= 100) {
                $("#changeDescription").show();
                $("#description").css("border", "2px solid #ff6e6e");
                $("#changeDescription").html(
                    "<p style=' color:red; font-size:8px; background:#ff6e6e; color:white; padding:2px 0px;'>The description should be less than 100 words!! </p>"
                );
            } else {
                $("#changeDescription").show();
                $("#description").css("border", "2px solid #489755");
                $("#changeDescription").html(

                    "<p style=' color:red; font-size:8px;background:#489755; color:white; padding:2px 0px;'>" +
                    (description_count.length--) + "    valid</p>"
                );
            }
        });
        $("#submit_form").on("submit", function(e) {
            e.preventDefault();
            var value = $("#playlist_video").val();
            var heading = $("#heading").val();
            var heading_trim = $.trim($("#heading").val());
            var heading_count = heading_trim.split(" ");
            var description = $("#description").val();
            var form_data = new FormData(this);

            if (value == "") {


                $("#loading").html("");

                $("#loading").html(
                    "<p class='error'> No file selected</p > "
                );
                setTimeout(function() {

                    $("#loading").slideUp('slow');


                }, 3000);
            } else if (heading == "") {
                $(".errorHeading").show();
                setTimeout(function() {

                    $("#loading").slideUp('slow');


                }, 3000);
            }
            if (heading_count.length > 5) {

                $("#max_heading").show();
            } else {
                $.ajax({

                    url: "../functions/video_upload.php",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $("#upload_btn").val('Uploading...Please wait !!');

                        $("#loading").html(
                            "<p class='waiting'>Uploading Please wait</p>");
                        setTimeout(function() {
                            $("#loading").slideUp(1000);
                        }, 2000);
                    },
                    success: function(data) {
                        if (data !== "1") {
                            $("#upload_btn").val(' Uploaded ');
                            $("#playlist_video").val("");
                            $("#heading").val("");
                            $("#description").val("");
                            $("#loading").html("<p class='success'>Uploaded</p>");
                            $("#videos").append(data);
                            $("#playlist_video").val('');

                            setTimeout(function() {
                                $("#upload_btn").val(' Upload ');
                                $(".success").slideUp(1000);
                            }, 1000);

                        } else {
                            alert('title not set ');
                        }

                    }

                });
            }

        });

    });
    </script>
</body>

</html>





<?php

}
?>