<?php 
	require("../index.php");
	include_once ("../iniciar.php");

	if($_SESSION['Tipo_Usuario']!='Visitante')
	{
?>

<html>
	<head>
	    <meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../css/estilos.css" />
        <script type="text/javascript" src="../js/sorter.js"></script>
	</head>
	
	<body>  
		<h1> REPORTE DE DOCUMENTOS </h1> 

		<div id="estilo">
			<?php
				include_once("../DBManager.php");

				$objCon = new DBManager;
				if ($objCon->conectar()==true)
				{
					$sql="SELECT * FROM tbdocumento";
					
					

					$datos=mysql_query($sql);
					
					echo "<table cellpadding='0' cellspacing='0' border='1' class='sortable' id='sorter'>"; 
					echo 
						"<tr>
							<td class='celda'><b> ID </b></td> 
							<td class='celda'><b> TIPO DE DOCUMENTO </b></td> 
							<td class='celda'><b> NUMERO DE PARTE </b></td> 
							<td class='celda'><b> REVISION </b></td> 
							<td class='celda'><b> ULTIMA REVISION </b></td> 
							<td class='celda'><b> DESCRIPCION </b></td> 
							<td class='celda'><b> AREA/PROCESO </b>
							<td class='celda'><b> NUMERO DE CONTROL </b>
							<td class='celda'><b> FECHA DE LA REVISION </b></td> 
							<td class='celda'><b> SUBIDO POR </b></td> 
							<td class='celda'><b> FEEDBACKS PENDIENTES </b></td> 
							<td class='celda'><b> ENLACE </b></td> 
							<td class='celda'><b> EDITAR </b></td> 
							<td class='celda'><b> ELIMINAR </b></td> 
						</tr>";
					while ($row=mysql_fetch_array($datos)) 
					{ 
						echo 
							"<tr>
    							<td class='celda'>$row[Id_Documento]</td>
								<td class='celda'>$row[Tipo_Documento]</td>
								<td class='celda'>$row[Numero_Parte]</td>
								<td class='celda'>$row[Revision]</td>			
								<td class='celda'>$row[Ultima_Revision]</td>
								<td class='celda'>$row[Descripcion]</td>
								<td class='celda'>$row[Area_Proceso]</td>
								<td class='celda'>$row[Numero_Control]</td>
								<td class='celda'>$row[Fecha_Proceso]</td>
								<td class='celda'>$row[Subido_Por]</td>
								<td class='celda'><a href='./ReporteFeedbacksv2.php?idd=$row[Id_Documento]'>$row[Feedback]</a></td>
								<td class='celda'><a href='../documentos/$row[Numero_Parte]_$row[Revision].$row[Enlace]' download> Descargar  </a></td>
								<td class='celda'><a href='../ModificarDocumento.php?idt=$row[0]'> Editar </a></td>
								<td class='celda'><a href='../libraries/ProcesarAdvertenciaDocumento.php?idf=$row[Id_Documento]'> Eliminar </a></td>
							</tr> \n"; 
					}
					echo "</table> \n"; 					
					
				}
			?>
		</div>
		<br/><br/>
		<script type="text/javascript">
			var sorter=new table.sorter("sorter");
			sorter.init("sorter", 0);
		</script>
	</body>  
</html>
<?php
	}
	else
	{
		header('Location: ../index.php');
	}
?>