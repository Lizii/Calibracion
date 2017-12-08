<?php
	define('FPDF_FONTPATH', '../fpdf/font/');

	include("../SimpleImage/SimpleImage.class.php");
	require_once('../fpdf/fpdf.php');
	include_once("../DBManager.php");

	$objCon=new DBManager;
	$obj_simpleimage=new SimpleImage();

	class PDF extends FPDF
	{
		var $widths;
		var $aligns;

		function Header()
		{
			$this->SetFont('Arial', '', 10);
			$this->Ln(30);
		}

		function Footer()
		{
			$this->SetY(-20);
			$this->SetFont('Arial', 'B', 8);
		}
	}

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
	$documento_no="VL-PA-SGC-001-F02";
	$pagina="1 OF 1";
	$document="NON-CONFORMING PRODUCT REPORT";
	$revision="4";
	$fecha=$FECHA;
	$nombre_documento="NON-CONFORMING PRODUCT REPORT (ENGLISH)";
	
	/* Variables del sistema*/
	$setx=13;
	$cellx=45;
	$cellsize=194;
	$setderecha=99;
	
	$x=7.5;
	$y=202;
	$c=4;
	/* Fin de variables del sistema*/

	// PDF(Vertical, Milimetros, Tamaño Carta)
	$pdf=new PDF('P', 'mm', 'Letter');
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', '7');

	$FDESC1 = "../photos/vertical.jpg";
	$FDESC2 = "../photos/horizontal.jpg";

	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect(5.5, 2, 206, 254.5);   // Contenedor principal
	
	//Tabla1
	$t1=4;
	
	$pdf->Image('../img/Logo.jpg', $x+2.5, $t1+0.66, 50); //Imagen de logotipo
	$pdf->Rect($x, $t1+0, $y-121.5, 10); 
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	
	$pdf->Rect($x, $t1+10, $y-121.5, 10); 
	
	$pdf->Line(88, $t1, 88, $t1+20);
	$pdf->Line(158, $t1, 158, $t1+10);
	
	$pdf->SetXY($x+80.5, $t1);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(70, 10, "DOCUMENTO NO.:", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+150.5, $t1);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(51.5, 10, "PAGINA: 1 OF 1", 1, 1, 'C', 'F');
	
	$pdf->SetXY($x+2.5, $t1+10.8);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(79, 3, "DOCUMENT: ", 0, 1, 'L', 'F');

	$pdf->SetXY($x+2.5, $t1+13.8);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(79, 3, "REVISION: ", 0, 1, 'L', 'F');
	
	$pdf->SetXY($x+2.5, $t1+16.8);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(79, 3, "FECHA:", 0, 1, 'L', 'F');

	$pdf->SetXY($x+80.5, $t1+10);
	$pdf->SetFont('Arial', 'B', '8');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(121.5, 10, "NOMBRE DEL DOCUMENTO:    ", 1, 1, 'L', 'F');

	//Tabla2
	$t2=24.5;
	
	$pdf->SetXY($x, $t2);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(40, 4, "Folio No. (File No.):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+40, $t2-0.4);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetTextColor(0, 51, 102); // Color azul
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(40.5, 5, "", 0, 1, 'C','F');
	$pdf->Rect($x+40, $t2, 40.5, $c); 
		
	$pdf->SetXY($x, $t2+4);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(141, 180, 226); // Color blanco
	$pdf->cell(202, 4, "(1) Informacion general del reporte (General information of the report)", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+8);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetTextColor(0, 0, 0); // Color negro
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(40, 4, "Reportado por (Reported by):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+40, $t2+8);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(162, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+12);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(40, 4, "Generado por (Generated by):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+40, $t2+12);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(162, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+16);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(40, 4, "Area/Department (Detected On):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+40, $t2+16);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(162, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+20);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(40, 4, "Area/Department (Origin defect):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+40, $t2+20);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(162, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+24);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(40, 4, "Fecha (Date):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+40, $t2+24);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(162, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+28);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(40, 4, "Hora (Time):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+40, $t2+28);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(162, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+32);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255,255,255); // Color blanco
	$pdf->cell(40, 4, "Turno (Shift):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+40, $t2+32);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(162, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+36);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(40, 4, "Numero de Job (Job Number):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+40, $t2+36);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(162, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+40);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(40, 4, "Fecha de Envio (Shipping Date):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+40, $t2+40);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(162, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+44);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(40, 4, "No. De Parte (Part No.):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+40, $t2+44);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(162, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+48);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(80.5, 4, "Descripcion del producto o la parte (Product/Part description):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+80.5, $t2+48);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(121.5, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+52);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(80.5, 4, "Nombre del proveedor (Vendor Name):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+80.5, $t2+52);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(121.5, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+56);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(80.5, 4, "No. de piezas en el job (No. of pieces in the job):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+80.5, $t2+56);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(121.5, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t2+60);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->cell(80.5, 4, "No. de piezas rechazadas (No. of pieces rejected):", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+80.5, $t2+60);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(121.5, 4, "", 1, 1, 'L', 'F');
	 
	//Tabla3
	$t3=89;
	
	$pdf->SetXY($x, $t3);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetTextColor(0, 51, 102); // Color azul
	$pdf->SetFillColor(141, 180, 226); // Color azul
	$pdf->cell(202, 4, "(2) Razon de rechazo (Reason for rejection)", 1, 1, 'C', 'F');
	
	$pdf->SetXY($x, $t3+4);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetTextColor(0, 0, 0); // Color negro
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(202, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x, $t3+8);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetTextColor(0, 51, 102); // Color azul
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(202, 4, "(3) Descripcion de la no-conformidad (Description of the non-conformance)", 1, 1, 'C', 'F');
	
	$pdf->SetXY($x, $t3+13);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetTextColor(0, 0, 0); // Color negro
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Rect($x, $t3, $y, $c);
	$pdf->Multicell(202, 3, "", 0, 1, 'L', 'F');
	// $pdf->Rect(X, Y, Ancho, Alto);   
	$pdf->Rect($x, $y-101, 202, 8); 
	
	$pdf->SetXY($x, $t3+$c*5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetTextColor(0, 51, 102); // Color azul
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(101, 4, "(4) Localizacion del defecto (Detected on) ", 1, 1, 'C', 'F');
	
	$pdf->SetXY($x, $t3+24);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetTextColor(0, 0, 0); // Color negro
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(101, 4, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x+101, $t3+$c*5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetTextColor(0, 51, 102); // Color azul
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(101, 4, "(5) Disposicion del producto no conforme (Disposition of non-conformance product)", 1, 1, 'C', 'F');
	
	$pdf->SetXY($x+101, $t3+24);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetTextColor(0, 0, 0); // Color negro
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(101, 4, "", 1, 1, 'L', 'F');
	
	//Tabla4
	$t4=117;
	
	$pdf->SetXY($x, $t4);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetTextColor(0, 51, 102); // Color azul
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(202, 4, "Archivo fotografico (Photo Archive)", 1, 1, 'C', 'F');

	$pdf->SetXY($x,$t4+4);
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Multicell(67.5, 56, utf8_decode(""), 1, 1, 'C');
	/*$pdf->Image($FDESC1, 25.5, 122.3, 30); /*imagen vertical
	$pdf->Image($FDESC2, 8.7, 131, 65); /*imagen horizontal*/


	$pdf->SetXY($x+67.5, $t4+4);
	$pdf->Multicell(69, 56, utf8_decode(""), 1, 1, 'C');
	/*$pdf->Image($FDESC1, 94, 122.3, 30); /*imagen vertical
	$pdf->Image($FDESC2, 76.2, 131, 65); /*imagen horizontal*/

	$pdf->SetXY($x+135, $t4+4);
	$pdf->Multicell(67, 56, utf8_decode(""), 1, 1, 'C');
	/*$pdf->Image($FDESC1, 161, 122.3, 30); /*imagen vertical
	$pdf->Image($FDESC2, 143.5, 131, 65); /*imagen horizontal*/

	


	/* Conversión de fotos */

	/*$f1=$_FILES['foto1']['name'];		  	   												   // Obtenemos el nombre de la foto1 	
	$f2=$_FILES['foto2']['name'];          	  												   // Obtenemos el nombre de la foto2 	
	$f3=$_FILES['foto3']['name'];		  	  												   // Obtenemos el nombre de la foto3 	
	$f4=$_FILES['foto4']['name'];		  	   												   // Obtenemos el nombre de la foto4 	
	$f5=$_FILES['foto5']['name'];          	  												   // Obtenemos el nombre de la foto5 	
	$f6=$_FILES['foto6']['name'];		  	  												   // Obtenemos el nombre de la foto6 	

	$origen_foto1=$_FILES['foto1']['tmp_name']; 	   										   // Guarda la foto1 en una carpeta temporalmente	
	$origen_foto2=$_FILES['foto2']['tmp_name']; 	  										   // Guarda la foto2 en una carpeta temporalmente	
	$origen_foto3=$_FILES['foto3']['tmp_name']; 	   										   // Guarda la foto3 en una carpeta temporalmente	 
	$origen_foto4=$_FILES['foto4']['tmp_name']; 	   										   // Guarda la foto4 en una carpeta temporalmente	
	$origen_foto5=$_FILES['foto5']['tmp_name']; 	  										   // Guarda la foto5 en una carpeta temporalmente	
	$origen_foto6=$_FILES['foto6']['tmp_name']; 	   										   // Guarda la foto6 en una carpeta temporalmente	

	$destino_foto1="../photos/".$f1;		  	   											   // Generamos la dirección donde se guardará la foto1
	$destino_foto2="../photos/".$f2;		 	  											   // Generamos la dirección donde se guardará la foto2
	$destino_foto3="../photos/".$f3;		 	  											   // Generamos la dirección donde se guardará la foto3
	$destino_foto4="../photos/".$f4;		  	   											   // Generamos la dirección donde se guardará la foto4
	$destino_foto5="../photos/".$f5;		 	  											   // Generamos la dirección donde se guardará la foto5
	$destino_foto6="../photos/".$f6;		 	  											   // Generamos la dirección donde se guardará la foto6

	$foto1_nuevo=time().rand().".jpg";		  	   											   // Generamos la dirección donde se guardará la foto1_nuevo
	$foto2_nuevo=time().rand().".jpg";		  	   											   // Generamos la dirección donde se guardará la foto2_nuevo
	$foto3_nuevo=time().rand().".jpg";		  	   											   // Generamos la dirección donde se guardará la foto3_nuevo
	$foto4_nuevo=time().rand().".jpg";		  	   											   // Generamos la dirección donde se guardará la foto4_nuevo
	$foto5_nuevo=time().rand().".jpg";		  	   											   // Generamos la dirección donde se guardará la foto5_nuevo
	$foto6_nuevo=time().rand().".jpg";		  	   											   // Generamos la dirección donde se guardará la foto6_nuevo

	$destino_foto1_nuevo="../photos/".$foto1_nuevo;		  	   								   // Generamos la dirección donde se guardará la foto1
	$destino_foto2_nuevo="../photos/".$foto2_nuevo;		 	  								   // Generamos la dirección donde se guardará la foto2
	$destino_foto3_nuevo="../photos/".$foto3_nuevo;		 	  								   // Generamos la dirección donde se guardará la foto3
	$destino_foto4_nuevo="../photos/".$foto4_nuevo;		  	   								   // Generamos la dirección donde se guardará la foto4
	$destino_foto5_nuevo="../photos/".$foto5_nuevo;		 	  								   // Generamos la dirección donde se guardará la foto5
	$destino_foto6_nuevo="../photos/".$foto6_nuevo;		 	  								   // Generamos la dirección donde se guardará la foto6

	$foto1=validar_fotos($f1, $origen_foto1, $destino_foto1);
	$foto2=validar_fotos($f2, $origen_foto2, $destino_foto2);
	$foto3=validar_fotos($f3, $origen_foto3, $destino_foto3);
	$foto4=validar_fotos($f4, $origen_foto4, $destino_foto4);
	$foto5=validar_fotos($f5, $origen_foto5, $destino_foto5);
	$foto6=validar_fotos($f6, $origen_foto6, $destino_foto6);*/

		
	/*$vert_hor=agregar_fotos($destino_foto1, $destino_foto1_nuevo);

	if($vert_hor=='true')					                   // Si el ancho de la foto1 es más grande que el alto ... 
	{																					   
		$pdf->Image($foto1, 7, 131, 60);
	}					
	else if($vert_hor=='false')                                // De no ser así ...
	{
		$pdf->Image($foto1, 23, 122.5, 30);
	}

	$vert_hor=agregar_fotos($destino_foto2, $destino_foto2_nuevo);

	if($vert_hor=='true')					                   // Si el ancho de la foto1 es más grande que el alto ... 
	{		
		$pdf->Image($foto2, 75, 131, 60);																			   
	}					
	else if($vert_hor=='false')                                // De no ser así ...
	{
		$pdf->Image($foto2, 90, 122.5, 30);
	}

	$vert_hor=agregar_fotos($destino_foto3, $destino_foto3_nuevo);

	if($vert_hor=='true')					                   // Si el ancho de la foto1 es más grande que el alto ... 
	{	
		$pdf->Image($foto3, 143.5, 131, 60);																				   
	}					
	else if($vert_hor=='false')                                // De no ser así ...
	{
		$pdf->Image($foto3, 159, 122.5, 30);
	}*/

	//Tabla5
	$t5=177;
	
	$pdf->SetXY($x, $t5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetTextColor(0, 51, 102); // Color azul
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(202, 4, "(6) Acciones inmediatas (Immediate actions)", 1, 1, 'C', 'F');
	
	$pdf->SetXY($x, $t5+5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetTextColor(0, 0, 0); // Color negro
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Multicell(202, 3, "", 0, 1, 'L');
	// $pdf->Rect(X, Y, Ancho, Alto);   
	$pdf->Rect($x, $y-21, 202, 8); 
	
	$pdf->SetXY($x, $t5+68);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->SetTextColor(0, 51, 102); // Color azul
	$pdf->SetFillColor(141, 180, 226); // Color Azul
	$pdf->cell(202, 4, "(7) Acciones tomadas por (Inmediate actions taken by)", 1, 1, 'C', 'F');
	
	$pdf->SetXY($x, $t5+71.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->SetTextColor(0, 0, 0); // Color negro
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	$pdf->Cell(202, 6, "", 1, 1, 'L', 'F');
	
	$pdf->SetXY($x,$t5+12);
	$pdf->SetFillColor(255, 255, 255); // Color blanco
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Multicell(67.5, 56, utf8_decode(""), 1, 1, 'C');
	/*$pdf->Image($FDESC1, 25.5, 190.3, 30); /*imagen vertical
	$pdf->Image($FDESC2, 8.7, 198.7, 65); /*imagen horizontal*/

	$pdf->SetXY($x+67.5, $t5+12);
	$pdf->Multicell(69, 56, utf8_decode(""), 1, 1, 'C');
		/*$pdf->Image($FDESC1, 94, 190.3, 30); /*imagen vertical
	$pdf->Image($FDESC2, 76.2, 198.7, 65); /*imagen horizontal*/

	$pdf->SetXY($x+135, $t5+12);
	$pdf->Multicell(67, 56, utf8_decode(""), 1, 1, 'C');
		/*$pdf->Image($FDESC1, 161, 190.3, 30); /*imagen vertical
	$pdf->Image($FDESC2, 143.5, 198.7, 65); /*imagen horizontal*/


	/*$vert_hor=agregar_fotos($destino_foto4, $destino_foto4_nuevo);

	if($vert_hor=='true')					                   // Si el ancho de la foto1 es más grande que el alto ... 
	{																					   
		$pdf->Image($foto4, 7, 204, 60);
	}					
	else if($vert_hor=='false')                                // De no ser así ...
	{
		$pdf->Image($foto4, 23, 194.4, 30);
	}

	$vert_hor=agregar_fotos($destino_foto5, $destino_foto5_nuevo);

	if($vert_hor=='true')					                   // Si el ancho de la foto1 es más grande que el alto ... 
	{		
		$pdf->Image($foto5, 75, 204, 60);																			   
	}					
	else if($vert_hor=='false')                                // De no ser así ...
	{
		$pdf->Image($foto5, 90, 194.4, 30);
	}

	$vert_hor=agregar_fotos($destino_foto6, $destino_foto6_nuevo);

	if($vert_hor=='true')					                   // Si el ancho de la foto1 es más grande que el alto ... 
	{	
		$pdf->Image($foto6, 143.5, 204, 60);																				   
	}					
	else if($vert_hor=='false')                                // De no ser así ...
	{
		$pdf->Image($foto6, 159, 194.4, 30);
	}*/
	
	$pdf->SetXY($x, $y+56);
	$pdf->SetFont('Arial', 'B', '6');
	$pdf->SetFillColor(255, 255, 255); // Color Gris
	// C (Centra el texto de la celda), F (Rellena la celda con el color seleccionado)
	$pdf->Multicell(200, 1, utf8_decode("2016 Visionaire Lighting. This document was created for the use of Visionaire Lighting and can be reproduced exclusively for those related to the company and under expressed written approval."), 0, 1, 'L');

	/***************************************************************************/

	//$pdf->Output("ncpr/ncpr.pdf", "F");
	$pdf->Output("../ncpr/ncpr.pdf", "I");

	function agregar_fotos($nombre_foto, $destino_foto)
	{
		$obj_simpleimage=new SimpleImage();

	    $obj_simpleimage->load($nombre_foto);
		$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4);
		$obj_simpleimage->save($destino_foto);

		if($obj_simpleimage->getWidth()>$obj_simpleimage->getHeight())			 // Si el ancho de la foto1 es más grande que el alto ... 
		{																						   
			return $flag='true'; 									             // ... Agrega la foto1 en el archivo pdf en forma horizontal
		}					
		else if($obj_simpleimage->getWidth()<$obj_simpleimage->getHeight())		 // Si el ancho de la foto1 es más grande que el alto ...     // De no ser así ...
		{
			return $flag='false';                                                // ... Agrega la foto1 en el archivo pdf en forma vertical
		}
	}

	function validar_fotos($foto, $origen, $destino)
	{
		if($foto==NULL)
		{
			return $v_foto="../photos/blanco.jpg";
		}
		else if($foto!=NULL)
		{
			copy($origen, $destino);
			return $v_foto=$destino; 
		}
	}

	function eliminar_fotos($foto, $destino, $destino_nuevo)
	{
		if($foto==NULL)
		{
			unlink($destino);
			unlink($destino_nuevo);
		}
	}
?>