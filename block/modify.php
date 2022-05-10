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

    //RECUPERO IL NOME UTENTE E L'ID BLOCCO DA MODIFICARE
    $username = $_SESSION['utente'];
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);

    //RECUPERO I VALORI DEL FORM
    $new_tipo = mysqli_real_escape_string($mysqli, $_POST['tipo']);
    $new_path = mysqli_real_escape_string($mysqli, $_POST['path']);
    $new_titolo = mysqli_real_escape_string($mysqli, $_POST['titolo']);
    $new_descrizione = mysqli_real_escape_string($mysqli, $_POST['descrizione']);

    $new_invendita = intval(mysqli_real_escape_string($mysqli, $_POST['invendita']));
    $new_price = intval(mysqli_real_escape_string($mysqli, $_POST['price']));

    //SE LE VARIABILI SONO PRESENTI
    if($id && $username){
        $richiesta_valida = 1;
        //INIZIO TRANSAZIONE
        mysqli_begin_transaction($mysqli);

        try {

            //RECUPERO LE INFORMAZIONI SUL PROPRIETARIO BLOCCO
            $recupera_blocco = mysqli_query($mysqli, "SELECT * FROM blocchi WHERE id='$id' ");
            $blocco_row = mysqli_fetch_array($recupera_blocco);
            $proprietario = $blocco_row['proprietario'];

            if($username == $proprietario){ //L'UTENTE E' VALIDO ED E' IL PROPRIETARIO
                $cerca_annuncio = mysqli_query($mysqli, "SELECT * FROM market WHERE idblocco='$id'");
                //VERIFICO L'ESISTENZA DI UN ANNUNCIO DI VENDITA PER IL BLOCCO
                if(mysqli_num_rows($cerca_annuncio) == 1){
                    $invendita = 1;
                }else{
                    $invendita = 0;
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
                }elseif($invendita == 0 && $new_invendita == 1){
                    $crea_annuncio = mysqli_query($mysqli, "INSERT INTO market (idblocco,price) VALUES ('$id','$new_price') "); 
                    $invendita = 1;
                }elseif($invendita == 1 && $new_invendita == 0){
                    $elimina_annuncio = mysqli_query($mysqli, "DELETE FROM market WHERE idblocco='$id' ");
                    $invendita = 0;
                }

                $modificato = 1;

            }else{
                //UTENTE NON VALIDO
                $err = 1;
            }
        
            //ESEGUO LA TRANSAZIONE
            mysqli_commit($mysqli);

        } catch (mysqli_sql_exception $exception) {
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

    include '../footer.php';

?>

