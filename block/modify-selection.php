<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/modify.css" type="text/css">
    
    <title>Mosaic |Modifica Blocco</title>

</head>
<body>
    <?php
        include '../config.php';
        include '../navbar.php';
        if(!isset($_SESSION['utente'])) header( "refresh:0;url=../index.php" );
        $id = $_GET["id"];
        echo $id;
    ?>
    <!--SCELGO IL TIPO DI CONTENUTO CHE VOGLIO CARICARE-->
    <div id="container" class="container-fluid"> 
        <h2 style="padding-top:1vw;">Modifica Blocco</h2>
        <div id = "modify-form">
            <label for="chosen-content" style="display:inline">Scegli il contenuto del blocco:</label>
            <select name="chosen-content" id="chosen-content" >
                <option selected disabled value="none">None</option>
                <option value="image">Immagine/GIF</option>
                <option value="color">Colore</option>
                <option value="video">Video su Yt</option>
            </select>
        </div>    
        <div id = "modify-selected"></div>
    </div>


    <?php
        include '../footer.php';
    ?>
    <script src="../js/navbar.js"></script>
    <script src="../js/modify-block.js"></script>
</body>