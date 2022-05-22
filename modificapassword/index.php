<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
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
    <div class="my-container container-fluid">

    <?php
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
                        echo '<form action="cambiopassword.php?key='.$key.'&email='.$email.'" method="POST" id="formcambiopassword"> 
                        
                        <label for="password1">Crea una nuova password:</label><br>
                        <input type="password" id="password1" name="password1" placeholder="Password" required><br>
                        
                        <label for="password2">Conferma la nuova password:</label><br>
                        <input type="password" id="password2" name="password2" placeholder="Ripeti Password" required><br><br>
                        
                        <input type="submit" value="Cambia Password" >
                    
                        </form>';

                    }else{ //NON E' PRESENTE NESSUN ACCOUNT CHE SODDISFI LE CONDIZIONI
                        echo 'Il link per cambiare password è scaduto.';
                        header( "refresh:4;url=index.php" );
                    }

                }else{ //LA QUERY NON E' ANDATA A BUON FINE
                    echo 'Si è verificato un errore!';
                    header( "refresh:2;url=index.php" );
                }
            }

            include '../footer.php';
        ?>
    </div><!-- CONTAINER END -->
 
</body>
</html>