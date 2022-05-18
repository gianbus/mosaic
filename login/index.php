<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
    <title>Mosaic |Login</title>
</head>
<body>
    <?php
        include '../navbar.php';
        if(isset($_SESSION['utente'])) header( "refresh:0;url=../index.php" );
    ?>
    <div id="container" class="container-fluid">
        
        <div id="divlogin">
            <h2>Login</h2>

            <form action="logger.php" method="POST" id="formlogin"> 

                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" placeholder="Username" required><br>

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" placeholder="Password" required><br><br>
                
                <input type="submit" value="Login" ><br>
            </form>
            <br>
            <a href="../recuperapassword/"><p>Hai dimenticato la password?</p></a>
            <p>Non hai un account? <a href="../registrazione">Sign up</a>.</p>

        </div>
    </div><!-- CONTAINER END -->

    <?php
        include '../footer.php';
    ?>
</body>
</html>