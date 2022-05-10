function togglePopup(w,z,color){
    $(".info-pop").css("width",w);
    $("#pop-block").css("z-index",z);
    $("#pop-block").css("background-color",color);
}

function cancelPurchase(buyButton,classButton){
    $("#purchase-confirm").hide();
    $(".logged."+classButton).text(buyButton);
    $(".logged."+classButton).prop('disabled',false);
}

$(document).ready(function(){
    let w="0px"
    let z="-1;"
    let w_max="35%"; //popup page width when open by a desktop system
    let w_sm="97%"
    let black_medium=" rgba(18, 18, 18, 0.500)";
    let blur=false;

    

    //Quando apro un blocco 
    $("div[id|=block]").click(function(){       //|Serve ad attivare la popup page per ogni blocco
        //Design
        z="2";
        if(window.innerWidth<425) w=w_sm;
        else w=w_max;

        let idBlocco = $(this).attr("id");
        let nBlocco= parseInt(idBlocco.match(/[0-9]+/));
        togglePopup(w,z,black_medium);


        //loading della query dal database per caricare la popup page
        
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            console.log(this.responseText);
            let response =JSON.parse(this.responseText);
            
            let price = response.prezzo;
            let onSale=1;
                if(price==''){
                    price ="--";
                    onSale = 0; 
                }

            let owner = response.proprietario;

            let title = response.titolo;
                if(title=='') title ="Titolo non disponibile"

            let description = response.descrizione;
                if(description=='') description ="Descrizione non disponibile";

            let type = response.tipo;
            let path = response.path;

            $("#price-block").text(price);
            $(".card-title").text(title);
            $(".card-text").text(description);

            let isDisabled= false;
            if(owner == $("#logged-username").text() ){
                $(".logged").text("Modifica");
                $("#buy-if > button").toggleClass("_modify");
                $(".logged").toggleClass(" _btn");
            }
            else if(onSale==0 && owner != $("#logged-username").text ){
                $(".logged").text("Non disponibile");
                isDisabled = true;
                
                
            }
            else if(onSale == 1 && owner != $("#logged-username").text) {
                $(".logged").toggleClass("_buy");
                $(".logged").text("Compra");
                $(".logged").toggleClass(" _btn");
            }
            $(".logged").prop('disabled',isDisabled);
            $(".text-muted").text("Ultimo proprietario: " + owner);
            

            //task richiesta al blocco
            if(type=='color')
                $('#container-block').html("<div style='height:50px; background-color:"+path+";' class='card-img-top'></div>");
            else if(type=='image')
                $('#container-block').html("<img class='card-img-top' src="+ path+"  alt="+ idBlocco+" >");
            else if(type=='video')
                $('#container-block').html("<iframe class='card-img-top' src="+ path+"></iframe>");

            
            $("#grid").toggleClass("filter");
            $("#navbar").toggleClass("filter");
            blur=!blur;
    
            if(window.innerWidth<425) $(".info-pop").css("top","25%");
        
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

            
            $("._buy").click(function(){

                var buyButton =   $(".logged._buy").text();
                $(".logged._buy").html("<i class='fa fa-spinner fa-spin'></i>Loading");
                $(".logged._buy").prop('disabled',true);

                //RICAVO I PUNTI DELL'ACQUIRENTE E DELL'ACQIST0
                let myPoints = parseInt($("#points").text());
                let purchasePoints = price
            
                //SE I PUNTI DELL'ACQUIRENTE SONO INSUFFICIENTI ANCHE SOLO NELL'ATTUALE SESSIONE LO FERMO
                if(myPoints<purchasePoints) {
                    $(".logged._buy").text("Saldo insufficiente");
                    setTimeout(function(){
                        $(".logged._buy").text(buyButton);
                        $(".logged._buy").prop('disabled',false);
                    },2000,buyButton);
                    return;
                }
                $("#purchase-confirm").css("display","block");

                $(".buy-yes").click(function(){
                    
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                        console.log(this.responseText);
                        let isBought =JSON.parse(this.responseText);
                        let validRequest = isBought.richiesta_valida; 
                        let bought = isBought.comprato;
                        let err = isBought.errore;
                        let id = isBought.idblocco; 
                        let user = isBought.acquirente;
                        let old_owner = isBought.venditore;
                        let new_wallet = isBought.nuovo_saldo_acquirente;
                        $("#purchase-confirm").css("display","none");
                        console.log(err);
                        if(err == 0){
                            $(".logged").toggleClass( "_buy");
                            $(".logged").toggleClass( "_modify");
                            
                            $(".logged").text("Modifica");
                            $(".logged").prop('disabled',false);
                            $(".text-muted").text("Ultimo proprietario: " + user);
                            $("#points").text(new_wallet);
                        }
                        else if(err==1){
                            $(".logged").text("Fondi insufficienti");
                            $(".logged").toggleClass("_buy");
                            setTimeout(function(){
                                $(".logged._buy").text("Compra");
                                $(".logged._buy").prop('disabled',false);
                            },2000,buyButton);
                        }
                        else if(err==2){
                            $(".logged").text("Non disponibile");
                            $(".logged").prop('disabled',true);
                        } 
                        
                    }
                    xhttp.open("GET", "/mosaic/block/buy.php?id="+nBlocco,true);
                    xhttp.send();
                });

                $(".buy-no").click(function(){
                    cancelPurchase(buyButton,"_buy");
                });

                window.onclick = function(event) {
                    let conf =document.getElementById("purchase-confirm");
                    if (event.target == conf ) {
                        cancelPurchase(buyButton,"_buy");
                    }
                }
            });
        }

        xhttp.open("GET", "/mosaic/block/block-info.php?id="+nBlocco,true);
        xhttp.send();
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
});