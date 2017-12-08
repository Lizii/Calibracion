<?php
	/** Se agrega la libreria PHPExcel */
	require_once('PHPExcel/PHPExcel.php');
	include_once("DBManager.php");


    // Se crea el objeto PHPExcel
    $objPHPExcel = new PHPExcel();

    $objCon = new DBManager;
	if ($objCon->conectar() == true) 
	{

		$sql = "SELECT tbdesviaciones.Id, tbdesviaciones.Nombre_Desviacion, tbdesviaciones.Generado, tbdesviaciones.Fecha, tbdesviaciones.Spec_Parte, tbdesviaciones.Spec_Desc, tbdesviaciones.Dev_Parte, tbdesviaciones.Dev_Desc, tbdesviaciones.Desc_Cambio,tbdesviaciones.Razon_Cambio, tbdesviaciones.Validado_Sustaining, tbdesviaciones.Validado_Quality, tbdesviaciones.Fecha_Expiracion, tbdesviaciones.Cantidad_Producirse, tbdesviaciones.Status, tbdesviaciones.Peticion_Por, tbdesviaciones.Accion_Correctiva, tbdevdata.So, tbdevdata.Pn, tbdevdata.Job, tbdevdata.Qty FROM tbdesviaciones, tbdevdata WHERE tbdesviaciones.Id=tbdevdata.Id ";
		$resultado = mysql_query($sql) or die;
		
		if ($resultado > 0)
		{
			date_default_timezone_set('America/Los_Angeles');

			if(PHP_SAPI == 'cli')
				die('Este archivo solo se puede ver desde un navegador web');

			// Se asignan las propiedades del libro
			$objPHPExcel->getProperties()->setCreator("DESVIACIONES") //Autor
						->setTitle("DESVIACIONES");

			$tituloReporte="Reporte de Desviaciónes";
			$titulosColumnas = array('#', 'DESVIACIÓN', 'GENERADO POR', 'FECHA', 'P/N A REEMPLAZAR', 'DESCRIPCIÓN', 'P/N A UTILIZAR', 'DESCRIPCIÓN', 'DESCRIPCIÓN DEL CAMBIO', 'RAZÓN', 'VALIDADO POR SOSTENIMIENTO', 'VALIDADO POR CALIDAD', 'FECHA DE EXPIRACIÓN', 'CANTIDAD', 'STATUS', 'PETICIÓN POR', 'ACCIÓN CORRECTIVA', 'SO#', 'PART NAME', 'JOB AFFECTED', 'QUANTITY');
			
			$objPHPExcel->setActiveSheetIndex(0)
	        		    ->mergeCells('A1:R1');

			// Se agregan los titulos del reporte
			$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A1', $tituloReporte)
					    ->setCellValue('A3', $titulosColumnas[0])
						->setCellValue('B3', $titulosColumnas[1])
						->setCellValue('C3', $titulosColumnas[2])
						->setCellValue('D3', $titulosColumnas[3])
						->setCellValue('E3', $titulosColumnas[4])
						->setCellValue('F3', $titulosColumnas[5])
						->setCellValue('G3', $titulosColumnas[6])
						->setCellValue('H3', $titulosColumnas[7])
						->setCellValue('I3', $titulosColumnas[8])
						->setCellValue('J3', $titulosColumnas[9])
						->setCellValue('K3', $titulosColumnas[10])
						->setCellValue('L3', $titulosColumnas[11])
						->setCellValue('M3', $titulosColumnas[12])
						->setCellValue('N3', $titulosColumnas[13])
						->setCellValue('O3', $titulosColumnas[14])
						->setCellValue('P3', $titulosColumnas[15])
						->setCellValue('Q3', $titulosColumnas[16])
						->setCellValue('R3', $titulosColumnas[17])
						->setCellValue('S3', $titulosColumnas[18])
						->setCellValue('T3', $titulosColumnas[19])
						->setCellValue('U3', $titulosColumnas[20]);
			            
			//Se agregan los datos de los alumnos
			$i=4;
			$contador=1;
			while($fila=mysql_fetch_array($resultado))
			{
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A'.$i, $fila['Id'])
							->setCellValue('B'.$i, $fila['Nombre_Desviacion'])
				    	    ->setCellValue('C'.$i, $fila['Generado'])
					        ->setCellValue('D'.$i, $fila['Fecha'])
					        ->setCellValue('E'.$i, $fila['Spec_Parte'])
					        ->setCellValue('F'.$i, $fila['Spec_Desc'])
					        ->setCellValue('G'.$i, $fila['Dev_Parte'])
					        ->setCellValue('H'.$i, $fila['Dev_Desc'])
					        ->setCellValue('I'.$i, $fila['Desc_Cambio'])
					        ->setCellValue('J'.$i, $fila['Razon_Cambio'])
					        ->setCellValue('K'.$i, $fila['Validado_Sustaining'])
					        ->setCellValue('L'.$i, $fila['Validado_Quality'])
					        ->setCellValue('M'.$i, $fila['Fecha_Expiracion'])
					        ->setCellValue('N'.$i, $fila['Cantidad_Producirse'])
					        ->setCellValue('O'.$i, $fila['Status'])
					        ->setCellValue('P'.$i, $fila['Peticion_Por'])
					        ->setCellValue('Q'.$i, $fila['Accion_Correctiva'])
					        ->setCellValue('R'.$i, $fila['So'])
					        ->setCellValue('S'.$i, $fila['Pn'])
					        ->setCellValue('T'.$i, $fila['Job'])
					        ->setCellValue('U'.$i, $fila['Qty']);
				$i++;
				$contador++;
			}
			
			$estiloTituloReporte = array(
	        	'font' => array(
		        	'name'   => 'Arial',
	    	        'bold'   => true,
	        	    'italic' => false,
	                'strike' => false,
	               	'size'   => 16,
		            'color'  => array(
		            	'rgb' => 'FFFFFF' /* Texto del titulo color blanco */
		        	) 
	        	),
		        
		        'fill'  => array(
					'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
					'color'	=> array(
						'rgb' => '005C95'
					) /* Fondo del titulo colo azul */
				),

	            'borders'    => array(
	            	'allborders' => array(
	            		'style' => PHPExcel_Style_Border::BORDER_NONE                    
	            	)
	            ),

	            'alignment'  => array(
	        		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	        		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
	        		'rotation' => 0,
	        		'wrap' => TRUE
	    		)
	        );

			$estiloTituloColumnas = array(
	            'font' => array(
	            	'name' => 'Arial',
	            	'bold' => true, 
	            	'size' => 8, /* Tamaño del titulo de las columnas de la tabla */                           
	            	'color' => array(
	            		'rgb' => '000000' /* Titulo de las columnas color Negro */
	            	)
	            ),
	            
	            'fill' 	=> array(
					'type'	=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
					'rotation'   => 90,
	    			'startcolor' => array(
	    				'rgb' => '51B4F1'
	    			), 
	    			'endcolor'  => array(
	    				'rgb' => '2594DA'
	    			)
	    		),

	            'borders' => array(
	    			'allborders' => array(
	      				'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
	      				'color' => array(
	      					'argb' => 'FF000000'
	      				),
	    			)
	  			),

				'alignment' =>  array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
					'wrap' => TRUE
	    		)
	    	);
				
			$estiloInformacion = new PHPExcel_Style();
			$estiloInformacion->applyFromArray(
				array(
	           		'font' => array(
	               		'name' => 'Arial', 
	               		'size' => 8, /* Tamaño del texto de la tabla */             
	               		'color' => array(
	                		'rgb' => '000000' /* Color de las letras: Negro */
	               		)
	           		),

	           		'fill' 	=> array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'color' => array(
							'rgb' => 'DBE0E3' /* Color del fondo de las tablas: Gris */
						) 
					),
	           		
	           		'borders' => array(
	            		'left' => array(
	            			'style' => PHPExcel_Style_Border::BORDER_THIN,
		        			'color' => array(
	    	    				'rgb' => '000000'
	                   		)
	               		)             
	           		)
	        	)
	        );
			 
			$objPHPExcel->getActiveSheet()->getStyle('A1:U1')->applyFromArray($estiloTituloReporte);
			$objPHPExcel->getActiveSheet()->getStyle('A3:U3')->applyFromArray($estiloTituloColumnas);		
			$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:A".($i-1));
					
			for($i = 'A'; $i <= 'Z'; $i++){
				$objPHPExcel->setActiveSheetIndex(0)			
					        ->getColumnDimension($i)->setAutoSize(TRUE);
			}
			
			// Se asigna el nombre a la hoja
			$objPHPExcel->getActiveSheet()->setTitle('Desviaciones');

			// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
			$objPHPExcel->setActiveSheetIndex(0);
			// Inmovilizar paneles 
			//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
			$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

			// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Reporte de Desviaciones.xlsx"');
			header('Cache-Control: max-age=0');

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('php://output');
			exit;
		}
		else{
			print_r('No hay resultados para mostrar');
		}
	}
?>