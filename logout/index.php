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

				if(isset($_COOKIE['utente'])){
					
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

					header( "location:/" );
					exit;
					
				}else{
					header( "location:/login" );
					exit;
				}
			?>
</body>
			
			