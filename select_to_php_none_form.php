<select id="producto" onchange="ShowSelected();" >
<option selected>Choose</option>
<option >1</option>
<option >2</option>
</select>
<script>function ShowSelected()
{
 
/* Para obtener el texto */
var combo = document.getElementById("producto");
var selected = combo.options[combo.selectedIndex].text;
document.cookie ='selected='+selected;
 document.location.reload();
}

 </script>

<?php

print $_COOKIE["selected"];

?>