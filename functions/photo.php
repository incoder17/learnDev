<?php
session_start();
include '../includes/dbconnection.php';
$username = $_POST['name'];
$query = "SELECT profile_pic FROM `users` WHERE username= '$username'";
$run_query = mysqli_query($con, $query);
$run_query_array = mysqli_fetch_assoc($run_query);
// print_r ($run_query_array['activity']);
?>


                      
<!-- 
        <div id="
        <?php
                        if($run_query_array['activity']=='Online'){
                            ?>
                            online
                            <?php

                        }
                        else{
                            ?>
                            offline
                        <?php
                        }
                        ?>">
                        
                        </div> -->

                        <img width="55px" height="55px" style="object-fit:cover; border-radius:50%;"
                            src=' <?php 
                            // if($_SESSION['profile_pic']!="" )
                            // {
                                if(!$run_query_array['profile_pic']==""){
                        
                                    echo "../images/".$run_query_array['profile_pic'];
                                    
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
                            
