<html> 
<head>
<title>Inches/CM</title>
  <script language="JavaScript">

function adaptar_cifra(temporal)

{

var i=0;

var temp = "";

var aux;

aux=temporal;

distancia=aux.indexOf(".");

if (distancia==0)

	{  

		temp= temp + "0";

	}



if (distancia>3)

	{

		tam = distancia;

		for (dist=tam;dist-3>0;dist-=3)

			{

				temp = aux.substring(dist-3,dist) + temp;

				temp = "." + temp;

			}

		temp = aux.substring(dist-3,dist) + temp;

		temp = temp + ",";

		temp = temp + aux.substring(distancia+1,aux.length);

		return temp;

	}

if (distancia>=0 && distancia<=3)

	{

		temp = temp + aux.substring(0,distancia);

		temp = temp + ",";

		temp = temp + aux.substring(distancia+1,aux.length);

		return(temp);

	}

if (distancia==-1 && aux.length>3)

	{

		tam = aux.length;

		

		for (dist=tam;dist-3>0;dist-=3)

			{

				temp = aux.substring(dist-3,dist) + temp;

				temp = "." + temp;

			}

		temp =  aux.substring(0,dist) + temp;

		return temp;

	}

if (distancia==-1 && aux.length<=3)

	{

		temp = aux;

		return temp;

	}


} // Fin Funcion

// =================================================

function quitar_coma(temporal)

{

var i=0;

var temp = "";

distancia=temporal.indexOf(",");

if (distancia==0)

	{  

		temp= temp + "0";

	}

if (temporal.indexOf(",")!=-1)

	{

		temp = temp + temporal.substring(0,distancia);

		temp = temp + ".";

		temp = temp + temporal.substring(distancia+1,temporal.length);

	}

else

	{

		temp = temporal;

	}

return temp;

} // Fín Funcion

// =================================================

function convertir(origen)

{

cambio = new Array(12);

cambio[0]=1;

cambio[1]=2.54;

// 1 PASO: Actualizar el valor en Euros dependiendo de la moneda introducida

var temp_sincoma

var temporal = quitar_coma(document.calc.EUR.value);

if (origen == 1)

{

 			temp_sincoma = quitar_coma(document.calc.ESP.value);

			if (isNaN(temp_sincoma) || temp_sincoma.indexOf("-")>=0 ) {alert ("Por favor, introduzca un número positivo válido.");return;}

			temporal = String(Math.round(( temp_sincoma / cambio[1])*1000)/1000);

			document.calc.EUR.value = adaptar_cifra(temporal);

			valor = document.calc.ESP.value;

}

// 2 PASO: Calcular el valor de todos los campos

var temporal2;

if (origen!=1)

{

temporal2 = String(Math.round(temporal * cambio[1]*1000)/1000);

document.calc.ESP.value = adaptar_cifra(temporal2);

}

} // Fin Funcion Convertir()

  </script>
	</head>
	<body>

<form name="calc" height="300" width="100">

    <strong id="regular">Inches</strong>
   
    <input id="resultados"  name="EUR" size="13" onchange="convertir(0)" onkeyup="convertir(0)" type="text" placeholder="Introduce un valor">

    <strong id="regular">CM</strong>

    <input id="resultados" name="ESP" size="13" onkeyup="convertir(1)" onchange="convertir(1)" type="text" placeholder="Introduce un valor">
<br></br>
	<p id="parrafo">Si tenemos un televisor de X pulgadas(rectangulo blanco) los cm se deben de medir en diagonal para calcular las pulgadas</p>
</form>

<svg align="center" height="400" width="300">

<rect x="50" y="50" width="200" height="100" fill="white"/>

<svg align="center" height="200" width="250">

<svg>
<path id="ruta1" d="M 130 130 Q 175 155 256 200  m 0 0 z"
      stroke="aqua" stroke-width=0 fill="white"/>

<text fill="blue" dy="-50">
<textPath xlink:href="#ruta1" style="font: bold 1em verdana" >
CM

</textPath>
</text>
</svg>

<line align="center" x1="50" y1="51" x2="375" y2="210"
style="stroke: green; stroke-width: 5;" />
</svg>

</svg>
	</body>
</html>
