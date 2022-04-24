<?php 

    $username="root";
    $password="";
    $database="mosaic_db";
	
    $mysqli = mysqli_connect("localhost", $username, $password, $database);
    if(false === $mysqli){
        exit("Errore: impossibile stabilire una connessione " . mysqli_connect_error());
    }

    echo "Connesso al database<br>";
    
?>