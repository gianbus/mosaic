<?php
    include '../config.php';

    //INIZIALIZZO I VALORI
    $richiesta_valida = 0;
    $modificato = 0;
    $err = 0;
    $proprietario = "";
    $tipo = "";
    $path = "";
    $titolo = "";
    $descrizione = "";
    $invendita = 0;
    $price = 0;
    $new_invendita = 0;

    //RECUPERO IL NOME UTENTE E L'ID BLOCCO DA MODIFICARE
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);
    $username = $_SESSION['utente'];

    //RECUPERO IL  TIPO, TITOLO E DESCRIZIONE
    $new_tipo = mysqli_real_escape_string($mysqli, $_GET['type']);
    $new_titolo = mysqli_real_escape_string($mysqli, $_POST['titolo']);
    $new_descrizione = mysqli_real_escape_string($mysqli, $_POST['descrizione']);


    //RECUPERO IL PATH IN BASE AL TIPO
    if($new_tipo == "image" && isset($_FILES["path"]["name"])){
        $new_path = mysqli_real_escape_string($mysqli, $_FILES["path"]["name"]);

    }else if($new_tipo == "video"){
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $new_path, $matches);
        $new_path = mysqli_real_escape_string($mysqli, $matches[0]);

    }else{
        $new_path = mysqli_real_escape_string($mysqli, $_POST['path']);
    }

    //DATO CHE FACCIO USO DELLA CHECKBOX DEVO VERIFICARE CHE IL BLOCCO SIA VOLUTO IN VENDITA
    if(isset($_POST['invendita'])){
        $new_invendita = 1;
        $new_price = intval(mysqli_real_escape_string($mysqli, $_POST['price']));
    }

    //CONTROLLO DATI INSERITI FORM
    if($id && $username && $new_tipo && $new_titolo && isset($_POST['invendita']))){

        //INIZIO TRANSAZIONE
        mysqli_begin_transaction($mysqli);
        try {

            //RECUPERO LE INFORMAZIONI SUL PROPRIETARIO BLOCCO
            $recupera_blocco = mysqli_query($mysqli, "SELECT * FROM blocchi WHERE id='$id' ");
            $blocco_row = mysqli_fetch_array($recupera_blocco);
            $proprietario = $blocco_row['proprietario'];

            //SE E' GIA' PRESENTE UN IMMAGINE O SE E' STATA INSERITA NEL FORM --> RICHIESTA VALIDA
            if($new_tipo == "image"){
                if($_FILES["path"]["name"] != "" || $blocco_row['tipo'] == "image"){
                    $richiesta_valida = 1;
                }
            }

            if($richiesta_valida){
                if($username == $proprietario){ //L'UTENTE E' VALIDO ED E' IL PROPRIETARIO
                    $cerca_annuncio = mysqli_query($mysqli, "SELECT * FROM market WHERE idblocco='$id'");
                    //VERIFICO L'ESISTENZA DI UN ANNUNCIO DI VENDITA PER IL BLOCCO
                    if(mysqli_num_rows($cerca_annuncio) == 1){
                        $invendita = 1;
                    }else{
                        $invendita = 0;
                    }

                    //SE IL CAMPO TIPO E' IMAGE FACCIO L'UPLOAD
                    if($new_tipo=="image"){
                        if($_FILES["path"]["name"] != ""){
                            $target_dir = "assets/uploads/";
                            $uploadReady = 1;
                            $imageExt = strtolower(pathinfo(basename($_FILES["path"]["name"]),PATHINFO_EXTENSION)); 
                            //QUESTO SARA' IL NOME DEL FILE UNA VOLTA SALVATO NELLA CARTELLA UPLOADS
                            $new_path =  $target_dir . "block-" . $id . ".". $imageExt;
                            //VERIFICO CHE L'IMMAGINE SIA EFFETTIVAMENTE UNA IMMAGINE
                            if(isset($_POST["submit"])) {
                                $checkSize = getimagesize($_FILES["path"]["tmp_name"]);
                                if($checkSize !== false) 
                                    $uploadReady = 1;
                                else 
                                    $uploadReady = 0;
                            }
                            
                            //VERIFICO GRANDEZZA IMMAGINE E IL TIPO DI ESTESIONE
                            if ($_FILES["path"]["size"] > 500000000 || ($imageExt != "jpg" && $imageExt != "png" && $imageExt != "jpeg" && $imageExt != "gif")) 
                                $uploadReady = 0;
                            
                            //VERIFICO CHE uploadReady SIA 1/0 A SECONDA DEGLI ERRORI
                            if ($uploadReady == 0){
                                $err=3;
                            
                            }else{
                                if(move_uploaded_file($_FILES["path"]["tmp_name"], '../'.$new_path)){//VERIFICO CHE IL FILE SIA CARICATO EFFETTIVAMENTE
                                    $err=0;
                                }else{
                                    $err=4;
                                }
                            }

                        }else{
                            $new_path = $blocco_row['path'];
                        }
                    }
                    //AGGIORNO I CAMPI DEL BLOCCO
                    $aggiorna_blocco = mysqli_query($mysqli, "UPDATE blocchi SET tipo='$new_tipo', path='$new_path', titolo='$new_titolo', descrizione='$new_descrizione' WHERE id='$id' and proprietario='$username' ");

                    if($aggiorna_blocco){
                        $tipo = $new_tipo;
                        $path = $new_path;
                        $titolo = $new_titolo;
                        $descrizione = $new_descrizione;
                    }

                    //AGGIORNO EVENTUALI ANNUNCI VENDITA
                    if($invendita == $new_invendita && $invendita ==1){
                        $aggiorna_prezzo_annuncio = mysqli_query($mysqli, "UPDATE market SET price='$new_price' WHERE idblocco='$id' "); 
                        $price = $new_price;
                    }elseif($invendita == 0 && $new_invendita == 1){
                        $crea_annuncio = mysqli_query($mysqli, "INSERT INTO market (idblocco,price) VALUES ('$id','$new_price') "); 
                        $invendita = 1;
                        $price = $new_price;
                    }elseif($invendita == 1 && $new_invendita == 0){
                        $elimina_annuncio = mysqli_query($mysqli, "DELETE FROM market WHERE idblocco='$id' ");
                        $invendita = 0;
                        $price = 0;
                    }
                    
                    $modificato = 1;

                }else{
                    //UTENTE NON VALIDO
                    $err = 1;
                }

                //ESEGUO LA TRANSAZIONE
                mysqli_commit($mysqli);
            
            }
        

        }catch (mysqli_sql_exception $exception) {
            mysqli_rollback($mysqli);
            
            //INIZIALIZZO I VALORI
            $richiesta_valida = 0;
            $modificato = 0;
            $tipo = "";
            $path = "";
            $titolo = "";
            $descrizione = "";
            $invendita = 0;
            $price = 0;
            $proprietario = "";
            $err=2;
            throw $exception;
        }

    }

    //err=0 nessun errore oppure richiesta non valida
    //err=1 il blocco non è tuo
    //err=2 altro errore - possibile errore di query
    //err=3 altro errore upload
    $resp = new stdClass();
    $resp->richiesta_valida = $richiesta_valida;
    $resp->modificato = $modificato;
    $resp->errore = $err;
    $resp->id= $id;
    $resp->proprietario = $proprietario;
    $resp->tipo = $tipo;
    $resp->path = $path;
    $resp->titolo= $titolo;
    $resp->descrizione = $descrizione;
    $resp->invendita = $invendita;
    $resp->price = $price;
    echo json_encode($resp);
    
    header("Location: /profile/#myblock-$id"); //A seconda di come implementiamo profile va levata o meno questa funzione

    /*STRUTTURA RISPOSTA JSON
    echo '{
            "richiesta_valida":'.$richiesta_valida.',
            "modificato":'.$modificato.',
            "errore":'.$err.', 
            "id":'.$id.',
            "proprietario":'.$proprietario.',
            "tipo":'.$tipo.',
            "path":'.$path.',
            "titolo":'.$titolo.',
            "descrizione":'.$descrizione.',
            "invendita":'.$invendita.',
            "price":'.$price.'
        }
    ';
    */

    $mysqli->close();

?>

