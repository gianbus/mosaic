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
        <h2>Registrazione</h2>
        <?php
			include '../config.php';

			$codiceconferma = md5(uniqid(rand()));
			
			$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
			$cognome = mysqli_real_escape_string($mysqli, $_POST['cognome']);
			$username = mysqli_real_escape_string($mysqli, $_POST['username']);
			$password1 = mysqli_real_escape_string($mysqli, $_POST['password1']);
			$password2 = mysqli_real_escape_string($mysqli, $_POST['password2']);
			$email = mysqli_real_escape_string($mysqli, $_POST['email']);
			
			if($nome == "" || $cognome == "" || $username == "" || $password1 == "" || $password2 == "" || $email == ""){
			
				echo "Attenzione, devi compilare tutti i campi!";
				header( "refresh:5;url=index.php" );
				
			}elseif($password1 != $password2){
			
				echo "Attenzione, le password devono coincidere!";
				header( "refresh:5;url=index.php" );
				
			}elseif(!isset($_POST['checktermini'])){ 

				echo 'Al fine della registrazione devi accettare i <a href="termini-servizio.html">Termini di servizio</a>';
				header( "refresh:5;url=index.php" );

			}else{

				//RIEPILOGO CAMPI INSERITI
				echo "Nome: ".$nome."<br>";
				echo "Cognome: ".$cognome."<br>";
				echo "Password: ".$password1."<br>";
				echo "Email: ".$email."<br>";
			
				$recuperaemail = mysqli_query($mysqli, "SELECT * FROM utenti WHERE email='$email' ");

				if($recuperaemail)	
					$contaemail = mysqli_num_rows($recuperaemail);
				else
					echo 'recuperamail ha dato false<br>';
				
				$recuperauser = mysqli_query($mysqli, "SELECT * FROM utenti WHERE username='$username' ");

				if($recuperauser)
					$contauser = mysqli_num_rows($recuperauser);
				else
					echo 'recuperauser ha dato false<br>';
				
				if ($contaemail > 0 && $contauser > 0){
						
					echo "Sia l'email che l'username sono gi&agrave; utilizzati!";
					header( "refresh:2;url=index.php" );	
					
				}elseif($contaemail > 0){
						
					echo "L'email &egrave; stata gi&agrave; utilizzata!";
					header( "refresh:2;url=index.php" );
							
				}elseif($contauser > 0){
							
					echo "L'username &egrave; stato gi&agrave; utilizzato!";
					header( "refresh:2;url=index.php" );
						
				}else{
				
					$inviautentitemp = mysqli_query($mysqli, "INSERT INTO utenti (codiceconferma, nome, cognome, username, password, verificato, punti, email) VALUES ('$codiceconferma', '$nome', '$cognome', '$username', '$password2', 0, 0, '$email')");
					
					if($inviautentitemp){
					
						$to=$email;
						$oggetto='Registrazione Mosaic';
						$message="Benvenuto in Mosaic! \r\n ";
						$message.="Ecco i tuoi dati per accedere al sito: \r\n ";
						$message.="Username: $username \r\n ";
						$message.="Password: INSERITA IN FASE DI REGISTRAZIONE \r\n ";
						$message.="Clicca sul link per confermare la tua email!\r\n";
						$message.="http://ltw-mosaic.it/registrazione/attiva-account.php?passkey=$codiceconferma";
						$header = 'From: "Mosaic" <no-reply@mosaic-project.net>';
						$sentmail=mail($to, $oggetto, $message, $header);
						
						if($sentmail){
						
							echo "Ti sei registrato con successo!<br>Ti abbiamo inviato una mail contenente i tuoi dati di accesso e il link di attivazione.";
							header( "refresh:3;url=../index.php" );
						
						}else{	
					
							echo "Si &egrave; vericato un errore nell'invio della mail! Riprova ad accedere pi&ugrave; tardi!";
							header( "refresh:3;url=index.html" );
							
						}
					
					
					}else{
					
						echo "Si &egrave; vericato un errore nella registrazione! Riprova pi&ugrave; tardi!";
						header( "refresh:2;url=index.html" );	
						
					}
				}
			}
		?>
    </div><!-- CONTAINER END -->
	
	<?php
		include '../footer.php';
	?>

</body>
</html>