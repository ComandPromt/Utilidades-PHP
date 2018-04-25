<?
include 'cabecera_lateral_2.php';
?>

<form name="test" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

<p align="center"><strong>Introduce el tamaño del archivo</strong></p>
<input class="boton" name="archivo" type="number" value="0"/>

<select style="background-color:#000000;  color:#FFFF88;font-family:arial; font-size:10pt" align="center" name="base">
  <option value="Bytes">Bytes</option>
  <option value="KB">KB</option>
  <option value="MB">MB</option>
  <option value="GB">GB</option>
</select>
<input class="boton" name="archivo2" type="number" value="0"/>
<select style="background-color:#000000;  color:#FFFF88;font-family:arial; font-size:10pt" align="center" name="base2">
  <option value="Bytes">Bytes</option>
  <option value="KB">KB</option>
  <option value="MB">MB</option>
  <option value="GB">GB</option>
</select>
<p align="center"><strong>Introduce el tiempo de transferencia</strong></p>
<input  class="boton" name="minutos" type="number" value="0"/>
<strong align="center">minutos</strong>

<input class="boton" align="center" name="segundos" type="number" value="0"/>
<strong align="center">segundos</strong>
 
<br></br>
<input align="center" value="Enviar" class="boton" type="submit"/>
<input align="center" value="Limpiar" class="boton" type="reset"/>
<br></br>
</form>

<?php 
            
$archivo=$_REQUEST['archivo'];
$archivo2=$_REQUEST['archivo2'];
$base=$_REQUEST['base'];
$base2=$_REQUEST['base2'];
$minutos=$_REQUEST['minutos'];
$segundos=$_REQUEST['segundos'];
$minutosp="minutos";
$segundosp="segundos";
if ($minutos<0) 
{
	$minutos=0;
}

if ($segundos<0)
{
	$segundos=0;
}	

if ($archivo<0)
{
	$archivo=0;
}

if ($archivo2<0)
{
	$archivo2=0;
}

if ($minutos<=0 && $segundos<=0 && $archivo==0 && $archivo2==0)
	{
		print "<h4 style='color:red;'>Especifica el tiempo de transferencia</h4>";
		print "<h4 style='color:red;'>Especifica el tamaño del archivo</h4";
	}

else
if ($minutos<=0 && $segundos<=0)
	{
		print "<h4 style='color:red;'>Especifica el tiempo de transferencia</h4>";
	}
else
	if ($archivo==0 && $archivo2==0)
	{
		print "<h4 style='color:red;'>Especifica el tamaño del archivo</h4";
	}

	else
	{
		if ($minutos>=0 || $segundos>=0)
	
			{
				//Pasamos los minutos a segundos
	
				$segundos2=($minutos*60)+$segundos;

	if ($base==$base2)
		
	{
		$archivo=$archivo+$archivo2;
		$base2="";
		$archivo2="";
		
		if (base=="KB")
			
		{$vel=($archivo*8)/$segundos2;}
		
		else
					
				if ($archivo>0 && $base=="Bytes" && $archivo2==0)
	
				{$vel=(($archivo/1024)*8)/$segundos2;}
		
		else
					
				if ($archivo>0 && $base=="MB" && $archivo2==0)
	
				{$vel=(($archivo*1024)*8)/$segundos2;}
		
		else
					
				if ($archivo>0 && $base=="GB" && $archivo2==0)
	
				{$vel=((($archivo*1024)*1024)*8)/$segundos2;}
				
}
	
	else
				if ($archivo>0 && $base=="KB" && $archivo2==0)
	
				{
					$archivo2="";
					$base2="";
					$vel=($archivo*8)/$segundos2;

				}
				else
					if ($archivo2>0 && $base2=="KB" && $archivo==0)
	
				{
					$archivo="";
					$base="";
					$vel=($archivo2*8)/$segundos2;

				}

				else
					
				if ($archivo>0 && $base=="Bytes" && $archivo2==0)
	
				{
					$archivo2="";
					$base2="";
					$vel=(($archivo/1024)*8)/$segundos2;

				}
				
				else
					
				if ($archivo2>0 && $base2=="Bytes" && $archivo==0)
	
				{
					$archivo="";
					$base="";
					$vel=(($archivo2/1024)*8)/$segundos2;

				}
				
				else
					
				if ($archivo>0 && $base=="MB" && $archivo2==0)
	
				{
					$archivo2="";
					$base2="";
					$vel=(($archivo*1024)*8)/$segundos2;

				}
	
				else
					
				if ($archivo2>0 && $base2=="MB" && $archivo==0)
	
				{
					$archivo="";
					$base="";
					$vel=(($archivo2*1024)*8)/$segundos2;

				}
	
				else
					
				if ($archivo>0 && $base=="GB" && $archivo2==0)
	
				{
					$archivo2="";
					$base2="";
					$vel=((($archivo*1024)*1024)*8)/$segundos2;
				}
				
				else
					
				if ($archivo2>0 && $base2=="GB" && $archivo==0)
	
				{
					$archivo="";
					$base="";
					$vel=((($archivo2*1024)*1024)*8)/$segundos2;
				}
				
				else
					
				if ($archivo>0 && $base=="GB" && $archivo2>0 && $base2=='MB')
	
				{
				$vel=(((($archivo*1024)*1024)+($archivo2*1024))*8)/$segundos2;
				}
				
				else
					
				if ($archivo>0 && $base=="MB" && $archivo2>0 && $base2=='KB')
	
				{
					$vel=((($archivo*1024)+$archivo2)*8)/$segundos2;
				}
			}

if ($minutos==0 && $segundos>0)
{
	$minutos="";
	$minutosp="";
}

if ($segundos==0 && $minutos>0)
{
	$segundos="";
	$segundosp="";
}

			
$mb=$vel/1024;
$gb=($vel/1024)/1024;

print "<table align='center' border='3'>
<tr>
  <td><strong>Tama&ntilde;o del archivo</strong></td>
  <td><strong>Tiempo de transferencia</strong></td>
  <td><strong>Kbps</strong></td>
  <td><strong>Mbps</strong></td>
  <td><strong>Gbps</strong></td>
</tr>
 
<tr>
  <td>$archivo $base $archivo2 $base2</td>
  <td>$minutos $minutosp $segundos $segundosp</td>";
  $vel1=round ($vel,1);
  
print "
  <td>$vel1</td>";
  
$vel1=round ($mb,1);

print "<td>$vel1</td>";  

$vel1=round ($gb,1); 

print "<td>$vel1</td>
</tr>

</table>";
	}

include 'estatico.php';



?>