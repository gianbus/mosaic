$(document).ready(function(){
    $("#dropup-btn").click(function(){
        $("#dropup-btn").toggleClass("change");
        if ($(".nav-menu-resp").css("visibility")=="hidden") {
            $(".nav-menu-resp").css("visibility","visible");
        } else {
            $(".nav-menu-resp").css("visibility","hidden");
        }
       
    });
});