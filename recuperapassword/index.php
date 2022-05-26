<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--MY CSS-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/recover-pw.css">
    <!--MY CSS-->
    
    <title>Mosaic |Recupera Password</title>

    <!--favicons-->
    <?php
        include '../favicon.php';
    ?>
    <!--favicons-->
</head>
<body>
    <?php
        include '../navbar.php';
    ?>
    <div id="container" class="my-container container-fluid " >
            <div id="divrecuperapassword">
                <h2>Recupera Password</h2><br>
                <form action="verificarecupera.php" method="POST" id="formrecuperapassword"> 
                    <label for="email">Email inserita in fase di registrazione:</label><br>
                    <input type="text" id="email" name="email" placeholder="email" required><br><br>
                    <input type="submit" value="Recupera!" ><br><br>
                </form>
                <a href="../login/"><p>Ti sei ricordato la password?</p></a>
            </div>

    </div><!-- CONTAINER END -->

    <?php
        include '../footer.php';
    ?>
</body>
</html>