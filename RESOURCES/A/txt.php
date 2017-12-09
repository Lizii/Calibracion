<?php

/* incluimos primeramente el archivo que contiene la clase fpdf */

define('FPDF_FONTPATH', 'fpdf/font/');
require_once('fpdf/fpdf.php');

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

/* Variables del sistema*/
$setx=13;
$cellx=45;
$cellsize=194;
$setderecha=99;
/* Fin de variables del sistema*/

/* tenemos que generar una instancia de la clase */
$pdf=new PDF('P', 'mm', 'Letter');
$pdf->AddPage();
$pdf->SetFont('helvetica', '', '8');

//Rect(Izquierda, Arriba, Derecha, Abajo)
$pdf->Rect(11, 7, 198, 235);   // Contenedor principal

$pdf->SetXY($setx, 10);
$pdf->SetFont('Arial', 'B', '8');
$pdf->SetFillColor(255, 255, 255); // Color Blanco
$pdf->cell(138, 5, utf8_decode("¿Requiere acción correctiva?/Requires corrective action?"), 1, 1, 'C', 'F');

$pdf->SetXY($setx+138, 10);
$pdf->SetFont('Arial', 'B', '8');
$pdf->SetFillColor(255, 255, 255); // Color Blanco
$pdf->cell(28, 5, "SI/YES", 1, 1, 'L', 'F');

$pdf->SetXY($setx+166, 10);
$pdf->SetFont('Arial', 'B', '8');
$pdf->SetFillColor(255, 255, 255); // Color Blanco
$pdf->cell(28, 5, "NO", 1, 1, 'L', 'F');

$pdf->SetXY($setx+152, 10.5);
$pdf->SetFont('Arial', 'B', '8');
$pdf->SetFillColor(255, 255, 255); // Color Blanco
$pdf->cell(13, 4, "X", 0, 1, 'L', 'F');

$pdf->SetXY($setx+175, 10.5);
$pdf->SetFont('Arial', 'B', '8');
$pdf->SetFillColor(255, 255, 255); // Color Blanco
$pdf->cell(13, 4, "X", 0, 1, 'L', 'F');

$pdf->Output("ncpr/prueba.pdf", "F");
$pdf->Output("ncpr/prueba.pdf", "I");

?>