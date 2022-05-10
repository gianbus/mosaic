<!--navbar-->
    <div id="navbar">
        <div class="nav-menu nav-menu-resp ">
            <div id="logo">
                <img style="padding:5%;" src="/mosaic/assets/logos/logo2.png">
            </div>
            <span style="flex: 2 2 auto; "></span>
            <div id="home" >
                <a  class="nav-btn" href="/" >HOME</a>
            </div>  
            
            <div id="profile" >
                <?php
                    //ai fini dei test in locale sono stati cambiati i valori di href nei tag a con /mosaic/...
                    if(!isset($_SESSION['utente'])){
                      echo "\t\t\t\t\t\t<a class='signup nav-btn' href='/mosaic/registrazione' >_sign up</a>\n";
                      echo "\t\t\t\t\t\t<a class='login nav-btn' href='/mosaic/login' >_login</a>\n";
                    }else{
                      echo "\t\t\t\t\t\t<span id='points' class=' nav-btn'>".$_SESSION['punti']."</span>\n";
                      echo "\t\t\t\t\t\t<a id='logged-username' class=' nav-btn' href='/mosaic/profile' >".$_SESSION['utente']."</a>\n";
                      echo "\t\t\t\t\t\t<a class='login nav-btn' href='/mosaic/logout' >_logout</a>\n";
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
