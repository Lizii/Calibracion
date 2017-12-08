<?php
	include_once ("../iniciar.php");
	include_once("../DBManager.php");

	$objCon=new DBManager;
	
	if ($objCon->conectar()==true)
	{
		date_default_timezone_set('America/Los_Angeles');
		
		$IDDOCUMENTO=$_POST['iddocumento'];
		$NUMEROPARTE = strtoupper($_POST['numeroparte']);
		$DESCRIPCION=strtoupper($_POST['descripcion']);
		$REVISION=strtoupper($_POST['revision']);
		$FECHAREVISION=$_POST['fecharevision'];
		$AREAPROCESO=$_POST['areaproceso'];
		$NUMEROCONTROL=$_POST['numerocontrol'];
		$TIPODOCUMENTO = strtoupper($_POST['tipodocumento']);


		$sql = 
		"UPDATE tbdocumento 
		SET 
		Numero_Parte='$NUMEROPARTE',
		Revision='$REVISION',
		Descripcion='$DESCRIPCION', 
		Fecha_Proceso='$FECHAREVISION', 
		Area_Proceso='$AREAPROCESO', 
		Numero_Control='$NUMEROCONTROL', 
		Tipo_Documento='$TIPODOCUMENTO' 
		WHERE
		Id_Documento='$IDDOCUMENTO'
		";
		
		$result=mysql_query($sql);
		
			if (! $result)
			{
				echo "La consulta SQL contiene errores.".mysql_error();
				exit();
			}
			else 
			{
				echo "<script language='JavaScript' type='text/javascript'>
						 alert('Los datos se han actualizado correctamente');
						 window.location.href = '../index.php';
					  </script>";
			}		

	}
?>	