<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/jquery.js">
</script>
<script src="../js/custom.js">
</script>
<script>
$(document).ready(function() {
    $("#li").on('click', function() {
        var id = $("a").attr("id");
        alert(id);
    });
    $("#title").on('focus', function() {
        $("#title").css("border", "none");
        $(".title_error").html("");
    });
    $("#upload_temp").on('submit', function(e) {
        e.preventDefault();
        var title = $("#title").val();
        var file = $("#file").val();
        var template_form = new FormData(document.getElementById("upload_temp"));
        if (title == "") {
            $("#title").css("border", "1px solid red");
            $(".title_error").html("<p class='text-danger'>Enter the title </p>");
        }
        if (file == "") {
            $("#file").css("border", "1px solid red");
            $(".file_error").html("<p class='text-danger'>Choose a Zip File first</p>");

        } else {
            $.ajax({
                method: 'POST',
                url: '../functions/template_uploading.php',
                data: template_form,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $("#templates").prepend(response);
                    $("#title").val("");
                    $("#file").val("");
                }
            });
        }
    });

    $("#file").on("change", function(e) {
        e.preventDefault();
        // var profile_pic_file = $("#file").val();
        var profile_pic_form = new FormData(document.getElementById("profile_pic_form"));
        $.ajax({
            method: 'POST',
            url: '../functions/profile_pic.php',
            data: profile_pic_form,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                // alert(data);
                if (data == '1') {
                    location.reload();

                } else {
                    alert("Please upload only JPG,jpg,JPEG,jpeg,PNG,png files ");
                }
            }
        });
    });
    $("#edit_profile").on("click", function(e) {
        e.preventDefault();
        // alert("Clicked");
        $("#profile_details").load("../functions/edit_profile_details.php");


    });
    $(".delete").on("click", function() {
        var ids = $(".card").attr("id");
        $(".modal-body").html(ids);
    });

});
</script>


</body>


</html>