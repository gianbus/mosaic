<?php
    include '../config.php';
    $resp = new stdClass();
    if(isset($_COOKIE['utente'])){
        $recuperauser = mysqli_query($mysqli, "SELECT username,punti FROM utenti WHERE username='".$_COOKIE['utente']."' ");
        if($recuperauser){
    
            $contauser = mysqli_num_rows($recuperauser);
            if($contauser == 1){
                $sessione = mysqli_fetch_array($recuperauser);
                
                setcookie("utente", $sessione['username'], [
                    'expires' => time() + 3600,
                    'path' => '/',
                    'domain' => 'ltw-mosaic.it',
                    'secure' => true,
                    'httponly' => true,
                    'samesite' => 'Strict',
                ]);

                setcookie("punti", $sessione['punti'], [
                    'expires' => time() + 3600,
                    'path' => '/',
                    'domain' => 'ltw-mosaic.it',
                    'secure' => true,
                    'httponly' => true,
                    'samesite' => 'Strict',
                ]);

                $resp->user = $sessione["username"];
                $resp->points = $sessione["punti"];
                echo json_encode($resp);
            }
        }
    }

    $mysqli->close();
    
?>