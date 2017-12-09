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
            function cargarSelect2(valor) {
                 var arrayValores=new Array(
                    new Array("ACCES", "AC001", "AC001 - COMPONENTE INCORRECTO"), 
                    new Array("ACCES", "AC002", "AC002 - PRODUCTO DAÑADO"),
                    new Array("ACCES", "AC003", "AC003 - PRODUCTO INCOMPLETO"),
                    new Array("ACCES", "AC004", "AC004 - DISCREPANCIA EN CANTIDAD"),
                    new Array("ACCES", "AC005", "AC005 - ERROR EN MARCAJE"),
					new Array("ACCES", "AC006", "AC006 - OTRO (ESPECIFICAR)"),
                    new Array("ALMDR",  "AD001", "AD001 - PERFORACION FUERA DE ESPECIFICACION"),
                    new Array("ALMDR",  "AD002", "AD002 - PERFORACION O PROVISION EXTRA"),
					new Array("ALMDR",  "AD003", "AD003 - PERFORACION O PROVISION FALTANTE"),
					new Array("ALMDR",  "AD004", "AD004 - ROSCA DAÑADA"),
                    new Array("ALMDR",  "AD005", "AD005 - OTRO (ESPECIFICAR)"),
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
					new Array("FASSY",  "FA015", "FA015 - TORNILLO BARRIDO"),
					new Array("FASSY",  "FA016", "FA016 - TORNILLO CAPADO"),
					new Array("FASSY",  "FA017", "FA017 - MOTION SENSOR DAÑADO"),
					new Array("FASSY",  "FA018", "FA018 - PERFORACION DAÑADA"),
					new Array("FASSY",  "FA019", "FA019 - BALASTRO DAÑADO"),
					new Array("FASSY",  "FA020", "FA020 - SURGE PROTECTOR DAÑADO"),
					new Array("FASSY",  "FA021", "FA021 - VIDRIO/ACRILICO DAÑADO"),
					new Array("FASSY",  "FA022", "FA022 - VIDRIO/ACRILICO FUERA DE ESPECIFICACION"),
					new Array("FASSY",  "FA023", "FA023 - OTRO (ESPECIFICAR)"),
                    new Array("FNDRY",  "FO001", "FO001 - POROSIDAD"),
                    new Array("FNDRY",  "FO002", "FO002 - DEFORMACION"),
					new Array("FNDRY",  "FO003", "FO003 - OTRO (ESPECIFICAR)"),
                    new Array("LEDAS",  "LD001", "LD001 - FALLA EN PRUEBA FUNCIONAL"),
                    new Array("LEDAS",  "LD002", "LD002 - COMPONENTE INCORRECTO"),
                    new Array("LEDAS",  "LD003", "LD003 - COMPONENTE FALTANTE"),
                    new Array("LEDAS",  "LD004", "LD004 - DAÑO EN CABLES"),
                    new Array("LEDAS",  "LD005", "LD005 - PRODUCTO DAÑADO"),
                    new Array("LEDAS",  "LD006", "LD006 - COMPONENTE DAÑADO"),
					new Array("LEDAS",  "LD007", "LD007 - DESPRENDIMIENTO DE PISTA"),
					new Array("LEDAS",  "LD008", "LD008 - DEFECTO EN SOLDADO"),
					new Array("LEDAS",  "LD009", "LD009 - DESALINEACION DE CLUSTER/LENS"),
					new Array("LEDAS",  "LD010", "LD010 - GASKET EQUIVOCADO"),
					new Array("LEDAS",  "LD011", "LD011 - CLUSTER/LENS EQUIVOCADO"),
					new Array("LEDAS",  "LD012", "LD012 - PCB EQUIVOCADO"),
					new Array("LEDAS",  "LD013", "LD013 - DIODO DAÑADO DURANTE ENSAMBLAJE"),
					new Array("LEDAS",  "LD014", "LD014 - CLUSTER DAÑADO DURANTE ENSAMBLAJE"),
					new Array("LEDAS",  "LD015", "LD015 - OTRO (ESPECIFICAR)"),
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
					new Array("PCOAT",  "PC016", "PC016 - RESIDUO DE MASKING O CINTA ADHESIVA"),
					new Array("PCOAT",  "PC017", "PC017 - SUB CURADO"),
					new Array("PCOAT",  "PC018", "PC018 - OTRO (ESPECIFICAR)"),
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
                 	document.getElementById("origen_otro").disabled=true; 
               		document.getElementById("origen_otro").value="";
            	} 
            } 
            /** * Una vez selecciona una valor del segundo selecte, obtenemos la información * de los dos selects y la mostramos */
            function seleccinado_select2(value)
           	{
                var v2 = document.getElementById("select2"); //Seleccionamos el id del select2
                var valor2 = v2.options[v2.selectedIndex].value; 
                
                document.getElementById("origen_codigo").value=valor2; // Guardamos el código obtenido en el input con id="origen_codigo"

                if(valor2=="AC006" || valor2=="AD005" || valor2=="AG003" || valor2=="AW006" || valor2=="CN004" || valor2=="DC004" || valor2=="FA023" || valor2=="FO003" || valor2=="LD015" || valor2=="OP008" || valor2=="CR012" || valor2=="PI006" || valor2=="PC018" || valor2=="SM006" || valor2=="SP005" || valor2=="ST010" || valor2=="SE006" || valor2=="WH006")
                	document.getElementById("origen_otro").disabled=false; 
               	else
               	{
               		document.getElementById("origen_otro").disabled=true; 
               		document.getElementById("origen_otro").value="";
               	}

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
			
			function activar_campo_areadept(valor) 
            {
               	if(valor!="THR03")
               	{
	                document.getElementById("areadeptdeteccion_otro").disabled=true; 
	               	document.getElementById("areadeptdeteccion_otro").value="";
               	}
	           	else
	           		document.getElementById("areadeptdeteccion_otro").disabled=false;
            }

            function activar_campo_fechaenvio(checkbox) 
            {
               	if(checkbox.checked)
               	{
	                document.getElementById("fechaenvio").disabled=true;
	                document.getElementById("fechaenvio").value="";
               	}
               	else
               	{
	           		document.getElementById("fechaenvio").disabled=false;
	               	document.getElementById("fechaenvio").value="";
	            }
            }
        </script>
	</head>
	
	<body>
		<div id="contenedor">
			<?php 
				include_once("menu.php");
			?>
			
			<h1> ALTA DE NCPR </h1>
			
			<form action="./libraries/procesarAltaNcpr2.php" method="post" name="datos" enctype="multipart/form-data" .disabled=true;>
				<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
					<tr>	
						<td width="300"> GENERADO POR: </td>
						<td>
							<input type="text" name="generado_por" id="generado_por" class="input_ncpr" value='<?php echo "$_SESSION[nombre]"; ?>' disabled />
						</td>
						
					</tr>
					
					<tr>	
						<td> REPORTADO POR: </td>
						<td> 
							<select name="reportado_por" onchange='activar_campo_reportado_por(this.value);' required>
								<option value=""> Selecciona una opción: </option>
								<option value="AGUIRRE DANIEL"> AGUIRRE DANIEL </option>
								<option value="ALAVEZ PEREZ CYNTHIA"> ALAVEZ PEREZ CYNTHIA </option>;
								<option value="AMEZQUITA HUGO">AMEZQUITA HUGO</option>
								<option value="ANDRADE GUADALUPE"> ANDRADE GUADALUPE </option>
								<option value="AVALOS MAURILIO"> AVALOS MAURILIO</option>
								<option value="AVILA JUAN">AVILA JUAN</option>
								<option value="AVILEZ MIRIAM">AVILEZ MIRIAM</option>
								<option value="CARVAJAL XAVIER"> CARVAJAL XAVIER</option>
								<option value="CORRAL ALEJANDRO">CORRAL ALEJANDRO </option>
								<option value="DESALES HUGO">DESALES HUGO</option>
								<option value="DIAZ HECTOR"> DIAZ HECTOR </option>
								<option value="FARIAS MITZY">FARIAS MITZY</option>
								<option value="FREGOSO ANA">FREGOSO ANA</option>
								<option value="GARCIA BALVANEDO">GARCIA BALVANEDO</option>
								<option value="GARCIA ANA">GARCIA ANA</option>
								<option value="GARCIA REBECA">GARCIA REBECA</option>
								<option value="GONZALEZ ERIEL">GONZALEZ ERIEL</option>
								<option value="GONZALEZ ANTONIO">GONZALEZ ANTONIO</option>
								<option value="GONZALEZ CARLOS">GONZALEZ CARLOS</option>
								<option value="GONZALEZ FRANCISCO ALAN ">GONZALEZ FRANCISCO ALAN</option>
								<option value="HERMOSILLO ALAN JAHIR">HERMOSILLO ALAN JAHIR</option>
								<option value="HERNANDEZ ANGELICA">HERNANDEZ ANGELICA </option>
								<option value="HERNANDEZ RODOLFO">HERNANDEZ RODOLFO </option>
								<option value="JIMENEZ KARLOS">JIMENEZ KARLOS</option>
								<option value="LOPEZ REYES JASMIN ">LOPEZ REYES JASMIN</option>
								<option value="LUCERO JESUS">LUCERO JESUS</option>
								<option value="LUGO SION ">LUGO SION</option>
								<option value="MARQUEZ GRABRIELA">MARQUEZ GABRIELA</option>
								<option value="MARTINEZ FRANCISCO">MARTINEZ FRANCISCO </option>
								<option value="MEZA BRIAN">MEZA BRIAN</option>
								<option value="MORENO GRISELDA">MORENO GRISELDA</option>
								<option value="ORDAZ SANDRO">ORDAZ SANDRO</option>
								<option value="RAMIREZ MACIAS AGUSTIN ">RAMIREZ MACIAS AGUSTIN</option>
								<option value="REYES VENEGAS JOSE">REYES VENEGAS JOSE</option>
								<option value="RITCHIE SANDY">RITCHIE SANDY </option>
								<option value="RODRIGUEZ VARGAS DANIEL ">RODRIGUEZ VARGAS DANIEL</option>
								<option value="ROMO ALBERTO">ROMO ALBERTO</option>
								<option value="ROSALES YOANIA">ROSALES YOANIA</option>
								<option value="GOLDBAUM IZACK">GOLDBAUM IZACK</option>
								<option value="SANCHEZ ARACELI">SANCHEZ ARACELI</option>
								<option value="SANCHEZ HUGO">SANCHEZ HUGO</option>
								<option value="SANCHEZ BLANCA">SANCHEZ BLANCA</option>
								<option value="SERRANO JAAZIEL">SERRANO JAAZIEL</option>
								<option value="SOLANO GUADALUPE">SOLANO GUADALUPE</option>
								<option value="SOLIS CRISTINA">SOLIS CRISTINA</option>
								<option value="VALDEZ CARDENAS RENE">VALDEZ CARDENAS RENE</option>
								<option value="VALDEZ GALVEZ JOSE">VALDEZ GALVEZ JOSE</option>
								<option value="VALDEZ RUBEN">VALDEZ RUBEN</option>
								<option value="VALLE FLAVIO">VALLE FLAVIO</option>
								<option value="VASQUEZ ESTEFANIA">VASQUEZ ESTEFANIA</option>
								<option value="VICTORIO ANA VALERIA">VICTORIO ANA VALERIA</option>
								<option value="VILLAREAL OSCAR">VILLAREAL OSCAR</option>
								<option value="ZAZUETA JESUS">ZAZUETA JESUS</option>
								<option value="ZERMEÑO FERNANDO">ZERMEÑO FERNANDO</option>
							</td>
							
					</tr>
					
					<tr>
						<td> NUMERO DE JOB: </td>
						<td><input type="text" name="orden" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Número de job" required /></td>
						
					</tr>

					<tr>
						<td> NUMERO DE PARTE: </td>
						<td> <input type="text" name="parte" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Número de parte" required /></td>
						
					</tr>
					
					<tr>
						<td> DESCRIPCION DEL PRODUCTO O PARTE:</td>
						<td> <input type="text" name="descripcionparte" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Descripción del producto o parte" required /></td>
						
					</tr>
										
					<tr>
						<td> NUMERO DE PIEZAS EN LA ORDEN: </td>
						<td> <input type="number" name="piezasorden" min="1" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Número de piezas en la orden" required /></td>
						
					</tr>	
										
					<tr>
						<td> NUMERO DE PIEZAS RECHAZADAS: </td>
						<td> <input type="number" name="piezasrechazadas" min="1" class="input_ncpr" title="El campo no puede estar vacio." placeholder="Número de piezas rechazadas" required /></td>
						
					</tr>						
					
										
					<tr>	
						<td> TURNO: </td>
						<td>
							<select name="turno" required>
								<option value=""> Selecciona una opción: </option>
								<option value="PRIMER TURNO / 1ST SHIFT"> MATUTINO </option>
								<option value="SEGUNDO TURNO / 2ND SHIFT"> VESPERTINO </option>
							</select> 
						</td>
						
					</tr>
			</table>

			<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
					<tr>
						<td width="300" > NOMBRE DEL PROVEEDOR:</td>
						<td>
							<select name="proveedor" required>
								<option value=""> Selecciona una opción: </option>
								<option value="3-D STEEL SERVICES">3-D STEEL SERVICES</option>
								<option value="3D SYSTEMS, INC">3D SYSTEMS, INC</option>
								<option value="A & K COMPLETE TRUCK REPAIR">A & K COMPLETE TRUCK REPAIR</option>
								<option value="A & M CNC MACHINE REPAIR & SERVICE">A & M CNC MACHINE REPAIR & SERVICE</option>
								<option value="A M LASALLE ELECTRIC, INC.">A M LASALLE ELECTRIC, INC.</option>
								<option value="A TO Z SHEET METAL">A TO Z SHEET METAL</option>
								<option value="A-1 ENGRAVING CO., INC">A-1 ENGRAVING CO., INC</option>
								<option value="A.G.E. ELECTRICAL CONTRACTORS">A.G.E. ELECTRICAL CONTRACTORS</option>
								<option value="A.J. TORSION SPRING & STAMPING MFG">A.J. TORSION SPRING & STAMPING MFG</option>
								<option value="A.L.P. LIGHTING COMPONENTS INC">A.L.P. LIGHTING COMPONENTS INC</option>
								<option value="A.M. PALLETS CO">A.M. PALLETS CO</option>
								<option value="AARD SPRING & STAMPING">AARD SPRING & STAMPING</option>
								<option value="AB SANDBLAST">AB SANDBLAST</option>
								<option value="ABACUS TRUCK LINE 1948 LTD">ABACUS TRUCK LINE 1948 LTD</option>
								<option value="ABC SHEET METAL">ABC SHEET METAL</option>
								<option value="ABCO SCALE INC.">ABCO SCALE INC.</option>
								<option value="ABF FREIGHT SYSTEM, INC.">ABF FREIGHT SYSTEM, INC.</option>
								<option value="ABOVE ALL PHOTOGRAPHY, LTD">ABOVE ALL PHOTOGRAPHY, LTD</option>
								<option value="ABOVE BOARD ELECTRONICS">ABOVE BOARD ELECTRONICS</option>
								<option value="AC ELECTRIC, INC">AC ELECTRIC, INC</option>
								<option value="AC POWER SYSTEMS">AC POWER SYSTEMS</option>
								<option value="ACCESS BUSINESS COMMUNICATIONS INC">ACCESS BUSINESS COMMUNICATIONS INC</option>
								<option value="ACCESS ELECTRICAL & LIGHTING">ACCESS ELECTRICAL & LIGHTING</option>
								<option value="ACCESS LIGHTING">ACCESS LIGHTING</option>
								<option value="ACCO ENGINEERED SYSTEMS">ACCO ENGINEERED SYSTEMS</option>
								<option value="ACCURATE AIR ENGINEERING, INC.">ACCURATE AIR ENGINEERING, INC.</option>
								<option value="ACCURATE ALLOYS">ACCURATE ALLOYS</option>
								<option value="ACCURATE STEEL TREATING, INC">ACCURATE STEEL TREATING, INC</option>
								<option value="ACCURATE STRIPING CO. INC.">ACCURATE STRIPING CO. INC.</option>
								<option value="ACCUTITE FASTENERS">ACCUTITE FASTENERS</option>
								<option value="ACE ELECTRIC INC.">ACE ELECTRIC INC.</option>
								<option value="ACEROS OCOTLAN SA">ACEROS OCOTLAN SA</option>
								<option value="ACESSO/AUREA PONTE DELGADO">ACESSO/AUREA PONTE DELGADO</option>
								<option value="ACF COMPONENTS">ACF COMPONENTS</option>
								<option value="ACME METALS & STEEL SUPPLY">ACME METALS & STEEL SUPPLY</option>
								<option value="ACRILEX INC">ACRILEX INC</option>
								<option value="ACT">ACT</option>
								<option value="ACTION MEDIA TECHNOLOGIES, INC">ACTION MEDIA TECHNOLOGIES, INC</option>
								<option value="ACUITY BRANDS LIGHTING, INC">ACUITY BRANDS LIGHTING, INC</option>
								<option value="ADAMS CAMPBELL CO">ADAMS CAMPBELL CO</option>
								<option value="ADAMS ELECTRIC, INC">ADAMS ELECTRIC, INC</option>
								<option value="ADAN RUBIO N.">ADAN RUBIO N.</option>
								<option value="ADAPTIVE ENERGY SYSTEMS">ADAPTIVE ENERGY SYSTEMS</option>
								<option value="ADELAIDO MARTINEZ RAMIREZ">ADELAIDO MARTINEZ RAMIREZ</option>
								<option value="ADMIN. GENERAL DE ADUANAS">ADMIN. GENERAL DE ADUANAS</option>
								<option value="ADRIAN MONTOYA">ADRIAN MONTOYA</option>
								<option value="ADRIANA THOMPSON ABURTO">ADRIANA THOMPSON ABURTO</option>
								<option value="ADVANCE">ADVANCE</option>
								<option value="ADVANCE CERAMICS & CRUCIBLE">ADVANCE CERAMICS & CRUCIBLE</option>
								<option value="ADVANCED ELECTRICAL SOLUTIONS, INC.">ADVANCED ELECTRICAL SOLUTIONS, INC.</option>
								<option value="ADVANCED PURE WATER SOLUTIONS">ADVANCED PURE WATER SOLUTIONS</option>
								<option value="ADVANCED WELDER REPAIR">ADVANCED WELDER REPAIR</option>
								<option value="ADVANEX AMERICAS, INC">ADVANEX AMERICAS, INC</option>
								<option value="ADVANTAGE DIST., LLC">ADVANTAGE DIST., LLC</option>
								<option value="ADVANTAGE LIGHTING SOLUTIONS - WT">ADVANTAGE LIGHTING SOLUTIONS - WT</option>
								<option value="AEG SOLUTIONS">AEG SOLUTIONS</option>
								<option value="AERO ELECTRIC, INC.">AERO ELECTRIC, INC.</option>
								<option value="AERODYNAMIC PLATING CO INC">AERODYNAMIC PLATING CO INC</option>
								<option value="AFFORDABLE - SOLAR">AFFORDABLE - SOLAR</option>
								<option value="AFLAC">AFLAC</option>
								<option value="AGENCIA ADUANAL OBREGON">AGENCIA ADUANAL OBREGON</option>
								<option value="AIDA GARCIA ORTEGA">AIDA GARCIA ORTEGA</option>
								<option value="AIRGAS USA, LLC">AIRGAS USA, LLC</option>
								<option value="AIRGOUP EXPRESS">AIRGOUP EXPRESS</option>
								<option value="AKINS BEE REMOVAL">AKINS BEE REMOVAL</option>
								<option value="AKRON FOUNDRY COMPANY">AKRON FOUNDRY COMPANY</option>
								<option value="AKZONOBEL COATINGS, INC">AKZONOBEL COATINGS, INC</option>
								<option value="ALA, LLC.">ALA, LLC.</option>
								<option value="ALACIEL MURILLO LOPEZ">ALACIEL MURILLO LOPEZ</option>
								<option value="ALAN OLICK GENERAL PLATING">ALAN OLICK GENERAL PLATING</option>
								<option value="ALAN ZAMUDIO">ALAN ZAMUDIO</option>
								<option value="ALANOD ALUMINUM">ALANOD ALUMINUM</option>
								<option value="ALBATROSS USA INC">ALBATROSS USA INC</option>
								<option value="ALBERTO CASTELLANOS RUIZ">ALBERTO CASTELLANOS RUIZ</option>
								<option value="ALBERTO GUZMAN JIMENEZ">ALBERTO GUZMAN JIMENEZ</option>
								<option value="ALBERTO SOLIS">ALBERTO SOLIS</option>
								<option value="ALBRIGHT LIGHTING PLASTICS">ALBRIGHT LIGHTING PLASTICS</option>
								<option value="ALCAST">ALCAST</option>
								<option value="ALEENAH VALDEZ">ALEENAH VALDEZ</option>
								<option value="ALEJANDRA NAVARRO R">ALEJANDRA NAVARRO R</option>
								<option value="ALEJANDRO ARECHIGA LOPEZ">ALEJANDRO ARECHIGA LOPEZ</option>
								<option value="ALEJANDRO OSUNA ESTRADA">ALEJANDRO OSUNA ESTRADA</option>
								<option value="ALEJANDRO PALACIOS PEREZ">ALEJANDRO PALACIOS PEREZ</option>
								<option value="ALEJANDRO QUEZADA RANGEL">ALEJANDRO QUEZADA RANGEL</option>
								<option value="ALEXANDER ISINHUE">ALEXANDER ISINHUE</option>
								<option value="ALFONSO GARCIA MENDOZA">ALFONSO GARCIA MENDOZA</option>
								<option value="ALFONSO VASQUEZ">ALFONSO VASQUEZ</option>
								<option value="ALL BLACK COMPANY">ALL BLACK COMPANY</option>
								<option value="ALL CITY ELECTRIC">ALL CITY ELECTRIC</option>
								<option value="ALL SAFETY SUPPLIES">ALL SAFETY SUPPLIES</option>
								<option value="ALL-PRO BLDG. SERVICES">ALL-PRO BLDG. SERVICES</option>
								<option value="ALL-WEST FASTENERS, INC.">ALL-WEST FASTENERS, INC.</option>
								<option value="ALLEGRA PRINT & IMAGING">ALLEGRA PRINT & IMAGING</option>
								<option value="ALLEN PACKAGING COMPANY">ALLEN PACKAGING COMPANY</option>
								<option value="ALLEYBRIGHT LIGHTING">ALLEYBRIGHT LIGHTING</option>
								<option value="ALLIANCE METAL (DIANE)">ALLIANCE METAL (DIANE)</option>
								<option value="ALLIANCE RECEIVABLES MANAGEMENT, INC.">ALLIANCE RECEIVABLES MANAGEMENT, INC.</option>
								<option value="ALLIED ELECTRONICS">ALLIED ELECTRONICS</option>
								<option value="ALLIED LIGHTING SYSTEMS, INC.">ALLIED LIGHTING SYSTEMS, INC.</option>
								<option value="ALLIED POWDER COATING">ALLIED POWDER COATING</option>
								<option value="ALLIED WIRE & CABLE, INC">ALLIED WIRE & CABLE, INC</option>
								<option value="ALLOY MACHINING SERVICES, INC">ALLOY MACHINING SERVICES, INC</option>
								<option value="ALLPORT PACKING CORPORATION">ALLPORT PACKING CORPORATION</option>
								<option value="ALLY">ALLY</option>
								<option value="ALLY ENERGY SOLUTIONS, LLC">ALLY ENERGY SOLUTIONS, LLC</option>
								<option value="ALMADEN PRESS, INC">ALMADEN PRESS, INC</option>
								<option value="ALOHA FREIGHT FORWARDERS">ALOHA FREIGHT FORWARDERS</option>
								<option value="ALP">ALP</option>
								<option value="ALPHA ELECTRIC">ALPHA ELECTRIC</option>
								<option value="ALPHA SPRAY POWDER COATING">ALPHA SPRAY POWDER COATING</option>
								<option value="ALPHA WOLF PRECISION, INC.">ALPHA WOLF PRECISION, INC.</option>
								<option value="ALPHACAST FOUNDRY INC">ALPHACAST FOUNDRY INC</option>
								<option value="ALPINE ELECTRIC, LP">ALPINE ELECTRIC, LP</option>
								<option value="ALR  (AREA LIGHTING RESEARCH)">ALR  (AREA LIGHTING RESEARCH)</option>
								<option value="ALR / ASSOCIATED LIGHTING REPRESENTATIVES, INC">ALR / ASSOCIATED LIGHTING REPRESENTATIVES, INC</option>
								<option value="ALR OEM REP/CWHAINS">ALR OEM REP/CWHAINS</option>
								<option value="ALTERMAN, INC">ALTERMAN, INC</option>
								<option value="ALTP & ASSOCOCIATES">ALTP & ASSOCOCIATES</option>
								<option value="ALUMA-COAT">ALUMA-COAT</option>
								<option value="ALUMINIO DE BAJA CALI SA DE CV">ALUMINIO DE BAJA CALI SA DE CV</option>
								<option value="ALUMINUM COIL ANODIZING CORPORATION">ALUMINUM COIL ANODIZING CORPORATION</option>
								<option value="ALUMINUM SHAPES, INC">ALUMINUM SHAPES, INC</option>
								<option value="ALVAREZ AIR CONDITIONING">ALVAREZ AIR CONDITIONING</option>
								<option value="ALWINCO">ALWINCO</option>
								<option value="AM GRAPHICS">AM GRAPHICS</option>
								<option value="AM-MEX INTERNATIONAL">AM-MEX INTERNATIONAL</option>
								<option value="AMADA AMERICA">AMADA AMERICA</option>
								<option value="AMAZON.COM">AMAZON.COM</option>
								<option value="AMC COLORGRAFIX">AMC COLORGRAFIX</option>
								<option value="AMERESCO SOLAR, INC">AMERESCO SOLAR, INC</option>
								<option value="AMERICAN ANCHOR BOLT">AMERICAN ANCHOR BOLT</option>
								<option value="AMERICAN BOLT & SCREW">AMERICAN BOLT & SCREW</option>
								<option value="AMERICAN DIE CASTING INC">AMERICAN DIE CASTING INC</option>
								<option value="AMERICAN ELECTRIC, INC.">AMERICAN ELECTRIC, INC.</option>
								<option value="AMERICAN EXPRESS">AMERICAN EXPRESS</option>
								<option value="AMERICAN EXPRESS - VENDORS">AMERICAN EXPRESS - VENDORS</option>
								<option value="AMERICAN GENERAL LIFE INSURANCE COMPANY">AMERICAN GENERAL LIFE INSURANCE COMPANY</option>
								<option value="AMERICAN LOUVER">AMERICAN LOUVER</option>
								<option value="AMERICAN PUBLIC WORKS ASSOCIATION">AMERICAN PUBLIC WORKS ASSOCIATION</option>
								<option value="AMERICAN ULTRAVIOLET WEST INC">AMERICAN ULTRAVIOLET WEST INC</option>
								<option value="AMERICAN VACUUM COMPANY">AMERICAN VACUUM COMPANY</option>
								<option value="AMERICORP FINANCIAL, LLC">AMERICORP FINANCIAL, LLC</option>
								<option value="AMERIGAS">AMERIGAS</option>
								<option value="AMERON/CO: PACIFIC LIGHTING">AMERON/CO: PACIFIC LIGHTING</option>
								<option value="AMRIT KAY GILL">AMRIT KAY GILL</option>
								<option value="AMTEC">AMTEC</option>
								<option value="ANA MARINA NUZA P">ANA MARINA NUZA P</option>
								<option value="ANALOG TECHNOLOGY CORP.">ANALOG TECHNOLOGY CORP.</option>
								<option value="ANDERSON GLASS CO.">ANDERSON GLASS CO.</option>
								<option value="ANDOIZE- GEORGE INDUSTRIAL">ANDOIZE- GEORGE INDUSTRIAL</option>
								<option value="ANDRES ROMERO">ANDRES ROMERO</option>
								<option value="ANDREW ROBERTSON">ANDREW ROBERTSON</option>
								<option value="ANDY'S EXPRESS">ANDY'S EXPRESS</option>
								<option value="ANGEL SAAD SAID">ANGEL SAAD SAID</option>
								<option value="ANIXTER">ANIXTER</option>
								<option value="ANODIMEX DE MEXICO S DE RL DE">ANODIMEX DE MEXICO S DE RL DE</option>
								<option value="ANODIZE- ALUMA COAT">ANODIZE- ALUMA COAT</option>
								<option value="ANODIZING INDUSTRIES INC">ANODIZING INDUSTRIES INC</option>
								<option value="ANTHONY BOONE">ANTHONY BOONE</option>
								<option value="ANTHONY J PASSATORE">ANTHONY J PASSATORE</option>
								<option value="ANTIQUES, COLLECTIBLES & MORE">ANTIQUES, COLLECTIBLES & MORE</option>
								<option value="ANTONIO RODRIGUEZ GILES">ANTONIO RODRIGUEZ GILES</option>
								<option value="ANYTIME PRODUCTS">ANYTIME PRODUCTS</option>
								<option value="API ELECTRIC COMPANY">API ELECTRIC COMPANY</option>
								<option value="APPLEONE CERRITOS">APPLEONE CERRITOS</option>
								<option value="APPLIED ENERGY SOLUTIONS, INC.">APPLIED ENERGY SOLUTIONS, INC.</option>
								<option value="APPLIED POLYCHEM">APPLIED POLYCHEM</option>
								<option value="ARCHETECTIAL LIGHTING SYSTEMS">ARCHETECTIAL LIGHTING SYSTEMS</option>
								<option value="ARGO ELECTRIC SUPPLY">ARGO ELECTRIC SUPPLY</option>
								<option value="ARGO SPRING MANUFACTURING">ARGO SPRING MANUFACTURING</option>
								<option value="ARGUMEDO MENDIVIL LAURA VERONI">ARGUMEDO MENDIVIL LAURA VERONI</option>
								<option value="ARGYLE INDUSTRIES, INC.">ARGYLE INDUSTRIES, INC.</option>
								<option value="ARIANA CERVANTES GUERRERO">ARIANA CERVANTES GUERRERO</option>
								<option value="ARION GLOBAL, INC">ARION GLOBAL, INC</option>
								<option value="ARMSTRONG ELECTRIC, INC.">ARMSTRONG ELECTRIC, INC.</option>
								<option value="ARNOLDO CARLOS GARCIA GUERRERO">ARNOLDO CARLOS GARCIA GUERRERO</option>
								<option value="ARNULFO PEÑA TORRES">ARNULFO PEÑA TORRES</option>
								<option value="ARPEZAS INDUSTRIAL S.A. DE C.V">ARPEZAS INDUSTRIAL S.A. DE C.V</option>
								<option value="ARROW">ARROW</option>
								<option value="ART SIGN CO., INC.">ART SIGN CO., INC.</option>
								<option value="ARTE DE MEXICO">ARTE DE MEXICO</option>
								<option value="ARTE PRINTING">ARTE PRINTING</option>
								<option value="ARTESIA GLASS WINDOWS">ARTESIA GLASS WINDOWS</option>
								<option value="ARTHUR J. GALLAGHER & CO. INSURANCE BROKERS OF CA,">ARTHUR J. GALLAGHER & CO. INSURANCE BROKERS OF CA,</option>
								<option value="ARTLO INDUSTRIES INC">ARTLO INDUSTRIES INC</option>
								<option value="ASHLEY STOKER">ASHLEY STOKER</option>
								<option value="ASI">ASI</option>
								<option value="ASLA">ASLA</option>
								<option value="ASOCIACION DE LA INDUSTRIA MAQ">ASOCIACION DE LA INDUSTRIA MAQ</option>
								<option value="ASSOCIATED RESEARCH, INC">ASSOCIATED RESEARCH, INC</option>
								<option value="ATI LADISH DIECAST TOOLING">ATI LADISH DIECAST TOOLING</option>
								<option value="ATLANTIC STANDARDS">ATLANTIC STANDARDS</option>
								<option value="ATLANTIS PAPER & PACKAGING">ATLANTIS PAPER & PACKAGING</option>
								<option value="ATLAS WIRE AND CABLE">ATLAS WIRE AND CABLE</option>
								<option value="AUDI FINANCIAL SERVICES">AUDI FINANCIAL SERVICES</option>
								<option value="AVALON GLASS AND MIRROR COMPAN">AVALON GLASS AND MIRROR COMPAN</option>
								<option value="AVENTURAS MARINAS BAJA S DE RL">AVENTURAS MARINAS BAJA S DE RL</option>
								<option value="AVNET ELECTRONICS MARKETING">AVNET ELECTRONICS MARKETING</option>
								<option value="AXA REINVENTANDO / LOS SEGUROS">AXA REINVENTANDO / LOS SEGUROS</option>
								<option value="AZ MFG., INC">AZ MFG., INC</option>
								<option value="AZUSA PIPE BENDING">AZUSA PIPE BENDING</option>
								<option value="AZZ">AZZ</option>
								<option value="B & F METAL FINISHING">B & F METAL FINISHING</option>
								<option value="BACKFLOW APPARATUS & VALVE CO.">BACKFLOW APPARATUS & VALVE CO.</option>
								<option value="BAJA NORTE ADVENTURES">BAJA NORTE ADVENTURES</option>
								<option value="BAJA SIGN">BAJA SIGN</option>
								<option value="BAJA'S TRUCK SERVICE">BAJA'S TRUCK SERVICE</option>
								<option value="BANKDIRECT CAPITAL FINANCE LLC">BANKDIRECT CAPITAL FINANCE LLC</option>
								<option value="BARRY AVE PLATING">BARRY AVE PLATING</option>
								<option value="BCC PRODUCTS, INC.">BCC PRODUCTS, INC.</option>
								<option value="BD&F SANDBLASTING">BD&F SANDBLASTING</option>
								<option value="BEAUTIFUL WORLD LLC">BEAUTIFUL WORLD LLC</option>
								<option value="BELMONT EQUIPMENT & TECHNOLOGIES">BELMONT EQUIPMENT & TECHNOLOGIES</option>
								<option value="BELMONT MACHINERY COMPANY">BELMONT MACHINERY COMPANY</option>
								<option value="BELMONT SHORES RETAIL BUILDING">BELMONT SHORES RETAIL BUILDING</option>
								<option value="BENDER & WIRTH INC.">BENDER & WIRTH INC.</option>
								<option value="BENTLEY ELECTRIC COMPANY OF NAPLES FL, INC">BENTLEY ELECTRIC COMPANY OF NAPLES FL, INC</option>
								<option value="BERGSTROM ELECTRIC INC">BERGSTROM ELECTRIC INC</option>
								<option value="BERTHA AIDE MEZA HIGUERA">BERTHA AIDE MEZA HIGUERA</option>
								<option value="BERTHA ALICIA PULIDO WOO">BERTHA ALICIA PULIDO WOO</option>
								<option value="BEST BUY- CUSTOMER CARE">BEST BUY- CUSTOMER CARE</option>
								<option value="BEST WESTERN ROLLING">BEST WESTERN ROLLING</option>
								<option value="BETA DIE CASTING EQUIPMENT - WT">BETA DIE CASTING EQUIPMENT - WT</option>
								<option value="BEYOND COMPONENTS WEST, INC.">BEYOND COMPONENTS WEST, INC.</option>
								<option value="BIDITUP AUCTIONS WORLDWIRE">BIDITUP AUCTIONS WORLDWIRE</option>
								<option value="BIEBER LIGHTING">BIEBER LIGHTING</option>
								<option value="BILL TURNER">BILL TURNER</option>
								<option value="BIRCH COMMUNICATIONS">BIRCH COMMUNICATIONS</option>
								<option value="BIRD B GONE, INC.">BIRD B GONE, INC.</option>
								<option value="BISCO INDUSTRIES INC.">BISCO INDUSTRIES INC.</option>
								<option value="BIVOUAC ENGINEERING & SERVICE CO.">BIVOUAC ENGINEERING & SERVICE CO.</option>
								<option value="BJB ELECTRIC L.P.">BJB ELECTRIC L.P.</option>
								<option value="BJB ENTERPRISES, INC">BJB ENTERPRISES, INC</option>
								<option value="BLUE CIRCLE CORP">BLUE CIRCLE CORP</option>
								<option value="BLUE SHIELD OF CALIFORNIA">BLUE SHIELD OF CALIFORNIA</option>
								<option value="BLUE VIOLET">BLUE VIOLET</option>
								<option value="BLUERIDGE LIGHTING & CONTROLS, LLC">BLUERIDGE LIGHTING & CONTROLS, LLC</option>
								<option value="BOARD OF EQUALIZATION - E-FILE">BOARD OF EQUALIZATION - E-FILE</option>
								<option value="BOCHA ELECTRIC">BOCHA ELECTRIC</option>
								<option value="BOLT PRODUCTS">BOLT PRODUCTS</option>
								<option value="BORRMANN METAL CENTER">BORRMANN METAL CENTER</option>
								<option value="BOYD COPORATION">BOYD COPORATION</option>
								<option value="BRADLEY ELECTRIC INC">BRADLEY ELECTRIC INC</option>
								<option value="BRALCO METALS #43">BRALCO METALS #43</option>
								<option value="BRANDELLI ARTS">BRANDELLI ARTS</option>
								<option value="BRICEPAC, INC.">BRICEPAC, INC.</option>
								<option value="BRITTNEY PIERRE">BRITTNEY PIERRE</option>
								<option value="BRONZE WAY PLANTING COPORATION">BRONZE WAY PLANTING COPORATION</option>
								<option value="BROWN-STRAUSS STEEL">BROWN-STRAUSS STEEL</option>
								<option value="BRUSH IN HAND">BRUSH IN HAND</option>
								<option value="BRYANT-DURHAM ELECTRIC CO., INC.">BRYANT-DURHAM ELECTRIC CO., INC.</option>
								<option value="BTU INTERNATIONAL INC">BTU INTERNATIONAL INC</option>
								<option value="BUCHALTER NEMER">BUCHALTER NEMER</option>
								<option value="BUCKEYE FASTENER COMPANY">BUCKEYE FASTENER COMPANY</option>
								<option value="BURBANK PAINT COMPANY">BURBANK PAINT COMPANY</option>
								<option value="BURBANK PLATING SERVICE">BURBANK PLATING SERVICE</option>
								<option value="BUSINESS ADVANTAGE, INC.">BUSINESS ADVANTAGE, INC.</option>
								<option value="BUSINESS PRINTING COMPANY INC.">BUSINESS PRINTING COMPANY INC.</option>
								<option value="C&D ELECTRIC">C&D ELECTRIC</option>
								<option value="C&D TOOL COMPANY - STEP DRILLS UNLIMITED">C&D TOOL COMPANY - STEP DRILLS UNLIMITED</option>
								<option value="C.R.I ELECTRIC, INC.">C.R.I ELECTRIC, INC.</option>
								<option value="C.R.LAURENCE">C.R.LAURENCE</option>
								<option value="C.W. HAINES COMPANY">C.W. HAINES COMPANY</option>
								<option value="CADILLAC PLASTICS">CADILLAC PLASTICS</option>
								<option value="CAINE CUSTOM COATINGS">CAINE CUSTOM COATINGS</option>
								<option value="CAL AERO SUPPLY CO.">CAL AERO SUPPLY CO.</option>
								<option value="CALAIBA S.A. DE C.V.">CALAIBA S.A. DE C.V.</option>
								<option value="CALDERAS CALIFORNIA S. DE R.L.">CALDERAS CALIFORNIA S. DE R.L.</option>
								<option value="CALIFORNIA COATING">CALIFORNIA COATING</option>
								<option value="CALIFORNIA GLASS BENDING">CALIFORNIA GLASS BENDING</option>
								<option value="CALIFORNIA PIPE BENDING">CALIFORNIA PIPE BENDING</option>
								<option value="CALIFORNIA SANDBLASTING">CALIFORNIA SANDBLASTING</option>
								<option value="CALIFORNIA WATER SERVICE CO">CALIFORNIA WATER SERVICE CO</option>
								<option value="CALSAK PLASTICS">CALSAK PLASTICS</option>
								<option value="CALSTRIP INDUSTRIES, INC.">CALSTRIP INDUSTRIES, INC.</option>
								<option value="CALUMET & ARIZONA GUEST HOUSE">CALUMET & ARIZONA GUEST HOUSE</option>
								<option value="CALVARY INDUSTRIES, INC.">CALVARY INDUSTRIES, INC.</option>
								<option value="CALVIN WONG">CALVIN WONG</option>
								<option value="CALWEST GALVANIZER">CALWEST GALVANIZER</option>
								<option value="CALWEST GALVANIZING">CALWEST GALVANIZING</option>
								<option value="CANDADOS MEXICANOS S. DE R.L">CANDADOS MEXICANOS S. DE R.L</option>
								<option value="CANDELLA ACCT# 67595">CANDELLA ACCT# 67595</option>
								<option value="CANON BUSINESS SOLUTIONS">CANON BUSINESS SOLUTIONS</option>
								<option value="CANON FINANCIAL SERVICES, INC">CANON FINANCIAL SERVICES, INC</option>
								<option value="CAPITAL SQUARED LLC">CAPITAL SQUARED LLC</option>
								<option value="CAPITAL WHOLESALE">CAPITAL WHOLESALE</option>
								<option value="CARBONITE, INC">CARBONITE, INC</option>
								<option value="CARDINAL INDUSTRIAL FINISHES">CARDINAL INDUSTRIAL FINISHES</option>
								<option value="CARELL CORP.">CARELL CORP.</option>
								<option value="CARINA HERNANDEZ">CARINA HERNANDEZ</option>
								<option value="CARLOS ALBERTO ACEVEDO OLIVARE">CARLOS ALBERTO ACEVEDO OLIVARE</option>
								<option value="CARLOS ALEJANDRO PEREZ F">CARLOS ALEJANDRO PEREZ F</option>
								<option value="CARLOS ALVARENGA">CARLOS ALVARENGA</option>
								<option value="CARLOS CALDERON">CARLOS CALDERON</option>
								<option value="CARLOS PONT GUERRA">CARLOS PONT GUERRA</option>
								<option value="CARMENITA TRUCK LEASING">CARMENITA TRUCK LEASING</option>
								<option value="CAROLE JOHNSON">CAROLE JOHNSON</option>
								<option value="CAROLINA LIGHTING SYSTEMS INC.">CAROLINA LIGHTING SYSTEMS INC.</option>
								<option value="CASAS INTERNATIONAL BROKERS">CASAS INTERNATIONAL BROKERS</option>
								<option value="CASCADE TECHNICAL SCIENCES INC">CASCADE TECHNICAL SCIENCES INC</option>
								<option value="CAST AND ENGINEERED PRODUCTS">CAST AND ENGINEERED PRODUCTS</option>
								<option value="CAST-RITE CORPORATION">CAST-RITE CORPORATION</option>
								<option value="CBC LIGHTING">CBC LIGHTING</option>
								<option value="CCC STEEL">CCC STEEL</option>
								<option value="CCS PRESENTATION SYSTEMS, INC.">CCS PRESENTATION SYSTEMS, INC.</option>
								<option value="CCTV CAMERA PROS">CCTV CAMERA PROS</option>
								<option value="CDW DIRECT">CDW DIRECT</option>
								<option value="CEC LOGISTICS, INC">CEC LOGISTICS, INC</option>
								<option value="CENTRAL ELECTRIC COMPANY">CENTRAL ELECTRIC COMPANY</option>
								<option value="CENTRAL SALES LIGHTING SYSTEMS">CENTRAL SALES LIGHTING SYSTEMS</option>
								<option value="CENTRO DE BOBINADO DE ENSENADA">CENTRO DE BOBINADO DE ENSENADA</option>
								<option value="CENTRO PAPELERO LEON VALDES Y">CENTRO PAPELERO LEON VALDES Y</option>
								<option value="CENTURY SYSTEMS">CENTURY SYSTEMS</option>
								<option value="CENTURYLINK">CENTURYLINK</option>
								<option value="CENWIN LIMITED">CENWIN LIMITED</option>
								<option value="CESAR HIGUERA V.">CESAR HIGUERA V.</option>
								<option value="CESAR IVAN DIAZ GONZALEZ">CESAR IVAN DIAZ GONZALEZ</option>
								<option value="CESAR S. SALAZAR">CESAR S. SALAZAR</option>
								<option value="CFE">CFE</option>
								<option value="CG ELECTRICAL AND LIGHTING">CG ELECTRICAL AND LIGHTING</option>
								<option value="CHARLES CAINE COMPANY">CHARLES CAINE COMPANY</option>
								<option value="CHASE PLASTIC SERVICE, INC.">CHASE PLASTIC SERVICE, INC.</option>
								<option value="CHATTANOOGA LIGHTING SALES">CHATTANOOGA LIGHTING SALES</option>
								<option value="CHAVEZ-SEPULVEDA & CASTANEDA,">CHAVEZ-SEPULVEDA & CASTANEDA,</option>
								<option value="CHEMICAL METALLURGICAL TESTING">CHEMICAL METALLURGICAL TESTING</option>
								<option value="CHERYL MOORMAN">CHERYL MOORMAN</option>
								<option value="CHILDREN'S BUREAU, INC.">CHILDREN'S BUREAU, INC.</option>
								<option value="CHILO'S TIRE SERVICE">CHILO'S TIRE SERVICE</option>
								<option value="CHRIS-CHANWOO HWANG">CHRIS-CHANWOO HWANG</option>
								<option value="CHRONTROL CORPORATION">CHRONTROL CORPORATION</option>
								<option value="CHUNG'S VACUUM CENTER">CHUNG'S VACUUM CENTER</option>
								<option value="CINCINNATI MACHINE, LLC">CINCINNATI MACHINE, LLC</option>
								<option value="CINTAS FIRST AID & SAFETY">CINTAS FIRST AID & SAFETY</option>
								<option value="CIRCLE BOLT & NUT CO., INC">CIRCLE BOLT & NUT CO., INC</option>
								<option value="CIRCLE METALS">CIRCLE METALS</option>
								<option value="CISCO WEBEX LLC">CISCO WEBEX LLC</option>
								<option value="CITEL INC">CITEL INC</option>
								<option value="CITY OF BUENA PARK">CITY OF BUENA PARK</option>
								<option value="CITY OF SANTA MONICA">CITY OF SANTA MONICA</option>
								<option value="CJ ELECTRICAL SUPPLY & SERVICES, LLC">CJ ELECTRICAL SUPPLY & SERVICES, LLC</option>
								<option value="CJS LIGHTING">CJS LIGHTING</option>
								<option value="CKD USA CORP.">CKD USA CORP.</option>
								<option value="CLARK METALS INC">CLARK METALS INC</option>
								<option value="CLARUS LIGHTING AND CONTROLS, LLC">CLARUS LIGHTING AND CONTROLS, LLC</option>
								<option value="CLAUDIA VELAZQUEZ">CLAUDIA VELAZQUEZ</option>
								<option value="CLEAN AIR SPECIALIST INC">CLEAN AIR SPECIALIST INC</option>
								<option value="CLEAN SWEEP SUPPLY CO., INC">CLEAN SWEEP SUPPLY CO., INC</option>
								<option value="CLERK OF THE COURT">CLERK OF THE COURT</option>
								<option value="CLERK OF THE COURT">CLERK OF THE COURT</option>
								<option value="CLICK CONSULTING">CLICK CONSULTING</option>
								<option value="COAST ALUMINUM & ARCHITECTURAL">COAST ALUMINUM & ARCHITECTURAL</option>
								<option value="COAST BOOTH IND.">COAST BOOTH IND.</option>
								<option value="COAST INDUSTRIAL SYSTEMS, INC">COAST INDUSTRIAL SYSTEMS, INC</option>
								<option value="COAST LABEL COMPANY">COAST LABEL COMPANY</option>
								<option value="COLOR SCIENCE, INC.">COLOR SCIENCE, INC.</option>
								<option value="COMERCIAL ELECTRICA KOTKOFF">COMERCIAL ELECTRICA KOTKOFF</option>
								<option value="COMERCIALIZADORA ENSENADA S D">COMERCIALIZADORA ENSENADA S D</option>
								<option value="COMFORT CONTROL SERVICES">COMFORT CONTROL SERVICES</option>
								<option value="COMISION ESTATAL DE SERVICIOS">COMISION ESTATAL DE SERVICIOS</option>
								<option value="COMMANDER SYSTEMS">COMMANDER SYSTEMS</option>
								<option value="COMMERCE HOSE & INDUSTRIAL PRODUCTS">COMMERCE HOSE & INDUSTRIAL PRODUCTS</option>
								<option value="COMMERCIAL LIGHTING SALES, INC.">COMMERCIAL LIGHTING SALES, INC.</option>
								<option value="COMMERCIAL POWER, INC">COMMERCIAL POWER, INC</option>
								<option value="COMPLETE WELDING & CUTTING SUPPLIES">COMPLETE WELDING & CUTTING SUPPLIES</option>
								<option value="COMPUFORMS">COMPUFORMS</option>
								<option value="COMUFORMS">COMUFORMS</option>
								<option value="COMUNICACIONES NEXTEL DE MEX.">COMUNICACIONES NEXTEL DE MEX.</option>
								<option value="CON-WAY FREIGHT, INC.">CON-WAY FREIGHT, INC.</option>
								<option value="CONCEPCION AVALOS">CONCEPCION AVALOS</option>
								<option value="CONCORD TRANSPORTATION, INC.">CONCORD TRANSPORTATION, INC.</option>
								<option value="CONGLOBAL INDUSTRIES, INC.">CONGLOBAL INDUSTRIES, INC.</option>
								<option value="CONNECT 2 MINISTRIES">CONNECT 2 MINISTRIES</option>
								<option value="CONNEX ELECTRONICS">CONNEX ELECTRONICS</option>
								<option value="CONSEJO DE DESARROLLO ECONOMIC">CONSEJO DE DESARROLLO ECONOMIC</option>
								<option value="CONSTRUCTION BUSINESS MEDIA, LLC">CONSTRUCTION BUSINESS MEDIA, LLC</option>
								<option value="CONSTRUCTION LABORERS TRUST">CONSTRUCTION LABORERS TRUST</option>
								<option value="CONTOUR SERVICES, LLC">CONTOUR SERVICES, LLC</option>
								<option value="CONTROL EN SISTEMAS AMBIENTAL">CONTROL EN SISTEMAS AMBIENTAL</option>
								<option value="COOK ENERGY LLC">COOK ENERGY LLC</option>
								<option value="COOLER MASTER USA">COOLER MASTER USA</option>
								<option value="COPPERSTATE BATTERY">COPPERSTATE BATTERY</option>
								<option value="CORAL CHEMICAL COMPANY">CORAL CHEMICAL COMPANY</option>
								<option value="CORDOVA BOLTS">CORDOVA BOLTS</option>
								<option value="CORMIER CHEVROLET">CORMIER CHEVROLET</option>
								<option value="CORNATZER & ASSOCIATES, INC.">CORNATZER & ASSOCIATES, INC.</option>
								<option value="CORONA PROPHET MFG SA">CORONA PROPHET MFG SA</option>
								<option value="COSTCO DE MEXICO, S.A. DE C.V.">COSTCO DE MEXICO, S.A. DE C.V.</option>
								<option value="COUNTRY CAST PRODUCTS, INC">COUNTRY CAST PRODUCTS, INC</option>
								<option value="COUNTY OF LOS ANGELES">COUNTY OF LOS ANGELES</option>
								<option value="COURIER-MESSENGER, INC.">COURIER-MESSENGER, INC.</option>
								<option value="COY INDUSTRIES INC">COY INDUSTRIES INC</option>
								<option value="CRAIG CUBBON">CRAIG CUBBON</option>
								<option value="CREATIVE ELECTRON, INC">CREATIVE ELECTRON, INC</option>
								<option value="CREATIVE LIGHTING, LLC">CREATIVE LIGHTING, LLC</option>
								<option value="CREST STEEL CORPORATION">CREST STEEL CORPORATION</option>
								<option value="CROSS CREEK SUBARU, INC">CROSS CREEK SUBARU, INC</option>
								<option value="CROSSMAN MFG PLASTICS">CROSSMAN MFG PLASTICS</option>
								<option value="CROWN ELECTRIC, INC.">CROWN ELECTRIC, INC.</option>
								<option value="CROWN PLASTICS">CROWN PLASTICS</option>
								<option value="CRYSTAL CRAFT">CRYSTAL CRAFT</option>
								<option value="CSU FULLERTON AUXILIARY SERVICES CORPORATION">CSU FULLERTON AUXILIARY SERVICES CORPORATION</option>
								<option value="CTD MACHINES">CTD MACHINES</option>
								<option value="CTL SCIENTIFIC SUPPLY CORP">CTL SCIENTIFIC SUPPLY CORP</option>
								<option value="CUSTOM ALLOY LIGHT METALS, INC">CUSTOM ALLOY LIGHT METALS, INC</option>
								<option value="CUSTOM ANODIZING TECHNOLOGY">CUSTOM ANODIZING TECHNOLOGY</option>
								<option value="CUSTOM COATERS">CUSTOM COATERS</option>
								<option value="CUSTOM METAL SHAPES">CUSTOM METAL SHAPES</option>
								<option value="CW HANES">CW HANES</option>
								<option value="CW LIGHTING & ASSOCIATES">CW LIGHTING & ASSOCIATES</option>
								<option value="CYNTHIA LEE KEIL">CYNTHIA LEE KEIL</option>
								<option value="D&D ELECTRIC, LLP">D&D ELECTRIC, LLP</option>
								<option value="D.B. ROBERTS COMPANY">D.B. ROBERTS COMPANY</option>
								<option value="D2S, INC.">D2S, INC.</option>
								<option value="DAILY SAW SERVICE, INC">DAILY SAW SERVICE, INC</option>
								<option value="DAN DIX">DAN DIX</option>
								<option value="DANIEL COBB">DANIEL COBB</option>
								<option value="DANIEL MARTINEZ SEGUNDO">DANIEL MARTINEZ SEGUNDO</option>
								<option value="DANIEL RIOS COTA">DANIEL RIOS COTA</option>
								<option value="DANZAS CORPORATION">DANZAS CORPORATION</option>
								<option value="DAUBERT CHEMICAL COMPANY, INC">DAUBERT CHEMICAL COMPANY, INC</option>
								<option value="DAVID MOLINA DAVALOS">DAVID MOLINA DAVALOS</option>
								<option value="DAVID RUBIO NUNEZ">DAVID RUBIO NUNEZ</option>
								<option value="DAVID SANCHEZ CASTRO">DAVID SANCHEZ CASTRO</option>
								<option value="DAVID SCOTT MCCORMICK">DAVID SCOTT MCCORMICK</option>
								<option value="DAVID TELLIARD">DAVID TELLIARD</option>
								<option value="DAVIS FLUORECENT">DAVIS FLUORECENT</option>
								<option value="DAVIS WHOSALE ELECTRIC">DAVIS WHOSALE ELECTRIC</option>
								<option value="DEAVER INDUSTRIES">DEAVER INDUSTRIES</option>
								<option value="DECKER FORD, INC.">DECKER FORD, INC.</option>
								<option value="DECOPIEDRA S.A. DE C.V">DECOPIEDRA S.A. DE C.V</option>
								<option value="DEFELSKO CORP">DEFELSKO CORP</option>
								<option value="DEKTEC AUTOMATIC EQUIPMENT CO., LTD">DEKTEC AUTOMATIC EQUIPMENT CO., LTD</option>
								<option value="DEL AMO CHEMICAL CO.">DEL AMO CHEMICAL CO.</option>
								<option value="DELEGACION MUNICIPAL DE MANEAD">DELEGACION MUNICIPAL DE MANEAD</option>
								<option value="DELL MARKETING LP">DELL MARKETING LP</option>
								<option value="DELTA TRUCK PARKING">DELTA TRUCK PARKING</option>
								<option value="DELTA-WILD WINGS GUN CLUB">DELTA-WILD WINGS GUN CLUB</option>
								<option value="DELTECH MANUFACTORING, INC">DELTECH MANUFACTORING, INC</option>
								<option value="DEPARTMENT OF CALIFORNIA HIGHWAY PATROL">DEPARTMENT OF CALIFORNIA HIGHWAY PATROL</option>
								<option value="DEPARTMENT OF INDUSTRIAL RELATIONS">DEPARTMENT OF INDUSTRIAL RELATIONS</option>
								<option value="DEPARTMENT OF MOTOR VEHICLES">DEPARTMENT OF MOTOR VEHICLES</option>
								<option value="DEPARTMENT OF THE TREASURY">DEPARTMENT OF THE TREASURY</option>
								<option value="DEPORTES UNIDOS DE ENSENADA S">DEPORTES UNIDOS DE ENSENADA S</option>
								<option value="DERINGER, INC.">DERINGER, INC.</option>
								<option value="DESIGN LIGHT NASHVILLE">DESIGN LIGHT NASHVILLE</option>
								<option value="DESIGN LIGHTING LLC - AL">DESIGN LIGHTING LLC - AL</option>
								<option value="DEWALT">DEWALT</option>
								<option value="DEWITT PETROLEUM-ACH">DEWITT PETROLEUM-ACH</option>
								<option value="DHL EXPRESS MEXICO S.A. DE C.V">DHL EXPRESS MEXICO S.A. DE C.V</option>
								<option value="DHL EXPRESS USA, INC.">DHL EXPRESS USA, INC.</option>
								<option value="DIAMOND PERFORATED METALS, INC.">DIAMOND PERFORATED METALS, INC.</option>
								<option value="DIANA GUADALUPE WIDO VILLEZCAS">DIANA GUADALUPE WIDO VILLEZCAS</option>
								<option value="DIANA LETICIA ANTUNEZ GARCIA">DIANA LETICIA ANTUNEZ GARCIA</option>
								<option value="DIANE CAGE">DIANE CAGE</option>
								<option value="DIEMOLD SUPPLY INC">DIEMOLD SUPPLY INC</option>
								<option value="DIETERT FOUNDRY TESTING EQUIPMENT">DIETERT FOUNDRY TESTING EQUIPMENT</option>
								<option value="DIGI-KEY CORPORATION">DIGI-KEY CORPORATION</option>
								<option value="DIMETEK INTERNATIONAL INC">DIMETEK INTERNATIONAL INC</option>
								<option value="DINASA S.A DE CV">DINASA S.A DE CV</option>
								<option value="DION AND SONS">DION AND SONS</option>
								<option value="DIRECT FREIGHT CORPORATION">DIRECT FREIGHT CORPORATION</option>
								<option value="DIRECT LIGHTING AND SUPPLY">DIRECT LIGHTING AND SUPPLY</option>
								<option value="DISCOUNT ELECTRONICS">DISCOUNT ELECTRONICS</option>
								<option value="DISH">DISH</option>
								<option value="DISTRIBUIDORA OTAOLA SA">DISTRIBUIDORA OTAOLA SA</option>
								<option value="DJS INDUSTRIES">DJS INDUSTRIES</option>
								<option value="DME COMPANY LLC">DME COMPANY LLC</option>
								<option value="DNB ENGINEERING, INC.">DNB ENGINEERING, INC.</option>
								<option value="DOLAN NW LLC">DOLAN NW LLC</option>
								<option value="DON BLACKBURN & ASSOCIATES">DON BLACKBURN & ASSOCIATES</option>
								<option value="DON SKINNER">DON SKINNER</option>
								<option value="DOUGLAS STEEL SUPPLY">DOUGLAS STEEL SUPPLY</option>
								<option value="DRI-AIR INDUSTRIES, INC">DRI-AIR INDUSTRIES, INC</option>
								<option value="DSM&T CO. INC">DSM&T CO. INC</option>
								<option value="DSY CONSULTANTS, INC.">DSY CONSULTANTS, INC.</option>
								<option value="DUFFY AND ASSOCIATES">DUFFY AND ASSOCIATES</option>
								<option value="DUNCAN BOLT">DUNCAN BOLT</option>
								<option value="DUNKEL BROS MACHINERY MOVING INC">DUNKEL BROS MACHINERY MOVING INC</option>
								<option value="DUNN & EDWARDS PAINT">DUNN & EDWARDS PAINT</option>
								<option value="DUPONT INDUSTRIAL COATING SOLUTIONS">DUPONT INDUSTRIAL COATING SOLUTIONS</option>
								<option value="DURA-BAR METAL SERVICES">DURA-BAR METAL SERVICES</option>
								<option value="DURAGUARD PRODUCTS, INC.">DURAGUARD PRODUCTS, INC.</option>
								<option value="DURKEE TESTING LAB">DURKEE TESTING LAB</option>
								<option value="DWY INC">DWY INC</option>
								<option value="DYNAMIC WIRE">DYNAMIC WIRE</option>
								<option value="E & H ENTERPRISES OF ALEXANDRIA, INC.">E & H ENTERPRISES OF ALEXANDRIA, INC.</option>
								<option value="E & Z ENTERPRISES INC">E & Z ENTERPRISES INC</option>
								<option value="E.L.M. POWDERCOATING">E.L.M. POWDERCOATING</option>
								<option value="E2M LOGISTICS">E2M LOGISTICS</option>
								<option value="EA PALLET CO">EA PALLET CO</option>
								<option value="EAGLE ALLOYS">EAGLE ALLOYS</option>
								<option value="EAGLE CONVEX">EAGLE CONVEX</option>
								<option value="EAGLE ELECTRONICS, INC">EAGLE ELECTRONICS, INC</option>
								<option value="EAGLE GLASS INC">EAGLE GLASS INC</option>
								<option value="ECHO ENGINEERING & PRODUCTION SUPPLIES">ECHO ENGINEERING & PRODUCTION SUPPLIES</option>
								<option value="ECK SUPPLY COMPANY">ECK SUPPLY COMPANY</option>
								<option value="ED&D INC">ED&D INC</option>
								<option value="EDDIE KANE STEEL">EDDIE KANE STEEL</option>
								<option value="EDELMIRA S. ZAMUDIO">EDELMIRA S. ZAMUDIO</option>
								<option value="EDGAR AGUIRRE">EDGAR AGUIRRE</option>
								<option value="EDGAR ALAN HERNANDEZ ZEPEDA">EDGAR ALAN HERNANDEZ ZEPEDA</option>
								<option value="EDGAR EUGENIO A LA TORRE AMEZQ">EDGAR EUGENIO A LA TORRE AMEZQ</option>
								<option value="EDGE ELECTRICAL SYSTEMS LLC">EDGE ELECTRICAL SYSTEMS LLC</option>
								<option value="EDI AGUAYO">EDI AGUAYO</option>
								<option value="EDIBERTO GARCIA CUESTA">EDIBERTO GARCIA CUESTA</option>
								<option value="EDITORIAL KINO S.A. DE C.V.">EDITORIAL KINO S.A. DE C.V.</option>
								<option value="EDMUNDO FERNANDEZ TIRADO">EDMUNDO FERNANDEZ TIRADO</option>
								<option value="EDUARDO SUAREZ">EDUARDO SUAREZ</option>
								<option value="EDUARDO TOPETE">EDUARDO TOPETE</option>
								<option value="EDUCACION Y RESULTADOS S.C">EDUCACION Y RESULTADOS S.C</option>
								<option value="EDWIN SUAREZ">EDWIN SUAREZ</option>
								<option value="EKK, INC">EKK, INC</option>
								<option value="ELDECON, INC.">ELDECON, INC.</option>
								<option value="ELECTRICAL COMPONENTS I">ELECTRICAL COMPONENTS I</option>
								<option value="ELECTRICAL CONSTRUCTION DESIGN INC">ELECTRICAL CONSTRUCTION DESIGN INC</option>
								<option value="ELECTRICAL DISTRIBUTORS CO.">ELECTRICAL DISTRIBUTORS CO.</option>
								<option value="ELECTRO EMBOBINADOS DEL PACIFI">ELECTRO EMBOBINADOS DEL PACIFI</option>
								<option value="ELECTROIDEAS S.A.DE C.V">ELECTROIDEAS S.A.DE C.V</option>
								<option value="ELECTROMARK">ELECTROMARK</option>
								<option value="ELECTRONICA STEREN ENSENADA">ELECTRONICA STEREN ENSENADA</option>
								<option value="ELECTRONICS WAREHOUSE">ELECTRONICS WAREHOUSE</option>
								<option value="ELIAS TORRES MARTINEZ">ELIAS TORRES MARTINEZ</option>
								<option value="ELLEN HEIN">ELLEN HEIN</option>
								<option value="ELLSWORTH ADHESIVES SPECIALTY CHEMICAL DIST">ELLSWORTH ADHESIVES SPECIALTY CHEMICAL DIST</option>
								<option value="ELVIA DEL CARMEN OLIVEROS A.">ELVIA DEL CARMEN OLIVEROS A.</option>
								<option value="EMBROID ME">EMBROID ME</option>
								<option value="EMEDCO INC">EMEDCO INC</option>
								<option value="EMI CORP">EMI CORP</option>
								<option value="EMJ-LOS ANGELES">EMJ-LOS ANGELES</option>
								<option value="EMPIRE RESOURCES">EMPIRE RESOURCES</option>
								<option value="ENCO - ACCT # 649559">ENCO - ACCT # 649559</option>
								<option value="ENCORE WELDING AND INDUSTRIAL SUPPLY INC">ENCORE WELDING AND INDUSTRIAL SUPPLY INC</option>
								<option value="ENERGY TECH SOLUTIONS, LLC">ENERGY TECH SOLUTIONS, LLC</option>
								<option value="ENLACES DE SERVICIOS ADUANEROS">ENLACES DE SERVICIOS ADUANEROS</option>
								<option value="ENSENADA LIFT INDUSTRIAL">ENSENADA LIFT INDUSTRIAL</option>
								<option value="ENTEC POLYMERS LLC">ENTEC POLYMERS LLC</option>
								<option value="ENTERPRISE INDUSTRIES">ENTERPRISE INDUSTRIES</option>
								<option value="ENVISION LIGHTING SYSTEMS">ENVISION LIGHTING SYSTEMS</option>
								<option value="EPICOR SOFTWARE">EPICOR SOFTWARE</option>
								<option value="EQUATION ENERGY CORP">EQUATION ENERGY CORP</option>
								<option value="EQUIPAMIENTO INDUSTRIAL DEL N">EQUIPAMIENTO INDUSTRIAL DEL N</option>
								<option value="EQUIPOS Y SOLDADURAS DEL NORTE">EQUIPOS Y SOLDADURAS DEL NORTE</option>
								<option value="ERAN FINANCIAL SERVICES LLC">ERAN FINANCIAL SERVICES LLC</option>
								<option value="ERAN LIGHTING PLASTICS">ERAN LIGHTING PLASTICS</option>
								<option value="ERI ILLUMINATE">ERI ILLUMINATE</option>
								<option value="ERIK VAN WIER">ERIK VAN WIER</option>
								<option value="ERNEST PACKAGING SOLUTIONS INC">ERNEST PACKAGING SOLUTIONS INC</option>
								<option value="ERNESTO LARA LOPEZ">ERNESTO LARA LOPEZ</option>
								<option value="ESG INDUSTRIAL">ESG INDUSTRIAL</option>
								<option value="ESTEBAN LIZARDI PEREZ">ESTEBAN LIZARDI PEREZ</option>
								<option value="ESTEFANA RIVERA M">ESTEFANA RIVERA M</option>
								<option value="ETICA ENSENADA SA">ETICA ENSENADA SA</option>
								<option value="EUGENIOS">EUGENIOS</option>
								<option value="EUGENOS SHEET METAL">EUGENOS SHEET METAL</option>
								<option value="EVOLVELECTRIC, INC.">EVOLVELECTRIC, INC.</option>
								<option value="EXCEL SUPPLY">EXCEL SUPPLY</option>
								<option value="EXERGY CONTROLS, LLC">EXERGY CONTROLS, LLC</option>
								<option value="EXPEDITION AMERICA">EXPEDITION AMERICA</option>
								<option value="EXPONATION, LLC">EXPONATION, LLC</option>
								<option value="EXPRESIONS TO WEAR">EXPRESIONS TO WEAR</option>
								<option value="EXPRESS POWDER COATINGS">EXPRESS POWDER COATINGS</option>
								<option value="EXPRESS SERVICES, INC.">EXPRESS SERVICES, INC.</option>
								<option value="EYE LIGHTING INTL">EYE LIGHTING INTL</option>
								<option value="EZRA BRUTZKUS GUBNER LLP">EZRA BRUTZKUS GUBNER LLP</option>
								<option value="FABCO STEEL FABRICATION">FABCO STEEL FABRICATION</option>
								<option value="FACILITY SOLUTIONS GROUP, INC">FACILITY SOLUTIONS GROUP, INC</option>
								<option value="FAMSA DEL PACIFICO S.A. DE C.V">FAMSA DEL PACIFICO S.A. DE C.V</option>
								<option value="FARMER BROTHERS">FARMER BROTHERS</option>
								<option value="FASTENAL INDUSTRIAL">FASTENAL INDUSTRIAL</option>
								<option value="FASTENAL MEXICO">FASTENAL MEXICO</option>
								<option value="FAUSTINO GOMEZ MARTINEZ">FAUSTINO GOMEZ MARTINEZ</option>
								<option value="FAUSTO AGUILAR E">FAUSTO AGUILAR E</option>
								<option value="FEARLESS COATINGS">FEARLESS COATINGS</option>
								<option value="FEDERATED LIGHTING">FEDERATED LIGHTING</option>
								<option value="FEDERICO GARCIA">FEDERICO GARCIA</option>
								<option value="FEDEX">FEDEX</option>
								<option value="FEDEX FREIGHT">FEDEX FREIGHT</option>
								<option value="FEDEX-KINKOS">FEDEX-KINKOS</option>
								<option value="FELIX COTA IGNACIO">FELIX COTA IGNACIO</option>
								<option value="FELIX GAS S.A. DE C.V.">FELIX GAS S.A. DE C.V.</option>
								<option value="FERNANDO DE JESUS RAMIREZ">FERNANDO DE JESUS RAMIREZ</option>
								<option value="FETASA TIJUANA SA">FETASA TIJUANA SA</option>
								<option value="FIDELITY SECURITY LIFE INSURANCE COMPANY">FIDELITY SECURITY LIFE INSURANCE COMPANY</option>
								<option value="FIGUEROA'S AUTO REPAIR">FIGUEROA'S AUTO REPAIR</option>
								<option value="FINE QUALITY METAL FINIS 2">FINE QUALITY METAL FINIS 2</option>
								<option value="FIRST BANKCARD">FIRST BANKCARD</option>
								<option value="FIRST CALL STAFFING SERVICES">FIRST CALL STAFFING SERVICES</option>
								<option value="FIRST CHOICE- WATER">FIRST CHOICE- WATER</option>
								<option value="FLAG AND BANNER">FLAG AND BANNER</option>
								<option value="FLAGPOLES, INC.">FLAGPOLES, INC.</option>
								<option value="FLATIRON CAPITAL">FLATIRON CAPITAL</option>
								<option value="FLEX ARM- MIDWEST SPECIALTIES">FLEX ARM- MIDWEST SPECIALTIES</option>
								<option value="FLEX WIRES INC.">FLEX WIRES INC.</option>
								<option value="FLYNN  SIGNS & LETTERS">FLYNN  SIGNS & LETTERS</option>
								<option value="FM ELECTRIC">FM ELECTRIC</option>
								<option value="FONTIS SOLUTIONS">FONTIS SOLUTIONS</option>
								<option value="FOREMOST SPRING CO., INC">FOREMOST SPRING CO., INC</option>
								<option value="FORMED PLASTICS">FORMED PLASTICS</option>
								<option value="FORTUNE LIGHTING">FORTUNE LIGHTING</option>
								<option value="FOUNDATION FOR CALIFORNIA COMMUNITY COLLEGUES">FOUNDATION FOR CALIFORNIA COMMUNITY COLLEGUES</option>
								<option value="FOUR SLIDE MASTERS., INC">FOUR SLIDE MASTERS., INC</option>
								<option value="FOWLERS EXPRESS, INC.">FOWLERS EXPRESS, INC.</option>
								<option value="FOX ENGINEERING">FOX ENGINEERING</option>
								<option value="FOXWORTH CAPITAL, LLC">FOXWORTH CAPITAL, LLC</option>
								<option value="FRANCHISE TAX BOARD">FRANCHISE TAX BOARD</option>
								<option value="FRANCISCO HERNANDEZ">FRANCISCO HERNANDEZ</option>
								<option value="FRANCISCO JAVIER GASTELUM CAÑE">FRANCISCO JAVIER GASTELUM CAÑE</option>
								<option value="FRANCISCO JAVIER MATA DAVALOS">FRANCISCO JAVIER MATA DAVALOS</option>
								<option value="FRANCISCO MORENO QUIRINO">FRANCISCO MORENO QUIRINO</option>
								<option value="FRANK GONZALES">FRANK GONZALES</option>
								<option value="FRANK MAJOR SALES">FRANK MAJOR SALES</option>
								<option value="FRED ERICKSON">FRED ERICKSON</option>
								<option value="FREEMAN MANUFACTURING & SUPPLY">FREEMAN MANUFACTURING & SUPPLY</option>
								<option value="FREIGHT MASTER">FREIGHT MASTER</option>
								<option value="FREIGHT VALUE">FREIGHT VALUE</option>
								<option value="FRONTIER ALUMINUM CORP">FRONTIER ALUMINUM CORP</option>
								<option value="FRY STEEL">FRY STEEL</option>
								<option value="FRY'S">FRY'S</option>
								<option value="FTR ASSOCIATES, INC.">FTR ASSOCIATES, INC.</option>
								<option value="FTS LIGHTING SERVICES, INC">FTS LIGHTING SERVICES, INC</option>
								<option value="FULHAM CO., INC">FULHAM CO., INC</option>
								<option value="FULLERTON RANGERS YOUTH SOCCER CLUB">FULLERTON RANGERS YOUTH SOCCER CLUB</option>
								<option value="FULWIDER * PATTON, LLP">FULWIDER * PATTON, LLP</option>
								<option value="FUSES UNLIMITED">FUSES UNLIMITED</option>
								<option value="FUSES UNLIMITED">FUSES UNLIMITED</option>
								<option value="FUSION PARTNERS, LLC.">FUSION PARTNERS, LLC.</option>
								<option value="FUTRPLAST EXTRUSIONS">FUTRPLAST EXTRUSIONS</option>
								<option value="FUTURE ELECTRONICS, INC">FUTURE ELECTRONICS, INC</option>
								<option value="FUTURE ELECTRONICS/TRADE DEPT.">FUTURE ELECTRONICS/TRADE DEPT.</option>
								<option value="FUTURE LIGHTING SOLUTIONS #1">FUTURE LIGHTING SOLUTIONS #1</option>
								<option value="FUTURE TRENDS TECHNOLOGY CONSULTING INC">FUTURE TRENDS TECHNOLOGY CONSULTING INC</option>
								<option value="G&S ELECTRICAL CONTRACTOR">G&S ELECTRICAL CONTRACTOR</option>
								<option value="G. MARTINEZ TRUCKING">G. MARTINEZ TRUCKING</option>
								<option value="G.H. MACHINERY">G.H. MACHINERY</option>
								<option value="G.L. WENTWORTH">G.L. WENTWORTH</option>
								<option value="GABRIEL PEREZ">GABRIEL PEREZ</option>
								<option value="GABRIELA E. SAYAGO">GABRIELA E. SAYAGO</option>
								<option value="GABRIELA ESCALANTE">GABRIELA ESCALANTE</option>
								<option value="GABRIELA GRANADOS MANCILLA">GABRIELA GRANADOS MANCILLA</option>
								<option value="GALAZ YAMAZAKI RUIZ URQUIZA, S">GALAZ YAMAZAKI RUIZ URQUIZA, S</option>
								<option value="GALVANIZADORA TIJUANA S.A. DE">GALVANIZADORA TIJUANA S.A. DE</option>
								<option value="GAMA MOLDS">GAMA MOLDS</option>
								<option value="GARDCO">GARDCO</option>
								<option value="GARFIELD TOOLS & MFG, LLC">GARFIELD TOOLS & MFG, LLC</option>
								<option value="GARY DYTOR">GARY DYTOR</option>
								<option value="GARY TAYLOR">GARY TAYLOR</option>
								<option value="GAS SILZA SA">GAS SILZA SA</option>
								<option value="GASOLINERA REFORMA SA">GASOLINERA REFORMA SA</option>
								<option value="GASSER BUSH">GASSER BUSH</option>
								<option value="GATEWAY DISTRIBUTION, INC.">GATEWAY DISTRIBUTION, INC.</option>
								<option value="GAVRIELI PLASTICS">GAVRIELI PLASTICS</option>
								<option value="GAYLOR ELECTRIC, INC.">GAYLOR ELECTRIC, INC.</option>
								<option value="GE CAPITAL SOLUTIONS - ACH">GE CAPITAL SOLUTIONS - ACH</option>
								<option value="GE LIGHTING">GE LIGHTING</option>
								<option value="GE POLYMERSHAPES">GE POLYMERSHAPES</option>
								<option value="GE SUPPLY ACCT# 580-5142575">GE SUPPLY ACCT# 580-5142575</option>
								<option value="GEI INC.">GEI INC.</option>
								<option value="GENERADORES DE ENERGIA DEL NOR">GENERADORES DE ENERGIA DEL NOR</option>
								<option value="GENERAL PLATING">GENERAL PLATING</option>
								<option value="GEORGE AGUILAR">GEORGE AGUILAR</option>
								<option value="GEORGE CHEVROLET">GEORGE CHEVROLET</option>
								<option value="GEORGE INDUSTRIES ANODIZE">GEORGE INDUSTRIES ANODIZE</option>
								<option value="GERALD L STICKLES JR.">GERALD L STICKLES JR.</option>
								<option value="GERARDO CORONA VELAZQUEZ">GERARDO CORONA VELAZQUEZ</option>
								<option value="GERARDO JULIAN ALVAREZ MADRIGA">GERARDO JULIAN ALVAREZ MADRIGA</option>
								<option value="GERARDO SANCHEZ JAUREGUI">GERARDO SANCHEZ JAUREGUI</option>
								<option value="GETHSEMANE CHURCH OF CHRIST">GETHSEMANE CHURCH OF CHRIST</option>
								<option value="GFC LIGHTING WHOLESALE, INC.">GFC LIGHTING WHOLESALE, INC.</option>
								<option value="GILBERTO GARCIA CASTRO">GILBERTO GARCIA CASTRO</option>
								<option value="GILDNER MADDOX">GILDNER MADDOX</option>
								<option value="GILLINDER BROTHERS, INC">GILLINDER BROTHERS, INC</option>
								<option value="GLASSWERKS">GLASSWERKS</option>
								<option value="GLOBAL EDM SUPPLIES, INC">GLOBAL EDM SUPPLIES, INC</option>
								<option value="GLOBAL INDUSTRIAL">GLOBAL INDUSTRIAL</option>
								<option value="GLOBAL SOURCE EXPEDITED, INC.">GLOBAL SOURCE EXPEDITED, INC.</option>
								<option value="GLOBAL SOURCE LOGISTICS">GLOBAL SOURCE LOGISTICS</option>
								<option value="GLOBALTRANZ ENTERPRISES INC">GLOBALTRANZ ENTERPRISES INC</option>
								<option value="GLYNN ELECTRIC">GLYNN ELECTRIC</option>
								<option value="GO ENGINEER,  INC.">GO ENGINEER,  INC.</option>
								<option value="GOBIERNO DEL ESTADO DE BAJA CA">GOBIERNO DEL ESTADO DE BAJA CA</option>
								<option value="GOLDEN STATE FIRE PROTECTION">GOLDEN STATE FIRE PROTECTION</option>
								<option value="GOLDENWEST LUBRICANTS, INC">GOLDENWEST LUBRICANTS, INC</option>
								<option value="GONZALES METAL SPINNING">GONZALES METAL SPINNING</option>
								<option value="GOOD IDEAS METAL SPINNING">GOOD IDEAS METAL SPINNING</option>
								<option value="GRAINGER, INC.">GRAINGER, INC.</option>
								<option value="GRAND VISION FOUNDATION">GRAND VISION FOUNDATION</option>
								<option value="GRANDLITE INTERNATIONAL CORPORATION">GRANDLITE INTERNATIONAL CORPORATION</option>
								<option value="GRAYCO ELECTRICAL, INC">GRAYCO ELECTRICAL, INC</option>
								<option value="GREAT AMERICAN ROLLING">GREAT AMERICAN ROLLING</option>
								<option value="GREAT SALT LAKE ELECTRIC, INC.">GREAT SALT LAKE ELECTRIC, INC.</option>
								<option value="GREGORIO GONZALEZ ROBINSON">GREGORIO GONZALEZ ROBINSON</option>
								<option value="GREGORY FRANCO HERNANDEZ JR.">GREGORY FRANCO HERNANDEZ JR.</option>
								<option value="GRIPLOCK SYSTEMS, LLC">GRIPLOCK SYSTEMS, LLC</option>
								<option value="GRUPO AMBIENTAL DEL NOROESTE">GRUPO AMBIENTAL DEL NOROESTE</option>
								<option value="GRUPO CONST. ALBERCAS Y JACUZI">GRUPO CONST. ALBERCAS Y JACUZI</option>
								<option value="GRUPO NACIONAL PROVINCIAL S.A.">GRUPO NACIONAL PROVINCIAL S.A.</option>
								<option value="GSC LIGHTING">GSC LIGHTING</option>
								<option value="GTH USED MACHINERY INTERNATIONAL INC">GTH USED MACHINERY INTERNATIONAL INC</option>
								<option value="GUADALUPE OLIVARES MORALES">GUADALUPE OLIVARES MORALES</option>
								<option value="GUADALUPE ORNELAS">GUADALUPE ORNELAS</option>
								<option value="GUARDIAN">GUARDIAN</option>
								<option value="GUILLERMO CASTRO PEREZ">GUILLERMO CASTRO PEREZ</option>
								<option value="GUILLERMO OLACHEA N">GUILLERMO OLACHEA N</option>
								<option value="GUSTAVO PILA">GUSTAVO PILA</option>
								<option value="GUTIERREZ HOLDING INC">GUTIERREZ HOLDING INC</option>
								<option value="H & H PALLET AND REPAIR SERVIC">H & H PALLET AND REPAIR SERVIC</option>
								<option value="H & H PRESCOTT">H & H PRESCOTT</option>
								<option value="H & H REFLECTORS">H & H REFLECTORS</option>
								<option value="H & M FOUNDRY INC.">H & M FOUNDRY INC.</option>
								<option value="H&J CABINETS">H&J CABINETS</option>
								<option value="H. W. ECKHARDT CORP">H. W. ECKHARDT CORP</option>
								<option value="H.E. WILLIAMS, INC.">H.E. WILLIAMS, INC.</option>
								<option value="HAGEN NOBLE & ASSOCIATES, INC">HAGEN NOBLE & ASSOCIATES, INC</option>
								<option value="HALDOR (1972) LTD.">HALDOR (1972) LTD.</option>
								<option value="HANNAH METALS, INC.">HANNAH METALS, INC.</option>
								<option value="HANSEN'S WELDING, INC">HANSEN'S WELDING, INC</option>
								<option value="HANSON RIVET">HANSON RIVET</option>
								<option value="HAPCO">HAPCO</option>
								<option value="HARBOR FREIGHT ACCT#VSNR902">HARBOR FREIGHT ACCT#VSNR902</option>
								<option value="HARRINGTON ENERGY VENTURES, INC">HARRINGTON ENERGY VENTURES, INC</option>
								<option value="HARRY D. HARTMAN">HARRY D. HARTMAN</option>
								<option value="HASCO OIL CO.">HASCO OIL CO.</option>
								<option value="HEATH ELECTRIC, INC.">HEATH ELECTRIC, INC.</option>
								<option value="HEAVY INDUSTRIES THEMING CORPO">HEAVY INDUSTRIES THEMING CORPO</option>
								<option value="HECTOR VEGA MENDEZ">HECTOR VEGA MENDEZ</option>
								<option value="HEIN LIGHTING AND ELECTRIC, INC.">HEIN LIGHTING AND ELECTRIC, INC.</option>
								<option value="HELEN SANTA CRUZ">HELEN SANTA CRUZ</option>
								<option value="HENKEL CORPORATION">HENKEL CORPORATION</option>
								<option value="HENRY CORLETO">HENRY CORLETO</option>
								<option value="HENRY SOMERVILLE">HENRY SOMERVILLE</option>
								<option value="HENRY'S METAL POLISHING">HENRY'S METAL POLISHING</option>
								<option value="HERMINIO MONTOYA DE LA ROSA">HERMINIO MONTOYA DE LA ROSA</option>
								<option value="HERSCHAL PRODUCTS">HERSCHAL PRODUCTS</option>
								<option value="HERTZ EQUIPMENT RENTAL">HERTZ EQUIPMENT RENTAL</option>
								<option value="HEYCO PRODUCTS, INC.">HEYCO PRODUCTS, INC.</option>
								<option value="HI TEC DE MEXICO SA DE CV">HI TEC DE MEXICO SA DE CV</option>
								<option value="HI-TECH SOURCES">HI-TECH SOURCES</option>
								<option value="HIDDEN PEAK ELECTRIC CO., INC.">HIDDEN PEAK ELECTRIC CO., INC.</option>
								<option value="HIGH TECH ELECTRIC INC">HIGH TECH ELECTRIC INC</option>
								<option value="HILCO INDUSTRIAL, LLC">HILCO INDUSTRIAL, LLC</option>
								<option value="HILLCOR DISTRIBUTION, INC">HILLCOR DISTRIBUTION, INC</option>
								<option value="HISCO ACQUISITION SUBSIDIARY I, INC.">HISCO ACQUISITION SUBSIDIARY I, INC.</option>
								<option value="HISCO, INC">HISCO, INC</option>
								<option value="HOLLAND ENTERPRISES">HOLLAND ENTERPRISES</option>
								<option value="HOME DEPT CREDIT SERVICES">HOME DEPT CREDIT SERVICES</option>
								<option value="HONORIO MARQUEZ RODRIGUEZ">HONORIO MARQUEZ RODRIGUEZ</option>
								<option value="HOPKINS MANUFACTURING COPR">HOPKINS MANUFACTURING COPR</option>
								<option value="HORIZON SOLUTIONS, LLC">HORIZON SOLUTIONS, LLC</option>
								<option value="HOT SERVICES">HOT SERVICES</option>
								<option value="HOTEL AZTECA INN SA DE CV">HOTEL AZTECA INN SA DE CV</option>
								<option value="HOTELERA CORAL SA DE CV">HOTELERA CORAL SA DE CV</option>
								<option value="HOWARD INDUSTRIES INC">HOWARD INDUSTRIES INC</option>
								<option value="HOWARD RUSHER">HOWARD RUSHER</option>
								<option value="HOWARD SCRAP METAL">HOWARD SCRAP METAL</option>
								<option value="HSBC LOC">HSBC LOC</option>
								<option value="HUB MANUFACTURING">HUB MANUFACTURING</option>
								<option value="HUBBELL LIGHTING, INC  #22058">HUBBELL LIGHTING, INC  #22058</option>
								<option value="HUDSON TOOL STEEL CORP">HUDSON TOOL STEEL CORP</option>
								<option value="HUGO Z. FLORES J">HUGO Z. FLORES J</option>
								<option value="HUGO'S BODY SHOP">HUGO'S BODY SHOP</option>
								<option value="HYGENEX, INC">HYGENEX, INC</option>
								<option value="I + D MEXICO S.A DE C.V">I + D MEXICO S.A DE C.V</option>
								<option value="I-SOURCE TECHNNICAL SERVICES, INC">I-SOURCE TECHNNICAL SERVICES, INC</option>
								<option value="I. GUERRA, INC.">I. GUERRA, INC.</option>
								<option value="I.D.F.S.">I.D.F.S.</option>
								<option value="ID CORP">ID CORP</option>
								<option value="IDEAL ANODIZING">IDEAL ANODIZING</option>
								<option value="IDEAL LIGHTING SUPPLY">IDEAL LIGHTING SUPPLY</option>
								<option value="IES OKLAHOMA CITY SECTION">IES OKLAHOMA CITY SECTION</option>
								<option value="IFS COATINGS, INC">IFS COATINGS, INC</option>
								<option value="IGNACIO ALBERTO LOAIZA PRIETO">IGNACIO ALBERTO LOAIZA PRIETO</option>
								<option value="IGNACIO FELIX COTA">IGNACIO FELIX COTA</option>
								<option value="ILLINOIS DEPT. OF REVENUE">ILLINOIS DEPT. OF REVENUE</option>
								<option value="ILLUMINATING ENGINEERING SOCIETY - LA CHAPTER">ILLUMINATING ENGINEERING SOCIETY - LA CHAPTER</option>
								<option value="ILLUMINATING RESOURCES">ILLUMINATING RESOURCES</option>
								<option value="ILLUMINATION">ILLUMINATION</option>
								<option value="ILLUMINATION CONCEPTS & SALES">ILLUMINATION CONCEPTS & SALES</option>
								<option value="ILLUMINATION LABORATORY, LLC">ILLUMINATION LABORATORY, LLC</option>
								<option value="ILSCO, UTILCO, GLENMOOR AND FTZ INDUSTRIES">ILSCO, UTILCO, GLENMOOR AND FTZ INDUSTRIES</option>
								<option value="IMAGING FACTORY S.A. DE C.V.">IMAGING FACTORY S.A. DE C.V.</option>
								<option value="IMS COMPANY">IMS COMPANY</option>
								<option value="INCEPTION WINES LLC.">INCEPTION WINES LLC.</option>
								<option value="INDEPENDENCE LIGHTING">INDEPENDENCE LIGHTING</option>
								<option value="INDEPENDENT ELECTRIC">INDEPENDENT ELECTRIC</option>
								<option value="INDEPENDENT FOUNDRY SUPPLY CO.">INDEPENDENT FOUNDRY SUPPLY CO.</option>
								<option value="INDEPENDENT LIGHTING SALES">INDEPENDENT LIGHTING SALES</option>
								<option value="INDEPENDENT TESTING LABORATORIES, INC">INDEPENDENT TESTING LABORATORIES, INC</option>
								<option value="INDUSTRIAL GLASS PRODUCTS">INDUSTRIAL GLASS PRODUCTS</option>
								<option value="INDUSTRIAL METAL SUPPLY COMPANY">INDUSTRIAL METAL SUPPLY COMPANY</option>
								<option value="INDUSTRIAL PIPE & STEEL">INDUSTRIAL PIPE & STEEL</option>
								<option value="INDUSTRIAL SAFETY DE MEXICO SA">INDUSTRIAL SAFETY DE MEXICO SA</option>
								<option value="INDUSTRIAL SAFETY SHOE COMPANY">INDUSTRIAL SAFETY SHOE COMPANY</option>
								<option value="INDUSTRIALIZADORA Y MADERERA">INDUSTRIALIZADORA Y MADERERA</option>
								<option value="INDUSTRIAS GALVANIZADORAS PROZINC SA DE CV">INDUSTRIAS GALVANIZADORAS PROZINC SA DE CV</option>
								<option value="INDUSTRIAS SOLA BASIC, S.A.">INDUSTRIAS SOLA BASIC, S.A.</option>
								<option value="INDUSTRY COMPRESSOR CO.">INDUSTRY COMPRESSOR CO.</option>
								<option value="INFINITY LIGHTING, INC.">INFINITY LIGHTING, INC.</option>
								<option value="INFRA SA DE CV">INFRA SA DE CV</option>
								<option value="INGLEWOOD SHEET METAL">INGLEWOOD SHEET METAL</option>
								<option value="INGLEWOOD WHOLESALE">INGLEWOOD WHOLESALE</option>
								<option value="INLAND EMPIRE WELDER REPAIR, INC.">INLAND EMPIRE WELDER REPAIR, INC.</option>
								<option value="INLAND POWDER COATING">INLAND POWDER COATING</option>
								<option value="INNOVATIVE BRASS LTG">INNOVATIVE BRASS LTG</option>
								<option value="INNOVATIVE CAPITAL RESOURCES SC, INC.">INNOVATIVE CAPITAL RESOURCES SC, INC.</option>
								<option value="INNOVATIVE LIGHTING SOLUTIONS, LLC">INNOVATIVE LIGHTING SOLUTIONS, LLC</option>
								<option value="INNOVATIVE STAMPING CORP">INNOVATIVE STAMPING CORP</option>
								<option value="INSTALACIONES INDUSTRIALES IIN">INSTALACIONES INDUSTRIALES IIN</option>
								<option value="INSTANT IMPRESSIONS, INC">INSTANT IMPRESSIONS, INC</option>
								<option value="INSTRUMENTATION & MECHANICAL S">INSTRUMENTATION & MECHANICAL S</option>
								<option value="INTEGRATED PLASTICS MACHINERY">INTEGRATED PLASTICS MACHINERY</option>
								<option value="INTEGRITY ELECTRIC, INC.">INTEGRITY ELECTRIC, INC.</option>
								<option value="INTERNATIONAL EXTRUSION CORP">INTERNATIONAL EXTRUSION CORP</option>
								<option value="INTERNATIONAL PLATING SERVICE, LLC">INTERNATIONAL PLATING SERVICE, LLC</option>
								<option value="INTERPORT FREIGHT SYSTEMS, INC">INTERPORT FREIGHT SYSTEMS, INC</option>
								<option value="INTERTEK TESTING SERVICES NA, INC">INTERTEK TESTING SERVICES NA, INC</option>
								<option value="INVERSE LIGHTING">INVERSE LIGHTING</option>
								<option value="IOTA ENGINEERING,L.L.C.">IOTA ENGINEERING,L.L.C.</option>
								<option value="IPFS CORPORATION">IPFS CORPORATION</option>
								<option value="IPSWITCH FILE TRANSFER">IPSWITCH FILE TRANSFER</option>
								<option value="IRIS CHEMICAL S.A. DE C.V.">IRIS CHEMICAL S.A. DE C.V.</option>
								<option value="ISIDRO QUIROZ VILLA">ISIDRO QUIROZ VILLA</option>
								<option value="ISMAEL GONZALEZ">ISMAEL GONZALEZ</option>
								<option value="ISRAEL ANTELMO CASTELLANOS BAL">ISRAEL ANTELMO CASTELLANOS BAL</option>
								<option value="ISRRAEL HERNANDEZ CARDENAS">ISRRAEL HERNANDEZ CARDENAS</option>
								<option value="ITL BOULDER">ITL BOULDER</option>
								<option value="IVAN MEDINA DIAZ">IVAN MEDINA DIAZ</option>
								<option value="J & I DIRECT INC">J & I DIRECT INC</option>
								<option value="J & J ELECTRIC OF INDIANA, INC.">J & J ELECTRIC OF INDIANA, INC.</option>
								<option value="J & L INDUSTRIAL ACCT.#739509">J & L INDUSTRIAL ACCT.#739509</option>
								<option value="J ELEAZAR JARAL GONZALEZ">J ELEAZAR JARAL GONZALEZ</option>
								<option value="J&S CHEMICAL">J&S CHEMICAL</option>
								<option value="J. JESUS SILVA MARTINEZ">J. JESUS SILVA MARTINEZ</option>
								<option value="J. V.'S  MACHINE SHOP">J. V.'S  MACHINE SHOP</option>
								<option value="J.A. CRAWFORD CO">J.A. CRAWFORD CO</option>
								<option value="J.BECHER & ASSOC. INC.">J.BECHER & ASSOC. INC.</option>
								<option value="JACK DUFFY AND ASSOCIATES">JACK DUFFY AND ASSOCIATES</option>
								<option value="JACK T. HILL ELECTRIC CO., INC">JACK T. HILL ELECTRIC CO., INC</option>
								<option value="JAIME RODRIGUEZ CRISTOBAL">JAIME RODRIGUEZ CRISTOBAL</option>
								<option value="JAIME ZAMUDIO">JAIME ZAMUDIO</option>
								<option value="JAMES FOXX">JAMES FOXX</option>
								<option value="JAMES G MURPHY">JAMES G MURPHY</option>
								<option value="JANSEN SUPPLY CO.">JANSEN SUPPLY CO.</option>
								<option value="JB LIGHTING ASSOCIATES LLC">JB LIGHTING ASSOCIATES LLC</option>
								<option value="JB SPRAY">JB SPRAY</option>
								<option value="JBJ USA">JBJ USA</option>
								<option value="JC ELECTRIC COMPANY">JC ELECTRIC COMPANY</option>
								<option value="JC WRIGHT LIGHTING">JC WRIGHT LIGHTING</option>
								<option value="JDL-PACKAGAGING SYSTEMS, INC.">JDL-PACKAGAGING SYSTEMS, INC.</option>
								<option value="JDP ELECTRIC INC">JDP ELECTRIC INC</option>
								<option value="JEANNETTE SPECIALTY GLASS">JEANNETTE SPECIALTY GLASS</option>
								<option value="JENNIFER HERNANDEZ">JENNIFER HERNANDEZ</option>
								<option value="JENNIFER ZUBIATE">JENNIFER ZUBIATE</option>
								<option value="JEREMY STREIT">JEREMY STREIT</option>
								<option value="JERRY ELLIS">JERRY ELLIS</option>
								<option value="JESSICA PEREZ">JESSICA PEREZ</option>
								<option value="JESUS ALBERTO RODRIGUEZ">JESUS ALBERTO RODRIGUEZ</option>
								<option value="JESUS HERNANDEZ RAMIREZ">JESUS HERNANDEZ RAMIREZ</option>
								<option value="JESUS ISABEL CASTA±EDA C">JESUS ISABEL CASTA±EDA C</option>
								<option value="JETT FITTINGS">JETT FITTINGS</option>
								<option value="JIANXIONG ZHU">JIANXIONG ZHU</option>
								<option value="JIM CROUCH">JIM CROUCH</option>
								<option value="JK DCM & ENGINEERING, INC">JK DCM & ENGINEERING, INC</option>
								<option value="JMEG, L.P.">JMEG, L.P.</option>
								<option value="JO-G'S GLASS CO.">JO-G'S GLASS CO.</option>
								<option value="JOAQUIN LINARES GOMEZ ALVAREZ">JOAQUIN LINARES GOMEZ ALVAREZ</option>
								<option value="JOE D KAY">JOE D KAY</option>
								<option value="JOE HERBST">JOE HERBST</option>
								<option value="JOHN LOPES ELECTRIC">JOHN LOPES ELECTRIC</option>
								<option value="JOHN MOORE & ASSOCIATES">JOHN MOORE & ASSOCIATES</option>
								<option value="JOHNS FORKLIFT">JOHNS FORKLIFT</option>
								<option value="JOHNS LUMBER">JOHNS LUMBER</option>
								<option value="JORGE ARTURO SOTELO FELIX">JORGE ARTURO SOTELO FELIX</option>
								<option value="JORGE CASTILLO">JORGE CASTILLO</option>
								<option value="JORGE ESCALANTE PINA">JORGE ESCALANTE PINA</option>
								<option value="JORGE LUIS GAONA VACA">JORGE LUIS GAONA VACA</option>
								<option value="JORGE MORENO">JORGE MORENO</option>
								<option value="JORGE PEREYRA ELIAS">JORGE PEREYRA ELIAS</option>
								<option value="JOSE AUTO DETAILING">JOSE AUTO DETAILING</option>
								<option value="JOSE DE JESUS NICOLAS RUIZ H.">JOSE DE JESUS NICOLAS RUIZ H.</option>
								<option value="JOSE EDUARDO FIERRO MELENDEZ">JOSE EDUARDO FIERRO MELENDEZ</option>
								<option value="JOSE EDUARDO PEREZ OLIVO">JOSE EDUARDO PEREZ OLIVO</option>
								<option value="JOSE GILBERTO GARCIA SALAIZA">JOSE GILBERTO GARCIA SALAIZA</option>
								<option value="JOSE GUADALUPE AVILA COVARRUBI">JOSE GUADALUPE AVILA COVARRUBI</option>
								<option value="JOSE GUADALUPE MORALES GUEVAR">JOSE GUADALUPE MORALES GUEVAR</option>
								<option value="JOSE JAIME GONZALEZ">JOSE JAIME GONZALEZ</option>
								<option value="JOSE LOPEZ">JOSE LOPEZ</option>
								<option value="JOSE LUIS ARCE RAMOS">JOSE LUIS ARCE RAMOS</option>
								<option value="JOSE LUIS GOMEZ GUITRON">JOSE LUIS GOMEZ GUITRON</option>
								<option value="JOSE LUIS LOPEZ">JOSE LUIS LOPEZ</option>
								<option value="JOSE LUIS PEREZ ROCHA">JOSE LUIS PEREZ ROCHA</option>
								<option value="JOSE R. CHAVEZ">JOSE R. CHAVEZ</option>
								<option value="JOSE RAFAEL LOPEZ">JOSE RAFAEL LOPEZ</option>
								<option value="JOSE VALENCIA">JOSE VALENCIA</option>
								<option value="JOSE VASQUEZ">JOSE VASQUEZ</option>
								<option value="JUAN ELIAS LARA">JUAN ELIAS LARA</option>
								<option value="JUAN GONZALES">JUAN GONZALES</option>
								<option value="JUAN MARTINEZ">JUAN MARTINEZ</option>
								<option value="JUAN RAMON GONZALEZ RODRIGUEZ">JUAN RAMON GONZALEZ RODRIGUEZ</option>
								<option value="JUAN VALENZUELA V">JUAN VALENZUELA V</option>
								<option value="JUAN VILLA RAMOS">JUAN VILLA RAMOS</option>
								<option value="JUKI AUTOMATION SYSTEMS">JUKI AUTOMATION SYSTEMS</option>
								<option value="JULES & ASSOCIATES, INC - ACH">JULES & ASSOCIATES, INC - ACH</option>
								<option value="JULIAN FERGUSON & ASSOC., INC">JULIAN FERGUSON & ASSOC., INC</option>
								<option value="JULIO VEGA">JULIO VEGA</option>
								<option value="JW ELECTRIC">JW ELECTRIC</option>
								<option value="K. RICHARDSON, INC.">K. RICHARDSON, INC.</option>
								<option value="K.K. MOLDS INC">K.K. MOLDS INC</option>
								<option value="KAFCO DE MEXICO S.A. DE C.V.">KAFCO DE MEXICO S.A. DE C.V.</option>
								<option value="KAL INDUSTRIES">KAL INDUSTRIES</option>
								<option value="KALEIDASCOPE POLISHING">KALEIDASCOPE POLISHING</option>
								<option value="KAREN VALENTI TASTENSEN">KAREN VALENTI TASTENSEN</option>
								<option value="KARINA FRANCO LAGUARDIA">KARINA FRANCO LAGUARDIA</option>
								<option value="KARLOZ REGISTRATION & INS. SVCS. INC">KARLOZ REGISTRATION & INS. SVCS. INC</option>
								<option value="KATHLEEN NICHOLSON">KATHLEEN NICHOLSON</option>
								<option value="KB STEPHENS CO">KB STEPHENS CO</option>
								<option value="KBI ELECTRICAL SERVICES INC">KBI ELECTRICAL SERVICES INC</option>
								<option value="KEENTEC SA">KEENTEC SA</option>
								<option value="KELCO SALES">KELCO SALES</option>
								<option value="KELLENGERGER ELECTRIC, INC">KELLENGERGER ELECTRIC, INC</option>
								<option value="KELLER AEROSOL">KELLER AEROSOL</option>
								<option value="KELLY PAPER">KELLY PAPER</option>
								<option value="KEN-MAC METALS">KEN-MAC METALS</option>
								<option value="KEVIN IVAN ESCALANTE">KEVIN IVAN ESCALANTE</option>
								<option value="KEVIN M SAUERHEBER">KEVIN M SAUERHEBER</option>
								<option value="KEVIN SANTANA">KEVIN SANTANA</option>
								<option value="KIMBERLEY BROTHERS">KIMBERLEY BROTHERS</option>
								<option value="KIMBERLY MCKENDELL">KIMBERLY MCKENDELL</option>
								<option value="KIMBERLY STEWART">KIMBERLY STEWART</option>
								<option value="KIPE MOLDS, INC">KIPE MOLDS, INC</option>
								<option value="KIRK SOMMER SALES, INC">KIRK SOMMER SALES, INC</option>
								<option value="KIRKER KUBALA">KIRKER KUBALA</option>
								<option value="KM TOOL & SUPPLY">KM TOOL & SUPPLY</option>
								<option value="KNIGHT INDUSTRIAL SUPPLY, INC.">KNIGHT INDUSTRIAL SUPPLY, INC.</option>
								<option value="KOPP GLASS, INC.">KOPP GLASS, INC.</option>
								<option value="KORMOS & BAJAK">KORMOS & BAJAK</option>
								<option value="KRAUSS-MAFFEI CORPORATION">KRAUSS-MAFFEI CORPORATION</option>
								<option value="KRAYDEN, INC.">KRAYDEN, INC.</option>
								<option value="KS DIRECT">KS DIRECT</option>
								<option value="KSA LIGHTING INC">KSA LIGHTING INC</option>
								<option value="KT MACHINING, INC.">KT MACHINING, INC.</option>
								<option value="KUMHO ELECTRIC">KUMHO ELECTRIC</option>
								<option value="KW INDUSTRIES, INC">KW INDUSTRIES, INC</option>
								<option value="KYOCERA SOLAR, INC.">KYOCERA SOLAR, INC.</option>
								<option value="L & J SUPPLY">L & J SUPPLY</option>
								<option value="L & L DIE CASTING">L & L DIE CASTING</option>
								<option value="L.O.P. LLC">L.O.P. LLC</option>
								<option value="LA GALVANIZING">LA GALVANIZING</option>
								<option value="LADEAU MANUFACTORING, CO">LADEAU MANUFACTORING, CO</option>
								<option value="LAFACE & MCGOVERN ASSOCIATES, INC.- PA">LAFACE & MCGOVERN ASSOCIATES, INC.- PA</option>
								<option value="LAFACE & MCGOVERN OF WEST VIRGINIA, LLC">LAFACE & MCGOVERN OF WEST VIRGINIA, LLC</option>
								<option value="LAFRANCE MANUFACTORING CO">LAFRANCE MANUFACTORING CO</option>
								<option value="LAMPS AND PARTS DIST. INC">LAMPS AND PARTS DIST. INC</option>
								<option value="LANDRETH INC">LANDRETH INC</option>
								<option value="LANDSCAPE COMMUNICATIONS, INC">LANDSCAPE COMMUNICATIONS, INC</option>
								<option value="LANDSTAR INWAY, INC">LANDSTAR INWAY, INC</option>
								<option value="LAPP TANNEHILL, INC">LAPP TANNEHILL, INC</option>
								<option value="LARRY BRANAM">LARRY BRANAM</option>
								<option value="LARRY E. HILL">LARRY E. HILL</option>
								<option value="LAST METAL POLISHING">LAST METAL POLISHING</option>
								<option value="LAURA GUADALUPE GOMEZ RAMIREZ">LAURA GUADALUPE GOMEZ RAMIREZ</option>
								<option value="LAWSON PRODUCTS, INC">LAWSON PRODUCTS, INC</option>
								<option value="LAX EQUIPMENT">LAX EQUIPMENT</option>
								<option value="LEDIL OY">LEDIL OY</option>
								<option value="LENDAR DESIGN, INC">LENDAR DESIGN, INC</option>
								<option value="LEONCIO FERNANDO CORONA RIOS">LEONCIO FERNANDO CORONA RIOS</option>
								<option value="LEROY DANIELS">LEROY DANIELS</option>
								<option value="LEVITON">LEVITON</option>
								<option value="LEXALITE INTERNATIONAL">LEXALITE INTERNATIONAL</option>
								<option value="LIBERTY BRASS TURNING CO. INC.">LIBERTY BRASS TURNING CO. INC.</option>
								<option value="LIC. ISRAEIL ANTELMO CASTELLAN">LIC. ISRAEIL ANTELMO CASTELLAN</option>
								<option value="LICONA LIGHTING COMPONETS CORP">LICONA LIGHTING COMPONETS CORP</option>
								<option value="LIETZAU PATTERNS, INC.">LIETZAU PATTERNS, INC.</option>
								<option value="LIGHT LABORATORY, INC.">LIGHT LABORATORY, INC.</option>
								<option value="LIGHT WAVE">LIGHT WAVE</option>
								<option value="LIGHT-WAVES ELECTRONICS, INC.">LIGHT-WAVES ELECTRONICS, INC.</option>
								<option value="LIGHTFAIR INTERNATIONAL">LIGHTFAIR INTERNATIONAL</option>
								<option value="LIGHTHOUSE INDUSTRIES">LIGHTHOUSE INDUSTRIES</option>
								<option value="LIGHTING & ELECTRICAL ASSOCIATES - B.R.">LIGHTING & ELECTRICAL ASSOCIATES - B.R.</option>
								<option value="LIGHTING ANALYSTS, INC.">LIGHTING ANALYSTS, INC.</option>
								<option value="LIGHTING ASSOCIATES">LIGHTING ASSOCIATES</option>
								<option value="LIGHTING DYNAMICS, INC.">LIGHTING DYNAMICS, INC.</option>
								<option value="LIGHTING SCIENCE, INC.">LIGHTING SCIENCE, INC.</option>
								<option value="LIGHTING SOLUTIONS INC">LIGHTING SOLUTIONS INC</option>
								<option value="LIGHTING TRENDS">LIGHTING TRENDS</option>
								<option value="LIGHTLAB INTERNATIONAL INC">LIGHTLAB INTERNATIONAL INC</option>
								<option value="LINCO INDUSTRIES">LINCO INDUSTRIES</option>
								<option value="LINEAR TECHNOLOGIES">LINEAR TECHNOLOGIES</option>
								<option value="LITE TECH">LITE TECH</option>
								<option value="LITOGRAFICA OLIMPICA SA">LITOGRAFICA OLIMPICA SA</option>
								<option value="LITZEBAUER ELECTRIC, INC">LITZEBAUER ELECTRIC, INC</option>
								<option value="LIZBETH SEGOVIA H">LIZBETH SEGOVIA H</option>
								<option value="LJR GRINDING CORP">LJR GRINDING CORP</option>
								<option value="LLANTAS, CAMARAS Y SERVICIOS">LLANTAS, CAMARAS Y SERVICIOS</option>
								<option value="LOEN ELECTRIC, INC.">LOEN ELECTRIC, INC.</option>
								<option value="LONG IFE LIGHTING">LONG IFE LIGHTING</option>
								<option value="LONG-LOK FASTENERS CORPORATION">LONG-LOK FASTENERS CORPORATION</option>
								<option value="LORD & SONS, INC">LORD & SONS, INC</option>
								<option value="LOS ANGELES COUNTY TAX COLLECTOR">LOS ANGELES COUNTY TAX COLLECTOR</option>
								<option value="LOS ANGELES SHERIFF'S PROFESSIONAL">LOS ANGELES SHERIFF'S PROFESSIONAL</option>
								<option value="LOS FEMATE SA DE CV">LOS FEMATE SA DE CV</option>
								<option value="LOWE ELECTRIC SUPPLY, CO.">LOWE ELECTRIC SUPPLY, CO.</option>
								<option value="LTI OPTICS, LLC">LTI OPTICS, LLC</option>
								<option value="LTS NY, INC">LTS NY, INC</option>
								<option value="LUCIBELLO ELECTRIC CO., INC.">LUCIBELLO ELECTRIC CO., INC.</option>
								<option value="LUDOVICO ACOSTA CHAMORRO">LUDOVICO ACOSTA CHAMORRO</option>
								<option value="LUIS ALBERTO RIOS M">LUIS ALBERTO RIOS M</option>
								<option value="LUIS ALFONSO AVINA RODRIGUEZ">LUIS ALFONSO AVINA RODRIGUEZ</option>
								<option value="LUIS ANDRADE">LUIS ANDRADE</option>
								<option value="LUIS ANTONIA PALOMINO DAGUG">LUIS ANTONIA PALOMINO DAGUG</option>
								<option value="LUIS ANTONIO VARGAS C">LUIS ANTONIO VARGAS C</option>
								<option value="LUIS B. GARCIA">LUIS B. GARCIA</option>
								<option value="LUIS CARMINE SOLA HERNANDEZ">LUIS CARMINE SOLA HERNANDEZ</option>
								<option value="LUIS ESTEBAN PACHECO OLVERA">LUIS ESTEBAN PACHECO OLVERA</option>
								<option value="LUIS LOPEZ ALCANTAR">LUIS LOPEZ ALCANTAR</option>
								<option value="LUMA TECH SOLUTIONS">LUMA TECH SOLUTIONS</option>
								<option value="LUMATRAK, INC">LUMATRAK, INC</option>
								<option value="LUMEN ARK">LUMEN ARK</option>
								<option value="LUMEN FX">LUMEN FX</option>
								<option value="LUMEN POWER SOURCES">LUMEN POWER SOURCES</option>
								<option value="LUMEN SALES">LUMEN SALES</option>
								<option value="LUMINAIRE SERVICE, INC.">LUMINAIRE SERVICE, INC.</option>
								<option value="LUMINAIRE TESTING LAB, INC">LUMINAIRE TESTING LAB, INC</option>
								<option value="LUMINANCE">LUMINANCE</option>
								<option value="LUMINUS DEVICES">LUMINUS DEVICES</option>
								<option value="LYDIA CASTILLO">LYDIA CASTILLO</option>
								<option value="LYNCH METALS">LYNCH METALS</option>
								<option value="LYNWOOD PATTERN SERVICE, INC.">LYNWOOD PATTERN SERVICE, INC.</option>
								<option value="M & K METAL CO.">M & K METAL CO.</option>
								<option value="M & L METAL SPINNING">M & L METAL SPINNING</option>
								<option value="M & M MACHINERY MOVING, INC">M & M MACHINERY MOVING, INC</option>
								<option value="M & M METALS">M & M METALS</option>
								<option value="M & M SALES LLC">M & M SALES LLC</option>
								<option value="M AND M BOOK BINDERY">M AND M BOOK BINDERY</option>
								<option value="M TECHS">M TECHS</option>
								<option value="M.P. SERVICES (JEFF P.)">M.P. SERVICES (JEFF P.)</option>
								<option value="MACHINE TOOLS SUPPLY">MACHINE TOOLS SUPPLY</option>
								<option value="MADDENBOLT.COM">MADDENBOLT.COM</option>
								<option value="MAGNETEK">MAGNETEK</option>
								<option value="MAGNUM ELECTRIC">MAGNUM ELECTRIC</option>
								<option value="MAGTECH">MAGTECH</option>
								<option value="MAJOR REFLECTOR PRODUCTS">MAJOR REFLECTOR PRODUCTS</option>
								<option value="MANATIALES DEL REAL SA">MANATIALES DEL REAL SA</option>
								<option value="MANDO LUEVANO">MANDO LUEVANO</option>
								<option value="MANGANAL SALES COMP.">MANGANAL SALES COMP.</option>
								<option value="MANHATTAN WIRELESS">MANHATTAN WIRELESS</option>
								<option value="MANUEL A. PACHECO OLVERA">MANUEL A. PACHECO OLVERA</option>
								<option value="MANUFACTURAS EN ACERO SA DE CV">MANUFACTURAS EN ACERO SA DE CV</option>
								<option value="MAQUILACERO">MAQUILACERO</option>
								<option value="MAQUINADOS Y SERVICIOS CUELLAR">MAQUINADOS Y SERVICIOS CUELLAR</option>
								<option value="MAR VISTA SALES">MAR VISTA SALES</option>
								<option value="MARCAS Y FRANQUICIS SC">MARCAS Y FRANQUICIS SC</option>
								<option value="MARCO ANTONIO FERMIN ESTEVEZ">MARCO ANTONIO FERMIN ESTEVEZ</option>
								<option value="MARCO WINICIO PINEDA VILLEGAS">MARCO WINICIO PINEDA VILLEGAS</option>
								<option value="MARFRED INDUSTRIES">MARFRED INDUSTRIES</option>
								<option value="MARGARITA NOVELA ARTEAGA">MARGARITA NOVELA ARTEAGA</option>
								<option value="MARGARITA VASQUEZ BUSTAMANTE">MARGARITA VASQUEZ BUSTAMANTE</option>
								<option value="MARIA ANTONIETA ABRIL ALATORRE">MARIA ANTONIETA ABRIL ALATORRE</option>
								<option value="MARIA C. LOPEZ">MARIA C. LOPEZ</option>
								<option value="MARIA CONCEPCION SUAREZ LOPEZ">MARIA CONCEPCION SUAREZ LOPEZ</option>
								<option value="MARIA GUADALUPE GARCIA BARRAGA">MARIA GUADALUPE GARCIA BARRAGA</option>
								<option value="MARIA HERLINDA SOTELO FELIX">MARIA HERLINDA SOTELO FELIX</option>
								<option value="MARIA LANDA">MARIA LANDA</option>
								<option value="MARIA LUISA CARBAJAL GAMEZ">MARIA LUISA CARBAJAL GAMEZ</option>
								<option value="MARIA MIRANDA M">MARIA MIRANDA M</option>
								<option value="MARIA ROSARIO GALINDO">MARIA ROSARIO GALINDO</option>
								<option value="MARIBEL DEL SOCORRO LOPEZ Z">MARIBEL DEL SOCORRO LOPEZ Z</option>
								<option value="MARIELA RAZO HIGUERA">MARIELA RAZO HIGUERA</option>
								<option value="MARIO BERNABE GOMEZ">MARIO BERNABE GOMEZ</option>
								<option value="MARMEN KEY STONE STEEL">MARMEN KEY STONE STEEL</option>
								<option value="MARTHA GUADALUPE BENITEZ RAMIR">MARTHA GUADALUPE BENITEZ RAMIR</option>
								<option value="MARTIN MORA">MARTIN MORA</option>
								<option value="MARTIN SANTOS">MARTIN SANTOS</option>
								<option value="MARUICHI AMERICAN CORP.">MARUICHI AMERICAN CORP.</option>
								<option value="MATERIAL HANDLING SUPPLY, INC">MATERIAL HANDLING SUPPLY, INC</option>
								<option value="MATERIALES Y EQUIPOS">MATERIALES Y EQUIPOS</option>
								<option value="MATRIX TOOLING CORPORATION, INC.">MATRIX TOOLING CORPORATION, INC.</option>
								<option value="MATTHEW SCOTT">MATTHEW SCOTT</option>
								<option value="MAVERICK TUBE CORP. ACCT.45906">MAVERICK TUBE CORP. ACCT.45906</option>
								<option value="MAYFIELD LIGHTING SALES, INC">MAYFIELD LIGHTING SALES, INC</option>
								<option value="MC WONG INTERNATIONAL">MC WONG INTERNATIONAL</option>
								<option value="MCC LIENMASTER">MCC LIENMASTER</option>
								<option value="MCC TRANSPORT, INC.">MCC TRANSPORT, INC.</option>
								<option value="MCDOWELL AGENCY">MCDOWELL AGENCY</option>
								<option value="MCMASTER CARR">MCMASTER CARR</option>
								<option value="MCNICHOLS">MCNICHOLS</option>
								<option value="MDE ELECTRICAL MECHANICAL CONTRACTORS">MDE ELECTRICAL MECHANICAL CONTRACTORS</option>
								<option value="MEAN WELL USA, INC.">MEAN WELL USA, INC.</option>
								<option value="MEDALLION LIGHTING">MEDALLION LIGHTING</option>
								<option value="MEDAM, S. DE R.L. DE C.V.">MEDAM, S. DE R.L. DE C.V.</option>
								<option value="MEDERERA DEL RIO S.A. DE C.V">MEDERERA DEL RIO S.A. DE C.V</option>
								<option value="MEDINA ELECTRIC, INC">MEDINA ELECTRIC, INC</option>
								<option value="MEDINA'S KUSTOMS">MEDINA'S KUSTOMS</option>
								<option value="MEGA POWDER COATING">MEGA POWDER COATING</option>
								<option value="MEISNER ELECTRIC INC OF FLORIDA">MEISNER ELECTRIC INC OF FLORIDA</option>
								<option value="METAL ETCH SERVICES, INC">METAL ETCH SERVICES, INC</option>
								<option value="METAL MOVERS LLC">METAL MOVERS LLC</option>
								<option value="METAL ONE, L.L.C">METAL ONE, L.L.C</option>
								<option value="METALCENTER">METALCENTER</option>
								<option value="METALCO">METALCO</option>
								<option value="METALPOL S.A. DE C.V.">METALPOL S.A. DE C.V.</option>
								<option value="METRO AREA SALES, INC">METRO AREA SALES, INC</option>
								<option value="METRO SIGNS">METRO SIGNS</option>
								<option value="METROLIGHT">METROLIGHT</option>
								<option value="MEXICANLAWS SA DE CV">MEXICANLAWS SA DE CV</option>
								<option value="MEXICO GLOBAL ALLIANCE">MEXICO GLOBAL ALLIANCE</option>
								<option value="MEYER ALUMINIUM BLANKS, INC">MEYER ALUMINIUM BLANKS, INC</option>
								<option value="MICHAEL ADAMS">MICHAEL ADAMS</option>
								<option value="MICHAEL GONZALES">MICHAEL GONZALES</option>
								<option value="MICHAEL HAMMER ELECTRICAL SERVICES, INC.">MICHAEL HAMMER ELECTRICAL SERVICES, INC.</option>
								<option value="MICHAEL J KARANIEVSKI ELECTRICAL CONTRACTING, INC.">MICHAEL J KARANIEVSKI ELECTRICAL CONTRACTING, INC.</option>
								<option value="MICHAEL MENDIVIL">MICHAEL MENDIVIL</option>
								<option value="MICHELE DAVIDSON">MICHELE DAVIDSON</option>
								<option value="MICHELLE TEVES">MICHELLE TEVES</option>
								<option value="MICRO QUALITY CALIBRATION">MICRO QUALITY CALIBRATION</option>
								<option value="MIDWEST WHOLESALE">MIDWEST WHOLESALE</option>
								<option value="MIGUEL ANDRADE">MIGUEL ANDRADE</option>
								<option value="MIGUEL ANGEL FLORES SANTOS">MIGUEL ANGEL FLORES SANTOS</option>
								<option value="MIKE KEITH & ASSOCIATES">MIKE KEITH & ASSOCIATES</option>
								<option value="MILLER ENGINEERING COMPANY">MILLER ENGINEERING COMPANY</option>
								<option value="MINARIK SOUTHWEST">MINARIK SOUTHWEST</option>
								<option value="MINDSHIFT TECHNOLOGIES, INC.">MINDSHIFT TECHNOLOGIES, INC.</option>
								<option value="MISSION ELECTIC COMPANY">MISSION ELECTIC COMPANY</option>
								<option value="MITRONIX INC.">MITRONIX INC.</option>
								<option value="MK BATTERY">MK BATTERY</option>
								<option value="MODIFIED PLASTICS, INC">MODIFIED PLASTICS, INC</option>
								<option value="MONOARCH INDUSTRIES">MONOARCH INDUSTRIES</option>
								<option value="MONOTYPE IMAGING INC">MONOTYPE IMAGING INC</option>
								<option value="MONTEREY ENERGY, INC">MONTEREY ENERGY, INC</option>
								<option value="MONTEREY LIGHTING SOLUTIONS, INC.">MONTEREY LIGHTING SOLUTIONS, INC.</option>
								<option value="MOSS-ADAMS LLP">MOSS-ADAMS LLP</option>
								<option value="MOTOR CARGO">MOTOR CARGO</option>
								<option value="MOTOR CITY ELECRIC CO">MOTOR CITY ELECRIC CO</option>
								<option value="MOUNTAIN STATES UTILITY SERVIC">MOUNTAIN STATES UTILITY SERVIC</option>
								<option value="MOUNTZ, INC.">MOUNTZ, INC.</option>
								<option value="MOUSER ELECTRONICS, INC">MOUSER ELECTRONICS, INC</option>
								<option value="MR. HOSE, INC">MR. HOSE, INC</option>
								<option value="MRO SUPPLIES FUERZA INDUSTRIAL">MRO SUPPLIES FUERZA INDUSTRIAL</option>
								<option value="MSC INDUSTRIAL SUPPLY CO.">MSC INDUSTRIAL SUPPLY CO.</option>
								<option value="MUDANZAS BAUGAL">MUDANZAS BAUGAL</option>
								<option value="MUEBLES DICO SA DE CV">MUEBLES DICO SA DE CV</option>
								<option value="MUELLER CORPORATION">MUELLER CORPORATION</option>
								<option value="MULTIPACK">MULTIPACK</option>
								<option value="MUNICIPIO DE ENSENADA">MUNICIPIO DE ENSENADA</option>
								<option value="MUNICIPIO DE ENSENADA TESOSERI">MUNICIPIO DE ENSENADA TESOSERI</option>
								<option value="MURPHY ELECTRIC, INC.">MURPHY ELECTRIC, INC.</option>
								<option value="MURPHY-RODGERS, INC">MURPHY-RODGERS, INC</option>
								<option value="MUTUAL SCREW & SUPPLY">MUTUAL SCREW & SUPPLY</option>
								<option value="MYRON L. COMPANY">MYRON L. COMPANY</option>
								<option value="N/C TOOL SERVICE INC">N/C TOOL SERVICE INC</option>
								<option value="NADA-ATD CONVENTIONS & EXPO">NADA-ATD CONVENTIONS & EXPO</option>
								<option value="NAFCO INTERNATIONAL, INC.">NAFCO INTERNATIONAL, INC.</option>
								<option value="NAGLER & ASSOCIATES">NAGLER & ASSOCIATES</option>
								<option value="NAPPCOTE LLC">NAPPCOTE LLC</option>
								<option value="NATHANAEL MURILLO">NATHANAEL MURILLO</option>
								<option value="NATIONAL INSTITUTE OF STANDARDS AND TECHNOLOGY">NATIONAL INSTITUTE OF STANDARDS AND TECHNOLOGY</option>
								<option value="NATIONAL SANDBLASTING">NATIONAL SANDBLASTING</option>
								<option value="NAUGATUCK CONSTRUCTION">NAUGATUCK CONSTRUCTION</option>
								<option value="NEDAP INC">NEDAP INC</option>
								<option value="NESA ELECTRICA SA DE CV">NESA ELECTRICA SA DE CV</option>
								<option value="NETFONIC">NETFONIC</option>
								<option value="NEVADA LIGHTING - RENO">NEVADA LIGHTING - RENO</option>
								<option value="NEVADA SALES AGENCY - LV">NEVADA SALES AGENCY - LV</option>
								<option value="NEWARK CORPORATION">NEWARK CORPORATION</option>
								<option value="NEWARK ELECTRONICS">NEWARK ELECTRONICS</option>
								<option value="NICHIA AMERICA CORP">NICHIA AMERICA CORP</option>
								<option value="NIEDAX, INC.">NIEDAX, INC.</option>
								<option value="NIGHT TO REMEMBER DJS">NIGHT TO REMEMBER DJS</option>
								<option value="NISSAN PICKUP MAINTENANCE">NISSAN PICKUP MAINTENANCE</option>
								<option value="NOAH'S USABLES">NOAH'S USABLES</option>
								<option value="NORA LIGHTING">NORA LIGHTING</option>
								<option value="NORDSON CORPORATION">NORDSON CORPORATION</option>
								<option value="NORMAN COWAN">NORMAN COWAN</option>
								<option value="NORTH AMERICAN COMPOSITES">NORTH AMERICAN COMPOSITES</option>
								<option value="NORTH AMERICAN MACHINEY MOVERS, INC">NORTH AMERICAN MACHINEY MOVERS, INC</option>
								<option value="NORTH CENTRAL ELECTRICAL MANUFACTUTERS">NORTH CENTRAL ELECTRICAL MANUFACTUTERS</option>
								<option value="NORTHEAST ENERGY EFFICIENCY">NORTHEAST ENERGY EFFICIENCY</option>
								<option value="NUCAST INDUSTRIES INC">NUCAST INDUSTRIES INC</option>
								<option value="O'CONNOR ELECTRIC">O'CONNOR ELECTRIC</option>
								<option value="O'NEIL KG BAGS">O'NEIL KG BAGS</option>
								<option value="O'ROURKE ELECTRIC INC">O'ROURKE ELECTRIC INC</option>
								<option value="O-RINGS WEST, INC.">O-RINGS WEST, INC.</option>
								<option value="OCIP-ORANGE COUNTY IND. PROD.">OCIP-ORANGE COUNTY IND. PROD.</option>
								<option value="OCTAVIO ARCE MONTERO">OCTAVIO ARCE MONTERO</option>
								<option value="OFFICE DEPOT DE MEXICO SA">OFFICE DEPOT DE MEXICO SA</option>
								<option value="OFFICE SOLUTIONS">OFFICE SOLUTIONS</option>
								<option value="OHIO TREASURER OF STATE">OHIO TREASURER OF STATE</option>
								<option value="OLD CASTLE">OLD CASTLE</option>
								<option value="OLD COUNTRY MILLWORK">OLD COUNTRY MILLWORK</option>
								<option value="OLD DOMINION FREIGHT LINE, INC.">OLD DOMINION FREIGHT LINE, INC.</option>
								<option value="OLYMPIC POWDER COATING">OLYMPIC POWDER COATING</option>
								<option value="OMEGA ENGINEERING, INC.">OMEGA ENGINEERING, INC.</option>
								<option value="OMEGA LEADS">OMEGA LEADS</option>
								<option value="ON ELECTRIC, LLC">ON ELECTRIC, LLC</option>
								<option value="ON SITE LIGHTING & SURVEY, LLC">ON SITE LIGHTING & SURVEY, LLC</option>
								<option value="ON-LINE ELECTRONICS, INC">ON-LINE ELECTRONICS, INC</option>
								<option value="ONE SOURCE">ONE SOURCE</option>
								<option value="ONE SOURCE LIGHTING & DESIGN">ONE SOURCE LIGHTING & DESIGN</option>
								<option value="ORANGE ALUMINUM CORP">ORANGE ALUMINUM CORP</option>
								<option value="ORANGE COUNTY INDUSTRIAL PLASTICS">ORANGE COUNTY INDUSTRIAL PLASTICS</option>
								<option value="ORANGE COUNTY PUMP CORPORATION">ORANGE COUNTY PUMP CORPORATION</option>
								<option value="ORBIT INDUSTRIES">ORBIT INDUSTRIES</option>
								<option value="ORKIN PEST CONTROL">ORKIN PEST CONTROL</option>
								<option value="ORLANDO RIVERA">ORLANDO RIVERA</option>
								<option value="ORORA NORTH AMERICA">ORORA NORTH AMERICA</option>
								<option value="OSCAR DAVID VAZQUEZ RIVERA">OSCAR DAVID VAZQUEZ RIVERA</option>
								<option value="OSCAR MANUEL BAEZ LOPEZ">OSCAR MANUEL BAEZ LOPEZ</option>
								<option value="OSCAR MARTINEZ">OSCAR MARTINEZ</option>
								<option value="OSCAR ROBLES MURILLO">OSCAR ROBLES MURILLO</option>
								<option value="OSRAM SYLVANIA INC.">OSRAM SYLVANIA INC.</option>
								<option value="P & S SERVICES U.S.A LLC">P & S SERVICES U.S.A LLC</option>
								<option value="P.C.S COMPANY">P.C.S COMPANY</option>
								<option value="PABLO ALBERTO ARROYO LUJAN">PABLO ALBERTO ARROYO LUJAN</option>
								<option value="PAC INTERNATIONAL">PAC INTERNATIONAL</option>
								<option value="PAC WEST SALES">PAC WEST SALES</option>
								<option value="PACIFIC DIE CAST - COMMERCE">PACIFIC DIE CAST - COMMERCE</option>
								<option value="PACIFIC DIE CAST - OLDSMAR">PACIFIC DIE CAST - OLDSMAR</option>
								<option value="PACIFIC GLOVES & SAFETY SA DE">PACIFIC GLOVES & SAFETY SA DE</option>
								<option value="PACIFIC LTG STANDARDS">PACIFIC LTG STANDARDS</option>
								<option value="PACIFIC METAL POWDER COATING">PACIFIC METAL POWDER COATING</option>
								<option value="PACIFIC METAL SALES">PACIFIC METAL SALES</option>
								<option value="PACIFIC TEXTURING">PACIFIC TEXTURING</option>
								<option value="PACLEASE MEXICANA, S.A DE C.V">PACLEASE MEXICANA, S.A DE C.V</option>
								<option value="PAINT PLATOON">PAINT PLATOON</option>
								<option value="PAINT SPECIALISTS">PAINT SPECIALISTS</option>
								<option value="PAJONO WOODWORKS **MAILING**">PAJONO WOODWORKS **MAILING**</option>
								<option value="PALLET MASTER">PALLET MASTER</option>
								<option value="PANELOC CORPORATION">PANELOC CORPORATION</option>
								<option value="PANGBORN CORPORATION">PANGBORN CORPORATION</option>
								<option value="PARAFLEX LIGHTING LLC.">PARAFLEX LIGHTING LLC.</option>
								<option value="PARAGONE PLASTICS">PARAGONE PLASTICS</option>
								<option value="PARAMOUNT EXTRUSIONS COMPNAY">PARAMOUNT EXTRUSIONS COMPNAY</option>
								<option value="PARAMOUNT FASTENERS, INC">PARAMOUNT FASTENERS, INC</option>
								<option value="PARAMOUNT PATTERN">PARAMOUNT PATTERN</option>
								<option value="PARAMOUNT SAW CORPORATION">PARAMOUNT SAW CORPORATION</option>
								<option value="PARS INNOVATIONS, INC.">PARS INNOVATIONS, INC.</option>
								<option value="PATH OF EVOLUITON INC">PATH OF EVOLUITON INC</option>
								<option value="PATRICIA A. THOMA">PATRICIA A. THOMA</option>
								<option value="PATRICK ROE">PATRICK ROE</option>
								<option value="PATTERN SUPPLY">PATTERN SUPPLY</option>
								<option value="PATTON'S STEEL">PATTON'S STEEL</option>
								<option value="PATTY SCLAMENTI">PATTY SCLAMENTI</option>
								<option value="PAUL ARLIN">PAUL ARLIN</option>
								<option value="PAUL LUEVANO">PAUL LUEVANO</option>
								<option value="PAULO MANUEL GARCIA RINCON">PAULO MANUEL GARCIA RINCON</option>
								<option value="PAX INDUSTRIES">PAX INDUSTRIES</option>
								<option value="PB LIGHTING DESIGN & SALES">PB LIGHTING DESIGN & SALES</option>
								<option value="PEADEN, LLC">PEADEN, LLC</option>
								<option value="PEAK TECHNICAL SERVICES, INC.">PEAK TECHNICAL SERVICES, INC.</option>
								<option value="PEC LAMP USA CORP">PEC LAMP USA CORP</option>
								<option value="PENDANT SYSTEMS">PENDANT SYSTEMS</option>
								<option value="PERFORMANCE POWDER COATINGS">PERFORMANCE POWDER COATINGS</option>
								<option value="PERSITS SOFTWARE INC.">PERSITS SOFTWARE INC.</option>
								<option value="PERSONAL CHAUFFEUR">PERSONAL CHAUFFEUR</option>
								<option value="PETER PUN">PETER PUN</option>
								<option value="PHILIPS EMERGENCY LIGHTING">PHILIPS EMERGENCY LIGHTING</option>
								<option value="PHILIPS LIGHTING CO">PHILIPS LIGHTING CO</option>
								<option value="PHILIPS LIGHTING ELECTRONICS N.A.">PHILIPS LIGHTING ELECTRONICS N.A.</option>
								<option value="PHILLIPS 66 CO./ SYNCB">PHILLIPS 66 CO./ SYNCB</option>
								<option value="PHOCOS, INC">PHOCOS, INC</option>
								<option value="PHOENIX LIGHTING">PHOENIX LIGHTING</option>
								<option value="PHOENIX TECHNICAL EQUIPMENT">PHOENIX TECHNICAL EQUIPMENT</option>
								<option value="PHONEBY">PHONEBY</option>
								<option value="PICTOMETRY INTERNATIONAL CORP">PICTOMETRY INTERNATIONAL CORP</option>
								<option value="PINTURAS PEVI SA DE CV">PINTURAS PEVI SA DE CV</option>
								<option value="PITNEY BOWES">PITNEY BOWES</option>
								<option value="PLACA Y CORRUGADOS INDUSTRIALI">PLACA Y CORRUGADOS INDUSTRIALI</option>
								<option value="PLANET PLASTICS">PLANET PLASTICS</option>
								<option value="PLASKOLITE WEST, INC">PLASKOLITE WEST, INC</option>
								<option value="PLASTIC DEPOT">PLASTIC DEPOT</option>
								<option value="PLASTIC MACHINERY EXCHANGE, INC">PLASTIC MACHINERY EXCHANGE, INC</option>
								<option value="PLASTIC PROCESS EQUIPMENT, INC.">PLASTIC PROCESS EQUIPMENT, INC.</option>
								<option value="PLATINUM GRAPHICS">PLATINUM GRAPHICS</option>
								<option value="PLUMBERSURPLUS.COM">PLUMBERSURPLUS.COM</option>
								<option value="PLUSRITE">PLUSRITE</option>
								<option value="PNC INC">PNC INC</option>
								<option value="POINT SOURCE GROUP">POINT SOURCE GROUP</option>
								<option value="POLE-TECH">POLE-TECH</option>
								<option value="POLEETECTOR">POLEETECTOR</option>
								<option value="POLYCASE">POLYCASE</option>
								<option value="POLYMER PRODUCTS">POLYMER PRODUCTS</option>
								<option value="POMO INDUSTRIES">POMO INDUSTRIES</option>
								<option value="POWDER CRAFT">POWDER CRAFT</option>
								<option value="POWDER SYSTEMS SALES & SERVICE">POWDER SYSTEMS SALES & SERVICE</option>
								<option value="POWELL ELECTRICAL OF COLUMBIA">POWELL ELECTRICAL OF COLUMBIA</option>
								<option value="POWER TRIP RENTALS">POWER TRIP RENTALS</option>
								<option value="POWERLITE">POWERLITE</option>
								<option value="POZAS BROS. TRUCKING CO.">POZAS BROS. TRUCKING CO.</option>
								<option value="PRAXAIR DE MEXICO SA">PRAXAIR DE MEXICO SA</option>
								<option value="PRECISION CUTTING TOOLS, INC">PRECISION CUTTING TOOLS, INC</option>
								<option value="PRECISION MULTIPLE CONTROLS">PRECISION MULTIPLE CONTROLS</option>
								<option value="PRECISION MULTIPLE CONTROLS">PRECISION MULTIPLE CONTROLS</option>
								<option value="PRECISION POWDER COATING & SANDBLASTING">PRECISION POWDER COATING & SANDBLASTING</option>
								<option value="PRECISION SHEET METAL">PRECISION SHEET METAL</option>
								<option value="PREMIER LIGHTING & CONTROLS - KS">PREMIER LIGHTING & CONTROLS - KS</option>
								<option value="PREMIER LIGHTING GROUP, INC">PREMIER LIGHTING GROUP, INC</option>
								<option value="PREMIER POWER COATING">PREMIER POWER COATING</option>
								<option value="PRENDIMANO ELECTRICAL MAINTENANCE CO., INC.">PRENDIMANO ELECTRICAL MAINTENANCE CO., INC.</option>
								<option value="PRESSURE CAST">PRESSURE CAST</option>
								<option value="PRIME INDUSTRIES INC.">PRIME INDUSTRIES INC.</option>
								<option value="PRINT MANAGEMENT SERVICES">PRINT MANAGEMENT SERVICES</option>
								<option value="PRO SURPLUS INC">PRO SURPLUS INC</option>
								<option value="PRO-STRIP">PRO-STRIP</option>
								<option value="PROCESSES BY MARTIN, INCL">PROCESSES BY MARTIN, INCL</option>
								<option value="PROCYON MACHINE">PROCYON MACHINE</option>
								<option value="PRODUCTION PLUS CORP.">PRODUCTION PLUS CORP.</option>
								<option value="PRODUCTOS E INSUMOS DE EMPAQUE">PRODUCTOS E INSUMOS DE EMPAQUE</option>
								<option value="PRODUCTOS Y MATERIALES ELECTRI">PRODUCTOS Y MATERIALES ELECTRI</option>
								<option value="PROFESSIONAL LIGHTING & SIGN MGMT. CO. OF AMERICA">PROFESSIONAL LIGHTING & SIGN MGMT. CO. OF AMERICA</option>
								<option value="PROMINENT PLASTICS">PROMINENT PLASTICS</option>
								<option value="PROTECH CHEMICALS LTD.">PROTECH CHEMICALS LTD.</option>
								<option value="PROTECTIVE INDUSTRIES, INC.">PROTECTIVE INDUSTRIES, INC.</option>
								<option value="PROVEEDORES DE LA CONSTRUCCION">PROVEEDORES DE LA CONSTRUCCION</option>
								<option value="PRUDENTIAL">PRUDENTIAL</option>
								<option value="PRUDENTIAL LIGHTING PRODUCTS">PRUDENTIAL LIGHTING PRODUCTS</option>
								<option value="PSI - CORPORATE">PSI - CORPORATE</option>
								<option value="PYRAMID COATING">PYRAMID COATING</option>
								<option value="PYROTEK, INC.">PYROTEK, INC.</option>
								<option value="Q PANNEL">Q PANNEL</option>
								<option value="QUALITY EQUIPMENT SERVICES">QUALITY EQUIPMENT SERVICES</option>
								<option value="QUALITY FLAGS">QUALITY FLAGS</option>
								<option value="QUALITY MATCH PLATE CO., INC">QUALITY MATCH PLATE CO., INC</option>
								<option value="QUALITY PAINT">QUALITY PAINT</option>
								<option value="QUARTZ GROUP, INC.">QUARTZ GROUP, INC.</option>
								<option value="QUIMICA DEL PACIFICO SA">QUIMICA DEL PACIFICO SA</option>
								<option value="QUIÑONEZ CONSTRUCCIONES SA DE">QUIÑONEZ CONSTRUCCIONES SA DE</option>
								<option value="R & L CARRIERS, INC.">R & L CARRIERS, INC.</option>
								<option value="R & L VAN STORY CO">R & L VAN STORY CO</option>
								<option value="R.A. ELECTRICAL SERVICES">R.A. ELECTRICAL SERVICES</option>
								<option value="R.S. HUGHES CO., INC">R.S. HUGHES CO., INC</option>
								<option value="RADIOMOVIL DIPSA S.A. DE C.V.">RADIOMOVIL DIPSA S.A. DE C.V.</option>
								<option value="RAFAEL AGUIRRE RAMOS">RAFAEL AGUIRRE RAMOS</option>
								<option value="RAFAEL PASARELLA & ASSOC">RAFAEL PASARELLA & ASSOC</option>
								<option value="RAINIER INDUSTRIES">RAINIER INDUSTRIES</option>
								<option value="RAM CONVEYORS">RAM CONVEYORS</option>
								<option value="RAMIRO BARAJAS">RAMIRO BARAJAS</option>
								<option value="RAMIRO HURTADO AVIÑA">RAMIRO HURTADO AVIÑA</option>
								<option value="RAMON VIVERO">RAMON VIVERO</option>
								<option value="RANDAL WELDING AND MACHINE">RANDAL WELDING AND MACHINE</option>
								<option value="RANDY WALKER AND COMMUNICATIONS CONTRACTOR, INC.">RANDY WALKER AND COMMUNICATIONS CONTRACTOR, INC.</option>
								<option value="RANDY'S ELECTRIC COMPANY, INC.">RANDY'S ELECTRIC COMPANY, INC.</option>
								<option value="RAPID INDUSTRIES, INC.">RAPID INDUSTRIES, INC.</option>
								<option value="RAQUEL CAMACHO LOPEZ">RAQUEL CAMACHO LOPEZ</option>
								<option value="RAUL ACEDO MORENO">RAUL ACEDO MORENO</option>
								<option value="RAUL GARCIA">RAUL GARCIA</option>
								<option value="RAYMUNDO ESQUER U">RAYMUNDO ESQUER U</option>
								<option value="RAYVERN LIGHTING">RAYVERN LIGHTING</option>
								<option value="REBECCA LINK">REBECCA LINK</option>
								<option value="RECOLECTORA DE LA CIUDAD">RECOLECTORA DE LA CIUDAD</option>
								<option value="REDONDO LOCK KEY">REDONDO LOCK KEY</option>
								<option value="REEL LUMBER">REEL LUMBER</option>
								<option value="REFLEK CORPORATION">REFLEK CORPORATION</option>
								<option value="REFUGIO LOPEZ RAMIREZ">REFUGIO LOPEZ RAMIREZ</option>
								<option value="REGENCY ENTERPRISES INC">REGENCY ENTERPRISES INC</option>
								<option value="REGENCY ENTERPRISES, INC.">REGENCY ENTERPRISES, INC.</option>
								<option value="REGENCY LIGHTING">REGENCY LIGHTING</option>
								<option value="REGNOW/DIGITAL RIVER">REGNOW/DIGITAL RIVER</option>
								<option value="RELCO ENGINEERS">RELCO ENGINEERS</option>
								<option value="RELIABLE BALLAST INC">RELIABLE BALLAST INC</option>
								<option value="RENE EDGARDO CARRAZCO VALDEZ">RENE EDGARDO CARRAZCO VALDEZ</option>
								<option value="RENE RIVERA CARLOS">RENE RIVERA CARLOS</option>
								<option value="RENE SOBERANEZ CASTRO">RENE SOBERANEZ CASTRO</option>
								<option value="RENOVADOS Y SERVICIOS">RENOVADOS Y SERVICIOS</option>
								<option value="RENTAS JC S.A. DE C.V.">RENTAS JC S.A. DE C.V.</option>
								<option value="RESIDENTES DE CHAPULTEPEC II D">RESIDENTES DE CHAPULTEPEC II D</option>
								<option value="RESOURCE LIGHTING">RESOURCE LIGHTING</option>
								<option value="REULET ELECTRIC SUPPLIES INC">REULET ELECTRIC SUPPLIES INC</option>
								<option value="REVEAL ENERGY, LLC.">REVEAL ENERGY, LLC.</option>
								<option value="RICARDO CASTRO">RICARDO CASTRO</option>
								<option value="RICARDO DIAZ">RICARDO DIAZ</option>
								<option value="RICARDO GARCIA UCAN">RICARDO GARCIA UCAN</option>
								<option value="RICARDO HERNANDEZ ESQUER">RICARDO HERNANDEZ ESQUER</option>
								<option value="RICHARD GONZALES, INC">RICHARD GONZALES, INC</option>
								<option value="RICHARD KAYNE">RICHARD KAYNE</option>
								<option value="RICOH USA, INC">RICOH USA, INC</option>
								<option value="RICOH USA, INC.">RICOH USA, INC.</option>
								<option value="RIDDER TRUCK RENTAL">RIDDER TRUCK RENTAL</option>
								<option value="RIDOUT PLASTICS">RIDOUT PLASTICS</option>
								<option value="RIGGINS-MORELAND ENGINEERING">RIGGINS-MORELAND ENGINEERING</option>
								<option value="RKL SALES">RKL SALES</option>
								<option value="RMC TESTING SOLUTIONS, INC">RMC TESTING SOLUTIONS, INC</option>
								<option value="RMI NV - ROTOCAST">RMI NV - ROTOCAST</option>
								<option value="ROBERT JAMES & ASSOCIATES">ROBERT JAMES & ASSOCIATES</option>
								<option value="ROBERT'S ELECTRICAL CONTRACTORS, INC.">ROBERT'S ELECTRICAL CONTRACTORS, INC.</option>
								<option value="ROBERTO ENCINAS RIPA">ROBERTO ENCINAS RIPA</option>
								<option value="ROBERTO EUGENIO ALATORRE LUCER">ROBERTO EUGENIO ALATORRE LUCER</option>
								<option value="ROBERTO HERNANDEZ T">ROBERTO HERNANDEZ T</option>
								<option value="ROBERTSON INNOVATIVE LIGHTING SOLUTIONS">ROBERTSON INNOVATIVE LIGHTING SOLUTIONS</option>
								<option value="ROCHE ELECTRIC">ROCHE ELECTRIC</option>
								<option value="RODOLFO MORA">RODOLFO MORA</option>
								<option value="RODRIGO MONTOYA BONILLAS">RODRIGO MONTOYA BONILLAS</option>
								<option value="RODRIGUEZ LLAMAS DANIA JAEN">RODRIGUEZ LLAMAS DANIA JAEN</option>
								<option value="RODS / ALL-AMERICN PROD">RODS / ALL-AMERICN PROD</option>
								<option value="ROLITE MFG., INC.">ROLITE MFG., INC.</option>
								<option value="ROMEO PINA">ROMEO PINA</option>
								<option value="ROMEO PINA SALAS">ROMEO PINA SALAS</option>
								<option value="RONALD C MCLAREN">RONALD C MCLAREN</option>
								<option value="ROSA ELBA MARTINEZ GARCIA">ROSA ELBA MARTINEZ GARCIA</option>
								<option value="ROSA ISELA MARTINEZ IBARRA">ROSA ISELA MARTINEZ IBARRA</option>
								<option value="ROSA MARIA ACOSTA GULUARTE">ROSA MARIA ACOSTA GULUARTE</option>
								<option value="ROSA ROCA">ROSA ROCA</option>
								<option value="ROSARIO LLAMAS ARIAS">ROSARIO LLAMAS ARIAS</option>
								<option value="ROSEMEAD OIL PRODUCTS">ROSEMEAD OIL PRODUCTS</option>
								<option value="ROSENDO VELAZQUEZ RAMOS">ROSENDO VELAZQUEZ RAMOS</option>
								<option value="ROTH STAFFING COMPANIES, LP">ROTH STAFFING COMPANIES, LP</option>
								<option value="ROYAL PLYWOOD">ROYAL PLYWOOD</option>
								<option value="RUBIOS CABINETS">RUBIOS CABINETS</option>
								<option value="RUDAMETKIN DISTRIBUIDORA SA">RUDAMETKIN DISTRIBUIDORA SA</option>
								<option value="RUDY'S PLUMBING">RUDY'S PLUMBING</option>
								<option value="RUIZ & ASSOCIATES-DOT TESTING">RUIZ & ASSOCIATES-DOT TESTING</option>
								<option value="RUSHER AIR CONDITIONING">RUSHER AIR CONDITIONING</option>
								<option value="RUTLAND TOOL">RUTLAND TOOL</option>
								<option value="RUUD LIGHTING #73714">RUUD LIGHTING #73714</option>
								<option value="RYDER TRANSPORTATION SERVICES">RYDER TRANSPORTATION SERVICES</option>
								<option value="RYERSON">RYERSON</option>
								<option value="RYERSON METALS DE MEXICO">RYERSON METALS DE MEXICO</option>
								<option value="RYONET - CALIFORNIA">RYONET - CALIFORNIA</option>
								<option value="S & D INDUSTRIAL TOOL SUPPLY">S & D INDUSTRIAL TOOL SUPPLY</option>
								<option value="S & E TOOLS AND SUPPLY">S & E TOOLS AND SUPPLY</option>
								<option value="S & W PLASTICS">S & W PLASTICS</option>
								<option value="S. RANDALL ELECTRIC, INC.">S. RANDALL ELECTRIC, INC.</option>
								<option value="S.DE R.L. ED C.V. MATERIALES">S.DE R.L. ED C.V. MATERIALES</option>
								<option value="S.L. FUSCO, INC.">S.L. FUSCO, INC.</option>
								<option value="SABIC POLYMERSHAPES">SABIC POLYMERSHAPES</option>
								<option value="SAC JOAQUIN LIGHTING">SAC JOAQUIN LIGHTING</option>
								<option value="SAEHAN ELECTRONICS AMERICA, INC">SAEHAN ELECTRONICS AMERICA, INC</option>
								<option value="SAFETY COMPLIANCE COMPANY">SAFETY COMPLIANCE COMPANY</option>
								<option value="SALES INTERNATIONAL CORPORATION">SALES INTERNATIONAL CORPORATION</option>
								<option value="SAMANTHA KEOGH">SAMANTHA KEOGH</option>
								<option value="SAMLEX AMERICA, INC">SAMLEX AMERICA, INC</option>
								<option value="SAMUEL GARCIA ELECTRICAL SERVICE">SAMUEL GARCIA ELECTRICAL SERVICE</option>
								<option value="SAMUEL R. GARCIA">SAMUEL R. GARCIA</option>
								<option value="SAMUEL, SON & INC.">SAMUEL, SON & INC.</option>
								<option value="SANCHEM INC">SANCHEM INC</option>
								<option value="SANDEE PLASTIC EXTRUSIONS">SANDEE PLASTIC EXTRUSIONS</option>
								<option value="SANTA ANA VENTURE LP">SANTA ANA VENTURE LP</option>
								<option value="SANTA FE BENDING">SANTA FE BENDING</option>
								<option value="SANTA MARIA BARBECUE">SANTA MARIA BARBECUE</option>
								<option value="SANTANDER BANK, N.A.">SANTANDER BANK, N.A.</option>
								<option value="SANTIAGO EDUARDO GUZMAN AVILES">SANTIAGO EDUARDO GUZMAN AVILES</option>
								<option value="SANTIAGO MEDINA FIGUEROA">SANTIAGO MEDINA FIGUEROA</option>
								<option value="SAPA EXTRUDER, INC">SAPA EXTRUDER, INC</option>
								<option value="SAPA PROFILES, INC">SAPA PROFILES, INC</option>
								<option value="SARAH VILLEGAS">SARAH VILLEGAS</option>
								<option value="SATCO">SATCO</option>
								<option value="SC FUELS-ACH">SC FUELS-ACH</option>
								<option value="SC REVOLUTION B02">SC REVOLUTION B02</option>
								<option value="SCALE FX">SCALE FX</option>
								<option value="SCENERY HYDRAULIC INC">SCENERY HYDRAULIC INC</option>
								<option value="SCHLEUNIGER, INC.">SCHLEUNIGER, INC.</option>
								<option value="SCIENTIFIC CONTROL INC">SCIENTIFIC CONTROL INC</option>
								<option value="SCIENTIFIC LIGHTING PRODUCTS">SCIENTIFIC LIGHTING PRODUCTS</option>
								<option value="SCL NORTH">SCL NORTH</option>
								<option value="SCOTCH PAINT CORP./ PPG REP">SCOTCH PAINT CORP./ PPG REP</option>
								<option value="SCOTT AND SONS RIGGING, INC">SCOTT AND SONS RIGGING, INC</option>
								<option value="SCOTT SALES CO">SCOTT SALES CO</option>
								<option value="SCOTT SCHUENEMAN, INC.">SCOTT SCHUENEMAN, INC.</option>
								<option value="SCT">SCT</option>
								<option value="SDLA">SDLA</option>
								<option value="SEA-TAC LIGHTING AND CONTROLS, LLC">SEA-TAC LIGHTING AND CONTROLS, LLC</option>
								<option value="SEALED AIR CORP.">SEALED AIR CORP.</option>
								<option value="SEALING DEVICES, INC.">SEALING DEVICES, INC.</option>
								<option value="SEBCO INDUSTRIES, INC.">SEBCO INDUSTRIES, INC.</option>
								<option value="SECCO, INC.">SECCO, INC.</option>
								<option value="SECRETARIA DE PLANEACION Y FIN">SECRETARIA DE PLANEACION Y FIN</option>
								<option value="SECRETARY OF STATE">SECRETARY OF STATE</option>
								<option value="SELECT FIRST AID">SELECT FIRST AID</option>
								<option value="SENDER ELECTRIC, LLC">SENDER ELECTRIC, LLC</option>
								<option value="SENSOCON, INC.">SENSOCON, INC.</option>
								<option value="SERGIO CUELLAR">SERGIO CUELLAR</option>
								<option value="SERGIO MILANO L">SERGIO MILANO L</option>
								<option value="SERGIO RODRIGUEZ RODRIGUEZ">SERGIO RODRIGUEZ RODRIGUEZ</option>
								<option value="SERTEC MANUFACTURING">SERTEC MANUFACTURING</option>
								<option value="SERVER SUPPLY">SERVER SUPPLY</option>
								<option value="SERVICE BY AIR, INC">SERVICE BY AIR, INC</option>
								<option value="SERVICE POLYMERS INC">SERVICE POLYMERS INC</option>
								<option value="SERVICIO SANTA CATALINA S.A DE">SERVICIO SANTA CATALINA S.A DE</option>
								<option value="SERVICIOS COMERCIALES E INDUST">SERVICIOS COMERCIALES E INDUST</option>
								<option value="SERVICIOS NACIONALES MUPA, SA">SERVICIOS NACIONALES MUPA, SA</option>
								<option value="SERVICIOS SANITARIOS DE ENSENA">SERVICIOS SANITARIOS DE ENSENA</option>
								<option value="SERVICIOS UNICOS DE BAJA CALIF">SERVICIOS UNICOS DE BAJA CALIF</option>
								<option value="SERVICIOS, TRAMITES Y GESTORIA">SERVICIOS, TRAMITES Y GESTORIA</option>
								<option value="SESCO LIGHTING">SESCO LIGHTING</option>
								<option value="SESCO LIGHTING">SESCO LIGHTING</option>
								<option value="SESCO LIGHTING">SESCO LIGHTING</option>
								<option value="SESCO LIGHTING">SESCO LIGHTING</option>
								<option value="SETON IDENTIFICATION PRODUCTS">SETON IDENTIFICATION PRODUCTS</option>
								<option value="SEVERO FLORES">SEVERO FLORES</option>
								<option value="SHAN BERT">SHAN BERT</option>
								<option value="SHANGHAI CAN GUANG LTG">SHANGHAI CAN GUANG LTG</option>
								<option value="SHAREFILE">SHAREFILE</option>
								<option value="SHARPPLINE CONVERTING, INC">SHARPPLINE CONVERTING, INC</option>
								<option value="SHAWN MANCERA">SHAWN MANCERA</option>
								<option value="SHECID S.A. DE C.V">SHECID S.A. DE C.V</option>
								<option value="SHEET METAL SERVICE INC.">SHEET METAL SERVICE INC.</option>
								<option value="SHELBY ELECTRIC COMPANY, INC.">SHELBY ELECTRIC COMPANY, INC.</option>
								<option value="SHELL ELECTRIC">SHELL ELECTRIC</option>
								<option value="SHERCON, INC.">SHERCON, INC.</option>
								<option value="SHERWIN WILLIAMS ACCT420574915">SHERWIN WILLIAMS ACCT420574915</option>
								<option value="SHERYL BAILEY DESIGN, LLC">SHERYL BAILEY DESIGN, LLC</option>
								<option value="SHRED-IT USA LLC">SHRED-IT USA LLC</option>
								<option value="SIERRA WEST LIGHTING SALES INC">SIERRA WEST LIGHTING SALES INC</option>
								<option value="SIGNAL TRANSFORMER">SIGNAL TRANSFORMER</option>
								<option value="SIGNSOURCE, INC.">SIGNSOURCE, INC.</option>
								<option value="SIMPSON STRONG TIE">SIMPSON STRONG TIE</option>
								<option value="SIMS WELDING">SIMS WELDING</option>
								<option value="SINCLAIR GLASS">SINCLAIR GLASS</option>
								<option value="SING WELDING">SING WELDING</option>
								<option value="SINKPAD">SINKPAD</option>
								<option value="SIPRIANO VASQUEZ">SIPRIANO VASQUEZ</option>
								<option value="SISKA INC">SISKA INC</option>
								<option value="SISTEMAS & SERVICIOS AMBIENTAL">SISTEMAS & SERVICIOS AMBIENTAL</option>
								<option value="SK & ASSOCIATES">SK & ASSOCIATES</option>
								<option value="SKULSKY MACHINERY SALES">SKULSKY MACHINERY SALES</option>
								<option value="SKY CAST LLC">SKY CAST LLC</option>
								<option value="SKYLER CONSTRUCTION, INC">SKYLER CONSTRUCTION, INC</option>
								<option value="SKYLINE">SKYLINE</option>
								<option value="SKYLINE CHARTER">SKYLINE CHARTER</option>
								<option value="SLS - SPECTRUM LOGISTIC SERVICE">SLS - SPECTRUM LOGISTIC SERVICE</option>
								<option value="SMARTLINE DESIGN LLC">SMARTLINE DESIGN LLC</option>
								<option value="SMITH AND COMPNAY">SMITH AND COMPNAY</option>
								<option value="SMITH FASTENER COMPANY">SMITH FASTENER COMPANY</option>
								<option value="SMITH LIGHTING">SMITH LIGHTING</option>
								<option value="SMITH LIGHTING - TULSA">SMITH LIGHTING - TULSA</option>
								<option value="SMTEQUIP">SMTEQUIP</option>
								<option value="SNAILLUM ALLOYS">SNAILLUM ALLOYS</option>
								<option value="SO CAL HVAC">SO CAL HVAC</option>
								<option value="SOFT STEP CARPET">SOFT STEP CARPET</option>
								<option value="SOLAR DEPOT">SOLAR DEPOT</option>
								<option value="SOLAR DEPOT, INC">SOLAR DEPOT, INC</option>
								<option value="SOLDER MASK, INC">SOLDER MASK, INC</option>
								<option value="SOLDER MASTER SUPPLY, INC">SOLDER MASTER SUPPLY, INC</option>
								<option value="SOLE SOURCE">SOLE SOURCE</option>
								<option value="SOLIGENT, LLC">SOLIGENT, LLC</option>
								<option value="SOLUTIONS ELECTRICAL CONTRACTI">SOLUTIONS ELECTRICAL CONTRACTI</option>
								<option value="SON NGUYEN">SON NGUYEN</option>
								<option value="SONIA ADRIANA LORENZO FARAH">SONIA ADRIANA LORENZO FARAH</option>
								<option value="SONIA MARINA GUILLINS MARIN">SONIA MARINA GUILLINS MARIN</option>
								<option value="SONITROL">SONITROL</option>
								<option value="SORREL ELECTRICAL SPECIALTIES, LLC">SORREL ELECTRICAL SPECIALTIES, LLC</option>
								<option value="SOURCE GROUP">SOURCE GROUP</option>
								<option value="SOURCE INTERNATIONAL">SOURCE INTERNATIONAL</option>
								<option value="SOUTH BAY FIRE EXTINGUISHER CO">SOUTH BAY FIRE EXTINGUISHER CO</option>
								<option value="SOUTH BAY PLASTICS, INC.">SOUTH BAY PLASTICS, INC.</option>
								<option value="SOUTH COAST LIGHTING">SOUTH COAST LIGHTING</option>
								<option value="SOUTH EAST FLORIDA LIGHTING">SOUTH EAST FLORIDA LIGHTING</option>
								<option value="SOUTH-PAK, INC">SOUTH-PAK, INC</option>
								<option value="SOUTHERN CALIFORNIA EDISON">SOUTHERN CALIFORNIA EDISON</option>
								<option value="SOUTHERN CALIFORNIA ILLUMINATION">SOUTHERN CALIFORNIA ILLUMINATION</option>
								<option value="SOUTHERN ELECTRIC">SOUTHERN ELECTRIC</option>
								<option value="SOUTHWEST ELECTRIC SERVICE">SOUTHWEST ELECTRIC SERVICE</option>
								<option value="SPARKLETTS">SPARKLETTS</option>
								<option value="SPECIAL FX LIGHTING">SPECIAL FX LIGHTING</option>
								<option value="SPECIALIZED TRANSPORT">SPECIALIZED TRANSPORT</option>
								<option value="SPECIALTY CONCEPTS, INC.">SPECIALTY CONCEPTS, INC.</option>
								<option value="SPECIALTY LAMP INTL">SPECIALTY LAMP INTL</option>
								<option value="SPECIALTY LIGHTING">SPECIALTY LIGHTING</option>
								<option value="SPECTRA 3">SPECTRA 3</option>
								<option value="SPECTRUM LIGHTING & CONTROLS">SPECTRUM LIGHTING & CONTROLS</option>
								<option value="SPECTRUM LIGHTING AUSTIN">SPECTRUM LIGHTING AUSTIN</option>
								<option value="SPECTRUM LIGHTING SAN ANTONIO">SPECTRUM LIGHTING SAN ANTONIO</option>
								<option value="SPECTRUM LIGHTING, INC - COLUMBUS">SPECTRUM LIGHTING, INC - COLUMBUS</option>
								<option value="SPIN IMAGING, INC.">SPIN IMAGING, INC.</option>
								<option value="SPLUS TECHNOLOGIES LLC">SPLUS TECHNOLOGIES LLC</option>
								<option value="SPOT LIGHTING SUPPLIES">SPOT LIGHTING SUPPLIES</option>
								<option value="SPRAY SYSTEMS">SPRAY SYSTEMS</option>
								<option value="SPRAYLAT CORP.">SPRAYLAT CORP.</option>
								<option value="SPRINT">SPRINT</option>
								<option value="SSLTG">SSLTG</option>
								<option value="STANDARD LIGHTING">STANDARD LIGHTING</option>
								<option value="STANFORD MARKETING">STANFORD MARKETING</option>
								<option value="STANLEY CONVERGENT SECURITY SOLUTIONS">STANLEY CONVERGENT SECURITY SOLUTIONS</option>
								<option value="STAPLES">STAPLES</option>
								<option value="STATE PIPE & SUPPLY">STATE PIPE & SUPPLY</option>
								<option value="STEEL CONNECTIONS, INC.">STEEL CONNECTIONS, INC.</option>
								<option value="STEEL SERVICES COMPANY">STEEL SERVICES COMPANY</option>
								<option value="STELCO ELECTRIC, LLC">STELCO ELECTRIC, LLC</option>
								<option value="STELLAR SALES">STELLAR SALES</option>
								<option value="STELLAR TECHNICAL PRODUCTS">STELLAR TECHNICAL PRODUCTS</option>
								<option value="STERLING MACHINERY EXCHANGE">STERLING MACHINERY EXCHANGE</option>
								<option value="STEVENS SALES COMPANY">STEVENS SALES COMPANY</option>
								<option value="STEWART - JACKSON SPRINKLERS, INC">STEWART - JACKSON SPRINKLERS, INC</option>
								<option value="STORK MATERIALS TESTING & INSP">STORK MATERIALS TESTING & INSP</option>
								<option value="STRAUSS ARCHITECTURAL SYSTEMS, LLC">STRAUSS ARCHITECTURAL SYSTEMS, LLC</option>
								<option value="STRESSCRETE">STRESSCRETE</option>
								<option value="STRONG MACHINERY CORP.">STRONG MACHINERY CORP.</option>
								<option value="STUDIO C, INC.">STUDIO C, INC.</option>
								<option value="STURDEVANT REFRIGERATION & AIR CONDITIONING, INC.">STURDEVANT REFRIGERATION & AIR CONDITIONING, INC.</option>
								<option value="SUBARBAN PROPANE">SUBARBAN PROPANE</option>
								<option value="SUNBELT  TRANSFORMER">SUNBELT  TRANSFORMER</option>
								<option value="SUNBELT RENTALS">SUNBELT RENTALS</option>
								<option value="SUNDIAL">SUNDIAL</option>
								<option value="SUNDIAL INDUST, INC">SUNDIAL INDUST, INC</option>
								<option value="SUNDIAL POWDER COATING">SUNDIAL POWDER COATING</option>
								<option value="SUNDIAL POWDER COATINGS">SUNDIAL POWDER COATINGS</option>
								<option value="SUNDRY METAL">SUNDRY METAL</option>
								<option value="SUNWISZE">SUNWISZE</option>
								<option value="SUPERIOR METAL FINISHING INC.">SUPERIOR METAL FINISHING INC.</option>
								<option value="SUPERIOR PLASTIC FABRICATION, INC">SUPERIOR PLASTIC FABRICATION, INC</option>
								<option value="SUPREME MOLD & ENGINEERING">SUPREME MOLD & ENGINEERING</option>
								<option value="SURFACE MOUNT TECHNOLOGIES, INC">SURFACE MOUNT TECHNOLOGIES, INC</option>
								<option value="SURFACE TECHNOLOGIES">SURFACE TECHNOLOGIES</option>
								<option value="SURFCAM">SURFCAM</option>
								<option value="SUSANA HURTADO">SUSANA HURTADO</option>
								<option value="SWANSON & SWANSON A P. C.">SWANSON & SWANSON A P. C.</option>
								<option value="SYMANTEC CORP">SYMANTEC CORP</option>
								<option value="SYNAPSE WIRELESS, INC">SYNAPSE WIRELESS, INC</option>
								<option value="SYNOPSYS">SYNOPSYS</option>
								<option value="T & T ELECTRIC, INC">T & T ELECTRIC, INC</option>
								<option value="T&D SOLUTIONS, LLC">T&D SOLUTIONS, LLC</option>
								<option value="T.L. ELECTRIC, INC.">T.L. ELECTRIC, INC.</option>
								<option value="TAYLOR DELANGE">TAYLOR DELANGE</option>
								<option value="TCF EQUIPMENT FINANCE INC">TCF EQUIPMENT FINANCE INC</option>
								<option value="TECHLITE CORP">TECHLITE CORP</option>
								<option value="TECHNO TRANS">TECHNO TRANS</option>
								<option value="TECNO PRODUCTOS DEL PACIFICO">TECNO PRODUCTOS DEL PACIFICO</option>
								<option value="TELEFONOS DEL NOROESTE, S.A.">TELEFONOS DEL NOROESTE, S.A.</option>
								<option value="TELEPACIFIC">TELEPACIFIC</option>
								<option value="TEXHMASTER DE MEXICO, SA DE CV">TEXHMASTER DE MEXICO, SA DE CV</option>
								<option value="TEXTRON">TEXTRON</option>
								<option value="TEXTURED GLASS">TEXTURED GLASS</option>
								<option value="THE GAS COMPANY">THE GAS COMPANY</option>
								<option value="THE HOME DEPOT">THE HOME DEPOT</option>
								<option value="THE LABEL PRINTERS">THE LABEL PRINTERS</option>
								<option value="THE LIGHTING AGENCY, INC">THE LIGHTING AGENCY, INC</option>
								<option value="THE LIGHTING ALLIANCE">THE LIGHTING ALLIANCE</option>
								<option value="THE LIGHTING SOURCE, LLC">THE LIGHTING SOURCE, LLC</option>
								<option value="THE MAINTENANCE TEAM, INC.">THE MAINTENANCE TEAM, INC.</option>
								<option value="THE MATHWORKS, INC">THE MATHWORKS, INC</option>
								<option value="THE NASSAU GROUP">THE NASSAU GROUP</option>
								<option value="THE PRINTER WORKS">THE PRINTER WORKS</option>
								<option value="THE QC GROUP, INC.">THE QC GROUP, INC.</option>
								<option value="THE RAE COMPANY - T">THE RAE COMPANY - T</option>
								<option value="THE SHAMROCK COMPANIES">THE SHAMROCK COMPANIES</option>
								<option value="THE TIMOTHY R HATCH FOUNDATION">THE TIMOTHY R HATCH FOUNDATION</option>
								<option value="THERMAL CARE WEST">THERMAL CARE WEST</option>
								<option value="THOMAS & BETTS">THOMAS & BETTS</option>
								<option value="THOMAS HARRIS & CO, INC">THOMAS HARRIS & CO, INC</option>
								<option value="THOMAS RESEARCH PRODUCTS">THOMAS RESEARCH PRODUCTS</option>
								<option value="THOMSON ELECTRIC, INC.">THOMSON ELECTRIC, INC.</option>
								<option value="THYSSENKRUPP MATERIALS NA, INC.">THYSSENKRUPP MATERIALS NA, INC.</option>
								<option value="TIGER DRYLAC U.S.A.">TIGER DRYLAC U.S.A.</option>
								<option value="TIMOTHY R. HUTCHERSON">TIMOTHY R. HUTCHERSON</option>
								<option value="TIOCCO, INC">TIOCCO, INC</option>
								<option value="TMC PLASSTICS">TMC PLASSTICS</option>
								<option value="TODD ALCOCK">TODD ALCOCK</option>
								<option value="TOM BELL, INC.">TOM BELL, INC.</option>
								<option value="TONY'S HEATING & A/C SERVICE, INC.">TONY'S HEATING & A/C SERVICE, INC.</option>
								<option value="TOOLING INTERNATIONAL CORP">TOOLING INTERNATIONAL CORP</option>
								<option value="TOOLS AND METALS SUPPLY DE MEX">TOOLS AND METALS SUPPLY DE MEX</option>
								<option value="TORRANCE PLUMBING">TORRANCE PLUMBING</option>
								<option value="TORTOISE INDUSTRIES">TORTOISE INDUSTRIES</option>
								<option value="TOTAL CORPORATE SOLUTIONS">TOTAL CORPORATE SOLUTIONS</option>
								<option value="TOTAL QUALITY LOGISTICS, LLC">TOTAL QUALITY LOGISTICS, LLC</option>
								<option value="TOTTEN TUBES INC">TOTTEN TUBES INC</option>
								<option value="TOYOTA TSUSHO AMERICA, INC.">TOYOTA TSUSHO AMERICA, INC.</option>
								<option value="TR TRADING COMPANY">TR TRADING COMPANY</option>
								<option value="TRANS-PACIFIC FACILITATORS (HK) LTD - WT">TRANS-PACIFIC FACILITATORS (HK) LTD - WT</option>
								<option value="TRANSAMERICA POWER PRODUCTS">TRANSAMERICA POWER PRODUCTS</option>
								<option value="TRANSCAT, INC.">TRANSCAT, INC.</option>
								<option value="TRANSPORTES LEGASPY E HIJOS">TRANSPORTES LEGASPY E HIJOS</option>
								<option value="TRANSPORTES RAMIREZ S.A.">TRANSPORTES RAMIREZ S.A.</option>
								<option value="TRATADO INTERNACIONAL SA">TRATADO INTERNACIONAL SA</option>
								<option value="TRATADOS INTEGRALES S.A. DE C.">TRATADOS INTEGRALES S.A. DE C.</option>
								<option value="TRAVELERS">TRAVELERS</option>
								<option value="TRAVIS SAYRE">TRAVIS SAYRE</option>
								<option value="TRESS SOPORTE Y CONSULTORIA">TRESS SOPORTE Y CONSULTORIA</option>
								<option value="TRIDONIC.USA INCORPORATED">TRIDONIC.USA INCORPORATED</option>
								<option value="TROY DOUGLAS STRUMPFER">TROY DOUGLAS STRUMPFER</option>
								<option value="TRU-FORM TOOL INDUSTRIES INC">TRU-FORM TOOL INDUSTRIES INC</option>
								<option value="TRUMP CARD CALIFORNIA, INC.">TRUMP CARD CALIFORNIA, INC.</option>
								<option value="TSR LIGHTING, INC">TSR LIGHTING, INC</option>
								<option value="TST INC">TST INC</option>
								<option value="TUBE SERVICE COMPANY">TUBE SERVICE COMPANY</option>
								<option value="TUBULAR STEEL, INC.">TUBULAR STEEL, INC.</option>
								<option value="TURTLE & HUGHES, INC">TURTLE & HUGHES, INC</option>
								<option value="TYLER LOGISTICS CORP">TYLER LOGISTICS CORP</option>
								<option value="U.S. CONVERTERS">U.S. CONVERTERS</option>
								<option value="U.S. DEPARTMENT OF STATE">U.S. DEPARTMENT OF STATE</option>
								<option value="U.S. EQUIPTMENT">U.S. EQUIPTMENT</option>
								<option value="U.S. FLAG & FLAG POLE SUP. INC">U.S. FLAG & FLAG POLE SUP. INC</option>
								<option value="U.S. RIGGING SUPPLY">U.S. RIGGING SUPPLY</option>
								<option value="UDC CORPORATION">UDC CORPORATION</option>
								<option value="UL VERIFICATION SERVICES, INC">UL VERIFICATION SERVICES, INC</option>
								<option value="ULINE">ULINE</option>
								<option value="ULISES LOPEZ CEDANO">ULISES LOPEZ CEDANO</option>
								<option value="UNDERWRITERS LABORATORIES, INC">UNDERWRITERS LABORATORIES, INC</option>
								<option value="UNIMET METAL SUPPLY, INC.">UNIMET METAL SUPPLY, INC.</option>
								<option value="UNIPRINT, INC">UNIPRINT, INC</option>
								<option value="UNISSONIQUE">UNISSONIQUE</option>
								<option value="UNITECH ENGINEERING, INC">UNITECH ENGINEERING, INC</option>
								<option value="UNITED ELECTRIC SUPPLY COMPANY, INC">UNITED ELECTRIC SUPPLY COMPANY, INC</option>
								<option value="UNITED LIGHTING STANDARDS INC">UNITED LIGHTING STANDARDS INC</option>
								<option value="UNITED RENTALS (NORTH AMERICA), INC">UNITED RENTALS (NORTH AMERICA), INC</option>
								<option value="UNITED SHEET METAL">UNITED SHEET METAL</option>
								<option value="UNITED STATES TREASURY">UNITED STATES TREASURY</option>
								<option value="UNITED WELDING SUPPLY CO.">UNITED WELDING SUPPLY CO.</option>
								<option value="UNIVERISAL MERCANILE EXCHANGE">UNIVERISAL MERCANILE EXCHANGE</option>
								<option value="UNIVERSAL LIGHTING TECHNOLOGIES">UNIVERSAL LIGHTING TECHNOLOGIES</option>
								<option value="UNIVERSAL MOLDINGS">UNIVERSAL MOLDINGS</option>
								<option value="UNIVERSAL PRINTING SOLUTIONS, INC.">UNIVERSAL PRINTING SOLUTIONS, INC.</option>
								<option value="UNIVERSAL SAW">UNIVERSAL SAW</option>
								<option value="UNIVERSAL STEEL SERVICE">UNIVERSAL STEEL SERVICE</option>
								<option value="UNIVERSAL TECHNICAL RESOURCES SERVICES">UNIVERSAL TECHNICAL RESOURCES SERVICES</option>
								<option value="UNIVERSITY ELECTRIC, INC.">UNIVERSITY ELECTRIC, INC.</option>
								<option value="UNIVERSITY TROPHIES & AWARDS, INC">UNIVERSITY TROPHIES & AWARDS, INC</option>
								<option value="UPS - 0X853Y ACH">UPS - 0X853Y ACH</option>
								<option value="UPS FREIGHT">UPS FREIGHT</option>
								<option value="UPS SUPPLY CHAIN SOLUTIONS, INC">UPS SUPPLY CHAIN SOLUTIONS, INC</option>
								<option value="URBEX INNOVATIONS">URBEX INNOVATIONS</option>
								<option value="US BANK EQUIPMENT FINANCE">US BANK EQUIPMENT FINANCE</option>
								<option value="US DEPARTMENT OF STATE">US DEPARTMENT OF STATE</option>
								<option value="US ENERGY SERVICES, INC.">US ENERGY SERVICES, INC.</option>
								<option value="US FLAGPOLE INC.">US FLAGPOLE INC.</option>
								<option value="USA WIRE & CABLE">USA WIRE & CABLE</option>
								<option value="USHIO AMERICA INC.">USHIO AMERICA INC.</option>
								<option value="UTILITY METALS">UTILITY METALS</option>
								<option value="V & J POWDER COATING, INC.">V & J POWDER COATING, INC.</option>
								<option value="V2R2, LLC / DBA CD HARDWARE">V2R2, LLC / DBA CD HARDWARE</option>
								<option value="VALMONT">VALMONT</option>
								<option value="VALMONT">VALMONT</option>
								<option value="VALMONT INDUSTRIES">VALMONT INDUSTRIES</option>
								<option value="VASONA LABS, INC">VASONA LABS, INC</option>
								<option value="VELA">VELA</option>
								<option value="VELTRI ELECTRIC, INC.">VELTRI ELECTRIC, INC.</option>
								<option value="VENTURE LIGHTING INTERNATIONAL, INC.">VENTURE LIGHTING INTERNATIONAL, INC.</option>
								<option value="VER SALES X 25">VER SALES X 25</option>
								<option value="VERGASON TECHNOLOGY INC">VERGASON TECHNOLOGY INC</option>
								<option value="VERITIV OPERATING COMPANY">VERITIV OPERATING COMPANY</option>
								<option value="VERIZON WIRELESS">VERIZON WIRELESS</option>
								<option value="VERONICA ESPINOZA GARCIA">VERONICA ESPINOZA GARCIA</option>
								<option value="VICENTE GUTIERREZ">VICENTE GUTIERREZ</option>
								<option value="VICTOR GILBERTO BLANDO BRICEÑO">VICTOR GILBERTO BLANDO BRICEÑO</option>
								<option value="VICTOR MANUEL LIZARRAGA PINEDA">VICTOR MANUEL LIZARRAGA PINEDA</option>
								<option value="VICTOR MANUEL RAMIREZ M">VICTOR MANUEL RAMIREZ M</option>
								<option value="VICTOR MANUEL VILLALOBOS PEREZ">VICTOR MANUEL VILLALOBOS PEREZ</option>
								<option value="VICTOR VALLEJO">VICTOR VALLEJO</option>
								<option value="VIP RUBBER CO., INC.">VIP RUBBER CO., INC.</option>
								<option value="VIRTICUS CORP.">VIRTICUS CORP.</option>
								<option value="VISA REFACCIONES INDUSTRIALES">VISA REFACCIONES INDUSTRIALES</option>
								<option value="VISCO">VISCO</option>
								<option value="VISION ENGINEERING">VISION ENGINEERING</option>
								<option value="VISION POWER AND LIGHT, INC.">VISION POWER AND LIGHT, INC.</option>
								<option value="VISTA SALES CO.">VISTA SALES CO.</option>
								<option value="VISTA UNIVERSAL, INC.">VISTA UNIVERSAL, INC.</option>
								<option value="VITA NEEDLE COMPANY, INC.">VITA NEEDLE COMPANY, INC.</option>
								<option value="VITRACOAT PINTURAS EN POLVO S.A. DE C.V.">VITRACOAT PINTURAS EN POLVO S.A. DE C.V.</option>
								<option value="VIZION TECHNOLOGIES">VIZION TECHNOLOGIES</option>
								<option value="VOLTARC">VOLTARC</option>
								<option value="VORTEX INDUSTRIES, INC">VORTEX INDUSTRIES, INC</option>
								<option value="VXB BALL BEARING">VXB BALL BEARING</option>
								<option value="W.L GORE & ASSOCIATES, INC">W.L GORE & ASSOCIATES, INC</option>
								<option value="WACKER CHEMICAL CORP">WACKER CHEMICAL CORP</option>
								<option value="WAKEFIELD THERMAL SOLUTIONS, INC.">WAKEFIELD THERMAL SOLUTIONS, INC.</option>
								<option value="WALKER CASTING">WALKER CASTING</option>
								<option value="WALLACE ELECTRIC COMPANY">WALLACE ELECTRIC COMPANY</option>
								<option value="WALTERS WHOLESALE ELECTRIC">WALTERS WHOLESALE ELECTRIC</option>
								<option value="WALTERS WHOLESALE ELECTRIC - LB">WALTERS WHOLESALE ELECTRIC - LB</option>
								<option value="WALTERS WHOLESALE ELECTRIC - SH">WALTERS WHOLESALE ELECTRIC - SH</option>
								<option value="WARNOCK SOLUTIONS">WARNOCK SOLUTIONS</option>
								<option value="WARREN WONG">WARREN WONG</option>
								<option value="WASTE MANAGEMENT">WASTE MANAGEMENT</option>
								<option value="WATSON ELECTRICAL CONSTRUCTION CO, LLC">WATSON ELECTRICAL CONSTRUCTION CO, LLC</option>
								<option value="WATSON LAND COMPANY">WATSON LAND COMPANY</option>
								<option value="WATT STOPPER">WATT STOPPER</option>
								<option value="WAXIE-ACCT. 145808">WAXIE-ACCT. 145808</option>
								<option value="WC ILLUMINATION">WC ILLUMINATION</option>
								<option value="WCE, INC">WCE, INC</option>
								<option value="WCIS, INC.">WCIS, INC.</option>
								<option value="WCL COMPANY">WCL COMPANY</option>
								<option value="WELLS FARGO BANK, N.A.">WELLS FARGO BANK, N.A.</option>
								<option value="WENTWORTH LIGHTING COMPANY">WENTWORTH LIGHTING COMPANY</option>
								<option value="WESCO DISTRIBUTION">WESCO DISTRIBUTION</option>
								<option value="WESCO MACHINERY GROUP">WESCO MACHINERY GROUP</option>
								<option value="WEST COAST AERIAL PHOTOGRAPHY, INC">WEST COAST AERIAL PHOTOGRAPHY, INC</option>
								<option value="WEST COAST CNC, INC">WEST COAST CNC, INC</option>
								<option value="WEST COAST INTERNET">WEST COAST INTERNET</option>
								<option value="WEST COAST METAL FINISHING CO.">WEST COAST METAL FINISHING CO.</option>
								<option value="WEST COAST STEEL & TUBE INC.">WEST COAST STEEL & TUBE INC.</option>
								<option value="WEST MICHIGAN LIGHTING INC">WEST MICHIGAN LIGHTING INC</option>
								<option value="WEST PRINTING & GRAPHICS, INC">WEST PRINTING & GRAPHICS, INC</option>
								<option value="WEST VIRGINIA ELECTRIC SUPPLY CO">WEST VIRGINIA ELECTRIC SUPPLY CO</option>
								<option value="WEST-LITE SUPPLY COMPANY, INC">WEST-LITE SUPPLY COMPANY, INC</option>
								<option value="WESTERN GLASS">WESTERN GLASS</option>
								<option value="WESTERN SHELVING & RACK, INC">WESTERN SHELVING & RACK, INC</option>
								<option value="WESTWOOD WHOSALE">WESTWOOD WHOSALE</option>
								<option value="WHITE STONE TECHNOLOGIES, INC.">WHITE STONE TECHNOLOGIES, INC.</option>
								<option value="WICKS AIRCRAFT SUPPLY CO.">WICKS AIRCRAFT SUPPLY CO.</option>
								<option value="WILD SALES COMPANY CORP">WILD SALES COMPANY CORP</option>
								<option value="WILD WEST LIGHTING, INC.">WILD WEST LIGHTING, INC.</option>
								<option value="WILINX DE MEXICO S. DE R.L DE">WILINX DE MEXICO S. DE R.L DE</option>
								<option value="WILLIAM BANKSTON">WILLIAM BANKSTON</option>
								<option value="WILLIAM E. PEERY">WILLIAM E. PEERY</option>
								<option value="WINSKI ASSOCIATES">WINSKI ASSOCIATES</option>
								<option value="WIRE GUARD">WIRE GUARD</option>
								<option value="WIRELESS PLANET">WIRELESS PLANET</option>
								<option value="WITTMAN BATTENFELD">WITTMAN BATTENFELD</option>
								<option value="WORLD OF CABLES">WORLD OF CABLES</option>
								<option value="XIN GUO">XIN GUO</option>
								<option value="XIZMO MEDIA">XIZMO MEDIA</option>
								<option value="YANCEY SANDBLAST">YANCEY SANDBLAST</option>
								<option value="YESICA VILLAVICENCIO HITO">YESICA VILLAVICENCIO HITO</option>
								<option value="YONKE FERRARI SA DE CV">YONKE FERRARI SA DE CV</option>
								<option value="YOUNG LIGHTING AGENCY, INC.">YOUNG LIGHTING AGENCY, INC.</option>
								<option value="YOUNG STEEL">YOUNG STEEL</option>
								<option value="YRC, INC.">YRC, INC.</option>
								<option value="YUSHIN AMERICA">YUSHIN AMERICA</option>
								<option value="Z-TRONIX INC">Z-TRONIX INC</option>
								<option value="ZAGO MANUFACTURING CO, INC">ZAGO MANUFACTURING CO, INC</option>
								<option value="ZAINO TENNIS COURTS, INC">ZAINO TENNIS COURTS, INC</option>
								<option value="ZAL INDUSTRIAL">ZAL INDUSTRIAL</option>
								<option value="ZIPTAPE -ACCT#76225420">ZIPTAPE -ACCT#76225420</option>
								<option value="N/A"> N/A </option>
								<option value="OTRO"> OTRO </option>
							</select>
						</td>
						
					</tr>
					
					<tr>
						<td> FECHA DE ENVIO: </td>
						<td> <input type="text" name="fechaenvio" id="fechaenvio" class="input_ncpr" value="" title="El campo no puede estar vacio." placeholder="dd-mm-aaaa" required /></td>
						
					</tr>
					<tr>
						<td> </td>
						<td align="center" > <input type="checkbox" name="fecha_na" id="fecha_na" value="N/A" onchange='activar_campo_fechaenvio(this);'/> N/A</td>
						
					</tr>
			</table>
			
			<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
			
					
					<tr >
						<td width="300"> AREA/DEPARTAMENTO DONDE SE DETECTO:</td>
						<td>
							<select name="areadeptdeteccion" onchange='activar_campo_areadept(this.value);' required>
								<option value=""> Selecciona una opción: </option>
								<option value="ACCES"> ACCES - ACCESORIOS </option>
								<option value="ALMDR"> ALMDR - FAB AL PERDORADO</option>
								<option value="ALMGR"> ALMGR - FAB AL PULIDO</option>
								<option value="ALMWL"> ALMWL - FAB AL SOLDADURA</option>
								<option value="CNC01"> CNC01 - CNC</option>
								<option value="DCAST"> DCAST - DIE CASTING</option>
								<option value="DRASS"> DRASS - ENSAMBLE PUERTAS</option>
								<option value="EXTSP"> EXTSP - PROVEEDOR EXTERNO</option>
								<option value="FASS1"> FASS1 - ENSAMBLE FINAL LINEA 1</option>
								<option value="FASS2"> FASS2 - ENSAMBLE FINAL LINEA 2</option>
								<option value="FASS3"> FASS3 - ENSAMBLE FINAL LINEA 3</option>
								<option value="FASS4"> FASS4 - ENSAMBLE FINAL LINEA 4</option>
								<option value="FASS5"> FASS5 - ENSAMBLE FINAL LINEA 5</option>
								<option value="FASS6"> FASS6 - ENSAMBLE FINAL LINEA 6</option>
								<option value="FNDRY"> FNDRY - FUNDICION</option>
								<option value="LEDAS"> LEDAS - ENSAMBLE LED</option>
								<option value="OPASS"> OPASS - ENSAMBLE REFLECTORES</option>
								<option value="PCBCR"> PCBCR - PCB CUARTO LIMPIO</option>
								<option value="PCOAT"> PCOAT - PINTURA</option>
								<option value="PINRD"> PINRD - INYECCION PLASTICO RD</option>
								<option value="SHIPP"> SHIPP - EMBARQUES</option>
								<option value="SMTRD"> SMTRD - MONTAJE SMT RD</option>
								<option value="SPNNG"> SPNNG - SPINNING</option>
								<option value="STLFB"> STLFB - FAB ACERO</option>
								<option value="SUBAS"> SUBAS - SUB ENSAMBLE</option>
								<option value="WHSRE"> WHSRE - ALMACEN</option>
								<option value="THR03"> THR03 - OTRO</option>
								</select> 
						</td>
						
					</tr>
					
					<tr>
					<td> </td>
					<td >
							Otro: <input type="text" name="areadeptdeteccion_otro" id="areadeptdeteccion_otro" class="input_ncpr" placeholder="Área/Departamento donde se detectó:" disabled required />
					</td>
					</tr>
							
			</table>
			
			<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
							
					<tr>
						<td width="300"> ORIGEN DE LA NO CONFORMIDAD Y RAZON DE RECHAZO: </td>
						<td> 
							<form> 
								<p> 
									<select id='select1' onchange='cargarSelect2(this.value);' required> 
										<option value=""> Selecciona una opción </option> 
										<option value="ACCES"> ACCES - ACCESORIOS </option> 
										<option value="ALMDR"> ALMDR - FAB AL PERFORADO </option> 
										<option value="ALMGR"> ALMGR - FAB AL PULIDO </option> 
										<option value="ALMWL"> ALMWL - FAB AL SOLDADURA </option> 
									
										<option value="CNC01"> CNC01 - CNC </option> 
										<option value="DCAST"> DCAST - DIE CASTING </option> 
										<option value="FASSY"> FASSY - ENSAMBLE FINAL </option> 
										<option value="FNDRY"> FNDRY - FUNDICION </option> 
										
										<option value="LEDAS"> LEDAS - ENSAMBLE LED </option> 
										<option value="OPASS"> OPASS - ENSAMBLE REFLECTORES </option> 
										<option value="PCBCR"> PCBNR - PCB CUARTO LIMPIO </option> 
										<option value="PINRD"> PINRD - INYECCION PLASTICO RD </option> 
										
										<option value="PCOAT"> PCOAT - PINTURA </option> 
										<option value="SMTRD"> SMTRD - CUARTO SMT (RD) </option> 
										<option value="SPNNG"> SPNNG - SPINNING </option> 
										<option value="STLFB"> STLFB - FABRICACION ACERO </option> 
										
										<option value="SPEXT"> SPEXT - PROVEEDOR (EXTERNO) </option> 
										<option value="WHSRE"> WHSRE - ALMACEN </option> 
									</select> 
									<input name="origen_codigo" id="origen_codigo" hidden/>
								</p>
							</form> 
						</td>
					</tr>
					
					<tr>
					<td>	
						
					</td>
					<td>
						<select id="select2" onchange='seleccinado_select2();' disabled required>
								<option value=""> Selecciona una opción </option> 
						</select>  
					</td>
					</tr>
					
					<tr>
					<td> </td>
					<td>
						<input type="text" name="origen_otro" id="origen_otro" class="input_ncpr" placeholder="Razón de rechazo" disabled required />
					</td>
					</tr>
					
				</table>
				
				<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 

					<tr>
						<td width="300"> DESCRIPCION DE LA FALLA REPORTADA: </td>
						<td colspan="3"> <textarea rows="2" name="descripcionfalla" title="El campo no puede estar vacio." placeholder="Descripción de la falla reportada" required></textarea></td>

					</tr>					
			
				</table>
				
				<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
					
				
					<tr>
						<td width="300"> LOCALIZACION DEL DEFECTO:</td>
						<td>
							<select name="localiza_defecto" onchange='activar_campo_localiza_defecto(this.value);' required>
								<option value=""> Selecciona una opción: </option>
								<option value="SPROC"> SPROC - INSPECCION AL INICIO DEL PROCESO </option>
								<option value="IPROC"> IPROC - DURANTE EL PROCESO </option>
								<option value="EPROC"> EPROC - INSPECCION AL FINAL DEL PROCESO </option>
								<option value="WHSRE"> WHSRE - ALMACEN (EN INVENTARIO) </option>
								<option value="INCOM"> INCOM - INSPECCION DE RECIBOS </option>
								<option value="SHIPG"> SHIPG - EMBARQUES</option>
								<option value="THR01"> THR01 - OTRO </option>
							</select> 
						</td>
					</tr>
					
					<tr>
						<td> </td>
						<td> 
						Otro: <input type="text" name="localiza_defecto_otro" id="localiza_defecto_otro" class="input_ncpr" placeholder="Localización del defecto" disabled required />					
						</td>
					</tr>
					
				</table>
				
				<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
										
					<tr>
						<td width="300"> DISPOSICION DEL DEFECTO:</td>
						<td>
							<select name="disposicion" onchange='activar_campo_disposicion(this.value);' required>
								<option value=""> Selecciona una opción: </option>
								<option value="SCRAP"> SCRAP - DESECHAR (SCRAP) </option>
								<option value="RT2RD"> RT2RD - REGRESAR A RANCHO DOMINGUEZ </option>
								<option value="RT2VD"> TR2VD - REGRESAR A PROVEEDOR (EXTERNO) </option>
								<option value="USEAI"> USEAI - USAR COMO ESTA </option>
								<option value="REWRK"> REWRK - RE-TRABAJAR </option>
								<option value="SRTQA"> SRTQA - SEPARAR </option>
								<option value="TBDQA"> TBDQA - POR DEFINIR (QA) </option>
								<option value="THR02"> THR02 - OTRO </option>
							</select>
				 		</td>
					</tr>
					
					<tr>
					<td> </td>
					<td> 
					Otro: <input type="text" name="disposicion_otro" id="disposicion_otro" class="input_ncpr" placeholder="Disposición del defecto" disabled required />
					</td>
					</tr>

		</table>
		
		<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 

					<tr>
						<td width="300"> ¿REQUIERE ACCION CORRECTIVA? </td>
						<td>
							<select name="accion" required>
								<option value=""> Selecciona una opción: </option>
								<option value="SI"> SI </option>
								<option value="NO"> NO </option>;
							</select> 
				 		</td>
					</tr>					
					
					<tr>
						<td> DESTINO DEL REPORTE DE NO CONFORMIDAD: </td>
						<td>
							<select name="Destino" required>
								<option value=""> Selecciona una opción: </option>
								<option value="MEXICO"> MEXICO </option>
								<option value="RD"> RD </option>;
							</select> 
				 		</td>
					</tr>
		</table>

		<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
					<tr>
						<td width="300"> ARCHIVO FOTOGRAFICO: </td>
						<td>
							<input type="file" name="foto1" id="foto1" ><br><br>
				 		</td>
					</tr>
					
					<tr>
					<td></td>
					<td><input type="file" name="foto2" id="foto2" ><br><br></td>
					</tr>
					
					<tr>
					<td></td>
					<td><input type="file" name="foto3" id="foto3" ><br><br></td>
					</tr>
					
		</table>
		
		<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 

					<tr>
						<td width="300">Acciones inmediatas: </td>
						<td colspan="3"> <textarea rows="2" name="accin" title="El campo no puede estar vacio." placeholder="Accion inmediata" required></textarea></td>
					</tr>					
		</table>
		
		<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 
					<tr>
						<td width="300"> ARCHIVO FOTOGRAFICO: </td>
						<td>
							<input type="file" name="foto4" id="foto4" ><br><br>
				 		</td>
					</tr>
					
					<tr>
					<td></td>
					<td><input type="file" name="foto5" id="foto5" ><br><br></td>
					</tr>
					
					<tr>
					<td></td>
					<td><input type="file" name="foto6" id="foto6" ><br><br></td>
					</tr>
					
		</table>
		
		<table cellpadding='0' cellspacing='0' border='1' width="900" class='tabla_altas'> 

			<tr>
				<td width="300">Acciones tomadas por:</td>
				<td colspan="3"> <textarea rows="2" name="accin2" title="El campo no puede estar vacio." placeholder="Acciones tomadas por (Inmediate actions taken by)" required></textarea></td>
			</tr>		
			
		</table>
		

				<div id="boton_generar">
					<input type="submit" name="ok" id="ok" value="GENERAR NCPR" />
				</div>
			</form>	

			<br>	
			
			<form action="reports/ReporteNcprs.php" >
				<div id="boton_reporte">
					<input type="submit" value="REPORTE"/>
				</div>
			</form>
		</div>
	</body> 
</html>