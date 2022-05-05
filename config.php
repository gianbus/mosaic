<?php 

    $username="Sql1634397";
    $password="evS2fY55e3aUUW8jHnNNuyJvDr!";
    $database="Sql1634397_1";
	
    $mysqli = mysqli_connect("89.46.111.132", $username, $password, $database);
    if(false === $mysqli){
        exit("Errore: impossibile stabilire una connessione " . mysqli_connect_error());
    }

    echo "Connesso al database<br>";
    
?>