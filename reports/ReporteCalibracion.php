
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
				REPORTE DE CALIBRACIONES
				<hr id="idHr">
			</div>

			<!-- <form action="../AltaDesviacion.php" >
				<div id="boton_alta">
					<input type="submit" value="Alta de NCPR"/>
				</div>
			</form> -->
			<div id="divDownload">
				<form action="../ExcelCalibracion.php" >
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
						$sql = "SELECT id_equipo, Equipo, Numero_serie, Tiempo FROM tbequipo";
						$datos = mysql_query($sql);

						$numRows = 0;
						if (mysql_num_rows($datos) > 0 ) {
							$numRows = mysql_num_rows($datos); //number of rows retrieved
						}
						

						echo "Total: $numRows";
						echo "<table border='1' id='myTable' class='tablesorter-blue'>
						 	<thead>
						 		<tr>
									<th>ID_Equipo</th>
									<th>EQUIPO</th>
									<th>NUMERO DE SERIE</th>
									<th>TIEMPO</th>
								
								
								</tr>
							</thead>
							<tbody>"; 

						while ($row=mysql_fetch_array($datos)) 
						{ 
					
						echo 	"<tr>
								
									
									<td> $row[id_equipo] </td>
									<td> $row[Equipo] </td>
									<td> $row[Numero_serie] </td>
									<td> $row[Tiempo] </td>
									
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