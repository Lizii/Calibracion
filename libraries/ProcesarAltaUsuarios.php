<?php
	include_once ("../iniciar.php");
	include_once("../DBManager.php");

	$objCon=new DBManager;
	
	if ($objCon->conectar()==true)
	{
		date_default_timezone_set('America/Los_Angeles');
		
		$USUARIO=ucwords($_POST['usuario']);
		$PWD=$_POST['pwd'];
		$NOMBRE=utf8_decode(ucwords(strtolower($_POST['nombre'])));
		$NUMERO=$_POST['numero'];
		$TIPO=$_POST['tipo'];
		$CORREO=strtolower($_POST['correo']);
		
		$sql = "INSERT INTO tbusuarios VALUES('NULL', '$USUARIO', '$PWD', '$TIPO', '$NOMBRE', '$NUMERO', '$CORREO')";
		
		$result=mysql_query($sql);
		
			if (! $result)
			{
				echo "La consulta SQL contiene errores.".mysql_error();
				exit();
			}
			else 
			{
				echo "<script language='JavaScript' type='text/javascript'>
						 alert('El usuario ha sido dado de alta correctamente.');
						 window.location.href = '../index.php';
					  </script>";
			}		

	}
?>	