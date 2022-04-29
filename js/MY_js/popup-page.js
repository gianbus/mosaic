$(document).ready(function(){
    $("div[id|=block]").click(function(){
        $("#mySidenav").show();
        
    })
    
    $(".closebtn").click(function(){
        $("#mySidenav").hide();

    })

});