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
			$passkey = $_GET['passkey'];
					
					$risultatouser = mysqli_query($mysqli, "SELECT * FROM utenti WHERE codiceconferma = '$passkey'");
					
					if($risultatouser) {
					
						$contauser = mysqli_num_rows($risultatouser);
						
						if($contauser == 1){
							
							$sqlconfermauser = mysqli_query($mysqli, "UPDATE utenti SET verificato=1, punti=100, codiceconferma = '$codiceconferma' WHERE codiceconferma = '$passkey'");
							
							if ($sqlconfermauser) {
								
								?>
									<p>Il tuo account &egrave; stato attivato con successo!<br>Stai per essere reindirizzato alla pagina di login!</p>
									<meta http-equiv="refresh" content="5; url=../login">
								<?php
							
							} else {
							?>
								<meta http-equiv="refresh" content="0; url=../index.php">
							<?php
							}
						
						}else{
						?>
							<p>Il tuo account &egrave; gi&agrave; attivo o &egrave; passato troppo tempo dalla tua registrazione!</p>
							<meta http-equiv="refresh" content="5; url=../login">
						<?php
						}
					
					}else{
					?>
						<p>Il tuo account &egrave; gi&agrave; attivo o &egrave; passato troppo tempo dalla tua registrazione!</p>
						<meta http-equiv="refresh" content="5; url=../login">
					<?php
					}
                include '../footer.php';
		?>
        
    </div><!-- CONTAINER END -->

     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>