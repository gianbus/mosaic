$(document).ready(function(){
    $visible=false;
    $("#dropup-btn").click(function(){
        $("#dropup-btn").toggleClass("change");
        $(".nav-menu-resp").toggleClass("visible");
    });
});