$(document).ready(function(){
    //Una volta scelto il tipo di contenuto da memorizzare all'interno del blocco viene mostrato il form di modifica
    $("#chosen-content").on("change",function(){
        let selected = $("#chosen-content").prop("value");
        if(selected == "none"){ 
            $("#modify-selected").text('');
            return;
        }

        //Carico il form di modifica e una volta caricato aggiungo l'event handler dello scroll della barra del prezzo
        //Prima prendo l'id del blocco
        const queryString = window.location.search;
        
        const urlParams = new URLSearchParams(queryString);
        const id = urlParams.get('id')
        console.log(id);

        //Ora faccio la richiesta del form di modifica
        $("#modify-selected").load("modify-form.php?id="+id+"&type="+selected,function(){
            $("#modify-selected").ready(function(){
                
                //QUANDO LO SLIDER VIENE MOSSO VIENE DINAMICAMENTE MOSTRATO IL CAMBIO DI PREZZO
                let slider = document.getElementById("price-slider");
                $("#show-price").text(slider.value);
                slider.addEventListener("input",function(){
                    $("#show-price").text(slider.value);
                },false);

                //QUANDO DECIDO DI NON METTERE IN VENDITA UN BLOCCO FACCIO SCOMPARIRE LO SLIDER
                let onSaleSwitch = document.getElementById("onSale");
                if(!onSaleSwitch.checked) $("#onSale").hide();

                onSaleSwitch.addEventListener("change",function(){
                    if(!onSaleSwitch.checked) $("#ifOnSale").hide();
                    else $("#ifOnSale").show();
                },false);
                
            });
        });
       
    });
    
});