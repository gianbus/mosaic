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

	<!--favicons-->
	<?php
        include '../favicon.php';
    ?>
    <!--favicons-->
</head>

<body>
    <div id="container" class="my-container container-fluid">
		<h1>M O S A I C</h1>
        <h2>Registrazione</h2>

        <?php
			include '../navbar.php';

			//RECUPERO I DATI DAL FORM - PULENDO EVENTUALI CARATTERI DI ESCAPE CHE POTREBBERO CAUSARE SQL INJECTION
			$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
			$cognome = mysqli_real_escape_string($mysqli, $_POST['cognome']);
			$username = mysqli_real_escape_string($mysqli, $_POST['username']);
			$password1 = mysqli_real_escape_string($mysqli, $_POST['password1']);
			$password2 = mysqli_real_escape_string($mysqli, $_POST['password2']);
			$email = mysqli_real_escape_string($mysqli, $_POST['email']);
			
			if($nome == "" || $cognome == "" || $username == "" || $password1 == "" || $password2 == "" || $email == ""){ //CONTROLLO INSERIMENTO TUTTI I CAMPI
				echo "Attenzione, devi compilare tutti i campi!";
				header( "refresh:5;url=index.php" );
				
			}else if(!preg_match("/[a-zA-Z0-9._]+$/",$username) || preg_match("/[ ]+/",$username)){ //CONTROLLO FORMATO USERNAME
				echo "Username non valido. Può contenere soltanto lettere maiuscole, minuscole, numeri o i caratteri [.] e [_] e non può contenere spazi!<br>";
				header( "refresh:5;url=index.php" );
			
			}elseif($password1 != $password2){ //CONTROLLO CHE LE PASSWORD COINCIDANO
				echo "Attenzione, le password devono coincidere!";
				header( "refresh:5;url=index.php" );
				
			}elseif(strlen($password1)<8 || !preg_match("/[A-Z]+/",$password1) || !preg_match("/[a-z]+/",$password1)){ //CONTROLLO COMPLESSITA PASSWORD
				echo "Password troppo semplice, deve avere almeno una maiuscola e una minuscola ed almeno 8 caratteri!";
				header( "refresh:5;url=index.php" );
			
			}elseif(!isset($_POST['checktermini'])){ //CONTROLLO CHE I TERMINI DI SERVIZIO SIANO STATI ACCETTATI
				echo 'Al fine della registrazione devi accettare i <a href="termini-servizio.html">Termini di servizio</a>';
				header( "refresh:5;url=index.php" );

			}else{ //I DATI SODDISFANO LE RICHIESTE
				//LA PASSWORD VIENE CRIPTATA IN SHA256
				$password1 = hash('sha256', $password1);

				$recuperaemail = mysqli_query($mysqli, "SELECT * FROM utenti WHERE email='$email' ");
				$recuperauser = mysqli_query($mysqli, "SELECT * FROM utenti WHERE username='$username' ");

				if($recuperaemail && $recuperauser){ //SE LE QUERY SONO ANDATE A BUON FINE PROSEGUO
					$contaemail = mysqli_num_rows($recuperaemail);
					$contauser = mysqli_num_rows($recuperauser);

					//CONTROLLO SE ESISTONO ALTRI ACCOUNT CON STESSO USERNAME E/O EMAIL
					if ($contaemail > 0 && $contauser > 0){ 
						echo "Sia l'email che l'username sono già utilizzati!";
						header( "refresh:5;url=index.php" );	
						
					}elseif($contaemail > 0){
						echo "L'email è stata già utilizzata!";
						header( "refresh:5;url=index.php" );
								
					}elseif($contauser > 0){
						echo "L'username è stato già utilizzato!";
						header( "refresh:5;url=index.php" );
							
					}else{
						//GENERO CODICE CONFERMA E INSERISCO I DATI NEL DATABASE
						$codiceconferma = md5(uniqid(rand()));
						$inviautentitemp = mysqli_query($mysqli, "INSERT INTO utenti (codiceconferma, nome, cognome, username, password, verificato, punti, email) VALUES ('$codiceconferma', '$nome', '$cognome', '$username', '$password1', 0, 0, '$email')");
						
						if($inviautentitemp){

							$to=$email;
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
								echo "Ti sei registrato con successo!<br>Ti abbiamo inviato una mail contenente i tuoi dati di accesso e il link di attivazione.";
								header( "refresh:5;url=../index.php" );
							
							}else{	
								echo "Ti sei registrato con successo!<br>Si è vericato però un errore nell'invio della mail! Riprova ad accedere più tardi per ricevere un altro link di attivazione!";
								header( "refresh:5;url=index.php" );
								
							}
						
						
						}else{
							echo "Si &egrave; vericato un errore nella registrazione! Riprova pi&ugrave; tardi!";
							header( "refresh:5;url=index.php");	
							
						}
					}

				}else{
					echo 'Si è verificato un errore con l\' esecuzione delle query. Riprova più tardi.';
					header( "refresh:5;url=index.php");	
				}
				
			}
		?>

    </div><!-- CONTAINER END -->
	
	<?php
		include '../footer.php';
	?>

</body>

</html>