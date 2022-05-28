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
						'expires' => -1,
						'path' => '/',
						'domain' => 'localhost',
						'secure' => true,
						'httponly' => true,
						'samesite' => 'strict',
					]);

					setcookie("punti", "", [
						'expires' => -1,
						'path' => '/',
						'domain' => 'localhost',
						'secure' => true,
						'httponly' => true,
						'samesite' => 'strict',
					]);

					echo 'Logout effettuato con successo!';
					header( "refresh:2;url=../index.php" );
					exit();
				}else{
					header( "refresh:0;url=../login" );
				}
			?>
</body>
			
			