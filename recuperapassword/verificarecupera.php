<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css">
    <title>Mosaic |Recupera Password</title>
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

                        //INVIO L'EMAIL CON USERNAME E LINK PER CAMBIARE PASSWORD
                        $to=$email;
						$oggetto='Recupero Password Mosaic';
						$message="Benvenuto in Mosaic! \r\n ";
						$message.="Clicca sul link per modificare la tua password!\r\n";
                        $message.="Il tuo username:".$username."\r\n";
						$message.="http://ltw-mosaic.it/modificapassword/index.php?key=$codiceconferma&email=$email";
						$header = 'From: "Mosaic" <no-reply@ltw-mosaic.it>';
						$sentmail=mail($to, $oggetto, $message, $header);
                        
                        //CONTROLLO L'EFFETTIVO INVIO DELL'EMAIL
                        if($sentmail){
                            echo "Se esiste un account registrato con quest'email riceverai presto nella tua casella di posta le istruzioni per resettare la password!";
                            header("Refresh: 4; URL= ../index.php");
                        }else{	
                            echo "Si è verificato un errore. Ritenta più tardi!";
                            header( "refresh:3;url=index.php" );
                        }

                    }else{ //SE NON ESISTE
                        echo "Se esiste un account registrato con quest'email riceverai presto nella tua casella di posta le istruzioni per resettare la password!";
                        header("Refresh: 4; URL= ../index.php");
                    }

                }else{ //SE LA QUERY NON E' ANDATA A BUON FINE
					echo 'recuperauser ha dato false<br>';
                }			

			}
			
		?>
    </div><!-- CONTAINER END -->
	
	<?php
		include '../footer.php';
	?>

</body>
</html>