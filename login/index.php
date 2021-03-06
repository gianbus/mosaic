<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">

    <title>Mosaic |Login</title>
    
    <!--favicons-->
    <?php
        include '../favicon.php';
    ?>
    <!--favicons-->
</head>
<body>
    <?php
        include '../navbar.php';
        if(isset($_COOKIE['utente'])) header( "refresh:0;url=../index.php" );
    ?>
    <div id="containerlogin" class="my-container container-fluid form-bg">
        <div id="err-div"></div><br> 
        <div id="divlogin" class="mosaic-form">

            <h2>Login</h2>
            <form action="logger.php" method="POST" id="formlogin"> 

                <label for="username">Username:</label><br>
                <input type="text" id="username" class="mosaic-input" name="username" placeholder="Username" required><br>

                <label for="password">Password:</label><br>
                <input type="password" class="mosaic-input" id="password" name="password" placeholder="Password" required><br>
                
                <input type="submit" class="mosaic-submit" value="Login" ><br>
            </form>
            <br>
            <a href="../recuperapassword/"><p>Hai dimenticato la password?</p></a>
            <p>Non hai un account? <a href="../registrazione">Sign up</a>.</p>

        </div>
    </div><!-- CONTAINER END -->

    <?php
        include '../footer.php';
    ?>
    <script>
            document.forms["formlogin"].addEventListener("submit", async (event) => {
                event.preventDefault();
                const resp = await fetch(event.target.action, {
                    method: "POST",
                    body: new URLSearchParams(new FormData(event.target)),
                });

                const body = await resp.json();
                let err = body.err;
                let mess = body.mess;
                if(err!=0){
                    $("#err-div").html(mess);
                    $("#err-div").show();
                }else{
                    location.replace("/");
                }

            });
    </script>

</body>
</html>