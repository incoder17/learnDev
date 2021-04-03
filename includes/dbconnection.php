<?php

$host = "localhost";
$name="root";
$password ="";
$db ="sem_4";

$con = mysqli_connect($host,$name,$password,$db);


if(!$con){
    die("Connection error :".mysqli_error());
}



?>