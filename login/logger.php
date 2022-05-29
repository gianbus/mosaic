<?php
    include '../config.php';

    $err = -1;
    $mess = "";

    if(isset($_COOKIE['utente'])){ //SE L'UTENTE E' GIA' LOGGATO
        $err = 6;
        $mess = "Hai già effettuato il login!!";
    }else{

        //IMPORTO USERNAME E PASSWORD CON REAL ESCAPE STRING + PROTEZIONE SQL INJECTION
        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        $password = mysqli_real_escape_string($mysqli, $_POST['password']);

        //CRIPTO LA PASSWORD
        $password = hash('sha256', $password);
        
        if($username == "" || $password == ""){ //CONTROLLO SIANO STATI INSERITI TUTTI I CAMPI
            $err = 4;
            $mess = "Attenzione, devi compilare tutti i campi!";
            
        }else if(!preg_match("/[a-zA-Z0-9._]+$/",$username) || preg_match("/[ ]+/",$username)){ //CONTROLLO FORMATO USERNAME
            $err = 3;
            $mess = "Username o Password errati!";
        
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
                            'domain' => 'ltw-mosaic.it',
                            'secure' => true,
                            'httponly' => true,
                            'samesite' => 'Strict',
                        ]);

                        setcookie("punti", $sessione['punti'], [
                            'expires' => time() + 3600,
                            'path' => '/',
                            'domain' => 'ltw-mosaic.it',
                            'secure' => true,
                            'httponly' => true,
                            'samesite' => 'Strict',
                        ]);

                        $err = 0;

                    }else{ //SE NON E' VERIFICATO
                        $mess="Il tuo account non risulta verificato!<br>";

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
                                $err = 1;
                                $mess .= "Ti abbiamo inviato nuovamente il link di verifica!<br>Clicca sul link per procedere all'attivazione.";

                            }else{	                        
                                $err = 2;
                                $mess .= "Si è vericato un errore nell'invio della mail con il link di attivazione! Riprova ad accedere più tardi!";
                            }

                        }else{ //AGGIORNAMENTO NON ANDATO A BUON FINE
                            $err = 5;
                            $mess .= "Si è verificato un errore. Riprova più tardi.";
                        }

                    }

                }else{ //SE LE CREDENZIALI SONO ERRATE
                    $err = 4;
                    $mess="Username o Password errati!";
                }

            }else{ //SE SI SONO VERIFICATI ERRORI DURANTE L'ESECUZIONE DELLA QUERY
                $err = 5;
                $mess = "Si è verificato un errore durante l\'esecuzione della query!";
            }			
        }
    }

    $resp = new stdClass();
    $resp->err = $err;
    $resp->mess = $mess;
    
    echo json_encode($resp);

    $mysqli->close();


    /*
        err = 0 -> con successo
        err = 1 -> account non attivato email inviata
        err = 2 -> account non attivato email non inviata
        err = 3 -> username o password errati
        err = 4 -> non sono compilati tutti i campi
        err = 5 -> errore generico - possibile query non andata a buon fine
        err = 6 -> utente già loggato
    */

?>