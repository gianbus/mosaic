<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mosaic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/MY_css/block-grid.css" type="text/css">
    <link rel="stylesheet" href="css/MY_css/navbar.css" type="text/css">
    <link rel="stylesheet" href="css/MY_css/popup-page.css" type="text/css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/MY_js/navbar.js"></script>
    <script src="js/MY_js/popup-page.js"></script>

    <!--font-style-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <!--font-style-->
</head>
<body>
    
    <?php
        //include 'config.php';
       /*
        $_SESSION['utente']="ER_DIMA";
        $_SESSION['punti']=1000;
        $punti = $_SESSION['punti'];
        $username = $_SESSION['utente'];
        */
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
                    if(!isset($_SESSION['utente'])){
                        echo "\t\t\t\t\t\t<a class='signup nav-btn' href='#' >_sign up</a>\n";
                        echo "\t\t\t\t\t\t<a class='login nav-btn' href='#' >_login</a>\n";
                    }
                    else {
                        echo "\t\t\t\t\t\t<span id='points' class=' nav-btn'>$punti</span>\n";
                        echo "\t\t\t\t\t\t<a id='username' class=' nav-btn' href='#' >$username</a>\n";
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
                                    echo "\t\t\t\t\t\t<button class='not-logged signup _btn '>Sign up</button>";
                                    echo "\t\t\t\t\t\t<button class='not-logged login _btn '>Login</button>";
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
                echo "\t<div id= block-". ($j+$i*12)."  >\n
                      \t\t<img id=img-".($j+$i*12)." src=$img  style=\"width:100%\">\n
                      \t</div>\n";
            }
            echo "</div>\n";
        }
    ?>   
<!--block-grid-->    
    
    <?php
		//include '../footer.php';
	?>
    
     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>