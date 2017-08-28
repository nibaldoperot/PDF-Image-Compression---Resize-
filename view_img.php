<html>
<head>
  <title>Dimensiones Disponibles</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <script src="js/jquery.min.js"></script>
</head>
<link rel="stylesheet" type="text/css" ref="css/styles.css">
<body>
  <?php $entry = $_GET['img']; ?>
  <h2><?php echo $entry; ?></h2>
  <img src="img/original/<?php echo $entry; ?>" />
  <a href="./" >Inicio</a>
  <a href="./image.php" >Cargar imagen(es)</a>
  <a href="./resize.php" >Dimensionar/Ver imagen(es)</a>
<?php 
    foreach (glob("img/comprimido/*".$entry) as $filename) { ?>
    <div class="container">
        <a href="<?php echo $filename; ?>"><?php echo $filename?> </a><br />

    </div>
<?php } ?>

</body>
</html>