$(document).ready(function(){
    
    let w="0px"
    let z="-1;"
    let w_max="40%";
    let w_sm="97%"
    let black_medium=" rgba(18, 18, 18, 0.500)";
    let blur=false;

    function togglePopup(w,z,color){
        $(".info-pop").css("width",w);
        $("#pop-block").css("z-index",z);
        $("#pop-block").css("background-color",color);
    }

    //Quando apro un blocco 
    $("div[id|=block]").click(function(){       //|Serve ad attivare la popup page per ogni blocco
        //Design
        z="2";
        if(window.innerWidth<425) w=w_sm;
        else w=w_max;
    
        togglePopup(w,z,black_medium)
        $("div[class|=row]").toggleClass("filter");
        blur=!blur;
        //
        //Task
        let img = $(this).children().attr("src");
        $(".card-img-top").attr("src",img);
        
        

    })

    //Quando chiudo blocco
    $(".closebtn").click(function(){ 
        w="0px"
        z="-1";
        time="3s";
        $(".info-pop").css("width",w);
        $("#pop-block").animate({zIndex:z},1000);
        $("#pop-block").css("background-color"," transparent");
        $("div[class|=row]").toggleClass("filter");
        blur=!blur;
    })
    
    //Responsivess
    $(window).resize(function(){                //|Agisce nel caso vi sia un resize, e quindi per evitare che la width si mantenga al w_sm% agisce
        console.log(window.innerWidth + " blur "+ blur + "width:" + $(".info-pop").css("width"));
        if((window.innerWidth<425  && w==w_sm) ||  (window.innerWidth>=425 && w==w_max)){
            return
        }
        w="0px";
        z="-1";
        
        togglePopup(w,z,"transparent");
        if(blur) {
            $("div[class|=row]").toggleClass("filter");
            blur=!blur;
        }
    })
    

    

});