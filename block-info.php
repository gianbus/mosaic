<?php
    include "config.php";
    $recuperauser = mysqli_query($mysqli, "SELECT id,proprietario,tipo,path,titolo,descrizione,price FROM blocchi LEFT JOIN market ON id = idBlocco   WHERE id=".$_GET["id"]);
    if($recuperauser){
        $contauser = mysqli_num_rows($recuperauser);
        if($contauser == 1){
            $row = mysqli_fetch_array($recuperauser);
            
            echo 
            '{
                "proprietario":"'.$row["proprietario"].'",
                "tipo":"'.$row["tipo"].'",
                "path":"'.$row["path"].'",
                "titolo":"'.$row["titolo"].'",
                "descrizione":"'.$row["descrizione"].'",
                "prezzo":"'.$row["price"].'"
            }';
        }
    }
    
?>