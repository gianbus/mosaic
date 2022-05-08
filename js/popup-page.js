$(document).ready(function(){
    let w="0px"
    let z="-1;"
    let w_max="35%"; //popup page width when open by a desktop system
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
    
        togglePopup(w,z,black_medium);
        $("#grid").toggleClass("filter");
        $("#navbar").toggleClass("filter");
        blur=!blur;

        if(window.innerWidth<425) $(".info-pop").css("top","25%");
        //
        //Task
        let img = $(this).children().attr("src");
        $(".card-img-top").attr("src",img);
        let idBlocco = $(this).attr("id");
        let nBlocco= parseInt(idBlocco.match(/[0-9]+/));
 
        console.log(nBlocco);
    })

    //Quando chiudo blocco
    $(".closebtn").click(function(){ 
        w="0px"
        z="-1";
        $(".info-pop").css("width",w);
        $("#pop-block").animate({zIndex:z},1000);
        $("#pop-block").css("background-color"," transparent");
        $("#grid").toggleClass("filter");
        $("#navbar").toggleClass("filter")
        if(window.innerWidth<425) $(".info-pop").css("top","100%");
        blur=!blur;
    });

    //Responsivess
    $(window).resize(function(){                //|Agisce nel caso vi sia un resize, e quindi per evitare che la width si mantenga al w_sm% agisce
        if((window.innerWidth<425  && w==w_sm) ||  (window.innerWidth>=425 && w==w_max)){
            return
        }
        w="0px";
        z="-1";
        if(window.innerWidth>425) $(".info-pop").css("top","");
        togglePopup(w,z,"transparent");
        if(blur) {
            $("#grid").toggleClass("filter");
            $("#navbar").toggleClass("filter")
            blur=!blur;
        }
    });
    var buyButton;
    $(".logged-buy").click(function(){
        buyButton =   $(".logged-buy").text();
        $(".logged-buy").html("<i class='fa fa-spinner fa-spin'></i>Loading");
        $(".logged-buy").prop('disabled',true);
        $("#myModal").css("display","block");
    });

    $(".buy-yes").click(function(){
        console.log("something");
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            $(".logged-buy").text( this.responseText);
            $("#myModal").css("display","none");
        }
        xhttp.open("GET", "test-risposta.php",true);
        xhttp.send();
    });
    $(".buy-no").click(function(){
        $(".logged-buy").text(buyButton);
        $("#myModal").css("display","none");
        $(".logged-buy").prop('disabled',false);
    });
});