<?php

require('fpdf.php');

class PDF extends FPDF {

    /**
     * Fonction Header avec le logo gsb et le titre du pdf 
     */
    function Header() {
        // Logo
        $this->Image('images/logo.jpg', 90, 10, 30);
        $this->Ln(30);
        // Arial bold 15
        $this->SetFont('Times', 'B', 13.5);
        $this->SetTextColor(31, 73, 125);
        $this->Cell(0, 10, 'ETAT DE FRAIS ENGAGES', 'TRL', 1, 'C');
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 15, utf8_decode('A retourner accompagné des justificatifs au plus tard le '
                        . '10 du mois qui suit l\'engagement de frais'), 'RL', 0, 'C');
        $this->Ln(15);
    }

    function BleuGsb() {
        return $this->SetTextColor(31, 73, 125);
    }

    function Content($idVisiteur, $nomVisiteur, $leMois, $lesFraisHorsForfait, $lesFraisForfait, $totalNuit, $totalRepas,$noir,$numAnnee,$numMois) {
        /**
         * Nom, Prénom
         */
//Ecriture Arial Italique de couleur bleu gsb
        $this->SetFont('Arial', 'BI', 11);
// couleur bleu gsb
        $this->BleuGsb();
        $this->Cell(30, 10, 'Visiteur', 'L', 0, 'C');
// Couleut noir
        $this->SetTextColor($noir);
        $this->Cell(0, 10, "Nom : " . $_SESSION['nom'], 'R', 1, 'L');
        $this->Cell(30, 10, '', 'L', 0, '');
        $this->Cell(0, 5, utf8_decode("Prénom : ") . $_SESSION['prenom'], 'R', 1, 'L');
        /**
         * Mois 
         */
        $this->BleuGsb();
        $this->Cell(30, 10, 'Mois', 'L', 0, 'C');
        $this->SetTextColor($noir);
        $this->Cell(0, 10, $numMois . "/" . $numAnnee, 'R', 1, 'L');
        $this->Cell(0, 10, '', 'RL', 1, 'L');
        /*
         * 1er ligne tableau
         */
        $this->SetFont('Arial', 'I', 11);
        $this->Cell(15, 10, '', 'L', 0, '');
        $this->BleuGsb();
        $this->SetDrawColor(31, 73, 125);
        $this->Cell(35, 10, 'Frais Forfaitaires', 'LTB', 0, '');
        $this->Cell(30, 10, utf8_decode('Quantité'), 'TB', 0, 'C');
        $this->Cell(70, 10, 'Montant unitaire', 'TB', 0, 'C');
        $this->Cell(30, 10, 'Total', 'TBR', 0, 'C');
        $this->SetDrawColor($noir);
        $this->Cell(0, 10, '', 'R', 1, '');
        /**
         * 2eme ligne du tableau
         */
        $this->SetFont('Arial', 'I', 11);
        $this->Cell(15, 10, '', 'L', 0, '');
        $this->SetTextColor($noir);
        $this->SetDrawColor(31, 73, 125);
        $this->Cell(35, 10, 'Nuitee', 'LBR', 0, 'C');
        $this->Cell(30, 10, $lesFraisForfait[2][2], 'TB', 0, 'C');
        $this->Cell(70, 10, '80.00', 'LTBR', 0, 'R');
        $this->Cell(30, 10, $totalNuit, 'TBR', 0, 'R');
        $this->SetDrawColor($noir);
        $this->Cell(0, 10, '', 'R', 1, '');
        /**
         * 3eme ligne du tableau
         */
        $this->SetFont('Arial', 'I', 11);
        $this->Cell(15, 10, '', 'L', 0, '');
        $this->SetTextColor($noir);
        $this->SetDrawColor(31, 73, 125);
        $this->Cell(35, 10, 'Repas Midi', 'LBR', 0, 'C');
        $this->Cell(30, 10, $lesFraisForfait[3][2], 'TB', 0, 'C');
        $this->Cell(70, 10, '29.00', 'LTBR', 0, 'R');
        $this->Cell(30, 10, $totalNuit, 'TBR', 0, 'R');
        $this->SetDrawColor($noir);
        $this->Cell(0, 10, '', 'R', 1, '');
        /**
         * 4eme ligne
         */
        $this->SetFont('Arial', 'I', 11);
        $this->Cell(15, 10, '', 'L', 0, '');
        $this->SetTextColor($noir);
        $this->SetDrawColor(31, 73, 125);
        $this->Cell(35, 10, 'Kilometrage', 'LBR', 0, 'C');
        $this->Cell(30, 10, $lesFraisForfait[1][2], 'TB', 0, 'C');
        $this->Cell(70, 10, '', 'LTBR', 0, 'R');
        $this->Cell(30, 10, '', 'TBR', 0, 'R');
        $this->SetDrawColor($noir);
        $this->Cell(0, 10, '', 'R', 1, '');
//Appel de la fonction pour mettre en forme le tableau des frais hors forfait
        $this->AffichageFraisHorsForfait($lesFraisHorsForfait);
        $this->Cell(0, 5, '', 'BRL', 1, '');
//Appel fonction signature avec le l'image signature
        $this->Signature();
    }

    /**
     * Fonction qui met en forme le tableau des frais hors forfait avec la date,
     * le libellé et le montant
     * @param type $lesFraisHorsForfait tableaux de frais hors forfait
     */
    function AffichageFraisHorsForfait($lesFraisHorsForfait) {
        //Ligne frais hors forfait
        $this->BleuGsb();
        $this->Cell(90, 10, '', 'L', 0, '');
        $this->Cell(0, 10, 'Autres Frais', 'R', 1, '');
        $this->SetFont('Arial', 'I', 11);
        $this->Cell(15, 10, '', 'L', 0, '');
        $this->SetDrawColor(31, 73, 125);
        //1er ligne du tableau (en tete avec libelle)
        $this->Cell(35, 10, 'Date', 'LBT', 0, 'C');
        $this->Cell(100, 10, utf8_decode('Libéllé'), 'TB', 0, 'C');
        $this->Cell(30, 10, 'Montant', 'TBR', 0, 'C');
        $this->SetDrawColor(0);
        $this->Cell(0, 10, '', 'R', 1, '');
        //Création des colonnes pour chaque frais hors forfait
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $date = $unFraisHorsForfait['date'];
            $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
            $montant = $unFraisHorsForfait['montant'];
            $this->Cell(15, 10, '', 'L', 0, '');
            $this->SetDrawColor(31, 73, 125);
            $this->SetTextColor(0);
            $this->Cell(35, 10, $date, 'LBT', 0, 'C');
            $this->Cell(100, 10, utf8_decode($libelle), 'LTBR', 0, 'C');
            $this->Cell(30, 10, $montant, 'TBR', 0, 'C');
            $this->SetDrawColor(0);
            $this->Cell(0, 10, '', 'R', 1, '');
        }
    }

    function Signature() {
        $this->BleuGsb();
        $this->Cell(0, 10, 'Signature', '', 1, 'R');
        
        $this->Image('images/signatureComptable.jpg', 175, 225, 30);
    }

}

$pdf = new PDF();
$pdf->AddPage();
$pdf->Content($idVisiteur, $nomVisiteur, $leMois, $lesFraisHorsForfait, $lesFraisForfait, $totalNuit, $totalRepas,$noir,$numAnnee,$numMois);
$pdf->Output('F', 'fpdf/pdf/' . $name);
?>
