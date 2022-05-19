<!--PAGINA CARICATA ADINAMICAMENTE CON AJAX-->
<div id="divmodificablocco">

    <?php
        include '../config.php';
        if(!isset($_SESSION['utente'])) header( "refresh:0;url=../index.php" );
        $type =  mysqli_real_escape_string($mysqli, $_GET['type']);
        $id = mysqli_real_escape_string($mysqli, $_GET['id']);
        $pathcolor = "#FFFFFF";
        $pathvideo = "";
        $pathimg = "";
        $path = "";
        $check = "";
        $prezzoattuale = "10";

        try {

            //RECUPERO LE INFORMAZIONI SUL PROPRIETARIO BLOCCO
            $recupera_blocco = mysqli_query($mysqli, "SELECT * FROM blocchi WHERE id='$id' ");
            $blocco_row = mysqli_fetch_array($recupera_blocco);
            $titolo = $blocco_row['titolo'];
            $descrizione = $blocco_row['descrizione'];
            $tipoblocco = $blocco_row['tipo'];
            
            if($tipoblocco == "color"){
                $pathcolor = $blocco_row['path'];
            }else if($tipoblocco == "video"){
                $pathvideo = "https://www.youtube.com/watch?v=".$blocco_row['path'];
            }else if($tipoblocco == "img"){
                $pathimg = $blocco_row['path'];
            }

            $recupera_market = mysqli_query($mysqli, "SELECT * FROM market WHERE idblocco='$id' ");
            $market_num = mysqli_num_rows($recupera_market);
            if($market_num == 1){
                $check = "checked";
                $market_row =  mysqli_fetch_array($recupera_market);
                $prezzoattuale = strval($market_row['price']);
            }else{
                $check = ""; 
            }

        }catch (mysqli_sql_exception $exception) {
            throw $exception;
        }
        
        echo '<!--COLONNA1 = TITOLO & DESCRIZIONE-->
              <div id = "formCol-1" class = "modifyForm-column">
                <label for="titolo" >Titolo:</label>
                <input type="text" id="titolo" name="titolo" form="modifyform-'.$id.'" placeholder="Titolo" value="'.$titolo.'" required><br>
                <label for="descrizione">Descrizione:</label>
                <textarea rows="4" cols="50" name="descrizione" form="modifyform-'.$id.'" placeholder="Descrizione">'.$descrizione.'</textarea>
              </div>';

        
    ?>


    
    <!--COLONNA2 = PATH & PREZZO-->
    <div id = "formCol-2" class = "modifyForm-column">    
        <?php

            //CAMBIO IL COMPORTAMENTO DI MODIFICA A SECONDA DELL'INPUT
            if($type == "color"){
                echo   "<form action='/mosaic/block/modify.php?id=$id&type=". $type ."' method='POST' id='modifyform-$id'></form>";
                echo       "<label>Scegli il colore:</label>
                            <input type='color' id='path' value=\"".$pathcolor."\" name='path' form='modifyform-$id' required><br><br>";
            }
            //A CAUSA DELL'UPLOAD SONO COSTRETTO A STAMPARE DUE FORM DIFFERENTI (QUESTO USA UN ENCTYPE DIFFERENTE)
            else if($type == "image"){
                echo   "<form action='/mosaic/block/modify.php?id=$id&type=". $type ."' method='POST' id='modifyform-$id' enctype='multipart/form-data'></form>";
                echo       "<label >Scegli la tua immagine:</label>
                            <input type='file' id='path' value=\"".$pathimg."\" name='path' form='modifyform-$id' required><br><br>";
            }
            else if($type == "video"){
                echo   "<form action='/mosaic/block/modify.php?id=$id&type=". $type ."' method='POST' id='modifyform-$id'></form>";
                echo       "<label>Copia il link del video su youtube:</label>
                            <input type='url' id='path' value=\"".$pathvideo."\" name='path' form='modifyform-$id' placeholder='link video' required><br><br>";
            }                      
              
        echo '<!--INIZIO INPUT SWITCH VENDITA-->                
            <label style="margin-bottom:0; display:inline" >Vuoi metterlo in vendita?</label>
            <label class="switch"  >
                <input id ="onSale-'.$id.'"" type="checkbox" name="invendita" form="modifyform-'.$id.'" '.$check.'>
                <span class="slider round"></span>
            </label>               
            <!--FINE INPUT SWITCH VENDITA-->

            <!--SCELTA DEL PREZZO MOSTRATA SOLO IN CASO DI CERTEZZA DELLA VENDITA-->
            <div id = "ifOnSale-'.$id.'"">
                <!--SWITCH-->
                <label for="price-slider-'.$id.'" style="margin:0px auto;display:inline">Prezzo:</label> 
                <span id="show-price-'.$id.'"></span>
                <input type="range" id="price-slider-'.$id.'" style="padding:0px;" name="price" min="0" max="100"  value ="'.$prezzoattuale.'" form="modifyform-'.$id.'">
                
                <!--SWITCH-->
            </div>                
            ';

        $mysqli->close();
        ?>           
    </div>      

</div>
<?php
    echo '<input id="submit-modify" type="submit" value="Modifica" form="modifyform-'.$id.'" >'
?>