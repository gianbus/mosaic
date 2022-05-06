<!DOCTYPE html>
<html>
<head>

	<title>Logout - Mosaic</title>
	
</head>
<body>
			<?php
				session_start();
				if(isset($_SESSION['utente'])){
					$_SESSION = array();
					session_destroy();
					echo 'Logout effettuato con successo!';
					header( "refresh:1;url=../index.php" );
					exit();
				}else{
					header( "refresh:0;url=../login" );
				}
			?>
</body>
			
			