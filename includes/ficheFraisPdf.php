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
        $this->Cell(0, 10, 'ETAT DE FRAIS ENGAGES', 'TB', 1, 'C');
        $this->SetFont('Arial','I',10);
        $this->Cell(-190,15, 'A retourner accompagné des justificatifs au plus tard le '
                . '10 du mois qui suit l\'engagement de frais',0,0,'C');
        $this->Ln(15);
    }

}
session_start();
$h = 7;
$retrait = "    ";
$pdf = new PDF();
$pdf->AddPage();
//Ecriture Arial Italique de couleur bleu gsb
$pdf->SetFont('Arial','BI',11);
$pdf->SetTextColor(31, 73, 125);
$pdf->Write($h, $retrait . "Visteur : ");

//Ecriture en Gras italique retour couleur normal
$pdf->SetFont('', 'I');
$pdf->SetTextColor(0);
$pdf->Write($h, $_SESSION['nom'] . " ".$_SESSION['prenom']);

//$pdf->Write($h,"Mois : " . $_SESSION['mois']);
$pdf->Output();
?>