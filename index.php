<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Mosaic</title>

    <!-- Bootstrap CSS -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- My CSS -->
    <link rel="stylesheet" href="css/block-grid.css" type="text/css">
    <link rel="stylesheet" href="css/navbar.css" type="text/css">
    <link rel="stylesheet" href="css/popup-page.css" type="text/css">

    <!--font-style-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <!--font-style-->

    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>
<body>
    
    <?php
      include './config.php';
    ?>
    
<!--navbar-->
    <div id="navbar">
        <div class="nav-menu nav-menu-resp ">
            <div id="logo">
                    <img style="padding:5%;" src="assets/logos/logo2.png"  >
            </div>
            <span style="flex: 2 2 auto; "></span>
            <div id="home" >
                <a  class="nav-btn" href="#" >HOME</a>
            </div>  
            
            <div id="profile" >
                <?php
                    $punti = 0;
                    if(!isset($_SESSION['utente'])){
                      echo "\t\t\t\t\t\t<a class='signup nav-btn' href='./registrazione' >_sign up</a>\n";
                      echo "\t\t\t\t\t\t<a class='login nav-btn' href='./login' >_login</a>\n";
                    }else{
                      echo "\t\t\t\t\t\t<span id='points' class=' nav-btn'>".$_SESSION['punti']."</span>\n";
                      echo "\t\t\t\t\t\t<a id='username' class=' nav-btn' href='#' >".$_SESSION['utente']."</a>\n";
                      echo "\t\t\t\t\t\t<a class='login nav-btn' href='./logout' >_logout</a>\n";
                    }
                ?> 
            </div>
        </div>
        
        
        <div id="dropup-btn">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
    </div>
<!--navbar-->
    
<!--popup-page-->
    <div id="pop-block">
        <div  class="info-pop  text-white ">
            <div class="card  h-100" >
                <a href="#" class="closebtn carad-title "  >&times;</a>
                <div class="pe-3 pb-3 ps-3 ">
                    <img class=" card-img-top " src=".."  alt="..." >
                </div>
                <div class="card-body p-3" style="height: fit-content; display: flex;flex-direction: column; " >
                    <h5 class="card-title ">Titolo di immagine a caso</h5>
                    <p class="card-text" style="flex: 2 1 0%">Card text che dura una infinità poichè non so cosa scrivere potrei prendere un lorem ipsum ma non c'ho mai voglia </p>
                    <div class = "card-market">
                        <div class="placeholder-price" style="flex: 1 2 0%">
                            <h1 id="price-block">_price</h1>
                        </div>
                        <div id="buy-if"style="flex: 2 1 0%">
                            <?php
                                if(!isset($_SESSION['utente'])){
                                    echo "\t\t\t\t\t\t<a href='./registrazione' class='not-logged signup _btn '>Sign up</a>";
                                    echo "\t\t\t\t\t\t<a href='./login' class='not-logged login _btn '>Login</a>";
                                }
                                else {
                                    echo "\t\t\t\t\t\t<button class='logged-buy  _btn '>Compra</button>";
                                }

                            ?>
                            </div>
                    </div>  
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
    </div>
<!--popup-page-->

<!--block-grid-->
    <?php
    $img="https://pixidisorg.files.wordpress.com/2019/07/dito-wuxi.jpg";
    for ($i=0; $i<12; $i=$i+1){
            echo "<div class= row-$i  >\n";
            for ($j=1; $j<=12; $j=$j+1){
                echo "\t<div class='blocco' id='block-". ($j+$i*12)."'  >\n
                      \t\t<img id=img-".($j+$i*12)." src=$img  style=\"width:100%\">\n
                      \t</div>\n";
            }
            echo "</div>\n";
        }
    ?>   
<!--block-grid-->    
    
    <?php
		  include './footer.php';
    ?>    
    
    <script src="js/navbar.js"></script>
    <script src="js/popup-page.js"></script>

    </body>
</html>