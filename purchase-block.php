<?php
    if(isset($_SESSION['utente'])){
        $recuperauser = mysqli_query($mysqli, "SELECT punti FROM utenti WHERE username=".$_SESSION['utente']."  ");
        if($recuperauser){
            $contauser = mysqli_num_rows($recuperauser);
            if($contauser == 1){
                $sessione = mysqli_fetch_array($recuperauser);
                $_SESSION['punti'] = $sessione['punti']; 
            }
        }
    }
?>

<div id='myModal' class="modal" >
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2>Modal Header</h2>
        </div>
        <div class="modal-body">
            <p>Some text in the Modal Body</p>
            <button class="buy-yes"> si</button>
            <button class="buy-no"> no</button>
        </div>
        <div class="modal-footer">
            <h3>Modal Footer</h3>
        </div>
    </div>
</div>