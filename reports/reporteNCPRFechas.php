<?php
	include_once("../iniciar.php"); 
?>

<!DOCTYPE html>
	<head>
		<title> Reporte de Entradas </title>
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/ncpr/css/estilos.css" />
		<link type="text/css" rel="stylesheet" href="/ncpr/css/jquery-ui-1.8.2.custom.css" />
        <link rel="icon" type="image/png" href="/ncpr/img/NCPR logo.png" />
        <script type="text/javascript" src="/ncpr/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="/ncpr/js/jquery-ui-1.8.2.custom.min.js"></script>
		<script type="text/javascript" src="/ncpr/js/jquery.ui.datepicker-es.js"></script>	

        <script type="text/javascript">
			jQuery(document).ready(function()
			{
				/* **** Función que muestra un calendario **** */
				$(function() {
					$.datepicker.setDefaults($.datepicker.regional["es"]);
					$("#vminimo").datepicker({
					});
				});

				$(function() {
					$.datepicker.setDefaults($.datepicker.regional["es"]);
					$("#vmaximo").datepicker({
					});
				});
				/* **** Termina la función par mostrar un calendario **** */
			});
		</script>
	</head>
	
	<body>
		<div id="contenedor">
			<?php 
				include_once("../menu.php");
			?>

			<br></br>
			<h1> REPORTE DE NCPR'S POR FECHA </h1>
					
			<form action="../libraries/procesarReporteNCPRFecha.php" method="post" name="datos">
				<div class="contenedor_tabla">
					<table cellpadding='0' cellspacing='0' border='1' class='tabla_reporte_fecha'>
						<tr>
							<td colspan='2' class="titulo_th"> Reporte generado por rangos de fechas </td>
						</tr>

						<tr>
							<td> 
								<label> Fecha inicial: </label> 
							</td>

							<td> 
								<input type="text" name="vminimo" id="vminimo" class="input_ncpr" placeholder="dd/mm/aaaa" class="nombre" required />
							</td>
						</tr>

						<tr>
							<td> 
								<label> Fecha final: </label>
							</td>

							<td> 
								<input type="text" name="vmaximo" id="vmaximo" class="input_ncpr" placeholder="dd/mm/aaaa" class="nombre" required />
							</td>
						</tr>
					</table>
				</div>

				<div id="boton_alta">
					<input type="submit" name="enviar" value="Enviar"> 
					<input type="reset" name="borrar_campo" value="Borrar Campos">
				</div>
				<br>
			</form>
		</div>
	</body>
</html>