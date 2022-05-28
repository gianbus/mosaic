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
    <div id="container" class="my-container container-fluid">
        <h2>Login</h2>
        
        <?php

            if(isset($_COOKIE['utente'])) header( "refresh:0;url=../index.php" );
        
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

                            //ESEGUE L'ACCESSO SETTANDO I DUE COOKIES "UTENTE" E "PUNTI" PER LA DURATA DI UN'ORA

                            setcookie("utente", $sessione['username'], [
                                'expires' => time() + 3600,
                                'path' => '/',
                                'domain' => 'localhost',
                                'secure' => true,
                                'httponly' => true,
                                'samesite' => 'Strict',
                            ]);

                            setcookie("punti", $sessione['punti'], [
                                'expires' => time() + 3600,
                                'path' => '/',
                                'domain' => 'localhost',
                                'secure' => true,
                                'httponly' => true,
                                'samesite' => 'Strict',
                            ]);

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

                                $to=$sessione['email'];
                                $nome = $sessione['nome'];
                                $cognome = $sessione['cognome'];
                                $username = $sessione['username'];
                                $oggetto='Registrazione Mosaic';
                                $message="<html>
                                        <head>
                                        <style>
                                            #email-body{
                                                background-color: #161b22;
                                                text-align: center;
                                                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                                                padding: 30px;
                                                border-radius: 20px;
                                                width: fit-content;
                                                margin:auto;
                                            }
                            
                                            h3, h4{
                                                color: rgb(255, 255, 255);
                                                font-weight: 500;
                                                margin:10px;
                                            }
                                            
                                            #bottone{
                                                background-color: transparent;
                                                border-radius: 5px;
                                                border: 0px;
                                                background-image: linear-gradient(-75deg, #3a3d42, rgba(0, 34, 73, 0.843));
                                                color: white;
                                                padding: 5px;
                                                width:fit-content;
                                                margin:auto;
                                            }
                            
                                            p{
                                                color: rgb(255, 255, 255);
                                            }
                            
                                            #testo{
                                                margin: 15px auto;
                                                padding: 20px;
                                                border-radius: 20px;
                                                width: fit-content;
                                                background-color: rgba(255, 255, 255, 0.034);
                                                border: 1px solid rgba(255, 255, 255, 0.221);
                                            }
                            
                                            #bottone:hover{
                                                cursor: pointer;
                                                background-image: linear-gradient(75deg, #3a3d42, rgba(0, 34, 73, 0.843));
                                                background-color: transparent;
                                            }
                            
                                            .link-attivazione{
                                                text-decoration:none;
                                                color: white;
                                            }
                            
                                        </style>
                                        </head>
                            
                                    <body>
                                        <div id='email-body'>
                                            <img width='300px' src='https://www.ltw-mosaic.it/assets/logos/logo2.png'>
                                            <div id='testo'>
                                                <h3>Benvenuto $nome $cognome!</h3>
                                                <h4>Grazie per esserti iscritto a Mosaic!</h4>
                            
                                                <p> Ecco i tuoi dati per accedere al sito:<br>
                                                    <b>Username:</b> <i>$username</i><br>
                                                    <b>Password:</b> <i>INSERITA IN FASE DI REGISTRAZIONE</i></p>
                            
                                                    <a class='link-attivazione' href='https://ltw-mosaic.it/registrazione/attiva-account.php?passkey=$codiceconferma'><div id='bottone'>Clicca qui per attivare il tuo account.</div></a>
                                                
                                            </div>
                                            <div>
                                                <p style='color:#ccc; font-size:12px;'>Se il bottone non funziona clicca sul link o copia e incolla sul browser:<br>
                                                <a class='link-attivazione' style='color:#ccc;' href='https://ltw-mosaic.it/registrazione/attiva-account.php?passkey=$codiceconferma'>http://ltw-mosaic.it/registrazione/attiva-account.php?passkey=$codiceconferma</a></p><br>
                                                <p>MOSAIC &copy; 2022</p>
                                            </div>
                                        </div>
    
                                        
                                    </body>
                            
                                    </html>";
                                
                                $headers[] = 'MIME-Version: 1.0';
                                $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                                $headers[] = "To: <$email>";
                                $headers[] = 'From: "Mosaic" <no-reply@ltw-mosaic.it>';

                                $sentmail=mail($to, $oggetto, $message, implode("\r\n", $headers));
                                
                                if($sentmail){
                                    echo "Ti abbiamo inviato nuovamente il link di verifica!<br>Clicca sul link per procedere all'attivazione.";
                                    header("refresh:5;url=../index.php");
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