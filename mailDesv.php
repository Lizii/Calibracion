<?php
	include_once ("iniciar.php"); 
	include_once("DBManager.php");
	
	require("phpmailer/class.phpmailer.php");
	require("phpmailer/class.smtp.php");

	$objCon=new DBManager;

	$Id=$_GET['Id'];

	if($objCon->conectar()==true)
	{
		$sql="SELECT * FROM tbdesviaciones WHERE Id='$Id'";
		$result=mysql_query($sql);

		while($row=mysql_fetch_array($result)) 
		{ 
			$nombre_pdf=$row['Nombre_Desviacion'];	
			$Specification=$row['Spec_Parte'];
		}

		$mail=new PHPMailer();

		$mail->IsSMTP();
		$mail->CharSet = 'UTF-8';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = "p3plcpnl0533.prod.phx3.secureserver.net";
		$mail->Port = 465;
		$mail->Username = "itvisionaire";
		$mail->Password = "W3bsite##";

		$mail->FromName = "$_SESSION[nombre]"; //Obtenemos el nombre del usuario logeado
		$mail->From = "$_SESSION[correo]"; //Obtenemos el correo del usuario logeado
		$mail->Subject = "$nombre_pdf - $Specification";
		/*$mail->Subject = "NCPR";*/
		$mail->Body ="font-family: Arial";

		$mail->MsgHTML("Good day, please find attached the Deviation product/material reports ".$nombre_pdf." the issue regarding the part ".$Specification.". Don't hesitate to contact Hugo Amezquita or me if you have any questions or comments.

		<br><br>

		Buen dia. Con el proposito de comunicar a los involucrados sobre las Desviaciones originadas o detectadas en sus areas de Supervision, se adjunta el informe de producto no conforme ".$nombre_pdf." relativo a la parte ".$Specification.".Favor de leer el documento y responder con sus comentarios.
		
		<br><br>
 
		<b>File name:</b> ".$nombre_pdf."<br>
		<b>Part number:</b> ".$Specification."<br>");

		$mail->AddAttachment("DESV/$nombre_pdf.pdf");
		
		/******************** Añadir los destinatarios ********************/ 
		//$mail->AddAddress("Jmorales@visionairelighting.com", "Jmorales");
		/*$mail->AddAddress("ryou@visionairelighting.com", "Robert You");
		$mail->AddAddress("hamezquita@visionairelighting.com", "Hugo Amezquita");
		$mail->AddAddress("lluu@visionairelighting.com");


		$mail->addCC("rodolfoorozco@visionairelighting.com");
		$mail->addCC("amartinez@visionairelighting.com");
		$mail->addCC("jennifers@visionairelighting.com");
		$mail->addCC("esepulveda@visionairelighting.com");
		$mail->addCC("fvalle@visionairelighting.com");
		$mail->addCC("ovillareal@visionairelighting.com");
		$mail->addCC("carlosperez@visionairelighting.com");
		$mail->addCC("jarballo@visionairelighting.com");
		$mail->addCC("rmorales@visionairelighting.com");
		$mail->addCC("enriquelimon@visionairelighting.com");
		$mail->addCC("jvazquez@visionairelighting.com");
		$mail->addCC("jleon@visionairelighting.com");
		$mail->addCC("alexishernandez@visionairelighting.com");
		$mail->addCC("rocampo@visionairelighting.com");
		$mail->addCC("rgarcia@visionairelighting.com");
		$mail->addCC("dollyriva@visionairelighting.com");
		$mail->addCC("cessicaromero@visionairelighting.com");
		$mail->addCC("csoto@visionairelighting.com");
		$mail->addCC("fagonzalez@visionairelighting.com");
		$mail->addCC("irodriguez@visionairelighting.com");


		$mail->addBCC("Hmendoza@visionairelighting.com");
		$mail->addBCC("Jmorales@visionairelighting.com");*/
		$mail->addBCC("Miguelsegura@visionairelighting.com");

		//DISTRIBUCION MEXICO
		/*if($destino=="MEXICO")
		{
			if($localiza_defecto=="ACCESS")
			{
				//ACCESS
				$mail->AddAddress("gaguilar@visionairelighting.com");
				$mail->AddAddress("iramirez@visionairelighting.com");
			}
			else if($localiza_defecto=="ALMDR")
			{
				//ALMDR
				$mail->AddAddress("kjimenez@visionairelighting.com");
				$mail->AddAddress("jveliz@visionairelighting.com");
				$mail->AddAddress("mavalos@visionairelighting.com");
			}
			else if($localiza_defecto=="ALMGR")
			{
				//ALMGR
				$mail->AddAddress("kjimenez@visionairelighting.com");
				$mail->AddAddress("jveliz@visionairelighting.com");
				$mail->AddAddress("alromo@visionairelighting.com");
			}
			else if($localiza_defecto=="ALMWL")
			{
				//ALMWL
				$mail->AddAddress("kjimenez@visionairelighting.com");
				$mail->AddAddress("jveliz@visionairelighting.com");
				$mail->AddAddress("alromo@visionairelighting.com");
				$mail->AddAddress("mavalos@visionairelighting.com");
			}
			else if($localiza_defecto=="CNC01")
			{
				//CNC01
				$mail->AddAddress("kjimenez@visionairelighting.com");
				$mail->AddAddress("jveliz@visionairelighting.com");
			}
			else if($localiza_defecto=="DCAST")
			{
				//DCAST
				$mail->AddAddress("jgalvez@visionairelighting.com");
			}
			else if($localiza_defecto=="FASSY")
			{	
				//FASSY
				$mail->AddAddress("smendoza@visionairelighting.com");
				$mail->AddAddress("deptensamble@visionairelighting.com");
			}
			else if($localiza_defecto=="FNDRY")
			{	
				//FNDRY
				$mail->AddAddress("rvaldez@visionairelighting.com");
			}
			else if($localiza_defecto=="LEDAS")
			{	
				//LEDAS
				$mail->AddAddress("ahernandez@visionairelighting.com");
				$mail->AddAddress("balvarez@visionairelighting.com");
			}
			else if($localiza_defecto=="OPASS")
			{	
				//OPASS
				$mail->AddAddress("ahernandez@visionairelighting.com");
				$mail->AddAddress("balvarez@visionairelighting.com");
			}
			else if($localiza_defecto=="PCBCR")
			{	
				//PCBCR
				$mail->AddAddress("ahernandez@visionairelighting.com");
				$mail->AddAddress("balvarez@visionairelighting.com");
			}
			else if($localiza_defecto=="PINRD")
			{	
				//PINRD
				$mail->AddAddress("fhernandez@visionairelighting.com");
			}
			else if($localiza_defecto=="PCOAT")
			{	
				//PCOAT
				$mail->AddAddress("rcardenas@visionairelighting.com");
			}
			else if($localiza_defecto=="SMTRD")
			{
				//SMTRD
				$mail->AddAddress("fhernandez@visionairelighting.com");
			}
			else if($localiza_defecto=="SPNNG")
			{	
				//SPNNG
				$mail->AddAddress("sordaz@visionairelighting.com");
			}
			else if($localiza_defecto=="STLFB")
			{
				//STLFB
				$mail->AddAddress("alromo@visionairelighting.com");
				$mail->AddAddress("@visionairelighting.com");
				$mail->AddAddress("@visionairelighting.com");
			}
			else if($localiza_defecto=="EXTSP")
			{	
				//EXTSP
				$mail->AddAddress("");
			}
			else if($localiza_defecto=="WHSRE")
			{	
				//WHSRE
				$mail->AddAddress("fvalle@visionairelighting.com");
				$mail->AddAddress("bgarcia@visionairelighting.com");
				$mail->AddAddress("clatorres@visionairelighting.com");
				$mail->AddAddress("edhernandez@visionairelighting.com");
			}
						
			$mail->addCC("hamezquita@visionairelighting.com");
			$mail->addCC("hgomez@visionairelighting.com");
			$mail->addCC("carlosperez@visionairelighting.com");
			$mail->addCC("reyesvenegas@visionairelighting.com");
			$mail->addCC("igoldbaum@visionairelighting.com");

			$mail->addBCC("Jmorales@visionairelighting.com");
			$mail->addBCC("Hmendoza@visionairelighting.com");

			$mail->addBCC("fagonzalez@visionairelighting.com");
			$mail->addBCC("csoto@visionairelighting.com");
			$mail->addBCC("afregoso@visionairelighting.com");
			$mail->addBCC("xcarvajal@visionairelighting.com");
			$mail->addBCC("ovillareal@visionairelighting.com");
			$mail->addBCC("jserrano@visionairelighting.com");
			$mail->addBCC("jlucero@visionairelighting.com");
			$mail->addBCC("clatorres@visionairelighting.com");
			$mail->addBCC("rmorales@visionairelighting.com");
			$mail->addBCC("rgarcia@visionairelighting.com");
			$mail->addBCC("cessicaromero@visionairelighting.com");
			$mail->addBCC("edgargonzalez@visionairelighting.com");
			$mail->addBCC("mbautista@visionairelighting.com");
			$mail->addBCC("mgonzalez@visionairelighting.com");
			$mail->addBCC("luisalvarez@visionairelighting.com");
			$mail->addBCC("rruiz@visionairelighting.com");
			$mail->addBCC("lrosas@visionairelighting.com");
			$mail->addBCC("carlosreyes@visionairelighting.com");
			$mail->addBCC("fcamacho@visionairelighting.com");
			$mail->addBCC("lsilva@visionairelighting.com");
		}*/

		//DISTRIBUCION RD
		/*else if($destino=="RD")
		{
			$mail->AddAddress("");
			
			$mail->addCC("hamezquita@visionairelighting.com");
			$mail->addCC("hgomez@visionairelighting.com");
			$mail->addCC("carlosperez@visionairelighting.com");
			$mail->addCC("reyesvenegas@visionairelighting.com");
			$mail->addCC("igoldbaum@visionairelighting.com");
			$mail->addCC("sgallegos@visionairelighting.com");
			$mail->addCC("jennifers@visionairelighting.com");
			$mail->addCC("lluu@visionairelighting.com");
			$mail->addCC("fhernandez@visionairelighting.com");
			$mail->addCC("fvalle@visionairelighting.com");
			$mail->addCC("ialvarez@visionairelighting.com");
			$mail->addCC("rnakayama@visionairelighting.com");
			
			$mail->addBCC("Jmorales@visionairelighting.com");
			$mail->addBCC("Hmendoza@visionairelighting.com");

			$mail->addBCC("csoto@visionairelighting.com");
			$mail->addBCC("afregoso@visionairelighting.com");
			$mail->addBCC("xcarvajal@visionairelighting.com");
			$mail->addBCC("ovillareal@visionairelighting.com");
			$mail->addBCC("jserrano@visionairelighting.com");
			$mail->addBCC("jlucero@visionairelighting.com");
			$mail->addBCC("clatorres@visionairelighting.com");
			$mail->addBCC("rmorales@visionairelighting.com");
			$mail->addBCC("rgarcia@visionairelighting.com");
			$mail->addBCC("cessicaromero@visionairelighting.com");
			$mail->addBCC("edgargonzalez@visionairelighting.com");
			$mail->addBCC("mbautista@visionairelighting.com");
			$mail->addBCC("mgonzalez@visionairelighting.com");
			$mail->addBCC("luisalvarez@visionairelighting.com");
			$mail->addBCC("rruiz@visionairelighting.com");
			$mail->addBCC("lrosas@visionairelighting.com");
			$mail->addBCC("carlosreyes@visionairelighting.com");
			$mail->addBCC("fcamacho@visionairelighting.com");
			$mail->addBCC("lsilva@visionairelighting.com");
		}*/
		/******************************************************************/

		$mail->IsHTML(true);

		if(!$mail->Send())
		{
		   echo "Mailer Error: ".$mail->ErrorInfo;
		}
		else
		{
?>
		  	<html>
				<head>
					<meta charset="utf-8">
				  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
				  	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

				  	<!-- This is what you need -->
				  	<script src="sweet_alert/dist/sweetalert-dev.js"></script>
				    <link rel="stylesheet" href="sweet_alert/dist/sweetalert.css">
				</head>

				<body>
					<script>
			 	 		swal(
			 	 		{
						  title: "",
						  text: "El formato DESVIACION ha sido generado y se ha enviado por correo.",
						  type: "success",
						  showConfirmButton: true
						},
						
						function()
						{
							location.href="AltaDesviacion.php";
						});
			  		</script>
				</body>
			</html>
<?php
		}
	}
?>


