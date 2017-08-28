<?php
    $output = shell_exec( 'gs -dNOPAUSE -dBATCH -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/ebook -sOutputFile=comprimido/'. $_POST['path'] . ' original/' . $_POST['path'] );