<?php 
session_start();
if($_SESSION['id']==""){
    header("location:pages/login.php");
}
else{
$_SESSION['playListTitle']="";
include '../includes/header_page.inc.php';
?>



<!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/pricing/"> -->











<!-- Custom styles for this template -->
<!-- <link href="pricing.css" rel="stylesheet"> -->
</head>

<body>

    <header
        class="d-flex flex-column flex-md-row align-items-center justify-content-center p-3 px-md-4 mb-3 bg-body border-bottom shadow-sm container">

        <p class="h5 my-0 me-md-auto fw-normal">LearnDev <span>(Editing section)</span></p>



    </header>

    <main class="container">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Editing</h1>
            <p class="lead">Quickly edit an effective tutorials section for your potential students.</p>
        </div>
        <div class="messages">
        </div>

        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center" id="sections">
            <?php

$fullname = $_SESSION['fullname'];

// echo $username;
  $query = "SELECT * FROM playlist WHERE uploader_username= '$fullname'";
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
            <div class="col-md-4 my-1 fadeDown">

                <div class="card" id="<?php echo $query_run_array['id'];?>">
                    <div class="card-header">
                        <?php echo $query_run_array['playlist_title'];?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Description</h5>
                        <p class="card-text" id="description"><?php echo $query_run_array['description'];?></p>

                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-success m-2 edit" id="<?php echo $query_run_array['id'];?>"
                            data-bs-toggle="modal" data-bs-target="#edit_model">
                            <span><i class="bi bi-pencil-square"></i></span>
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger m-2 delete"
                            id="<?php echo $query_run_array['id'];?>" data-bs-toggle="modal"
                            data-bs-target="#delete_model">
                            <span><i class="bi bi-trash"></i></span> Delete
                        </button>

                        <!-- <div class="btn btn-danger m-2" id="delete"> <span><i class="bi bi-trash"></i></span> Delete
                        </div> -->


                        <!-- edit model -->
                        <div class="modal fade" id="edit_model" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit your video</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form id="edit_form">
                                        <div class="modal-body">
                                            <input type="email" class="form-control" hidden id="floatingInput"
                                                value="<?php echo $query_run_array['id'];?>" name="id" required>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput"
                                                    value="<?php echo $query_run_array['playlist_title'];?>"
                                                    name="playlist_title" required>
                                                <label for="floatingInput">Title</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput"
                                                    value="<?php echo $query_run_array['video_title'];?>"
                                                    name="video_title" required>
                                                <label for="floatingInput">Title</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput"
                                                    value="<?php echo $query_run_array['heading'];?>" name="heading"
                                                    required>
                                                <label for="floatingInput">Title</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput"
                                                    value="<?php echo $query_run_array['description'];?>"
                                                    name="description" required>
                                                <label for="floatingInput">Title</label>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" type="submit" id="edit_done"
                                                class="btn btn-success">Edit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- delete Modal -->
                        <div class="modal fade text-left" id="delete_model" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Sure your want to delete this
                                            tutorial ?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="delete_modal-body">
                                        <h2>


                                        </h2>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInput"
                                                placeholder="name@example.com">
                                            <label for="floatingInput">Email address</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-danger" id="delete_confirmed"
                                            data-bs-dismiss="">Delete</button>
                                    </div>
                                </div>
                            </div>
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
-->
        </div>


    </main>



</body>

</html>
<script src="../js\jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $(".delete").on("click", function() {
        var ids = $(this).attr('id');
        // alert(ids);
        $.ajax({
            type: 'POST',
            url: '../functions/delete_playlist_details.php',
            data: {
                id: ids,
            },

            success: function(response) {
                $("#delete_modal-body").html(response);
            }
        });
    });
    $("#delete_confirmed").on("click", function() {
        var ids = $('.delete').attr('id');
        // alert(ids);
        $.ajax({
            type: 'POST',
            url: '../functions/delete_confirm_details.php',
            data: {
                id: ids,
            },

            success: function(result) {

                // $("#sections").html(result);
                window.location.href = "edit_playlist.php?deleted=yes";

            }

        });
    });

    // $(".edit").on("click", function() {
    //     var ids = $(this).attr('id');
    //     // alert(ids);


    // });
    $("#edit_done").on("click", function() {
        var formValues = $("#edit_form").serialize();
        // alert(formValues);
        var ids = $(".edit").attr('id');
        $.post("../functions/edit_confirm_details.php", formValues, function(data) {
            // Display the returned data in browser
            // alert(data);
            if (data == "1") {
                // alert(data);
                location.reload();
            }

        });
    });
});
</script>

<?php
include '../includes/footer.inc.php';
}

?>