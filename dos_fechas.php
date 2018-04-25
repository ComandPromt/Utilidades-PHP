<?php
function esBisiesto($year=NULL) {
	if($year>=3344){
		return true;
	}
	else{
		$year = ($year==NULL)? date('Y'):$year;
		return ( ($year%4 == 0 && $year%100 != 0) || $year%400 == 0 );
	}
}

function quitarCeros($numero){
	switch($numero){
		case "01";
		$numero="1";
		break;
		case "02";
		$numero="2";
		break;
		case "03";
		$numero="3";
		break;
		case "04";
		$numero="4";
		break;
		case "05";
		$numero="5";
		break;
		case "06";
		$numero="6";
		break;
		case "07";
		$numero="7";
		break;
		case "08";
		$numero="8";
		break;
		case "09";
		$numero="9";
		break;
	}
	return $numero;
}

print '
<h1 style="text-align:center;">Calcular el tiempo transcurrido entre dos fechas</h1>
<form method="post" action="'. $_SERVER['PHP_SELF'].'" >
	<table style="text-align:center;margin:auto;border: 1px solid black;text-align:center;">';
$anyioactual=date("Y");
$mesactual=date("m");
$diaactual=date("d");

if(isset($_POST['enviar'])){
	
	$_POST['dia_principio']=quitarCeros($_POST['dia_principio']);
	$_POST['dia_final']=quitarCeros($_POST['dia_final']);
	$_POST['mes_principio']=quitarCeros($_POST['mes_principio']);
	$_POST['mes_final']=quitarCeros($_POST['mes_final']);
	
	if($_POST['dia_principio']==$_POST['dia_final'] &&	$_POST['mes_principio']==$_POST['mes_final'] && $_POST['anio_anterior']==$_POST['anio_posterior'] || $_POST['mes_principio']==2 && $_POST['dia_principio']==31 || $_POST['dia_final']==31 && $_POST['mes_final']==2 ||$_POST['mes_principio']>$_POST['mes_final'] && $_POST['anio_anterior']>=$_POST['anio_posterior'] || $_POST['dia_principio']>$_POST['dia_final'] && $_POST['mes_principio']>=$_POST['mes_final'] && $_POST['anio_anterior']==$_POST['anio_posterior'] || $_POST['anio_posterior']<$_POST['anio_anterior']|| strlen($_POST['anio_anterior'])<=2	|| !esBisiesto($_POST['anio_anterior']) && $_POST['dia_principio']==29 && $_POST['mes_principio']==2 || !esBisiesto($_POST['anio_posterior']) && $_POST['dia_final']==29 && $_POST['mes_final']==2 || $_POST['mes_principio']==2 && $_POST['dia_principio']==30 &&  $_POST['anio_anterior']<3344 || $_POST['mes_final']==2 && $_POST['dia_final']==30 &&  $_POST['anio_anterior']<3344 ) {
		$mensaje="FECHA INV&Aacute;LIDA";
	}
	else{		
	
		if($_POST['anio_anterior']<$_POST['anio_posterior'] ||( $_POST['anio_anterior']==$_POST['anio_posterior'] && $_POST['mes_principio']==$_POST['mes_final']&& $_POST['dia_principio']<$_POST['dia_final'])||( $_POST['anio_anterior']==$_POST['anio_posterior'] && $_POST['mes_principio']<$_POST['mes_final'])){
			$fecha1 = new DateTime($_POST['anio_anterior']."-".$_POST['mes_principio']."-".$_POST['dia_principio']);
			$fecha2 = new DateTime($_POST['anio_posterior']."-".$_POST['mes_final']."-".$_POST['dia_final']);
			$fecha = $fecha1->diff($fecha2);
		if($_POST['mes_principio']<=$_POST['mes_final'] && $_POST['dia_principio']==$_POST['dia_final']){
			$fecha->m=$_POST['mes_final']-$_POST['mes_principio'];
			$fecha->d=0;
		}
		
		if($_POST['mes_principio']<=$_POST['mes_final'] && $_POST['dia_principio']<=$_POST['dia_final']){
			$fecha->m=$_POST['mes_final']-$_POST['mes_principio'];
			$fecha->d=$_POST['dia_final']-$_POST['dia_principio'];
		}
		if($fecha->y>1 && $fecha->m>1 && $fecha->d>1) {
			$mensaje=$fecha->y ." a&ntilde;os, ".$fecha->m." meses y ".$fecha->d." d&iacute;as";
		}
		else{
			if( $fecha->y>1 && $fecha->m>1 && $fecha->d==0) {
				$mensaje=$fecha->y ." a&ntilde;os, ".$fecha->m." meses y 1 d&iacute;a";	
			}
			else{
				if(  $fecha->y>1 && $fecha->m==0 && $fecha->d==0) {
					$mensaje=$fecha->y ." a&ntilde;os";	
				}	
				else{
					if( $fecha->y==0 && $fecha->m>1 && $fecha->d==0) {
					$mensaje=$fecha->m." meses";	
					}
					else{
						if( $fecha->y==0 && $fecha->m==0 && $fecha->d>1) {
							$mensaje=$fecha->d." d&iacute;as";	
						}
						else{
							if( $fecha->y==0 && $fecha->m==0 && $fecha->d==1) {
								$mensaje="1 d&iacute;a";
							}
							else{
								if( $fecha->y==1 && $fecha->m==0 && $fecha->d==0) {
									$mensaje= "1 a&ntilde;o";
								}
								else{
									if( $fecha->y==0 && $fecha->m==1 && $fecha->d==0) {
										$mensaje= "1 mes";
									}	
									else{
											if( $fecha->y==1 && $fecha->m>1 && $fecha->d>1) {
												$mensaje="1 a&ntilde;o, ".$fecha->m." meses y ".$fecha->d." d&iacute;as";			
											}	
											else{
												if( $fecha->y==0 && $fecha->m>1 && $fecha->d>1) {
													$mensaje=$fecha->m." meses y ".$fecha->d." d&iacute;as";	
												}
												else{
													if( $fecha->y==0 && $fecha->m==1 && $fecha->d==1) {
														$mensaje="1 mes y 1 d&iacute;a";				
													}	
													else{
														if( $fecha->y==0 && $fecha->m>1 && $fecha->d==1) {
															$mensaje=$fecha->m." meses y 1 d&iacute;a";
														}
														else{
															if( $fecha->y==0 && $fecha->m==1 && $fecha->d>1) {
																$mensaje="1 mes y ".$fecha->d." d&iacute;as";
															}
															else{
																if( $fecha->y>1 && $fecha->m==0 && $fecha->d==1) {
																	$mensaje=$fecha->y." a&ntilde;os y 1 d&iacute;a";
																}	
																else{
																	if( $fecha->y>1 && $fecha->m==1 && $fecha->d>1) {
																		$mensaje=$fecha->y." a&ntilde;os, 1 mes y ".$fecha->d." d&iacute;as";
																	}
																	else{
																		if( $fecha->y==1 && $fecha->m==0 && $fecha->d>1) {
																			$mensaje="1 a&ntilde;o y ".$fecha->d." d&iacute;as";
																		}
																		else{
																			if( $fecha->y==1 && $fecha->m==1 && $fecha->d==0) {
																				$mensaje="1 a&ntilde;o y 1 mes";
																			}
																			else{
																				if( $fecha->y==1 && $fecha->m==1 && $fecha->d>1) {
																					$mensaje="1 a&ntilde;o y 1 mes y ".$fecha->d." d&iacute;as";
																				}
																				else{
																					if( $fecha->y==1 && $fecha->m==1 && $fecha->d==1) {
																						$mensaje="1 a&ntilde;o y 1 mes y 1 d&iacute;a";
																					}
																					else{
																						if( $fecha->y==1 && $fecha->m>1 && $fecha->d==0) {
																						$mensaje="1 a&ntilde;o y ".$fecha->m." meses";
																						}
																						else{
																							if( $fecha->y==1 && $fecha->m>1 && $fecha->d==1) {
																								$mensaje="1 a&ntilde;o , ".$fecha->m." meses y 1 d&iacute;a";
																							}
																							else{
																								if( $fecha->y==1 && $fecha->m==0 && $fecha->d==1) {
																									$mensaje="1 a&ntilde;o y 1 d&iacute;a";
																								}
																								else{
																									if( $fecha->y>1 && $fecha->m==1 && $fecha->d==0) {
																										$mensaje=$fecha->y." a&ntilde;os y 1 d&iacute;a";
																									}
																								}		
																							}				
																						}
																					}
																				}
																			}	
																		}
																	}
																}	
															}
														}
													}	
												}
											}
										}
									}
								}	
							}
						}
					}
				}
			}
		}
		//print $fecha->y." ".$fecha->m." ".$fecha->d;
		//print "<br/>";
		if($mensaje!="FECHA INV&Aacute;LIDA"){
			print '<tr><td style="font-size:30px;color:#2E7BF9;font-weight:bold;">'.'Per&iacute;odo del <span style="font-size:30px;color:#0058EA;">'.$_POST['dia_principio']."/".$_POST['mes_principio']."/".$_POST['anio_anterior'].'</span> al <span style="font-size:30px;color:#0058EA;">'.$_POST['dia_final']."/".$_POST['mes_final']."/".$_POST['anio_posterior']."</span><br/><br/></td></tr>";
		}
	}
	if($mensaje!="FECHA INV&Aacute;LIDA" && $_POST['anio_anterior']==$anyioactual&& $_POST['mes_principio']==$mesactual&&$_POST['dia_principio']==$diaactual){
		print '<tr><td style="font-size:30px;color:#2E7BF9;font-weight:bold;">Faltan <span style="font-size:30px;color:red;">'.$mensaje."</span><hr/></td></tr>";
	}
	else{
		print '<tr><td style="font-size:30px;color:red;font-weight:bold;">'.$mensaje."<hr/></td></tr>";		
	}	
}

print '	<tr>
			<td style="font-size:25px;color:#2E7BF9;font-weight:bold;">De<br/><br/>
			</td>
		</tr>
		<tr>
			<td>
				<select name=dia_principio>
					<option value="'.$diaactual.'">Dia Actual</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>
					<option>13</option>
					<option>14</option>
					<option>15</option>
					<option>16</option>
					<option>17</option>
					<option>18</option>
					<option>19</option>
					<option>20</option>
					<option>21</option>
					<option>22</option>
					<option>23</option>
					<option>24</option>
					<option>25</option>
					<option>26</option>
					<option>27</option>
					<option>28</option>
					<option>29</option>
					<option>30</option>
					<option>31</option>
				</select>
				<select name=mes_principio>
					<option value="'.$mesactual.'">Mes Actual
					</option>
					<option value="1">Enero</option>
					<option value="2">Febrero</option>
					<option value="3">Marzo</option>
					<option value="4">Abril</option>
					<option value="5">Mayo</option>
					<option value="6">Junio</option>
					<option value="7">Julio</option>
					<option value="8">Agosto</option>
					<option value="9">Septiembre</option>
					<option value="10">Octubre</option>
					<option value="11">Noviembre</option>
					<option value="12">Diciembre</option>
				</select>
				<input style="text-align:center;margin:auto;" name="anio_anterior" type="text" value="'.$anyioactual.'" /><br/><br/>
			</td>
		</tr>
		<tr>
			<td style="font-size:25px;color:#2E7BF9;font-weight:bold;">A<br/><br/>
			</td>
		</tr>
			<td>
				<select name=dia_final>
					<option value="'.$diaactual.'">Dia Actual
					</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
					<option>9</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>
					<option>13</option>
					<option>14</option>
					<option>15</option>
					<option>16</option>
					<option>17</option>
					<option>18</option>
					<option>19</option>
					<option>20</option>
					<option>21</option>
					<option>22</option>
					<option>23</option>
					<option>24</option>
					<option>25</option>
					<option>26</option>
					<option>27</option>
					<option>28</option>
					<option>29</option>
					<option>30</option>
					<option>31</option>
				</select>
				<select name=mes_final>
					<option value="'.$mesactual.'">Mes Actual
					</option>
					<option value="1">Enero</option>
					<option value="2">Febrero</option>
					<option value="3">Marzo</option>
					<option value="4">Abril</option>
					<option value="5">Mayo</option>
					<option value="6">Junio</option>
					<option value="7">Julio</option>
					<option value="8">Agosto</option>
					<option value="9">Septiembre</option>
					<option value="10">Octubre</option>
					<option value="11">Noviembre</option>
					<option value="12">Diciembre</option>
				</select>
				<input style="text-align:center;margin:auto;" type="text" name="anio_posterior" value="'.$anyioactual.'" /><br/><br/>
			</td>
		</tr>
		<tr>
			<td>
				<input style="font-size:20px;font-family:Verdana,Helvetica;font-weight:bold;color:white;background:#638cb5;border:0px;width:90px;height:30px;" name="enviar" type="submit"/>
			</td>
		</tr>
	</table>
</form>';
?>
