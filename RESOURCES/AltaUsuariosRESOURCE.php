<html> 
    <?php 
    	include_once("DBManager.php");
    	require("index.php");
    	include_once ("iniciar.php");

     ?>

    <head>
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
        <link rel="icon" type="image/png" href="img/NCPR logo.png" />
	</head>
	
	<body> 
		<div class="contenedor">
			<?php 
				include_once("menu.php");
			?>

		<h1> ALTA DE USUARIO </h1>

		<div id="estilo">
			<form action="./libraries/procesarAltaUsuarios.php" method="post" enctype="multipart/form-data">
			
				<table cellpadding='0' cellspacing='0' border='1' class='tabla_altas' > 

					<tr>
						<th><b> USUARIO</td> 
						<th><input type="text" name="usuario" id="usuario" required="true" title="El campo no puede estar vacio." maxlength="60" placeholder="USUARIO" AUTOFOCUS></b></td>
					</tr>
					
					<tr>
						<th><b> CONTRASEÑA </b></td> 
						<th><input type="password" name="pwd" id="pwd" required="true" title="El campo no puede estar vacio." maxlength="50" placeholder="CONTRASEÑA" ></td>
					</tr>
					
					<tr>
						<th><b> TIPO DE USUARIO </td> 
						<th>
						<select name="tipo">
							<option value="Visitante">VISITANTE</OPTION>
							<option value="Capturista">CAPTURISTA</OPTION>
							<option value="Administrador">ADMINISTRADOR</OPTION>
						</select>
						</td>
					</tr>
					
				</table>
				</br></br><button type="submit"> DAR DE ALTA </button>
			</form>	
			
		</div>
		
		</div>
	</body> 
</html>
