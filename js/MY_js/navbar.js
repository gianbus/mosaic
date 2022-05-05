$(document).ready(function(){
    let logged = true;
    
    if(parseInt(sessionStorage.isLogged)==1){
        $("#profile > .signup").text(sessionStorage.username);
        $("#profile > .login").html("<span>" + sessionStorage.punti +"</span>");
        
        
    }
    
    $("#dropup-btn").click(function(){
        $("#dropup-btn").toggleClass("change");
        $(".nav-menu-resp").toggleClass("visible");
    });
});