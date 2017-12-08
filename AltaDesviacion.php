<?php
    include_once ("iniciar.php"); 
?>

<html> 
    <head>
	    <meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<link rel="icon" type="image/png" href="img/NCPR logo.png" />
		
        <!-- jQuery, jQuery UI -->
        <script type="text/javascript" src="jquery-ui-1.12.1/external/jquery/jquery.js"></script>
        <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
		<link type="text/css" rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.min.css"/>


	</head>
	
	<body>
		<div id="contenedor">
			<?php 
				include_once("menu.php");
			?>
			
			<h1 class="hi"> ALTA DE DESVIACIÓN </h1>
			
			<form action="./libraries/procesarAltaDesviacion.php" method="post" name="datos" enctype="multipart/form-data" .disabled=true;>
				<table cellpadding='0' cellspacing='5' width="1" class='fo'>
					<tr>	
						<td class="f" width="300"> REQUERIDA POR: </td>
						<td>
							<input type="text" name="requerida_por" id="generado_por" class='ff' value='<?php echo "$_SESSION[nombre]"; ?>' disabled />
							<input type="hidden" name="generado" id="generado" class="input_ncpr" value='<?php echo "$_SESSION[nombre]"; ?>' />
						</td>
					</tr>
					
					<tr>
						<td class="f"> FECHA: </td>
						<td><input type="text" name="fecha" id="idFecha1" class='ff' title="El campo no puede estar vacio." placeholder="Fecha" required /></td>
					</tr>

					<tr>
						<td class="f"> ESPECIFICACIÓN N/P A REEMPLAZARSE: </td>
						<td> <input type="text" name="especifi_NP" class="ff" title="El campo no puede estar vacio." placeholder="Número de parte a reemplazar" required /></td>
					</tr>
					
					<tr>
						<td class="f"> DESCRIPCIÓN:</td>
						<td> <input type="text" name="descripcion" class="ff" title="El campo no puede estar vacio." placeholder="Descripción del producto o parte a reemplazar" required /></td>
					</tr>
					
					<tr>
						<td class="f"> DESVIACIÓN N/P A UTILIZARSE: </td>
						<td> <input type="text" name="desviacion_NP" class="ff" title="El campo no puede estar vacio." placeholder="Número de parte a utilizar" required /></td>
					</tr>
					
					<tr>
						<td class="f"> DESCRIPCIÓN:</td>
						<td> <input type="text" name="descripcionNP" class="ff" title="El campo no puede estar vacio." placeholder="Descripción del producto o parte a utilizar" required /></td>
					</tr>
										
					<tr>
						<td class="f"> DESCRIPCIÓN DEL CAMBIO: </td>
						<td> <input type="text" name="desc_cambio" min="1" class="ff" title="El campo no puede estar vacio." placeholder="Descripcion del cambio" required /></td>
					</tr>	
					
					<tr>
						<td class="f"> RAZÓN DEL CAMBIO: </td>
						<td> <input type="text" name="razoncambio" min="1" class="ff" title="El campo no puede estar vacio." placeholder="Razon del cambio" required /></td>
					</tr>		
										
					<tr>
						<td class="f"> VALIDADO POR SOSTENIMIENTO: </td>
						<td>
							<select class="ff" name="sostenimiento" style="text-align-last: center">
								<option value=""></option>
								<option value="SI">SI</option>
								<option value="NO">NO</option>
							</select>
						</td>
						<!-- <td> <input type="text" name="sostenimiento" min="1" class="ff" title="El campo no puede estar vacio." placeholder="Validado por sostenimiento" required /></td> -->
					</tr>						
					
					<tr>
						<td class="f"> VALIDADO POR CALIDAD: </td>
						<td>
							<select class="ff" name="calidad" style="text-align-last: center">
								<option value=""></option>
								<option value="SI">SI</option>
								<option value="NO">NO</option>
							</select>
						</td>
						<!-- <td> <input type="text" name="calidad" min="1" class="ff" title="El campo no puede estar vacio." placeholder="Validado por calidad" required /></td> -->
					</tr>									
				</table>
			
				<table cellpadding='0' cellspacing='5' width="1" class='fo'>
					<tr>
						<td class="f"> FECHA DE EXPIRACIÓN: </td>
						<td> <input type="text" name="expiracion" min="1" id="idFecha2" class="ff" title="El campo no puede estar vacio." placeholder="Fecha de expiracion" required /></td>
					</tr>					
					
					<tr>
						<td class="f"> CANTIDAD A PRODUCIRSE: </td>
						<td> <input type="number" name="cantidad" min="1" class="ff" title="El campo no puede estar vacio." placeholder="Cantidad a producirse" required /></td>
					</tr>

					<tr>
						<td class="f"> STATUS: </td>
						<td> <input type="text" name="status" min="1" class="ff" title="El campo no puede estar vacio." placeholder="Status" required /></td>
					</tr>	
					
					<tr>
						<td class="f"> POR PETICIÓN DE: </td>
						<td> <input type="text" name="peticion" min="1" class="ff" title="El campo no puede estar vacio." placeholder="Por peticion de" required /></td>
					</tr>	

					<tr>
						<td class="f"> REQUIERE ACCIÓN CORRECTIVA?: </td>
						<td>
							<select class="ff" name="accion" style="text-align-last: center">
								<option value=""></option>
								<option value="SI">SI</option>
								<option value="NO">NO</option>
							</select>
						</td>
						<!-- <td> <input type="text" name="accion" min="1" class="ff" title="El campo no puede estar vacio." placeholder="Requiere accion correctiva?" required /></td> -->
					</tr>
				</table>		
				
				<table cellpadding='0' cellspacing='5' width="1" class='fo'>
					<tr>
						<td class="f1" colspan=4 ALIGN=CENTER > ARCHIVO FOTOGRAFICO: </td>
					</tr>
					<tr>
						<td ALIGN=CENTER>
							<input type="file" name="foto1" id="foto1" ><br><br>
				 		</td>
					</tr>
					<tr>
						<td ALIGN=CENTER>
							<input type="file" name="foto2" id="foto2" ><br><br>
						</td>
					</tr>
					
					<tr>
					<td ALIGN=CENTER>
							<input type="file" name="foto3" id="foto3" ><br><br>
					</tr>
				</table>
						
				<table cellpadding='0' cellspacing='5' width="1" class='fo'>
					<tr>
						<td> </td>
						<td class="f1">SO AFECTADA </td>
						<td class="f1"> PARTE</td>
						<td class="f1"> JOB AFECTADO</td>
						<td class="f1"> CANTIDAD</td>
					</tr>
					
					<tr >
						<td> 1</td>
						<td>  <input type="text" name="so01" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /> </td>
						<td> <input type="text" name="parte01" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/> </td>
						<td> <input type="text" name="job01" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td> <input type="text" name="cantidad01" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/></td>
					</tr>
					
					<tr>
						<td> 2</td>
						<td> <input type="text" name="so02" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /></td>
						<td>  <input type="text" name="parte02" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/></td>
						<td> <input type="text" name="job02" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/></td>
						<td>  <input type="text" name="cantidad02" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/></td>
					</tr>
					
					<tr>
						<td> 3</td>
						<td> <input type="text" name="so03" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /></td>
						<td>  <input type="text" name="parte03" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/></td>
						<td><input type="text" name="job03" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td> <input type="text" name="cantidad03" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/> </td>
					</tr>
					
					<tr>
						<td> 4</td>
						<td> <input type="text" name="so04" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /></td>
						<td> <input type="text" name="parte04" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/> </td>
						<td><input type="text" name="job04" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td>  <input type="text" name="cantidad04" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/></td>
					</tr>
					
					<tr>
						<td> 5</td>
						<td> <input type="text" name="so05" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /></td>
						<td> <input type="text" name="parte05" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/> </td>
						<td> <input type="text" name="job05" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/></td>
						<td> <input type="text" name="cantidad05" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/> </td>
					</tr>
					
					<tr>
						<td> 6</td>
						<td> <input type="text" name="so06" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /></td>
						<td> <input type="text" name="parte06" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/> </td>
						<td><input type="text" name="job06" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td> <input type="text" name="cantidad06" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/> </td>
					</tr>
					
					<tr>
						<td> 7</td>
						<td> <input type="text" name="so07" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /></td>
						<td> <input type="text" name="parte07" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/> </td>
						<td><input type="text" name="job07" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td> <input type="text" name="cantidad07" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/> </td>
					</tr>
					
					<tr>
						<td> 8</td>
						<td> <input type="text" name="so08" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /></td>
						<td>  <input type="text" name="parte08" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/></td>
						<td> <input type="text" name="job08" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/></td>
						<td> <input type="text" name="cantidad08" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/> </td>
					</tr>
					
					<tr>
						<td> 9</td>
						<td> <input type="text" name="so09" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /></td>
						<td>  <input type="text" name="parte09" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/></td>
						<td> <input type="text" name="job09" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/></td>
						<td> <input type="text" name="cantidad09" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/> </td>
					</tr>
					
					<tr>
						<td> 10</td>
						<td> <input type="text" name="so10" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /></td>
						<td> <input type="text" name="parte10" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/> </td>
						<td> <input type="text" name="job10" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/></td>
						<td> <input type="text" name="cantidad10" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/> </td>
					</tr>
					
					<tr>
						<td>11</td>
						<td><input type="text" name="so11" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /> </td>
						<td> <input type="text" name="parte11" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/> </td>
						<td><input type="text" name="job11" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td> <input type="text" name="cantidad11" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/> </td>
					</tr>
					
					<tr>
						<td>12</td>
						<td> <input type="text" name="so12" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /></td>
						<td> <input type="text" name="parte12" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/> </td>
						<td><input type="text" name="job12" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td> <input type="text" name="cantidad12" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/> </td>
					</tr>
					
					<tr>
						<td>13</td>
						<td><input type="text" name="so13" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /> </td>
						<td> <input type="text" name="parte13" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/> </td>
						<td><input type="text" name="job13" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td>  <input type="text" name="cantidad13" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/></td>
					</tr>
					
					<tr>
						<td>14</td>
						<td> <input type="text" name="so14" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /></td>
						<td> <input type="text" name="parte14" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/> </td>
						<td><input type="text" name="job14" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td>  <input type="text" name="cantidad14" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/></td>
					</tr>
					
					<tr>
						<td>15</td>
						<td><input type="text" name="so15" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /> </td>
						<td>  <input type="text" name="parte15" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/></td>
						<td><input type="text" name="job15" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td>  <input type="text" name="cantidad15" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/></td>
					</tr>
					
					<tr>
						<td>16</td>
						<td><input type="text" name="so16" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /> </td>
						<td>  <input type="text" name="parte16" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/></td>
						<td><input type="text" name="job16" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td>  <input type="text" name="cantidad16" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/></td>
					</tr>
					
					<tr>
						<td>17</td>
						<td><input type="text" name="so17" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /> </td>
						<td>  <input type="text" name="parte17" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/></td>
						<td><input type="text" name="job17" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td>  <input type="text" name="cantidad17" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/></td>
					</tr>
					
					
					<tr>
						<td>18</td>
						<td><input type="text" name="so18" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /> </td>
						<td>  <input type="text" name="parte18" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/></td>
						<td><input type="text" name="job18" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td>  <input type="text" name="cantidad18" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/></td>
					</tr>
					
					<tr>
						<td>19</td>
						<td><input type="text" name="so19" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /> </td>
						<td>  <input type="text" name="parte19" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/></td>
						<td><input type="text" name="job19" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td>  <input type="text" name="cantidad19" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/></td>
					</tr>
					
					<tr>
						<td>20</td>
						<td><input type="text" name="so20" class="input_ncpr" title="El campo no puede estar vacio." placeholder="SO AFECTADA" /> </td>
						<td>  <input type="text" name="parte20" class="input_ncpr" title="El campo no puede estar vacio." placeholder="PARTE"/></td>
						<td><input type="text" name="job20" class="input_ncpr" title="El campo no puede estar vacio." placeholder="JOB AFECTADO"/> </td>
						<td>  <input type="text" name="cantidad20" class="input_ncpr" title="El campo no puede estar vacio." placeholder="CANTIDAD"/></td>
					</tr>
				</table>

				<div id="boton_generar">
					<input type="submit" name="ok" id="ok" value="GENERAR DESVIACION" />
				</div>
			</form>
		</div>
	</body>

	<script type="text/javascript">
		$( document ).ready(function() {
		    $("#idFecha1").datepicker();
		   	$("#idFecha2").datepicker();
		     
		});
	</script>
</html>