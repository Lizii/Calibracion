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
			
			<h1> NUEVO FORMATO DE NCPR </h1>
			
			<form action="/ncpr/libraries/pdffileV3.php" method="post" name="datos" enctype="multipart/form-data" >
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
						<td width="300"> ARCHIVO FOTOGRAFICO: </td>
						<td>
							<input type="file" name="foto4" id="foto4" ><br><br>
			 			</td>
					</tr>
						
					<tr>
						<td></td>
						<td><input type="file" name="foto5" id="foto5" ><br><br></td>
					</tr>
						
					<tr>
						<td></td>
						<td><input type="file" name="foto6" id="foto" ><br><br></td>
					</tr>
				</table>

				<div id="boton_generar">
					<input type="submit" name="ok" id="ok" value="ENVIAR NCPR" />
				</div>
			</form>	

			<br>	
		</div>
	</body> 
</html>