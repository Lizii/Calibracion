
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
					$sql="SELECT *FROM tbdesviaciones ORDER BY Id";

					$datos=mysql_query($sql);

					echo "<table cellpadding='0' cellspacing='0' border='1' class='sortable' id='sorter'>"; 
					echo 
						"<tr>
							<th><b> LINK </b></td>
							<th><b> DESVIACION </b> </td> 
							<th><b> GENERADO POR </b> </td> 
							<th><b> REQUERIDO POR </b></td>
							<th><b> FECHA </b></td> 
							<th><b> P/N A REEMPLAZAR </b></td> 
							<th><b> DESCRIPCION</b></td> 
							<th><b> P/N A UTILIZAR</b></td> 
							<th><b> DESCRIPCION</b></td> 
							<th><b> DESCRIPCION DEL CAMBIO </b></td> 
							<th><b> RAZON </b></td> 
							<th><b> VALIDADO POR SOSTENIMIENTO </b></td> 
							<th><b> VALIDADO POR CALIDAD</b></td> 
							<th><b> FECHA DE EXPIRACION </b></td>
							<th><b> CANTIDAD </b></td> 
							<th><b> STATUS </b></td>  
							<th><b> PETICION POR </b></td> 
							<th><b> ACCION CORRECTIVA </b></td>  
							<th><b> FIRMA CALIDAD E INGENIERIA</b></td>
							<th><b> FIRMA PRODUCCION</b></td>
							<th><b> FIRMA MATERIALES</b></td>
							<th><b> FIRMA GERENTE DE PLANTA</b></td>
							<th><b> FIRMA ADICIONAL VP</b></td>
							<th><b> FIRMA ADICIONAL CUSTOMER SERVICE</b></td>
							<th><b> FIRMA ADICIONAL INGENIERIA RD</b></td>
							<th><b> FIRMA ADICIONAL MATERIALES RD</b></td>
						</tr>"; 

					while ($row=mysql_fetch_array($datos)) 
					{ 
						echo 
							"<tr>
								<td> $row[Id]</td>
								<td> $row[Nombre_Desviacion] </td>
								<td> $row[Generado] </td>
								<td> $row[Requerido] </td>
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
								<td> $row[Firma_QE] </td>
								<td> $row[Firma_Produccion] </td>
								<td> $row[Firma_Materiales] </td>
								<td> $row[Firma_Gerente] </td>
								<td> $row[Ad_Firma_Vp] </td>
								<td> $row[Ad_Firma_Cs] </td>
								<td> $row[Ad_Firma_Eng] </td>
								<td> $row[Ad_Firma_Materials] </td>
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