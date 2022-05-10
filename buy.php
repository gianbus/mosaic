<?php
    include './config.php';
    //RECUPERO IL NOME UTENTE E L'ID BLOCCO
    $username = $_SESSION['utente'];
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);
    $richiesta_valida = false;
    $comprato = false;
    $err = 0;
    $seller_username = "";
    $nuovo_saldo_buyer = 0;

    //SE LE VARIABILI SONO PRESENTI
    if($id && $username){
        $richiesta_valida = true;
        //INIZIO TRANSAZIONE
        mysqli_begin_transaction($mysqli);

        try {

            //RECUPERO LE INFORMAZIONI UTENTE
            $recupera_buyer = mysqli_query($mysqli, "SELECT * FROM utenti WHERE username='$username' ");
            $recupera_annuncio = mysqli_query($mysqli, "SELECT * FROM market WHERE idblocco='$id' ");
            
            //VERIFICO CHE IL BLOCCO SIA IN VENDITA E L'UTENTE VALIDO
            $num_row_user = mysqli_num_rows($recupera_buyer);
            $num_row_blocco = mysqli_num_rows($recupera_annuncio);

            if($num_row_blocco == 1 && $num_row_user == 1){ //IL BLOCCO E' IN VENDITA E L'UTENTE E' VALIDO

                //RECUPERO LE INFORMAZIONI DELL'ACQUIRENTE E DELL'ANNUNCIO
                $buyer_row = mysqli_fetch_array($recupera_buyer);
                $annuncio_row = mysqli_fetch_array($recupera_annuncio);
                
                //MEMORIZZO IL PREZZO DALL'ANUNCIO
                $prezzo = $annuncio_row['price'];

                //RECUPERO DATI PROPRIETARIO
                $recupera_blocco = mysqli_query($mysqli, "SELECT * FROM blocchi WHERE id='$id' ");
                $blocco_row = mysqli_fetch_array($recupera_blocco);

                $seller_username = $blocco_row['proprietario'];
                $recupera_seller = mysqli_query($mysqli, "SELECT * FROM utenti WHERE username='$seller_username' ");
                $seller_row = mysqli_fetch_array($recupera_seller);

                //CALCOLO I SALDI DOPO L'EVENTUALE TRANSAZIONE
                $nuovo_saldo_buyer = $buyer_row['punti'] - $prezzo;
                $nuovo_saldo_seller = $seller_row['punti'] + $prezzo;

                if($username != $seller_username){
                    if($nuovo_saldo_buyer >= 0){
                        $_SESSION['punti'] = $nuovo_saldo_buyer;
                        $aggiorna_saldo_buyer = mysqli_query($mysqli, "UPDATE utenti SET punti = '$nuovo_saldo_buyer' WHERE username = '$username' ");
                        $aggiorna_saldo_seller = mysqli_query($mysqli, "UPDATE utenti SET punti = '$nuovo_saldo_seller' WHERE username = '$seller_username' ");
                        $aggiorna_blocco = mysqli_query($mysqli, "UPDATE blocchi SET proprietario = '$username' WHERE id = '$id' ");
                        $elimina_annuncio = mysqli_query($mysqli, "DELETE FROM market WHERE idblocco = '$id' ");
                        $comprato = true;

                    }else{
                        //SALDO NON SUFFICIENTE
                        $err=1;
                    }

                }else{
                    //IL BLOCCO E' GIA' DELL'ACQUIRENTE
                    $err=3;
                }

            }else{
                //BLOCCO NON IN VENDITA
                $err = 2;
            }
        
            //ESEGUO LA TRANSAZIONE
            mysqli_commit($mysqli);

        } catch (mysqli_sql_exception $exception) {
            mysqli_rollback($mysqli);
            $comprato = false;
            $err=4;
            throw $exception;
        }

    }

    //err=0 nessun errore oppure richiesta non valida
    //err=1 fondi insufficienti
    //err=2 blocco non in vendita
    //err=3 il blocco è già dell'acquirente
    //err=4 altro errore
    echo '{
            "richiesta_valida":'.$richiesta_valida.',
            "comprato":'.$comprato.',
            "errore":'.$err.', 
            "idblocco":'.$id.',
            "acquirente":.'$username'.,
            "venditore":.'$seller_username.',
            "nuovo_saldo_acquirente":'.$nuovo_saldo_buyer.'
        }
    ';

    include './footer.php';



?>

