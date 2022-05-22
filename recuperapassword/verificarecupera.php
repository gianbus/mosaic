<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">
    <title>Mosaic |Recupera Password</title>
    
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
        <h2>Recupera Password</h2>
        <?php
            //IMPORTO USERNAME E PASSWORD CON REAL ESCAPE STRING - PROTEZIONE SQL INJECTION
            $email = mysqli_real_escape_string($mysqli, $_POST['email']);
			
			if($email == ""){ //CONTROLLO SIANO INSERITI TUTTI I CAMPI
				echo "Attenzione, devi compilare tutti i campi!";
				header( "refresh:4;url=index.php" );
				
			}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //CONTROLLO L'EMAIL SIA UN FORMATO VALIDO
                echo "Attenzione, inserire un'email valida!";
				header( "refresh:4;url=index.php" );

            }else{
                //VERIFICO SE ESISTONO UTENTI CON QUELL'EMAIL
				$recuperauser = mysqli_query($mysqli, "SELECT * FROM utenti WHERE email='$email' ");

				if($recuperauser){ //SE LA QUERY E' ANDATA A BUON FINE
                    //VERIFICO L'ESISTENZA DI UN UTENTE CON QUELL'EMAIL
					$contauser = mysqli_num_rows($recuperauser);
                    if($contauser == 1){ //SE ESISTE UN UTENTE CON QUELL'EMAIL

                        //RECUPERO I DATI DELL'UTENTE
                        $row = mysqli_fetch_array($recuperauser);
                        $codiceconferma = $row['codiceconferma'];
                        $username = $row['username'];
                        $nome = $row['nome'];
                        $cognome = $row['cognome'];

                        //INVIO L'EMAIL CON USERNAME E LINK PER CAMBIARE PASSWORD

                        $to=$email;
                        $oggetto='Recupera password Mosaic';
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
                                            <h3>Ciao $nome $cognome!</h3>
                                            <h4>Clicca sul link per cambiare la tua password!</h4>
                        
                                            <p>Ti ricordiamo il tuo nome utente.<br>
                                            <b>Username:</b> <i>$username</i><br>

                                            <a class='link-attivazione' href='http://ltw-mosaic.it/modificapassword/index.php?key=$codiceconferma&email=$email'><div id='bottone'>Clicca qui per cambiare password.</div></a>
                                            
                                        </div>
                                        <div>
                                            <p style='color:#ccc; font-size:12px;'>Se il bottone non funziona clicca sul link o copia e incolla sul browser:<br>
                                            <a class='link-attivazione' style='color:#ccc;' href='http://ltw-mosaic.it/modificapassword/index.php?key=$codiceconferma&email=$email'>http://ltw-mosaic.it/modificapassword/index.php?key=$codiceconferma&email=$email</a></p><br>
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
                        
                        //CONTROLLO L'EFFETTIVO INVIO DELL'EMAIL
                        if($sentmail){
                            echo "<h3>Se esiste un account registrato con quest'email riceverai presto nella tua casella di posta le istruzioni per resettare la password!</h3>";
                            header("Refresh: 4; URL= ../index.php");
                        }else{	
                            echo "<h3>Si è verificato un errore. Ritenta più tardi!</h3>";
                            header( "refresh:3;url=index.php" );
                        }

                    }else{ //SE NON ESISTE
                        echo "<h3>Se esiste un account registrato con quest'email riceverai presto nella tua casella di posta le istruzioni per resettare la password!</h3>";
                        header("Refresh: 4; URL= ../index.php");
                    }

                }else{ //SE LA QUERY NON E' ANDATA A BUON FINE
					echo '<h3>recuperauser ha dato false</h3><br>';
                }			

			}
			
		?>
    </div><!-- CONTAINER END -->
	
	<?php
		include '../footer.php';
	?>

</body>
</html>