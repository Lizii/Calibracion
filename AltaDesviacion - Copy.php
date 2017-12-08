<?php
    include_once ("iniciar.php"); 
?>

<html> 
    <head>
	    <meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" />
        <link rel="icon" type="image/png" href="img/NCPR logo.png" />
        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker-es.js"></script>	

	</head>
	
	<body>
		<div id="contenedor">
			<?php 
				include_once("menu.php");
			?>
			
			<h1> ALTA DE NCPR </h1>
			
			<form action="./libraries/procesarAltaDesviacion.php" method="post" name="datos" enctype="multipart/form-data" .disabled=true;>
				<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
					<tr>	
						<td width="300"> GENERADO POR: </td>
						<td>
							<input type="text" name="generado_por" id="generado_por" class="input_ncpr" value='<?php echo "$_SESSION[nombre]"; ?>' disabled />
							
							<input type="hidden" name="generado" id="generado" class="input_ncpr" value='<?php echo "$_SESSION[nombre]"; ?>' />
							
						</td>
						
					</tr>
					
					<tr>
						<td> REQUERIDO POR: </td>
						<td><input type="text" name="requerido" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Requerido por" required /></td>
						
					</tr>

					<tr>
						<td> NUMERO DE PARTE A REEMPLAZAR: </td>
						<td> <input type="text" name="specparte" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Número de parte a reemplazar" required /></td>
						
					</tr>
					
					<tr>
						<td> DESCRIPCION DEL PRODUCTO O PARTE A REEMPLAZAR:</td>
						<td> <input type="text" name="specdesc" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Descripción del producto o parte a reemplazar" required /></td>
						
					</tr>
					
					<tr>
						<td> NUMERO DE PARTE A UTILIZAR: </td>
						<td> <input type="text" name="parte" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Número de parte a utilizar" required /></td>
						
					</tr>
					
					<tr>
						<td> DESCRIPCION DEL PRODUCTO O PARTE A UTILIZAR:</td>
						<td> <input type="text" name="descparte" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Descripción del producto o parte a utilizar" required /></td>
						
					</tr>
										
					<tr>
						<td> DESCRIPCION DEL CAMBIO: </td>
						<td> <input type="text" name="desc_cambio" min="1" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Descripcion del cambio" required /></td>
					</tr>	
					
					<tr>
						<td> RAZON DEL CAMBIO: </td>
						<td> <input type="text" name="razoncambio" min="1" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Razon del cambio" required /></td>
					</tr>		
										
					<tr>
						<td> VALIDADO POR SOSTENIMIENTO: </td>
						<td> <input type="text" name="sostenimiento" min="1" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Validado por sostenimiento" required /></td>
					</tr>						
					
					<tr>
						<td> VALIDADO POR CALIDAD: </td>
						<td> <input type="text" name="calidad" min="1" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Validado por calidad" required /></td>
					</tr>									
										
			</table>
			
		<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
		
			<tr>
				<td> REQUIERE ACCION CORRECTIVA?: </td>
				<td> <input type="text" name="accion" min="1" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Requiere accion correctiva?" required /></td>
				
			</tr>					
			
			<tr>
				<td> FECHA DE EXPIRACION: </td>
				<td> <input type="text" name="expiracion" min="1" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Fecha de expiracion" required /></td>
				
			</tr>					
			
			<tr>
				<td> CANTIDAD A PRODUCIRSE: </td>
				<td> <input type="number" name="cantidad" min="1" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Cantidad a producirse" required /></td>
			</tr>

			<tr>
				<td> STATUS: </td>
				<td> <input type="text" name="status" min="1" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Status" required /></td>
			</tr>	
			
			<tr>
				<td> POR PETICION DE: </td>
				<td> <input type="text" name="peticion" min="1" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Por peticion de" required /></td>
			</tr>	
		

		</table>		
		
		<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
		
			<tr>
				<td colspan=4 ALIGN=CENTER> FIRMAS DE APROBACION </td>
			</tr>
		
			<tr>
				<td> CALIDAD E INGENIERIA</td>
				<td> PRODUCCION</td>
				<td> MATERIALES</td>
				<td> GERENTE DE PLANTA</td>
			</tr>	

			<tr>
				<td> <input type="checkbox" name="campo1" id="campo1" value="" /></td>
				<td> <input type="checkbox" name="campo2" id="campo2" value="" /></td>
				<td> <input type="checkbox" name="campo3" id="campo3" value="" /></td>
				<td> <input type="checkbox" name="campo4" id="campo4" value="" /></td>
			</tr>				
			
			<tr>
				<td colspan=4 ALIGN=CENTER> FIRMAS ADICIONALES DE APROBACION </td>
			</tr>
		
			<tr>
				<td> VP DE OPERACIONES</td>
				<td>SERVICIO AL CLIENTE RD</td>
				<td> INGENIERIA RD</td>
				<td> MATERIALES RD</td>
			</tr>		
		
			<tr>
				<td> <input type="checkbox" name="campo5" id="campo5" value="" /></td>
				<td> <input type="checkbox" name="campo6" id="campo6" value="" /></td>
				<td> <input type="checkbox" name="campo7" id="campo7" value="" /></td>
				<td> <input type="checkbox" name="campo8" id="campo8" value="" /></td>
			</tr>			
		

		</table>		
		


		<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
					<tr>
						<td width="300"> ARCHIVO FOTOGRAFICO: </td>
						<td>
							<input type="file" name="foto1" id="foto1" ><br><br>
				 		</td>
					</tr>
					
					<tr>
					<td></td>
					<td><input type="file" name="foto2" id="foto2" ><br><br></td>
					</tr>
					
					<tr>
					<td></td>
					<td><input type="file" name="foto3" id="foto3" ><br><br></td>
					</tr>
					
				</table>
				
				
				
		<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
		
			<tr>
				<td> </td>
				<td>SO AFECTADA </td>
				<td> PARTE</td>
				<td> JOB AFECTADO</td>
				<td> CANTIDAD</td>
			</tr>
			
			<tr>
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
					<input type="submit" name="ok" id="ok" value="GENERAR NCPR" />
				</div>
			</form>	

			<br>	
			
			<form action="reports/ReporteNcprs.php" >
				<div id="boton_reporte">
					<input type="submit" value="REPORTE"/>
				</div>
			</form>
		</div>
	</body> 
</html>