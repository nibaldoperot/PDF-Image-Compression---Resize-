<html>
<head>
  <title>Ver/Dimensionar Imagenes</title>
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <script src="js/jquery.min.js"></script>
</head> 
<body>
  <h2>Archivos Disponibles</h2>
  <a href="./" >Inicio</a>
  <a href="./image.php" >Cargar Imagen(es)</a>
  <div class="container">
    <b>Dimensiones</b>
    <input class="width"/>
    x <input class="height"/>

  </div>
  <?php
  if ($handle = opendir('img/original')) {  

      while (false !== ($entry = readdir($handle))) {

          if ($entry != "." && $entry != "..") { ?>
            <div class="container">
              <p>
                <img src="img/original/<?php echo $entry; ?>" />
                <br/>
                Nombre del Archivo : <?php echo $entry; ?>
                <br/> 
                <a class="files" href="view_img.php?img=<?php echo $entry?>" name="<?php echo $entry; ?>" >Ver Archivos</a>
                <img id='loading' class="loading" src='img/loading.gif' style='display: none;'>
                <br/> 
                <button class="resize" name="<?php echo $entry; ?>" >Convertir</button>
                <button class="delete" name="<?php echo $entry; ?>" >Eliminar</button>
              </p>
            </div>
    <?php }
        }
        closedir($handle);
    }
?>
</body>
<script src="js/script.js"></script>
</html>
 

