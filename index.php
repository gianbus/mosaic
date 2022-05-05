<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Mosaic</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>
<body>
    <?php
		include 'config.php';
	?>
    <div id="container" class="container-fluid">
    <h1>M O S A I C</h1>
		<a href='/login/index.html'><h2>Testa il login!</h2></a><br>
		<a href='/registrazione'><h2>Testa la registrazione!</h2></a><br>
		<a href='/recuperapassword'><h2>Testa il recuperapassword!</h2></a><br>
    </div><!-- CONTAINER END -->
    <?php
		include 'footer.php';
	?>
     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>