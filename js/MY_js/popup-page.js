$(document).ready(function(){
    let w="0px"
    $("div[id|=block]").click(function(){       //|Serve ad attivare la popup page per ogni blocco
        
        if(window.innerWidth<425) w="97%";
        else w="300px";
        
        $("#mySidenav").css("width",w);
    })

    $(window).resize(function(){                //|Agisce nel caso vi sia un resize, e quindi per evitare che la width si mantenga al 97% agisce
        if(window.innerWidth>=425 && w=="97%"){
            w="0px";
        }
        $("#mySidenav").css("width",w);
    })

    $(".closebtn").click(function(){ 
        w="0px"
        $("#mySidenav").css("width",w);

    })

});