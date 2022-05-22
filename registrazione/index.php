<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">
     
    <title>Mosaic |Registrazione</title>

    <!--favicons-->
    <?php
        include '../favicon.php';
    ?>
    <!--favicons-->
</head>
<body>
    <?php
        include '../navbar.php';
        if(isset($_SESSION['utente'])) header("refresh:0;url=../index.php");
    ?>
    <div class="container-fluid my-container">

        <div id="divregistrazione">
            <h2>Registrazione</h2>
            <form action="registar.php" method="POST" id="formregistrazione" onsubmit="return verificaForm()"> 
                
                <div class = "campoform">
                    <label for="nome">Nome:</label><br>
                    <input type="text" id="nome" name="nome" placeholder="Nome"><br>
                    <small></small>
                </div>
                
                <div class = "campoform">
                    <label for="cognome">Cognome:</label><br>
                    <input type="text" id="cognome" name="cognome" placeholder="Cognome"><br>
                    <small></small>
                </div>
                
                <div class = "campoform">
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" placeholder="Username"><br>
                    <small></small>
                </div>
                
                <div style="display: flex; justify-content: center;">
                    <div class = "campoform">
                        <label for="password1">Crea una password:</label><br>
                        <input type="password" id="password1" name="password1" placeholder="Password" title="La password dovrebbe contenere almeno 8 caratteri di cui almeno uno : minuscolo, maiuscolo, numerico e speciale"><br>
                        <small></small> 

                        <input type="checkbox" id = "mostra">
                        <i>Mostra Password</i><br>

                    </div>


                    <div style="width: 5%;"></div><br>

                    <div class = "campoform">
                        <label for="password2">Conferma la password:</label><br>
                        <input type="password" id="password2" name="password2" placeholder="Ripeti Password"><br>
                        <small></small>
                    </div>
                </div>

                <div id="commentoPassword"></div>

                <div id="sicurezzaPassword">
                    <div id="pass-debole"></div> <div id="pass-media"></div> <div id="pass-forte"></div>
                </div>

                <div class = "campoform">      
                    <label for="email">Il tuo indirizzo email:</label><br>
                    <input type="text" id=email name="email" placeholder="Email"><br>
                    <small></small>
                </div>
                
                <div>
                    <input type="checkbox" name="checktermini" id="checktermini">
                    <label style="display:inline" for="checktermini">Accetto i <a href="termini-servizio.php"><strong>Termini di servizio</strong></a> di Mosaic</label><br><br>
                    <small></small>

                    <input class="buttonSubmit" type="submit" value="Registrati">
                </div>

                <br>


                <p>Hai già un account? <a href="../login">Sign in</a>.</p>

            
            </form>


        </div>
    </div><!-- CONTAINER END -->
    <?php
        include '../footer.php';
    ?>

    <script src="../js/verifica-campi-inseriti.js"></script>
</body>
</html>