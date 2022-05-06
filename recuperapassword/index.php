<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Mosaic |Recupera Password</title>
</head>
<body>
    <div id="container" class="container-fluid">
        <h1>M O S A I C</h1>

            <div id="divrecuperapassword">
                <h2>Recupera password</h2>
                <form action="verificarecupera.php" method="POST" id="formrecuperapassword"> 
                    <label for="email">Email inserita in fase di registrazione:</label><br>
                    <input type="email" id="email" name="email" placeholder="email" required><br><br>
                    <input type="submit" value="Recupera!" ><br>
                </form>
                <a href="../login/"><p>Ti sei ricordato la password?</p></a>
            </div>

    </div><!-- CONTAINER END -->

     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>