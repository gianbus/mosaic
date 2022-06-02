$(document).ready(function(){
    //Una volta scelto il tipo di contenuto da memorizzare all'interno del blocco viene mostrato il form di modifica
    $("#chosen-content").on("change",function(){
        $("#modify-selected").addClass("change");
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

        //Ora faccio la richiesta del form di modifica
        $("#modify-selected").load("modify-form.php?id="+id+"&type="+selected,function(){
            $("#modify-selected").ready(function(){
                
                //QUANDO LO SLIDER VIENE MOSSO VIENE DINAMICAMENTE MOSTRATO IL CAMBIO DI PREZZO
                let slider = document.getElementById("price-slider-"+id);
                $("#show-price-"+id).text(slider.value);
                slider.addEventListener("input",function(){
                    $("#show-price-"+id).text(slider.value);
                },false);

                //QUANDO DECIDO DI NON METTERE IN VENDITA UN BLOCCO FACCIO SCOMPARIRE LO SLIDER
                let onSaleSwitch = document.getElementById("onSale-"+id);
                if(!onSaleSwitch.checked) $("#ifOnSale-"+id).hide();

                onSaleSwitch.addEventListener("change",function(){
                    if(!onSaleSwitch.checked) $("#ifOnSale-"+id).hide();
                    else $("#ifOnSale-"+id).show();
                },false);
                
            });
        });
       
    });
    
});