$(document).ready(function() {

    var fullname = $('#fullname').val();

    var username = $('#username').val();
    var error_username = false;
    var email = $('#email').val();
    var error_email = false;
    var role = $('#role').val();
    var contact = $('#contact').val();
    var error_contact = false;
    var password = $('#password').val();
    var confirmPassword = $('#confirmPassword').val();

    $("#registrationForm").on('submit', function(event) {
        var form_data_regis = new FormData(this);

        event.preventDefault();
        error = false;
        if ($('#fullname').val() == "") {
            $("#fullname_validation").show();
            $("#fullname").css("border", "5px solid rgba(249, 77, 77,0.3) ");
            $("#fullname_validation").html(
                '<span class="invalid-feedback" >Fullname Is required !</span>');
            $(".invalid-feedback").show();
            error = true;

        } else {
            // $("#fullname_valid").show();
            $("#fullname").css("border", "none ");
            $("#fullname_validation").hide();
            $(".invalid-feedback").hide();
            // $("#username_valid").show();
            // $("#username_invalid").hide();
            error = false;
        }

        if ($('#username').val() == "") {
            $("#username").css("border", "5px solid rgba(249, 77, 77,0.3) ");
            $("#username_validation").html(
                '<span class="invalid-feedback" >Username Is required !</span>');

            $(".invalid-feedback").show();
            $("#username_validation").show();

            error = true;
        } else {
            $("#username").css("border", "none ");
            $("#username_validation").hide();
            error = false;

        }
        if ($('#email').val() == "") {
            $("#email_validation").show();
            $("#email").css("border", "5px solid rgba(249, 77, 77,0.3) ");
            $("#email_validation").html(
                '<span class="invalid-feedback" >email Is required !</span>');
            $(".invalid-feedback").show();
            error = true;

        } else {
            // $("#email_valid").show();
            $("#email").css("border", "none ");
            $("#email_validation").hide();

            // $("#username_valid").show();
            // $("#username_invalid").hide();
            error = false;
        }
        if ($('#role').val() == "") {
            $("#role_validation").show();
            $("#role").css("border", "5px solid rgba(249, 77, 77,0.3) ");
            $("#role_validation").html(
                '<span class="invalid-feedback" >role Is required !</span>');
            $(".invalid-feedback").show();
            error = true;

        } else {
            // $("#role_valid").show();
            $("#role").css("border", "none ");
            $("#role_validation").hide();

            // $("#username_valid").show();
            // $("#username_invalid").hide();
            error = false;
        }


        if ($('#contact').val() == "") {
            $("#contact_validation").show();
            $("#contact").css("border", "5px solid rgba(249, 77, 77,0.3) ");
            $("#contact_validation").html(
                '<span class="invalid-feedback" >contact Is required !</span>');
            $(".invalid-feedback").show();
            error = true;

        } else if ($('#contact').val().length != 10) {
            $("#contact_validation").show();
            $("#contact").css("border", "5px solid rgba(249, 77, 77,0.3) ");
            $("#contact_validation").html(
                '<span class="invalid-feedback" >Contact No Should contain 10 digit number  !</span>'
            );
            $(".invalid-feedback").show();
            error = true;
        } else {
            // $("#contact_valid").show();
            $("#contact").css("border", "none ");
            $("#contact_validation").hide();

            // $("#username_valid").show();
            // $("#username_invalid").hide();
            error = false;
        }
        []
        if ($('#password').val() == "") {
            $("#password_validation").show();
            $("#password").css("border", "5px solid rgba(249, 77, 77,0.3) ");
            $("#password_validation").html(
                '<span class="invalid-feedback" >password Is required !</span>');
            $(".invalid-feedback").show();
            error = true;

        } else if ($('#password').val().length < 6) {
            $("#password_validation").show();
            $("#password").css("border", "5px solid rgba(249, 77, 77,0.3) ");
            $("#password_validation").html(
                '<span class="invalid-feedback" >password Should contain min 6 characters or digits !</span>'
            );
            $(".invalid-feedback").show();
            error = true;
        } else {
            // $("#password_valid").show();
            $("#password").css("border", "none ");
            $("#password_validation").hide();

            // $("#username_valid").show();
            // $("#username_invalid").hide();
            error = false;
        }

        if ($('#confirmPassword').val() == "") {
            $("#confirmPassword_validation").show();
            $("#confirmPassword").css("border", "5px solid rgba(249, 77, 77,0.3) ");
            $("#confirmPassword_validation").html(
                '<span class="invalid-feedback" >confirmPassword Is required !</span>');
            $(".invalid-feedback").show();
            error = true;

        } else if ($("#confirmPassword").val() !== $("#password").val()) {
            $("#confirmPassword_validation").show();
            $("#confirmPassword").css("border", "5px solid rgba(249, 77, 77,0.3) ");
            $("#confirmPassword_validation").html(
                "<span class='invalid-feedback' >Passwords don't match</span>");
            $(".invalid-feedback").show();
            error = true;
        } else {
            // $("#password_valid").show();
            $("#confirmPassword").css("border", "none ");
            $("#confirmPassword_validation").hide();

            // $("#username_valid").show();
            // $("#username_invalid").hide();
            error = false;
        }
        if (error == false) {

            $.ajax({

                url: "../functions/regis_ajaxcall.php",
                method: "POST",
                data: form_data_regis,
                // datatype: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    
if(data == ""){
    window.location = 'login_main.php';
}
     else{
$(".message").addClass("d-block")
         $(".message").html(data);
     }   
                    // alert(data[0]);
                    // alert(data[1]);
                    // alert(data[2]);
                    // if (data == "Username Taken") {
                    //     $(".usernametaken").show();

                    //     // window.location.href = "login.php";
                    // }
                }

            });
        }
    });
});