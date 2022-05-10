<?php
    include './config.php';

    if(isset($_SESSION['utente']) && $_SESSION['utente']==mosaic){
        try{
            for ($i = 1; $i <= 144; ++$i) {
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

    include './footer.php';
?>