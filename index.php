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
            <?php
                for ($row = 1; $row <= 12; $row++) {
                    echo '<div class="row">';
                    for ($col = 1; $col <= 12; $col++) {
                        echo '<div class="col">'.$col.' of 12</div>';
                    }
                    echo '</div>';
                }
            ?>
    </div><!-- CONTAINER END -->
    <?php
		include 'footer.php';
	?>
     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>