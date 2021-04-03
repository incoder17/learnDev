$(document).ready(function() {
  $("ul#refresh li").on('click',function(){
  var clas = $(this).attr("class");
    // var name = $("ul#refresh li a").attr("id");
    // var name = $("ul#refresh li #person_name").innerHtml;
    var name = clas;
  $(this).addClass('active').siblings().removeClass('active');  
    $("#names").html(name);
    
    $('#content').load("../functions/photo.php ",{ name: name });
    setInterval(function(){
      $('#activity').load("../functions/activity.php ",{name: name});
      
      $('#main_chat').load("../functions/main_chating.php ",{name: name});
    },1);
    // setInterval(function(){
      
    //   $('#main_chat').load("../functions/main_chating.php ",{name: name});
    //   // $('#main_chat').animate({scrollTop:$(document).height()}, 100);
    //   //   return false;
    // },1000);
    $('#send').load("../functions/input.php ",{name: name});

    // $('#main_chat').html("<h1>Heloo I am chating section</h1> ");


});

    // $('.nav li').removeClass('active');
    // $(this).addClass('active');// adding active class to the click li and removing the class from the other li tags. 
    });
   
    // $(".details .time").load()
    // $('.nav-list').on('click', 'li', function() {
    //     $('.nav-list li.active').removeClass('active');
    //     $(this).addClass('active');
    // });
