<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Mosaic |Registrazione</title>
    
        <!-- Bootstrap CSS -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- My CSS -->
        <link rel="stylesheet" href="../css/style.css">

        <link href="../css/sign-up.css" rel="stylesheet">
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="my-container">
        <div style="background-color: #0d1117af; filter: blur(5px);position: fixed;top:0;left: 0; width: 100%; height: 100%;">
            
        </div>
        <div style="position: fixed; top:30%; left: 15%;width:70% ;height: 40%; border: 1px solid black; border-radius: 20px; display: flex; background-color: rgb(255, 255, 255); height: fit-content;">
                
            <div style="display:flex; justify-content: center; align-items: center; flex: 40%;">
                <!--<img style="height: 400px; width: 400px;" src="../../../Backgrounds/istockphoto-666262220-612x612.jpeg">-->
                
                <div style = "display: flex; flex-direction: column;">
                    <div class = "logo-blocchi" style="display: flex;">
                        <div></div>
                        <div style="background-color: #ffffff;"></div>
                        <div style = "transform: rotate(20deg);"></div>
                    </div>
                    
                    <div class = "logo-blocchi" style="display: flex;">
                        <div></div>
                        <div style = "height:2.5rem; align-self: flex-start"></div>
                        <div></div>
                    </div>
                    
                    <div class = "logo-blocchi" style="display: flex;">
                        <div></div>
                        <div style="background-color: #ffffff;"></div>
                        <div></div>
                    </div>
                </div>

            </div>


            <div style="flex:60%;display: flex; flex-direction: column; background-color: rgb(207, 207, 207);border-radius: 0px 20px 20px 0px;">
                <div style="flex: 15%;text-align: center;">
                    <span style="font-size: 2vw;">Registrazione</span>
                </div>
                <div style="flex: 50%; display: flex;">
                    <div style="flex: 0%;"></div>
                    <div style="flex: 40%;display: flex;flex-direction: column; display: flex;flex-direction:column ;">
                        
                        <form action="registar.php" method="POST" id="formregistrazione" onsubmit="return verificaForm()" ></form>

                        <span class="campoform" style="display: flex;">
                            <label for="nome">Nome</label>
                            <input id="nome" name="nome" type="text" placeholder="Nome" form="formregistrazione">
                            <small></small>
                        </span>
                        
                        <span class="campoform" style="display: flex;">
                            <label for="cognome">Cognome</label>
                            <input id="cognome" name="cognome" type="text" placeholder="Cognome" form="formregistrazione">
                            <small></small>
                        </span>

                        <span class = "campoform" style="display: flex;">
                            <label for="username"> Username: </label>
                            <input type = "text" id="username" name="username" placeholder="Username" form="formregistrazione">
                            <small></small>
                        </span>

                        <span class="campoform" style="display: flex;">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="text" placeholder="Email" form="formregistrazione">
                            <small></small>
                        </span>

                        <div style="flex: 0%;">
                            <span  class="campoform" style="display: flex; position: relative;">
                                <label for="password1">Password</label>
                                <input id="password1" name="password1" type="text"  class= "tooltip" placeholder="Password" form="formregistrazione">
                                <i class="fa fa-eye" id="mostra" aria-hidden="true"></i>
                                <div id="commentoPassword" class="tooltiptext"></div>
                                <small></small>
                            </span>


                            

                            <div id="sicurezzaPassword">
                                <div id="pass-debole"></div> <div id="pass-media"></div> <div id="pass-forte"></div>
                            </div>


                            <span class="campoform" style="display: flex;">
                                <label for="password2">Conferma</label>
                                <input id="password2" name="password2" type="text" placeholder="Conferma password" form="formregistrazione">
                                <small></small>
                            </span>
                            
                        </div>
                        <span class="check_termini">
                            <input type="checkbox" name="checktermini" id="checktermini" form="formregistrazione">
                            <label style="margin-left:8px;" for="checktermini" form="formregistrazione">Accetto i <a href="termini-servizio.html"><strong>Termini di servizio</strong></a> di Mosaic</label>
                            
                        </span>
                        
                        <input class="buttonSubmit" type="submit" value="Registrati" form="formregistrazione">

                    </div>
                    <div style="flex: 0%;"></div>
                </div>
                <div style="flex:20%;">
                    
                </div>
            </div>
        </div>
    </div>
    <script src="../js/verifica-campi-inseriti.js"></script>

</body>
</html>
