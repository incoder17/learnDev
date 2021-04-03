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

    $("#loginForm").on('submit', function(event) {
        var form_data_regis = new FormData(this);

        event.preventDefault();
        error = false;
       

       
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

      
        if (error == false) {

            $.ajax({

                url: "../functions/login_ajaxcall.php",
                method: "POST",
                data: form_data_regis,
                // datatype: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(result) {
                    
// alert("clicked");
// result = JSON.parse(result);
    //   $("#div1").html();+
    //   alert(result.email);
    if(result != "Enter correct password or email !!"){
window.location='../index.php';
        

    }
    else{
               $(".error ").removeClass("d-none").addClass("alert alert-danger");

           }         //  $(".error").html(data.email);

                    // if(data.pass == 1){
// $(".error").html("Error in Password");
// }
// else{
    
//     $(".error").html("No password error");
// }       
//  window.location='../index.php';
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