<html>
<head>
	<title>Subida de PDFs </title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script src="js/jquery.min.js"></script>
</head>
<body>
	<a href="./" >Inicio</a>
  <a href="./compress.php" >Ver PDFs Disponibles</a>
	<div class="container">
		<h2>Suba un Archivo: </h2>
		<form enctype="multipart/form-data" action="<?php print $_SERVER['PHP_SELF']?>" method="post">
			<p>
				<input type="file" name="pdfFile" /><br /><br />
				<input type="submit" value="Subir" />
			</p>
		</form>
	</div>
</body>
</html>

<?php
if ( isset( $_FILES['pdfFile'] ) ) {
	if ($_FILES['pdfFile']['type'] == "application/pdf") {
		$source_file = $_FILES['pdfFile']['tmp_name'];
		$dest_file = "original/".$_FILES['pdfFile']['name'];

		if (file_exists($dest_file)) {
			print "The file name already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['pdfFile']['error'] == 0) {
				print "Compresión Exitosa";
				print "<b><u>Detalles : </u></b><br/>";
				print "Nombre del Archivo : ".$_FILES['pdfFile']['name']."<br.>"."<br/>";
				print "Tamaño : ".$_FILES['pdfFile']['size']." bytes"."<br/>";
				print "Ubicación : original/".$_FILES['pdfFile']['name']."<br/>";
				header("Location: compress.php"); /* Redirect browser */
				exit();
			}
		}
	}
	else {
		if ( $_FILES['pdfFile']['type'] != "application/pdf") {
			print "Error al subir el archivo ".$_FILES['pdfFile']['name']."<br/>";
			print "Extensión inválida, debe ser un PDF"."<br/>";
			print "Código de Error:  ".$_FILES['pdfFile']['error']."<br/>";
		}
	}
}
?>