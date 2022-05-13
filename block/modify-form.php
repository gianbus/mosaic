        
        <div id="divmodificablocco">
            <h2>Modifica Blocco</h2>

            <label for="titolo">Titolo:</label><br>
                <input type="text" id="titolo" name="titolo" form="modifyform" placeholder="Titolo" required><br>
                
                <label style="display:inline;" for="descrizione">Descrizione:</label><br>
                <textarea rows="4" cols="50" name="descrizione" form="modifyform" placeholder="Descrizione"></textarea><br>
            <?php
                include '../config.php';
                if(!isset($_SESSION['utente'])) header( "refresh:0;url=../index.php" );
                $type = $_GET['type'];
            

                echo "<form action='modify.php?id=1&type=". $type ."' method='POST' id='modifyform'></form>"; 
                if($type == "color"){
                    echo   "<label for='path'>Scegli il colore:</label><br>
                            <input type='color' id='path' name='path' form='modifyform' required><br>";
                }
            ?>
                            
            <!--INIZIO INPUT RADIO VENDITA-->
            <fieldset>
                <legend style="margin-bottom:0; font-size:2em;" >Vuoi metterlo in vendita?:</legend>
                <div>
                <input form="modifyform" type="radio" id="invendita-radio" name="invendita" value="1" >
                <label style="display:inline;" for="invendita-radio">Si</label>
                </div>

                <div>
                <input form="modifyform" type="radio" id="noninvendita-radio" name="invendita" value="0" checked>
                <label style="display:inline;" for="noninvendita-radio">No</label>
                </div>
            </fieldset> 
            <!--FINE INPUT RADIO VENDITA-->

            <br>

            <label for="price-slider">Prezzo:</label><br>
            <input type="range" id="price-slider" name="price" min="0" max="100"  value ="10" form="modifyform">
            <span id="show-price">--</span>

            <input type="submit" value="Modifica" form="modifyform" ><br><br><br>

        </div>
        