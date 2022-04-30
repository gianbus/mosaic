$(document).ready(function(){
    
    let w="0px"
    let z="-1;"

    $("div[id|=block]").click(function(){       //|Serve ad attivare la popup page per ogni blocco
        z="2";
        if(window.innerWidth<425) w="97%";
        else w="30%";
       
        $(".sidenav").css("width",w);
        $("#mySidenav").css("z-index",z);
        $("#mySidenav").css("background-color"," rgba(18, 18, 18, 0.500)");
    })

    $(window).resize(function(){                //|Agisce nel caso vi sia un resize, e quindi per evitare che la width si mantenga al 97% agisce
       /* if( (window.innerWidth>=425 && w=="97%") || (window.innerWidth<425 && w=="300px") ){
            w="0px";
            z="-1";
            $(".sidenav").css("width",w);
            $("#mySidenav").css("z-index",z);
            $("#mySidenav").css("background-color"," rgba(18, 18, 18, 0.500)",2000);
           return;
        }*/
        if((window.innerWidth<425  && w=="97%") ||  (window.innerWidth>=425 && w=="30%")){
            return
        }
        w="0px";
        z="-1";
        $(".sidenav").css("width",w);
        $("#mySidenav").css("z-index",z);
        $("#mySidenav").css("background-color"," rgba(255, 255, 255, 0)");
    })

    $(".closebtn").click(function(){ 
        w="0px"
        z="-1";
        time="3s";
        $(".sidenav").css("width",w);
        $("#mySidenav").animate({zIndex:z},2000);
        $("#mySidenav").css("background-color"," rgba(255, 255, 255, 0)");
       
    })

});