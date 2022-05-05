<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Mosaic |Modifica password</title>
</head>
<body>
    <div id="container" class="container-fluid">
    <h1>M O S A I C</h1>
    <?php
            include '../config.php';
            $key = mysqli_real_escape_string($mysqli, $_GET['key']);
            $email = mysqli_real_escape_string($mysqli, $_GET['email']);
            if(!$key || !$email){
              echo 'Link non valido';
              header( "refresh:2;url=../index.php" );	
            }else{
                $risultatouser = mysqli_query($mysqli, "SELECT * FROM utenti WHERE codiceconferma = '$key' and email='$email'");
					
                if($risultatouser){
                
                    $contauser = mysqli_num_rows($risultatouser);
                    
                    if($contauser == 1){ 
                        echo '<form action="cambiopassword.php" method="POST" id="formcambiopassword"> 
                        
                        <label for="password1">Crea una nuova password:</label><br>
                        <input type="password" id="password1" name="password1" placeholder="Password" required><br>
                        
                        <label for="password2">Conferma la nuova password:</label><br>
                        <input type="password" id="password2" name="password2" placeholder="Ripeti Password" required><br><br>
                        
                        <input type="submit" value="Cambia Password" >
                    
                    </form>';
                    }else{
                        echo 'Il link per cambiare password è scaduto.';
                        header( "refresh:5;url=index.php" );

                    }

                }else{
                    echo 'Si è verificato un errore!';
                }
            }


            include '../footer.php';
        ?>
    </div><!-- CONTAINER END -->

     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>