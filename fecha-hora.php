<style type="text/css" media="screen">
<!--
.cc,.ccb,.ccm{padding:1px;padding-left:6px;padding-right:6px;font-family:monospace;}
.ccb{text-align:center;font-weight:bold;}
.ccm{text-align:center;}
-->
</style>
<h1>Tabla de la fecha y hora en las principales ciudades del mundo.</h1><br />
<div id="clock_disp"></div><br />
<script type="text/javascript">
//<![CDATA[
function addEvent(o,e,f){if(o.addEventListener){o.addEventListener(e,f,false);return true;}
else if(o.attachEvent){return o.attachEvent("on"+e,f);}
else{return false;}}
addEvent(window,"load",setup);addEvent(window,"unload",makeCookie);function getCookie(path)
{var result="";var a=document.cookie.indexOf(path);if(a!=-1){a+=path.length+1;var b=document.cookie.indexOf(";",a);if(b==-1){b=document.cookie.length;}
result=unescape(document.cookie.substring(a,b));}
return result;}
var cookie_array=null;function processCookie()
{var cookie=getCookie(window.location.pathname);if(cookie!=''){cookie_array=cookie.split(" ");}}
function makeCookie(){var values=((document.getElementById("ampm1").checked)?"1":"0");values+=" "+((document.getElementById("daylight1").checked)?"1":"0");var exp=new Date(new Date().getTime()+30*24*60*60*1000);document.cookie=window.location.pathname+"="+values+"; expires="+exp.toGMTString();}
var locations=["Samoa","Hawaii","Anchorage, Juneau","Seattle, San Francisco, Los Angeles","Edmonton, Denver, Phoenix","Winnipeg, Chicago, Houston, Mexico, Tegucigalpa, Managua, San Jose","New York, Miami, La Habana, Puerto Principe, Panama, Bogota, Quito, Lima","Halifax, Santo Domingo, Caracas, Georgetown, Manaus, La Paz, Asuncion, Santiago de Chile","Brasilia, Rio De Janeiro, Montevideo, Buenos Aires","Recife","Azores","Londres, Dublin, Lisboa, Casablanca, Dakar, Accra","Paris, Madrid, Roma, Berlin, Praga, Belgrado, Varsovia, Estocolmo, Oslo, Argel, Lagos, Brazzaville, Luanda","Helsinki, Minks, Bucarest, Estambul, Atenas, Beirut, Cairo, Tripoli, Harare, Ciudad del Cabo","San Petersburgo, Moscow, Bagdad, Riad, Addis Abeba, Kampala, Nairobi, Mogadisco","Samara, Baku, Tbilisi, Dubai","Sheliabinsk, Karachi, Islamabad","Omsk, Tashkent, Dacca","Novosibirsk, Bangkok, Hanoi, Yakarta","Irkutsk, Lhasa, Beijing, Hong Kong, Kuala Lumpur, Singapur, Manila, Perth","Tokyo, Seul,","Vladivostok, Sydney, Melbourne","Noumea, Magaban","Wellington (Nueva Zelanda)"];function setup()
{processCookie();setup_disp();if(cookie_array){document.getElementById("ampm"+cookie_array[0]).checked=true;document.getElementById("daylight"+cookie_array[1]).checked=true;}
update_clock();}
function setup_disp()
{s="<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" bordercolor=\"#c0c0c0\" bgcolor=#ffffe0>";s+="<tr><td class=\"ccm\" colspan=\"2\">";s+="<input id=\"ampm0\" type=\"radio\" name=\"ampm\" checked=\"checked\">24 horas&nbsp;";s+="<input id=\"ampm1\" type=\"radio\" name=\"ampm\">AM/PM";s+="</td><td width=\"220px\" class=\"ccm\">";s+="<input id=\"daylight0\" type=\"radio\" name=\"daylight\" checked=\"checked\">Standard<br />";s+="<input id=\"daylight1\" type=\"radio\" name=\"daylight\">Hora de verano";s+="</td></tr>";s+="<tr bgcolor=\"#ccffcc\"><td class=\"ccb\">Zona</td>";s+="<td class=\"ccb\">Lugar</td>";s+="<td class=\"ccb\" >Fecha/Hora</td></tr>";daylight=(cookie_array&&cookie_array[1]=="1")?1:0;offset=(new Date().getTimezoneOffset()/60)+daylight;for(i=0;i<24;i++){q="tz"+i;j=i-11;si=""+Math.abs(j)
if(si.length<2)si="0"+si;si=((j<0)?"-":"+")+si;mod=(i-11==-offset)?" bgcolor=\"#f0f0ff\"":"";s+="<tr"+mod+" id=\"row"+i+"\"><td class=\"cc\">UTC"+si+"</td>";s+="<td class=\"cc\">"+locations[i]+"</td>";s+="<td class=\"ccm\" id=\"v"+i+"\"></td></tr>";}
s+="";s+="</table>";document.getElementById("clock_disp").innerHTML=s;}
function lz(v)
{return(v<10)?"0"+v:v;}
function formatDate(d)
{s=lz((d.getMonth()+1))+"/"+lz(d.getDate())+"/"+d.getFullYear()+" ";h=d.getHours();if(document.getElementById("ampm1").checked){ap=(h>=12)?"PM":"AM";h=(h%12);if(h==0)h=12;s+=lz(h)+":"+lz(d.getMinutes())+":"+lz(d.getSeconds())+" "+ap;}
else{s+=lz(h)+":"+lz(d.getMinutes())+":"+lz(d.getSeconds());}
return s;}
var old_offset=-1;var hour=3600000;function update_clock(){d=new Date();offset=d.getTimezoneOffset()/60;daylight=(document.getElementById("daylight1").checked)?1:0;offset+=daylight;d.setTime(d.getTime()-(11*hour)+offset*hour);for(i=-11;i<=12;i++){document.getElementById("v"+(i+11)).innerHTML=formatDate(d);if(old_offset!=offset){color=(i==-offset)?"#f0f0ff":"#ffffe0";document.getElementById("row"+(i+11)).style.background=color;}
d.setTime(d.getTime()+hour);}
old_offset=offset;setTimeout('update_clock()',990);}
//]]>
</script>
