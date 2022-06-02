<?php
    include "../config.php";
    $recuperablocco = mysqli_query($mysqli, "SELECT id,proprietario,tipo,path,titolo,descrizione,price FROM blocchi LEFT JOIN market ON id = idBlocco   WHERE id=".$_GET["id"]);
    if($recuperablocco){
        $contablocco = mysqli_num_rows($recuperablocco);
        if($contablocco == 1){
            $row = mysqli_fetch_array($recuperablocco);
            
            $resp = new stdClass();
            $resp->proprietario = $row["proprietario"];
            $resp->tipo = $row["tipo"];
            $resp->path = $row["path"];
            $resp->titolo = $row["titolo"];
            $resp->descrizione = $row["descrizione"];
            $resp->prezzo = $row["price"];
            
            echo json_encode($resp);
            //Resa grafica della risposta json
            /*'{
                "proprietario":"'.$row["proprietario"].'", //card-footer
                "tipo":"'.$row["tipo"].'",                 //tipo 
                "path":"'.$row["path"].'",                 //container-block
                "titolo":"'.$row["titolo"].'",             //card-title
                "descrizione":"'.$row["descrizione"].'",   //card-text
                "prezzo":"'.$row["price"].'"               //placeholder-price
            }';*/
        }
    }

    $mysqli->close();
    
?>