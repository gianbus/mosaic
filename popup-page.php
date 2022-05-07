<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/MY_css/block-grid.css" type="text/css">
    <link rel="stylesheet" href="css/MY_css/popup-page.css" type="text/css">
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/MY_js/navbar.js"></script>
    <script src="js/MY_js/popup-page-cp.js"></script>
    
    
</head>
<body>

    <?php
        //include 'config.php';
       
        $_SESSION['utente']="ER_DIMA";
        $_SESSION['punti']=1000;
        $punti = $_SESSION['punti'];
        $username = $_SESSION['utente'];
        
    ?>
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

  <div class="row-1">
    <div id= block-1 >
        <img id=img-1 src="assets/grid/block-1.jpg"  style="width:100%">
    </div>
    <div id= block-2 >
        <img id=img-1 src="data:image/jpeg;base64,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"  style="width:100%">
    </div>
    <div id= block-3 >
        <img id=img-1 src="https://pixidisorg.files.wordpress.com/2019/07/dito-wuxi.jpg"  style="width:100%">
    </div>
    <div id= block-4 >
        <img id=img-1 src="https://pixidisorg.files.wordpress.com/2019/07/dito-wuxi.jpg"  style="width:100%">
    </div>
    <div id= block-5 >
        <img id=img-1 src="https://pixidisorg.files.wordpress.com/2019/07/dito-wuxi.jpg"  style="width:100%">
    </div>
    <div id= block-6 >
        <img id=img-1 src="https://pixidisorg.files.wordpress.com/2019/07/dito-wuxi.jpg"  style="width:100%">
    </div>
  </div>
  
</body>
</html> 