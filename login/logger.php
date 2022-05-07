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
    <div id="container" class="container-fluid">
        <h1>M O S A I C</h1>
        <h2>Login</h2>
        <?php
			include '../config.php';
			
            //IMPORTO USERNAME E PASSWORD CON REAL ESCAPE STRING - PROTEZIONE SQL INJECTION
            $username = mysqli_real_escape_string($mysqli, $_POST['username']);
            $password = mysqli_real_escape_string($mysqli, $_POST['password']);
			
			if($username == "" || $password == ""){
                
				echo "Attenzione, devi compilare tutti i campi!";
				header( "refresh:5;url=index.html" );
				
			}else{

				$recuperauser = mysqli_query($mysqli, "SELECT * FROM utenti WHERE username='$username' AND password='$password' ");

				if($recuperauser){

					$contauser = mysqli_num_rows($recuperauser);
                    if($contauser == 1){
                        $sessione = mysqli_fetch_array($recuperauser);
                        if($sessione['verificato']==1){
                            $_SESSION['utente'] = $sessione['username'];
                            $_SESSION['punti'] = $sessione['punti'];
                            header("Refresh: 5; URL= ../index.php");
                            echo "Login effettuato con successo!";
                        }else{
                            $codiceconferma = md5(uniqid(rand()));
                            echo 'Il tuo account non risulta verificato!<br>';
                            $key=$sessione['codiceconferma'];
                            $to=$sessione['email'];
                            $oggetto='Registrazione Mosaic';
                            $message="Benvenuto in Mosaic! \r\n ";
                            $message.="Ecco i tuoi dati per accedere al sito: \r\n ";
                            $message.="Username: $username \r\n ";
                            $message.="Password: INSERITA IN FASE DI REGISTRAZIONE \r\n ";
                            $message.="Clicca sul link per confermare la tua email!\r\n";
                            $message.="http://ltw-mosaic.it/registrazione/attiva-account.php?passkey=$key";
                            $header = 'From: "Mosaic" <no-reply@mosaic-project.net>';
                            $sentmail=mail($to, $oggetto, $message, $header);
                            
                            if($sentmail){
                            
                                echo "Ti abbiamo inviato nuovamente il link di verifica!<br>Clicca sul link per procedere all'attivazione.";
                                header( "refresh:3;url=../index.php" );
                            
                            }else{	
                        
                                echo "Si è vericato un errore nell'invio della mail! Riprova ad accedere pi&ugrave; tardi!";
                                header( "refresh:3;url=index.html" );
                                
                            }
                        }
                    }else{
                        header("Refresh: 2; URL= index.html");
                        echo "Username o Password errati!";
                    }

                }else{
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