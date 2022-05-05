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
    
</head>
<body>
    
    <?php
		//include 'config.php';
	?>
    
    
    <!--navbar-->
    <div id="navbar">
        <div class="nav-menu nav-menu-resp ">
            <div id="logo">
                    <img  src="https://pixidisorg.files.wordpress.com/2019/07/dito-wuxi.jpg"  >
                    
            </div>
            <span style="flex: 2 2 auto; "></span>
            <div class="nav-btn" id="home" >
                <a   href="#" >_home</a>
            </div>  
            
            <div id="profile" >
                <a class="signup nav-btn" href="#" >_sign up</a>
                <a class="login nav-btn" href="#" >_login</a>
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
                            <button class="not-logged signup _btn ">Sign up</button>
                            <button class="not-logged login _btn ">Login</button>
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
    
    
    <?php
		//include '../footer.php';
	?>
    
     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>