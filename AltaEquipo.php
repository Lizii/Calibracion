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
			
			<h1 class="hi"> ALTA DE EQUIPO </h1>
			
			<form action="./libraries/procesarAltaEquipo.php" method="post" name="datos" enctype="multipart/form-data" .disabled=true;>
				<table cellpadding='0' cellspacing='5' width="1" class='fo'>
					<tr>	
						<td class="f" width="300"> REQUERIDA POR: </td>
						<td>
							<input type="text" name="requerida_por" id="generado_por" class='ff' value='<?php echo "$_SESSION[nombre]"; ?>' disabled />
							<input type="hidden" name="generado" id="generado" class="input_ncpr" value='<?php echo "$_SESSION[nombre]"; ?>' />
						</td>
					</tr>


					<tr>
						<td class="f"> EQUIPO </td>
						<td> <input type="text" name="equipo" class="ff" title="El campo no puede estar vacio." placeholder="EQUIPO" required /></td>
					</tr>
					
					<tr>
						<td class="f"> NUMERO DE SERIE:</td>
						<td> <input type="text" name="serie" class="ff" title="El campo no puede estar vacio." placeholder="NUMERO DE SERIE" required /></td>
					</tr>
					
					<tr>
						<td class="f"> TIEMPO DE EXPIRACION: </td>
						<td> <input type="text" name="tiempo" class="ff" title="El campo no puede estar vacio." placeholder="TIEMPO DE EXPIRACION" required /></td>
					</tr>
					
					<tr>
				   		<td> ULTIMA ACTUALIZACION: </td>
				    	<td> <input type="text" name="UActualizacion" id="idFecha2" class="ff" title="El campo no puede estar vacio." placeholder="FECHA DE ACTUALIZACION" required /></td>
				    </tr>
					
					<tr>
						<td class="f"> VALORES: </td>
						<td> <input type="text" name="VALORES" class="ff" title="El campo no puede estar vacio." placeholder="VALORES DE CALIBRACION" required /></td>
					</tr>	
							
				</table>
	
	
				<div id="boton_generar">
					<input type="submit" name="ok" id="ok" value="GENERAR ALTA" />
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