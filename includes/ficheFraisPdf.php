<?php

require('fpdf.php');
require('class.pdogsb.inc.php');
require('fct.inc.php');

class PDF extends FPDF {

    function Header() {
        // Logo
        $this->Image('../images/logo.jpg', 90, 10, 30);
        $this->Ln(30);
        // Arial bold 15
        $this->SetFont('Times', 'B', 13.5);
        $this->SetTextColor(31, 73, 125);
        $this->Cell(0, 10, 'ETAT DE FRAIS ENGAGES', 'TRL', 1, 'C');
        $this->SetFont('Arial','I',10);
        $this->Cell(0,15, 'A retourner accompagné des justificatifs au plus tard le '
                . '10 du mois qui suit l\'engagement de frais','RL',0,'C');
        $this->Ln(15);
    }
    function BleuGsb(){
        return $this->SetTextColor(31,73,125);
    }
}
session_start();
$pdf = new PDF();
$pdf->AddPage();
$noir = 0;
$leMois = $_SESSION['mois'];
/**
 * Nom, Prénom
 */
//Ecriture Arial Italique de couleur bleu gsb
$pdf->SetFont('Arial','BI',11);
// couleur bleu gsb
$pdf->BleuGsb();
$pdf->Cell(30,10,'Visiteur','L',0,'C');
// Couleut noir
$pdf->SetTextColor($noir);
$pdf->Cell(0,10,"Nom : ".$_SESSION['nom'],'R',1,'L');
$pdf->Cell(30,10,'','L',0,'');
$pdf->Cell(0,5,"Prenom : ".$_SESSION['prenom'],'R',1,'L');
/**
 * Mois 
 */
$pdf->BleuGsb();
$pdf->Cell(30,10,'Mois','L',0,'C');
$pdf->Cell(0,10,$leMois,'R',1,'L');
$pdf->Output();
?>