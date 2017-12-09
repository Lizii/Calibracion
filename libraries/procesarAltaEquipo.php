<html>
	<head>
		<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	  	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>


	  	<!-- This is what you need -->
	  	<!-- <script src="../sweet_alert/dist/sweetalert-dev.js"></script>
		
	    <link rel="stylesheet" href="../sweet_alert/dist/sweetalert.css"> -->
	    <!--.......................-->
	</head>

	<body>
		<?php
			include_once ("../iniciar.php");

			define('FPDF_FONTPATH', '../fpdf/font/');

			include("../SimpleImage/SimpleImage.class.php");
			require_once('../fpdf/fpdf.php');
			require_once('../fpdi/fpdi.php');
			include_once("../DBManager.php");
			
			$objCon=new DBManager;

			if($objCon->conectar()==true)
			{
				
				date_default_timezone_set('America/Los_Angeles');
				/*$FECHA=date("Y-m-d"); // Formato: Año-Mes-Dia  YYYY-mm-dd   2016-11-15 */
				
				//$f_anio=substr($FECHA, 0, 4);
				//$f_mes=substr($FECHA,  5, 2);
				//$f_dia=substr($FECHA,  8, 2);


				//$fechapdf= $f_dia.'-'.$f_mes.'-'.$f_anio;
				//$HORA=date("H:i");


				$EQUIPO=strtoupper($_POST['equipo']);
				$SERIE=strtoupper($_POST['serie']);
				$TIEMPO=strtoupper($_POST['tiempo']);
				$ExpDate=($_POST['UActualizacion']); //date
				$VALORES=strtoupper($_POST['VALORES']);
				
				$ExpDate = date("d-m-Y", strtotime($ExpDate));
	

				$sql="INSERT INTO tbequipo VALUES('NULL', '$EQUIPO', '$SERIE', '$TIEMPO', '$ExpDate', '$VALORES')";
				$result=mysql_query($sql) or die (mysql_error());

				
				
				if (! $result)
				{
				echo "La consulta SQL contiene errores.".mysql_error();
				exit();
				}
				else 
				{
				echo "<script language='JavaScript' type='text/javascript'>
						 alert('El equipo ha sido dado de alta correctamente.');
						 window.location.href = '../index.php';
					  </script>";
				}		
			}
		?>
		
	</body>
</html>