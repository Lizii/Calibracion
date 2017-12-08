
<?php
    include_once ("../iniciar.php"); 
?>

<!DOCTYPE html> 
    <head>
	    <meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/ncpr/css/menureporte.css" media="screen">
		<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" />
		<link rel="stylesheet" type="text/css" href="/ncpr/css/estilos.css" />
        <link rel="icon" type="image/png" href="/ncpr/img/NCPR logo.png" />
        <script type="text/javascript" src="/ncpr/js/sorter.js"></script>
	</head>
	
	<body> 
		<?php 
			include_once("../menureporte.php");
		?>
		<h1> REPORTE DE NCPR's </h1>
		<div>
			<form action="../AltaNcpr.php" >
				<div id="boton_alta">
					<input type="submit" value="Alta de NCPR"/>
				</div>
			</form>

			<form action="ReporteNcprsExcel.php" >
				<div id="boton_alta">
					<input type="submit" value="Descargar reporte" />
					<br><img src='../img/excel.png' width='90' height='97'/>
				</div>
			</form>
		</div>
		
		<div id="reporte">
			<?php
				include_once("../DBManager.php");
				
				$objCon = new DBManager;
				if ($objCon->conectar()==true)
				{
					$sql="SELECT *FROM tbncprs ORDER BY id_Folio";

					$datos=mysql_query($sql);

					echo "<table cellpadding='0' cellspacing='0' border='1' class='sortable' id='sorter'>"; 
					echo 
						"<tr>
							<th><b> LINK </b></td>
							<th><b> # DE ORDEN </b> </td> 
							<th><b> # DE PARTE </b> </td> 
							<th><b> TURNO </b></td>
							<th><b> DESCRIPCION DEL PRODUCTO </b></td> 
							<th><b> NOMBRE DEL PROVEEDOR </b></td> 
							<th><b> REPORTADO POR </b></td> 
							<th><b> GENERADO POR </b></td> 
							<th><b> FECHA </b></td> 
							<th><b> HORA </b></td> 
							<th><b> AREA/DEPARTAMENTO DONDE SE DETECTO </b></td> 
							<th><b> ORIGEN DE LA FALLA </b></td> 
							<th><b> # DE PIEZAS </b></td> 
							<th><b> # DE PIEZAS RECHAZADAS </b></td>
							<th><b> DESCRIPCION DE LA FALLA </b></td> 
							<th><b> RAZON DE RECHAZO </b></td>  
							<th><b> LOCACION DE LA FALLA </b></td> 
							<th><b> DISPOSICION DEL PRODUCTO </b></td>  
							<th><b> ACCION CORRECTIVA</b></td>
							<th><b> DESTINO</b></td>
						</tr>"; 

					while ($row=mysql_fetch_array($datos)) 
					{ 
						$f_anio=substr($row['Fecha'],0,4);
						$f_mes=substr($row['Fecha'],5,2);
						$f_dia=substr($row['Fecha'],8,2);

						echo 
							"<tr>
								<td><a href='../ncpr/$row[Nombre_PDF].PDF' target='_blank'> $row[Nombre_PDF].PDF</a></td>
								<td> $row[Numero_Orden] </td>
								<td> $row[Numero_Parte] </td>
								<td> $row[Turno] </td>
								<td> $row[Descripcion_Producto] </td>
								<td> $row[Nombre_Proveedor] </td>
								<td> $row[Reportado_Por] </td>
								<td> $row[Generado_Por] </td>
								<td> $f_mes/$f_dia/$f_anio </td>
								<td> $row[Hora] </td>
								<td> $row[Area_Dept_Codigo]</td>
								<td> $row[Origen_Falla_Detectada] </td>
								<td> $row[Numero_Piezas] </td>
								<td> $row[Numero_Piezas_Rechazadas] </td>
								<td> $row[Descripcion] </td>
								<td> $row[Razon_Rechazo] </td>
								<td> $row[Locacion_Falla] </td>
								<td> $row[Disposicion_Producto] </td>
								<td> $row[Accion_Correctiva] </td>
								<td> $row[Destino] </td>
							</tr>"; 
					}	
					echo "</table>";			
				}
			?> 
		</div>

		<script type="text/javascript">
			var sorter=new table.sorter("sorter");
			sorter.init("sorter", 0);
		</script>
	</body> 
</html>