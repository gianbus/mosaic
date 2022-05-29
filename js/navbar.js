//VARIABILE SETTABILE PER FARE TEST
const pathURL = "/profile/actual-log.php";

$(document).ready(function(){
    $("#dropup-btn").click(function(){
        $("#dropup-btn").toggleClass("change");
        $("#profile").toggleClass("visible");
    });


    //fissaggio navbar allo scroll e responsiveness al resize 
    height="12vw";
    $(window).scroll(function(){
        if( window.innerWidth>425){
            if($(window).scrollTop() < 80 )
                height="12vw"
            else
                height="7vw"
        }
        else height="auto";
        $(".nav-menu").css("height", height);
    });

    $(window).resize(function(){
        if( window.innerWidth<=425)
            height="auto";
        else if(window.innerWidth>425)
            height="12vw"
        else 
            height="7vw";
        $(".nav-menu").css("height", height);
    });
    //--------------------------------------------------------
    $("#points").load(pathURL,function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success"){
            let resp = JSON.parse(responseTxt);
            $("#points").html(resp.points + " <i class=\"fa fa-money\" aria-hidden=\"true\"></i>");
        }
    });
});