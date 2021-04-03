<?php 
session_start();
if($_SESSION['id']==""){
    header("location:pages/login.php");
}
else{
$_SESSION['playListTitle']="";
if(!empty($_GET['file']))
{
    $filename = basename($_GET['file']);
	$filepath =  "../templates/".$filename;
	if(!empty($filename) && file_exists($filepath)){
        
//Define Headers
header("Cache-Control: public");
header("Content-Description: FIle Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/zip");
header("Content-Transfer-Emcoding: binary");

readfile($filepath);
// header("location:download.php");
exit;

}
else{
    echo "This File Does not exist.";
}
}
include '../includes/header_page.inc.php';




?>
<?php if($_SESSION['role']=="tutor"){
    ?>
<section id="upload" class="pt-5">
    <div class="container text-center">
        <div class="row">
            <h1 style="font-weight:800; font-size:55px; ">ADD Template</h1>
        </div>
        <div class="row">
            <div class="col-md-7 mx-auto mt-5">
                <div class="row g-3 align-items-center">
                    <form id="upload_temp">


                        <div class="mb-3 row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title">
                            </div>
                        </div>
                        <div class="title_error">

                        </div>
                        <div class="input-group">
                            <input type="file" class="form-control" name="file" id="file"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload">

                        </div>
                        <div class="file_error">

                        </div>
                        <button type="submit"
                            class="btn btn-primary mt-3 d-flex align-items-center justify-content-center"
                            id="upload_tem">
                            <span class="spinner-border d-none spinner-border-sm" role="status"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Loading...</span>
                            Upoad</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<?php
}
?>

<section id="all_templates">
    <div class="container ">
        <h1 class="text-center" style="font-family:'Roboto','san-sarif'; padding-bottom:10px; font-weight:800; color:#3b3b3b; 
            width:100%; border-bottom: 2px solid #F3F2F2 ;">
            All
            templates</h1>
        <div class="row mt-5 " id="templates">
            <?php 
            
            $query = "SELECT * FROM `templates` Order By  id DESC ";
            $query_run =mysqli_query($con, $query);
            $query_row = mysqli_num_rows($query_run);
          while($row = mysqli_fetch_assoc($query_run)) {
        ?>
            <div class="col-md-4 mb-3 ">

                <div class="card" id="<?php echo $row['template_name']; ?>">
                    <h5 class="card-header">Templates Name</h5>
                    <div class="card-body">

                        <h5><?php echo $row['template_name'];?></h5>
                        <a class="btn btn-primary"
                            href="template_upload.php?file=<?php echo $row['file_name'];?>">Download</a>
                        <h5 class="mt-3">Author: </h5>
                        <p class="card-text"><?php echo $row['uploader_name']; ?></p>
                        <?php
                        if($row['uploader_name'] === $_SESSION['username']){
                            ?>
                        <button type="button" class="btn btn-danger delete" data-bs-toggle="modal"
                            data-bs-target="<?php echo '#'.$row['template_name']; ?>">
                            Delete
                        </button>
                        <div class="modal fade" id="<?php echo $row['template_name']; ?>" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger">Are you sure you want to delete ?</div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-primary delete">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <?php }?>

            <!-- Button trigger modal -->


            <!-- Modal -->

        </div>
    </div>
</section>
<?php



include '../includes/footer.inc.php';

}
?>