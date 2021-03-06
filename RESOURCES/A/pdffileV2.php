<?php
	define('FPDF_FONTPATH', 'fpdf/font/');
	require_once('fpdf/fpdf.php');
	include_once("DBManager.php");

	$objCon = new DBManager;

	class PDF extends FPDF
	{
		var $widths;
		var $aligns;

		function Header()
		{
			$this->SetFont('helvetica', '', 10);
			//$this->Text(20,14,'Historial clinico',0,'C', 0);
			$this->Ln(30);
		}

		function Footer()
		{
			$this->SetY(-20);
			$this->SetFont('helvetica', 'B', 8);
			//$this->Cell(100,10,'Historial medico',0,0,'L');
		}
	}

	/*$id_Folio=7;*/

	if ($objCon->conectar()==true)
	{
		
		/* Revisa en la base de datos la cantidad de registros de NCPR's */
		$sql0="SELECT COUNT(*) FROM tbncprs";
		$result0=mysql_query($sql0) or die;

		/* Al número obtenido, se le suma 1 y se le asigna al NCPR */
		$id_Folio=(mysql_result($result0, 0));

		$sql="SELECT * FROM tbncprs WHERE id_Folio='$id_Folio'";
		$result = mysql_query($sql);
		
		while ($row=mysql_fetch_array($result)) 
		{ 
			$ORDEN=$row['Numero_Orden'];
			$PARTE=$row['Numero_Parte'];
			$TURNO=$row['Turno'];
			$FECHAENVIO=$row['Fecha_Envio'];
			$DESCRIPCIONPARTE=$row['Descripcion_Producto'];
			$PROVEEDOR=$row['Nombre_Proveedor'];
			$REPORTA=$row['Reportado_Por'];
			$GENERA=$row['Generado_Por'];
			$FECHA=$row['Fecha'];
			$HORA=$row['Hora'];
			$area_falla_detectada=$row['Origen_Falla_Detectada'];
			$LOCALIZADEFECTO=$row['Origen_Falla_Detectada'];
			$LOCALIZADEFECTODESC=$row['Origen_Falla_Descripcion'];
			$LOCACIONDEFECTO=$row['Locacion_Falla'];
			$LOCACIONDEFECTODESC=$row['Locacion_Falla_Desc'];
			$PIEZASORDEN=$row['Numero_Piezas'];
			$PIEZASRECHAZADAS=$row['Numero_Piezas_Rechazadas'];
			$RECHAZO=$row['Razon_Rechazo'];
			$DESCRIPCIONFALLA=$row['Descripcion'];
			$DISPOSICION=$row['Disposicion_Producto'];
			$DISPOSICIONDESCRIPCION=$row['Disposicion_Producto_Desc'];
			$RECHAZODESCRIPCION=$row['Razon_Rechazo_Desc'];	
			$DETECCION=$row["Area_Dept_Codigo"];
			$DETECCIONDESCRIPCION=$row["Area_Dept_Desc"];
		}
	}
	
	$DISPOSICIONPD=$DISPOSICION .' - '. $DISPOSICIONDESCRIPCION;
	$LOCALIZADD=$LOCALIZADEFECTO .' - '. $LOCALIZADEFECTODESC;
	$LOCACIONFD=$LOCACIONDEFECTO .' - '. $LOCACIONDEFECTODESC;
	$RECHAZOD=$RECHAZO .' - '. $RECHAZODESCRIPCION;
	$DETEC=$DETECCION .' - '. $DETECCIONDESCRIPCION;

	/* Declaración de variables */
	//$folio=$_POST['id_folio'];Generado por (Generated by):
	$documento_no="VL-PA-SGC-001-F02";
	$pagina="1 OF 1";
	$document="NON-CONFORMING PRODUCT REPORT";
	$revision="4";
	$fecha=$FECHA;
	$nombre_documento="NON-CONFORMING PRODUCT REPORT (ENGLISH)";
	
	//$foto1="img/foto1.jpg";
	//$foto2="img/foto2.jpg";Generado por (Generated by):
	//$foto3="img/foto3.jpg";
	/* Fin de declaración de variables */

	/* Variables del sistema*/
	$setx=13;
	$cellx=45;
	$cellsize=194;
	$setderecha=99;
	
	$x=4;
	$y=202;
	$c=4;
	/* Fin de variables del sistema*/

	// PDF(Vertical, Milimetros, Tamaño Carta)
	$pdf=new PDF('P', 'mm', 'Letter');
	$pdf->AddPage();
	$pdf->SetFont('helvetica', '', '8');
	
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect(2, 2, 206, 265);   // Contenedor principal
	
	//Tabla1
	$t1=4;
	
	$pdf->Image('./img/Logo.jpg', 8, $t1+1, 50); //Imagen de logotipo
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	
	$pdf->Rect($x, $t1, $y, 10);  
	$pdf->Rect($x, $t1+10, $y, 10); 
	
	$pdf->Line(88, $t1, 88, $t1+20);
	$pdf->Line(158, $t1, 158, $t1+10);
	
	
	$pdf->SetXY($x+90, $t1+3);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->cell(30, 5, "DOCUMENTO NO.:   VL-PA-SGC-001-F02", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+160, $t1+3);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->cell(1, 5, "PAGINA: 1 OF 1", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+4, $t1+12);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->cell(1, 0, "DOCUMENT: NON-CONFORMING PRODUCT REPORT", 0, 1, 'L', 'F');

	$pdf->SetXY($x+4, $t1+15);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->cell(1, 0, "REVISION: 4", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+4, $t1+18);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->cell(1, 0, "FECHA:", 0, 1, 'L', 'F');

	$pdf->SetXY($x+85, $t1+13.5);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->cell(1, 5, "NOMBRE DEL DOCUMENTO:    NON-CONFORMING PRODUCT REPORT (ENGLISH)", 0, 1, 'L', 'F');

	
	
	//Tabla2
	$t2=25;
	
	$pdf->SetXY($x, $t2);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(40, 4, "Folio No. (File No.):", 0, 1, 'C', 'F');
	
	$pdf->SetXY($x+40, $t2);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "Folio 1 2 3", 0, 1, 'L','F');
	
	
	$pdf->SetXY($x, $t2+4);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(141, 180, 226); // Color Blanco
	$pdf->cell(0, 4, "(1) Informacion general del reporte (General information of the report)", 0, 1, 'L', 'F');
		
	
	$pdf->SetXY($x, $t2+8);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "Reportado por (Reported by):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+36, $t2+8);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "REPORTADO POR 1 2 3", 0, 1, 'L', 'F');
	
	
	$pdf->SetXY($x, $t2+12);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "Generado por (Generated by):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+37, $t2+12);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+16);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "Area/Department (Detected On):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+39, $t2+16);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+20);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "Area/Department (Origin defect):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+40, $t2+20);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+24);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "Fecha (Date):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+17, $t2+24);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+28);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "Hora (Time):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+16, $t2+28);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+32);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "Turno (Shift):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+17, $t2+32);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	
	$pdf->SetXY($x, $t2+36);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "Numero de Job (Job Number):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+37, $t2+36);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+40);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "Fecha de Envio (Shipping Date):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+40, $t2+40);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+44);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "No. De Parte (Part No.):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+30, $t2+44);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+48);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "Descripcion del producto o la parte (Product/Part description):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+75, $t2+48);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+52);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "Nombre del proveedor (Vendor Name):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+48, $t2+52);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+56);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "No. de piezas en el job (No. of pieces in the job):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+59, $t2+56);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+60);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color Blanco
	$pdf->cell(40, 4, "No. de piezas rechazadas (No. of pieces rejected):", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+60, $t2+60);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	
	$pdf->Rect($x, $t2, 84, $c);  
	$pdf->Rect($x, $t2+$c, $y, $c);
	$pdf->Rect($x, $t2+$c*2, $y, $c);
	$pdf->Rect($x, $t2+$c*3, $y, $c);
	$pdf->Rect($x, $t2+$c*4, $y, $c);
	$pdf->Rect($x, $t2+$c*5, $y, $c);
	$pdf->Rect($x, $t2+$c*6, $y, $c);
	$pdf->Rect($x, $t2+$c*7, $y, $c);
	$pdf->Rect($x, $t2+$c*8, $y, $c);
	$pdf->Rect($x, $t2+$c*9, $y, $c);
	$pdf->Rect($x, $t2+$c*10, $y, $c);
	$pdf->Rect($x, $t2+$c*11, $y, $c);
	$pdf->Rect($x, $t2+$c*12, $y, $c);
	$pdf->Rect($x, $t2+$c*13, $y, $c);
	$pdf->Rect($x, $t2+$c*14, $y, $c);
	$pdf->Rect($x, $t2+$c*15, $y, $c);
	
	$pdf->Line(44, $t2, 44, $t2+4);
	$pdf->Line(40, $t2+8, 40, $t2+12);
	$pdf->Line(41, $t2+12, 41, $t2+16);
	$pdf->Line(43, $t2+16, 43, $t2+20);
	$pdf->Line(44, $t2+20, 44, $t2+24);
	$pdf->Line(21, $t2+24, 21, $t2+28);
	$pdf->Line(20, $t2+28, 20, $t2+32);
	$pdf->Line(21, $t2+32, 21, $t2+36);
	$pdf->Line(41, $t2+36, 41, $t2+40);
	$pdf->Line(44, $t2+40, 44, $t2+44);
	$pdf->Line(33, $t2+44, 33, $t2+48);
	$pdf->Line(79, $t2+48, 79, $t2+52);
	$pdf->Line(52, $t2+52, 52, $t2+56);
	$pdf->Line(63, $t2+56, 63, $t2+60);
	$pdf->Line(64, $t2+60, 64, $t2+64);
	
	//Tabla3
	$t3=89;
	
	$pdf->SetXY($x, $t3);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(0, 4, "(2) Razon de rechazo (Reason for rejection)", 0, 1, 'C', 'F');
	
	$pdf->SetXY($x, $t3+4);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t3+$c*2);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(0, 4, "(3) Descripcion de la no-conformidad (Description of the non-conformance)", 0, 1, 'C', 'F');
	
	$pdf->SetXY($x, $t3+12);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t3+$c*5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(101, 4, "(4) Localizacion del defecto (Detected on) ", 0, 1, 'C', 'F');
	
	$pdf->SetXY($x, $t3+24);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+101, $t3+$c*5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(101, 4, "(5) Disposicion del producto no conforme (Disposition of non-conformance product)", 0, 1, 'C', 'F');
	
	$pdf->SetXY($x+102, $t3+24);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	

	
	$pdf->Rect($x, $t3, $y, $c);  
	$pdf->Rect($x, $t3+$c, $y, $c);  
	$pdf->Rect($x, $t3+$c*2, $y, $c);  
	$pdf->Rect($x, $t3+$c*3, $y, $c*2);  
	$pdf->Rect($x, $t3+$c*5, $y, $c);  
	$pdf->Rect($x, $t3+$c*6, $y, $c);  
	
	$pdf->Line(105, $t3+$c*5, 105, $t3+$c*5+8);


	//Tabla4
	$t4=117;
	
	$pdf->SetXY($x, $t4);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(0, 4, "Archivo fotografico (Photo Archive)", 0, 1, 'C', 'F');


	$pdf->Rect($x, $t4, $y, $c);  
	
	$pdf->SetXY($x,$t4+4);
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Multicell(66, 56, utf8_decode(""), 1, 1, 'C');

	$pdf->SetXY($x+66, $t4+4);
	// C (Centra el texto de la celda)
	$pdf->Multicell(71, 56, utf8_decode(""), 1, 1, 'C');

	$pdf->SetXY($x+137, $t4+4);
	// C (Centra el texto de la celda)
	$pdf->Multicell(65, 56, utf8_decode(""), 1, 1, 'C');
	
	
	//Tabla5
	$t5=177;
	
		
	$pdf->SetXY($x, $t5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(0, 4, "(6) Acciones inmediatas (Immediate actions)", 0, 1, 'C', 'F');
	
	$pdf->SetXY($x, $t5+4);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t5+72);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(67, 4, "(7) Acciones tomadas por (Inmediate actions taken by)", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+68, $t5+72);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(0, 51, 102); // Color AZUL
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Cell(34, 5, "GENERADO POR 1 2 3", 0, 1, 'L', 'F');
	
	
	$pdf->Rect($x, $t5, $y, $c);  
	$pdf->Rect($x, $t5+4, $y, $c*3);  
	
	$pdf->SetXY($x,$t5+16);
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Multicell(66, 56, utf8_decode(""), 1, 1, 'C');

	$pdf->SetXY($x+66, $t5+16);
	// C (Centra el texto de la celda)
	$pdf->Multicell(71, 56, utf8_decode(""), 1, 1, 'C');

	$pdf->SetXY($x+137, $t5+16);
	// C (Centra el texto de la celda)
	$pdf->Multicell(65, 56, utf8_decode(""), 1, 1, 'C');
	
	$pdf->Rect($x, $t5+72, $y, $c);  
	$pdf->Line(71, $t5+72, 71, $t5+76);
	
	
	
	/*
	
	$pdf->SetXY(173, 19);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->cell(34, 5, "PAGINA:", 0, 1, 'C');

	$pdf->SetXY(173, 24);
	$pdf->SetFont('Arial', '', '8');
	$pdf->Cell(34, 5, $pagina, 0, 1, 'C');

	/*

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

	/*

	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->SetXY(110, 31.5);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->Cell(97, 5, "NOMBRE DEL DOCUMENTO:", 0, 1, 'C');

	$pdf->SetXY(110, 35.5);
	$pdf->SetFont('Arial', '', '8');
	$pdf->Cell(97, 5, $nombre_documento, 0, 1, 'C');

	$pdf->Rect(110, 30, $setderecha-2, 15);    // NOMBRE DEL DOCUMENTO

	/***************************************************************************

	$pdf->SetXY(110, 50);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	// C (El texto de la celda lo envia al centro), F (Rellena la celda con el color seleccionado)
	$pdf->Cell(63, 5, "Folio No. (File No.):", 1, 1, 'C', 'C');

	$pdf->SetXY(173, 50);
	$pdf->SetFont('Arial', '', '8');
	$pdf->SetTextColor(51, 51, 153); // Color Morado
	$pdf->Cell(34, 5, $id_Folio, 1, 1, 'C');

	/***************************************************************************

	$pdf->SetXY($setx, 55);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Cell($cellsize, 5, utf8_decode("(1) Información general del reporte (General Information of the report)"), 1, 1, 'C', 'F');

	/***************************************************************************

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

	/***************************************************************************

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

	/***************************************************************************
	
	$pdf->SetXY($setx, 80);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->SetFont('Arial', '', '8');
	$pdf->cell($cellx+6, 5, "Fecha (Date):", 1, 1, 'L', 'F');

	$pdf->SetXY(64, 80);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(22, 5, $FECHA, 1, 1, 'C', 'F');

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

	/***************************************************************************

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

	/***************************************************************************

	$pdf->SetXY($setx, 90);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->cell($cellx+6, 5, "No. De Parte (Part No.):", 1, 1, 'L', 'F');

	$pdf->SetXY(64, 90);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(143, 5, $PARTE, 1, 1, 'C', 'F');

	/***************************************************************************

	$pdf->SetXY($setx, 95);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->Multicell($cellx+6, 5, utf8_decode("Descripción del producto o la parte (Product/Part description):"), 1, 1, 'L', 'F');

	$pdf->SetXY(64, 95);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(143, 10, utf8_decode($DESCRIPCIONPARTE), 1, 1, 'C', 'F');

	/***************************************************************************

	$pdf->SetXY($setx, 105);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->Multicell($cellx+6, 10, "Nombre del proveedor (Vendor name):", 1, 1, 'L', 'F');

	$pdf->SetXY(64, 105);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->cell(143, 10, utf8_decode($PROVEEDOR), 1, 1, 'C', 'F');

	/***************************************************************************

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

	/***************************************************************************
	
	$pdf->SetXY($setx, 125);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Cell($cellsize, 5, utf8_decode("(2) Razón de rechazo (Reason for rejection)"), 1, 1, 'C', 'F');

	/***************************************************************************
	
	$pdf->SetXY($setx, 130);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->cell($cellsize, 10, utf8_decode($RECHAZOD), 1, 1, 'C', 'F');	
		
	/***************************************************************************
	
	$pdf->SetXY($setx, 140);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Cell($cellsize, 5, utf8_decode("(3) Descripción de la no-conformidad (DESCRIPTION OF THE NON-CONFORMANCE)"), 1, 1, 'C', 'F');

	/***************************************************************************
	
	$pdf->SetXY($setx+1, 146);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->Multicell(191, 4, utf8_decode($DESCRIPCIONFALLA), 0, 1, 'C', 'F');	
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect($setx, 145, $cellsize, 20); // (3) Descripción  
	
	/***************************************************************************
	
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

	/***************************************************************************

	$pdf->SetXY($setx+1, 176);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	$pdf->SetFillColor(255, 255, 255); // Color Gris
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Multicell(95, 3.5, utf8_decode($LOCACIONFD), 0, 1, 'C', 'F');

	$pdf->SetXY(111, 176);
	$pdf->SetTextColor(31, 73, 125); // Color Azul
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Multicell(95, 3.5, utf8_decode($DISPOSICIONPD), 0, 1, 'C', 'F');

	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect($setx, 175, $setderecha-2, 10); // (4) Localización del defecto*
	$pdf->Rect(110, 175, $setderecha-2, 10); // (5) Disposición del producto  
	$pdf->Rect(110, 165, $setderecha-2, 10); // $DISPOSICIONPD  

	/***************************************************************************

	$pdf->SetXY($setx, 185);
	$pdf->SetTextColor(0, 0, 0); // Color Negro
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Cell($cellsize, 5, utf8_decode("Archivo fotográfico (Photo archive)"), 1, 1, 'C', 'F');

	/***************************************************************************

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
	
	//$pdf->Image($foto1, 14.5, 200, 60); //Imagen de logotipo
	//$pdf->Image($foto2, 78, 200, 60); //Imagen de logotipo
	//$pdf->Image($foto3, 141.5, 200, 60); //Imagen de logotipo

	/***************************************************************************/
	
	$pdf->SetXY(5, 255);
	$pdf->SetFont('Arial', 'B', '5.5');
	$pdf->SetFillColor(255, 255, 255); // Color Gris
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Multicell(195, 4, utf8_decode("2016 Visionaire Lighting. This document was created for the use of Visionaire Lighting and can be reproduced exclusively for those related to the company and under expressed written approval."), 0, 1, 'L');

	/***************************************************************************/

$pdf->Output("ncpr/$id_Folio.pdf", "F");
$pdf->Output("ncpr/$id_Folio.pdf", "I");
?>