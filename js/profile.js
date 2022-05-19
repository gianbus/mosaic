$(document).ready(function(){
    $("div[id|=myblock]").each(function(){
        
        let idBlocco = $(this).attr("id");
        let nBlocco= parseInt(idBlocco.match(/[0-9]+/));
        $(this).children("div[id|=modify-myblock]").load("../block/modify-selection.php?id="+nBlocco+ " #container",function(){
            console.log( $(this).children().children("#modify-form").children("#chosen-content"));
            $(this).children().children("#modify-form").children("#chosen-content").on("change",function(){
                
                idBlocco = $(this).parent().parent().parent().attr("id");
                nBlocco= parseInt(idBlocco.match(/[0-9]+/));
                console.log(idBlocco); 
                let selected = $("#chosen-content").prop("value");

        
                console.log("#modify-myblock-"+ nBlocco+" #modify-selected");
                //Ora faccio la richiesta del form di modifica
                $("#modify-myblock-"+ nBlocco+" #modify-selected").load("../block/modify-form.php?id="+nBlocco+"&type="+selected,function(){
                    $("#modify-myblock-"+ nBlocco+" #modify-selected").ready(function(){
                        
                        //QUANDO LO SLIDER VIENE MOSSO VIENE DINAMICAMENTE MOSTRATO IL CAMBIO DI PREZZO
                        let slider = document.getElementById("price-slider");
                        $("#show-price").text(slider.value);
                        slider.addEventListener("input",function(){
                            $("#show-price").text(slider.value);
                        },false);
        
                        //QUANDO DECIDO DI NON METTERE IN VENDITA UN BLOCCO FACCIO SCOMPARIRE LO SLIDER
                        let onSaleSwitch = document.getElementById("onSale");
                        if(!onSaleSwitch.checked) $("#ifOnSale").hide();
        
                        onSaleSwitch.addEventListener("change",function(){
                            if(!onSaleSwitch.checked) $("#ifOnSale").hide();
                            else $("#ifOnSale").show();
                        },false);
                        
                    });
                });
            
            });

        });
        
    });
});