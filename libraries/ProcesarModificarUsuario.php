<?php
	include_once ("../iniciar.php");
	include_once("../DBManager.php");

	$objCon=new DBManager;
	
	if ($objCon->conectar()==true)
	{
		date_default_timezone_set('America/Los_Angeles');

		$IDUSUARIO=$_POST['idusuario'];
		$USUARIO=ucwords(strtolower($_POST['usuario']));
		$PWD=$_POST['pwd'];
		$NOMBRE=utf8_decode(ucwords(strtolower($_POST['nombre'])));
		$NUMERO=$_POST['numero'];
		$TIPO=$_POST['tipo'];
		$CORREO=strtolower( $_POST['correo']);

		$sql = "UPDATE tbusuarios 
		SET 
		Usuario='$USUARIO', 
		Pwd='$PWD', 
		Tipo_Usuario='$TIPO', 
		Nombre='$NOMBRE', 
		Numero_Empleado='$NUMERO',
		Correo='$CORREO'
		WHERE
		id_Usuario='$IDUSUARIO'";
		
		$result=mysql_query($sql);
		
			if (! $result)
			{
				echo "La consulta SQL contiene errores.".mysql_error();
				exit();
			}
			else 
			{
				echo "<script language='JavaScript' type='text/javascript'>
						 alert('El usuario ha sido modificado correctamente.');
						 window.location.href = '../index.php';
					  </script>";
			}		

	}
?>	