function togglePopup(w,z,color){
    $(".info-pop").css("width",w);
    $("#pop-block").css("z-index",z);
    $("#pop-block").css("background-color",color);
}

function cancelPurchase(buyButton){
    $("#purchase-confirm").hide();
    $(".logged").text(buyButton);
    $(".logged").prop('disabled',false);
}

$(document).ready(function(){
    let w="0px"                                     //|Larghezza della popup page settata a 0
    let z="-1;"                                     //|La popup page in principio è sotto la griglia
    let w_max="35%";                                //|popup page larghezza massima solo quando aperta da schermo desktop
    let w_sm="97%"                                  //|popup page larghezza minima solo quando aperta da schermo cellulare
    let black_medium=" rgba(18, 18, 18, 0.500)";    //|colore di sfondo quando la popup page sale in primo piano
    let blur=false;

    
    var nBlocco,price ;
    //Quando apro un blocco 
    $("div[id|=block]").click(function(){           //|Serve ad attivare la popup page per ogni blocco
        let idBlocco = $(this).attr("id");
        nBlocco= parseInt(idBlocco.match(/[0-9]+/));
        $(".logged").attr("href","#");              //|Evito che cliccando su un blocco io possa influenzare il click sui successivi 
        
        //loading della query dal database per caricare la popup page
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            let response =JSON.parse(this.responseText);
            
            price = response.prezzo;
            let onSale=1;
                if(price==null){
                    price ="--";
                    onSale = 0; 
                }

            let owner = response.proprietario;

            let title = response.titolo;
                if(title=='' || title==null) title ="Titolo non è presente";
               
            let description = response.descrizione;
                if(description=='' || description==null) description ="Descrizione non è presente";
               
            let path = (response.path);
            let type = response.tipo;
                if(type =="image") path = "../mosaic/" + path;
            $("#price-block").text("Prezzo:\n" + price);
            $(".card-title").text(title);
            $(".card-text").text(description);

            let isDisabled= false;
            let userLogged;
            const requestUser = new XMLHttpRequest();
            requestUser.onload = function() {
                let resp = JSON.parse(this.responseText);
                userLogged = resp.user;
            }
            requestUser.open('GET',"../mosaic/profile/actual-log.php",false);
            requestUser.send();

            if(owner == userLogged ){
                $(".logged").text("Modifica");
                $(".logged").attr("id","_modify");
                $(".logged").addClass(" _btn");
                $(".logged").attr("href","./block/modify-selection.php?id="+nBlocco);
            }
            else if(onSale==0 && owner != userLogged ){
                isDisabled = true;
                $(".logged").text("Non in vendita");
                $(".logged").attr("id","disabled_buy");
                $(".logged").removeClass(" _btn");
                
            }
            else if(onSale == 1 && owner != userLogged) {
                $(".logged").text("Compra");
                $(".logged").attr("id","_buy");
                $(".logged").addClass(" _btn");
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

        }

        xhttp.open("GET", "/mosaic/block/block-info.php?id="+nBlocco,false); //|False perchè così aspetto la fine della query per avere il responso su schermo
        xhttp.send();

        //Design, con il seguente codice la pagina è aperta ufficialmente. Prima era la funzione di caricamento dei dati da porre
        z="2";
        if(window.innerWidth<425) w=w_sm;
        else w=w_max;
        togglePopup(w,z,black_medium);
        $("#grid").toggleClass("filter");
        $("#navbar").toggleClass("filter");
        blur=!blur;
    
        if(window.innerWidth<425) $(".info-pop").css("top","25%");
    });

    var buyButton;
    $(".logged").click(function(){
        let whatToDo = $(".logged").attr("id");
        buyButton =  $(".logged").text() ;
        /*if(whatToDo=="_modify"){
            console.log("Hai premuto modifica");
            return;
        }*/
        if(whatToDo=="_buy"){
            $(".logged").html("<i class='fa fa-spinner fa-spin'></i>Loading");
            $(".logged").prop('disabled',true);

            //RICAVO I PUNTI DELL'ACQUIRENTE E DELL'ACQUISTO
            let myPoints;
            let purchasePoints = price
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                myPoints = parseInt(JSON.parse(this.responseText).points);
            }
            xhttp.open("GET", "../mosaic/profile/actual-log.php",false);
            xhttp.send();

        
            //SE I PUNTI DELL'ACQUIRENTE SONO INSUFFICIENTI ANCHE SOLO NELL'ATTUALE SESSIONE LO FERMO
            if(myPoints<purchasePoints) {
                $(".logged").text("Saldo insufficiente");
                setTimeout(function(){
                    $(".logged").text(buyButton);
                    $(".logged").prop('disabled',false);
                },2000,buyButton);
                return;
            }
            $("#purchase-confirm").css("display","block");


            
        }
    });

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
            if(err == 0 && validRequest==1){
                $(".logged").attr("id", "_modify");
                $(".logged").text("Modifica");
                $(".logged").prop('disabled',false);
                $(".logged").attr("href","./block/modify-selection.php?id="+nBlocco);
                $(".text-muted").text("Ultimo proprietario: " + user);
                $("#points").text(new_wallet);
                $("#price-block").text("Prezzo:\n--");
            }
            else if(err==1){
                $(".logged").text("Fondi insufficienti");
                $(".logged").attr("id","_buy");
                setTimeout(function(){
                    $(".logged").text("Compra");
                    $(".logged").prop('disabled',false);
                },2000,buyButton);
            }
            else if(err==2){
                $(".logged").text("Non disponibile");
                $(".logged").prop('disabled',true);
            } 
            else if(err==3){
                $(".logged").text("Blocco già posseduto");
                $(".logged").attr("id", "_modify");
                $(".logged").text("Modifica");
                $(".logged").prop('disabled',false);
            } 
        }
        xhttp.open("GET", "../mosaic/block/buy.php?id="+nBlocco,true);
        xhttp.send();
    });

    $(".buy-no").click(function(){
        cancelPurchase(buyButton);
        return;
    });

    window.onclick = function(event) {
        let conf =document.getElementById("purchase-confirm");
        if (event.target == conf ) {
            cancelPurchase(buyButton);
        }
    }

    //Quando chiudo blocco
    $(".closebtn").click(function(){ 
        w="0px";
        z="-1";
        $(".info-pop").css("width",w);
        $("#pop-block").css("background-color"," transparent");
        $("#pop-block").animate({zIndex:z},1000);
        $("#grid").toggleClass("filter");
        $("#navbar").toggleClass("filter");
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
        cancelPurchase(buyButton);
        if(blur) {
            $("#grid").toggleClass("filter");
            $("#navbar").toggleClass("filter")
            blur=!blur;
        }
    });
});