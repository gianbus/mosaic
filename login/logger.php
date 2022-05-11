<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Mosaic |Login</title>
</head>

<body>
    <?php
			include '../config.php';
            include '../navbar.php';
    ?>
    <div id="container" class="container-fluid">
        <h2>Login</h2>
        
        <?php
        
            //IMPORTO USERNAME E PASSWORD CON REAL ESCAPE STRING + PROTEZIONE SQL INJECTION
            $username = mysqli_real_escape_string($mysqli, $_POST['username']);
            $password = mysqli_real_escape_string($mysqli, $_POST['password']);

            //CRIPTO LA PASSWORD
            $password = hash('sha256', $password);
			
			if($username == "" || $password == ""){ //CONTROLLO SIANO STATI INSERITI TUTTI I CAMPI
				echo "Attenzione, devi compilare tutti i campi!";
				header( "refresh:4;url=index.php" );
				
			}else if(!preg_match("/[a-zA-Z0-9._]+$/",$username) || preg_match("/[ ]+/",$username)){ //CONTROLLO FORMATO USERNAME
				echo "Username non valido.";
				header( "refresh:4;url=index.php" );
			
			}else{
                //VERIFICO L'ESISTENZA DELL'UTENTE CON QUELL'USERNAME E DI CONSEGUENZA LA PASSWORD
				$recuperauser = mysqli_query($mysqli, "SELECT * FROM utenti WHERE username='$username' AND password='$password' ");

				if($recuperauser){ //SE LA QUERY E' ANDATA A BUON FINE
                    //VERIFICO L'ESISTENZA DELL'ACCOUNT
					$contauser = mysqli_num_rows($recuperauser);

                    if($contauser == 1){//SE LE CREDENZIALI INSERITE SONO CORRETTE
                        $sessione = mysqli_fetch_array($recuperauser);

                        if($sessione['verificato']==1){ //SE L'UTENTE E' UN UTENTE VERIFICATO
                            //ESEGUE L'ACCESSO
                            $_SESSION['utente'] = $sessione['username'];
                            $_SESSION['punti'] = $sessione['punti'];
                            echo "Login effettuato con successo!";
                            header("Refresh: 2; URL= ../index.php");

                        }else{ //SE NON E' VERIFICATO
                            echo 'Il tuo account non risulta verificato!<br>';

                            //GENERAZIONE NUOVO CODICE CONFERMA RANDOMICO
                            $codiceconferma = md5(uniqid(rand()));

                            //AGGIORNO IL CODICE CONFERMA SUL DB PER TALE UTENTE
                            $oldcodice = $sessione['codiceconferma'];
                            $aggiornacodice = mysqli_query($mysqli, "UPDATE utenti SET codiceconferma = '$codiceconferma' WHERE codiceconferma = '$oldcodice' and verificato=0");
                            
                            if($aggiornacodice){ //AGGIORNAMENTO ANDATO A BUON FINE

                                //VIENE INVIATA EMAIL CON NUOVO CODICE CONFERMA
                                $to=$sessione['email'];
                                $oggetto='Registrazione Mosaic';
                                $message="Benvenuto in Mosaic! \r\n ";
                                $message.="Ecco i tuoi dati per accedere al sito: \r\n ";
                                $message.="Username: $username \r\n ";
                                $message.="Password: INSERITA IN FASE DI REGISTRAZIONE \r\n ";
                                $message.="Clicca sul link per confermare la tua email!\r\n";
                                $message.="http://ltw-mosaic.it/registrazione/attiva-account.php?passkey=$codiceconferma";
                                $header = 'From: "Mosaic" <no-reply@ltw-mosaic.it>';
                                $sentmail=mail($to, $oggetto, $message, $header);
                                
                                if($sentmail){
                                    echo "Ti abbiamo inviato nuovamente il link di verifica!<br>Clicca sul link per procedere all'attivazione.";
                                    header("refresh:3;url=../index.php");
                                }else{	                        
                                    echo "Si è vericato un errore nell'invio della mail con il link di attivazione! Riprova ad accedere più tardi!";
                                    header("refresh:3;url=index.php");
                                }

                            }else{
                                echo 'Si è verificato un errore. Riprova più tardi.';
                                header("refresh:3;url=index.php");
                            }

                        }

                    }else{ //SE LE CREDENZIALI SONO ERRATE
                        echo "Username o Password errati!";
                        header("Refresh: 2; URL= index.php");
                    }

                }else{ //SE SI SONO VERIFICATI ERRORI DURANTE L'ESECUZIONE DELLA QUERY
					echo 'Si è verificato un errore durante l\'esecuzione della query!';
                    header("Refresh: 2; URL= index.php");
                }			
			}
		?>

    </div><!-- CONTAINER END -->
	
	<?php
		include '../footer.php';
	?>

</body>

</html>