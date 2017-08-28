$(function(){
      $('.compress').click(function(){
        var filename = $(this).attr('name')
        var path = filename
        $('#loading').show();
        $.ajax({
          type: "POST",
          url: "download.php",
          data: "path="+path
        }).done(function( msg ) {
          alert( "Compresion completa ");
          location.reload(); 

        });
      })

      $('.delete').click(function(){
        var filename = $(this).attr('name')
        var path = filename
        $('#loading').show();
        $.ajax({
          type: "POST",
          url: "delete.php",
          data: "path="+path
        }).done(function( msg ) {
          alert( "Archivo Eliminado ");
          location.reload(); 

        });
      })

      $('.resize').click(function(){
        var width = $('.width').val()
        var height = $('.height').val()
        var filename = $(this).attr('name')
        var path = filename
        console.log(width,height,path )
        $('#loading').show();
        $.ajax({
          type: "POST",
          url: "resize_compress.php",
          data: "path="+path+"&width="+width+"&height="+height
        }).done(function( msg ) {
          alert( "Compresion completa ");
          location.reload(); 

        });
      })

      //Falta delete en resize


    })
