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

<div id='purchase-confirm'  >
    <div class="confirm-content" >
        <div class="confirm-header">
            Desidera compiere l'acquisto del seguente blocco?
        </div>
        <div class="confirm-body">
            <span>Some text in the confirm Body</span>
            <div>
                <button class="buy-yes _btn"> si</button>
                <button class="buy-no _btn"> no</button>
            </div>
        </div>
    </div>
</div>