<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <title>Mosaic |Profilo</title>
    
    <!--favicons-->
    <?php
        include '../favicon.php';
    ?>
    <!--favicons-->
</head>
<body>

    <?php
        include '../navbar.php';
        if(!isset($_COOKIE['utente'])){ 
            header("location:../index.php");
            exit;
        }

        $sql = "SELECT id,tipo,path,titolo,descrizione FROM blocchi WHERE proprietario = '".$_COOKIE['utente']."' ";
        $sql_user = "SELECT nome, cognome FROM utenti WHERE username = '".$_COOKIE['utente']."' ";
        
        $result = $mysqli->query($sql);
        $result_user = $mysqli->query($sql_user);

        $user_profile = $result_user->fetch_assoc();
        $nome = $user_profile["nome"];
        $cognome = $user_profile["cognome"];
        echo "<div id='profile-list' class= 'p-3 my-container' >";
        echo "<h3>Ciao,<b> $nome $cognome</b>.</h3>";

        if ($result->num_rows > 0  && $result_user->num_rows == 1 ){
            $number = $result->num_rows;

            
            echo "<h3>Attualmente possiedi: <b>$number blocchi</b> </h3>";
            for ($i=1; $i<=$number; $i=$i+1){
                $row = $result->fetch_assoc();
                $id = $row["id"];
                $type =$row["tipo"];
                $path = $row["path"];
                $title =$row["titolo"];
                $description = $row["descrizione"];
                
                
                echo "<div  id='myblock-". ($id)."' class='row mt-2 mb-2 mx-0'>";
                    if($type=="image"){
                        echo "<div  id='myimg-". ($id)."' >";
                        echo "<img id=img-".($id)." src='../".$path."' >";
                        echo "</div>";
                    }else if($type=="color"){
                        echo "<div  id='mycolor-". ($id)."' style=\"background-color:$path\">";
                        echo "</div>";
                    }
                    else if( $type=="video"){
                        echo "<div  id='myvideo-". ($id)."' class='col-2'>";
                        echo "<img id=img-".($id)." src='https://img.youtube.com/vi/".$path."/default.jpg'>";
                        echo "</div>";
                    }
                
                    echo "<div id='info-myblock-". ($id)."'  class='col-7'>";
                    if($title==NULL) $title = "Titolo non presente";
                    if($description==NULL) $description = "Descrizione non presente";
                    
                    echo "<div><b>$title</b></div><hr>";
                    echo "<div>$description</div>";
                    echo "</div>";
                    
                    echo "<div id='modify-myblock-". ($id)."'  class='col-2'>";
                    echo "</div>";

                echo "</div >";
                
            }
            
        }else{
            echo "<h3>Attualmente non possiedi alcun blocco, <a style='color: black; text-decoration:none; fonte-weight:bold;' href='/'>inizia a comprarli!</a> </h3>";
        }
        echo "</div>";
    ?>

    
   
    <?php
        include '../footer.php';
    ?>
     <script src="../js/profile.js"></script>
     
</body>
</html>