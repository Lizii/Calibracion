<?php
	include_once ("../iniciar.php");
	include_once("../DBManager.php");

	$objCon=new DBManager;
	
	if ($objCon->conectar()==true)
	{

		$IDUSUARIO=$_GET['idb'];

		$sql = "DELETE FROM tbusuarios WHERE id_Usuario='$IDUSUARIO'";
		
		$result=mysql_query($sql);
		
		if (! $result)
		{
			echo "La consulta SQL contiene errores.".mysql_error();
			exit();
		}
		else 
		{
			echo "<script language='JavaScript' type='text/javascript'>
					 alert('El usuario ha sido borrado.');
					 window.location.href = '../reports/reporteusuarios.php';
				  </script>";
		}		
	}
?>	