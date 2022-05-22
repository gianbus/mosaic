<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Mosaic</title>

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- My CSS -->
    <link rel="stylesheet" href="css/block-grid.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/popup-page.css" type="text/css">

    <!--icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--icons-->

    <!--favicons-->
    <?php
        include 'favicon.php';
    ?>
    <!--favicons-->
    
</head>

<body>
    
    <?php
      include 'navbar.php';
    ?>
    
    
    <!--popup-page-->
    <div id="pop-block">
        <div  class="info-pop  text-white ">
            <div class="card  h-100" >
                <span  class="closebtn carad-title "  >&times;</span>
                <div id="container-block" class="pe-3 pb-3 ps-3 "></div>
                <div class="card-body p-3"  >
                    <h5 class="card-title ">Titolo fac-simile</h5>
                    <p class="card-text" style="flex: 2 1 0%">Fac-simile </p>
                    <div class = "card-market">
                        <div class="placeholder-price" style="flex: 1 2 0%">
                            <h1 id="price-block">10</h1>
                        </div>
                        <div id="buy-if"style="flex: 2 1 0%">
                            <?php
                                if(!isset($_SESSION['utente'])){
                                    echo "<a href='./registrazione' class='not-logged signup _btn '>Sign up</a>";
                                    echo "<a href='./login' class='not-logged login _btn '>Login</a>";
                                }else{
                                    echo "<a href ='#' class='logged'>Compra</a>";
                                }
                            ?>
                        </div>
                    </div>  
                </div>
                <div class="card-footer">
                  <small class="text-muted"></small>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_SESSION['utente'])) 
            include "purchase-block.php";
    ?>
    <!--popup-page-->

    <!--block-grid-->
    <div id="grid">
        <?php
            $logged_username ="";
            if(isset($_SESSION['utente'])) $logged_username = $_SESSION['utente'];

            $sql = "SELECT id,tipo,path,proprietario FROM blocchi";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0){
                
                for ($i=0; $i<12; $i=$i+1){
                        echo "<div class= row-$i  >";
                        for ($j=1; $j<=12; $j=$j+1){
                            $row = $result->fetch_assoc();
                            
                            //VISIONE PERSONALIZZATA BLOCCO DAL PROPRIETARIO
                            $owner_class = "";
                            if($logged_username == $row['proprietario']){
                                $owner_class = " owner_block";
                            }

                            $type =$row["tipo"];
                            $path = $row["path"];
                            if($type=="image"){
                                echo "<div class='blocco".$owner_class."' id='block-". ($j+$i*12)."'>";
                                echo "<img id=img-".($j+$i*12)." src='".$path."'>";
                            }else if($type=="color"){
                                echo "<div class='blocco".$owner_class."' id='block-". ($j+$i*12)."'>";
                                echo "<div id='color-". ($j+$i*12)."' style=\"background-color:$path\"></div>";
                            }
                            else if( $type=="video"){
                                echo "<div class='blocco".$owner_class."' id='block-". ($j+$i*12)."'>";
                                echo "<img id=img-".($j+$i*12)." src='https://img.youtube.com/vi/".$path."/default.jpg'>";
                            }
                            echo "</div>";
                        }
                        echo "</div>";
                }
            }
        ?>
    </div>
    <!--block-grid-->    

    <!--Fare pulsantino per mettere la visione del mosaico senza bordi-->
    
    <?php
		  include 'footer.php';
    ?>    
    
    <script src="js/popup-page.js"></script>

    </body>
</html>