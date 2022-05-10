<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
    <title>Mosaic |Modifica Blocco</title>

</head>
<body>
    <?php
        include '../navbar.php';
    ?>
    <div id="container" class="container-fluid">
        
        <div id="divmodificablocco">
            <h2>Modifica Blocco</h2>
            <?php
                include '../config.php';
                if(!isset($_SESSION['utente'])) header( "refresh:0;url=../index.php" );
            ?>

            <form action="modify.php?id=33" method="POST" id="modifyform"> 

                <fieldset> <!--INIZIO INPUT RADIO TIPO-->
                    
                    <legend style="margin-bottom:0; font-size:2em;" >Seleziona tipo blocco:</legend>

                    <div>
                    <input type="radio" id="color-radio" name="tipo" value="color" checked>
                    <label style="display:inline;" for="color-radio">Colore</label>
                    </div>

                    <div>
                    <input type="radio" id="image-radio" name="tipo" value="image">
                    <label style="display:inline;" for="image-radio">Immagine</label>
                    </div>

                    <div>
                    <input type="radio" id="video-radio" name="tipo" value="video">
                    <label style="display:inline;" for="video-radio">Video</label>
                    </div>
                
                </fieldset> <!--FINE INPUT RADIO TIPO-->
                <br>

                <label for="path">Path:</label><br>
                <input type="text" id="path" name="path" placeholder="Path" required><br>

                <label for="titolo">Titolo:</label><br>
                <input type="text" id="titolo" name="titolo" placeholder="Titolo" required><br>

            </form>

            <label style="display:inline;" for="descrizione">Descrizione:</label><br>
            <textarea rows="4" cols="50" name="descrizione" form="modifyform" placeholder="Descrizione"></textarea><br>

            <fieldset> <!--INIZIO INPUT RADIO VENDITA-->
                    
                    <legend style="margin-bottom:0; font-size:2em;" >Vuoi metterlo in vendita?:</legend>

                    <div>
                    <input form="modifyform" type="radio" id="invendita-radio" name="invendita" value="1" >
                    <label style="display:inline;" for="invendita-radio">Si</label>
                    </div>

                    <div>
                    <input form="modifyform" type="radio" id="noninvendita-radio" name="invendita" value="0" checked>
                    <label style="display:inline;" for="noninvendita-radio">No</label>
                    </div>
                
            </fieldset> <!--FINE INPUT RADIO VENDITA-->

            <br>

            <label for="price">Prezzo:</label><br>
            <input type="text" id="price" name="price" placeholder="price" form="modifyform"><br><br>



            <input type="submit" value="Modifica" form="modifyform" ><br><br><br>
        </div>
    </div><!-- CONTAINER END -->

    <?php
        include '../footer.php';
    ?>
</body>
</html>