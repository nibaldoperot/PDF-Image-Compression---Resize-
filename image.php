<html>
<head>
    <title>Imagenes Disponibles</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/jquery.min.js"></script>
</head>
<body>
  <h2>Cargar Imagen(es) : </h2>
  <a href="./" >Inicio</a>
  <a href="./resize.php" >Dimensionar/Ver Imagenes</a>
<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple/>
        <input type="submit"/>
    </form>
</div>
</body>
</html>

<?php
if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $_FILES['files']['name'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        $desired_dir="img/original/";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
        }else{
                print_r($errors);
        }
    }
	if(empty($error)){
		echo "Success";
	}
}
?>