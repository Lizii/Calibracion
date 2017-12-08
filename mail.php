<?php
	include_once ("iniciar.php"); 
	include_once("DBManager.php");
	
	require("phpmailer/class.phpmailer.php");
	require("phpmailer/class.smtp.php");

	$objCon=new DBManager;

	$id_Folio=$_GET['id_folio'];

	if ($objCon->conectar()==true)
	{
		$sql="SELECT * FROM tbncprs WHERE id_Folio='$id_Folio'";
		$result=mysql_query($sql);

		while($row=mysql_fetch_array($result)) 
		{ 
			$nombre_pdf=$row['Nombre_PDF'];	
			$numero_orden=$row['Numero_Orden'];
			$numero_parte=$row['Numero_Parte'];
			$fecha_envio=$row['Fecha_Envio'];
			$descripcion_producto=$row['Descripcion_Producto'];
			$localiza_defecto=$row['Origen_Falla_Detectada'];
			$origen_falla_descripcion=$row['Origen_Falla_Descripcion'];
			$destino=$row['Destino'];
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
		$mail->Subject = "$nombre_pdf - $numero_parte";
		/*$mail->Subject = "NCPR";*/
		$mail->Body ="font-family: Arial";

		$mail->MsgHTML("Good day, please find attached the Non-conforming product/material reports ".$nombre_pdf." the issue regarding the part ".$numero_parte.". Don't hesitate to contact Hugo Amezquita or me if you have any questions or comments.

		<br><br>

		Buen dia. Con el proposito de comunicar a los involucrados sobre las No Conformidades originadas o detectadas en sus areas de Supervision, se adjunta el informe de producto no conforme ".$nombre_pdf." relativo a la orden ".$numero_orden.", este defecto se detecto en el área de ".$origen_falla_descripcion.". Favor de leer el documento y responder con sus comentarios.
		
		<br><br>
 
		<b>File name:</b> ".$nombre_pdf."<br>
		<b>Order number:</b> ".$numero_orden."<br>
		<b>Part number:</b> ".$numero_parte."<br>
		<b>Shipping date:</b> ".$fecha_envio." <br>
		<b>Product/part description:</b> ".$descripcion_producto."<br>");

		$mail->AddAttachment("ncpr/$nombre_pdf.pdf");
		
		/******************** Añadir los destinatarios ********************/ 
		//$mail->AddAddress("Jmorales@visionairelighting.com", "Jmorales");
				
		//DISTRIBUCION MEXICO
		if($destino=="MEXICO")
		{
			if($localiza_defecto=="ACCESS")
			{
				//ACCESS
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
				$mail->AddAddress("edhernandez@visionairelighting.com");
			}
						
			$mail->addCC("hamezquita@visionairelighting.com");
			$mail->addCC("hgomez@visionairelighting.com");
			$mail->addCC("carlosperez@visionairelighting.com");
			$mail->addCC("igoldbaum@visionairelighting.com");

			$mail->addBCC("Jmorales@visionairelighting.com");
			$mail->addBCC("Hmendoza@visionairelighting.com");

			$mail->addBCC("rzamudio@visionairelighting.com");
			$mail->addBCC("fagonzalez@visionairelighting.com");
			$mail->addBCC("csoto@visionairelighting.com");
			$mail->addBCC("xcarvajal@visionairelighting.com");
			$mail->addBCC("ovillareal@visionairelighting.com");
			$mail->addBCC("jlucero@visionairelighting.com");
			$mail->addBCC("rmorales@visionairelighting.com");
			$mail->addBCC("rgarcia@visionairelighting.com");
			$mail->addBCC("raulramirez@visionairelighting.com");
			$mail->addBCC("cessicaromero@visionairelighting.com");
			$mail->addBCC("edgargonzalez@visionairelighting.com");
			$mail->addBCC("mbautista@visionairelighting.com");
			$mail->addBCC("luisalvarez@visionairelighting.com");
			$mail->addBCC("rruiz@visionairelighting.com");
			$mail->addBCC("lrosas@visionairelighting.com");
			$mail->addBCC("fcamacho@visionairelighting.com");
			$mail->addBCC("alromo@visionairelighting.com");
			$mail->addBCC("lsilva@visionairelighting.com");
			$mail->addBCC("irodriguez@visionairelighting.com");
			$mail->addBCC("jasminlopez@visionairelighting.com");
			$mail->addBCC("mchavero@visionairelighting.com");
			$mail->addBCC("agalvan@visionairelighting.com");
			$mail->addBCC("matiasaparicio@visionairelighting.com");
			$mail->addBCC("lzuniga@visionairelighting.com");
			
		}

		/******************** Añadir los destinatarios ********************/ 
		//$mail->AddAddress("Jmorales@visionairelighting.com", "Jmorales");
				
		//DISTRIBUCION RD
		else if($destino=="RD")
		{
			$mail->AddAddress("");
			
			$mail->addCC("hamezquita@visionairelighting.com");
			$mail->addCC("hgomez@visionairelighting.com");
			$mail->addCC("carlosperez@visionairelighting.com");
			$mail->addCC("igoldbaum@visionairelighting.com");
			$mail->addCC("sgallegos@visionairelighting.com");
			$mail->addCC("jennifers@visionairelighting.com");
			$mail->addCC("lluu@visionairelighting.com");
			$mail->addCC("fhernandez@visionairelighting.com");
			$mail->addCC("fvalle@visionairelighting.com");
			$mail->addCC("ialvarez@visionairelighting.com");
			
			$mail->addBCC("Jmorales@visionairelighting.com");
			$mail->addBCC("Hmendoza@visionairelighting.com");

			$mail->addBCC("rzamudio@visionairelighting.com");
			$mail->addBCC("fagonzalez@visionairelighting.com");
			$mail->addBCC("csoto@visionairelighting.com");
			$mail->addBCC("xcarvajal@visionairelighting.com");
			$mail->addBCC("ovillareal@visionairelighting.com");
			$mail->addBCC("jlucero@visionairelighting.com");
			$mail->addBCC("rmorales@visionairelighting.com");
			$mail->addBCC("rgarcia@visionairelighting.com");
			$mail->addBCC("raulramirez@visionairelighting.com");
			$mail->addBCC("cessicaromero@visionairelighting.com");
			$mail->addBCC("edgargonzalez@visionairelighting.com");
			$mail->addBCC("mbautista@visionairelighting.com");
			$mail->addBCC("luisalvarez@visionairelighting.com");
			$mail->addBCC("rruiz@visionairelighting.com");
			$mail->addBCC("lrosas@visionairelighting.com");
			$mail->addBCC("fcamacho@visionairelighting.com");
			$mail->addBCC("alromo@visionairelighting.com");
			$mail->addBCC("lsilva@visionairelighting.com");
			$mail->addBCC("irodriguez@visionairelighting.com");
			$mail->addBCC("jasminlopez@visionairelighting.com");
			$mail->addBCC("mchavero@visionairelighting.com");
			$mail->addBCC("agalvan@visionairelighting.com");
			$mail->addBCC("matiasaparicio@visionairelighting.com");
			$mail->addBCC("lzuniga@visionairelighting.com");
		}
		/******************************************************************/

		$mail->IsHTML(true);

		if(!$mail->Send())
		   echo "Mailer Error: ".$mail->ErrorInfo;
		else
		   echo "<script language='JavaScript'>
					window.alert('El NCPR ha sido enviado') 
					window.location.href='AltaNcpr.php'
			</script>";
	}
?>