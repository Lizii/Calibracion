<?php
    include_once ("iniciar.php"); 
?>

<html> 
    <head>
	    <meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
		<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.2.custom.css" />
        <link rel="icon" type="image/png" href="img/NCPR logo.png" />
       	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker-es.js"></script>	
        <script type="text/javascript">
        	$(document).ready(function()
        	{
        		/* **** Función que muestra un calendario **** */
				$(function() {
					$.datepicker.setDefaults($.datepicker.regional["es"]);
					$("#fechaenvio").datepicker({
						minDate: "-0D"
					});
				});
				/* **** Termina la función par mostrar un calendario **** */
			});	
        </script>

        <script type="text/javascript">
            function cargarSelect2(valor) {
                 var arrayValores=new Array(
                    new Array("ACCESS", "AC001", "AC001 - COMPONENTE INCORRECTO"), 
                    new Array("ACCESS", "AC002", "AC002 - PRODUCTO DAÑADO"),
                    new Array("ACCESS", "AC003", "AC003 - PRODUCTO INCOMPLETO"),
                    new Array("ACCESS", "AC004", "AC004 - DISCREPANCIA EN CANTIDAD"),
                    new Array("ACCESS", "AC005", "AC005 - ERROR EN MARCAJE"),
					new Array("ACCESS", "AC006", "AC006 - OTRO (ESPECIFICAR)"),
                    new Array("ALMDR",  "AD001", "AD001 - PERFORACION FUERA DE ESPECIFICACION"),
                    new Array("ALMDR",  "AD002", "AD002 - PERFORACION O PROVISION EXTRA"),
					new Array("ALMDR",  "AD003", "AD003 - PERFORACION O PROVISION FALTANTE"),
                    new Array("ALMDR",  "AD004", "AD004 - OTRO (ESPECIFICAR)"),
                    new Array("ALMGR",  "AG001", "AG001 - PULIDO EXCESIVO"),
                    new Array("ALMGR",  "AG002", "AG002 - FALTANTE DE PULIDO"),
					new Array("ALMGR",  "AG003", "AG003 - OTRO (ESPECIFICAR)"),
                    new Array("ALMWL",  "AW001", "AW001 - APLICACION EXCESIVA DE SOLDADURA"),
                    new Array("ALMWL",  "AW002", "AW002 - FALTANTE DE SOLDADURA"),
                    new Array("ALMWL",  "AW003", "AW003 - APLICACION DISPAREJA DE SOLDADURA"),
                    new Array("ALMWL",  "AW004", "AW004 - PARTE MAL UBICADA"),
                    new Array("ALMWL",  "AW005", "AW005 - MATERIAL EQUIVOCADO EN PARTE"),
					new Array("ALMWL",  "AW006", "AW006 - OTRO (ESPECIFICAR)"),
                    new Array("CNC01",  "CN001", "CN001 - ERROR EN PNCHADO"),
                    new Array("CNC01",  "CN002", "CN002 - ERROR EN DOBLADO"),
                    new Array("CNC01",  "CN003", "CN003 - DIMENSION FUERA DE ESPECIFICACION"),
					new Array("CNC01",  "CN004", "CN004 - OTRO (ESPECIFICAR)"),
                    new Array("DCAST",  "DC001", "DC001 - POROSIDAD"),
                    new Array("DCAST",  "DC002", "DC002 - DEFORMACION"),
                    new Array("DCAST",  "DC003", "DC003 - DEFLEXION"),
					new Array("DCAST",  "DC004", "DC004 - OTRO (ESPECIFICAR)"),
                    new Array("FASSY",  "FA001", "FA001 - ERROR EN ENSAMBLAJE"),
                    new Array("FASSY",  "FA002", "FA002 - PRODUCTO DAÑADO"),
                    new Array("FASSY",  "FA003", "FA003 - FALLA EN PRUEBA FUNCIONAL"),
                    new Array("FASSY",  "FA004", "FA004 - FALLA EN PRUEBA DIELECTRICA"),
                    new Array("FASSY",  "FA005", "FA005 - COMPONENTE INCORRECTO"),
                    new Array("FASSY",  "FA006", "FA006 - ERROR EN MARCAJE"),
                    new Array("FASSY",  "FA007", "FA007 - RESIDUOS DE MATERIAL"),
                    new Array("FASSY",  "FA008", "FA008 - COMPONENTE FALTANTE"),
                    new Array("FASSY",  "FA009", "FA009 - DAÑO EN CABLES"),
                    new Array("FASSY",  "FA010", "FA010 - COMPONENTE DAÑADO"),
                    new Array("FASSY",  "FA011", "FA011 - ERROR EN CABLEADO INTERIOR"),
                    new Array("FASSY",  "FA012", "FA012 - ERROR EN CABLES DE CONEXION"),
                    new Array("FASSY",  "FA013", "FA013 - ERROR EN LONGITUD DE CABLES"),
                    new Array("FASSY",  "FA014", "FA014 - DAÑO POR MANEJO"),
					new Array("FASSY",  "FA015", "FA015 - OTRO (ESPECIFICAR)"),
                    new Array("FNDRY",  "FO001", "FO001 - POROSIDAD"),
                    new Array("FNDRY",  "FO002", "FO002 - DEFORMACION"),
					new Array("FNDRY",  "FO003", "FO003 - OTRO (ESPECIFICAR)"),
                    new Array("LEDAS",  "LD001", "LD001 - FALLA EN PRUEBA FUNCIONAL"),
                    new Array("LEDAS",  "LD002", "LD002 - COMPONENTE INCORRECTO"),
                    new Array("LEDAS",  "LD003", "LD003 - COMPONENTE FALTANTE"),
                    new Array("LEDAS",  "LD004", "LD004 - DAÑO EN CABLES"),
                    new Array("LEDAS",  "LD005", "LD005 - PRODUCTO DAÑADO"),
                    new Array("LEDAS",  "LD006", "LD006 - COMPONENTE DAÑADO"),
					new Array("LEDAS",  "LD007", "LD007 - OTRO (ESPECIFICAR)"),
                    new Array("OPASS",  "OP001", "OP001 - MATERIAL EQUIVOCADO EN ENSAMBLE"),
                    new Array("OPASS",  "OP002", "OP002 - RAYONES"),
                    new Array("OPASS",  "OP003", "OP003 - FALTANTE DE REMACHE"),
                    new Array("OPASS",  "OP004", "OP004 - FALTANTE DE HOYO / PROVISION"),
                    new Array("OPASS",  "OP005", "OP005 - BASE PARA FOCO EQUIVOCADA"),
                    new Array("OPASS",  "OP006", "OP006 - BASE PARA FOCO FALTANTE"),
                    new Array("OPASS",  "OP007", "OP007 - DEFORMACION"),
					new Array("OPASS",  "OP008", "OP008 - OTRO (ESPECIFICAR)"),
					new Array("PCBCR",  "CR001", "CR001 - DESPRENDIMIENTO DE PISTA"),
					new Array("PCBCR",  "CR002", "CR002 - DEFECTO EN SOLDADO"),
					new Array("PCBCR",  "CR003", "CR003 - FALTA DE EPOXICO"),
					new Array("PCBCR",  "CR004", "CR004 - EXCESO DE EPOXICO"),
					new Array("PCBCR",  "CR005", "CR005 - DAÑO EN CABLES"),
					new Array("PCBCR",  "CR006", "CR006 - DESALINEACION DE CLUSTER / LENS"),
					new Array("PCBCR",  "CR007", "CR007 - GASKET EQUIVOCADO"),
					new Array("PCBCR",  "CR008", "CR008 - FALTA DE CURADO UV"),
					new Array("PCBCR",  "CR009", "CR009 - CLUSTER / LENS EQUIVOCADO"),
					new Array("PCBCR",  "CR010", "CR010 - PCB EQUIVOCADO"),
					new Array("PCBCR",  "CR011", "CR011 - DAÑOS DURANTE ENSAMBLAJE"),
					new Array("PCBCR",  "CR012", "CR012 - OTRO (ESPECIFICAR)"),
					new Array("PINRD",  "PI001", "PI001 - BURBUJAS DE AIRE"),
					new Array("PINRD",  "PI002", "PI002 - MANCHAS"),
					new Array("PINRD",  "PI003", "PI003 - DECOLORACION"),
					new Array("PINRD",  "PI004", "PI004 - QUEBRADURAS"),
					new Array("PINRD",  "PI005", "PI005 - DEFORMACION"),
					new Array("PINRD",  "PI006", "PI006 - OTRO (ESPECIFICAR)"),
					new Array("PCOAT",  "PC001", "PC001 - AMPOLLAS"),
					new Array("PCOAT",  "PC002", "PC002 - COLOR INCONSISTENTE"),
					new Array("PCOAT",  "PC003", "PC003 - CONTAMINACION"),
					new Array("PCOAT",  "PC004", "PC004 - PRODUCTO DAÑADO"),
					new Array("PCOAT",  "PC005", "PC005 - DECOLORACION"),
					new Array("PCOAT",  "PC006", "PC006 - RESIDUO DE PASTA"),
					new Array("PCOAT",  "PC007", "PC007 - RESIDUO DE GRASA"),
					new Array("PCOAT",  "PC008", "PC008 - CASCARA DE NARANJA"),
					new Array("PCOAT",  "PC009", "PC009 - EXCESO DE PINTURA"),
					new Array("PCOAT",  "PC010", "PC010 - POROSIDAD"),
					new Array("PCOAT",  "PC011", "PC011 - MALA ADHERENCIA"),
					new Array("PCOAT",  "PC012", "PC012 - FALTA DE COBERTURA"),
					new Array("PCOAT",  "PC013", "PC013 - RAYONES"),
					new Array("PCOAT",  "PC014", "PC014 - COLOR EQUIVOCADO"),
					new Array("PCOAT",  "PC015", "PC015 - RESIDUO DE GRANALLA"),
					new Array("PCOAT",  "PC016", "PC016 - OTRO (ESPECIFICAR)"),
					new Array("SMTRD",  "SM001", "SM001 - PCB MAL IDENTIFICADO"),
					new Array("SMTRD",  "SM002", "SM002 - DESPRENDIMIENTO DE DIODO (LED)"),
					new Array("SMTRD",  "SM003", "SM003 - RAYONES"),
					new Array("SMTRD",  "SM004", "SM004 - MANCHAS"),
					new Array("SMTRD",  "SM005", "SM005 - QUEBRADURAS"),
					new Array("SMTRD",  "SM006", "SM006 - OTRO (ESPECIFICAR)"),
					new Array("SPNNG",  "SP001", "SP001 - DIMENSION FUERA DE ESPECIFICACION"),
					new Array("SPNNG",  "SP002", "SP002 - MATERIAL EQUICOADO EN PARTE"),
					new Array("SPNNG",  "SP003", "SP003 - QUEBRADURAS"),
					new Array("SPNNG",  "SP004", "SP004 - DEFORMACION"),
					new Array("SPNNG",  "SP005", "SP005 - OTRO (ESPECIFICAR)"),
					new Array("STLFB",  "ST001", "ST001 - PERFORACION FUERA DE ESPECIFICACION"),
					new Array("STLFB",  "ST002", "ST002 - PERFORACION O PROVISION EXTRA"),
					new Array("STLFB",  "ST003", "ST003 - PERFORACION O PROVISION FALTANTE"),
					new Array("STLFB",  "ST004", "ST004 - APLICACION EXCESIVA DE SOLDADURA"),
					new Array("STLFB",  "ST005", "ST005 - FALTANTE DE SOLDADURA"),
					new Array("STLFB",  "ST006", "ST006 - APLICACION DISPAREJA DE SOLDADURA"),
					new Array("STLFB",  "ST007", "ST007 - PARTE MAL UBICADA"),
					new Array("STLFB",  "ST008", "ST008 - MATERIAL EQUIVOCADO EN PARTE"),
					new Array("STLFB",  "ST009", "ST009 - PULIDO EXCESIVO"),
					new Array("STLFB",  "ST010", "ST010 - OTRO (ESPECIFICAR)"),
					new Array("SPEXT",  "SE001", "SE001 - COMPONENTE INCORRECTO"),
					new Array("SPEXT",  "SE002", "SE002 - PRODUCTO DAÑADO"),
					new Array("SPEXT",  "SE003", "SE003 - PRODUCTO INCOMPLETO"),
					new Array("SPEXT",  "SE004", "SE004 - DISCREPANCIA EN CANTIDAD"),
					new Array("SPEXT",  "SE005", "SE005 - ERROR EN MARCAJE"),
					new Array("SPEXT",  "SE006", "SE006 - OTRO (ESPECIFICAR)"),
					new Array("WHSRE",  "WH001", "WH001 - COMPONENTE ENTREGADO INCOMPLETO"),
					new Array("WHSRE",  "WH002", "WH002 - DAÑO POR MANEJO"),
					new Array("WHSRE",  "WH003", "WH003 - PRODUCTO INCOMPLETO"),
					new Array("WHSRE",  "WH004", "WH004 - DISCREPANCIA EN CANTIDAD"),
					new Array("WHSRE",  "WH005", "WH005 - COMPONENTES MEZCLADOS"),
					new Array("WHSRE",  "WH006", "WH006 - OTRO (ESPECIFICAR)")
					);
	                
                if(valor==0) 
                {
                	// desactivamos el segundo select 
                    document.getElementById("select2").disabled=true; 
                }
                else
                {
                 	// eliminamos todos los posibles valores que contenga el select2 
                 	document.getElementById("select2").options.length=0; 
                    // añadimos los nuevos valores al select2 
                    document.getElementById("select2").options[0]=new Option("Selecciona una opcion", "0");
                    for(i=0;i<arrayValores.length;i++) 
                    {
                    	// unicamente añadimos las opciones que pertenecen al id seleccionado
                     	// del primer select 
                     	if(arrayValores[i][0]==valor) 
                     	{ 
                         	document.getElementById("select2").options[document.getElementById("select2").options.length]=new Option(arrayValores[i][2], arrayValores[i][1]); 
                     	}	 
                 	}
                  	// habilitamos el segundo select 
                 	document.getElementById("select2").disabled=false;
            	} 
            } 
            /** * Una vez selecciona una valor del segundo selecte, obtenemos la información * de los dos selects y la mostramos */
            function seleccinado_select2(value)
           	{
                var v2 = document.getElementById("select2"); //Seleccionamos el id del select2
                var valor2 = v2.options[v2.selectedIndex].value; 
                
                document.getElementById("origen_codigo").value=valor2; // Guardamos el código obtenido en el input con id="origen_codigo"
            }

            function activar_campo_generado_por(valor) 
            {
               	if(valor!="OTRO")
               	{
	                document.getElementById("generado_otro").disabled=true; 
	               	document.getElementById("generado_otro").value="";
               	}
	           	else
	           		document.getElementById("generado_otro").disabled=false;
            }

            function activar_campo_reportado_por(valor) 
            {
               	if(valor!="OTRO")
               	{
	                document.getElementById("reportado_otro").disabled=true; 
	               	document.getElementById("reportado_otro").value="";
               	}
	           	else
	           		document.getElementById("reportado_otro").disabled=false;
            }

            function activar_campo_localiza_defecto(valor) 
            {
               	if(valor!="THR01")
               	{
	                document.getElementById("localiza_defecto_otro").disabled=true; 
	               	document.getElementById("localiza_defecto_otro").value="";
               	}
	           	else
	           		document.getElementById("localiza_defecto_otro").disabled=false;
            }

            function activar_campo_disposicion(valor) 
            {
               	if(valor!="THR02")
               	{
	                document.getElementById("disposicion_otro").disabled=true; 
	               	document.getElementById("disposicion_otro").value="";
               	}
	           	else
	           		document.getElementById("disposicion_otro").disabled=false;
            }
        </script>
	</head>
	
	<body>
		<div id="contenedor">
			<?php 
				include_once("menu.php");
			?>
			
			<h1> ALTA DE NCPR </h1>
			
			<form action="./libraries/procesarAltaNcpr.php" method="post" name="datos" enctype="multipart/form-data">
				<table cellpadding='0' cellspacing='0' border='1' class='tabla_altas' > ="true"
					<tr>	
						<td> GENERADO POR: </td>
						<td> 
							<form> 
								<select name="generado_por" onchange='activar_campo_generado_por(this.value);'>
									<option value=""> Selelecciona una opción: </option>
									<option value="ALDO MATA"> ALDO MATA </option>
									<option value="CRISTINA SOLIS"> CRISTINA SOLIS </option>
									<option value="DANIEL AGUIRRE"> DANIEL AGUIRRE </option>
									<option value="HUGO AMEZQUITA"> HUGO AMEZQUITA </option>
									<option value="JAAZIEL SERRANO"> JAAZIEL SERRANO </option>
									<option value="OSCAR VILLAREAL"> OSCAR VILLAREAL </option>
									<option value="OTRO"> OTRO </option>
								</select>
							</form>
						</td>
						<td colspan="2">
							Otro: <input type="text" name="generado_otro" id="generado_otro" class="input_ncpr" placeholder="Generado por" disabled />
						</td>
						<td>
						</td>
					</tr>
					
					<tr>	
						<td> REPORTADO POR: </td>
						<td> 
							<form> 
								<select name="reportado_por" onchange='activar_campo_reportado_por(this.value);'>
									<option value="0"> Selecciona una opción: </option>
									<option value="ALBERTO ROMO"> ALBERTO ROMO </option>
									<option value="ANGELICA HERNANDEZ"> ANGELICA HERNANDEZ </option>;
									<option value="BALVANEDO GARCIA"> BALVANEDO GARCIA </option>
									<option value="IZACK GOLDBAUM"> IZACK GOLDBAUM </option>
									<option value="JORGE RODRIGUEZ">  JORGE RODRIGUEZ </option>
									<option value="KARLOS JIMENEZ"> KARLOS JIMENEZ </option>
									<option value="MATEO SANDOVAL"> MATEO SANDOVAL </option>
									<option value="MAURILIO AVALOS"> MAURILIO AVALOS </option>
									<option value="OLIMPIA DOMINGUEZ"> OLIMPIA DOMINGUEZ </option>
									<option value="RUBEN VALDEZ"> RUBEN VALDEZ </option>
									<option value="SANDRO ORDAZ"> SANDRO ORDAZ </option>
									<option value="YADIRA HUERTA"> YADIRA HUERTA </option>
									<option value="OTRO"> OTRO </option>
								</td>
								<td colspan="2">
								</select> Otro: <input type="text" name="reportado_otro" id="reportado_otro" class="input_ncpr" placeholder="Reportado por" disabled />
							</form>
						</td>
						<td>
						</td>
					</tr>
					
					<tr>
						<td> NUMERO DE ORDEN: </td>
						<td><input type="text" name="orden" class="input_ncpr" required="true" title="El campo no puede estar vacio." placeholder="Número de orden" /></td>
						<td>
						</td>
						<td>
						</td>
					</tr>

					<tr>
						<td> NUMERO DE PARTE: </td>
						<td> <input type="text" name="parte" class="input_ncpr" required="true" title="El campo no puede estar vacio." placeholder="Número de parte" /></td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					
					<tr>
						<td> DESCRIPCION DEL PRODUCTO O PARTE: </td>
						<td> <input type="text" name="descripcionparte" class="input_ncpr" required="true" title="El campo no puede estar vacio." placeholder="Descripción del producto o parte" /></td>
						<td>
						</td>
						<td>
						</td>
					</tr>
										
					<tr>
						<td> NUMERO DE PIEZAS EN LA ORDEN: </td>
						<td> <input type="number" name="piezasorden" min="1" class="input_ncpr" required="true" title="El campo no puede estar vacio." placeholder="Número de piezas en la orden" /></td>
						<td>
						</td>
						<td>
						</td>
					</tr>	
					
					<tr>
						<td> NUMERO DE PIEZAS RECHAZADAS: </td>
						<td> <input type="number" name="piezasrechazadas" min="1" class="input_ncpr" required="true" title="El campo no puede estar vacio." placeholder="Número de piezas rechazadas" /></td>
						<td>
						</td>
						<td>
						</td>
					</tr>						
					
					<tr>
						<td> NOMBRE DEL PROVEEDOR: </td>
						<td>
							<select name="proveedor">
								<option values="0"> Selecciona una opción:</option>
								<option value="ACCUTITE"> ACCUTITE </option>
								<option value="ACME"> ACME </option>
								<option value="ADAMS CAMPBELL"> ADMAS CAMPBELL </option>
								<option value="ADVANCE"> ADVANCE </option>
								<option value="ALANOD"> ALANOD </option>
								<option value="ALBRIGHT LIGHTING PLASTICS"> ALBRIGHT LIGHTING PLASTICS</option>
								<option value="ALLEN PKG"> ALLEN PKG</option>
								<option value="ALP LIGHTING COMPONENTS"> ALP LIGHTING COMPONENT</option>
								
								<option value="ALPHA CAST"> ALPHA CAST</option>
								<option value="AMERICAN DE ROSA"> AMERICAN DE ROSA</option>
								<option value="AMERICAN DIE CASTING, INC."> AMERICAN DIE CASTING, INC.</option>
								<option value="BENDER & WERTH"> BENDER & WERTH</option>
								<option value="BILL BROWN SALES"> BILL BROWN SALES</option>
								<option value="BODINE"> BODINE</option>
								<option value="BORRMAN"> BORRMAN</option>
								<option value="CAST AND ENG PRODUCTS"> CAST AND ENG PRODUCTS</option>
								
								<option value="CIRCLE BOLT"> CIRCLE BOLT</option>
								<option value="CIRCLE METAL SALES"> CIRCLE METAL SALES</option>
								<option value="COAST"> COAST</option>
								<option value="CREST"> CREST</option>
								<option value="DELTECH"> DELTECH</option>
								<option value="ELECTROMARK"> ELECTROMARK</option>
								<option value="EUGINO"> EUGINO</option>
								<option value="EXERGY"> EXERGY</option>
								
								<option value="FORMED"> FORMED</option>
								<option value="FULHAM"> FULHAM</option>
								<option value="FUSES UNLIMITED"> FUSES UNLIMITED</option>
								<option value="FUTURE"> FUTURE</option>
								<option value="G.E."> G.E.</option>
								<option value="GILLINDER"> GILLINDER</option>
								<option value="GINO SHEET METAL"> GINO SHEET METAL</option>
								<option value="GOOD IDEAS"> GOOD IDEAS</option>
								
								<option value="GRANDLITE"> GRANDLITE</option>
								<option value="H & M FOUNDRY"> H & M FOUNDRY</option>
								<option value="HOPKINS"> HOPKINS</option>
								<option value="IFSCO"> IFSCO</option>
								<option value="INDUSTRIAL GLASS"> INDUSTRIAL GLASS</option>
								<option value="INNOVATION"> INNOVATION</option>
								<option value="INVENTRONICS"> INVENTRONICS</option>
								<option value="J.V.'S MACHINE SHOP"> J.V.'S MACHINE SHOP</option>
								
								<option value="KEN-MAC METALS"> KEN-MAC METALS</option>
								<option value="KLENITUS"> KLENITUS</option>
								<option value="KOPP"> KOPP</option>
								<option value="LENDAR DESIGN INC."> LENDAR DESIGN INC.</option>
								<option value="LEVITON"> LEVITON</option>
								<option value="LEXALITE"> LEXALITE</option>
								<option value="MC MASTER"> MC MASTER</option>
								<option value="METAL POLE"> METAL POLE</option>
								
								<option value="MEYER"> MEYER</option>
								<option value="NICHIA"> NICHIA</option>
								<option value="OMEGA LEADS"> OMEGA LEADS</option>
								<option value="ONLINE ELECTRONICS"> ONLINE ELECTRONICS</option>
								<option value="PACIFIC DIE"> PACIFIC DIE</option>
								<option value="PAX"> PAX</option>
								<option value="PENDANT SYSTEM"> PENDANT SYSTEM</option>
								<option value="PHILLIPS"> PHILLIPS</option>
								
								<option value="PLASTIC DEPOT"> PLASTIC DEPOT</option>
								<option value="POLYMER"> POLYMER</option>
								<option value="PRECISION"> PRECISION</option>
								<option value="QL COMPANY"> QL COMPANY</option>
								<option value="QSSI"> QSSI</option>
								<option value="RIDOUT PLASTICS"> RIDOUT PLASTICS</option>
								<option value="SABIC"> SABIC</option>
								<option value="SAEHAN ELECTRONICS"> SAEHAN ELECTRONICS</option>
								
								<option value="SAPA"> SAPA</option>
								<option value="SERTEC"> SERTEC</option>
								<option value="SINCLAIR GLASS"> SINCLAIR GLASS</option>
								<option value="SING WELDING"> SING WELDING</option>
								<option value="STANDARD LIGHTING"> STANDARD LIGHTING</option>
								<option value="SYLVANIA"> SYLVANIA</option>
								<option value="TEMPWERKS"> TEMPWERKS</option>
								<option value="TEXMEX"> TEXMEX</option>
								
								<option value="THOMAS RESEARCH PRODUCTS"> THOMAS RESEARCH PRODUCTS</option>
								<option value="TOTTEN"> TOTTEN</option>
								<option value="TRANS-PACIFIC"> TRANS-PACIFIC</option>
								<option value="TUBE SER"> TUBE SER</option>
								<option value="TUBULAR"> TUBULAR</option>
								<option value="UNIVERSAL"> UNIVERSAL</option>
								<option value="VENTURE"> VENTURE</option>
								<option value="VIRTICUS"> VIRTICUS</option>
								
								<option value="WAGO"> WAGO</option>
								<option value="WEST MARINE "> WEST MARINE </option>
								<option value="N/A"> N/A</option>
							</select>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					
					<tr>
						<td> FECHA DE ENVIO: </td>
						<td> <input type="text" name="fechaenvio" id="fechaenvio" class="input_ncpr" required="true" title="El campo no puede estar vacio." placeholder="dd-mm-aaa" /></td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
										
					<tr>	
						<td> TURNO: </td>
						<td>
							<select name="turno">
								<option value="0"> Selecciona una opción: </option>
								<option value="PRIMER TURNO / 1ST SHIFT"> MATUTINO </option>
								<option value="SEGUNDO TURNO / 2ND SHIFT"> VESPERTINO </option>;
							</select> 
						</td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					
					<tr>
						<td> ORIGEN DE LA NO CONFORMIDAD Y RAZON DE RECHAZO: </td>
						<td> 
							<form> 
								<p> 
									<select id='select1'onchange='cargarSelect2(this.value);'> 
										<option value='0'> Selecciona una opción </option> 
										<option value='ACCESS'> [ACCESS] - ACCESORIOS </option> 
										<option value='ALMDR'> [ALMDR] - FAB AL PERFORADO </option> 
										<option value='ALMGR'> [ALMGR] - FAB AL PULIDO </option> 
										<option value='ALMWL'> [ALMWL] - FAB AL SOLDADURA </option> 
									
										<option value='CNC01'> [CNC01] - CNC </option> 
										<option value='DCAST'> [DCAST] - DIE CASTING </option> 
										<option value='FASSY'> [FASSY] - ENSAMBLE FINAL </option> 
										<option value='FNDRY'> [FNDRY] - FUNDICION </option> 
										
										<option value='LEDAS'> [LEDAS] - ENSAMBLE LED </option> 
										<option value='OPASS'> [OPASS] - ENSAMBLE REFLECTORES </option> 
										<option value='PCBCR'> [PCBNR] - PCB CUARTO LIMPIO </option> 
										<option value='PINRD'> [PINRD] - INYECCION PLASTICO RD </option> 
										
										<option value='PCOAT'> [PCOAT] - PINTURA </option> 
										<option value='SMTRD'> [SMTRD] - CUARTO SMT (RD) </option> 
										<option value='SPNNG'> [SPNNG] - SPINNING </option> 
										<option value='STLFB'> [STLFB] - FABRICACION ACERO </option> 
										
										<option value='SPEXT'> [SPEXT] - PROVEEDOR (EXTERNO) </option> 
										<option value='WHSRE'> [WHSRE] - ALMACEN </option> 
									</select> 
									<input name="origen_codigo" id="origen_codigo" hidden/>
								</p> 
							</form> 
						</td>
						<td>
							<select id='select2' onchange='seleccinado_select2();' disabled> 
								<option value='0'>Selecciona una opción</option> 
							</select> 
								
						</td>
						<td>
							<input type="text" name="origenotro" id="origenotro" class="input_ncpr" placeholder="Razon de rechazo" required />
						</td>
					</tr>

					<tr>
						<td> DESCRIPCION DE LA FALLA REPORTADA: </td>
						<td colspan="3"> <textarea rows="2" name="descripcionfalla" title="El campo no puede estar vacio." placeholder="Descripción de la falla reportada" required></textarea></td>

					</tr>					
					
					<tr>
						<td> LOCALIZACION DEL DEFECTO:</td>
						<td>
							<form> 
								<select name="localiza_defecto" onchange='activar_campo_localiza_defecto(this.value);'>
									<option value="0"> Selecciona una opción: </option>
									<option value="SPROC"> [SPROC] - INSPECCION AL INICIO DEL PROCESO </option>
									<option value="IPROC"> [IPROC] - DURANTE EL PROCESO </option>
									<option value="EPROC"> [EPROC] - INSPECCION AL FINAL DEL PROCESO </option>
									<option value="WHSRE"> [WHSRE] - ALMACEN (EN INVENTARIO) </option>
									<option value="INCOM"> [INCOM] - INSPECCION DE RECIBOS </option>
									<option value="SHIPG"> [SHIPG] - EMBARQUES </option>
									<option value="THR01"> [THR01] - OTRO </option>
								</select> 
							</form>
						</td>
						<td>
						Otro: <input type="text" name="localiza_defecto_otro" id="localiza_defecto_otro" class="input_ncpr" placeholder="Localización del defecto" disabled />
						</td>
						<td>
						</td>
					</tr>
					
					
					<tr>
						<td> DISPOSICION DEL DEFECTO:</td>
						<td>
							<form> 
								<select name="disposicion" onchange='activar_campo_disposicion(this.value);'>
									<option value="0" > Selecciona una opción: </option>
									<option value="SCRAP"> [SCRAP] - DESECHAR (SCRAP) </option>
									<option value="RT2RD"> [RT2RD] - REGRESAR A RANCHO DOMINGUEZ </option>
									<option value="RT2VD"> [TR2VD] - REGRESAR A PROVEEDOR (EXTERNO) </option>
									<option value="USEAI"> [USEAI] - USAR COMO ESTA </option>
									<option value="REWRK"> [REWRK] - RE-TRABAJAR </option>
									<option value="SRTQA"> [SRTQA] - SEPARAR </option>
									<option value="TBDQA"> [TBDQA] - POR DEFINIR (QA) </option>
									<option value="THR02"> [THR02] - OTRO </option>
								</select>
							</form>
				 		</td>
						<td>
						Otro: <input type="text" name="disposicion_otro" id="disposicion_otro" class="input_ncpr" placeholder="Disposición del defecto" disabled />
						</td>
						<td>
						</td>
					</tr>
					
					<tr>
						<td> ARCHIVO FOTOGRAFICO: </td>
						<td>
							<input type="file" name="foto1" id="foto1" ><br><br>
							
							
				 		</td>
						<td>
							<input type="file" name="foto2" id="foto2" ><br><br>
						</td>
						<td>
							<input type="file" name="foto3" id="foto3" ><br><br>
						</td>
					</tr>

					<tr>
						<td> DESTINO DEL REPORTE DE NO CONFORMIDAD: </td>
						<td>
							<select name="Destino">
								<option> Selecciona una opción: </option>
								<option value="MEXICO"> MEXICO </option>
								<option value="RD"> RD </option>;
							</select> 
							
				 		</td>
						<td>
							
						</td>
						<td>
							
						</td>
					</tr>
				</table>
				</div>
				
				<br>
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