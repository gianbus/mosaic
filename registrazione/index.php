<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Mosaic |Registrazione</title>
</head>
<body>
    <div id="container" class="container-fluid">
        <h1>M O S A I C</h1>
        
        <div id="divregistrazione">
            <h2>Registrazione</h2>
            <?php
                include '../config.php';
                if(isset($_SESSION['utente'])) header( "refresh:0;url=../index.php" );
                include '../footer.php';
            ?>
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


                    <div style="width: 5%;"></div>

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
                    <label style="display:inline" for="checktermini">Accetto i <a href="termini-servizio.html"><strong>Termini di servizio</strong></a> di Mosaic</label><br><br>
                    <small></small>

                    <input class="buttonSubmit" type="submit" value="Registrati">
                </div>

                <br>

                <div class="container-fluid signin">
                    <p>Hai già un account? <a target="_blank" href="#">Sign in</a>.</p>
                </div>
            
            </form>


        </div>
    </div><!-- CONTAINER END -->

     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <script src="verifica-campi-inseriti.js"></script>
</body>
</html>