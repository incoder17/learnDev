<?php
 
session_start();

if($_POST['playlist_title'] != ""){
    if($_SESSION['playListTitle'] != ""){
        $title_name=$_POST['playlist_title'];
        $_SESSION['playListTitle']=$title_name;
        echo "<h1>".$_SESSION['playListTitle']."</h1>";
        

 
          
}
    else if($_SESSION['playListTitle'] == ""){
        $title_name=$_POST['playlist_title'];
        $_SESSION['playListTitle']=$title_name;
        echo "<h1>".$_SESSION['playListTitle']."</h1>";
        
 
          
}
}

    

?>