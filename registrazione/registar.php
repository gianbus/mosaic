<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
			
			$nome = $_POST['nome'];
			$cognome = $_POST['cognome'];
			$username = $_POST['username'];
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];
			$email = $_POST['email'];
			
			if($nome == "" || $cognome == "" || $username == "" || $password1 == "" || $password2 == "" || $email == ""){
			
				echo "Attenzione, devi compilare tutti i campi!";
				header( "refresh:5;url=index.html" );
				
			}elseif($password1 != $password2){
			
				echo "Attenzione, le password devono coincidere!";
				header( "refresh:5;url=index.html" );
				
			}elseif(!isset($_POST['checkbox'])){ 

				echo 'Al fine della registrazione devi accettare i <a href="termini-servizio.html">Termini di servizio</a>';
				header( "refresh:5;url=index.html" );

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
					header( "refresh:2;url=index.html" );	
					
				}elseif($contaemail > 0){
						
					echo "L'email &egrave; stata gi&agrave; utilizzata!";
					header( "refresh:2;url=index.html" );
							
				}elseif($contauser > 0){
							
					echo "L'username &egrave; stato gi&agrave; utilizzato!";
					header( "refresh:2;url=index.html" );
						
				}else{
				
					$inviautentitemp = mysqli_query($mysqli, "INSERT INTO utenti (codiceconferma, nome, cognome, username, password, email) VALUES ('$codiceconferma', '$nome', '$cognome', '$username', '$password2', '$email')");
					
					if($inviautentitemp){
					
						$to=$email;
						$oggetto='Registrazione Mosaic';
						$message="Benvenuto in Mosaic! \r\n ";
						$message.="Ecco i tuoi dati per accedere al sito: \r\n ";
						$message.="Username: $username \r\n ";
						$message.="Password: $password2 \r\n ";
						$message.="Clicca sul link per confermare la tua email!\r\n";
						$message.="http://localhost/mosaic/registrazione/attiva-account.php?passkey=$codiceconferma";
						$header = 'From: "Mosaic" <no-reply@mosaic-project.net>';
						$sentmail=mail($to, $oggetto, $message, $header);
						
						if($sentmail){
						
							echo "Ti sei registrato con successo!<br>Ti abbiamo inviato una mail contenente i tuoi dati di accesso e il link di attivazione.";
							header( "refresh:2;url=registrazione.php" );
						
						}else{	
					
							echo "Si &egrave; vericato un errore nella registrazione! Riprova pi&ugrave; tardi!";
							header( "refresh:2;url=registrazione.php" );
							
						}
					
					
					}else{
					
						echo "Si &egrave; vericato un errore nella registrazione! Riprova pi&ugrave; tardi!";
						header( "refresh:2;url=registrazione.php" );	
						
					}
				}
			}
		?>
    </div><!-- CONTAINER END -->
	
	<?php
		include '../footer.php';
	?>
     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>