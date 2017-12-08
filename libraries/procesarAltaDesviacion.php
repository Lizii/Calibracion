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

			class PDF extends FPDF
			{
				var $widths;
				var $aligns;

				function Header()
				{
					$this->SetFont('helvetica', '', '10');
					$this->Ln(30);
				}

				function Footer()
				{
					$this->SetY(-20);
					$this->SetFont('helvetica', 'B', '8');
				}
			}

			if($objCon->conectar()==true) {
				
				date_default_timezone_set('America/Los_Angeles');
				$FECHA=date("Y-m-d"); // Formato: Año-Mes-Dia  YYYY-mm-dd   2016-11-15 */
				
				$f_anio=substr($FECHA, 0, 4);
				$f_mes=substr($FECHA,  5, 2);
				$f_dia=substr($FECHA,  8, 2);


				$fechapdf= $f_dia.'-'.$f_mes.'-'.$f_anio;
				$HORA=date("H:i");
				$GENERA=strtoupper($_SESSION['nombre']);
				$Date=($_POST['fecha']); //date
				$Specification=strtoupper($_POST['especifi_NP']);
				$Description=strtoupper($_POST['descripcion']);
				$DeviationPN=strtoupper($_POST['desviacion_NP']);
				$DescriptionPN=strtoupper($_POST['descripcionNP']);
				
				$soArray = array(
				$So1=strtoupper($_POST['so01']), 
				$So2=strtoupper($_POST['so02']),
				$So3=strtoupper($_POST['so03']),
				$So4=strtoupper($_POST['so04']),
				$So5=strtoupper($_POST['so05']),
				$So6=strtoupper($_POST['so06']),
				$So7=strtoupper($_POST['so07']),
				$So8=strtoupper($_POST['so08']),
				$So9=strtoupper($_POST['so09']),
				$So10=strtoupper($_POST['so10']),
				$So11=strtoupper($_POST['so11']),
				$So12=strtoupper($_POST['so12']),
				$So13=strtoupper($_POST['so13']),
				$So14=strtoupper($_POST['so14']),
				$So15=strtoupper($_POST['so15']),
				$So16=strtoupper($_POST['so16']),
				$So17=strtoupper($_POST['so17']),
				$So18=strtoupper($_POST['so18']),
				$So19=strtoupper($_POST['so19']),
				$So20=strtoupper($_POST['so20'])
				);

				$partNameArray = array(
				$PartName1=strtoupper($_POST['parte01']),
				$PartName2=strtoupper($_POST['parte02']),
				$PartName3=strtoupper($_POST['parte03']),
				$PartName4=strtoupper($_POST['parte04']),
				$PartName5=strtoupper($_POST['parte05']),
				$PartName6=strtoupper($_POST['parte06']),
				$PartName7=strtoupper($_POST['parte07']),
				$PartName8=strtoupper($_POST['parte08']),
				$PartName9=strtoupper($_POST['parte09']),
				$PartName10=strtoupper($_POST['parte10']),
				$PartName11=strtoupper($_POST['parte11']),
				$PartName12=strtoupper($_POST['parte12']),
				$PartName13=strtoupper($_POST['parte13']),
				$PartName14=strtoupper($_POST['parte14']),
				$PartName15=strtoupper($_POST['parte15']),
				$PartName16=strtoupper($_POST['parte16']),
				$PartName17=strtoupper($_POST['parte17']),
				$PartName18=strtoupper($_POST['parte18']),
				$PartName19=strtoupper($_POST['parte19']),
				$PartName20=strtoupper($_POST['parte20'])
				);

				$jobAffectedArray = array(
				$JobAffected1=strtoupper($_POST['job01']),
				$JobAffected2=strtoupper($_POST['job02']),
				$JobAffected3=strtoupper($_POST['job03']),
				$JobAffected4=strtoupper($_POST['job04']),
				$JobAffected5=strtoupper($_POST['job05']),
				$JobAffected6=strtoupper($_POST['job06']),
				$JobAffected7=strtoupper($_POST['job07']),
				$JobAffected8=strtoupper($_POST['job08']),
				$JobAffected9=strtoupper($_POST['job09']),
				$JobAffected10=strtoupper($_POST['job10']),
				$JobAffected11=strtoupper($_POST['job11']),
				$JobAffected12=strtoupper($_POST['job12']),
				$JobAffected13=strtoupper($_POST['job13']),
				$JobAffected14=strtoupper($_POST['job14']),
				$JobAffected15=strtoupper($_POST['job15']),
				$JobAffected16=strtoupper($_POST['job16']),
				$JobAffected17=strtoupper($_POST['job17']),
				$JobAffected18=strtoupper($_POST['job18']),
				$JobAffected19=strtoupper($_POST['job19']),
				$JobAffected20=strtoupper($_POST['job20'])
				);
				
				$quantityArray = array(
				$Quantity1=strtoupper($_POST['cantidad01']),
				$Quantity2=strtoupper($_POST['cantidad02']),
				$Quantity3=strtoupper($_POST['cantidad03']),
				$Quantity4=strtoupper($_POST['cantidad04']),
				$Quantity5=strtoupper($_POST['cantidad05']),
				$Quantity6=strtoupper($_POST['cantidad06']),
				$Quantity7=strtoupper($_POST['cantidad07']),
				$Quantity8=strtoupper($_POST['cantidad08']),
				$Quantity9=strtoupper($_POST['cantidad09']),
				$Quantity10=strtoupper($_POST['cantidad10']),
				$Quantity11=strtoupper($_POST['cantidad11']),
				$Quantity12=strtoupper($_POST['cantidad12']),
				$Quantity13=strtoupper($_POST['cantidad13']),
				$Quantity14=strtoupper($_POST['cantidad14']),
				$Quantity15=strtoupper($_POST['cantidad15']),
				$Quantity16=strtoupper($_POST['cantidad16']),
				$Quantity17=strtoupper($_POST['cantidad17']),
				$Quantity18=strtoupper($_POST['cantidad18']),
				$Quantity19=strtoupper($_POST['cantidad19']),
				$Quantity20=strtoupper($_POST['cantidad20'])
				);

				$DescChange=strtoupper($_POST['desc_cambio']);
				$ReasChange=strtoupper($_POST['razoncambio']);
				$ValidatedSE=strtoupper($_POST['sostenimiento']);
				$ValidatedQE=strtoupper($_POST['calidad']);
				$ExpDate=($_POST['expiracion']); //date
				$QuantityPro=($_POST['cantidad']); //number
				$Status=strtoupper($_POST['status']);
				$ByRequest=strtoupper($_POST['peticion']);
				$Corrective=strtoupper($_POST['accion']);
			
				//Convert to date format
				$ExpDate = date("d-m-Y", strtotime($ExpDate));

				$f1=$_FILES['foto1']['name'];    // Obtenemos el nombre de la foto1 	
				$f2=$_FILES['foto2']['name'];    // Obtenemos el nombre de la foto2 	
				$f3=$_FILES['foto3']['name'];	 // Obtenemos el nombre de la foto3 	

				$origen_foto1=$_FILES['foto1']['tmp_name'];    // Guarda la foto1 en una carpeta temporalmente	
				$origen_foto2=$_FILES['foto2']['tmp_name'];    // Guarda la foto2 en una carpeta temporalmente
				$origen_foto3=$_FILES['foto3']['tmp_name'];    // Guarda la foto3 en una carpeta temporalmente
				
				$destino_foto1=validar_foto($f1, $origen_foto1);     // Generamos la dirección donde se guardará la foto1
				$destino_foto2=validar_foto($f2, $origen_foto2);     // Generamos la dirección donde se guardará la foto2
				$destino_foto3=validar_foto($f3, $origen_foto3);     // Generamos la dirección donde se guardará la foto3
				
				$foto1_nuevo=time().rand().".jpg";    // Generamos la nueva dirección donde se guardará la foto1_nuevo
				$foto2_nuevo=time().rand().".jpg";    // Generamos la nueva dirección donde se guardará la foto2_nuevo
				$foto3_nuevo=time().rand().".jpg";    // Generamos la nueva dirección donde se guardará la foto3_nuevo
				
				$destino_foto1_nuevo="../photos/".$foto1_nuevo;    // Generamos la dirección donde se guardará la foto1
				$destino_foto2_nuevo="../photos/".$foto2_nuevo;	   // Generamos la dirección donde se guardará la foto2
				$destino_foto3_nuevo="../photos/".$foto3_nuevo;	   // Generamos la dirección donde se guardará la foto3

				//The deviation number must be automatically created and unique, so we grab the last id of the table
			

				$sql="INSERT INTO tbdesviaciones VALUES('NULL', '$GENERA', '$deviation', '$Date', '$Specification', '$Description', '$DeviationPN', '$DescriptionPN', '$DescChange', '$ReasChange', '$ValidatedSE', '$ValidatedQE', '$ExpDate', '$QuantityPro', '$Status', '$ByRequest', '$Corrective')";
				$result=mysql_query($sql) or die (mysql_error());

			
			$i=0;
			while($i<=20) 
			{ 
				if(!empty($soArray[$i].$partNameArray[$i].$jobAffectedArray[$i].$quantityArray[$i]))
				{	
					$sql="INSERT INTO tbdevdata VALUES('NULL', '$soArray[$i]', '$partNameArray[$i]', '$jobAffectedArray[$i]', '$quantityArray[$i]','')";
					$result=mysql_query($sql);
				}
				$i=$i+1;
			}

				if ($result) {
					echo "<script language='JavaScript'>
						  	alert('All Good! :D');
						</script>";	
				} else {
					echo "<script language='JavaScript'>
						  	alert('Not Good :('
						  	);
						</script>";
				}	
			
			
				$Id = mysql_insert_id();
				$Id = str_pad($Id, 5, "0", STR_PAD_LEFT);
				
				$deviation="DEV".$Id;
		
				$sql_update="UPDATE tbdesviaciones SET Nombre_Desviacion='$deviation' WHERE Id='$Id'";
				$result=mysql_query($sql_update);
				if (! $result)
				{
				echo "La consulta SQL contiene errores.".mysql_error();
				exit();
				}
	
						
				/************************* Código para importar un archivo pdf *************************************************/	
				$pdf= new FPDI();

				/*Obtener la cantidad de imagenes que subirán */
				
				/* Cargamos el formato FSNCR */
				$pageCount=$pdf->setSourceFile('../RESOURCES/ProcesarDesviacionesPDF.pdf');

				/* Declaración de variables */
				$x=4;
				$y=4;
				$c=4;

				/***************************/
				for($pageNo=1; $pageNo<=$pageCount; $pageNo++) {
					// Importa una página
					$templateId = $pdf->importPage($pageNo);

					// Obtiene el tamaño de la página importada
					$size = $pdf->getTemplateSize($templateId);

					// Crea una página (horizontal o vertical dependiendo del tamaño de l página importada)
					if ($size['w'] > $size['h']) {
					    $pdf->AddPage('L', array($size['w'], $size['h']));
					} else {
					    $pdf->AddPage('P', array($size['w'], $size['h']));
					}

					// Usa la página agregada
					$pdf->useTemplate($templateId);
				
					/* Código para escribir en las hojas del pdf */
					if($pageNo==1) {

						$pdf->SetFont('Arial','B', '8');
						$pdf->SetXY($x+40, $y+21);
						$pdf->cell(20, 4,$Id, 0, 1, 'C');

						$pdf->SetXY($x+100, $y+21);
						$pdf->cell(48, 4,$GENERA, 0, 1, 'C');

						$pdf->SetXY($x+166, $y+21);
						$pdf->cell(39, 4,$fechapdf, 0, 1, 'C');

						$pdf->SetXY($x+83, $y+29);
						$pdf->cell(122, 4,$Specification, 0, 1, 'C');

						$pdf->SetXY($x+33, $y+33);
						$pdf->cell(172, 4,$Description, 0, 1, 'C');

						$pdf->SetXY($x+65, $y+37);
						$pdf->cell(140, 4,$DeviationPN, 0, 1, 'C');

						$pdf->SetXY($x+33, $y+41); //<----
						$pdf->cell(172, 4,$DescriptionPN, 0, 1, 'C');

						//Uncomment to display Test values
						// for ($i = 0; $i < count($soArray); $i++) {
						//     $soArray[$i] = $soArray;
						//     $partNameArray[$i] = "Test";
						//     $jobAffectedArray[$i] = "Test";
						//     $quantityArray[$i] = "Test";
						// }

						//SO#, Part Name, Job Affected, Quantity
						for ($i = 0, $h = 50; $i < 20; $i++) { 
							//SO# Column
							$pdf->SetXY($x + 3, $y + $h);
							$pdf->cell(15, 4, $soArray[$i], 0, 1, 'C');

							//Part Name Column
							$pdf->SetXY($x + 18, $y + $h);
							$pdf->cell(101, 4, $partNameArray[$i], 0, 1, 'C');

							//Job Affected Column
							$pdf->SetXY($x + 119, $y + $h);
							$pdf->cell(65, 4, $jobAffectedArray[$i], 0, 1, 'C');

							//Quantity Column
							$pdf->SetXY($x + 184, $y + $h);
							$pdf->cell(21, 4, $quantityArray[$i], 0, 1, 'C');

							$h = $h + 4; 
						}

						/*$pdf->Image($FDESC1, 25.5, 140.4, 30); /*imagen vertical*/
						/*$pdf->Image($FDESC2, 8.1, 148.7, 65); /*imagen horizontal*/

						/*$pdf->Image($FDESC1, 93, 140.4, 30); /*imagen vertical*/
						/*$pdf->Image($FDESC2, 75.5, 148.7, 65); /*imagen horizontal*/

						/*$pdf->Image($FDESC1, 160, 140.4, 30); /*imagen vertical*/
						/*$pdf->Image($FDESC2, 142.9, 148.7, 65); /*imagen horizontal*/

						/* Agregamos la foto1 */
						$foto1=vertical_horizontal($destino_foto1, $destino_foto1_nuevo);
						// Si el ancho de la foto es más grande que el alto, la función devuelve TRUE
						if($foto1=='true') {																					   
							if($destino_foto1!="false") {
								$pdf->Image($destino_foto1_nuevo, 8.1, 148.7, 65); /*imagen horizontal*/
							}
						}
						// Si el ancho de la foto es más grande que el alto, la función devuelve FALSE		
						else if($foto1=='false') {
							$pdf->Image($destino_foto1_nuevo, 25.5, 140.4, 30); /*imagen vertical*/
						}

						/* Agregamos la foto2 */
						$foto2=vertical_horizontal($destino_foto2, $destino_foto2_nuevo);	
						// Si el ancho de la foto es más grande que el alto, la función devuelve TRUE
						if($foto2=='true') {																					   
							if($destino_foto2!="false") {
								$pdf->Image($destino_foto2_nuevo, 75.5, 148.7, 65); /*imagen horizontal*/
							}
						}
						// Si el ancho de la foto es más grande que el alto, la función devuelve FALSE		
						else if($foto2=='false') {
							$pdf->Image($destino_foto2_nuevo, 93, 140.4, 30); /*imagen vertical*/
						}

						/* Agregamos la foto3 */
						$foto3=vertical_horizontal($destino_foto3, $destino_foto3_nuevo);
						// Si el ancho de la foto es más grande que el alto, la función devuelve TRUE
						if($foto3=='true') {																					   
							if($destino_foto3!="false") {
								$pdf->Image($destino_foto3_nuevo, 142.9, 148.7, 65); /*imagen horizontal*/
							}
						}
						// Si el ancho de la foto es más grande que el alto, la función devuelve FALSE		
						else if($foto3=='false') {
							$pdf->Image($destino_foto3_nuevo, 160, 140.4, 30); /*imagen vertical*/
						}

						$pdf->SetXY($x+60, $y+192);
						$pdf->cell(145, 4,$DescChange, 0, 1, 'C');

						$pdf->SetXY($x+3, $y+200);
						$pdf->cell(202, 4,$ReasChange, 0, 1, 'C');

						$pdf->SetXY($x+50, $y+204);
						$pdf->cell(54, 4,$ValidatedSE, 0, 1, 'C');

						$pdf->SetXY($x+162, $y+204);
						$pdf->cell(43, 4,$ValidatedQE, 0, 1, 'C');

						$pdf->SetXY($x+50, $y+208);
						$pdf->cell(54, 4,$ExpDate, 0, 1, 'C');

						$pdf->SetXY($x+162, $y+208);
						$pdf->cell(43, 4,$QuantityPro, 0, 1, 'C');

						$pdf->SetXY($x+50, $y+212);
						$pdf->cell(54, 4,$Status, 0, 1, 'C');

						$pdf->SetXY($x+162, $y+212);
						$pdf->cell(43, 4,$ByRequest, 0, 1, 'C');

						$pdf->SetXY($x+104, $y+216);
						$pdf->cell(101, 4,$Corrective, 0, 1, 'C');

						//Firmas (Signatures)
						$pdf->SetXY($x+3, $y+230);
						$pdf->cell(47, 6, "", 0, 1, 'C');

						$pdf->SetXY($x+50, $y+230);
						$pdf->cell(54, 6, "", 0, 1, 'C');

						$pdf->SetXY($x+104, $y+230);
						$pdf->cell(58, 6, "", 0, 1, 'C');

						$pdf->SetXY($x+162, $y+230);
						$pdf->cell(43, 6, "", 0, 1, 'C');

						//Firmas Adicionales
						$pdf->SetXY($x+3, $y+246);
						$pdf->cell(47, 6, "", 0, 1, 'C');

						$pdf->SetXY($x+50, $y+246);
						$pdf->cell(54, 6, "", 0, 1, 'C');

						$pdf->SetXY($x+104, $y+246);
						$pdf->cell(58, 6, "", 0, 1, 'C');

						$pdf->SetXY($x+162, $y+246);
						$pdf->cell(43, 6, "", 0, 1, 'C');
					}
				}

				/* Elimina las fotografias que han sido agregadas al archivo PDF */
				eliminar_fotos($destino_foto1, $destino_foto1_nuevo);
				eliminar_fotos($destino_foto2, $destino_foto2_nuevo);
				eliminar_fotos($destino_foto3, $destino_foto3_nuevo);
			}

			function validar_foto($foto, $origen) {
				if(empty($foto)) {
					return $v_foto="false";
				} else if(!empty($foto)) {
					$destino="../photos/".$foto;
					copy($origen, $destino);

					return $v_foto=$destino; 
				}
			}

			function vertical_horizontal($foto, $destino_foto) {
				$obj_simpleimage=new SimpleImage();

				if($foto!="false") {
					$obj_simpleimage->load($foto);
					$obj_simpleimage->resize($obj_simpleimage->getWidth()/4, $obj_simpleimage->getHeight()/4);
					$obj_simpleimage->save($destino_foto);

					if($obj_simpleimage->getWidth() > $obj_simpleimage->getHeight()) {        // Si el ancho de la foto1 es más grande que el alto ... 
						return $flag='true';     									         // ... Agrega la foto1 en el archivo pdf en forma horizontal
					} else if($obj_simpleimage->getWidth() < $obj_simpleimage->getHeight()) {    // Si el ancho de la foto1 es más grande que el alto ...     
						return $flag='false';                                                // ... Agrega la foto1 en el archivo pdf en forma vertical
					}
				}
				else if($foto!="false") {
					return $flag='true';
				}
			}

			function eliminar_fotos($destino, $destino_nuevo) {
				if($destino!="false") {
					unlink($destino);
					unlink($destino_nuevo);
				}
			}

			function validar_comillas($texto) {
				$txt=strripos($texto, "'");
				if($txt===false) {
					return strtoupper($texto);
				} else {
					$texto=str_replace("'", "''", $texto);
				}
				return strtoupper($texto);
			}

			//Make a copy of the PDF and save it in DESV PDFS Folder

			ob_end_clean();
			$pdf->Output('../DESV/'.$deviation.'.pdf', 'F'); // Guarda el PDF en el servidor*/
			//$pdf->Output('../DESV/$deviation.pdf', 'I'); // Visualizamos el PDF en el navegador*/

			echo "<script language='JavaScript'>
			window.location.href='../mailDesv.php?Id=$Id'
		</script>";
		?>
	</body>
</html>