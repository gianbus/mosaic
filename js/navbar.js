//VARIABILE SETTABILE PER FARE TEST
const pathURL = "/profile/actual-log.php";

$(document).ready(function(){
    $("#dropup-btn").click(function(){
        $("#dropup-btn").toggleClass("change");
        $("#profile").toggleClass("visible");
    });

    //fissaggio navbar allo scroll 
    height="12vw";
    $(window).scroll(function(){
        if(window.innerWidth>425){ //se mi trovo da tablet/computer
            if($(window).scrollTop() < 80)
                height="12vw";
            else 
                height="7vw";
        }else{ //altrimenti se sono da cellulare
            height="auto";
        }
        $(".nav-menu").css("height", height);
    });

    //responsiveness al resize 
    $(window).resize(function(){
        if( window.innerWidth<=425)
            height="auto";
        else
            height="12vw";
        
        $(".nav-menu").css("height", height);
    });
    
});