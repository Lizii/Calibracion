<?php
	define('FPDF_FONTPATH', 'fpdf/font/');
	
	require('DBManager.php');
	require('iniciar.php');
	require('fpdf/fpdf.php');

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
	$pdf = new FPDF();

	// PDF(Vertical, Milimetros, Tamaño Carta)
	$pdf=new PDF('P', 'mm', 'Letter');
	$pdf->AddPage();
	$pdf->SetFont('helvetica', '', '8');
	
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect(8, 5, 201, 265);   // Contenedor principal
	
	$pdf->Image('./images/Logo.jpg', 15, 10, 65); //Imagen de logotipo
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->SetXY(110, 12);
	$pdf->SetFont('Arial', 'B', '18');
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->cell(63, 5, "EXAMEN MEDICO LABORAL", 0, 1, 'C', 'F');
	
	if ($objCon->conectar()==true)
	{
		$Id='9';
		$sql="SELECT 
		tbfichaclinica.Appaterno,
		tbfichaclinica.Apmaterno,
		tbfichaclinica.Nombre,
		tbfichaclinica.Sexo,
		tbfichaclinica.Edad,
		tbfichaclinica.Ecivil,
		tbfichaclinica.Escolaridad,
		tbfichaclinica.Domicilio,
		tbfichaclinica.Lnacimiento,
		tbfichaclinica.Fnacimiento,
		tbfichaclinica.Tresidencia,
		tbfichaclinica.Religion,
		tbfichaclinica.Sangre,
		tbfichaclinica.Rh,
		tbfichaclinica.Lateralidad,
		tbfichaclinica.Contacto,
		tbfichaclinica.Fecha,
		tbfichaclinica.Hora,
		tbfichaclinica.Examen_Por,
		
		tbantmedicos.Enf_Congenita,
		tbantmedicos.Def_Congenita,
		tbantmedicos.Enf_Infantiles,
		tbantmedicos.Alergias,
		tbantmedicos.Enf_Ojos,
		tbantmedicos.Enf_Oidos,
		tbantmedicos.Audifonos,
		tbantmedicos.Enf_Dentales,
		tbantmedicos.Enf_Tiroide,
		tbantmedicos.Enf_Pulmones,
		tbantmedicos.Enf_Corazon,
		tbantmedicos.Tension_Arterial,
		tbantmedicos.Enf_Digestivas,
		tbantmedicos.Enf_Higado,
		tbantmedicos.Diabetes_Azucar,
		tbantmedicos.Alteraciones_Metabolicas,
		tbantmedicos.Enf_Renales_Uro,
		tbantmedicos.Enf_Neurologicas,
		tbantmedicos.Enf_Psiquiatricas,
		tbantmedicos.Enf_Piel,
		tbantmedicos.Prob_Osteomusculares,
		tbantmedicos.Enf_Infecciosas,
		tbantmedicos.Ing_Hospitalario,
		tbantmedicos.Op_Cirugia,
		tbantmedicos.Acc_Graves,
		tbantmedicos.Secuelas,
		tbantmedicos.Enf_Cronicas,
		tbantmedicos.Varices,
		
		tbhabitos.Tabaco,
		tbhabitos.Exfumador,
		tbhabitos.Habitual_Fumar,
		tbhabitos.Tabaco_Dia,
		tbhabitos.Alcohol,
		tbhabitos.Alc_Esporadico,
		tbhabitos.Alc_Fines,
		tbhabitos.Alc_Habitual,
		tbhabitos.Cafe,
		tbhabitos.Cafe_Esporadico,
		tbhabitos.Cafe_Habitual,
		tbhabitos.Drogas,
		tbhabitos.Drogas_Esporadico,
		tbhabitos.Drogas_Fines,
		tbhabitos.Drogas_Tipo,
		tbhabitos.Drogas_Ex_Anos,
		tbhabitos.Deporte,
		tbhabitos.Dep_Esporadico,
		tbhabitos.Dep_Habitual,
		tbhabitos.Dep_Cual,
		tbhabitos.Medicamentos,
		tbhabitos.Med_Espora,
		tbhabitos.Med_Ultima,
		tbhabitos.Med_Actual,
		tbhabitos.Med_Nombre,
		tbhabitos.Horas_Sueno,
		tbhabitos.Tareas_Dom,
		tbhabitos.Tar_Dom_Cual,
		
		tbantmedfam.Padre_Enf,
		tbantmedfam.Padre_Enf_Cual,
		tbantmedfam.Padre_Vive,
		tbantmedfam.Padre_Fallecido,
		tbantmedfam.Madre_Enf,
		tbantmedfam.Madre_Enf_Cual,
		tbantmedfam.Madre_Vive,
		tbantmedfam.Madre_Fallecida,
		tbantmedfam.Parentesco_Enf,
		tbantmedfam.Hijos,
		tbantmedfam.Hijos_Enf,
		tbantmedfam.Fam_Diabetes,
		tbantmedfam.Fam_Hip_Art,
		tbantmedfam.Fam_Corazon,
		tbantmedfam.Fam_Colesterol,
		tbantmedfam.Fam_Otro,
		tbantmedfam.Fam_Cual,
		
		tbdatosmujer.Menarquia_Anos,
		tbdatosmujer.Ritmo,
		tbdatosmujer.Ritmo_Dias,
		tbdatosmujer.FUR,
		tbdatosmujer.VSA,
		tbdatosmujer.Prob_Ginecologico,
		tbdatosmujer.Des_Menstruales,
		tbdatosmujer.Infecciones,
		tbdatosmujer.Gine_Otro,
		tbdatosmujer.Rev_Ginecologicos,
		tbdatosmujer.Rev_Fecha,
		tbdatosmujer.Gestas,
		tbdatosmujer.Partos,
		tbdatosmujer.Cesareas,
		tbdatosmujer.Abortos,
		tbdatosmujer.FUP,
		tbdatosmujer.FUC,
		tbdatosmujer.FUA,
		tbdatosmujer.Anticonceptivos,
		tbdatosmujer.Anticon_Cual,
		tbdatosmujer.Prob_Mamarios,
		tbdatosmujer.Bultos_Nodulos,
		
		tbdatoslaborales.Empresa1,
		tbdatoslaborales.Puesto1,
		tbdatoslaborales.Antiguedad1,
		tbdatoslaborales.Motivo1,
		tbdatoslaborales.R_Fisicos1,
		tbdatoslaborales.R_Quimicos1,
		tbdatoslaborales.R_Biologicos1,
		tbdatoslaborales.R_Ergonomicos1,
		tbdatoslaborales.R_Psicosociales1,
		tbdatoslaborales.Empresa2,
		tbdatoslaborales.Puesto2,
		tbdatoslaborales.Antiguedad2,
		tbdatoslaborales.Motivo2,
		tbdatoslaborales.R_Fisicos2,
		tbdatoslaborales.R_Quimicos2,
		tbdatoslaborales.R_Biologicos2,
		tbdatoslaborales.R_Ergonomicos2,
		tbdatoslaborales.R_Psicosociales2,
		tbdatoslaborales.Empresa3,
		tbdatoslaborales.Puesto3,
		tbdatoslaborales.Antiguedad3,
		tbdatoslaborales.Motivo3,
		tbdatoslaborales.R_Fisicos3,
		tbdatoslaborales.R_Quimicos3,
		tbdatoslaborales.R_Biologicos3,
		tbdatoslaborales.R_Ergonomicos3,
		tbdatoslaborales.R_Psicosociales3,
		tbdatoslaborales.EPP,
		
		tbexpfis.TA,
		tbexpfis.FC,
		tbexpfis.FR,
		tbexpfis.Estatura,
		tbexpfis.Peso,
		tbexpfis.IMC,
		tbexpfis.AV_OD,
		tbexpfis.AV_OI,
		tbexpfis.AV_CL,
		tbexpfis.AV_SL,
		tbexpfis.Campimetria,
		tbexpfis.AA_OD,
		tbexpfis.AA_OI,
		tbexpfis.Reflejos_Pupilares,
		tbexpfis.Campos_Pulmonares,
		tbexpfis.Cuello,
		tbexpfis.Torax,
		tbexpfis.Abdomen,
		tbexpfis.Hernias,
		tbexpfis.Ext_Sup,
		tbexpfis.Ext_Inf,
		tbexpfis.Columna_Vertebral,
		tbexpfis.Genitales,
		tbexpfis.Glucemia,
		tbexpfis.Pr_Toxico,
		tbexpfis.Pr_Toxico_A,
		tbexpfis.Pr_Embarazo,
		tbexpfis.Req_Puesto,
		tbexpfis.Compatibilidad,
		tbexpfis.Comentarios,
		tbexpfis.Dictamen
		
		FROM tbfichaclinica, tbantmedicos, tbhabitos, tbantmedfam, tbdatosmujer, tbdatoslaborales, tbexpfis
		WHERE 
		tbfichaclinica.Id= '$Id' and
		tbantmedicos.Id='$Id' and 
		tbhabitos.Id='$Id' and 
		tbantmedfam.Id='$Id' and
		tbdatosmujer.Id='$Id' and
		tbdatoslaborales.Id='$Id' and
		tbexpfis.Id='$Id'";
		$result = mysql_query($sql);
		
		while ($row=mysql_fetch_array($result)) 
		{ 
			//Tabla Ficha Clinica
			$Appaterno=$row['Appaterno'];
			$Apmaterno=$row['Apmaterno'];
			$Nombre=$row['Nombre'];
			$Sexo=$row['Sexo'];
			$Edad=$row['Edad'];
			$Ecivil=$row['Ecivil'];
			$Escolaridad=$row['Escolaridad'];
			$Domicilio=$row['Domicilio'];
			$Lnacimiento=$row['Lnacimiento'];
			$Fnacimiento=$row['Fnacimiento'];
			$Tresidencia=$row['Tresidencia'];
			$Religion=$row['Religion'];
			$Sangre=$row['Sangre'];
			$Rh=$row['Rh'];
			$Lateralidad=$row['Lateralidad'];
			$Contacto=$row['Contacto'];
			$Fecha=$row['Fecha'];
			$Hora=$row['Hora'];
			$Examen_Por=$row['Examen_Por'];
			//Tabla Antecedentes medicos personales
			$Enf_Congenita=$row['Enf_Congenita'];
			$Def_Congenita=$row['Def_Congenita'];
			$Enf_Infantiles=$row['Enf_Infantiles'];
			$Alergias=$row['Alergias'];
			$Enf_Ojos=$row['Enf_Ojos'];
			$Enf_Oidos=$row['Enf_Oidos'];
			$Audifonos=$row['Audifonos'];
			$Enf_Dentales=$row['Enf_Dentales'];
			$Enf_Tiroide=$row['Enf_Tiroide'];
			$Enf_Pulmones=$row['Enf_Pulmones'];
			$Enf_Corazon=$row['Enf_Corazon'];
			$Tension_Arterial=$row['Tension_Arterial'];
			$Enf_Digestivas=$row['Enf_Digestivas'];
			$Enf_Higado=$row['Enf_Higado'];
			$Diabetes_Azucar=$row['Diabetes_Azucar'];
			$Alteraciones_Metabolicas=$row['Alteraciones_Metabolicas'];
			$Enf_Renales_Uro=$row['Enf_Renales_Uro'];
			$Enf_Neurologicas=$row['Enf_Neurologicas'];
			$Enf_Psiquiatricas=$row['Enf_Psiquiatricas'];
			$Enf_Piel=$row['Enf_Piel'];
			$Prob_Osteomusculares=$row['Prob_Osteomusculares'];
			$Enf_Infecciosas=$row['Enf_Infecciosas'];
			$Ing_Hospitalario=$row['Ing_Hospitalario'];
			$Op_Cirugia=$row['Op_Cirugia'];
			$Acc_Graves=$row['Acc_Graves'];
			$Secuelas=$row['Secuelas'];
			$Enf_Cronicas=$row['Enf_Cronicas'];
			$Varices=$row['Varices'];
			//HABITOS
			$Tabaco=$row['Tabaco'];
			$Exfumador=$row['Exfumador'];
			$Habitual_Fumar=$row['Habitual_Fumar'];
			$Tabaco_Dia=$row['Tabaco_Dia'];
			$Alcohol=$row['Alcohol'];
			$Alc_Esporadico=$row['Alc_Esporadico'];
			$Alc_Fines=$row['Alc_Fines'];
			$Alc_Habitual=$row['Alc_Habitual'];
			$Cafe=$row['Cafe'];
			$Cafe_Esporadico=$row['Cafe_Esporadico'];
			$Cafe_Habitual=$row['Cafe_Habitual'];
			$Drogas=$row['Drogas'];
			$Drogas_Esporadico=$row['Drogas_Esporadico'];
			$Drogas_Fines=$row['Drogas_Fines'];
			$Drogas_Tipo=$row['Drogas_Tipo'];
			$Drogas_Ex_Anos=$row['Drogas_Ex_Anos'];
			$Deporte=$row['Deporte'];
			$Dep_Esporadico=$row['Dep_Esporadico'];
			$Dep_Habitual=$row['Dep_Habitual'];
			$Dep_Cual=$row['Dep_Cual'];
			$Medicamentos=$row['Medicamentos'];
			$Med_Espora=$row['Med_Espora'];
			$Med_Ultima=$row['Med_Ultima'];
			$Med_Actual=$row['Med_Actual'];
			$Med_Nombre=$row['Med_Nombre'];
			$Horas_Sueno=$row['Horas_Sueno'];
			$Tareas_Dom=$row['Tareas_Dom'];
			$Tar_Dom_Cual=$row['Tar_Dom_Cual'];
			//ANTECEDENTES MEDICOS FAMILIARES
			$Padre_Enf=$row['Padre_Enf'];
			$Padre_Enf_Cual=$row['Padre_Enf_Cual'];
			$Padre_Vive=$row['Padre_Vive'];
			$Padre_Fallecido=$row['Padre_Fallecido'];
			$Madre_Enf=$row['Madre_Enf'];
			$Madre_Enf_Cual=$row['Madre_Enf_Cual'];
			$Madre_Vive=$row['Madre_Vive'];
			$Madre_Fallecida=$row['Madre_Fallecida'];
			$Parentesco_Enf=$row['Parentesco_Enf'];
			$Hijos=$row['Hijos'];
			$Hijos_Enf=$row['Hijos_Enf'];
			$Fam_Diabetes=$row['Fam_Diabetes'];
			$Fam_Hip_Art=$row['Fam_Hip_Art'];
			$Fam_Corazon=$row['Fam_Corazon'];
			$Fam_Colesterol=$row['Fam_Colesterol'];
			$Fam_Otro=$row['Fam_Otro'];
			$Fam_Cual=$row['Fam_Cual'];
			//SOLO SI ES MUJER
			$Menarquia_Anos=$row['Menarquia_Anos'];
			$Ritmo=$row['Ritmo'];
			$Ritmo_Dias=$row['Ritmo_Dias'];
			$FUR=$row['FUR'];
			$VSA=$row['VSA'];
			$Prob_Ginecologico=$row['Prob_Ginecologico'];
			$Des_Menstruales=$row['Des_Menstruales'];
			$Infecciones=$row['Infecciones'];
			$Gine_Otro=$row['Gine_Otro'];
			$Rev_Ginecologicos=$row['Rev_Ginecologicos'];
			$Rev_Fecha=$row['Rev_Fecha'];
			$Gestas=$row['Gestas'];
			$Partos=$row['Partos'];
			$Cesareas=$row['Cesareas'];
			$Abortos=$row['Abortos'];
			$FUP=$row['FUP'];
			$FUC=$row['FUC'];
			$FUA=$row['FUA'];
			$Anticonceptivos=$row['Anticonceptivos'];
			$Anticon_Cual=$row['Anticon_Cual'];
			$Prob_Mamarios=$row['Prob_Mamarios'];
			$Bultos_Nodulos=$row['Bultos_Nodulos'];
			//Datos laborales
			$Empresa1=$row['Empresa1'];
			$Puesto1=$row['Puesto1'];
			$Antiguedad1=$row['Antiguedad1'];
			$Motivo1=$row['Motivo1'];
			$R_Fisicos1=$row['R_Fisicos1'];
			$R_Quimicos1=$row['R_Quimicos1'];
			$R_Biologicos1=$row['R_Biologicos1'];
			$R_Ergonomicos1=$row['R_Ergonomicos1'];
			$R_Psicosociales1=$row['R_Psicosociales1'];
			$Empresa2=$row['Empresa2'];
			$Puesto2=$row['Puesto2'];
			$Antiguedad2=$row['Antiguedad2'];
			$Motivo2=$row['Motivo2'];
			$R_Fisicos2=$row['R_Fisicos2'];
			$R_Quimicos2=$row['R_Quimicos2'];
			$R_Biologicos2=$row['R_Biologicos2'];
			$R_Ergonomicos2=$row['R_Ergonomicos2'];
			$R_Psicosociales2=$row['R_Psicosociales2'];
			$Empresa3=$row['Empresa3'];
			$Puesto3=$row['Puesto3'];
			$Antiguedad3=$row['Antiguedad3'];
			$Motivo3=$row['Motivo3'];
			$R_Fisicos3=$row['R_Fisicos3'];
			$R_Quimicos3=$row['R_Quimicos3'];
			$R_Biologicos3=$row['R_Biologicos3'];
			$R_Ergonomicos3=$row['R_Ergonomicos3'];
			$R_Psicosociales3=$row['R_Psicosociales3'];
			$EPP=$row['EPP'];
			//Exploracion fisica
			$TA=$row['TA'];
			$FC=$row['FC'];
			$FR=$row['FR'];
			$Estatura=$row['Estatura'];
			$Peso=$row['Peso'];
			$IMC=$row['IMC'];
			$AV_OD=$row['AV_OD'];
			$AV_OI=$row['AV_OI'];
			$AV_CL=$row['AV_CL'];
			$AV_SL=$row['AV_SL'];
			$Campimetria=$row['Campimetria'];
			$AA_OD=$row['AA_OD'];
			$AA_OI=$row['AA_OI'];
			$Reflejos_Pupilares=$row['Reflejos_Pupilares'];
			$Campos_Pulmonares=$row['Campos_Pulmonares'];
			$Cuello=$row['Cuello'];
			$Torax=$row['Torax'];
			$Abdomen=$row['Abdomen'];
			$Hernias=$row['Hernias'];
			$Ext_Sup=$row['Ext_Sup'];
			$Ext_Inf=$row['Ext_Inf'];
			$Columna_Vertebral=$row['Columna_Vertebral'];
			$Genitales=$row['Genitales'];
			$Glucemia=$row['Glucemia'];
			$Pr_Toxico=$row['Pr_Toxico'];
			$Pr_Toxico_A=$row['Pr_Toxico_A'];
			$Pr_Embarazo=$row['Pr_Embarazo'];
			$Req_Puesto=$row['Req_Puesto'];
			$Compatibilidad=$row['Compatibilidad'];
			$Comentarios=$row['Comentarios'];
			$Dictamen=$row['Dictamen'];
			
			
			
		}
	}
	$setx=15;
	$sety=190;
	$cellx=45;
	$cellsize=194;
	$setderecha=99;
	$renglon=5;
	$tabla1=30;
	$tabla2=80;
	$tabla3=175;
	$tabla4=225;
	$tabla5=30;
	$tabla6=75;
	$tabla7=98;
	$tabla8=121;
	$tabla9=160;
	$firma=240;
	$color_celda=[141,180,226]; //color en RGB para las celdas en el archivo
	/* Fin de variables del sistema*/
	
	/***************************************************************************/
	//TABLA 1
	$pdf->SetXY($setx, $tabla1-5.5);
	$pdf->SetFont('Arial', 'B', '12');
	$pdf->cell(19, 5, "FICHA CLINICA", 0, 1, 'L');
	
//DANDO COLORES A LAS CELDAS ***********SE DEBE DAR COLOR ANTES DE DIBUJAR
	$pdf->SetXY($setx, $tabla1);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(33, 35, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+57, $tabla1);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(33, 20, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+120, $tabla1);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(36, 20, "", 0, 1, 'L','F');
	
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	
	$pdf->Rect($setx, $tabla1 ,$sety, 5);
	$pdf->Rect($setx, $tabla1+5,$sety, 5);
	$pdf->Rect($setx, $tabla1+10,$sety, 5);
	$pdf->Rect($setx, $tabla1+15,$sety, 5);
	$pdf->Rect($setx, $tabla1+20,$sety, 5);
	$pdf->Rect($setx, $tabla1+25,$sety, 5);
	$pdf->Rect($setx, $tabla1+30,$sety, 5);
	
	$pdf->Line(48, $tabla1, 48, $tabla1+35);
	$pdf->Line(72, $tabla1, 72, $tabla1+20);
	$pdf->Line(105, $tabla1, 105, $tabla1+20);
	$pdf->Line(135, $tabla1, 135, $tabla1+20);
	$pdf->Line(171, $tabla1, 171, $tabla1+20);

	//COLUMNA 1
	$pdf->SetXY($setx, $tabla1+.9);
	$pdf->SetFont('Arial','B', '7');
	$pdf->cell(19, 5, "APELLIDO PATERNO:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla1+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "SEXO:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla1+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ESCOLARIDAD:", 0, 1, 'L');

	$pdf->SetXY($setx, $tabla1+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "TIPO DE SANGRE:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla1+20.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "DOMICILIO:", 0, 1, 'L');

	$pdf->SetXY($setx, $tabla1+25.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "LUGAR DE NACIMIENTO:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla1+30.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "CONTACTO:", 0, 1, 'L');
	
	//COLUMNA 2
	$pdf->SetXY($setx+33, $tabla1+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(24, 5, $Appaterno, 0, 1, 'L');
	
	$pdf->SetXY($setx+33, $tabla1+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Sexo, 0, 1, 'L');
	
	$pdf->SetXY($setx+33, $tabla1+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Escolaridad, 0, 1, 'L');
	
	$pdf->SetXY($setx+33, $tabla1+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Sangre, 0, 1, 'L');
	
	//COLUMNA 3
	$pdf->SetXY($setx+57, $tabla1+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "APELLIDO MATERNO:", 0, 1, 'L');

	$pdf->SetXY($setx+57, $tabla1+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "EDAD:", 0, 1, 'L');
	
	$pdf->SetXY($setx+57, $tabla1+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "FECHA DE NACIMIENTO:", 0, 1, 'L');

	$pdf->SetXY($setx+57, $tabla1+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "RH:", 0, 1, 'L');
	
	//COLUMNA 4
	$pdf->SetXY($setx+90, $tabla1+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Apmaterno, 0, 1, 'L');
	
	$pdf->SetXY($setx+90, $tabla1+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Edad, 0, 1, 'L');
	
	$pdf->SetXY($setx+90, $tabla1+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Fnacimiento, 0, 1, 'L');
	
	$pdf->SetXY($setx+90, $tabla1+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Rh, 0, 1, 'L');
	
	//COLUMNA 5
	
	$pdf->SetXY($setx+120, $tabla1+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "NOMBRE:", 0, 1, 'L');
	
	$pdf->SetXY($setx+120, $tabla1+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ESTADO CIVIL:", 0, 1, 'L');
	
	$pdf->SetXY($setx+120, $tabla1+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "RESIDENCIA EN ENSENADA:", 0, 1, 'L');
	
	$pdf->SetXY($setx+120, $tabla1+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "LATERALIDAD:", 0, 1, 'L');
	
	//COLUMNA 6
	
	$pdf->SetXY($setx+156, $tabla1+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Nombre, 0, 1, 'L');
	
	$pdf->SetXY($setx+156, $tabla1+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Ecivil, 0, 1, 'L');
	
	$pdf->SetXY($setx+156, $tabla1+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Tresidencia, 0, 1, 'L');
	
	$pdf->SetXY($setx+156, $tabla1+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Lateralidad, 0, 1, 'L');
	
	//COLUMNA 2.1
	
	$pdf->SetXY($setx+33, $tabla1+20.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Domicilio, 0, 1, 'L');

	$pdf->SetXY($setx+33, $tabla1+25.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Lnacimiento, 0, 1, 'L');
	
	$pdf->SetXY($setx+33, $tabla1+30.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Contacto, 0, 1, 'L');
	
	
	/***************************************************************************/
	//TABLA 2
	
	$pdf->SetXY($setx, $tabla2-5.5);
	$pdf->SetFont('Arial', 'B', '12');
	$pdf->cell(19, 5, "ANTECEDENTES MEDICOS PERSONALES", 0, 1, 'L');
	
	//DANDO COLORES A LAS CELDAS ***********SE DEBE DAR COLOR ANTES DE DIBUJAR
	$pdf->SetXY($setx, $tabla2);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(57, 80, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+96, $tabla2);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(54, 60, "", 0, 1, 'L','F');
	
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	
	$pdf->Rect($setx, $tabla2,$sety, 5);
	$pdf->Rect($setx, $tabla2+5,$sety, 5);
	$pdf->Rect($setx, $tabla2+10,$sety, 5);
	$pdf->Rect($setx, $tabla2+15,$sety, 5);
	$pdf->Rect($setx, $tabla2+20,$sety, 5);
	$pdf->Rect($setx, $tabla2+25,$sety, 5);
	$pdf->Rect($setx, $tabla2+30,$sety, 5);
	$pdf->Rect($setx, $tabla2+35,$sety, 5);
	$pdf->Rect($setx, $tabla2+40,$sety, 5);
	$pdf->Rect($setx, $tabla2+45,$sety, 5);
	$pdf->Rect($setx, $tabla2+50,$sety, 5);
	$pdf->Rect($setx, $tabla2+55,$sety, 5);
	$pdf->Rect($setx, $tabla2+60,$sety, 5);
	$pdf->Rect($setx, $tabla2+65,$sety, 5);
	$pdf->Rect($setx, $tabla2+70,$sety, 5);
	$pdf->Rect($setx, $tabla2+75,$sety, 5);
	
	$pdf->Line(72, $tabla2, 72, $tabla2+80);
	$pdf->Line(111, $tabla2, 111, $tabla2+60);
	$pdf->Line(165, $tabla2, 165, $tabla2+60);
	
	//COLUMNA 1
	
	$pdf->SetXY($setx, $tabla2+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDAD CONGENITA / HEREDITARIA:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "DEFORMIDAD CONGENITA:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES INFANTILES IMPORTANTES:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ALERGIAS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+20.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES DE LOS OJOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+25.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES DE LOS OIDOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+30.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "AUDIFONOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+35.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES DENTALES:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+40.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES DEL TIROIDE:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+45.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES DE LOS PULMONES:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+50.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES DEL CORAZON:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+55.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ALTERACION DE LA TENSION ARTERIAL:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+60.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "INGRESO HOSPITALARIO:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+65.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "OPERACIONES DE CIRUGIA:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+70.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ACCIDENTES GRAVES:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla2+75.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "SECUELAS:", 0, 1, 'L');
	
	//COLUMNA 2
	
	$pdf->SetXY($setx+57, $tabla2+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Congenita, 0, 1, 'L');
	
	$pdf->SetXY($setx+57, $tabla2+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Def_Congenita, 0, 1, 'L');

	$pdf->SetXY($setx+57, $tabla2+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Infantiles, 0, 1, 'L');

	$pdf->SetXY($setx+57, $tabla2+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Alergias, 0, 1, 'L');

	$pdf->SetXY($setx+57, $tabla2+20.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Ojos, 0, 1, 'L');

	$pdf->SetXY($setx+57, $tabla2+25.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Oidos, 0, 1, 'L');

	$pdf->SetXY($setx+57, $tabla2+30.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Audifonos, 0, 1, 'L');

	$pdf->SetXY($setx+57, $tabla2+35.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Dentales, 0, 1, 'L');

	$pdf->SetXY($setx+57, $tabla2+40.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Tiroide, 0, 1, 'L');

	$pdf->SetXY($setx+57, $tabla2+45.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Pulmones, 0, 1, 'L');

	$pdf->SetXY($setx+57, $tabla2+50.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Corazon, 0, 1, 'L');

	$pdf->SetXY($setx+57, $tabla2+55.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Tension_Arterial, 0, 1, 'L');
	
	//COLUMNA 3
	
	$pdf->SetXY($setx+96, $tabla2+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES DIGESTIVAS:", 0, 1, 'L');	
	
	$pdf->SetXY($setx+96, $tabla2+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES DEL HIGADO:", 0, 1, 'L');	
	
	$pdf->SetXY($setx+96, $tabla2+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "DIABETES / AZUCAR:", 0, 1, 'L');	
	
	$pdf->SetXY($setx+96, $tabla2+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ALTEARCIONES METABOLICAS:", 0, 1, 'L');	
	
	$pdf->SetXY($setx+96, $tabla2+20.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES RENALES / UROLOGICAS:", 0, 1, 'L');	
	
	$pdf->SetXY($setx+96, $tabla2+25.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES NEUROLOGICAS:", 0, 1, 'L');	
	
	$pdf->SetXY($setx+96, $tabla2+30.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES PSIQUIATRICAS:", 0, 1, 'L');	
	
	$pdf->SetXY($setx+96, $tabla2+35.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES DE LA PIEL:", 0, 1, 'L');	
	
	$pdf->SetXY($setx+96, $tabla2+40.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "PROBLEMAS OSTEOMUSCULARES:", 0, 1, 'L');	
	
	$pdf->SetXY($setx+96, $tabla2+45.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES INFECCIOSAS:", 0, 1, 'L');	
	
	$pdf->SetXY($setx+96, $tabla2+50.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES CRONICAS:", 0, 1, 'L');	
	
	$pdf->SetXY($setx+96, $tabla2+55.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "TIENE VARICES:", 0, 1, 'L');	
	
	//COLUMNA 4
	
	$pdf->SetXY($setx+150, $tabla2+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Digestivas, 0, 1, 'L');		
	
	$pdf->SetXY($setx+150, $tabla2+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Higado, 0, 1, 'L');		
	
	$pdf->SetXY($setx+150, $tabla2+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Diabetes_Azucar, 0, 1, 'L');		
	
	$pdf->SetXY($setx+150, $tabla2+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Alteraciones_Metabolicas, 0, 1, 'L');		
	
	$pdf->SetXY($setx+150, $tabla2+20.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Renales_Uro, 0, 1, 'L');		
	
	$pdf->SetXY($setx+150, $tabla2+25.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Neurologicas, 0, 1, 'L');		
	
	$pdf->SetXY($setx+150, $tabla2+30.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Psiquiatricas, 0, 1, 'L');		
	
	$pdf->SetXY($setx+150, $tabla2+35.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Piel, 0, 1, 'L');		
	
	$pdf->SetXY($setx+150, $tabla2+40.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Prob_Osteomusculares, 0, 1, 'L');		
	
	$pdf->SetXY($setx+150, $tabla2+45.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Infecciosas, 0, 1, 'L');		
	
	$pdf->SetXY($setx+150, $tabla2+50.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Enf_Cronicas, 0, 1, 'L');		
	
	$pdf->SetXY($setx+150, $tabla2+55.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Varices, 0, 1, 'L');		
	
	//COLUMNA 2.1
	
	$pdf->SetXY($setx+57, $tabla2+60.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Ing_Hospitalario, 0, 1, 'L');
	
	$pdf->SetXY($setx+57, $tabla2+65.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Op_Cirugia, 0, 1, 'L');
	
	$pdf->SetXY($setx+57, $tabla2+70.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Acc_Graves, 0, 1, 'L');
	
	$pdf->SetXY($setx+57, $tabla2+75.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Secuelas, 0, 1, 'L');
	
	/***************************************************************************/
	//TABLA 3
	
	$pdf->SetXY($setx, $tabla3-5.5);
	$pdf->SetFont('Arial', 'B', '12');
	$pdf->cell(19, 5, "HABITOS", 0, 1, 'L');
	
	//DANDO COLORES A LAS CELDAS ***********SE DEBE DAR COLOR ANTES DE DIBUJAR
	$pdf->SetXY($setx, $tabla3);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(30, 35, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+37, $tabla3+30);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(30, 5, "", 0, 1, 'L','F');
	
	$pdf->Rect($setx, $tabla3,$sety, 5);
	$pdf->Rect($setx, $tabla3+5,$sety, 5);
	$pdf->Rect($setx, $tabla3+10,$sety, 5);
	$pdf->Rect($setx, $tabla3+15,$sety, 5);
	$pdf->Rect($setx, $tabla3+20,$sety, 5);
	$pdf->Rect($setx, $tabla3+25,$sety, 5);
	$pdf->Rect($setx, $tabla3+30,$sety, 5);
	
	$pdf->Line(45, $tabla3, 45, $tabla3+35);
	$pdf->Line(52, $tabla3+30, 52, $tabla3+35);
	$pdf->Line(82, $tabla3+30, 82, $tabla3+35);
	
	//COLUMNA 1
	
	$pdf->SetXY($setx, $tabla3+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "TABACO:", 0, 1, 'L');

	$pdf->SetXY($setx, $tabla3+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ALCOHOL:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla3+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "CAFE / TE:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla3+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "DEPORTES:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla3+20.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "MEDICAMENTOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla3+25.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "DROGAS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla3+30.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, utf8_decode("HORAS SUEÑO AL DIA:"), 0, 1, 'L');
	
	//COLUMNA 2
	//if para desplegar las opciones de tabaco **********************************
	if($Tabaco=="NUNCA")
		{
			$pdf->SetXY($setx+30, $tabla3+.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, "NUNCA.", 0, 1, 'L');
		}
	elseif($Exfumador==NULL)
		{
			$pdf->SetXY($setx+30, $tabla3+.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, "FUMADOR HABITUAL HACE ".$Habitual_Fumar.utf8_decode(" AÑOS Y FUMA ").$Tabaco_Dia." CIGARROS AL DIA.", 0, 1, 'L');
		}
	else
		{
			$pdf->SetXY($setx+30, $tabla3+.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, "NO FUMA DESDE HACE ".$Exfumador.utf8_decode(" AÑOS."), 0, 1, 'L');
		}	
	
	if($Alcohol!=NULL)
		{
			$pdf->SetXY($setx+30, $tabla3+5.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, $Alcohol.".", 0, 1, 'L');
		}
	elseif($Alc_Esporadico!=NULL)
		{
			$pdf->SetXY($setx+30, $tabla3+5.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, "ESPORADICAMENTE.", 0, 1, 'L');		
		}
	elseif($Alc_Fines!=NULL)
		{
			$pdf->SetXY($setx+30, $tabla3+5.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, "FINES DE SEMANA ".$Alc_Fines." COPAS / CERVEZAS", 0, 1, 'L');
		}
	else
		{
			$pdf->SetXY($setx+30, $tabla3+5.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, "HABITUALMENTE ".$Alc_Habitual." COPAS / CERVEZAS AL DIA", 0, 1, 'L');
		}
	
	if($Cafe!=NULL)
		{
			$pdf->SetXY($setx+30, $tabla3+10.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, $Cafe.".", 0, 1, 'L');
		}
	elseif($Cafe_Esporadico!=NULL)
		{
			$pdf->SetXY($setx+30, $tabla3+10.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, "ESPORADICAMENTE.", 0, 1, 'L');
		}
	else
		{
			$pdf->SetXY($setx+30, $tabla3+10.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, "HABITUALMENTE ".$Cafe_Habitual." TAZAS AL DIA", 0, 1, 'L');
		}
	
	if ($Deporte!=NULL)
		{
			$pdf->SetXY($setx+30, $tabla3+15.5);
			$pdf->SetFont('Arial', '', '7');
				$pdf->cell(19, 5, $Deporte.".", 0, 1, 'L');
		}
	elseif($Dep_Esporadico!=NULL)
		{
			$pdf->SetXY($setx+30, $tabla3+15.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, $Dep_Cual." ESPORADICAMENTE.", 0, 1, 'L');
		}
	else
		{
			$pdf->SetXY($setx+30, $tabla3+15.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, $Dep_Cual." HABITUALMENTE ".$Dep_Habitual." HORAS AL DIA.", 0, 1, 'L');		
		}
	
	if($Medicamentos!=NULL)
		{
			$pdf->SetXY($setx+30, $tabla3+20.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, $Medicamentos." ESPORADICAMENTE.", 0, 1, 'L');
		}
	elseif($Med_Ultima)
		{
			$pdf->SetXY($setx+30, $tabla3+20.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, $Med_Nombre." LAS ULTIMAS DOS SEMANAS.", 0, 1, 'L');
		}
	else
		{
			$pdf->SetXY($setx+30, $tabla3+20.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, "ACTUALMENTE TOMA: ".$Med_Nombre.".", 0, 1, 'L');	
		}
	
	if($Drogas!=NULL)
		{
			$pdf->SetXY($setx+30, $tabla3+25.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, "NUNCA.", 0, 1, 'L');
		}
	elseif($Drogas_Esporadico!=NULL)
		{
			$pdf->SetXY($setx+30, $tabla3+25.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, $Drogas_Tipo." ESPORADICAMENTE.", 0, 1, 'L');
		}
	elseif($Drogas_Fines)
		{
			$pdf->SetXY($setx+30, $tabla3+25.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, $Drogas_Tipo." LOS FINES DE SEMANA.", 0, 1, 'L');
		}
	else
		{
			$pdf->SetXY($setx+30, $tabla3+25.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, "EX CONSUMIDOR DESDE HACE ".$Drogas_Ex_Anos.UTF8_decode(" AÑOS"), 0, 1, 'L');
		}
		
	$pdf->SetXY($setx+30, $tabla3+30.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Horas_Sueno, 0, 1, 'L');
	
	//COLUMNA 2.1
	
	$pdf->SetXY($setx+37, $tabla3+30.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "TAREAS DOMESTICAS:", 0, 1, 'L');
	
	if($Tareas_Dom==NULL)
		{
			$pdf->SetXY($setx+67, $tabla3+30.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, "NO REALIZA TAREAS DOMESTICAS", 0, 1, 'L');
		}
	else
		{
			$pdf->SetXY($setx+67, $tabla3+30.5);
			$pdf->SetFont('Arial', '', '7');
			$pdf->cell(19, 5, $Tareas_Dom." ".$Tar_Dom_Cual, 0, 1, 'L');
		}
/***************************************************************************/
	//TABLA 4
	
	$pdf->SetXY($setx, $tabla4-5.5);
	$pdf->SetFont('Arial', 'B', '12');
	$pdf->cell(19, 5, "ANTECEDENTES MEDICOS FAMILIARES", 0, 1, 'L');
	
	//DANDO COLORES A LAS CELDAS ***********SE DEBE DAR COLOR ANTES DE DIBUJAR
	$pdf->SetXY($setx, $tabla4);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(33, 15, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx, $tabla4+15);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(81, 5, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+39, $tabla4);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(23, 15, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+102, $tabla4);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(11, 10, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+119, $tabla4);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(21, 10, "", 0, 1, 'L','F');
	
	$pdf->Rect($setx, $tabla4,$sety, 5);
	$pdf->Rect($setx, $tabla4+5,$sety, 5);
	$pdf->Rect($setx, $tabla4+10,$sety, 5);
	$pdf->Rect($setx, $tabla4+15,$sety, 5);
	
	$pdf->Line(48, $tabla4, 48, $tabla4+15);
	$pdf->Line(54, $tabla4, 54, $tabla4+15);
	$pdf->Line(77, $tabla4, 77, $tabla4+15);
	$pdf->Line(117, $tabla4, 117, $tabla4+10);
	$pdf->Line(128, $tabla4, 128, $tabla4+10);
	$pdf->Line(134, $tabla4, 134, $tabla4+10);
	$pdf->Line(155, $tabla4, 155, $tabla4+10);
	$pdf->Line(96, $tabla4+15, 96, $tabla4+20);
	
	//COLUMNA 1
	
	$pdf->SetXY($setx, $tabla4+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES PADRE:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla4+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES MADRE:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla4+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "HIJOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla4+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES CONGENITAS O HEREDITARIAS EN SU FAMILIA:", 0, 1, 'L');
	
	//COLUMNA 2
	
	$pdf->SetXY($setx+33, $tabla4+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Padre_Enf, 0, 1, 'L');
	
	$pdf->SetXY($setx+33, $tabla4+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Madre_Enf, 0, 1, 'L');
	
	$pdf->SetXY($setx+33, $tabla4+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Hijos, 0, 1, 'L');
	
	//COLUMNA 3
	
	$pdf->SetXY($setx+39, $tabla4+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, utf8_decode("¿CUALES?"), 0, 1, 'L');
	
	$pdf->SetXY($setx+39, $tabla4+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, utf8_decode("¿CUALES?"), 0, 1, 'L');
	
	$pdf->SetXY($setx+39, $tabla4+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ENFERMEDADES:", 0, 1, 'L');
	
	//COLUMNA 4
	
	$pdf->SetXY($setx+62, $tabla4+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Padre_Enf_Cual.".", 0, 1, 'L');
	
	$pdf->SetXY($setx+62, $tabla4+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Madre_Enf_Cual.".", 0, 1, 'L');
	
	$pdf->SetXY($setx+62, $tabla4+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Hijos_Enf, 0, 1, 'L');
	
	//COLUMNA 5
	
	$pdf->SetXY($setx+102, $tabla4+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, utf8_decode("¿VIVE?"), 0, 1, 'L');
	
	$pdf->SetXY($setx+102, $tabla4+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, utf8_decode("¿VIVE?"), 0, 1, 'L');
	
	//COLUMNA 6
	
	$pdf->SetXY($setx+113, $tabla4+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Padre_Vive, 0, 1, 'L');
	
	$pdf->SetXY($setx+113, $tabla4+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Madre_Vive, 0, 1, 'L');
	
	//COLUMNA 7
	
	$pdf->SetXY($setx+119, $tabla4+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "FALLECIDO DE:", 0, 1, 'L');
	
	$pdf->SetXY($setx+119, $tabla4+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "FALLECIDO DE:", 0, 1, 'L');
	
	//COLUMNA 8
	
	$pdf->SetXY($setx+140, $tabla4+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Padre_Fallecido, 0, 1, 'L');
	
	$pdf->SetXY($setx+140, $tabla4+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Madre_Fallecida, 0, 1, 'L');
	
	//COLUMNA 2.1
	if($Fam_Diabetes!=NULL)
		{
			$Fam_Diabetes= "DIABETES, ";
		}
		if($Fam_Hip_Art!=NULL)
		{
			$Fam_Hip_Art= "HIPERTENSION ARTERIAL, ";
		}
		if($Fam_Corazon!=NULL)
		{
			$Fam_Corazon= "CORAZON, ";
		}
		if($Fam_Colesterol!=NULL)
		{
			$Fam_Colesterol= "COLESTEROL, ";
		}
	$pdf->SetXY($setx+81, $tabla4+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Fam_Diabetes.$Fam_Hip_Art.$Fam_Corazon.$Fam_Colesterol.$Fam_Cual, 0, 1, 'L');
		
	/***************************************************************************/
	$pdf->AddPage();
	
	$pdf->SetFont('helvetica', '', '8');
	
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->Rect(8, 5, 201, 265);   // Contenedor principal
	
	$pdf->Image('./images/Logo.jpg', 12, 8, 65); //Imagen de logotipo
	//Rect(Izquierda, Arriba, Derecha, Abajo)
	$pdf->SetXY(110, 12);
	$pdf->SetFont('Arial', 'B', '18');
	$pdf->SetFillColor(255, 255, 255); // Color Blanco
	$pdf->cell(63, 5, "EXAMEN MEDICO LABORAL", 0, 1, 'C', 'F');

/********************************************************************************/
	//TABLA 5
	
	$pdf->SetXY($setx, $tabla5-5.5);
	$pdf->SetFont('Arial', 'B', '12');
	$pdf->cell(19, 5, "CONTESTE SOLO SI ES MUJER", 0, 1, 'L');
	
	//DANDO COLORES A LAS CELDAS ***********SE DEBE DAR COLOR ANTES DE DIBUJAR
	$pdf->SetXY($setx, $tabla5);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(25, 30, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+39, $tabla5);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(40, 10, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+96, $tabla5);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(41, 25, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+153, $tabla5);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(22, 25, "", 0, 1, 'L','F');
		
	$pdf->Rect($setx, $tabla5,$sety, 5);
	$pdf->Rect($setx, $tabla5,$sety, 10);
	$pdf->Rect($setx, $tabla5,$sety, 15);
	$pdf->Rect($setx, $tabla5,$sety, 20);
	$pdf->Rect($setx, $tabla5,$sety, 25);
	$pdf->Rect($setx, $tabla5,$sety, 30);
	
	$pdf->Line(40, $tabla5, 40, $tabla5+30);
	$pdf->Line(54, $tabla5, 54, $tabla5+10);
	$pdf->Line(54, $tabla5+15, 54, $tabla5+25);
	$pdf->Line(94, $tabla5, 94, $tabla5+10);
	$pdf->Line(94, $tabla5+15, 94, $tabla5+25);
	$pdf->Line(111, $tabla5, 111, $tabla5+25);
	$pdf->Line(111, $tabla5, 111, $tabla5+25);
	$pdf->Line(152, $tabla5, 152, $tabla5+25);
	$pdf->Line(168, $tabla5, 168, $tabla5+25);
	$pdf->Line(190, $tabla5, 190, $tabla5+25);
	
	//COLUMNA 1
	
	$pdf->SetXY($setx, $tabla5+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "MENARQUIA:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla5+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "V.S.A. DESDE LOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla5+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "OTRO:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla5+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "GESTAS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla5+20.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "F.U.P.:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla5+25.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "CUAL?:", 0, 1, 'L');
	
	//COLUMNA 2
	if($Menarquia_Anos!=NULL)
	{
		$pdf->SetXY($setx+25, $tabla5+.5);
		$pdf->SetFont('Arial', '', '7');
		$pdf->cell(19, 5, $Menarquia_Anos.utf8_decode(" AÑOS"), 0, 1, 'L');
	}
	
	if($VSA!=Null)
	{
		$pdf->SetXY($setx+25, $tabla5+5.5);
		$pdf->SetFont('Arial', '', '7');
		$pdf->cell(19, 5,  $VSA.utf8_decode(" AÑOS"),  0, 1, 'L');
	}

	$pdf->SetXY($setx+25, $tabla5+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Gine_Otro, 0, 1, 'L');
	
	$pdf->SetXY($setx+25, $tabla5+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Gestas, 0, 1, 'L');
	
	$pdf->SetXY($setx+25, $tabla5+20.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $FUP, 0, 1, 'L');
	
	$pdf->SetXY($setx+25, $tabla5+25.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Anticon_Cual, 0, 1, 'L');
	
	//COLUMNA 3
	
	$pdf->SetXY($setx+39, $tabla5+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "RITMO:", 0, 1, 'L');
	
	$pdf->SetXY($setx+39, $tabla5+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "PROBLEMAS GINECOLOGICOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx+39, $tabla5+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "PARTOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx+39, $tabla5+20.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "F.U.C.:", 0, 1, 'L');
	
	//COLUMNA 4
	
	$pdf->SetXY($setx+79, $tabla5+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Ritmo, 0, 1, 'L');
	
	$pdf->SetXY($setx+79, $tabla5+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Prob_Ginecologico, 0, 1, 'L');
	
	$pdf->SetXY($setx+79, $tabla5+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Partos, 0, 1, 'L');
	
	$pdf->SetXY($setx+79, $tabla5+20.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $FUC, 0, 1, 'L');

	//COLUMNA 5

	$pdf->SetXY($setx+96, $tabla5+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "CADA:", 0, 1, 'L');

	$pdf->SetXY($setx+96, $tabla5+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "DESARREGLOS MENSTRUALES:", 0, 1, 'L');

	$pdf->SetXY($setx+96, $tabla5+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "REVISIONES GINECOLOGICAS:", 0, 1, 'L');

	$pdf->SetXY($setx+96, $tabla5+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "CESAREAS:", 0, 1, 'L');
	
	$pdf->SetXY($setx+96, $tabla5+20.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "F.U.A.:", 0, 1, 'L');
	
	//COLUMNA 6
	if($Ritmo_Dias!=NULL)
	{
		$pdf->SetXY($setx+137, $tabla5+.5);
		$pdf->SetFont('Arial', '', '7');
		$pdf->cell(19, 5, $Ritmo_Dias." DIAS", 0, 1, 'L');
	}

	$pdf->SetXY($setx+137, $tabla5+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5,$Des_Menstruales, 0, 1, 'L');
	
	$pdf->SetXY($setx+137, $tabla5+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Rev_Ginecologicos, 0, 1, 'L');
	
	$pdf->SetXY($setx+137, $tabla5+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Cesareas, 0, 1, 'L');
	
	$pdf->SetXY($setx+137, $tabla5+20.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $FUA, 0, 1, 'L');
	
	//COLUMNA 7
	
	$pdf->SetXY($setx+153, $tabla5+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "F.U.R.:", 0, 1, 'L');
	
	$pdf->SetXY($setx+153, $tabla5+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "INFECCIONES:", 0, 1, 'L');
	
	$pdf->SetXY($setx+153, $tabla5+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "FECHA ULT REV:", 0, 1, 'L');
	
	$pdf->SetXY($setx+153, $tabla5+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ABORTOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx+153, $tabla5+20.5);
	$pdf->SetFont('Arial', 'B', '6');
	$pdf->cell(19, 5, "ANTICONCEPTIVO:", 0, 1, 'L');
	
	//COLUMNA 8
	
	$pdf->SetXY($setx+175, $tabla5+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $FUR, 0, 1, 'L');
	
	$pdf->SetXY($setx+175, $tabla5+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Infecciones, 0, 1, 'L');
	
	$pdf->SetXY($setx+175, $tabla5+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Rev_Fecha, 0, 1, 'L');
	
	$pdf->SetXY($setx+175, $tabla5+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Abortos, 0, 1, 'L');

	$pdf->SetXY($setx+175, $tabla5+20.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Anticonceptivos, 0, 1, 'L');	
	
	/***************************************************************************/
	
	//TABLA 6
	
	$pdf->SetXY($setx, $tabla6-5.5);
	$pdf->SetFont('Arial', 'B', '12');
	$pdf->cell(19, 5, "DATOS LABORALES", 0, 1, 'L');
	
	//DANDO COLORES A LAS CELDAS ***********SE DEBE DAR COLOR ANTES DE DIBUJAR
	$pdf->SetXY($setx, $tabla6);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(30, 20, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+96, $tabla6);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(29, 20, "", 0, 1, 'L','F');
	
	
	$pdf->Rect($setx, $tabla6,$sety, 5);
	$pdf->Rect($setx, $tabla6+5,$sety, 5);
	$pdf->Rect($setx, $tabla6+10,$sety, 5);
	$pdf->Rect($setx, $tabla6+15,$sety, 5);
		
	$pdf->Line(45, $tabla6, 45, $tabla6+20);
	$pdf->Line(111, $tabla6, 111, $tabla6+20);
	$pdf->Line(140, $tabla6, 140, $tabla6+20);
	
	//COLUMNA 1
	
	$pdf->SetXY($setx, $tabla6+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "EMPRESA:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla6+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "MOTIVO SEPARACION:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla6+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R. QUIMICOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla6+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R.ERGONOMICOS:", 0, 1, 'L');
	
	//COLUMNA 2
	
	$pdf->SetXY($setx+30, $tabla6+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Empresa1, 0, 1, 'L');
	
	$pdf->SetXY($setx+30, $tabla6+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Motivo1, 0, 1, 'L');
	
	$pdf->SetXY($setx+30, $tabla6+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Quimicos1, 0, 1, 'L');
	
	$pdf->SetXY($setx+30, $tabla6+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Ergonomicos1, 0, 1, 'L');
	
	//COLUMNA 3
	
	$pdf->SetXY($setx+96, $tabla6+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "PUESTO DE TRABAJO:", 0, 1, 'L');
	
	$pdf->SetXY($setx+96, $tabla6+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R. FISICOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx+96, $tabla6+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R. BIOLOGICOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx+96, $tabla6+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R. PSICOSOCIALES:", 0, 1, 'L');
	
	//COLUMNA 4
	
	$pdf->SetXY($setx+125, $tabla6+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Puesto1, 0, 1, 'L');
	
	$pdf->SetXY($setx+125, $tabla6+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Fisicos1, 0, 1, 'L');
	
	$pdf->SetXY($setx+125, $tabla6+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Biologicos1, 0, 1, 'L');
	
	$pdf->SetXY($setx+125, $tabla6+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Psicosociales1, 0, 1, 'L');
	
	
	/***************************************************************************/
	//TABLA 7
	
	
	//DANDO COLORES A LAS CELDAS ***********SE DEBE DAR COLOR ANTES DE DIBUJAR
	$pdf->SetXY($setx, $tabla7);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(30, 20, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+96, $tabla7);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(29, 20, "", 0, 1, 'L','F');
	
	$pdf->Rect($setx, $tabla7,$sety, 5);
	$pdf->Rect($setx, $tabla7+5,$sety, 5);
	$pdf->Rect($setx, $tabla7+10,$sety, 5);
	$pdf->Rect($setx, $tabla7+15,$sety, 5);
		
	$pdf->Line(45, $tabla7, 45, $tabla7+20);
	$pdf->Line(111, $tabla7, 111, $tabla7+20);
	$pdf->Line(140, $tabla7, 140, $tabla7+20);
	
	
	//COLUMNA 1
	
	$pdf->SetXY($setx, $tabla7+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "EMPRESA:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla7+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "MOTIVO SEPARACION:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla7+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R. QUIMICOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla7+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R.ERGONOMICOS:", 0, 1, 'L');
	
	//COLUMNA 2
	
	$pdf->SetXY($setx+30, $tabla7+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Empresa2, 0, 1, 'L');
	
	$pdf->SetXY($setx+30, $tabla7+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Motivo2, 0, 1, 'L');
	
	$pdf->SetXY($setx+30, $tabla7+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Quimicos2, 0, 1, 'L');
	
	$pdf->SetXY($setx+30, $tabla7+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Ergonomicos2, 0, 1, 'L');
	
	//COLUMNA 3
	
	$pdf->SetXY($setx+96, $tabla7+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "PUESTO DE TRABAJO:", 0, 1, 'L');
	
	$pdf->SetXY($setx+96, $tabla7+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R. FISICOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx+96, $tabla7+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R. BIOLOGICOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx+96, $tabla7+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R. PSICOSOCIALES:", 0, 1, 'L');
	
	//COLUMNA 4
	
	$pdf->SetXY($setx+125, $tabla7+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Puesto2, 0, 1, 'L');
	
	$pdf->SetXY($setx+125, $tabla7+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Fisicos2, 0, 1, 'L');
	
	$pdf->SetXY($setx+125, $tabla7+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Biologicos2, 0, 1, 'L');
	
	$pdf->SetXY($setx+125, $tabla7+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Psicosociales2, 0, 1, 'L');
	
	
	
	
	
	/***************************************************************************/
	//TABLA 8
	
	//DANDO COLORES A LAS CELDAS ***********SE DEBE DAR COLOR ANTES DE DIBUJAR
	$pdf->SetXY($setx, $tabla8);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(30, 25, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+96, $tabla8);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(29, 20, "", 0, 1, 'L','F');
	
	$pdf->Rect($setx, $tabla8,$sety, 5);
	$pdf->Rect($setx, $tabla8+5,$sety, 5);
	$pdf->Rect($setx, $tabla8+10,$sety, 5);
	$pdf->Rect($setx, $tabla8+15,$sety, 5);
	$pdf->Rect($setx, $tabla8+20,$sety, 5);
	
	$pdf->Line(45, $tabla8, 45, $tabla8+25);
	$pdf->Line(111, $tabla8, 111, $tabla8+20);
	$pdf->Line(140, $tabla8, 140, $tabla8+20);
		
	//COLUMNA 1
	
	$pdf->SetXY($setx, $tabla8+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "EMPRESA:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla8+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "MOTIVO SEPARACION:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla8+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R. QUIMICOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla8+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R.ERGONOMICOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla8+20.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "E.P.P. UTILIZADO:", 0, 1, 'L');
	
	//COLUMNA 2
	
	$pdf->SetXY($setx+30, $tabla8+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Empresa3, 0, 1, 'L');
	
	$pdf->SetXY($setx+30, $tabla8+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Motivo3, 0, 1, 'L');
	
	$pdf->SetXY($setx+30, $tabla8+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Quimicos3, 0, 1, 'L');
	
	$pdf->SetXY($setx+30, $tabla8+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Ergonomicos3, 0, 1, 'L');
	
	$pdf->SetXY($setx+30, $tabla8+20.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $EPP, 0, 1, 'L');
	
	
	//COLUMNA 3
	
	$pdf->SetXY($setx+96, $tabla8+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "PUESTO DE TRABAJO:", 0, 1, 'L');
	
	$pdf->SetXY($setx+96, $tabla8+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R. FISICOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx+96, $tabla8+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R. BIOLOGICOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx+96, $tabla8+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "R. PSICOSOCIALES:", 0, 1, 'L');
	
	//COLUMNA 4
	
	$pdf->SetXY($setx+125, $tabla8+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Puesto3, 0, 1, 'L');
	
	$pdf->SetXY($setx+125, $tabla8+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Fisicos3, 0, 1, 'L');
	
	$pdf->SetXY($setx+125, $tabla8+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Biologicos3, 0, 1, 'L');
	
	$pdf->SetXY($setx+125, $tabla8+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $R_Psicosociales3, 0, 1, 'L');
	
	/***************************************************************************/
	//TABLA 9
	
	$pdf->SetXY($setx, $tabla9-5.5);
	$pdf->SetFont('Arial', 'B', '12');
	$pdf->cell(19, 5, "EXPLORACION FISICA", 0, 1, 'L');
	
	//DANDO COLORES A LAS CELDAS ***********SE DEBE DAR COLOR ANTES DE DIBUJAR
	$pdf->SetXY($setx, $tabla9);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(31, 55, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+47, $tabla9);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(33, 30, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+97, $tabla9);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(32, 35, "", 0, 1, 'L','F');
	
	$pdf->SetXY($setx+145, $tabla9);
	$pdf->SetFillColor($color_celda[0], $color_celda[1], $color_celda[2]);//COLOR AZUL 
	$pdf->cell(30, 25, "", 0, 1, 'L','F');
	
	$pdf->Rect($setx, $tabla9,$sety, 5);
	$pdf->Rect($setx, $tabla9+5,$sety, 5);
	$pdf->Rect($setx, $tabla9+10,$sety, 5);
	$pdf->Rect($setx, $tabla9+15,$sety, 5);
	$pdf->Rect($setx, $tabla9+20,$sety, 5);
	$pdf->Rect($setx, $tabla9+25,$sety, 5);
	$pdf->Rect($setx, $tabla9+30,$sety, 5);
	$pdf->Rect($setx, $tabla9+35,$sety, 5);
	$pdf->Rect($setx, $tabla9+40,$sety, 5);
	$pdf->Rect($setx, $tabla9+45,$sety, 5);
	$pdf->Rect($setx, $tabla9+50,$sety, 5);
	
	$pdf->Line(46, $tabla9, 46, $tabla9+55);
	$pdf->Line(62, $tabla9, 62, $tabla9+30);
	$pdf->Line(95, $tabla9, 95, $tabla9+30);
	$pdf->Line(112, $tabla9, 112, $tabla9+35);
	$pdf->Line(144, $tabla9, 144, $tabla9+35);
	$pdf->Line(160, $tabla9, 160, $tabla9+25);
	$pdf->Line(190, $tabla9, 190, $tabla9+25);
	
	
	
	//COLUMNA1 
	
	$pdf->SetXY($setx, $tabla9+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "TENSION ARTERIAL:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla9+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "AGUDEZA VISUAL OD:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla9+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "PESO:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla9+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "REFLEJOS PUPILARES:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla9+20.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ABDOMEN:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla9+25.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "COLUMNA VERTEBRAL:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla9+30.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "P. TOXICOLOGICA:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla9+35.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "REQ. DEL PUESTO:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla9+40.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "COMPATIBILIDAD:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla9+45.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "COMENTARIOS:", 0, 1, 'L');
	
	$pdf->SetXY($setx, $tabla9+50.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "DICTAMEN:", 0, 1, 'L');

	$pdf->SetXY($setx, $tabla9+55.5);
	$pdf->SetFont('Arial', '', '5');
	$pdf->cell(19, 5, '"Estoy conciente que lo referido en este documento es verdad y, se me apercibe, de que se aplicara lo establecido en el articulo 47 frac.1 de la l.f.t. en cualquier tiempo que se demuestre lo contrario."', 0, 1, 'L');
	
	//COLUMNA 2
	
	$pdf->SetXY($setx+31, $tabla9+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $TA, 0, 1, 'L');

	$pdf->SetXY($setx+31, $tabla9+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $AV_OD, 0, 1, 'L');

	$pdf->SetXY($setx+31, $tabla9+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Peso, 0, 1, 'L');
	
	$pdf->SetXY($setx+31, $tabla9+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Reflejos_Pupilares, 0, 1, 'L');

	$pdf->SetXY($setx+31, $tabla9+20.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Abdomen, 0, 1, 'L');
	
	$pdf->SetXY($setx+31, $tabla9+25.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Columna_Vertebral, 0, 1, 'L');
	
	$pdf->SetXY($setx+31, $tabla9+30.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Pr_Toxico, 0, 1, 'L');
	
	$pdf->SetXY($setx+31, $tabla9+35.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Req_Puesto, 0, 1, 'L');
	
	$pdf->SetXY($setx+31, $tabla9+40.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Compatibilidad, 0, 1, 'L');
	
	$pdf->SetXY($setx+31, $tabla9+45.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Comentarios, 0, 1, 'L');
	
	$pdf->SetXY($setx+31, $tabla9+50.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Dictamen, 0, 1, 'L');
	
	//COLUMNA 3

	$pdf->SetXY($setx+47, $tabla9+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "FRECUENCIA CARDIACA:", 0, 1, 'L');
	
	$pdf->SetXY($setx+47, $tabla9+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "AGUDEZ VISUAL OI:", 0, 1, 'L');
	
	$pdf->SetXY($setx+47, $tabla9+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "CAMPIMETRIA:", 0, 1, 'L');
	
	$pdf->SetXY($setx+47, $tabla9+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "CAMPOS PULMONARES:", 0, 1, 'L');
	
	$pdf->SetXY($setx+47, $tabla9+20.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "HERNIAS:", 0, 1, 'L');
	
	$pdf->SetXY($setx+47, $tabla9+25.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "GENITALES:", 0, 1, 'L');
	
	//COLUMNA 4
	
	$pdf->SetXY($setx+80, $tabla9+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $FC, 0, 1, 'L');
	
	$pdf->SetXY($setx+80, $tabla9+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $AV_OI, 0, 1, 'L');
	
	$pdf->SetXY($setx+80, $tabla9+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Campimetria, 0, 1, 'L');
	
	$pdf->SetXY($setx+80, $tabla9+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Campos_Pulmonares, 0, 1, 'L');
	
	$pdf->SetXY($setx+80, $tabla9+20.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Hernias, 0, 1, 'L');
	
	$pdf->SetXY($setx+80, $tabla9+25.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Genitales, 0, 1, 'L');	
	
	//COLUMNA 5
	
	$pdf->SetXY($setx+97, $tabla9+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "FR:", 0, 1, 'L');
	
	$pdf->SetXY($setx+97, $tabla9+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "C/LENTES:", 0, 1, 'L');
	
	$pdf->SetXY($setx+97, $tabla9+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "AGUDEZA AUDITIVA OD:", 0, 1, 'L');
	
	$pdf->SetXY($setx+97, $tabla9+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "CUELLO:", 0, 1, 'L');
	
	$pdf->SetXY($setx+97, $tabla9+20.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "EXT. SUPERIORES:", 0, 1, 'L');
	
	$pdf->SetXY($setx+97, $tabla9+25.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "GLUCEMIA mg/dl:", 0, 1, 'L');	
	
	$pdf->SetXY($setx+97, $tabla9+30.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "PRUEBA DE EMBARAZO:", 0, 1, 'L');	
	
	//COLUMNA 6
	
	$pdf->SetXY($setx+129, $tabla9+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $FR, 0, 1, 'L');
	
	$pdf->SetXY($setx+129, $tabla9+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $AV_CL, 0, 1, 'L');
	
	$pdf->SetXY($setx+129, $tabla9+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $AA_OD, 0, 1, 'L');
	
	$pdf->SetXY($setx+129, $tabla9+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Cuello, 0, 1, 'L');
	
	$pdf->SetXY($setx+129, $tabla9+20.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Ext_Sup, 0, 1, 'L');
	
	$pdf->SetXY($setx+129, $tabla9+25.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Glucemia, 0, 1, 'L');	
	
	$pdf->SetXY($setx+129, $tabla9+30.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Pr_Embarazo, 0, 1, 'L');	
	
	//COLUMNA 7
	
	$pdf->SetXY($setx+145, $tabla9+.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "ESTATURA:", 0, 1, 'L');
	
	$pdf->SetXY($setx+145, $tabla9+5.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "S/LENTES:", 0, 1, 'L');
	
	$pdf->SetXY($setx+145, $tabla9+10.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "AGUDEZA AUDITIVA OI:", 0, 1, 'L');
	
	$pdf->SetXY($setx+145, $tabla9+15.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "TORAX:", 0, 1, 'L');
	
	$pdf->SetXY($setx+145, $tabla9+20.5);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "EXT. INFERIORES:", 0, 1, 'L');

	//COLUMNA 8
	
	$pdf->SetXY($setx+175, $tabla9+.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Estatura, 0, 1, 'L');
	
	$pdf->SetXY($setx+175, $tabla9+5.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $AV_SL, 0, 1, 'L');
	
	$pdf->SetXY($setx+175, $tabla9+10.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $AA_OI, 0, 1, 'L');
	
	$pdf->SetXY($setx+175, $tabla9+15.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Torax, 0, 1, 'L');
	
	$pdf->SetXY($setx+175, $tabla9+20.5);
	$pdf->SetFont('Arial', '', '7');
	$pdf->cell(19, 5, $Ext_Inf, 0, 1, 'L');
	
	/***************************************************************************/

	//FIRMAS
	
	$pdf->Line($setx, $firma, $setx+70, $firma);	
	$pdf->SetXY($setx+10, $firma);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "NOMBRE Y FIRMA DEL EXAMINADO", 0, 1, 'L');
	
	$pdf->Line($sety-55, $firma, $sety+15, $firma);
	
	$pdf->SetXY($sety-50, $firma);
	$pdf->SetFont('Arial', 'B', '7');
	$pdf->cell(19, 5, "NOMBRE Y FIRMA DE QUIEN REALIZO EL EXAMEN", 0, 1, 'L');
	$pdf->Output();
?>