<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Mosaic |Modifica password</title>
</head>
<body>
    <div id="container" class="container-fluid">
    <h1>M O S A I C</h1>
    <?php
            include '../config.php';

            $codiceconferma = md5(uniqid(rand()));
            $key = mysqli_real_escape_string($mysqli, $_GET['key']);
            $email = mysqli_real_escape_string($mysqli, $_GET['email']);
            $password1 = mysqli_real_escape_string($mysqli, $_POST['password1']);
            $password2 = mysqli_real_escape_string($mysqli, $_POST['password2']);

            if($password1=="" || $password2 == ""){
                echo 'Devi riempire tutti i campi!';
            }else if($password1 != $password2){
                echo 'Le password devono coincidere!';
            }else if(!$key || !$email){
              echo 'Link non valido';
              header( "refresh:2;url=../index.php" );	
            }else{

                $risultatouser = mysqli_query($mysqli, "UPDATE utenti SET password='$password1', codiceconferma = '$codiceconferma' WHERE codiceconferma = '$key' and email = '$email' ");
					
                if($risultatouser){
                
                    echo 'Password cambiata con successo!';

                }else{
                    echo 'Si è verificato un errore!';
                }
            }


            include '../footer.php';
        ?>
    </div><!-- CONTAINER END -->

</body>
</html>