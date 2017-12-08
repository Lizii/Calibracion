<?php
	include_once ("../iniciar.php");
	define('FPDF_FONTPATH', '../fpdf/font/');
	date_default_timezone_set('America/Los_Angeles');

	require_once('../fpdf/fpdf.php');
	require_once('../fpdi/fpdi.php');
	include_once("../DBManager.php");

	$objCon=new DBManager;

	/************************* Código para importar un archivo pdf *************************************************/	
	$pdf=new FPDI();
	/*Obtener la cantidad de imagenes que subirán */

	//

	/**********************************************/

	/* Cargamos el formato FSNCR */
	$pageCount=$pdf->setSourceFile('../RESOURCES/ncpr-PDF2.pdf');

	/* Declaración de variables */
	$x=5;
	$y=5;	

	$x2=10;
	$y2=20;	


	$Documento_no="45";
	$Document="123";
	$Revision="12";
	$Report_date="19-05-2017";
	$Document_name="njojnojnjonjo";
	$ReportedBY="Roberto";
	$GENERA=$_SESSION['nombre'];
	$DetectedON="123";
	$Origin="123";
	$Date="12-12-12";
	$Hour="5:55";
	$Shift="123";
	$JobNo="M123123123";
	$ShipDate="12-12-12";
	$PartNo="Assy123552";
	$PartDESC="123154651321321321";
	$VendorN="nanana";
	$NoPieces_In="1234564456123";
	$NoPieces_Rej="1234564456123";
	$Rejection="nonononononono";
	$Desc_NC="1213132nonononono21312131213132nonononono21312131213132nonononono21312131213132nonononono21312131213132nonononono21312131213132nonononono21312131213132nonononono2131213";
	$Location="213132132132132";
	$Disposicion="21321321321";
	$Inmediate="1213132nonononono21312131213132nonononono21312131213132nonononono21312131213132nonononono21312131213132nonononono21312131213132nonononono21312131213132nonononono2131213";
	$InmediateBY="213132nonononono21312131213132nonononono213121313";



	$FDESC1 = "../photos/vertical.jpg";
	$Description1="Description Description Description Description Description Description 2 Description Description Description Description 2 Description Description Description Description Description Description Description Description Description Description 1 Description Description Description Description Description";

	$FDESC2 = "../photos/horizontal.jpg";
	$Description2="Description Description Description Description Description Description 2 Description Description Description Description 2 Description Description Description Description Description Description Description Description Description Description 1 Description Description Description Description Description";
	
	/***************************/

	/*Obtener la cantidad de imagenes que subirán */

	for($pageNo=1; $pageNo<=$pageCount; $pageNo++)
	{
		// Importa una página
		$templateId = $pdf->importPage($pageNo);

		// Obtiene el tamaño de la página importada
		$size = $pdf->getTemplateSize($templateId);

		// Crea una página (horizontal o vertical dependiendo del tamaño de l página importada)
		if ($size['w'] > $size['h']) 
		{
		    $pdf->AddPage('L', array($size['w'], $size['h']));
		} 
		
		else 
		{
		    $pdf->AddPage('P', array($size['w'], $size['h']));
		}

		// Usa la página agregada
		$pdf->useTemplate($templateId);
	
		/* Código para escribir en las hojas del pdf */
		if($pageNo==1)
		{
			$pdf->SetFont('Arial',"",7);
			$pdf->SetXY($x+110, $y+1.6);
			$pdf->cell(30, 5, $Documento_no, 0, 1, 'L');

			$pdf->SetFont('Arial',"",7);
			$pdf->SetXY($x+25, $y+9.9);
			$pdf->cell(57, 2.5, $Document, 0, 1, 'L');

			$pdf->SetXY($x+25, $y+12.8);
			$pdf->cell(28, 2.8, $Revision, 0, 1, 'L');

			$pdf->SetFont('Arial',"",7);
			$pdf->SetXY($x+25, $y+16);
			$pdf->cell(28, 3, $Report_date, 0, 1, 'L');

			$pdf->SetXY($x+125, $y+11.8);
			$pdf->cell(79, 4, $Document_name, 0, 1, 'L');

			$pdf->SetXY($x+42.5, $y+27.5);
			$pdf->cell(162, 4,$ReportedBY, 0, 1, 'L');

			$pdf->SetXY($x+42.5, $y+31.5);
			$pdf->cell(162, 4,$GENERA, 0, 1, 'L');

			$pdf->SetXY($x+42.5, $y+35.5);
			$pdf->cell(162, 4,$DetectedON, 0, 1, 'L');

			$pdf->SetXY($x+42.5, $y+39.5);
			$pdf->cell(162, 4,$Origin, 0, 1, 'L');

			$pdf->SetXY($x+42.5, $y+43.5);
			$pdf->cell(162, 4,$Date, 0, 1, 'L');

			$pdf->SetXY($x+42.5, $y+47.5);
			$pdf->cell(162, 4,$Hour, 0, 1, 'L');

			$pdf->SetXY($x+42.5, $y+51.5);
			$pdf->cell(162, 4,$Shift, 0, 1, 'L');

			$pdf->SetXY($x+42.5, $y+55.5);
			$pdf->cell(162, 4,$JobNo, 0, 1, 'L');

			$pdf->SetXY($x+42.5, $y+59.5);
			$pdf->cell(162, 4,$ShipDate, 0, 1, 'L');

			$pdf->SetXY($x+42.5, $y+63.5);
			$pdf->cell(162, 4,$PartNo, 0, 1, 'L');

			$pdf->SetXY($x+83, $y+67.5);
			$pdf->cell(121.5, 4,$PartDESC, 0, 1, 'L');

			$pdf->SetXY($x+83, $y+71.5);
			$pdf->cell(121.5, 4,$VendorN, 0, 1, 'L');

			$pdf->SetXY($x+83, $y+75.5);
			$pdf->cell(121.5, 4,$NoPieces_In, 0, 1, 'L');

			$pdf->SetXY($x+83, $y+79.5);
			$pdf->cell(121.5, 4,$NoPieces_Rej, 0, 1, 'L');

			$pdf->SetXY($x+2.5, $y+88);
			$pdf->cell(202, 4,$Rejection, 0, 1, 'L');

			$pdf->SetXY($x+2.5, $y+96);
			$pdf->multicell(202, 4,$Desc_NC, 0, 'L');

			$pdf->SetXY($x+2.5, $y+108);
			$pdf->cell(101, 4,$Location, 0, 1, 'L');

			$pdf->SetXY($x+103.5, $y+108);
			$pdf->cell(101, 4,$Disposicion, 0, 1, 'L');

			$pdf->SetXY($x+2.5, $y+176);
			$pdf->multicell(202, 4,$Inmediate, 0, 'L');

			$pdf->Image($FDESC1, 25.5, 122.3, 30); /*imagen vertical*/
			$pdf->Image($FDESC2, 8.7, 131, 65); /*imagen horizontal*/

			$pdf->Image($FDESC1, 94, 122.3, 30); /*imagen vertical*/
			$pdf->Image($FDESC2, 76.2, 131, 65); /*imagen horizontal*/

			$pdf->Image($FDESC1, 161, 122.3, 30); /*imagen vertical*/
			$pdf->Image($FDESC2, 143.5, 131, 65); /*imagen horizontal*/

			$pdf->SetXY($x+2.5, $y+244.5);
			$pdf->cell(202, 4,$InmediateBY, 0, 1, 'L');

			$pdf->Image($FDESC1, 25.5, 190.3, 30); /*imagen vertical*/
			$pdf->Image($FDESC2, 8.7, 198.7, 65); /*imagen horizontal*/

			$pdf->Image($FDESC1, 94, 190.3, 30); /*imagen vertical*/
			$pdf->Image($FDESC2, 76.2, 198.7, 65); /*imagen horizontal*/

			$pdf->Image($FDESC1, 161, 190.3, 30); /*imagen vertical*/
			$pdf->Image($FDESC2, 143.5, 198.7, 65); /*imagen horizontal*/
		
		}
		/**********************************************/

	}
	/************************************************************************************************************/

	//$pdf->Output('../FSNCR PDFS/test.pdf', 'F'); // Guarda el PDF en el servidor
	$pdf->Output('../FSNCR PDFS/test.pdf', 'I'); // Visualizamos el PDF en el navegador
?>