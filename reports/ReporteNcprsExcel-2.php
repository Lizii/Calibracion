<?php
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=Reporte de NCPR's.xls");
	
	include_once("../iniciar.php"); 
?>

<html> 
    <head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	
	<body> 
		<?php
			include_once("../DBManager.php");
			
			$objCon = new DBManager;
			if ($objCon->conectar()==true)
			{
				$sql="SELECT *FROM tbncprs ORDER BY id_Folio";

				$datos=mysql_query($sql);

				echo "<table cellpadding='0' cellspacing='0' border='1'>
					<tr>
		    			<td colspan='22' bgcolor='#808080'><center><strong> REPORTE DE NCPR </strong></center></td>
		  			</tr>
					
					<tr>
						<th bgcolor='#CCCACB'><b><center> LINK                     </center></b></td>
						<th bgcolor='#CCCACB'><b><center> # DE ORDEN               </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> # DE PARTE               </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> TURNO                    </center></b></td>
						<th bgcolor='#CCCACB'><b><center> FECHA DE ENVIO           </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> DESCRIPCION DEL PRODUCTO </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> NOMBRE DEL PROVEEDOR     </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> REPORTADO POR            </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> GENERADO POR 			   </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> FECHA 				   </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> HORA 			           </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> ORIGEN DE LA FALLA       </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> CODIGO                   </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> # DE PIEZAS              </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> # DE PIEZAS RECHAZADAS   </center></b></td>
						<th bgcolor='#CCCACB'><b><center> DESCRIPCION DE LA FALLA  </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> RAZON DE RECHAZO         </center></b></td>  
						<th bgcolor='#CCCACB'><b><center> CODIGO                   </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> LOCACION DE LA FALLA     </center></b></td> 
						<th bgcolor='#CCCACB'><b><center> CODIGO                   </center></b></td>
						<th bgcolor='#CCCACB'><b><center> DISPOSICION DEL PRODUCTO </center></b></td>  
						<th bgcolor='#CCCACB'><b><center> CODIGO                   </center></b></td>
					</tr>"; 

					while ($row=mysql_fetch_array($datos)) 
					{ 
						echo 
							"<tr>
								<td bgcolor='#EEEEEE'><center> <a href='../ncpr/$row[id_Folio].PDF' target='_blank'> $row[id_Folio].PDF </a></center></td>
								<td bgcolor='#EEEEEE'><center> $row[Numero_Orden] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Numero_Parte] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Turno] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Fecha_Envio] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Descripcion_Producto] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Nombre_Proveedor] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Reportado_Por] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Generado_Por] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Fecha] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Hora] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Origen_Falla_Descripcion] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Origen_Falla_Detectada] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Numero_Piezas] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Numero_Piezas_Rechazadas] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Descripcion] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Razon_Rechazo_Desc] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Razon_Rechazo] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Locacion_Falla_Desc] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Locacion_Falla] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Disposicion_Producto_Desc] </center></td>
								<td bgcolor='#EEEEEE'><center> $row[Disposicion_Producto] </center></td>
							</tr>"; 
					}	
					echo "</table>";			
				}
			?> 
	</body> 
</html>