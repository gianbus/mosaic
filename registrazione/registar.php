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
        <?
			include '../config.php';

			$codiceconferma = md5(uniqid(rand()));
			
			$nome = $_POST['nome'];
			$cognome = $_POST['cognome'];
			$username = $_POST['username'];
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];
			$email = $_POST['email'];
			
			if($nome == "" || $cognome == "" || $username == "" || $password1 == "" || $password2 == "" || $email == ""){
			
				echo "<center><font class=rosso_strong size=5>Attenzione, devi compilare tutti i campi!</font></center>";
				header( "refresh:2;url=index.html" );
				
			}elseif($password1 != $password2){
			
				echo "<center><font class=rosso_strong size=5>Attenzione, le password devono coincidere!</font></center>";
				header( "refresh:2;url=index.html" );
				
			}elseif(!ereg("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$",$email)){
				
				echo "<center><font class=rosso_strong size=5>Attenzione, devi inserire un'email valida!</font></center>";
				header( "refresh:2;url=index.html" );
				
			}elseif(!isset($_POST['checkbox'])){ 
			?>
				<p>Al fine della registrazione devi accettare i <a href="termini-servizio.html">Termini di servizio</a></p>
				<meta http-equiv="refresh" content="5; url=index.html">
			<?
			}else{
			
				$recuperaemail = mysql_query("SELECT id FROM utenti WHERE email='$email' ");	
				$contaemail = mysql_num_rows($recuperaemail);
				
				$recuperauser = mysql_query("SELECT id FROM utenti WHERE username='$username' ");
				$contauser = mysql_num_rows($recuperauser);
					
				$recuperaemail2 = mysql_query("SELECT id FROM utenti_temp WHERE email='$email' ");
				$contaemail2 = mysql_num_rows($recuperaemail2);
				
				$recuperauser2 = mysql_query("SELECT id FROM utenti_temp WHERE username='$username' ");
				$contauser2 = mysql_num_rows($recuperauser2);
				
				if ($contaemail > 0 && $contauser > 0){
						
					echo "<center><font class=rosso_strong size=5>Sia l'email che l'username sono gi&agrave; utilizzati!</font></center>";
					header( "refresh:2;url=index.html" );	
					
				}elseif($contaemail2 > 0 && $contauser2 > 0){
						
					echo "<center><font class=rosso_strong size=5>Sia l'email che l'username sono gi&agrave; utilizzati!</font></center>";
					header( "refresh:2;url=index.html" );
					
				}elseif($contaemail > 0 || $contaemail2 > 0){
						
					echo "<center><font class=rosso_strong size=5>L'email &egrave; stata gi&agrave; utilizzata!</font></center>";
					header( "refresh:2;url=index.html" );
							
				}elseif($contauser > 0 || $contauser2 > 0){
							
					echo "<center><font class=rosso_strong size=5>L'username &egrave; stato gi&agrave; utilizzato!</font></center>";
					header( "refresh:2;url=index.html" );
						
				}else{
				
					$inviautentitemp = mysql_query("INSERT INTO utenti_temp (codiceconferma, nome, cognome, username, password, email) VALUES ('$codiceconferma', '$nome', '$cognome', '$username', '$password2', '$email')");
					
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
						
							echo "<center><font class=verde_strong size=5>Ti sei registrato con successo!<br>Ti abbiamo inviato una mail contenente i tuoi dati di accesso e il link di attivazione.</font></center>";
							header( "refresh:2;url=registrazione.php" );
						
						}else{	
					
							echo "<center><font class=rosso_strong size=5>Si &egrave; vericato un errore nella registrazione! Riprova pi&ugrave; tardi!</font></center>";
							header( "refresh:2;url=registrazione.php" );
							
						}
					
					
					}else{
					
						echo "<center><font class=rosso_strong size=5>Si &egrave; vericato un errore nella registrazione! Riprova pi&ugrave; tardi!</font></center>";
						header( "refresh:2;url=registrazione.php" );	
						
					}
				}
			}
		?>
    </div><!-- CONTAINER END -->

     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>