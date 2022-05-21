<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Mosaic |Modifica password</title>
</head>

<body>
    <?php
        include '../navbar.php';
    ?>
    
    <div id="container" class="my-container container-fluid">

    <?php
            //RECUPERO GLI ELEMENTI TRAMITE GET E POST + PROTEZIONE SQL INJECTION
            $key = mysqli_real_escape_string($mysqli, $_GET['key']);
            $email = mysqli_real_escape_string($mysqli, $_GET['email']);
            $password1 = mysqli_real_escape_string($mysqli, $_POST['password1']);
            $password2 = mysqli_real_escape_string($mysqli, $_POST['password2']);

            if(!$key || !$email){ //VERIFICO PRESENZA PARAMETRI
                echo 'Link non valido';
                header( "refresh:4;url=../index.php" );
            
            }else if($password1=="" || $password2 == ""){ //VERIFICO LA COMPILAZIONE DI TUTTI I CAMPI
                echo 'Devi riempire tutti i campi!';
			    header("refresh:4;url=index.php?key=$key&email=$email");	

            }else if($password1 != $password2){ //VERIFICO CHE LE PASSWORD COINCIDANO
                echo 'Le password devono coincidere!';
			    header("refresh:4;url=index.php?key=$key&email=$email");	

            }elseif(strlen($password1)<8 || !preg_match("/[A-Z]+/",$password1) || !preg_match("/[a-z]+/",$password1)){ //CONTROLLO COMPLESSITA PASSWORD
				echo "Password troppo semplice, deve avere almeno una maiuscola e una minuscola ed almeno 8 caratteri!";
			    header("refresh:4;url=index.php?key=$key&email=$email");	

            }else{
                //GENERO UN NUOVO CODICE CONFERMA
                $codiceconferma = md5(uniqid(rand()));

                //LA PASSWORD VIENE CRIPTATA
                $password1 = hash('sha256', $password1);

                //AGGIORNO PASSWORD E CODICE CONFERMA
                $risultatouser = mysqli_query($mysqli, "UPDATE utenti SET password='$password1', codiceconferma = '$codiceconferma' WHERE codiceconferma = '$key' and email = '$email' ");
					
                if($risultatouser){ //SE L'UPDATE E' ANDATO A BUON FINE
                    echo 'Password cambiata con successo!';
                    header( "refresh:4;url=../login" );
                }else{ //SE SI E' VERIICATO UN ERRORE
                    echo 'Si è verificato un errore!';
                    header( "refresh:4;url=../index.php" );
                }
            }

            include '../footer.php';
        ?>
    </div><!-- CONTAINER END -->

</body>

</html>
