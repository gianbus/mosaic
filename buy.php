<?php
    include './config.php'
    //RECUPERO IL NOME UTENTE E L'ID BLOCCO
    $username = $_SESSION['username'];
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);

    //SE LE VARIABILI SONO PRESENTI
    if($id && $username){

        /* Start transaction */
        mysqli_begin_transaction($mysqli);

        try {

            //RECUPERO LE INFORMAZIONI UTENTE
            $recuperauser = mysqli_query($mysqli, "SELECT * FROM utenti WHERE username='$username' ");
            $recuperablocco = mysqli_query($mysqli, "SELECT * FROM market WHERE idblocco='$id' ");
            
            //VERIFICO CHE IL BLOCCO SIA IN VENDITA E L'UTENTE VALIDO
            $numrowuser = mysqli_num_rows($recuperauser);
            $numrowblocco = mysqli_num_rows($recuperablocco);
            if($numrowblocco == 1 && $numrowuser==1){ //IL BLOCCO E' IN VENDITA E L'UTENTE E' VALIDO
                $userrow = mysqli_fetch_array($recuperauser);
                $bloccorow = mysqli_fetch_array($recuperablocco);
                    
                $saldoattuale = userrow['punti'];
                $prezzoblocco = bloccorow['price'];
                if($saldoattuale >= $prezzoblocco){
                    $saldoaggiornato = $saldoattuale - $prezzoblocco;
                    $aggiornautente = mysqli_query($mysqli, "UPDATE utenti SET punti = '$saldoaggiornato' WHERE username = '$username' ");
                    $aggiornablocchi = mysqli_query($mysqli, "UPDATE blocchi SET proprietario = '$username' WHERE id = '$id' ");
                    $eliminavendita = mysqli_query($mysqli, "DELETE FROM market WHERE idblocco = '$id' ");
                    echo 'vendita effettuata';
                }else{
                    echo 'saldo non sufficiente';
                }
            }  
        
            //ESEGUO LA TRANSAZIONE
            mysqli_commit($mysqli);

        } catch (mysqli_sql_exception $exception) {
            mysqli_rollback($mysqli);
            throw $exception;
        }
        



    }else{ //RICHIESTA NON VALIDA
        echo '
        
        ';
    }



?>

