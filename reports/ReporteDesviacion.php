
<?php
    include_once ("../iniciar.php");
    include_once("../DBManager.php");
?>

<!DOCTYPE html> 
    <head>
	    <meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/ncpr/css/menureporte.css" media="screen">
		
		<!-- <link rel="stylesheet" type="text/css" href="/ncpr/css/estilos.css" /> -->
        <link rel="icon" type="image/png" href="/ncpr/img/NCPR logo.png" />
        	
        <!-- TableSorter -->
		<script type="text/javascript" src="../js/jquery-latest.js"></script> 
		<script type="text/javascript" src="../js/jquery.tablesorter.js"></script> 
		<link rel="stylesheet" href="../css/tablesorter.css">
		<link rel="stylesheet" href="../css/theme.blue.css">

		<!-- Pager -->
		<script type="text/javascript" src="../pager/jquery.tablesorter.pager.js"></script>
		<link rel="stylesheet" href="../pager/jquery.tablesorter.pager.css">

		<!-- This Page CSS -->
		<link rel="stylesheet" href="../css/ReporteDesviacion.css">

	</head>
	<body> 
		<?php 
			include_once("../menu.php");
		?>
		<div id="divContainer">
			<div id="divText">
				REPORTE DE DESVIACIÓN
				<hr id="idHr">
			</div>

			<!-- <form action="../AltaDesviacion.php" >
				<div id="boton_alta">
					<input type="submit" value="Alta de NCPR"/>
				</div>
			</form> -->
			<div id="divDownload">
				<form action="../aexcel.php" >
					<div id="boton_alta">
						<input type="submit" value="Descargar Reporte" />
						<!-- <br><img src='../img/excel.png' width='70' height='77'/> -->
					</div>
				</form>
			</div>
				
			<div id="divTable">
				<?php
					$objCon = new DBManager;
					if ($objCon->conectar()==true)
					{
						$sql = "SELECT tbdesviaciones.Id, tbdesviaciones.Nombre_Desviacion, tbdesviaciones.Generado, tbdesviaciones.Fecha, tbdesviaciones.Spec_Parte, tbdesviaciones.Spec_Desc, tbdesviaciones.Dev_Parte, tbdesviaciones.Dev_Desc, tbdesviaciones.Desc_Cambio,tbdesviaciones.Razon_Cambio, tbdesviaciones.Validado_Sustaining, tbdesviaciones.Validado_Quality, tbdesviaciones.Fecha_Expiracion, tbdesviaciones.Cantidad_Producirse, tbdesviaciones.Status, tbdesviaciones.Peticion_Por, tbdesviaciones.Accion_Correctiva, tbdevdata.So, tbdevdata.Pn, tbdevdata.Job, tbdevdata.Qty FROM tbdesviaciones, tbdevdata WHERE tbdesviaciones.Id=tbdevdata.Id ORDER BY Id DESC";
						$datos = mysql_query($sql);

						$numRows = 0;
						if (mysql_num_rows($datos) > 0 ) {
							$numRows = mysql_num_rows($datos); //number of rows retrieved
						}
						

						echo "Total: $numRows";
						echo "<table border='1' id='myTable' class='tablesorter-blue'>
						 	<thead>
						 		<tr>
									<th>FOLIO</th>
									<th>IMPRIMIR</th>
									<th>DESVIACIÓN</th>
									<th>GENERADO POR</th>
									<th>FECHA</th>
									<th>P/N A REEMPLAZAR</th>
									<th>DESCRIPCIÓN</th> 
									<th>P/N A UTILIZAR</th> 
									<th>DESCRIPCIÓN</th> 
									<th>DESCRIPCIÓN DEL CAMBIO</th> 
									<th>RAZÓN</th>
									<th>VALIDADO POR SOSTENIMIENTO</th>
									<th>VALIDADO POR CALIDAD</th></th>
									<th>FECHA DE EXPIRACIÓN</th>
									<th>CANTIDAD</th>
									<th>STATUS</th>  
									<th>PETICIÓN POR</th> 
									<th>ACCIÓN CORRECTIVA</th>
									<th>SO#</th>
									<th>PART NAME</th>
									<th>JOB AFFECTED</th>
									<th>QUANTITY</th>
								
								</tr>
							</thead>
							<tbody>"; 

						while ($row=mysql_fetch_array($datos)) 
						{ 
							$filename = "DESV/DEV"."$row[Id].pdf";
						echo 	"<tr>
									<td> $row[Id]</td>
									<td><a href='../print_from_server.php?filename=$filename' target='_blank'>Imprimir</a></td>
									<td><a href='../DESV/DEV"."$row[Id].PDF' target='_blank'>DEV"."$row[Id].PDF</a></td>
									<td> $row[Generado] </td>
									<td> $row[Fecha] </td>
									<td> $row[Spec_Parte] </td>
									<td> $row[Spec_Desc] </td>
									<td> $row[Dev_Parte] </td>
									<td> $row[Dev_Desc] </td>
									<td> $row[Desc_Cambio] </td>
									<td> $row[Razon_Cambio]</td>
									<td> $row[Validado_Sustaining] </td>
									<td> $row[Validado_Quality] </td>
									<td> $row[Fecha_Expiracion] </td>
									<td> $row[Cantidad_Producirse] </td>
									<td> $row[Status] </td>
									<td> $row[Peticion_Por] </td>
									<td> $row[Accion_Correctiva] </td>
									<td> $row[So] </td>
									<td> $row[Pn] </td>
									<td> $row[Job] </td>
									<td> $row[Qty] </td>
								</tr>"; 
						}	
						echo "</tbody>
						</table>";			
					}
				?> 
				<div id="pager" class="pager">
					<form>
						<img src="../pager/icons/first.png" class="first"/>
						<img src="../pager/icons/prev.png" class="prev"/>
						<span class="pagedisplay"></span>
						<img src="../pager/icons/next.png" class="next"/>
						<img src="../pager/icons/last.png" class="last"/>
						<select class="pagesize">
							<option value="all">Show All</option>
							<option value="10">10</option>
							<option value="25">25</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select>
					</form>
				</div>
			</div>
			
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
			$("#myTable").tablesorter();
			$("#myTable").tablesorterPager({container: $("#pager"), size: "10"}); 
	    });
		</script>
	</body> 
</html>