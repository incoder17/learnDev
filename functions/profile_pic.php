<?php 
session_start();
include '../includes\dbconnection.php';
// print_r ($_FILES['profile_file']);
    $id = $_SESSION['id'];
    $file = $_FILES['profile_file'];
    
    $fileName =$_FILES['profile_file']['name'];
    $fileTmpName =$_FILES['profile_file']['tmp_name'];
    $fileSize =$_FILES['profile_file']['size'];
    $fileError =$_FILES['profile_file']['error'];
    $fileType =$_FILES['profile_file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt =strtolower(end($fileExt));
    $allowed = array('jpeg','jpg','png');
    // echo '<pre>';
    // print_r ($allowed);
    // echo '</pre>';

    if(in_array($fileActualExt,$allowed)){
        if($fileError===0){
            $fileNameNew = uniqid('',true).".".$fileActualExt;
            $fileDistination = '../images/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDistination);
            $insert_pic = "UPDATE users SET profile_pic = '$fileNameNew'  WHERE id='$id'";
            $insert_pic_run  = mysqli_query($con,$insert_pic);
            $_SESSION['profile_pic']= $fileNameNew;
          echo "1";
                    
                   
                       
                  

}else{
// header('location:../pages\profile.php');
echo "OutSide ".$error;
}
}else{
// header('location:../pages\profile.php');
echo "OutSide ".$extension;
}

?>