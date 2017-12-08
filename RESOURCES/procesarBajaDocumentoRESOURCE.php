<?php
	include_once ("../iniciar.php");
	include_once("../DBManager.php");

	$objCon=new DBManager;
	
	if ($objCon->conectar()==true)
	{
		
		$DOCUMENTO=$_GET['documento'];
		
		$sql = "DELETE FROM tbdocumento WHERE Id_Documento='$DOCUMENTO'";
		$result = mysql_query($sql); 
		
		
		if (! $result)
		{
			echo "El documento no ha sido eliminado. Por favor contacte a su administrador".
			mysql_error();
			exit();
		}
		
		else 
		{
			echo "<script language='JavaScript' type='text/javascript'>
					 alert('El documento ha sido eliminado.');
					 window.location.href = '../reports/ReporteDocumentos.php';
				  </script>";
		}
		
		
	    /**************************************************/
	}
?>	