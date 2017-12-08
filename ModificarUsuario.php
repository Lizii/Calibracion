<?php
    include_once ("iniciar.php"); 

    if($_SESSION['tipo_usuario']=="Administrador")
    {
?>

<html> 
    <head>
	    <meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
        <link rel="icon" type="image/png" href="img/NCPR logo.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

	</head>

	<?php
		include_once("./DBManager.php");

		$objCon = new DBManager;
		
		$IDUSUARIO=$_GET['ida'];
		
		if ($objCon->conectar()==true)
		{
			$sql="SELECT * FROM tbusuarios WHERE id_Usuario=$IDUSUARIO";
			$datos=mysql_query($sql);
			
			$row=mysql_fetch_array($datos);

			$USUARIO=ucwords($row['Usuario']);
			$PWD=$row['Pwd'];
			$TIPO=$row['Tipo_Usuario'];
			$NOMBRE=ucwords(strtolower($row['Nombre']));
			$NUMERO=$row['Numero_Empleado'];
			$CORREO=strtolower($row['Correo']);
		}
	?>
	
	<body>
		<div id="contenedor">
			<?php 
				include_once("menu.php");
			?>
			
			<h1> MODIFICACION DE USUARIO </h1>
			
			<form action="./libraries/procesarModificarUsuario.php" method="post" name="datos" enctype="multipart/form-data" .disabled=true;>
				<table cellpadding='0' cellspacing='0' border='1' class='tabla_altas'> 
					<tr>
						<td> USUARIO: </td>
						<td><input type="text" name="usuario" required="true" title="El campo no puede estar vacio." value="<?php echo "$USUARIO"; ?>" /></td>
					</tr>

					<tr>
						<td> CONTRASEÑA: </td>
						<td> <input type="password" name="pwd" required="true" title="El campo no puede estar vacio." value="<?php echo "$PWD"; ?>"/></td>
					</tr>
					
					<tr>
						<td> NOMBRE:</td>
						<td> <input type="text" name="nombre" required="true" title="El campo no puede estar vacio." value="<?php echo "$NOMBRE"; ?>"/></td>
					</tr>
										
					<tr>
						<td> NUMERO DE EMPLEADO: </td>
						<td> <input type="text" name="numero" required="true" title="El campo no puede estar vacio." value="<?php echo "$NUMERO"; ?>"/></td>
					</tr>	

					<tr>
						<td> CORREO: </td>
						<td> <input type="text" name="correo" required="true" title="El campo no puede estar vacio." value="<?php echo "$CORREO"; ?>"/></td>
					</tr>	

					<tr>	
						<td> TIPO DE USUARIO: </td>
						<td> 
							<select name="tipo">
								<option value="Ingeniero"> Ingeniero </option>
								<option value="Administrador"> Administrador </option>
							</select>
						</td>

					</tr>	
					
					<input type="hidden" name="idusuario" id="idusuario" value="<?php echo "$IDUSUARIO"; ?>" />
	
				</table>

				<div id="boton_generar">
					<input type="submit" name="ok" id="ok" value="MODIFICAR USUARIO" />
				</div>
			</form>	

			<br>	
			
			<form action="reports/ReporteUsuarios.php" >
				<div id="boton_reporte">
					<input type="submit" value="REPORTE"/>
				</div>
			</form>
		</div>
	</body> 
</html>

<?php
	}
	else
	{
		echo "<script language='JavaScript'>
			window.alert('Oops. No puedes entrar en esta sección.') 
			window.location.href='/ncpr/index.php'
		</script>";
	}
?>