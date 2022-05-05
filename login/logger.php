<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Mosaic |Login</title>
</head>
<body>
    <div id="container" class="container-fluid">
        <h1>M O S A I C</h1>
        <h2>Login</h2>
        <?php
			include '../config.php';

			$codiceconferma = md5(uniqid(rand()));
			
            //IMPORTO USERNAME E PASSWORD CON REAL ESCAPE STRING - PROTEZIONE SQL INJECTION
            $username = mysqli_real_escape_string($mysqli, $_POST['username']);
            $password = mysqli_real_escape_string($mysqli, $_POST['password']);

			
			if($username == "" || $password == ""){
                
                //RIEPILOGO CAMPI INSERITI
				echo "Username: ".$username."<br>";
				echo "Password: ".$password."<br>";
				echo "Attenzione, devi compilare tutti i campi!";
				header( "refresh:5;url=index.html" );
				
			}else{

				//RIEPILOGO CAMPI INSERITI
				echo "Username: ".$username."<br>";
				echo "Password: ".$password."<br>";
			
				$recuperauser = mysqli_query($mysqli, "SELECT * FROM utenti WHERE username='$username' AND password='$password' ");

				if($recuperauser){

					$contauser = mysqli_num_rows($recuperauser);
                    if($contauser == 1){
                        $sessione = mysqli_fetch_array($recuperauser);
                        $_SESSION['utente'] = $sessione['username'];
                        header("Refresh: 5; URL= ../index.php");
                        echo "Login effettuato con successo!";
                    }else{
                        header("Refresh: 2; URL= login.php");
                        echo "Username o Password errati!";
                    }

                }else{
					echo 'recuperauser ha dato false<br>';
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