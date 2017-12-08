<html> 
    <head>
	    <meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
        <link rel="icon" type="image/png" href="img/NCPR logo.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script>
        	$(document).ready(function() 
        	{
        		var table= $(e.target).closest('table');

			    $('td input[type="radio"]').on('change', function() 
			    {
					$(this).siblings('td input[type="radio"]').not(this).prop('checked', false);
				});
			});
        </script>
	</head>
	
	<body>
		<div id="contenedor">
			<?php 
				include_once("menu.php");
			?>
			
			<h1> ALTA DE NCPR </h1>
			
			<form action="./libraries/procesarAltaNcpr.php" method="post" name="datos" enctype="multipart/form-data" .disabled=true;>
				<table cellpadding='0' cellspacing='0' border='1' class='tabla_altas'> 
					<tr>
						<th colspan="7"><b> Generado por: </b></th> 
					</tr>

					<tr>
						<td><input type=radio name="generado_por" value="ALDO MATA" /> ALDO MATA </td>
						<td><input type=radio name="generado_por" value="CLAUDIA RENTERIA" /> CLAUDIA RENTERIA </td>
						<td><input type=radio name="generado_por" value="CRISTINA SOLIS" /> CRISTINA SOLIS </td>	
						<td><input type=radio name="generado_por" value="DANIEL AGUIRRE" /> DANIEL AGUIRRE </td>
						<td><input type=radio name="generado_por" value="GABRIELA HERNANDEZ" /> GABRIELA HERNANDEZ </td>
						<td><input type=radio name="generado_por" value="HUGO AMEZQUITA" /> HUGO AMEZQUITA </td>
					</tr>

					<tr>
						<td><input type=radio name="generado_por" value="HECTOR DIAZ" /> HECTOR DIAZ </td>
						<td><input type=radio name="generado_por" value="JAAZIEL SERRANO" /> JAAZIEL SERRANO </td>
						<td><input type=radio name="generado_por" value="OMAR GARCIA" /> OMAR GARCIA </td>	
						<td><input type=radio name="generado_por" value="OSCAR VILLAREAL" /> OSCAR VILLAREAL </td>
						<td><input type=radio name="generado_por" value="RAMON AVALOS" /> RAMON AVALOS </td>
						<td><input type=radio name="generado_por" value="CARLOS CALDERON" /> CARLOS CALDERON </td>
					</tr>

					<tr>
						<td><input type=radio name="generado_por" value="otro" /> OTRO: </td>			
						<td colspan="5"><input type="text" name="generado_por_nombre" placeholder="Nombre" /></td>			
					</tr>
				</table>

				<table cellpadding='0' cellspacing='0' border='1' class='tabla_altas'> 
					<tr>
						<th colspan="7"><b> Reportado por: </b></td> 
					</tr>

					<tr>
						<td><input type=radio name="reportado_por" value="ALBERTO ROMO" /> ALBERTO ROMO </td>
						<td><input type=radio name="reportado_por" value="JORGE RODRIGUEZ" /> JORGE RODRIGUEZ </td>
						<td><input type=radio name="reportado_por" value="ANGELICA HERNANDEZ" /> ANGELICA HERNANDEZ </td>	
						<td><input type=radio name="reportado_por" value="MATEO SANDOVAL" /> MATEO SANDOVAL </td>
						<td><input type=radio name="reportado_por" value="OLIMPIA DOMINGUEZ" /> OLIMPIA DOMINGUEZ </td>
						<td><input type=radio name="reportado_por" value="SANDRO ORDAZ" /> SANDRO ORDAZ </td>
					</tr>

					<tr>
						<td><input type=radio name="reportado_por" value="BALVANEDO GARCIA" /> BALVANEDO GARCIA </td>
						<td><input type=radio name="reportado_por" value="IZACK GOLDBAUM" /> IZACK GOLDBAUM </td>
						<td><input type=radio name="reportado_por" value="KARLOS JIMENEZ" /> KARLOS JIMENEZ </td>	
						<td><input type=radio name="reportado_por" value="MAURILIO AVALOS" /> MAURILIO AVALOS </td>
						<td><input type=radio name="reportado_por" value="RUBEN VALDEZ" /> RUBEN VALDEZ </td>
						<td><input type=radio name="reportado_por" value="YADIRA HUERTA" /> YADIRA HUERTA </td>
					</tr>

					<tr>
						<td><input type=radio name="reportado_por" value="otro" /> OTRO: </td>			
						<td colspan="5"><input type="text" name="reportado_por_nombre" placeholder="Nombre" /></td>			
					</tr>
				</table>
				
				<table cellpadding='0' cellspacing='0' border='1' class='tabla_altas'> 
					<tr>
						<th colspan="2"><b> Turno: </b></th> 
					</tr>

					<tr>
						<td><input type=radio name="turno" value="PRIMER TURNO / 1ST SHIFT"> MATUTINO </td>
						<td><input type=radio name="turno" value="SEGUNDO TURNO / 2ND SHIFT"> VESPERTINO </td>
					</tr>
				</table>

				<table cellpadding='0' cellspacing='0' border='1' class='tabla_altas'> 
					<tr>
						<td> NUMERO DE ORDEN</td>
						<td><input type="text" name="orden" required="true" title="El campo no puede estar vacio." placeholder="Número de orden" /></td>
					</tr>
					<tr>
						<td> FECHA DE ENVIO </td>
						<td> <input type="text" name="fechaenvio" required="true" title="El campo no puede estar vacio." placeholder="Fecha de envio" /></td>
					</tr>
					<tr>
						<td> NUMERO DE PARTE </td>
						<td> <input type="text" name="parte" required="true" title="El campo no puede estar vacio." placeholder="Número de parte" /></td>
					</tr>
					<tr>
						<td> DESCRIPCION DEL PRODUCTO O PARTE </td>
						<td> <input type="text" name="descripcionparte" required="true" title="El campo no puede estar vacio." placeholder="Descripción del producto ó parte" /></td>
					</tr>
					<tr>
						<td> NUMERO DE PIEZAS EN LA ORDEN </td>
						<td> <input type="text" name="piezasorden" required="true" title="El campo no puede estar vacio." placeholder="Número de piezas en la orden" /></td>
					</tr>
					<tr>
						<td> NUMERO DE PIEZAS RECHAZADAS </td>
						<td> <input type="text" name="piezasrechazadas" required="true" title="El campo no puede estar vacio." placeholder="Número de piezas rechazadas" /></td>
					</tr>
					<tr>
						<td> DESCRIPCION DE LA FALLA REPORTADA </td>
						<td> <input type="text" name="descripcionfalla" required="true" title="El campo no puede estar vacio." placeholder="Descripción de la falla reportada" /></td>
					</tr>
				</table>

				<table cellpadding='0' cellspacing='0' border='1' class='tabla_altas'> 
					<tr>
						<th colspan="8"><b> Nombre del proveedor: </b></th> 
					</tr>
					
					<tr>
						<td><input type=radio name="proveedor" value="ACCUTITE" /> ACCUTITE </td>
						<td><input type=radio name="proveedor" value="ACME" /> ACME </td>
						<td><input type=radio name="proveedor" value="ADAMS CAMPBELL" /> ADAMS CAMPBELL </td>
						<td><input type=radio name="proveedor" value="ADVANCE" /> ADVANCE </td>
						<td><input type=radio name="proveedor" value="ALANOD" /> ALANOD </td>
						<td><input type=radio name="proveedor" value="ALBRIGHT LIGHTING PLASTICS" /> ALBRIGHT LIGHTING PLASTICS </td>
						<td><input type=radio name="proveedor" value="ALLEN PKG" /> ALLEN PKG </td>
						<td><input type=radio name="proveedor" value="ALP LIGHTING COMPONENTS" /> ALP LIGHTING COMPONENTS </td>
					</tr>
					<tr>
						<td><input type=radio name="proveedor" value="ALPHA CAST" /> ALPHA CAST </td>
						<td><input type=radio name="proveedor" value="AMERICAN DE ROSA" /> AMERICAN DE ROSA </td>
						<td><input type=radio name="proveedor" value="AMERICAN DIE CASTING, INC." /> AMERICAN DIE CASTING, INC. </td>
						<td><input type=radio name="proveedor" value="BENDER & WERTH" /> BENDER & WERTH </td>
						<td><input type=radio name="proveedor" value="BILL BROWN SALES" /> BILL BROWN SALES </td>
						<td><input type=radio name="proveedor" value="BODINE" /> BODINE </td>
						<td><input type=radio name="proveedor" value="BORRMAN" /> BORRMAN </td>
						<td><input type=radio name="proveedor" value="CAST AND ENG PRODUCTS" /> CAST AND ENG PRODUCTS </td>
					</tr>
					<tr>
						<td><input type=radio name="proveedor" value="CIRCLE BLOT" /> CIRCLE BLOT </td>
						<td><input type=radio name="proveedor" value="CIRCLE METAL SALES" /> CIRCLE METAL SALES </td>
						<td><input type=radio name="proveedor" value="COAST" /> COAST </td>
						<td><input type=radio name="proveedor" value="CREST" /> CREST </td>
						<td><input type=radio name="proveedor" value="DELTECH" /> DELTECH </td>
						<td><input type=radio name="proveedor" value="ELECTROMARK" /> ELECTROMARK </td>
						<td><input type=radio name="proveedor" value="EUGINO" /> EUGINO </td>
						<td><input type=radio name="proveedor" value="EXERGY" /> EXERGY </td>
					</tr>
					<tr>
						<td><input type=radio name="proveedor" value="FORMED" /> FORMED </td>
						<td><input type=radio name="proveedor" value="FULHAM" /> FULHAM </td>
						<td><input type=radio name="proveedor" value="FUSES UNLIMITED" /> FUSES UNLIMITED </td>
						<td><input type=radio name="proveedor" value="FUTURE" /> FUTURE </td>
						<td><input type=radio name="proveedor" value=" G.E." /> G.E. </td>
						<td><input type=radio name="proveedor" value="GILLINDER" /> GILLINDER </td>
						<td><input type=radio name="proveedor" value="GINO SHEET METAL" /> GINO SHEET METAL </td>
						<td><input type=radio name="proveedor" value="GOOD IDEAS" /> GOOD IDEAS </td>
					</tr>
					<tr>
						<td><input type=radio name="proveedor" value="GRANDLITE" /> GRANDLITE </td>
						<td><input type=radio name="proveedor" value="H & M FOUNDRY" /> H & M FOUNDRY </td>
						<td><input type=radio name="proveedor" value="HOPKINS" /> HOPKINS </td>
						<td><input type=radio name="proveedor" value="IFSCO" /> IFSCO </td>
						<td><input type=radio name="proveedor" value="INDUSTRIAL" /> INDUSTRIAL GLASS </td>
						<td><input type=radio name="proveedor" value="INNOVATION" /> INNOVATION </td>
						<td><input type=radio name="proveedor" value="INVENTRONICS" /> INVENTRONICS </td>
						<td><input type=radio name="proveedor" value="J.V.'S MACHINE SHOP" /> J.V.'S MACHINE SHOP </td>
					</tr>
					<tr>
						<td><input type=radio name="proveedor" value="KEN-MAC METALS" /> KEN-MAC METALS </td>
						<td><input type=radio name="proveedor" value="KLENITUIS" /> KLENITUIS </td>
						<td><input type=radio name="proveedor" value="KOPP" /> KOPP </td>
						<td><input type=radio name="proveedor" value="LENDAR DESIGN INC." /> LENDAR DESIGN INC. </td>
						<td><input type=radio name="proveedor" value="LEVITON" /> LEVITON </td>
						<td><input type=radio name="proveedor" value="LEXALITE" /> LEXALITE </td>
						<td><input type=radio name="proveedor" value="MC MASTER" /> MC MASTER </td>
						<td><input type=radio name="proveedor" value="METAL POLE" /> METAL POLE </td>
					</tr>
					<tr>
						<td><input type=radio name="proveedor" value="MEYER" /> MEYER </td>
						<td><input type=radio name="proveedor" value="NICHIA" /> NICHIA </td>
						<td><input type=radio name="proveedor" value="OMEGA LEADS" /> OMEGA LEADS </td>
						<td><input type=radio name="proveedor" value="ONLINE ELECTRONICS" /> ONLINE ELECTRONICS </td>
						<td><input type=radio name="proveedor" value="PACIFIC DIE" /> PACIFIC DIE </td>
						<td><input type=radio name="proveedor" value="PAX" /> PAX </td>
						<td><input type=radio name="proveedor" value="PENDANT SYSTEM" /> PENDANT SYSTEM </td>
						<td><input type=radio name="proveedor" value="PHILLIPS" /> PHILLIPS </td>
					</tr>
					<tr>
						<td><input type=radio name="proveedor" value="PLASTIC DEPOT" /> PLASTIC DEPOT </td>
						<td><input type=radio name="proveedor" value="POLYMER" /> POLYMER </td>
						<td><input type=radio name="proveedor" value="PRECISION" /> PRECISION </td>
						<td><input type=radio name="proveedor" value="QL COMPANY" /> QL COMPANY </td>
						<td><input type=radio name="proveedor" value="QSSI" /> QSSI </td>
						<td><input type=radio name="proveedor" value="RIDOUT PLASTICS" /> RIDOUT PLASTICS </td>
						<td><input type=radio name="proveedor" value="SABIC" /> SABIC </td>
						<td><input type=radio name="proveedor" value="SAEHAN ELECTRONICS" /> SAEHAN ELECTRONICS </td>
					</tr>
					<tr>
						<td><input type=radio name="proveedor" value="SAPA" /> SAPA </td>
						<td><input type=radio name="proveedor" value="SERTEC" /> SERTEC </td>
						<td><input type=radio name="proveedor" value="SINCALIR GLASS" /> SINCALIR GLASS </td>
						<td><input type=radio name="proveedor" value="SING WELDING" /> SING WELDING </td>
						<td><input type=radio name="proveedor" value="STANDARD LIGHTING" /> STANDARD LIGHTING </td>
						<td><input type=radio name="proveedor" value="SYLVANIA" /> SYLVANIA </td>
						<td><input type=radio name="proveedor" value="TEMPWERKS" /> TEMPWERKS </td>
						<td><input type=radio name="proveedor" value="TEXMEX" /> TEXMEX </td>
					</tr>
					<tr>
						<td><input type=radio name="proveedor" value="THOMAS RESEARCH PRODUCTS" /> THOMAS RESEARCH PRODUCTS </td>
						<td><input type=radio name="proveedor" value="TOTTEN" /> TOTTEN </td>
						<td><input type=radio name="proveedor" value="TRANS-PACIFIC" /> TRANS-PACIFIC </td>
						<td><input type=radio name="proveedor" value="TUBE SER" /> TUBE SER </td>
						<td><input type=radio name="proveedor" value="TUBULAR" /> TUBULAR </td>
						<td><input type=radio name="proveedor" value="UNIVERSAL" /> UNIVERSAL </td>
						<td><input type=radio name="proveedor" value="VENTURE" /> VENTURE </td>
						<td><input type=radio name="proveedor" value="VIRTICUS" /> VIRTICUS </td>
					</tr>
					<tr>
						<td><input type=radio name="proveedor" value="WAGO" /> WAGO </td>
						<td><input type=radio name="proveedor" value="WEST MARINE" /> WEST MARINE </td>
						<td><input type=radio name="proveedor" value="N/A" /> NO APLICA </td>
					</tr>
					<tr>
						<td><input type=radio name="proveedor" value="otro"> OTRO: </td>			
						<td colspan="2"><input type="text" name="proveedor_nombre" id="proveedor_nombre" placeholder="Nombre del proveedor" /></td>		
					</tr>
				</table>
				
				<table cellpadding='0' cellspacing='0' border='1' class='tabla_altas'> 
					<tr>
						<th colspan="7"><b> Origen de la no conformidad y razón de rechazo: </b></td> 
					</tr>

					<tr>
						<th colspan="2"><b> Origen de la no-conformidad </b></td> 
						<th colspan="2"><b> Razón de rechazo </b></td>
					</tr>
					
					<tr>
						<th><b> Código </b></th>
						<th><b> Area </b></th>	
						<th><b> Código </b></th>
						<th><b> Razón </b></th>
					</tr>
					
					<tr>
					
					<td rowspan="6">ACCESS </td>
					<td rowspan="6">ACCESORIOS </td>	
					
					<td>AC001 </td>
						<td><input type=radio name="origen_codigo" value="AC001"> COMPONENTE INCORRECTO </td>
					</tr>	

					<tr>
						<td>AC002 </td>
						<td><input type=radio name="origen_codigo" value="AC002"> PRODUCTO DAÑADO </td>
					</tr>	

					<tr>
						<td>AC003 </td>
						<td><input type=radio name="origen_codigo" value="AC003"> PRODUCTO INCOMPLETO </td>
					</tr>

					<tr>
						<td>AC004 </td>
						<td><input type=radio name="origen_codigo" value="AC004"> DISCREPANCIA EN CANTIDAD </td>
					</tr>

					<tr>
						<td>AC005 </td>
						<td><input type=radio name="origen_codigo" value="AC005"> ERROR EN MARCAJE </td>
					</tr>	

					<tr>
						<td>AC006 </td>
						<td><input type=radio name="origen_codigo" value="AC006"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>
								
					<tr>
					
					<td rowspan="4">ALMDR </td>
					<td rowspan="4">FAB AL PERFORADO </td>	
					
					<td>AD001 </td>
						<td><input type=radio name="origen_codigo" value="AD001"> PERFORACION FUERA DE ESPECIFICACION </td>
					</tr>

					<tr>
						<td>AD002 </td>
						<td><input type=radio name="origen_codigo" value="AD002"> PERFORACION O PROVISION EXTRA </td>
					</tr>	

					<tr>
						<td>AD003 </td>
						<td><input type=radio name="origen_codigo" value="AD003"> PERFORACION O PROVISION FALTANTE </td>
					</tr>

					<tr>
						<td>AD004 </td>
						<td><input type=radio name="origen_codigo" value="AD004"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>
					
					<tr>
					
					<td rowspan="3">ALMGR </td>
					<td rowspan="3">FAB AL PULIDO </td>	
					
					<td>AG001 </td>
						<td><input type=radio name="origen_codigo" value="AG001"> PULIDO EXCESIVO </td>
					</tr>	

					<tr>
						<td>AG002 </td>
						<td><input type=radio name="origen_codigo" value="AG002"> FALTANTE DE PULIDO </td>
					</tr>	

					<tr>
						<td>AG003 </td>
						<td><input type=radio name="origen_codigo" value="AG003"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>
				
					<tr>
					
					<td rowspan="6">ALMWL </td>
					<td rowspan="6">FAB AL SOLDADURA </td>	
					
					<td>AW001 </td>
						<td><input type=radio name="origen_codigo" value="AW001"> APLICACION EXCESIVA DE SOLDADURA </td>
					</tr>	

					<tr>
						<td>AW002 </td>
						<td><input type=radio name="origen_codigo" value="AW002"> FALTANTE DE SOLDADURA </td>
					</tr>	

					<tr>
						<td>AW003 </td>
						<td><input type=radio name="origen_codigo" value="AW003"> APLICACION DISPAREJA DE SOLDADURA </td>
					</tr>

					<tr>
						<td>AW004 </td>
						<td><input type=radio name="origen_codigo" value="AW004"> PARTE MAL UBICADA </td>
					</tr>

					<tr>
						<td>AW005 </td>
						<td><input type=radio name="origen_codigo" value="AW005"> MATERIAL EQUIVOCADO EN PARTE </td>
					</tr>	

					<tr>
						<td>AW006 </td>
						<td><input type=radio name="origen_codigo" value="AW006"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>
				
					<tr>
					
					<td rowspan="4">CNC01 </td>
					<td rowspan="4">CNC </td>	
					
					<td>CN001 </td>
						<td><input type=radio name="origen_codigo" value="CN001"> ERROR EN PONCHADO </td>
					</tr>	

					<tr>
						<td>CN002 </td>
						<td><input type=radio name="origen_codigo" value="CN002"> ERROR EN DOBLADO </td>
					</tr>

					<tr>
						<td>CN003 </td>
						<td><input type=radio name="origen_codigo" value="CN003"> DIMENSION FUERA DE ESPECIFICACION </td>
					</tr>

					<tr>
						<td>CN004 </td>
						<td><input type=radio name="origen_codigo" value="CN004"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>
				
					<tr>
					
					<td rowspan="4">DCAST </td>
					<td rowspan="4">DIE CASTING </td>	
					
					<td>DC001 </td>
						<td><input type=radio name="origen_codigo" value="DC001"> POROSIDAD </td>
					</tr>	

					<tr>
						<td>DC002 </td>
						<td><input type=radio name="origen_codigo" value="DC002"> DEFORMACION </td>
					</tr>	

					<tr>
						<td>DC003 </td>
						<td><input type=radio name="origen_codigo" value="DC003"> DEFLEXION </td>
					</tr>

					<tr>
						<td>DC004 </td>
						<td><input type=radio name="origen_codigo" value="DC004"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>
					
					<tr>
					
					<td rowspan="15">FASSY </td>
					<td rowspan="15">ENSAMBLE FINAL </td>	
						
					<td>FA001 </td>
						<td><input type=radio name="origen_codigo" value="FA001"> ERROR EN ENSAMBLAJE </td>
					</tr>	

					<tr>
						<td>FA002 </td>
						<td><input type=radio name="origen_codigo" value="FA002"> PRODUCTO DAÑADO </td>
					</tr>	

					<tr>
						<td>FA003 </td>
						<td><input type=radio name="origen_codigo" value="FA003"> FALLA EN PRUEBA FUNCIONAL </td>
					</tr>

					<tr>
						<td>FA004 </td>
						<td><input type=radio name="origen_codigo" value="FA004"> FALLA EN PRUEBA DIELECTRICA </td>
					</tr>

					<tr>
						<td>FA005 </td>
						<td><input type=radio name="origen_codigo" value="FA005"> COMPONENTE INCORRECTO </td>
					</tr>	

					<tr>
						<td>FA006 </td>
						<td><input type=radio name="origen_codigo" value="FA006"> ERROR EN MARCAJE </td>
					</tr>

					<tr>
						<td>FA007 </td>
						<td><input type=radio name="origen_codigo" value="FA007"> RESIDUOS DE MATERIAL </td>
					</tr>

					<tr>
						<td>FA008 </td>
						<td><input type=radio name="origen_codigo" value="FA008"> COMPONENTE FALTANTE </td>
					</tr>

					<tr>
						<td>FA009 </td>
						<td><input type=radio name="origen_codigo" value="FA009"> DAÑO EN CABLES </td>
					</tr>

					<tr>
						<td>FA010 </td>
						<td><input type=radio name="origen_codigo" value="FA010"> COMPONENTE DAÑADO </td>
					</tr>

					<tr>
						<td>FA011 </td>
						<td><input type=radio name="origen_codigo" value="FA011"> ERROR EN CABLEADO INTERIOR </td>
					</tr>

					<tr>
						<td>FA012 </td>
						<td><input type=radio name="origen_codigo" value="FA012"> DAÑO EN CABLES DE CONEXION </td>
					</tr>

					<tr>
						<td>FA013 </td>
						<td><input type=radio name="origen_codigo" value="FA013"> ERROR EN LONGITUD DE CABLES </td>
					</tr>

					<tr>
						<td>FA014 </td>
						<td><input type=radio name="origen_codigo" value="FA014"> DAÑO POR MANEJO </td>
					</tr>

					<tr>
						<td>FA015 </td>
						<td><input type=radio name="origen_codigo" value="FA015"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>
				
					<tr>
						
					<td rowspan="3">FNDRY </td>
					<td rowspan="3">FUNDICION </td>	
					
					<td>FO001 </td>
						<td><input type=radio name="origen_codigo" value="FO001"> POROSIDAD </td>
					</tr>	

					<tr>
						<td>FO002 </td>
						<td><input type=radio name="origen_codigo" value="FO002"> DEFORMACION </td>
					</tr>	

					<tr>
						<td>FO003 </td>
						<td><input type=radio name="origen_codigo" value="FO003"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>			

					<tr>
						<td rowspan="7">LEDAS </td>
						<td rowspan="7">ENSAMBLE LED </td>	
						<td>LD001 </td>
						<td><input type=radio name="origen_codigo" value="LD001"> FALLA EN PRUEBA FUNCIONAL </td>
					</tr>	

					<tr>
						<td>LD002 </td>
						<td><input type=radio name="origen_codigo" value="LD002"> COMPONENTE INCORRECTO </td>
					</tr>

					<tr>
						<td>LD003 </td>
						<td><input type=radio name="origen_codigo" value="LD003"> COMPONENTE FALTANTE </td>
					</tr>	

					<tr>
						<td>LD004 </td>
						<td><input type=radio name="origen_codigo" value="LD004"> DAÑO EN CABLES </td>
					</tr>	

					<tr>
						<td>LD005 </td>
						<td><input type=radio name="origen_codigo" value="LD005"> PRODUCTO DAÑADO </td>
					</tr>	

					<tr>
						<td>LD006 </td>
						<td><input type=radio name="origen_codigo" value="LD006"> COMPONENTE DAÑADO </td>
					</tr>

					<tr>
						<td>LD007 </td>
						<td><input type=radio name="origen_codigo" value="LD007"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>	

					<tr>
						<td rowspan="8">OPASS </td>
						<td rowspan="8">ENSAMBLE REFLECTORES </td>	
						<td>OP001 </td>
						<td><input type=radio name="origen_codigo" value="LD001"> MATERIAL EQUIVOCADO EN ENSAMBLE </td>
					</tr>	

					<tr>
						<td>OP002 </td>
						<td><input type=radio name="origen_codigo" value="OP002"> RAYONES </td>
					</tr>

					<tr>
						<td>OP003 </td>
						<td><input type=radio name="origen_codigo" value="OP003"> FALTANTE DE REMACHE </td>
					</tr>	

					<tr>
						<td>OP004 </td>
						<td><input type=radio name="origen_codigo" value="OP004"> FALTANTE DE HOYO / PROVISION </td>
					</tr>	

					<tr>
						<td>OP005 </td>
						<td><input type=radio name="origen_codigo" value="OP005"> BASE PARA FOCO EQUIVOCADA </td>
					</tr>	

					<tr>
						<td>OP006 </td>
						<td><input type=radio name="origen_codigo" value="OP006"> BASE PARA FOCO FALTANTE </td>
					</tr>

					<tr>
						<td>OP007 </td>
						<td><input type=radio name="origen_codigo" value="OP007"> DEFORMACION </td>
					</tr>
					
					<tr>
						<td>OP008 </td>
						<td><input type=radio name="origen_codigo" value="OP008"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>	
					
					<tr>
						<td rowspan="12">PCBCR </td>
						<td rowspan="12">PCB CUARTO LIMPIO </td>	
						<td>CR001 </td>
						<td><input type=radio name="origen_codigo" value="CR001"> DESPRENDIMIENTO DE PISTA </td>
					</tr>	

					<tr>
						<td>CR002 </td>
						<td><input type=radio name="origen_codigo" value="CR002"> DEFECTO EN SOLDADO </td>
					</tr>

					<tr>
						<td>CR003 </td>
						<td><input type=radio name="origen_codigo" value="CR003"> FALTA DE EPOXICO </td>
					</tr>	

					<tr>
						<td>CR004 </td>
						<td><input type=radio name="origen_codigo" value="CR004"> EXCESO DE EPOXICO </td>
					</tr>	

					<tr>
						<td>CR005 </td>
						<td><input type=radio name="origen_codigo" value="CR005"> DAÑO EN CABLES </td>
					</tr>

					<tr>
						<td>CR006 </td>
						<td><input type=radio name="origen_codigo" value="CR006"> DESALINEACION DE CLUSTER / LENS </td>
					</tr>	

					<tr>
						<td>CR007 </td>
						<td><input type=radio name="origen_codigo" value="CR007"> GASKET EQUIVOCADO </td>
					</tr>	

					<tr>
						<td>CR008 </td>
						<td><input type=radio name="origen_codigo" value="CR008"> FALTA DE CURADO UV </td>
					</tr>	

					<tr>
						<td>CR009 </td>
						<td><input type=radio name="origen_codigo" value="CR009"> CLUSTER / LENS EQUIVOCADO </td>
					</tr>	

					<tr>
						<td>CR010 </td>
						<td><input type=radio name="origen_codigo" value="CR010"> PCB EQUIVOCADO </td>
					</tr>	

					<tr>
						<td>CR011 </td>
						<td><input type=radio name="origen_codigo" value="CR010"> DAÑOS DURANTE ENSAMBLAJE </td>
					</tr>

					<tr>
						<td>CR012 </td>
						<td><input type=radio name="origen_codigo" value="CR012"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>	
				
					<tr>
						<td rowspan="6">PINRD </td>
						<td rowspan="6">INYECCION PLASTICO (RD) </td>	
						<td>PI001 </td>
						<td><input type=radio name="origen_codigo" value="PI001"> BURBUJAS DE AIRE </td>
					</tr>	

					<tr>
						<td>PI002 </td>
						<td><input type=radio name="origen_codigo" value="PI002"> MANCHAS </td>
					</tr>	

					<tr>
						<td>PI003 </td>
						<td><input type=radio name="origen_codigo" value="PI003"> DECOLORACION </td>
					</tr>

					<tr>
						<td>PI004 </td>
						<td><input type=radio name="origen_codigo" value="PI004"> QUEBRADURAS </td>
					</tr>

					<tr>
						<td>PI005 </td>
						<td><input type=radio name="origen_codigo" value="PI005"> DEFORMACION </td>
					</tr>	

					<tr>
						<td>PI006 </td>
						<td><input type=radio name="origen_codigo" value="PI006"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>
					
					<tr>
					
					<td rowspan="16">PCOAT </td>
					<td rowspan="16">PINTURA </td>	
					
					<td>PC001 </td>
						<td><input type=radio name="origen_codigo" value="PC001"> AMPOLLAS </td>
					</tr>	

					<tr>
						<td>PC002 </td>
						<td><input type=radio name="origen_codigo" value="PC002"> COLOR INCONSISTENTE </td>
					</tr>	

					<tr>
						<td>PC003 </td>
						<td><input type=radio name="origen_codigo" value="PC003"> CONTAMINACION </td>
					</tr>

					<tr>
						<td>PC004 </td>
						<td><input type=radio name="origen_codigo" value="PC004"> PRODUCTO DAÑADO </td>
					</tr>

					<tr>
						<td>PC005 </td>
						<td><input type=radio name="origen_codigo" value="PC005"> DECOLORACION </td>
					</tr>	

					<tr>
						<td>PC006 </td>
						<td><input type=radio name="origen_codigo" value="PC006"> RESIDUO DE PASTA </td>
					</tr>
					
					<tr>
						<td>PC007 </td>
						<td><input type=radio name="origen_codigo" value="PC007"> RESIDUO DE GRASA </td>
					</tr>
					
					<tr>
						<td>PC008 </td>
						<td><input type=radio name="origen_codigo" value="PC008"> CASCARA DE NARANJA </td>
					</tr>
					
					<tr>
						<td>PC009 </td>
						<td><input type=radio name="origen_codigo" value="PC009"> EXCESO DE PINTURA </td>
					</tr>
					
					<tr>
						<td>PC010 </td>
						<td><input type=radio name="origen_codigo" value="PC010"> POROSIDAD </td>
					</tr>
					
					<tr>
						<td>PC011 </td>
						<td><input type=radio name="origen_codigo" value="PC011"> MALA ADHERENCIA </td>
					</tr>
					
					<tr>
						<td>PC012 </td>
						<td><input type=radio name="origen_codigo" value="PC012"> FALTA DE COBERTURA </td>
					</tr>
					
					<tr>
						<td>PC013 </td>
						<td><input type=radio name="origen_codigo" value="PC013"> RAYONES </td>
					</tr>
					
					<tr>
						<td>PC014 </td>
						<td><input type=radio name="origen_codigo" value="PC014"> COLOR EQUIVOCADO </td>
					</tr>
					
					<tr>
						<td>PC015 </td>
						<td><input type=radio name="origen_codigo" value="PC015"> RESIDUO DE GRANALLA </td>
					</tr>
					
					<tr>
						<td>PC016 </td>
						<td><input type=radio name="origen_codigo" value="PC016"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>
					
					<tr>
					
						<td rowspan="6">SMTRD </td>
						<td rowspan="6">CUARTO SMT (RD) </td>	
						
						<td>SM001 </td>
						<td><input type=radio name="origen_codigo" value="SM001"> PCB MAL IDENTIFICADO </td>
					</tr>	

					<tr>
						<td>SM002 </td>
						<td><input type=radio name="origen_codigo" value="SM002"> DESPRENDIMIENTO DE DIODO (LED) </td>
					</tr>	

					<tr>
						<td>SM003 </td>
						<td><input type=radio name="origen_codigo" value="SM003"> RAYONES </td>
					</tr>

					<tr>
						<td>SM004 </td>
						<td><input type=radio name="origen_codigo" value="SM004"> MANCHAS </td>
					</tr>

					<tr>
						<td>SM005 </td>
						<td><input type=radio name="origen_codigo" value="SM005"> QUEBRADURAS </td>
					</tr>	

					<tr>
						<td>SM006 </td>
						<td><input type=radio name="origen_codigo" value="SM006"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>
					
					<tr>
					
						<td rowspan="5">SPNNG </td>
						<td rowspan="5">SPINNING </td>	
						
						<td>SP001 </td>
						<td><input type=radio name="origen_codigo" value="SP001"> DIMENSION FUERA DE ESPECIFICACION </td>
					</tr>	

					<tr>
						<td>SP002 </td>
						<td><input type=radio name="origen_codigo" value="SP002"> MATERIAL EQUIVOCADO EN PARTE </td>
					</tr>	

					<tr>
						<td>SP003 </td>
						<td><input type=radio name="origen_codigo" value="SP003"> QUEBRADURAS </td>
					</tr>

					<tr>
						<td>SP004 </td>
						<td><input type=radio name="origen_codigo" value="SP004"> DEFORMACION </td>
					</tr>

					<tr>
						<td>SP005 </td>
						<td><input type=radio name="origen_codigo" value="SP005"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>	
					
					<tr>
					
						<td rowspan="10">STLFB </td>
						<td rowspan="10">FABRICACION ACERO </td>	
						
						<td>ST001 </td>
						<td><input type=radio name="origen_codigo" value="ST001"> PERFORACION FUERA DE ESPECIFICACION </td>
					</tr>	

					<tr>
						<td>ST002 </td>
						<td><input type=radio name="origen_codigo" value="ST002"> PERFORACION O PROVISION EXTRA </td>
					</tr>	

					<tr>
						<td>ST003 </td>
						<td><input type=radio name="origen_codigo" value="ST003"> PERFORACION O PROVISION FALTANTE </td>
					</tr>

					<tr>
						<td>ST004 </td>
						<td><input type=radio name="origen_codigo" value="ST004"> APLICACION EXCESIVA DE SOLDADURA </td>
					</tr>

					<tr>
						<td>ST005 </td>
						<td><input type=radio name="origen_codigo" value="ST005"> FALTANTE DE SOLDADURA </td>
					</tr>	
					
					<tr>
						<td>ST006 </td>
						<td><input type=radio name="origen_codigo" value="ST006"> APLICACION DISPAREJA DE SOLDADURA </td>
					</tr>
					
					<tr>
						<td>ST007 </td>
						<td><input type=radio name="origen_codigo" value="ST007"> PARTE MAL UBICADA </td>
					</tr>
					
					<tr>
						<td>ST008 </td>
						<td><input type=radio name="origen_codigo" value="ST008"> MATERIAL EQUIVOCADO EN PARTE </td>
					</tr>
					
					<tr>
						<td>ST009 </td>
						<td><input type=radio name="origen_codigo" value="ST009"> PULIDO EXCESIVO </td>
					</tr>
					
					<tr>
						<td>ST010 </td>
						<td><input type=radio name="origen_codigo" value="ST010"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>
				
					<tr>
						<td rowspan="6">SPEXT </td>
						<td rowspan="6">PROVEEDOR (EXTERNO) </td>	
						
						<td>SE001 </td>
						<td><input type=radio name="origen_codigo" value="SE001"> COMPONENTE INCORRECTO </td>
					</tr>	

					<tr>
						<td>SE002 </td>
						<td><input type=radio name="origen_codigo" value="SE002"> PRODUCTO DAÑADO </td>
					</tr>	

					<tr>
						<td>SE003 </td>
						<td><input type=radio name="origen_codigo" value="SE003"> PRODUCTO INCOMPLETO </td>
					</tr>

					<tr>
						<td>SE004 </td>
						<td><input type=radio name="origen_codigo" value="SE004"> DISCREPANCIA EN CANTIDAD </td>
					</tr>

					<tr>
						<td>SE005 </td>
						<td><input type=radio name="origen_codigo" value="SE005"> ERROR EN MARCAJE </td>
					</tr>	

					<tr>
						<td>SE006 </td>
						<td><input type=radio name="origen_codigo" value="SE006"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>
					
					<tr>
						<td rowspan="6">WHSRE </td>
						<td rowspan="6">ALMACEN </td>	
						
						<td>WH001 </td>
						<td><input type=radio name="origen_codigo" value="WH001"> COMPONENTE ENTREGADO INCORRECTO </td>
					</tr>	

					<tr>
						<td>WH002 </td>
						<td><input type=radio name="origen_codigo" value="WH002"> DAÑO POR MANEJO </td>
					</tr>	

					<tr>
						<td>WH003 </td>
						<td><input type=radio name="origen_codigo" value="WH003"> PRODUCTO INCOMPLETO </td>
					</tr>

					<tr>
						<td>WH004 </td>
						<td><input type=radio name="origen_codigo" value="WH004"> DISCREPANCIA EN CANTIDAD </td>
					</tr>

					<tr>
						<td>WH005 </td>
						<td><input type=radio name="origen_codigo" value="WH005"> COMPONENTES MEZCLADOS </td>
					</tr>	

					<tr>
						<td>WH006 </td>
						<td><input type=radio name="origen_codigo" value="WH006"> OTRO (ESPECIFICAR AL FINAL DE LA TABLA) </td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td> OTRO </td>
						<td COLSPAN="5"><input type="text" name="razonotro" id="razonotro" placeholder="Razón de rechazo" /></td>				
					</tr>
				</table>

				<table cellpadding='0' cellspacing='0' border='1' class='tabla_altas'> 
					<tr>
						<th colspan="7"><b> Localización del defecto: </b></td> 
					</tr>

					<tr>
						<td><input type=radio name="localiza_defecto" value="SPROC" /> INSPECCION AL INICIO DEL PROCESO </td>
						<td><input type=radio name="localiza_defecto" value="IPROC" /> DURANTE EL PROCESO </td>
						<td><input type=radio name="localiza_defecto" value="EPROC" /> INSPECCION AL FINAL DE PROCESO </td>	
						<td><input type=radio name="localiza_defecto" value="WHSRE" /> ALMACEN (EN INVENTARIO) </td>
						<td><input type=radio name="localiza_defecto" value="INCOM" /> INSPECCION DE RECIBOS </td>
						<td><input type=radio name="localiza_defecto" value="SHIPG" /> EMBARQUES </td>
					</tr>

					<tr>
						<td><input type=radio name="localiza_defecto" value="otro" /> OTRO: </td>			
						<td COLSPAN="5"><input type="text" name="localiza_defecto_otro" id="localiza_defecto_otro" placeholder="Localización" /></td>			
					</tr>
				</table> 

				<table cellpadding='0' cellspacing='0' border='1' class='tabla_altas'> 
					<tr>
						<th colspan="7"><b> Disposición del defecto: </b></td> 
					</tr>

					<tr>
						<td><input type=radio name="disposicion" value="SCRAP" /> DESECHAR (SCRAP) </td>
						<td><input type=radio name="disposicion" value="RT2RD" /> REGRESAR A RANCHO DOMINGUEZ </td>
						<td><input type=radio name="disposicion" value="RT2VD" /> REGRESAR A PROVEEDOR (EXTERNO) </td>	
						<td><input type=radio name="disposicion" value="USEAI" /> USAR COMO ESTA </td>
						<td><input type=radio name="disposicion" value="REWRK" /> RE-TRABAJAR </td>
						<td><input type=radio name="disposicion" value="SRTQA" /> SEPARAR </td>
						<td><input type=radio name="disposicion" value="TBDQA" /> POR DEFINIR (QA) </td>
					</tr>

					<tr>
						<td><input type=radio name="disposicion" value="otro" /> OTRO: </td>			
						<td colspan="6"><input type="text" name="disposicion_otro" id="disposicion_otro" placeholder="Disposición" /></td>			
					</tr>
				</table>

				<section id="fotos">
					<input type="file" name="foto1" id="foto1" ><br><br>
					<input type="file" name="foto2" id="foto2" ><br><br>
					<input type="file" name="foto3" id="foto3" ><br><br>
				</section>

				<div id="boton_generar">
					<input type="submit" name="ok" id="ok" value="GENERAR NCPR" />
				</div>
			</form>		
			
			<form action="reports/ReporteNcprs.php" >
				<div id="boton_reporte">
					<input type="submit" value="REPORTE"/>
				</div>
			</form>
		</div>
	</body> 
</html>