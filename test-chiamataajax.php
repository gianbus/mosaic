<?php
    session_start();
    $_SESSION['test'] = 'riccardoèmoltoalto';

?>
<body id="body">
    <script>

        function loadDoc() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("body").innerHTML = this.responseText;
        }
        xhttp.open("GET", "test-rispostaajax.php", true);
        xhttp.send();
        }

        loadDoc();
    </script>
</body>