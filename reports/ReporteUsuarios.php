
<?php
    include_once ("../iniciar.php"); 

    if($_SESSION['tipo_usuario']=="Administrador")
    {
?>

<html> 
    <head>
	    <meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/ncpr/css/menu.css" media="screen">
		<link rel="stylesheet" type="text/css" href="/ncpr/css/estilos.css" />
        <link rel="icon" type="image/png" href="/ncpr/img/NCPR logo.png" />
        <script type="text/javascript" src="/ncpr/js/sorter.js"></script>
	</head>
	
	<body> 
		<div id="contenedor">
			<?php 
				include_once("../menu.php");
			?>

			<h1> REPORTE DE USUARIOS</h1>
		
			<?php
				include_once("../DBManager.php");
			
				$objCon = new DBManager;
				if ($objCon->conectar()==true)
				{
					$sql="SELECT * FROM tbusuarios";

					$datos=mysql_query($sql);
					
					echo "<table cellpadding='0' cellspacing='0' border='1' class='sortable' id='sorter'>"; 
					echo 
						"<tr>
							<td class='celda'><b> ID </b></td> 
							<td class='celda'><b> Usuario </b></td> 
							<td class='celda'><b> Nombre</b></td> 
							<td class='celda'><b> Numero de Empleado </b></td> 
							<td class='celda'><b> Tipo de Usuario </b></td> 
							<td class='celda'><b> Correo </b></td> 
							<td class='celda'><b> Modificar</b></td> 
							<td class='celda'><b> Eliminar </b></td> 
						</tr>";
					while ($row=mysql_fetch_array($datos)) 
					{ 
						echo 
							"<tr>
    							<td class='celda'>$row[id_Usuario]</td>
								<td class='celda'>$row[Usuario]</td>
								<td class='celda'>$row[Nombre]</td>
								<td class='celda'>$row[Numero_Empleado]</td>
								<td class='celda'>$row[Tipo_Usuario]</td>
								<td class='celda'>$row[Correo]</td>
								<td class='celda'><a href='../ModificarUsuario.php?ida=$row[id_Usuario]'>Editar</td>
								<td class='celda'><a href='../libraries/ProcesarEliminarUsuario.php?idb=$row[id_Usuario]'>Eliminar</td>
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