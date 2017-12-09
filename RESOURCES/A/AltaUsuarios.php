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
	
	<body>
		<div id="contenedor">
			<?php 
				include_once("menu.php");
			?>
			
			<h1> ALTA DE USUARIOS </h1>
			
			<form action="./libraries/procesarAltaUsuarios.php" method="post" name="datos" enctype="multipart/form-data" .disabled=true;>
				<table cellpadding='0' cellspacing='0' border='1' class='sortable' id='sorter'> 
					<tr>
						<td> USUARIO:</td>
						<td><input type="text" name="usuario" required="true" title="El campo no puede estar vacio." placeholder="Usuario" /></td>
					</tr>
					
					<tr>
						<td> CONTRASEÑA: </td>
						<td> <input type="password" name="pwd" required="true" title="El campo no puede estar vacio." placeholder="Contraseña" /></td>
					</tr>
					
					<tr>
						<td> NOMBRE COMPLETO:</td>
						<td> <input type="text" name="nombre" required="true" title="El campo no puede estar vacio." placeholder="Nombre Completo" /></td>
					</tr>
					
					<tr>
						<td> NUMERO DE EMPLEADO:</td>
						<td> <input type="text" name="numero" required="true" title="El campo no puede estar vacio." placeholder="Número de Empleado" /></td>
					</tr>
					
					<tr>
						<td> CORREO:</td>
						<td> <input type="text" name="correo" required="true" title="El campo no puede estar vacio." placeholder="Correo" /></td>
					</tr>

					<tr>	
						<td> TIPO DE USUARIO: </td>
						<td> 
							<select name="tipo">
								<option value="Ingeniero"> INGENIERO </option>
								<option value="Administrador"> ADMINISTRADOR </option>
							</select>
						</td>
					</tr>
				</table>
				<div id="boton_generar">
					<input type="submit" name="ok" id="ok" value="ALTA USUARIO" />
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
