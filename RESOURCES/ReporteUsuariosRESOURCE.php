<?php 
	require("../index.php");
	include_once ("../iniciar.php");

	if($_SESSION['Tipo_Usuario']=='Administrador')
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
		<h1> REPORTE DE USUARIOS </h1> 

		<div id="estilo">
			<?php
				include_once("../DBManager.php");

				$objCon = new DBManager;
				if ($objCon->conectar()==true)
				{
					$sql="SELECT * FROM tbusuario ORDER BY Id_Usuario ASC";

					$datos=mysql_query($sql);
					
					echo "<table cellpadding='0' cellspacing='0' border='1' class='sortable' id='sorter'>"; 
					echo 
						"<tr>
							<td class='celda'><b> ID </b></td> 
							<td class='celda'><b> Usuario </b></td> 
							<td class='celda'><b> Tipo de Usuario </b></td> 
						</tr>";
					while ($row=mysql_fetch_array($datos)) 
					{ 
						echo 
							"<tr>
    							<td class='celda'>$row[Id_Usuario]</td>
								<td class='celda'>$row[Usuario]</td>
								<td class='celda'>$row[Tipo_Usuario]</td>
							</tr> \n"; 
					}
					echo "</table> \n"; 					
					
				}
			?>
		</div>
		<br/><br/>
		<script type="text/javascript">
			var sorter=new table.sorter("sorter");
			sorter.init("sorter", 1);
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


