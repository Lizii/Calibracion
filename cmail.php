<?php
	include_once ("iniciar.php"); 

	require("phpmailer/class.phpmailer.php");
	require("phpmailer/class.smtp.php");


	$mail=new PHPMailer();

	$mail->IsSMTP();
	$mail->CharSet = 'UTF-8';
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "ssl";
	$mail->Host = "p3plcpnl0533.prod.phx3.secureserver.net";
	$mail->Port = 465;
	$mail->Username = "itvisionaire";
	$mail->Password = "W3bsite##";

	$mail->FromName = "Jesús"; //Obtenemos el nombre del usuario logeado
	$mail->From = "Noraplay@visionairelighting.com"; //Obtenemos el correo del usuario logeado
	$mail->Subject = "NCPR";
	/*$mail->Subject = "NCPR";*/
	$mail->Body ="font-family: Arial";

	$mail->MsgHTML("Good day, please find attached the Non-conforming product/material reports NCPR the issue regarding the part. Don't hesitate to contact Hugo Amezquita or me if you have any questions or comments.");

	$mail->AddAddress("");
	
	$mail->addCC("jmorales@visionairelighting.com");
	$mail->addCC("hmendoza@visionairelighting.com");

	$mail->IsHTML(true);

	if(!$mail->Send())
	   echo "Mailer Error: ".$mail->ErrorInfo;
	else
	   echo "<script language='JavaScript'>
				window.alert('El NCPR ha sido enviado') 
				window.location.href='AltaNcpr.php'
		</script>";
?>