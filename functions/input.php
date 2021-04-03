    <?php
    session_start();
    include '../includes/dbconnection.php';

    // echo $_POST['name'] ;
    
    
    
    ?>

    <button id="button_file">
        <i class="bi bi-paperclip"></i>
    </button>
    <input type="text" id="chat_send" placeholder="Type a message">
    <input type="text" hidden id="clas" value="<?php echo $_POST['name'];?>">
    <button id="button_send">
        <i class="bi bi-arrow-right-circle-fill"></i>
    </button>


    <script>
$(document).ready(function() {

    $("#button_send").on('click', function(e) {
        e.preventDefault();
        var input_check = $('#chat_send').val();
        var clas = $('#clas').val();

        if (input_check == "") {
            $("#error").html('<h1>no Message entered</h1>');
        } else {
            $.ajax({
                url: "../functions/insert_message.php",
                type: "POST",
                data: {
                    name: clas,
                    input: input_check,
                },
                cache: false,
                success: function(dataResult) {
                    $('#chat_send').val("");
                    // alert(dataResult);


                }
            });
        }
    });

});
    </script>