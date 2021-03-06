
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

        else if (!(document.getElementById("checktermini").checked)) {
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


        if (form["email"].value.trim() === "") {
            showErrorMessage(form["email"], msgEmail);
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

        return res > 0 ? false : true;
        
    }

    function verificaNienteNumeri(stringa) {
        return /\d/.test(stringa);
    }


    function verificaPassword() {
        if (form["password1"].value != form["password2"].value) {
            form["password1"].value = "";
            form["password2"].value = "";
            return showErrorMessage(form["password2"], msgCorrispondenzaPassword);

        }
        
        return true;
    }

    function verificaEmail() {
        const emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        const e = form["email"];             //document.getElementById("email");
        if (!emailRegex.test(e.value)) {
            e.value = "";
            return showErrorMessage(e, msgEmailInvalida);
        }
        
        return true;
    }


    function showErrorMessage(elem, msg) {
        //elem.parentNode.querySelector("small").innerHTML = msg;
        //form.querySelectorAll("small")[num].innerHTML = msg + "<br>";
        elem.placeholder = msg;
        elem.classList.add("error");
        return false;
    }


    function auxBordiNeri(inputElem) {
        if (inputElem.classList.contains("error")) {
            
            inputElem.classList.remove("error");
        }

        return;
    }


    let campiInput = document.getElementsByTagName("input");

    for (let i=0; i < campiInput.length-2; i++) {
        campiInput[i].addEventListener("click", () => {
            auxBordiNeri(campiInput[i]);
        });
    }


    $("#mostra").click(function(){
        let input = $("input[id^=password]");
    
        let next = input.attr("type")==="password"?"text":"password";
        $("#mostra").toggleClass("fa-eye fa-eye-slash");
        input.attr("type",next);
    });


    $("#password1").keyup(validitaPassword);

    document.getElementById("password1").addEventListener("focus", () => {
        
        return document.getElementById("sicurezzaPassword").style.visibility = "visible";
    });

    document.getElementById("password1").addEventListener("blur", () => {
        return document.getElementById("sicurezzaPassword").style.visibility = "hidden";
    });


    function validitaPassword() {
        let minuscole = /[a-z]/g;
        let maiuscole = /[A-Z]/g;
        let numeri = /[0-9]/g;
        let speciali = /[!@#\$%\^\&*\)\(+=._-]/g;

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


