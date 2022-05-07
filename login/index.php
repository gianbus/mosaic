<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Mosaic |Login</title>
</head>
<body>
    <div id="container" class="container-fluid">
        <h1>M O S A I C</h1>
        
        <div id="divlogin">
            <h2>Login</h2>
            <?php
            
                include '../config.php';
                if(isset($_SESSION['utente'])) header( "refresh:0;url=../index.php" );
                include '../footer.php';

            ?>

            <form action="logger.php" method="POST" id="formlogin"> 

                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" placeholder="Username" required><br>

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" placeholder="Password" required><br><br>
                
                <input type="submit" value="Login" ><br>
            </form>
            <a href="../recuperapassword/"><p>Hai dimenticato la password?</p></a>

        </div>
    </div><!-- CONTAINER END -->

     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>