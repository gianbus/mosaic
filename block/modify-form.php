       
        <br>
        <div id="divmodificablocco">
            
            <div id = "formCol-1" class = "modifyForm-column">
                <label for="titolo" >Titolo:</label>
                    <input type="text" id="titolo" name="titolo" form="modifyform" placeholder="Titolo" required><br>
                    
                    <label sfor="descrizione">Descrizione:</label>
                    <textarea rows="4" cols="50" name="descrizione" form="modifyform" placeholder="Descrizione"></textarea><br>
            </div>
            <div id = "formCol-2" class = "modifyForm-column">    
                <?php
                    include '../config.php';
                    if(!isset($_SESSION['utente'])) header( "refresh:0;url=../index.php" );
                    $type = $_GET['type'];
                    $id = $_GET['id'];
                    //CAMBIO IL COMPORTAMENTO DI MODIFICA A SECONDA DELL'INPUT
                     
                    if($type == "color"){
                        echo   "<form action='modify.php?id=1&type=". $type ."' method='POST' id='modifyform'></form>";
                        echo       "<label style=' display:inline'>Scegli il colore:</label>
                                    <input type='color' id='path' name='path' form='modifyform' required><br><br>";
                    }
                    //A CAUSA DELL'UPLOAD SONO COSTRETTO A STAMPARE DUE FORM DIFFERENTI
                    else if($type == "image"){

                        echo   "<form action='modify.php?id=$id&type=". $type ."' method='POST' id='modifyform' enctype='multipart/form-data'></form>";
                        echo       "<label >Scegli la tua immagine:</label>
                                    <input type='file' id='path' name='path' form='modifyform' required><br><br>";
                    }
                    
                ?>
                                
                <!--INIZIO INPUT SWITCH VENDITA-->
                
                <label style="margin-bottom:0; display:inline" >Vuoi metterlo in vendita?</label>
                <label class="switch"  >
                    <input id ="onSale" type="checkbox" name="invendita" form="modifyform"  checked>
                    <span class="slider round"></span>
                </label>
                
                <!--FINE INPUT SWITCH VENDITA-->

                <!--SCELTA DEL PREZZO MOSTRATA SOLO IN CASO DI CERTEZZA DELLA VENDITA-->
                <div id = "ifOnSale">
                    <label for="price-slider" style="margin:0px auto;">Prezzo:</label>
                        
                    <input type="range" id="price-slider" style="padding:0px;" name="price" min="0" max="100"  value ="10" form="modifyform">
                    <span id="show-price"></span>
                </div>
                
                <br>
                
            </div>
            
        </div>
        <input type="submit" value="Modifica" form="modifyform" ><br><br><br>