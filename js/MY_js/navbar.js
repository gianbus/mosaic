$(document).ready(function(){
    $visible=false;
    $("#dropup-btn").click(function(){
        
        $("#dropup-btn").toggleClass("change");
        if (!$visible) {
            $(".nav-menu-resp").show();
            $visible=true;
        } else {
            $(".nav-menu-resp").hide();
            $visible=false;
        }
       
    });

    
});