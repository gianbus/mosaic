<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Mosaic |Registrazione</title>
    
        <!-- Bootstrap CSS -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <?php
            include '../favicon.php';
        ?>
        <!-- My CSS -->
        <link rel="stylesheet" href="../css/style.css">
    
</head>
<body>
    <?php
        include '../navbar.php';
        if(isset($_COOKIE['utente'])){
            header("refresh:0;url=../index.php");
            exit;
        }
    ?>
    <div id="outer-main" >
       
        <div id="main-container">
                
            <div id="container-logo-blocchi">
                
                <div style = "display: flex; flex-direction: column;">
                    <div class = "logo-blocchi" style="display: flex;">
                        <div id="mad-block2"></div>
                        <div style="background-color: #ffffff;"></div>
                        <div id="mad-block-rotate" ></div>
                    </div>
                    
                    <div class = "logo-blocchi" style="display: flex;">
                        <div id="mad-block3"></div>
                        <div id="mad-block-center" style = "height:2.5rem; align-self: flex-start"></div>
                        <div id="mad-block1"></div>
                    </div>
                    
                    <div class = "logo-blocchi" style="display: flex;">
                        <div id="mad-block1"></div>
                        <div style="background-color: #ffffff;"></div>
                        <div id="mad-block3"></div>
                    </div>
                </div>

            </div>


            <div id="container-destra">
                <div style="flex: 15%;text-align: center;">
                    <h2>Registrazione</h2>
                </div>
                <div style="flex: 50%; display: flex;">
                    <div style="flex: 0%;"></div>
                    <div style="flex: 2 0 40%;display: flex;flex-direction: column; display: flex;flex-direction:column ;">
                        
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
                            <label for="username"> Username </label>
                            <input type = "text" id="username" name="username" placeholder="Username" form="formregistrazione">
                            <small></small>
                        </span>
                       
                        <span class="campoform" style="display: flex;">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="text" placeholder="Email" form="formregistrazione">
                            <small></small>
                        </span>
                        <hr>
                        <div style="flex: 0%;">

                            
                            <span class="campoform" style="display: flex; position: relative;">
                                <label for="password1">Password</label>
                                <input autocomplete="off" id="password1" name="password1" type="password"  class= "mytooltip" placeholder="Password" form="formregistrazione">
                                <i class="fa fa-eye" id="mostra" aria-hidden="true"></i>
                                <div id="commentoPassword" class="tooltiptext"></div>
                                <small></small>
                            </span>


                            

                            <div id="sicurezzaPassword">
                                <div id="pass-debole"></div> <div id="pass-media"></div> <div id="pass-forte"></div>
                            </div>


                            <span class="campoform" style="display: flex;">
                                <label for="password2">Conferma</label>
                                <input autocomplete="off" id="password2" name="password2" type="password" placeholder="Conferma password" form="formregistrazione">
                                <small></small>
                            </span>
                            
                        </div>
                        
                        <span class="check_termini" style="">
                            <input type="checkbox" class="form-check-input" name="checktermini" id="checktermini" form="formregistrazione">
                            <label style="margin-left:8px;" for="checktermini" form="formregistrazione">Accetto i <a href="termini-servizio.php"><strong>Termini di servizio</strong></a> di Mosaic</label>
                            
                        </span>
                        
                        

                    </div>
                    <div style="flex: 0%;"></div>
                </div>
                <div style="flex:20%;">
                    <input class="buttonSubmit" type="submit" value="Registrati" form="formregistrazione">
                </div>
            </div>
        </div>
    </div>
    <?php
        include '../footer.php';
    ?>

    <script src="../js/verifica-campi-inseriti.js"></script>

</body>
</html>
