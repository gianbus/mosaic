<?php
    include 'config.php';
?>

<!--container navbar-->
<div id="navbar">
    <!--navbar-->
    <div class="nav-menu nav-menu-resp ">
        <div id="logo">
            <img onclick="location.href = '/';" src="/assets/logos/logo2.png">
        </div>

        <span style="flex: 2 2 auto; "></span>
        
        <div id="profile" >
            <?php
                if(!isset($_COOKIE['utente'])){
                    echo "<a class='signup nav-btn' href='/registrazione' >_sign up</a>";
                    echo "<a class='login nav-btn' href='/login' >_login</a>";
                }else{
                    echo "<span id='points' class='nav-btn'>".$_COOKIE['punti']." <i class=\"fa fa-money\" aria-hidden=\"true\"></i></span>";
                    echo "<a id='logged-username' class='nav-btn' href='/profile'>".$_COOKIE['utente']."</a>";
                    echo "<a class='login nav-btn' href='/logout' >_logout</a>";
                }
            ?> 
        </div>
    </div>
    <!--navbar-->

    <!--bottone per aprire navbar da cellulare-->
    <div id="dropup-btn">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    <!--fine bottone-->

</div>
<!--fine container navbar-->

