<!DOCTYPE html>
<html>
<head>
	<title>Mosaic |Logout</title>
	<!--favicons-->
	<?php
        include '../favicon.php';
    ?>
    <!--favicons-->
</head>
<body>
			<?php

				if(isset($_COOKIE['utente']) || isset($_COOKIE['punti'])){
					
					setcookie("utente", "", [
						'expires' => time() - 3600,
						'path' => '/',
						'domain' => 'ltw-mosaic.it',
						'secure' => true,
						'httponly' => true,
						'samesite' => 'Strict',
					]);

					setcookie("punti", "", [
						'expires' => time() - 3600,
						'path' => '/',
						'domain' => 'ltw-mosaic.it',
						'secure' => true,
						'httponly' => true,
						'samesite' => 'Strict',
					]);

					echo 'Logout effettuato con successo!';
					header( "refresh:2;url=../index.php" );
					exit();
				}else{
					header( "refresh:0;url=../login" );
				}
			?>
</body>
			
			