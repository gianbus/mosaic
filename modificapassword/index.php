<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!--MY CSS-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <!--MY CSS-->

    <title>Mosaic |Modifica password</title>

    <!--favicons-->
    <?php
        include '../favicon.php';
    ?>
    <!--favicons-->
</head>
<body>
    <?php
        include '../navbar.php';
    ?>
    <div class="my-container container-fluid form-bg">

    <?php
            if(!isset($_GET['key'])){
                echo '<h1>Link non valido</h1>';
                header( "refresh:2;url=../index.php" );
                return;
            }
            //RECUPERO TRAMITE GET LA KEY E LA RELATIVA EMAIL + PROTEZIONE SQL INJECTION
            $key = mysqli_real_escape_string($mysqli, $_GET['key']);
            $email = mysqli_real_escape_string($mysqli, $_GET['email']);

            //VERIFICO LA PRESENZA DI ENTRAMBI I PARAMETRI
            if(!$key || !$email){
              echo 'Link non valido';
              header( "refresh:2;url=../index.php" );	
            }else{
                //CONTROLLO SE SONO PRESENTI UTENTI IN DB CON QUELL'EMAIL E QUEL CODICE CONFERMA
                $risultatouser = mysqli_query($mysqli, "SELECT * FROM utenti WHERE codiceconferma = '$key' and email='$email'");
					
                if($risultatouser){//SE LA QUERY E' ANDATA A BUON FINE
                
                    $contauser = mysqli_num_rows($risultatouser);
                    
                    if($contauser == 1){ //SE E' PRESENTE UN ACCOUNT CHE SODDISFA LE CONDIZIONI
                        //MOSTRO IL FORM DI CAMBIO PASSWORD
                        echo '
                        <div id="divmodificapassword" class="mosaic-form">
                            <h2>Modifica Password</h2><br>

                            <form action="cambiopassword.php?key='.$key.'&email='.$email.'" method="POST" id="formcambiopassword"> 
                            
                            <label for="password1">Crea una nuova password:</label>
                            <div id=container-password>
                            <input type="password" class="mosaic-input" id="password1" name="password1" placeholder="Password" required>
                            <i class="fa fa-eye" id="mostra" aria-hidden="true"></i>
                            </div><br><br>

                            <label for="password2">Conferma la nuova password:</label><br>
                            <input type="password" class="mosaic-input" id="password2" name="password2" placeholder="Ripeti Password" required><br><br>
                            
                            <input type="submit" class="mosaic-submit" value="Cambia Password" >
                        
                            </form>
                        </div>';

                    }else{ //NON E' PRESENTE NESSUN ACCOUNT CHE SODDISFI LE CONDIZIONI
                        echo '<h1>Il link per cambiare password è scaduto.</h1>';
                        header( "refresh:4;url=index.php" );
                    }

                }else{ //LA QUERY NON E' ANDATA A BUON FINE
                    echo '<h1>Si è verificato un errore!</h1>';
                    header( "refresh:2;url=index.php" );
                }
            }

            
        ?>
    </div><!-- CONTAINER END -->

    <?php
        include '../footer.php';
    ?>


    <script >
        $("#mostra").click(function(){
            let input = $("input[id^=password]");
        
            let next = input.attr("type")==="password"?"text":"password";
            $("#mostra").toggleClass("fa-eye fa-eye-slash");
            input.attr("type",next);
        });
    </script>
 
</body>
</html>