<?php 
	require("./index.php");
	include_once ("./iniciar.php");

	if($_SESSION['Tipo_Usuario']!='Visitante')
	{
?>

<html>
    <head>
	    <meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" />
		<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
	</head>
	
	
			<?php
				include_once("./DBManager.php");

				$objCon = new DBManager;
				
				$IDDOCUMENTO=$_GET['idt'];
				
				if ($objCon->conectar()==true)
				{
					$sql="SELECT * FROM tbdocumento WHERE Id_Documento=$IDDOCUMENTO";
					$datos=mysql_query($sql);
					
					$row=mysql_fetch_array($datos);

					$NUMEROPARTE=strtoupper($row['Numero_Parte']);
					$DESCRIPCION=strtoupper($row['Descripcion']);
					$REVISION=strtoupper($row['Revision']);
					$FECHAREVISION=strtoupper($row['Fecha_Proceso']);
					$AREAPROCESO=strtoupper($row['Area_Proceso']);
					$NUMEROCONTROL=strtoupper($row['Numero_Control']);
					$TIPO=strtoupper($row['Tipo_Documento']);
					
				}
			?>
	
	<body>  
		
		<h1> EDITAR DOCUMENTO </h1> 

		<div id="estilo">

		<form action='./libraries/procesarModificarDocumento.php' method="post" name="datos">
		
			<table cellpadding='0' cellspacing='0' border='1' class='sortable' id='sorter'>
			
				<tr>
				<th><b> NUMERO DE PARTE</td>
				<th><b> <input type="text" name="numeroparte" id="numeroparte" value="<?php echo "$NUMEROPARTE"; ?>" required /> </b></td>
				</tr>
				
				<tr>
				<th><b> DESCRIPCION</b></td>
				<th><b> <input type="text" name="descripcion" id="descripcion" value="<?php echo "$DESCRIPCION"; ?>" required /> </b></td>
				</tr>
				
				<tr>
				<th><b> REVISION</b></td>
				<th><b> <input type="text" name="revision" id="revision" value="<?php echo "$REVISION"; ?>" required /> </b></td>
				</tr>
				
				<tr>
				<th><b> FECHA DE LA REVISION</b></td>
				<th><b> <input type="text" name="fecharevision" id="fecharevision" value="<?php echo "$FECHAREVISION"; ?>" required /> </b></td>
				</tr>
				
				<tr>
				<th><b> AREA/PROCESO</b></td>
				<th><b> <input type="text" name="areaproceso" id="areaproceso" value="<?php echo "$AREAPROCESO"; ?>" required />  </b></td>
				</tr>
				
				<tr>
				<th><b> NUMERO DE CONTROL</b></td>
				<th><b><input type="text" name="numerocontrol" id="numerocontrol" value="<?php echo "$NUMEROCONTROL"; ?>" required /></b></td>
				</tr>
				
				
				<tr>
				<th><b> TIPO DE DOCUMENTO </b></td>
				<th><b> <input type="text" name="tipodocumento" id="tipodocumento" value="<?php echo "$TIPO"; ?>" required /> </b></td>
				</tr>
				
			</table>

			</br>

			<input type="hidden" name="iddocumento" id="iddocumento" value="<?php echo "$IDDOCUMENTO"; ?>" />
			
			
			<div>
				<input type="submit" name="Guardar" value="GUARDAR" />
			</div>
		</form>		
		
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