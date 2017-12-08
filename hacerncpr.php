<html> 
    <head>
	    <meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
        <link rel="icon" type="image/png" href="/img/icono.png" />
	</head>
	
	<body>   
		<h1> Alta de Reporte de No Conformidad </h1>
			
		<div>
			<a href="./index.php">
				<img src="./img/logotipo.png" width="263" height="45"></br></br></br>
			</a>
		</div>
		
		<form action="pdffile.php" method="post" name="datos">
					
			<div>
				<label> ID del Folio </label>
				<input type="text" name="id_Folio" id="id_Folio" required="true" title="El campo no puede estar vacio." maxlength="40" placeholder="Folio" autofocus>
				</br></br>				
			</div>
			<div>
				</br> </BR> <input type="submit" name="ok" id="ok" value="GENERAR NCPR PDF" />
			</div>
		</form>	
				
		<footer>
			<a href="index.php"> Volver al menu principal </a><br /><br />
		</footer>
		</div>
	</body> 
</html>
