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
			?>
</body>
			
			