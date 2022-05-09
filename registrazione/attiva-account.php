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
</head>

<body>
    <div id="container" class="container-fluid">
        <h1>M O S A I C</h1>
        <h2>Attivazione account</h2>

        <?php
			include '../config.php';

            //RECUPERO IL PASSKEY PASSATO TRAMITE GET RIPULENDOLO DA POSSIBILI CARATTERI PERIOCOLOSI
			$passkey = mysqli_real_escape_string($mysqli, $_GET['passkey']);

			//CERCO UN UTENTE DA VERIFICARE CON QUEL CODICECONFERMA		
			$risultatouser = mysqli_query($mysqli, "SELECT * FROM utenti WHERE codiceconferma = '$passkey' and verificato = 0 ");
					
			if($risultatouser){ //SE LA QUERY E' ANDATA A BUON FINE			
				//CONTO IL NUMERO DI RIGHE
				$contauser = mysqli_num_rows($risultatouser);
				
				if($contauser == 1){//SE ESISTE UN UTENTE CON TALI CARATTERISTICHE PROCEDO ALL'ATTIVAZIONE
					//GENERO UN NUOVO CODICE CONFERMA
					$codiceconferma = md5(uniqid(rand()));
					//ATTIVO L'ACCOUNT
					$sqlconfermauser = mysqli_query($mysqli, "UPDATE utenti SET verificato=1, punti=100, codiceconferma = '$codiceconferma' WHERE codiceconferma = '$passkey' and verificato=0");
					
					if($sqlconfermauser){//SE LA QUERY E' ANDATA A BUON FINE
						echo 'Il tuo account è stato attivato con successo!<br>Stai per essere reindirizzato alla pagina di login!';
						header( "refresh:4;url=../login" );
					
					}else{//SE SI E' VERIFICATO UN ERRORE CON LA QUERY
						echo 'Si è verificato un errore!';
						header("refresh:2;url=index.php");
					}
				
				}else{//SE IL LINK NON E' VALIDO
					echo 'Il tuo account &egrave; gi&agrave; attivo o &egrave; passato troppo tempo dalla tua registrazione!';
					header( "refresh:4;url=../login" );
				}
			
			}else{
				echo 'Si è verificato un errore!';
				header( "refresh:4;url=index.php" );

			}

            include '../footer.php';
		?>
    </div><!-- CONTAINER END -->

</body>

</html>