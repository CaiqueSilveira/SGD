<?php

include 'fpdf/fpdf.php';
include 'conn.php';

$pagas = selectAllPagas();
$tatais = selectTotalP();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Relação de Dívidas Pagas'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(50,7,"Cliente",1,0,"C");
$pdf->Cell(40,7,"Produto",1,0,"C");
$pdf->Cell(40,7,"Data",1,0,"C");
$pdf->Cell(60,7,("Valor"),1,0,"C");
$pdf->Ln();

foreach ($pagas as $paga){
    $pdf->Cell(50,7,($paga["nome"]),1,0,"C");
    $pdf->Cell(40,7,($paga["descricao"]),1,0,"C");
    $pdf->Cell(40,7,($paga["data_compra"]),1,0,"C");
    $pdf->Cell(60,7,($paga["valor"]),1,0,"C");
    $pdf->Ln();
}

$pdf->Cell(70,7,"TOTAL",1,0,"C");


$pdf->Ln();
foreach ($tatais as $tatai){
      $pdf->Cell(70,7,($tatai["valor"]),1,0,"C");
    $pdf->Ln();

     
     
}

$pdf->Output();
