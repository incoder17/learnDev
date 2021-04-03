<?php
session_start();
include '../includes/dbconnection.php';

// $id = $_POST['ids'];

// echo $username;
  $query = "SELECT * FROM playlist WHERE playlist_title= 'Php tuts'";
$run_query = mysqli_query($con, $query);

while($query_run_array = mysqli_fetch_array($run_query)){
// print_r ($query_run_array);
?>
<!-- <div class="d-flex align-items-center position-relative playlist " style="cursor:pointer;"
                id="">

                <!-- <img src=" ..." class="flex-shrink-0 me-3" alt="..."> -->
<!-- <div>
                <h5 class="mt-0" "> <?php echo $query_run_array['playlist_title'];?>
                            </h5>
                            <p class=" stretched-link "><i style=" font-size:20px;"
                    class="bi bi-collection-play-fill text-danger"></i>
                    Go to Playlist</p>



            </div>
        </div> -->
<div class="col-md-4 my-1">

    <div class="card" id="<?php echo $query_run_array['playlist_title'];?>">
        <div class="card-header">
            <?php echo $query_run_array['heading'];?>
        </div>
        <div class="card-body">
            <h5 class="card-title">Description</h5>
            <p class="card-text" id="description"><?php echo $query_run_array['description'];?></p>

        </div>
        <div class="d-flex justify-content-between">

            <div class="btn btn-success m-2" id="edit"> <span><i class="bi bi-pencil-square"></i></span>
                Edit</div>
            <div class="btn btn-danger m-2" id="delete"> <span><i class="bi bi-trash"></i></span> Delete
            </div>
        </div>
    </div>

</div>
<!-- <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 fw-normal"><?php echo $query_run_array['playlist_title'];?></h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>10 users included</li>
                            <li>2 GB of storage</li>
                            <li>Email support</li>
                            <li>Help center access</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
                    </div>
                </div>
                <?php 
            // echo "Hello";
            }
            ?>