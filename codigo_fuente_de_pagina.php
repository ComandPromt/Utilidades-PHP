<?
include 'cabecera_lateral_2.php';
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data"> 
 <center>
	 <strong>URL </strong> <input name="url" type="text" value="http://"> 
	<br/>
   
  <input name="submit" type="submit" value="Codigo fuente!">  </center>
</form> 

<?php
error_reporting(0); 
$url=$_REQUEST['url'];

if ($url=="http://" || $url=="http://www." || $url=="http://www"){
header("location: limpio.html");
}

// Escribir un fichero en un array. En este ejemplo iremos a través de HTTP para
// obtener el código fuente HTML de un URL.

$líneas = file("$url");

print '
<input type="checkbox"  id="spoiler" /> 
  <label for="spoiler" >Codigo fuente</label>
  
<div  class="spoiler" >
<textarea readonly="readonly" id="textarea" rows="23" cols="100%"  class="bookmarklet" style="border:none;resize: none;">
';

// Recorrer nuestro array, mostrar el código fuente HTML como tal y mostrar tambíen los números de línea.
foreach ($líneas as $num_línea => $línea) {
    echo  htmlspecialchars($línea) . "<br />";
}

print '</textarea>
</br>
<button center="center" class="boton" id="copyBlock" style="margin-left:auto;margin-right:auto;display:block;width:90px; height:25px">Copiar</button>
<br/>
<input type="checkbox"  id="spoiler" /> 
  <label for="spoiler" >Cerrar</label>
</div>
';
?>
<script language="JavaScript">
    // Establecemos las variables
    var textarea = document.getElementById("textarea");
    var answer = document.getElementById("copyAnswer");
    var copy   = document.getElementById("copyBlock");
    copy.addEventListener('click', function(e) {
       // Sleccionando el texto
       textarea.select();
       try {
           // Copiando el texto seleccionado
           var successful = document.execCommand('copy');
     
           if(successful) answer.innerHTML = '<font color="ff0000"Copiado!></font>';
           else answer.innerHTML = '<font color="ff0000"Copiado!></font>';
       } catch (err) {
           answer.innerHTML = '<font color="ff0000"Copiado!></font>';
       }
    });
 </script>
<?
include 'estatico.php';
?>