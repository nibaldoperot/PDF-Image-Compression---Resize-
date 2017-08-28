<html>
<head>
  <title>Archivos Disponibles</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <script src="js/jquery.min.js"></script>
</head>
<body>
  <h2>Archivos Disponibles</h2>
  <a href="./" >Inicio</a>
  <a href="./pdf.php" >Cargar PDF</a>
  <?php
  if ($handle = opendir('original')) {

      while (false !== ($entry = readdir($handle))) {

          if ($entry != "." && $entry != "..") { ?>
            <div class="container">
              <p>
                <?php echo $entry; ?> - 
                <?php 
                if(file_exists ( "comprimido/$entry" )){ ?>
                  <a href="comprimido/<?php echo $entry; ?>" name="<?php echo $entry; ?>" >Ver Archivo</a>
                  
                <?php }else{ ?>
                        <button class="compress" href="download.php" name="<?php echo $entry; ?>" >Comprimir</button>
                <?php } ?>
                <button class="delete" name="<?php echo $entry; ?>" >Eliminar</button>
                <img id='loading' class="loading" src='img/loading.gif' style='display: none;'>
              </p>
            </div>
    <?php }
        }
        closedir($handle);
    } ?>
<script src="js/script.js"></script>
</body>
</html>