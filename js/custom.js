$(document).ready(function () {
    $("#button").click(function () {
        $(".side-nav").toggleClass("side-nav-hide", 2000);
        $(".far").toggleClass("fas", 2000);

        $(this).find('i').toggleClass('fa-times-circle  fa-ellipsis-v', 1000);
    });
    $("#edit").click(function () {
        $("edit-form")[0].reset();
    });
    //video upload and showing in the file it self
    $(".navs .nav-links a").click(function () {
        $('.nav-links ').removeClass('active');
        // $(this).closest('active');
    });
    $(".language").on("click",function(){
$(".box").css("display","block");
$(this).addClass("active");
    });
    $("#links").on("click",function(){
var className = $("#links").attr("class");


    });
    $(".close").on("click",function(){
$(".box").css("display","none").fadeOut(1000);
    });
    
    $(".playlist").on("click",function(){

var id =$(this).attr("id");

 $('#datials').load("../functions/playlist_details.php ",{id: id});

    });
    $("#goback").on("click",function(){

 $('body').load("../pages/php.php ");
    });

    });

