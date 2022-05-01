let form = document.getElementById("formregistrazione");

let msgNome = "Inserisci il tuo nome";
let msgCognome = "Inserisci il tuo cognome";
let msgUsername = "Inserisci il tuo username";
let msgPassword1 = "Inserisci la tua password";
let msgPassword2 = "Rinserisci la password";
let msgCorrispondenzaPassword = "Le password devono corrispondere";
let msgEmail = "Inserisci la tua email";
let msgEmailInvalida = "Inserire un'email valida";
let msgTerminiDiServizio = "Devi accettare i termini di servizio";


function verificaForm() {

    if (!verificaCampiVuoti())
        return false;

    else if (!verificaPassword())
        return false;

    else if (!verificaEmail())
        return false;

    else if (!(document.getElementById("check").checked)) {
        alert(msgTerminiDiServizio);
        return false;
    }

    else if (document.getElementById("pass-debole").style.backgroundColor == "red") {
        alert("La Password inserita non è abbastanza forte");
        return false;
    }
    
    return true;
    
}

function verificaCampiVuoti() {
    let res = 0;

    if (form["nome"].value.trim() === "" || verificaNienteNumeri(form["nome"].value.trim())) {
        showErrorMessage(form["nome"], msgNome);
        res++;
    }

    if (form["cognome"].value.trim() === "" || verificaNienteNumeri(form["cognome"].value.trim())) {
        showErrorMessage(form["cognome"], msgCognome);
        res++;
    }

    if (form["username"].value.trim() === "") {
        showErrorMessage(form["username"], msgUsername);
        res++;
    }

    if (form["password1"].value.trim() === "") {
        showErrorMessage(form["password1"], msgPassword1);
        res++;
    }

    if (form["password2"].value.trim() === "") {
        showErrorMessage(form["password2"], msgPassword2);
        res++;
    }

    if (form["email"].value.trim() === "") {
        showErrorMessage(form["email"], msgEmail);
        res++;
    }

    return res > 0 ? false : true;
    
}

function verificaNienteNumeri(stringa) {
    return /\d/.test(stringa);
}


function verificaPassword() {
    if (form["password1"].value != form["password2"].value) 
        return showErrorMessage(form["password2"], msgCorrispondenzaPassword);
    
    return true;
}

function verificaEmail() {
    const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    const e = form["email"];             //document.getElementById("email");
    if (!emailRegex.test(e.value)) 
        return showErrorMessage(e, msgEmailInvalida);
    
    return true;
}


function showErrorMessage(elem, msg) {
    elem.parentNode.querySelector("small").innerHTML = msg + "<br>";
    //form.querySelectorAll("small")[num].innerHTML = msg + "<br>";
    elem.className = "error";
    return false;
}


function auxBordiNeri(inputElem) {
    if (inputElem.className == "error") {
        inputElem.parentNode.querySelector("small").innerText = "";
        inputElem.className = "";
    }

    return;
}


let campiInput = form.querySelectorAll("input");

for (let i=0; i < campiInput.length-2; i++) {
   campiInput[i].addEventListener("click", () => {
        auxBordiNeri(campiInput[i]);
    });
}


document.getElementById("mostra").addEventListener("click", mostraPassword);

function mostraPassword() {
    let p1 = document.getElementById("password1");
    let p2 = document.getElementById("password2");
    
    if (p1.type === "password") {
      p1.type = "text";
      p2.type = "text";

    } 
    
    else {
      p1.type = "password";
      p2.type = "password";
    }
    
    return;
  }


document.getElementById("password1").addEventListener("keyup", validitaPassword);

document.getElementById("password1").addEventListener("focus", () => {
    return document.getElementById("sicurezzaPassword").style.display = "flex";
});

document.getElementById("password1").addEventListener("blur", () => {
    return document.getElementById("sicurezzaPassword").style.display = "none";
});


function validitaPassword() {
    let minuscole = /[a-z]/g;
    let maiuscole = /[A-Z]/g;
    let numeri = /[0-9]/g;
    let speciali = /[!@#\$%\^\&*\)\(+=._-]/g;

    //let regex = /^[a-zA-Z0-9!@#\$%\^\&*\)\(+=._-]{8,}$/g; 
    //let regexMinima = /^[a-zA-Z]{8,}$/g

    let p1 = document.getElementById("password1").value;

    let testMaiuscole = maiuscole.test(p1);
    let testMinuscole = minuscole.test(p1);
    let testNumeri = numeri.test(p1);
    let testSpeciali = speciali.test(p1);

    let testModerato = testMaiuscole && testMinuscole && p1.length >= 8;
    let testForte = testModerato && testNumeri && testSpeciali;

    let colorPass1, colorPass2, colorPass3;
    let testoPass;

    if (testForte) {
        testoPass = "Forte";
        colorPass1 = "green";
        colorPass2 = colorPass1;
        colorPass3 = colorPass1;
    }

    else if (testModerato) {
        testoPass = "Moderata";
        colorPass1 = "orange";
        colorPass2 = colorPass1;
        colorPass3 = "white";
    }
    
    
    else {
        testoPass = "Debole<br> (Non accettabile, inserire almeno 8 caratteri di cui almeno una maiuscola)";
        colorPass1 = "red";
        colorPass2 = "white";
        colorPass3 = colorPass2;
    }


    document.getElementById("commentoPassword").innerHTML = testoPass;
        document.getElementById("commentoPassword").style.color = colorPass1;
        document.getElementById("pass-forte").style.backgroundColor = colorPass3;
        document.getElementById("pass-media").style.backgroundColor = colorPass2;
        document.getElementById("pass-debole").style.backgroundColor = colorPass1;

    return;

}


