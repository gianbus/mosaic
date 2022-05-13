$(document).ready(function(){
    $("#chosen-content").on("change",function(){
        let selected = $("#chosen-content").prop("value");
        if(selected == "none"){ 
            $("#modify-selected").text('');
            return;
        }

        $("#modify-selected").load("modify-form.php?type="+selected,function(){
            $("#modify-selected").ready(function(){
                let slider = document.getElementById("price-slider");
                slider.addEventListener("input",function(){
                    $("#show-price").text(slider.value);
                },false);
            });
        });
       
    });
    
});