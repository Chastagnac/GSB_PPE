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
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 15, 'A retourner accompagné des justificatifs au plus tard le '
                . '10 du mois qui suit l\'engagement de frais', 'RL', 0, 'C');
        $this->Ln(15);
    }

    function BleuGsb() {
        return $this->SetTextColor(31, 73, 125);
    }

}

session_start();
$pdf = new PDF();
$pdf->AddPage();
$noir = 0;
//$pdo = new PdoGsb;
$instancePdoGsb = PdoGsb::getPdoGsb();
$pdo = $instancePdoGsb;
$leMois = $_SESSION['mois'];
$numAnnee = substr($leMois, 0, 4);
$numMois = substr($leMois, 4, 2);
$idVisiteur = $_SESSION['idVisiteur'];
$lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
$totalNuit = number_format($lesFraisForfait[2][2]*80,2,'.','');
$totaltrepas = number_format($lesFraisForfait[3][2]*29,2,'.','');

/**
 * Nom, Prénom
 */
//Ecriture Arial Italique de couleur bleu gsb
$pdf->SetFont('Arial', 'BI', 11);
// couleur bleu gsb
$pdf->BleuGsb();
$pdf->Cell(30, 10, 'Visiteur', 'L', 0, 'C');
// Couleut noir
$pdf->SetTextColor($noir);
$pdf->Cell(0, 10, "Nom : " . $_SESSION['nom'], 'R', 1, 'L');
$pdf->Cell(30, 10, '', 'L', 0, '');
$pdf->Cell(0, 5, "Prenom : " . $_SESSION['prenom'], 'R', 1, 'L');
/**
 * Mois 
 */
$pdf->BleuGsb();
$pdf->Cell(30, 10, 'Mois', 'L', 0, 'C');
$pdf->SetTextColor($noir);
$pdf->Cell(0, 10, $numMois . "/" . $numAnnee, 'R', 1, 'L');
$pdf->Cell(0, 10, '', 'RL', 1, 'L');
/*
 * 1er ligne tableau
 */
$pdf->SetFont('Arial', 'I', 11);
$pdf->Cell(15, 10, '', 'L', 0, '');
$pdf->BleuGsb();
$pdf->SetDrawColor(31, 73, 125);
$pdf->Cell(35, 10, 'Frais Forfaitaires', 'LTB', 0, '');
$pdf->Cell(30, 10, 'Quantite', 'TB', 0, 'C');
$pdf->Cell(70, 10, 'Montant unitaire', 'TB', 0, 'C');
$pdf->Cell(30, 10, 'Total', 'TBR', 0, 'C');
$pdf->SetDrawColor($noir);
$pdf->Cell(0, 10, '', 'R', 1, '');
/**
 * 2eme ligne du tableau
 */
$pdf->SetFont('Arial', 'I', 11);
$pdf->Cell(15, 10, '', 'L', 0, '');
$pdf->SetTextColor($noir);
$pdf->SetDrawColor(31, 73, 125);
$pdf->Cell(35, 10, 'Nuitee', 'LBR', 0, 'C');
$pdf->Cell(30, 10, $lesFraisForfait[2][2], 'TB', 0, 'C');
$pdf->Cell(70, 10, '80.00', 'LTBR', 0, 'R');
$pdf->Cell(30, 10, $totalNuit, 'TBR', 0, 'R');
$pdf->SetDrawColor($noir);
$pdf->Cell(0, 10, '', 'R', 1, '');
/**
 * 3eme ligne du tableau
 */
$pdf->SetFont('Arial', 'I', 11);
$pdf->Cell(15, 10, '', 'L', 0, '');
$pdf->SetTextColor($noir);
$pdf->SetDrawColor(31, 73, 125);
$pdf->Cell(35, 10, 'Repas Midi', 'LBR', 0, 'C');
$pdf->Cell(30, 10, $lesFraisForfait[3][2], 'TB', 0, 'C');
$pdf->Cell(70, 10, '29.00', 'LTBR', 0, 'R');
$pdf->Cell(30, 10, $totalNuit, 'TBR', 0, 'R');
$pdf->SetDrawColor($noir);
$pdf->Cell(0, 10, '', 'R', 1, '');
/**
 * 4eme ligne
 */
$pdf->SetFont('Arial', 'I', 11);
$pdf->Cell(15, 10, '', 'L', 0, '');
$pdf->SetTextColor($noir);
$pdf->SetDrawColor(31, 73, 125);
$pdf->Cell(35, 10, 'Kilometrage', 'LBR', 0, 'C');
$pdf->Cell(30, 10, $lesFraisForfait[1][2], 'TB', 0, 'C');
$pdf->Cell(70, 10, '', 'LTBR', 0, 'R');
$pdf->Cell(30, 10, '', 'TBR', 0, 'R');
$pdf->SetDrawColor($noir);
$pdf->Cell(0, 10, '', 'R', 1, '');
/*
 * Ligne frais
 */
$pdf->BleuGsb();
$pdf->Cell(80,10,'','L',0,'');
$pdf->Cell(0,10,'Autres Frais','R',1,'');
$pdf->SetFont('Arial', 'I', 11);
$pdf->Cell(15, 10, '', 'L', 0, '');
$pdf->SetDrawColor(31, 73, 125);
$pdf->Cell(35, 10, 'Date', 'LBT', 0, 'C');
$pdf->Cell(100, 10, 'Libelle', 'TB', 0, 'C');
$pdf->Cell(30, 10, 'Montant', 'TBR', 0, 'C');
$pdf->SetDrawColor($noir);
$pdf->Cell(0, 10, '', 'R', 1, '');
$pdf->Output();
?>
