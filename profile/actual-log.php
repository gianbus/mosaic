<?php
    include '../config.php';
    $resp = new stdClass();
    if(isset($_SESSION['utente'])){
        $recuperauser = mysqli_query($mysqli, "SELECT username,punti FROM utenti WHERE username='".$_SESSION['utente']."' ");
        if($recuperauser){
    
            $contauser = mysqli_num_rows($recuperauser);
            if($contauser == 1){
                $sessione = mysqli_fetch_array($recuperauser);
                $_SESSION['punti'] = $sessione['punti']; 
                $resp->user = $sessione["username"];
                $resp->points = $sessione["punti"];
                echo json_encode($resp);
            }
        }
    }

    $mysqli->close();
    
?>