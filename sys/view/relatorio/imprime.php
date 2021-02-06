<?php

include 'fpdf/fpdf.php';
include 'conn.php';

$pendentes = selectAllPendente();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Relatório de cadastros'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(50,7,"Nome",1,0,"C");
$pdf->Cell(40,7,"Produto",1,0,"C");
$pdf->Cell(40,7,"Data",1,0,"C");
$pdf->Cell(60,7,("Valor"),1,0,"C");
$pdf->Ln();

foreach ($pendentes as $pendente){
    $pdf->Cell(50,7,($pendente["cliente"]),1,0,"C");
    $pdf->Cell(40,7,($pendente["descricao"]),1,0,"C");
  
    $pdf->Cell(60,7,($pendente["valor"]),1,0,"C");
    $pdf->Ln();
}

$pdf->Output();

?>