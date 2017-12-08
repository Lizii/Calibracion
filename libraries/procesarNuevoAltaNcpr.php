<?php
	include_once ("../iniciar.php");

	define('FPDF_FONTPATH', '../fpdf/font/');

	include("../SimpleImage/SimpleImage.class.php");
	require_once('../fpdf/fpdf.php');
	include_once("../DBManager.php");
	
	$objCon=new DBManager;

	class PDF extends FPDF
	{
		var $widths;
		var $aligns;

		function Header()
		{
			$this->SetFont('helvetica', '', 10);
			$this->Ln(30);
		}

		function Footer()
		{
			$this->SetY(-20);
			$this->SetFont('helvetica', 'B', 8);
		}
	}

	if ($objCon->conectar()==true)
	{
		date_default_timezone_set('America/Los_Angeles');

		/*****************************************************************/
		/* Revisa en la base de datos la cantidad de registros de NCPR's */
		/*
		$sql0="SELECT COUNT(*) FROM tbncprs";
		$result0=mysql_query($sql0) or die;
		*/
		
		/* 
		Al número obtenido, se le suma 1 y se le asigna al NCPR */
		
		/*$id_Folio=(mysql_result($result0, 0)+1);*/
		
		/*****************************************************************/
		

	/* Declaración de variables */
	$documento_no="VL-PA-SGC-001-F02";
	$pagina="1 OF 1";
	$document="NON-CONFORMING PRODUCT REPORT";
	$revision="4";
	$fecha=$f_mes."-".$f_dia."-".$f_anio;
	$nombre_documento="NON-CONFORMING PRODUCT REPORT (ENGLISH)";
			
	/* Fin de declaración de variables */

	/* Variables del sistema*/
	$setx=13;
	$cellx=45;
	$cellsize=194;
	$setderecha=99;
	/* Fin de variables del sistema */

	// PDF(Vertical, Milimetros, Tamaño Carta)
	$pdf=new PDF('P', 'mm', 'Letter');
	$pdf->AddPage();
	$pdf->SetFont('helvetica', '', '8');
	
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect(11, 13, 198, 235);   // Contenedor principal
	
	$pdf->Image('../img/Logo.jpg', 27, 17, 65); //Imagen de logotipo
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect($setx, 15, 97, 15);    // Recuadro del Logo

	$pdf->SetXY(110, 19);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->cell(63, 5, "DOCUMENTO NO.:", 0, 1, 'C', 'F');

	$pdf->SetXY(110, 24);
	$pdf->SetFont('Arial', '', '8');
	$pdf->Cell(63, 5, $documento_no, 0, 1, 'C');

	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect(110, 15, 63, 15);

	/***************************************************************************/
	
	$pdf->SetXY(173, 19);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->cell(34, 5, "PAGINA:", 0, 1, 'C');

	$pdf->SetXY(173, 24);
	$pdf->SetFont('Arial', '', '8');
	$pdf->Cell(34, 5, $pagina, 0, 1, 'C');

	$pdf->SetXY(115, 580);
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect(173, 15, 34, 15);

	/***************************************************************************/

	$pdf->SetXY($setx, 31.5);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->cell(19, 5, "DOCUMENT:", 0, 1, 'L');

	$pdf->SetXY($setx+19, 31.5);
	$pdf->SetFont('Arial', '', '8');
	$pdf->Cell(60, 5, $document, 0, 1, 'L');

	$pdf->SetXY($setx, 35.5);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->Cell(16, 5, "REVISION:", 0, 1, 'L');

	$pdf->SetXY($setx+16, 35.5);
	$pdf->SetFont('Arial', '', '8');
	$pdf->Cell(63, 5, $revision, 0, 1, 'L');

	$pdf->SetXY($setx, 39.5);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->Cell(12, 5, "FECHA:", 0, 1, 'L');

	$pdf->SetXY($setx+12, 39.5);
	$pdf->SetFont('Arial', '', '8');
	$pdf->Cell(66, 5, $fecha, 0, 1, 'L');
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect($setx, 30, 97, 15);    // DOCUMENT

	/***************************************************************************/

	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->SetXY(110, 31.5);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->Cell(97, 5, "NOMBRE DEL DOCUMENTO:", 0, 1, 'C');

	$pdf->SetXY(110, 35.5);
	$pdf->SetFont('Arial', '', '8');
	$pdf->Cell(97, 5, $nombre_documento, 0, 1, 'C');

	$pdf->Rect(110, 30, $setderecha-2, 15);    // NOMBRE DEL DOCUMENTO

	/***************************************************************************/

	$pdf->SetXY(110, 50);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	// L (El texto de la celda lo envia a la derecha), F (Rellena la celda con el color seleccionado)
	$pdf->Cell(63, 5, "Folio No. (File No.):", 1, 1, 'C', 'C');

	$pdf->SetXY(173, 50);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(51, 51, 153); // Color Morado
	$pdf->Cell(34, 5, $NOMBRE_PDF, 1, 1, 'C');

	/***************************************************************************/

	$pdf->SetXY($setx, 55);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Cell($cellsize, 5, utf8_decode("(1) Información general del reporte (General Information of the report)"), 1, 1, 'C', 'F');

	/***************************************************************************/

	$pdf->SetXY($setx, 60);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Multicell($cellx+6, 10, "Reportado por (Reported by):", 1, 1, 'L', 'F');
	
	$pdf->SetXY(64, 60);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->Cell(46, 10, utf8_decode($REPORTA), 1, 1, 'C', 'F');
	 
	$pdf->SetXY(110, 60);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->Multicell(47, 10, "Generado por (Generated by):", 1, 1, 'C', 'F');

	$pdf->SetXY(155, 60);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->Cell(52, 10, utf8_decode($GENERA), 1, 1, 'C', 'F');

	/***************************************************************************/

	$pdf->SetXY($setx, 70);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->Multicell($cellx+6, 10, utf8_decode("Área/Department (Detected On):"), 1, 1, 'L', 'F');
	
	$pdf->SetXY(65, 70.5);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->SetFont('Arial', '', '7');
	$pdf->Multicell(44, 3, utf8_decode($DETEC), 0, 1, 'C', 'F');

	$pdf->SetXY(110, 70);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->SetFont('Arial', '', '8');
	$pdf->Multicell(45, 10, utf8_decode("Área/Department (Origin defect):"), 1, 1, 'L', 'F');

	$pdf->SetXY(156, 70.5);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->SetFont('Arial', '', '7');
	$pdf->Multicell(50, 3, utf8_decode($LOCALIZADD), 0, 1, 'C', 'F');


	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect(155, 70, 52, 10);    // $LOCALIZADD

	/***************************************************************************/
	
	$pdf->SetXY($setx, 80);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->SetFont('Arial', '', '8');
	$pdf->cell($cellx+6, 5, "Fecha (Date):", 1, 1, 'L', 'F');

	$pdf->SetXY(64, 80);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(22, 5, $fecha, 1, 1, 'C', 'F');

	$pdf->SetXY(86, 80);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->cell(24, 5, "Hora (Time):", 1, 1, 'L', 'F');

	$pdf->SetXY(110, 80);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(22, 5, $HORA, 1, 1, 'C', 'F'); 

	$pdf->SetXY(132, 80);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->cell(23, 5, "Turno (Shift):", 1, 1, 'L', 'F');

	$pdf->SetXY(155, 80);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(52, 5, $TURNO, 1, 1, 'C', 'F');

	/***************************************************************************/

	$pdf->SetXY($setx, 85);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->cell(51, 5, utf8_decode("Número de Job (Job Number)"), 1, 1, 'L', 'F');

	$pdf->SetXY(64, 85);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(46, 5, $ORDEN, 1, 1, 'C', 'F');

	$pdf->SetXY(110, 85);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->cell($cellx+2, 5, "Fecha de Envio (Shipping date):", 1, 1, 'L', 'F');

	$pdf->SetXY(155, 85);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(52, 5, $FECHAENVIO, 1, 1, 'C', 'F');

	/***************************************************************************/

	$pdf->SetXY($setx, 90);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->cell($cellx+6, 5, "No. De Parte (Part No.):", 1, 1, 'L', 'F');

	$pdf->SetXY(64, 90);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(143, 5, $PARTE, 1, 1, 'C', 'F');

	/***************************************************************************/

	$pdf->SetXY($setx, 95);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->Multicell($cellx+6, 5, utf8_decode("Descripción del producto o la parte (Product/Part description):"), 1, 1, 'L', 'F');

	$pdf->SetXY(64, 95);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(143, 10, utf8_decode($DP), 1, 1, 'C', 'F');

	/***************************************************************************/

	$pdf->SetXY($setx, 105);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->Multicell($cellx+6, 10, "Nombre del proveedor (Vendor name):", 1, 1, 'L', 'F');

	$pdf->SetXY(64, 105);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(143, 10, utf8_decode($PROVEEDOR), 1, 1, 'C', 'F');

	/***************************************************************************/

	$pdf->SetXY($setx, 115);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->Multicell(73, 10, "No. de piezas en el job (No. of pieces in the job):", 1, 1, 'L', 'F');

	$pdf->SetXY(86, 115);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(24, 10, $PIEZASORDEN, 1, 1, 'C', 'F');

	$pdf->SetXY(110, 115);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->Multicell(65, 5, "No. de piezas rechazadas (No. of pieces rejected):", 1, 1, 'L', 'F');

	$pdf->SetXY(173, 115);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(34, 10, $PIEZASRECHAZADAS, 1, 1, 'C', 'F');

	/***************************************************************************/
	
	$pdf->SetXY($setx, 125);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Cell($cellsize, 5, utf8_decode("(2) Razón de rechazo (Reason for rejection)"), 1, 1, 'C', 'F');

	/***************************************************************************/
	
	$pdf->SetXY($setx, 130);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->cell($cellsize, 10, utf8_decode($RECHAZOD), 1, 1, 'C', 'F');	
	
	/***************************************************************************/
	
	$pdf->SetXY($setx, 140);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Cell($cellsize, 5, utf8_decode("(3) Descripción de la no-conformidad (DESCRIPTION OF THE NON-CONFORMANCE)"), 1, 1, 'C', 'F');

	/***************************************************************************/
	
	$pdf->SetXY($setx, 146);
	$pdf->SetTextColor(31, 73, 125);   // Color Azul
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Multicell(190, 4, utf8_decode($DF), 0, 1, 'C', 'F');	//Descripción de la falla
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect($setx, 145, $cellsize, 20); // (3) Descripción  
	
	/***************************************************************************/
	
	$pdf->SetXY($setx, 165);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->SetFillColor(141, 180, 226); // Color Azul

	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect(110, 165.1, $setderecha-2, 10, 'F'); // (5) Disposición del producto

	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Cell(97, 10, utf8_decode("(4) Localización del defecto (Detected on)"), 1, 1, 'C', 'F');

	$pdf->SetXY(111, 166);
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Multicell(95, 4, utf8_decode("(5) Disposición del producto no conforme (Disposition of non-conformance product)"), 0, 1, 'C');

	/***************************************************************************/

	$pdf->SetXY($setx+1, 176);
	$pdf->SetTextColor(31, 73, 125);    // Color Azul
	$pdf->SetFillColor(255, 255, 255);  // Color Gris
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Multicell(95, 4, utf8_decode($LOCACIONFD), 0, 1, 'C', 'F');

	$pdf->SetXY(111, 176);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Multicell(95, 4, utf8_decode($DISPOSICIONPD), 0, 1, 'C', 'F');

	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect($setx, 175, $setderecha-2, 10); // (4) Localización del defecto*/
	$pdf->Rect(110, 175, $setderecha-2, 10);   // (5) Disposición del producto  
	$pdf->Rect(110, 165, $setderecha-2, 10);   // $DISPOSICIONPD  

	/***************************************************************************/

	$pdf->SetXY($setx, 185);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Cell($cellsize, 5, utf8_decode("Archivo fotográfico (Photo archive)"), 1, 1, 'C', 'F');

	/***************************************************************************/

	$pdf->SetXY($setx, 190);
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Multicell(64.6, 56, utf8_decode(""), 1, 1, 'C');

	$pdf->SetXY($setx+64.6, 190);

	// C (Centra el texto de la celda)
	$pdf->Multicell(64.6, 56, utf8_decode(""), 1, 1, 'C');

	$pdf->SetXY($setx+129, 190);
	// C (Centra el texto de la celda)
	$pdf->Multicell(65, 56, utf8_decode(""), 1, 1, 'C');

    /***************************************************************************/

    $obj_simpleimage=new SimpleImage();       	  											       // Sea crea un objeto de la clase SimpleImage()

    $foto1=$_FILES['foto1']['name'];		  	   												   // Obtenemos el nombre de la foto1 	
	$foto2=$_FILES['foto2']['name'];          	  												   // Obtenemos el nombre de la foto2 	
	$foto3=$_FILES['foto3']['name'];		  	  												   // Obtenemos el nombre de la foto3 	

	$ruta_foto1=$_FILES['foto1']['tmp_name']; 	   												   // Guarda la foto1 en una carpeta temporalmente	
	$ruta_foto2=$_FILES['foto2']['tmp_name']; 	  												   // Guarda la foto1 en una carpeta temporalmente	
	$ruta_foto3=$_FILES['foto3']['tmp_name']; 	   												   // Guarda la foto1 en una carpeta temporalmente	  

	$destino_foto1="../fotos/".$foto1;		  	   												   // Generamos la dirección donde se guardará la foto1
	$destino_foto2="../fotos/".$foto2;		 	  												   // Generamos la dirección donde se guardará la foto1
	$destino_foto3="../fotos/".$foto3;		 	  											       // Generamos la dirección donde se guardará la foto1

	$foto1_nuevo=time().rand().".jpg";		       												   // Generamos un nuevo nombre aleatorio para la foto1
	$foto2_nuevo=time().rand().".jpg";		       												   // Generamos un nuevo nombre aleatorio para la foto2
	$foto3_nuevo=time().rand().".jpg";		  	  												   // Generamos un nuevo nombre aleatorio para la foto3

	$destino_foto1_nuevo="../fotos/".$foto1_nuevo; 												   // Generamos la dirección donde se guardará la foto1_nuevo
	$destino_foto2_nuevo="../fotos/".$foto2_nuevo; 												   // Generamos la dirección donde se guardará la foto2_nuevo
	$destino_foto3_nuevo="../fotos/".$foto3_nuevo; 												   // Generamos la dirección donde se guardará la foto3_nuevo

	if($foto1 && $foto2 && $foto3!=NULL) // Si las variables $foto1, $foto2 y $foto3 contienen imagenes, las tres imágenes se agregarán al archivo pdf
	{
		copy($ruta_foto1, $destino_foto1); 														   // Guarda la foto1 en el servidor
		copy($ruta_foto2, $destino_foto2); 														   // Guarda la foto1 en el servidor
		copy($ruta_foto3, $destino_foto3); 														   // Guarda la foto1 en el servidor

		$obj_simpleimage->load($destino_foto1);													   // Carga la foto1
		$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4); // Redimensiona la imágen a 1/4 de su tamaño real
		$obj_simpleimage->save($destino_foto1_nuevo);											   // Guarda los cambios realizados							

		if($obj_simpleimage->getWidth()>$obj_simpleimage->getHeight())							   // Si el ancho de la foto1 es más grande que el alto ... 
		{																						   
			$pdf->Image($destino_foto1_nuevo, 15.3,  200, 60); 									   // ... Agrega la foto1 en el archivo pdf en forma horizontal
		}					
		else                                                                                       // De no ser así ...
		{
			$pdf->Image($destino_foto1_nuevo, 30,  191.3, 30);                                     // ... Agrega la foto1 en el archivo pdf en forma vertical
		}

		$obj_simpleimage->load($destino_foto2);													   // Carga la imágen foto2
		$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4); // Redimensiona la imágen a 1/4 de su tamaño real
		$obj_simpleimage->save($destino_foto2_nuevo);											   // Guarda los cambios realizados	

		if($obj_simpleimage->getWidth()>$obj_simpleimage->getHeight())							   // Si el ancho de la foto2 es más grande que el alto ... 
		{
			$pdf->Image($destino_foto2_nuevo, 79.7,  200, 60);	 								   // ... Agrega la imágen foto2 en el archivo pdf en forma horizontal
		}
		else                                                                                       // De no ser así ...
		{
			$pdf->Image($destino_foto2_nuevo, 95,  191.3, 30);                                     // ... Agrega la imágen foto2 en el archivo pdf en forma vertical
		}

		$obj_simpleimage->load($destino_foto3);                                                    // Carga la imágen foto2
		$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4); // Redimensiona la imágen a 1/4 de su tamaño real
		$obj_simpleimage->save($destino_foto3_nuevo);                                              // Guarda los cambios realizados	
	 	
		if($obj_simpleimage->getWidth()>$obj_simpleimage->getHeight())							   // Si el ancho de la foto3 es más grande que el alto ... 
		{
			$pdf->Image($destino_foto3_nuevo, 144.4, 200, 60);	 								   // ... Agrega la imágen foto3 en el archivo pdf en forma horizontal
		}
		else                                                                                       // De no ser así ...
		{
			$pdf->Image($destino_foto3_nuevo, 160, 191.3, 30);                                     // ... Agrega la imágen foto3 en el archivo pdf en forma vertical
		}
	}
	else if($foto1 && $foto2!=NULL)  // Si las variables $foto1 y $foto2 contienen imagenes, las dos imágenes se agregarán al archivo pdf
	{
		copy($ruta_foto1, $destino_foto1);
		copy($ruta_foto2, $destino_foto2);

		$obj_simpleimage->load($destino_foto1);
		$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4);
		$obj_simpleimage->save($destino_foto1_nuevo);

		if($obj_simpleimage->getWidth()>$obj_simpleimage->getHeight())							   // Si el ancho de la foto1 es más grande que el alto ... 
		{																						   
			$pdf->Image($destino_foto1_nuevo, 15.3,  200, 60); 									   // ... Agrega la foto1 en el archivo pdf en forma horizontal
		}					
		else                                                                                       // De no ser así ...
		{
			$pdf->Image($destino_foto1_nuevo, 30,  191.3, 30);                                     // ... Agrega la foto1 en el archivo pdf en forma vertical
		}

		$obj_simpleimage->load($destino_foto2);
		$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4);
		$obj_simpleimage->save($destino_foto2_nuevo);

		if($obj_simpleimage->getWidth()>$obj_simpleimage->getHeight())							   // Si el ancho de la foto2 es más grande que el alto ... 
		{
			$pdf->Image($destino_foto2_nuevo, 79.7,  200, 60);	 								   // ... Agrega la imágen foto2 en el archivo pdf en forma horizontal
		}
		else                                                                                       // De no ser así ...
		{
			$pdf->Image($destino_foto2_nuevo, 95,  191.3, 30);                                     // ... Agrega la imágen foto2 en el archivo pdf en forma vertical
		}
	}
	else if($foto1 && $foto3!=NULL) // Si las variables $foto1 y $foto3 contienen imagenes, las dos imágenes se agregarán al archivo pdf
	{
		copy($ruta_foto1, $destino_foto1);
		copy($ruta_foto3, $destino_foto3);

		$obj_simpleimage->load($destino_foto1);
		$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4);
		$obj_simpleimage->save($destino_foto1_nuevo);

		if($obj_simpleimage->getWidth()>$obj_simpleimage->getHeight())							   // Si el ancho de la foto1 es más grande que el alto ... 
		{																						   
			$pdf->Image($destino_foto1_nuevo, 15.3,  200, 60); 									   // ... Agrega la foto1 en el archivo pdf en forma horizontal
		}					
		else                                                                                       // De no ser así ...
		{
			$pdf->Image($destino_foto1_nuevo, 30,  191.3, 30);                                     // ... Agrega la foto1 en el archivo pdf en forma vertical
		}

		$obj_simpleimage->load($destino_foto3);
		$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4);
		$obj_simpleimage->save($destino_foto3_nuevo);

		if($obj_simpleimage->getWidth()>$obj_simpleimage->getHeight())							   // Si el ancho de la foto3 es más grande que el alto ... 
		{
			$pdf->Image($destino_foto3_nuevo, 144.4, 200, 60);	 								   // ... Agrega la imágen foto3 en el archivo pdf en forma horizontal
		}
		else                                                                                       // De no ser así ...
		{
			$pdf->Image($destino_foto3_nuevo, 160, 191.3, 30);                                     // ... Agrega la imágen foto3 en el archivo pdf en forma vertical
		}
	}
	else if($foto2 && $foto3!=NULL) // Si las variables $foto2 y $foto3 contienen imagenes, las dos imágenes se agregarán al archivo pdf
	{
		copy($ruta_foto2, $destino_foto2);
		copy($ruta_foto3, $destino_foto3);

		$obj_simpleimage->load($destino_foto2);
		$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4);
		$obj_simpleimage->save($destino_foto2_nuevo);

		if($obj_simpleimage->getWidth()>$obj_simpleimage->getHeight())							   // Si el ancho de la foto2 es más grande que el alto ... 
		{
			$pdf->Image($destino_foto2_nuevo, 79.7,  200, 60);	 								   // ... Agrega la imágen foto2 en el archivo pdf en forma horizontal
		}
		else                                                                                       // De no ser así ...
		{
			$pdf->Image($destino_foto2_nuevo, 95,  191.3, 30);                                     // ... Agrega la imágen foto2 en el archivo pdf en forma vertical
		}

		$obj_simpleimage->load($destino_foto3);
		$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4);
		$obj_simpleimage->save($destino_foto3_nuevo);

		if($obj_simpleimage->getWidth()>$obj_simpleimage->getHeight())							   // Si el ancho de la foto3 es más grande que el alto ... 
		{
			$pdf->Image($destino_foto3_nuevo, 144.4, 200, 60);	 								   // ... Agrega la imágen foto3 en el archivo pdf en forma horizontal
		}
		else                                                                                       // De no ser así ...
		{
			$pdf->Image($destino_foto3_nuevo, 160, 191.3, 30);                                     // ... Agrega la imágen foto3 en el archivo pdf en forma vertical
		}
	}
	else if($foto1!=NULL)
	{
		copy($ruta_foto1, $destino_foto1);

		$obj_simpleimage->load($destino_foto1);
		$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4);
		$obj_simpleimage->save($destino_foto1_nuevo);

		if($obj_simpleimage->getWidth()>$obj_simpleimage->getHeight())							   // Si el ancho de la foto1 es más grande que el alto ... 
		{																						   
			$pdf->Image($destino_foto1_nuevo, 15.3,  200, 60); 									   // ... Agrega la foto1 en el archivo pdf en forma horizontal
		}					
		else                                                                                       // De no ser así ...
		{
			$pdf->Image($destino_foto1_nuevo, 30,  191.3, 30);                                     // ... Agrega la foto1 en el archivo pdf en forma vertical
		}
	}
	else if($foto2!=NULL)
	{
		copy($ruta_foto2, $destino_foto2);

		$obj_simpleimage->load($destino_foto2);
		$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4);
		$obj_simpleimage->save($destino_foto2_nuevo);

		if($obj_simpleimage->getWidth()>$obj_simpleimage->getHeight())							   // Si el ancho de la foto2 es más grande que el alto ... 
		{
			$pdf->Image($destino_foto2_nuevo, 79.7,  200, 60);	 								   // ... Agrega la imágen foto2 en el archivo pdf en forma horizontal
		}
		else                                                                                       // De no ser así ...
		{
			$pdf->Image($destino_foto2_nuevo, 95,  191.3, 30);                                     // ... Agrega la imágen foto2 en el archivo pdf en forma vertical
		}
	}
	else if($foto3!=NULL)
	{
		copy($ruta_foto3, $destino_foto3);
		
		$obj_simpleimage->load($destino_foto3);
		$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4);
		$obj_simpleimage->save($destino_foto3_nuevo);

		if($obj_simpleimage->getWidth()>$obj_simpleimage->getHeight())							   // Si el ancho de la foto3 es más grande que el alto ... 
		{
			$pdf->Image($destino_foto3_nuevo, 144.4, 200, 60);	 								   // ... Agrega la imágen foto3 en el archivo pdf en forma horizontal
		}
		else                                                                                       // De no ser así ...
		{
			$pdf->Image($destino_foto3_nuevo, 160, 191.3, 30);                                     // ... Agrega la imágen foto3 en el archivo pdf en forma vertical
		}
	}
	
	/* Elimina las fotos del servidor */
	if ($foto1!=NULL) 
	{
		unlink($destino_foto1);
		unlink($destino_foto1_nuevo);

		if($foto2!=NULL)
		{
			unlink($destino_foto2);
			unlink($destino_foto2_nuevo);

			if($foto3!=NULL)
			{
				unlink($destino_foto3);
				unlink($destino_foto3_nuevo);
			}
		} 
	}
	else if ($foto2!=NULL) 
	{
		unlink($destino_foto2);
		unlink($destino_foto2_nuevo);

		if($foto3!=NULL)
		{
			unlink($destino_foto3);
			unlink($destino_foto3_nuevo);
		}
	}
	else if ($foto3!=NULL) 
	{
		unlink($destino_foto3);
		unlink($destino_foto3_nuevo);
	}

	/***************************************************************************/

	$pdf->SetXY(12.5, 251);
	$pdf->SetFillColor(255, 255, 255); // Color Gris
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Multicell(195, 4, utf8_decode("2016 Visionaire Lighting. This document was created for the use of Visionaire Lighting and can be reproduced exclusively for those related to the company and under expressed written approval."), 0, 1, 'L');

	/***************************************************************************/

	$pdf->Output("../ncpr/$NOMBRE_PDF.pdf", "F");  // Guarda el archivo pdf en la carpeta ncpr
	//$pdf->Output("../ncpr/$NOMBRE_PDF.pdf", "I");  // Abre el archivo pdf en el navegador

	/***************************************************************************/

	echo "<script language='JavaScript'>
				window.alert('El formato NCPR ha sido creado. Se está enviando por correo.') 
				window.location.href='../mail.php?id_folio=$id_Folio'
			</script>";
?>