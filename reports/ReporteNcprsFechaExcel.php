<?php
	include_once("../iniciar.php"); 
	include_once("../DBManager.php");
	/** Se agrega la libreria PHPExcel */
	require_once ('../lib/PHPExcel/PHPExcel.php');

    $objCon=new DBManager;
    // Se crea el objeto PHPExcel
    $objPHPExcel=new PHPExcel();

	if ($objCon->conectar()==true)
	{
		$fecha_minima_completa=$_GET['f_min'];
		$fecha_maxima_completa=$_GET['f_max'];

		$consulta="SELECT * FROM tbncprs WHERE Fecha BETWEEN '$fecha_minima_completa' AND '$fecha_maxima_completa'";
		$resultado=mysql_query($consulta);
		if($resultado>0 )
		{
			date_default_timezone_set('America/Mexico_City');

			if(PHP_SAPI == 'cli')
				die('Este archivo solo se puede ver desde un navegador web');

			// Se asignan las propiedades del libro
			$objPHPExcel->getProperties()->setCreator("NCPR") //Autor
						->setTitle("NCPR");

			$tituloReporte="Reporte de NCPR's";
			$titulosColumnas=array('#', '# DE ORDEN', '# DE PARTE', 'TURNO', 'FECHA DE ENVIO', 'DESCRIPCION DEL PRODUCTO', 'NOMBRE DEL PROVEEDOR', 'REPORTADO POR', 'GENERADO POR', 'FECHA', 'HORA', 'CODIGO', 'ORIGEN DE LA FALLA', '# DE PIEZAS', '# DE PIEZAS RECHAZADAS', 'RAZON DE RECHAZO', 'DESCRIPCION DE LA FALLA', 'DESCRIPCION', 'CODIGO', 'LOCACION DE LA FALLA', 'CODIGO', 'DISPOSICION DEL PRODUCTO', 'CODIGO', 'AREA DEL DEPARTAMENTO', 'ACCION CORRECTIVA', 'DESTINO');
			
			$objPHPExcel->setActiveSheetIndex(0)
	        		    ->mergeCells('A1:Z1');

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
						->setCellValue('U3', $titulosColumnas[20])
						->setCellValue('V3', $titulosColumnas[21])
						->setCellValue('W3', $titulosColumnas[22])
						->setCellValue('X3', $titulosColumnas[23])
						->setCellValue('Y3', $titulosColumnas[24])
						->setCellValue('Z3', $titulosColumnas[25]);
			            
			//Se agregan los datos de los alumnos
			$i=4;
			while($fila=mysql_fetch_array($resultado))
			{
				$f_anio=substr($fila['Fecha'],0,4);
				$f_mes=substr($fila['Fecha'],5,2);
				$f_dia=substr($fila['Fecha'],8,2);

				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A'.$i, $fila['id_Folio'])
				    	    ->setCellValue('B'.$i, $fila['Numero_Orden'])
					        ->setCellValue('C'.$i, $fila['Numero_Parte'])
					        ->setCellValue('D'.$i, $fila['Turno'])
				    	    ->setCellValue('E'.$i, $fila['Fecha_Envio'])
				    	    ->setCellValue('F'.$i, $fila['Descripcion_Producto'])
				    		->setCellValue('G'.$i, $fila['Nombre_Proveedor'])
				    		->setCellValue('H'.$i, $fila['Reportado_Por'])
				    		->setCellValue('I'.$i, $fila['Generado_Por'])
				    		->setCellValue('J'.$i, $f_mes.'/'.$f_dia.'/'.$f_anio)
				    		->setCellValue('K'.$i, $fila['Hora'])
				    		->setCellValue('L'.$i, $fila['Origen_Falla_Detectada'])
				    		->setCellValue('M'.$i, $fila['Origen_Falla_Descripcion'])
				    		->setCellValue('N'.$i, $fila['Numero_Piezas'])
				    		->setCellValue('O'.$i, $fila['Numero_Piezas_Rechazadas'])
				    		->setCellValue('P'.$i, $fila['Razon_Rechazo'])
				    		->setCellValue('Q'.$i, $fila['Razon_Rechazo_Desc'])
				    		->setCellValue('R'.$i, $fila['Descripcion'])
				    		->setCellValue('S'.$i, $fila['Locacion_Falla'])
				    		->setCellValue('T'.$i, $fila['Locacion_Falla_Desc'])
				    		->setCellValue('U'.$i, $fila['Disposicion_Producto'])
				    		->setCellValue('V'.$i, $fila['Disposicion_Producto_Desc'])
				    		->setCellValue('W'.$i, $fila['Area_Dept_Codigo'])
				    		->setCellValue('X'.$i, $fila['Area_Dept_Desc'])
				    		->setCellValue('Y'.$i, $fila['Accion_Correctiva'])
							->setCellValue('Z'.$i, $fila['Destino']);
				$i++;
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
			 
			$objPHPExcel->getActiveSheet()->getStyle('A1:Z1')->applyFromArray($estiloTituloReporte);
			$objPHPExcel->getActiveSheet()->getStyle('A3:Z3')->applyFromArray($estiloTituloColumnas);		
			$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:Z".($i-1));
					
			for($i = 'A'; $i <= 'Z'; $i++){
				$objPHPExcel->setActiveSheetIndex(0)			
					->getColumnDimension($i)->setAutoSize(TRUE);
			}
			
			// Se asigna el nombre a la hoja
			$objPHPExcel->getActiveSheet()->setTitle('NCPR');

			// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
			$objPHPExcel->setActiveSheetIndex(0);
			// Inmovilizar paneles 
			//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
			$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

			// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="Reporte de NCPRs.xlsx"');
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