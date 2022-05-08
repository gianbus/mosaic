<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
    <title>Mosaic |Profilo</title>
</head>
<body>

    <?php
        include '../config.php';
        include '../navbar.php';
        if(!isset($_SESSION['utente'])) header("refresh:1;url=../index.php");
    ?>

    <div id="container" class="container-fluid">

        <div id="divprofilo">
            

        </div>
            
    </div><!-- CONTAINER END -->

    <?php
        include '../footer.php';
    ?>

</body>
</html>