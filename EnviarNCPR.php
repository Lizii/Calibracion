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
	</head>
	
	<body>
		<div id="contenedor">
			<?php 
				include_once("menu.php");
			?>
			
			<h1> ENVIAR NCPR </h1>
			
			<form action="./libraries/procesarEnviarNcpr.php" method="post" name="datos" enctype="multipart/form-data">
				<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
					<tr>	
						<td width="300"> GENERADO POR: </td>
						<td>
							<input type="text" name="generado_por" id="generado_por" class="input_ncpr" value='<?php echo "$_SESSION[nombre]"; ?>' disabled />
						</td>
					</tr>
					
					<tr>
						<td> NUMERO DE NCPR: </td>
						<td><input type="text" name="ncpr" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Número de NCPR" required /></td>
					</tr>
				</table>

				<div id="boton_generar">
					<input type="submit" name="buscar" id="buscar" value="BUSCAR" />
				</div>
			</form>	

			<br>	
			
			<form action="libraries/procesarEnviarNCPR.php" >
				<div id="boton_reporte">
					<input type="submit" value="ENVIAR"/>
				</div>
			</form>
		</div>
	</body> 
</html>