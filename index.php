<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/MY_css/block-grid.css">
    <link rel="stylesheet" href="css/MY_css/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Mosaic</title>
</head>
<body>
    <?php
		include '../config.php';
	?>
    
    
    <?php
    $img="https://pixidisorg.files.wordpress.com/2019/07/dito-wuxi.jpg";
    for ($i=0; $i<12; $i=$i+1){
            echo "<div class= row-$i  >\n";
            for ($j=1; $j<=12; $j=$j+1){
                echo "\t<div id= block-". ($j+$i*12)."  >\n
                      \t\t<img id=img-".($j+$i*12)." src=$img  style=\"width:100%\">\n
                      \t</div>\n";
            }
            echo "</div>\n";
        }
    ?>   

    <?php
		include '../footer.php';
	?>
     <!-- Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>