$(document).ready(function(){
    
    let w="0px"
    let z="-1;"
    let w_max="40%";
    let w_sm="97%"
    $("div[id|=block]").click(function(){       //|Serve ad attivare la popup page per ogni blocco
        z="2";
        if(window.innerWidth<425) w=w_sm;
        else w=w_max;
       
        $(".info-pop").css("width",w);
        $("#pop-block").css("z-index",z);
        $("#pop-block").css("background-color"," rgba(18, 18, 18, 0.500)");
    })

    $(window).resize(function(){                //|Agisce nel caso vi sia un resize, e quindi per evitare che la width si mantenga al w_sm% agisce
       /* if( (window.innerWidth>=425 && w==w_sm) || (window.innerWidth<425 && w=="300px") ){
            w="0px";
            z="-1";
            $(".info-pop").css("width",w);
            $("#pop-block").css("z-index",z);
            $("#pop-block").css("background-color"," rgba(18, 18, 18, 0.500)",2000);
           return;
        }*/
        if((window.innerWidth<425  && w==w_sm) ||  (window.innerWidth>=425 && w==w_max)){
            return
        }
        w="0px";
        z="-1";
        $(".info-pop").css("width",w);
        $("#pop-block").css("z-index",z);
        $("#pop-block").css("background-color"," rgba(255, 255, 255, 0)");
       
    })

    $(".closebtn").click(function(){ 
        w="0px"
        z="-1";
        time="3s";
        $(".info-pop").css("width",w);
        $("#pop-block").animate({zIndex:z},1000);
        $("#pop-block").css("background-color"," rgba(255, 255, 255, 0)");
       
    })

});