<?php
    /*
        Questa è solo un utility che si può utilizzare per creare blocchi
        dall'id $MIN_BLOCK all'id $MAX_BLOCK, estremi compresi!
        NB: Per far funzionare lo script bisogna essere loggati su mosaic
        con l'account avente username 'mosaic'.
        GB
    */

    $MIN_BLOCK = 0;
    $MAX_BLOCK = 0;

    include 'navbar.php';

    if(isset($_SESSION['utente']) && $_SESSION['utente']==mosaic){
        try{
            for ($i = $MIN_BLOCK; $i <= $MAX_BLOCKS; ++$i) {
                $crea_blocco = mysqli_query($mysqli, "INSERT INTO blocchi (id, proprietario, tipo, path) VALUES ('$i', 'mosaic', 'color', '#FFFFFF') ");
                $crea_annuncio_blocco = mysqli_query($mysqli, "INSERT INTO market (idblocco, price) VALUES ('$i', 10) ");
                if($crea_blocco && $crea_annuncio_blocco){
                    echo 'Creato blocco n. '.$i.' <br>';
                }else{
                    echo 'Si è verificato un errore.<br>';
                    break;
                    }
                }
        }catch(mysqli_sql_exception $exception){
            throw $exception;
        }
    }

    include 'footer.php';
?>