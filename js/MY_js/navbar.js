$(document).ready(function(){
    let logged = true;
    
    if(sessionStorage.isLogged){
        console.log(sessionStorage.isLogged);
        $("#profile > .signup").text(sessionStorage.username);
        $("#profile > .login").html("<span>" + sessionStorage.punti +"</span>");
        
        
    }
    $("#dropup-btn").click(function(){
        $("#dropup-btn").toggleClass("change");
        $(".nav-menu-resp").toggleClass("visible");
    });
});