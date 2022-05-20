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
</head>
<body>

    <?php
        include '../navbar.php';
        if(!isset($_SESSION['utente'])) header("refresh:0;url=../index.php");
        $sql = "SELECT id,tipo,path,titolo,descrizione FROM blocchi WHERE proprietario = '".$_SESSION['utente']."' ";
        $sql_user = "SELECT nome, cognome FROM utenti WHERE username = '".$_SESSION['utente']."' ";
        
        $result = $mysqli->query($sql);
        $result_user = $mysqli->query($sql_user);
        if ($result->num_rows > 0  && $result_user->num_rows == 1 ){
            $number = $result->num_rows;

            $user_profile = $result_user->fetch_assoc();
            $nome = $user_profile["nome"];
            $cognome = $user_profile["cognome"];
            echo "<div id='profile-list' class= 'ms-3 mx-3' >";
            echo "<h3>Ciao,<b> $nome $cognome</b>.</h3>";
            echo "<h3>Attualmente possiedi: <b>$number blocchi</b> </h3>";
            for ($i=1; $i<=$number; $i=$i+1){
                $row = $result->fetch_assoc();
                $id = $row["id"];
                $type =$row["tipo"];
                $path = $row["path"];
                $title =$row["titolo"];
                $description = $row["descrizione"];
                
                
                echo "  \t<div  id='myblock-". ($id)."' class='row mt-2 mb-2 mx-0'>\n";
                    if($type=="image"){
                        echo "<div  id='myimg-". ($id)."' >\n";
                        echo "<img id=img-".($id)." src='../".$path."' >\n";
                        echo "</div>";
                    }else if($type=="color"){
                        echo "<div  id='mycolor-". ($id)."' style=\"background-color:$path\"   >\n";
                        echo "</div>";
                    }
                    else if( $type=="video"){
                        echo "<div  id='myvideo-". ($id)."' class='col-2'>\n";
                        echo "<img id=img-".($id)." src='https://img.youtube.com/vi/".$path."/default.jpg'  >\n";
                        echo "</div>";
                    }
                
                    echo "<div id='info-myblock-". ($id)."'  class='col-7'>";
                    echo "<div><b>$title</b></div><hr>";
                    echo "<div>$description</div>";
                    echo "</div>\n";
                    
                    echo "<div id='modify-myblock-". ($id)."'  class='col-2'>";
                    echo "</div>\n";

                echo "</div >\n";
                
            }
            echo "</div>";
        }
    ?>

    
   
    <?php
        include '../footer.php';
    ?>
     <script src="../js/profile.js"></script>
     <script src="../js/navbar.js"></script>
</body>
</html>