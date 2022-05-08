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
        include '../navbar.php';
    ?>

    <div id="container" class="container-fluid">

        <div id="divprofilo">
            
            <?php
                include '../config.php';
                if(!isset($_SESSION['utente'])) header("refresh:0;url=../index.php");
            ?>
            
    </div><!-- CONTAINER END -->

    <?php
        include '../footer.php';
    ?>

    <script src="../js/verifica-campi-inseriti.js"></script>
</body>
</html>