function adaptList(){
    if(window.innerWidth<425 ) {
        $("div[id|=info-myblock]:not(.opened)").hide();
        $("select[id=chosen-content]").removeClass("form-select");
        $("select[id=chosen-content]").removeClass("form-select-sm");
        $("select[id=chosen-content]").addClass("form-select-xs");
    }
    else if(window.innerWidth<768 && window.innerWidth>=425) {
        $("div[id|=info-myblock]:not(.opened)").show();
        $("div[id|=info-myblock]").removeClass("col-7");
        $("div[id|=info-myblock]").addClass("col-4");
        $("select[id=chosen-content]").removeClass("form-select");
        $("select[id=chosen-content]").removeClass("form-select-xs");
        $("select[id=chosen-content]").addClass("form-select-sm");
    }
    else if (window.innerWidth>=768){
        $("div[id|=info-myblock]:not(.opened)").show();
        $("div[id|=info-myblock]").removeClass("col-4");
        $("div[id|=info-myblock]").addClass("col-7");
        $("select[id=chosen-content]").removeClass("form-select-xs");
        $("select[id=chosen-content]").removeClass("form-select-sm");
        $("select[id=chosen-content]").addClass("form-select");
    }
}

$(document).ready(function(){
    console.log(window.innerWidth)
    
    $("div[id|=myblock]").each(function(){
        
        let idBlocco = $(this).attr("id");
        let nBlocco= parseInt(idBlocco.match(/[0-9]+/));
        $(this).children("div[id|=modify-myblock]").load("../block/modify-selection.php?id="+nBlocco+ " #container",function(){
            adaptList();

            let myBlock = $(this).parent();
            let infoMyBlock  = $(this).prev();
            
            $(this).children().children("#modify-form").children("#chosen-content").on("change",function(){
                console.log(myBlock.css("height","fit-content"));
                infoMyBlock.hide();
                infoMyBlock.addClass("opened");
                
                idBlocco = $(this).parent().parent().parent().attr("id");
                nBlocco= parseInt(idBlocco.match(/[0-9]+/));
                console.log(idBlocco); 
                let selected = $("#modify-myblock-"+ nBlocco+" #chosen-content").prop("value");

        
                console.log("#modify-myblock-"+ nBlocco+" #modify-selected");
                //Ora faccio la richiesta del form di modifica
                $("#modify-myblock-"+ nBlocco+" #modify-selected").load("../block/modify-form.php?id="+nBlocco+"&type="+selected,function(){
                    $("#modify-myblock-"+ nBlocco+" #modify-selected").ready(function(){
                        
                        //QUANDO LO SLIDER VIENE MOSSO VIENE DINAMICAMENTE MOSTRATO IL CAMBIO DI PREZZO
                        let slider = document.getElementById("price-slider-"+nBlocco);
                        $("#show-price-"+nBlocco).text(slider.value);
                        slider.addEventListener("input",function(){
                            $("#show-price-"+nBlocco).text(slider.value);
                        },false);
        
                        //QUANDO DECIDO DI NON METTERE IN VENDITA UN BLOCCO FACCIO SCOMPARIRE LO SLIDER
                        let onSaleSwitch = document.getElementById("onSale-"+nBlocco);
                        if(!onSaleSwitch.checked) $("#ifOnSale-"+nBlocco).hide();
        
                        onSaleSwitch.addEventListener("change",function(){
                            if(!onSaleSwitch.checked) $("#ifOnSale-"+nBlocco).hide();
                            else $("#ifOnSale-"+nBlocco).show();
                        },false);
                        
                    });
                });
            
            });

        });
        
    });
    $(window).resize(function(){  
        adaptList();
    });
});