<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
    <title>Mosaic |Recupera Password</title>
</head>
<body>
    <div id="container" class="container-fluid">
        <h1>M O S A I C</h1>

            <div id="divrecuperapassword">
                <h2>Recupera password</h2>
                <?php
                    include '../config.php';
                    if(isset($_SESSION['utente'])) header( "refresh:0;url=../index.php" );
                ?>
                
                <form action="verificarecupera.php" method="POST" id="formrecuperapassword"> 
                    <label for="email">Email inserita in fase di registrazione:</label><br>
                    <input type="email" id="email" name="email" placeholder="email" required><br><br>
                    <input type="submit" value="Recupera!" ><br>
                </form>
                <a href="../login/"><p>Ti sei ricordato la password?</p></a>
            </div>

    </div><!-- CONTAINER END -->

    <?php
        include '../footer.php';
    ?>

</body>
</html>