<?php
    include 'config.php';
?>

<!--navbar-->
    <div id="navbar">
        <div class="nav-menu nav-menu-resp ">

            <div id="logo">
                <img onclick="location.href = '/';" src="https://www.ltw-mosaic.it/assets/logos/logo2.png">
            </div>

            <span style="flex: 2 2 auto; "></span>
            
            <div id="profile" >
                <?php
                    if(!isset($_SESSION['utente'])){
                        echo "<a class='signup nav-btn' href='/registrazione' >_sign up</a>";
                        echo "<a class='login nav-btn' href='/login' >_login</a>";
                    }else{
                        echo "<span id='points' class=' nav-btn'>".$_SESSION['punti']." <i class=\"fa fa-money\" aria-hidden=\"true\"></i></span>";
                        echo "<a id='logged-username' class=' nav-btn' href='/profile'>".$_SESSION['utente']."</a>";
                        echo "<a class='login nav-btn' href='/logout' >_logout</a>";
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
